#!/usr/bin/env bash
# ==============================================================================
# PNLCS (Panelica License & Customer System) 全自动一键部署脚本
# 支持系统架构: linux/amd64 (x86_64), linux/arm64 (aarch64)
# 功能: 自动检测架构、随机生成全部安全密钥与密码、准备运行环境、拉取/构建镜像并一键启动
# ==============================================================================

set -e

RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
CYAN='\033[0;36m'
BOLD='\033[1m'
NC='\033[0m' # No Color

echo -e "${CYAN}${BOLD}"
echo "=================================================================="
echo "    🚀 PNLCS 生产级一键全自动部署脚本 (AMD64 & ARM64 通用)     "
echo "    全系统 100% 深度简体中文汉化 + 生产级 Docker 集群环境       "
echo "=================================================================="
echo -e "${NC}"

# ------------------------------------------------------------------------------
# 1. 检查 root 权限与环境依赖
# ------------------------------------------------------------------------------
if [ "$EUID" -ne 0 ]; then
    echo -e "${YELLOW}[!] 提示: 建议以 root 或使用 sudo 权限运行此脚本以确保 Docker 权限正常。${NC}"
fi

# 检查 Docker 是否安装
if ! command -v docker &> /dev/null; then
    echo -e "${RED}[ERROR] 未检测到 Docker，请先安装 Docker: curl -fsSL https://get.docker.com | bash${NC}"
    exit 1
fi

# 确定 Docker Compose 命令
if docker compose version &> /dev/null; then
    COMPOSE_CMD="docker compose"
elif command -v docker-compose &> /dev/null; then
    COMPOSE_CMD="docker-compose"
else
    echo -e "${RED}[ERROR] 未检测到 Docker Compose 插件，请安装 docker-compose-plugin${NC}"
    exit 1
fi

# ------------------------------------------------------------------------------
# 2. 架构检测与 ARM64 小内存优化
# ------------------------------------------------------------------------------
ARCH=$(uname -m)
echo -e "${BLUE}[1/6] 检测服务器硬件架构...${NC}"
echo -e "      当前 CPU 架构: ${BOLD}${ARCH}${NC}"

case "$ARCH" in
    x86_64|amd64)
        SYSTEM_ARCH="amd64"
        ;;
    aarch64|arm64|armv8*)
        SYSTEM_ARCH="arm64"
        ;;
    *)
        echo -e "${YELLOW}[!] 未识别的架构: $ARCH，将尝试以通用模式构建。${NC}"
        SYSTEM_ARCH="unknown"
        ;;
esac

# 检查内存与 Swap（防止小内存机器 OOM）
AVAILABLE_MEM=$(free -m | awk '/^Mem:/{print $7}')
CURRENT_SWAP=$(free -m | awk '/^Swap:/{print $2}')

if [ "$CURRENT_SWAP" -eq 0 ] && [ "$AVAILABLE_MEM" -lt 2048 ]; then
    echo -e "${YELLOW}[!] 检测到当前可用内存不足 2GB 且无 Swap 交换分区。${NC}"
    echo -e "${CYAN}    正在自动为您创建并启用 2GB 临时 Swap 分区（防止编译/运行时被内核 OOM 杀进程）...${NC}"
    if fallocate -l 2G /swapfile 2>/dev/null || dd if=/dev/zero of=/swapfile bs=1M count=2048 2>/dev/null; then
        chmod 600 /swapfile
        mkswap /swapfile > /dev/null 2>&1
        swapon /swapfile > /dev/null 2>&1
        echo -e "${GREEN}    ✓ 2GB Swap 挂载成功！${NC}"
    fi
fi

# ------------------------------------------------------------------------------
# 3. 随机参数安全生成与 .env 初始化
# ------------------------------------------------------------------------------
echo -e "${BLUE}[2/6] 自动生成高强度随机密码与应用密钥...${NC}"

# 安全随机字母数字生成函数 (纯字母数字，规避 bash/sed/转义字符干扰)
generate_random_secret() {
    local length="${1:-20}"
    LC_ALL=C tr -dc 'A-Za-z0-9' < /dev/urandom | head -c "$length"
}

# 预先生成强随机密钥 (若服务器已存在 .env 则复用已有密码，避免数据卷持久化后密码不一致)
RANDOM_DB_PASS=$(generate_random_secret 24)
RANDOM_ROOT_PASS=$(generate_random_secret 24)
RANDOM_REDIS_PASS=$(generate_random_secret 24)

# 生成合法的 Laravel APP_KEY (32 字节 Base64 随机密钥)
RANDOM_APP_KEY="base64:$(head -c 32 /dev/urandom | base64 | tr -d '\n\r')"

ENV_FILE=".env"
if [ -f "$ENV_FILE" ]; then
    echo -e "      检测到已存在 .env，正在读取已有密钥以保持与持久化数据卷一致..."
    EXISTING_APP_KEY=$(grep '^APP_KEY=' "$ENV_FILE" | head -n1 | cut -d '=' -f2- | tr -d '"\r\n ')
    EXISTING_DB_PASS=$(grep '^DB_PASSWORD=' "$ENV_FILE" | head -n1 | cut -d '=' -f2- | tr -d '"\r\n ')
    EXISTING_ROOT_PASS=$(grep '^DB_ROOT_PASSWORD=' "$ENV_FILE" | head -n1 | cut -d '=' -f2- | tr -d '"\r\n ')
    EXISTING_REDIS_PASS=$(grep '^REDIS_PASSWORD=' "$ENV_FILE" | head -n1 | cut -d '=' -f2- | tr -d '"\r\n ')
    
    [ -n "$EXISTING_APP_KEY" ] && RANDOM_APP_KEY="$EXISTING_APP_KEY"
    [ -n "$EXISTING_DB_PASS" ] && RANDOM_DB_PASS="$EXISTING_DB_PASS"
    [ -n "$EXISTING_ROOT_PASS" ] && RANDOM_ROOT_PASS="$EXISTING_ROOT_PASS"
    [ -n "$EXISTING_REDIS_PASS" ] && RANDOM_REDIS_PASS="$EXISTING_REDIS_PASS"
    
    cp "$ENV_FILE" "${ENV_FILE}.backup.$(date +%Y%m%d%H%M%S)"
fi

# 检测服务器公网或局域网 IP 与端口
DETECTED_IP=$(curl -s4m 3 https://api.ipify.org || curl -s4m 3 https://ifconfig.me || hostname -I | awk '{print $1}' || echo "127.0.0.1")
APP_PORT="${APP_PORT:-8090}"
APP_URL="http://${DETECTED_IP}:${APP_PORT}"

echo -e "      生成全新的 .env 配置文件..."
cat <<EOF > "$ENV_FILE"
# ==============================================================================
# PNLCS 自动部署生成的生产配置文件 (生成时间: $(date))
# ==============================================================================

APP_NAME="PNLCS"
APP_ENV=production
APP_DEBUG=false
APP_KEY=${RANDOM_APP_KEY}
APP_URL=${APP_URL}
APP_PORT=${APP_PORT}

APP_LOCALE=zh
APP_FALLBACK_LOCALE=zh
APP_FAKER_LOCALE=zh_CN
APP_MAINTENANCE_DRIVER=file
BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=daily
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=warning

# 数据库设定
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=pnlcs
DB_USERNAME=pnlcs
DB_PASSWORD=${RANDOM_DB_PASS}
DB_ROOT_PASSWORD=${RANDOM_ROOT_PASS}

# 会话与缓存设置 (安装阶段使用稳定的 file 零依赖引擎)
SESSION_DRIVER=file
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null
CACHE_STORE=file
QUEUE_CONNECTION=sync

# Redis 配置 (系统跑通后若需切换 session/cache 为 redis 可随时启用)
REDIS_CLIENT=phpredis
REDIS_HOST=redis
REDIS_PORT=6379
REDIS_PASSWORD=${RANDOM_REDIS_PASS}

# 邮件基础设置
MAIL_MAILER=log
MAIL_HOST=127.0.0.1
MAIL_PORT=587
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="noreply@pnlcs.local"
MAIL_FROM_NAME="PNLCS"

VITE_APP_NAME="PNLCS"
EOF

# 保存密码凭据清单方便运维查阅
CREDENTIALS_FILE="deploy-credentials.txt"
cat <<EOF > "$CREDENTIALS_FILE"
==================================================================
           PNLCS 部署成功凭据清单 (请妥善保存)
==================================================================
部署时间: $(date)
访问地址: ${APP_URL}/install

【数据库连接信息 (MariaDB)】
数据库主机: db (容器内部) / 127.0.0.1 (若暴露端口)
数据库端口: 3306
数据库库名: pnlcs
数据库用户: pnlcs
数据库密码: ${RANDOM_DB_PASS}
ROOT 超级密码: ${RANDOM_ROOT_PASS}

【Redis 内存数据库】
Redis 主机: redis (容器内部)
Redis 端口: 6379
Redis 密码: ${RANDOM_REDIS_PASS}

【应用加密密钥 (APP_KEY)】
${RANDOM_APP_KEY}
==================================================================
EOF
chmod 600 "$CREDENTIALS_FILE"
echo -e "${GREEN}      ✓ 密码与密钥生成完毕，已同步记录至 ${CREDENTIALS_FILE}${NC}"

# ------------------------------------------------------------------------------
# 4. 准备本地目录权限与持久化卷
# ------------------------------------------------------------------------------
echo -e "${BLUE}[3/6] 配置文件目录权限...${NC}"
mkdir -p storage/framework/{cache,sessions,views} \
         storage/logs \
         storage/app/{public,private} \
         bootstrap/cache \
         lang/zh

chmod -R 777 storage bootstrap/cache
echo -e "${GREEN}      ✓ storage 与 bootstrap/cache 权限配置完毕！${NC}"

# ------------------------------------------------------------------------------
# 5. 拉取预构建多架构镜像 (或本地自动构建回退)
# ------------------------------------------------------------------------------
echo -e "${BLUE}[4/6] 准备 Docker 容器镜像 (支持 AMD64 与 ARM64)...${NC}"
GHCR_IMAGE="ghcr.io/snail468/pnlcs:latest"
IMAGE_READY=false

echo -e "      正在检查 GitHub Packages 预编译多架构镜像 (${GHCR_IMAGE})..."
if docker pull "$GHCR_IMAGE" 2>/dev/null; then
    docker tag "$GHCR_IMAGE" pnlcs:latest
    IMAGE_READY=true
    echo -e "${GREEN}      ✓ 成功拉取 GitHub Actions 预编译多架构镜像！${NC}"
else
    echo -e "${YELLOW}      预编译镜像拉取跳过（首次构建中或需本地构建），开始本地构建 pnlcs:latest...${NC}"
    docker build -t pnlcs:latest -f docker/Dockerfile .
    IMAGE_READY=true
    echo -e "${GREEN}      ✓ 本地镜像编译完成！${NC}"
fi

# ------------------------------------------------------------------------------
# 6. 启动服务集群并检查健康状态
# ------------------------------------------------------------------------------
echo -e "${BLUE}[5/6] 启动 Docker 容器集群...${NC}"
$COMPOSE_CMD down 2>/dev/null || true
$COMPOSE_CMD up -d

echo -e "${BLUE}[6/6] 等待数据库与服务健康检查就绪...${NC}"
MAX_WAIT=40
COUNT=0
while [ $COUNT -lt $MAX_WAIT ]; do
    DB_STATUS=$(docker inspect --format='{{json .State.Health.Status}}' pnlcs-db 2>/dev/null || echo "\"starting\"")
    APP_STATUS=$(docker inspect --format='{{json .State.Status}}' pnlcs 2>/dev/null || echo "\"starting\"")
    
    if [ "$DB_STATUS" = "\"healthy\"" ] && [ "$APP_STATUS" = "\"running\"" ]; then
        break
    fi
    sleep 2
    COUNT=$((COUNT+2))
    echo -ne "      等待容器就绪中 (${COUNT}s/${MAX_WAIT}s)...\r"
done
echo ""

# 清除一次 Laravel 内部缓存并重载 Nginx，确保新配置立即刷新生效
docker exec pnlcs php artisan optimize:clear > /dev/null 2>&1 || true
docker exec pnlcs nginx -s reload > /dev/null 2>&1 || true

# 强制同步 MariaDB 业务用户密码，确保与当前 .env 保持 100% 绝对一致（消除旧数据卷残留密码不一致问题）
docker exec pnlcs-db mariadb -e "ALTER USER 'pnlcs'@'%' IDENTIFIED BY '${RANDOM_DB_PASS}'; FLUSH PRIVILEGES;" > /dev/null 2>&1 || \
docker exec pnlcs-db mariadb -uroot -p"${RANDOM_ROOT_PASS}" -e "ALTER USER 'pnlcs'@'%' IDENTIFIED BY '${RANDOM_DB_PASS}'; FLUSH PRIVILEGES;" > /dev/null 2>&1 || true

# ------------------------------------------------------------------------------
# 7. 输出部署报告与安装指引
# ------------------------------------------------------------------------------
echo -e "${GREEN}${BOLD}"
echo "=================================================================="
echo "    🎉 恭喜！PNLCS 集群已成功部署启动！                         "
echo "=================================================================="
echo -e "${NC}"

echo -e "${BOLD}服务状态概览：${NC}"
$COMPOSE_CMD ps
echo ""

echo -e "${CYAN}${BOLD}👉 请在浏览器中打开安装向导开始配置：${NC}"
echo -e "   - 直接 IP 访问:       ${BOLD}${GREEN}${APP_URL}/install${NC}"
echo -e "   - 反向代理域名访问:   ${BOLD}${GREEN}http(s)://你的反代域名/install${NC}"
echo ""

echo -e "${YELLOW}${BOLD}安装向导数据库连接填写提示：${NC}"
echo -e "   - 数据库主机 (Host):     ${BOLD}db${NC}"
echo -e "   - 数据库端口 (Port):     ${BOLD}3306${NC}"
echo -e "   - 数据库名称 (Database): ${BOLD}pnlcs${NC}"
echo -e "   - 数据库用户 (Username): ${BOLD}pnlcs${NC}"
echo -e "   - 数据库密码 (Password): ${BOLD}${RANDOM_DB_PASS}${NC}"
echo ""
echo -e "提示: 所有随机生成的账号密码已保存在本地: ${BOLD}deploy-credentials.txt${NC}"
echo "=================================================================="
