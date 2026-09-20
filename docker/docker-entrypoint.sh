#!/bin/bash
set -e

APP_DIR="/var/www/pnlcs"
cd "$APP_DIR"

# 1. 确保 .env 文件存在
if [ ! -f "$APP_DIR/.env" ]; then
    if [ -f "$APP_DIR/.env.docker.example" ]; then
        cp "$APP_DIR/.env.docker.example" "$APP_DIR/.env"
    elif [ -f "$APP_DIR/.env.example" ]; then
        cp "$APP_DIR/.env.example" "$APP_DIR/.env"
    fi
fi

# 2. 如果存在外部环境变量传入，同步更新到 .env
update_env_var() {
    local key="$1"
    local value="$2"
    if [ -n "$value" ]; then
        if grep -q "^${key}=" "$APP_DIR/.env"; then
            sed -i "s|^${key}=.*|${key}=${value}|" "$APP_DIR/.env"
        else
            echo "${key}=${value}" >> "$APP_DIR/.env"
        fi
    fi
}

update_env_var "DB_HOST" "$DB_HOST"
update_env_var "DB_PORT" "$DB_PORT"
update_env_var "DB_DATABASE" "$DB_DATABASE"
update_env_var "DB_USERNAME" "$DB_USERNAME"
update_env_var "DB_PASSWORD" "$DB_PASSWORD"
update_env_var "APP_URL" "$APP_URL"
update_env_var "APP_LOCALE" "${APP_LOCALE:-zh}"
update_env_var "APP_FALLBACK_LOCALE" "${APP_FALLBACK_LOCALE:-zh}"
update_env_var "REDIS_HOST" "$REDIS_HOST"
update_env_var "REDIS_PORT" "$REDIS_PORT"
update_env_var "REDIS_PASSWORD" "$REDIS_PASSWORD"
update_env_var "CACHE_STORE" "${CACHE_STORE:-redis}"
update_env_var "SESSION_DRIVER" "${SESSION_DRIVER:-redis}"

# 3. 检查并生成 APP_KEY (若尚未配置)
if ! grep -q "^APP_KEY=base64:" "$APP_DIR/.env"; then
    echo ">> Generating Laravel APP_KEY..."
    php artisan key:generate --force || true
fi

# 4. 修复 storage 与 cache 目录权限
mkdir -p "$APP_DIR/storage/framework/cache" \
         "$APP_DIR/storage/framework/sessions" \
         "$APP_DIR/storage/framework/views" \
         "$APP_DIR/storage/logs" \
         "$APP_DIR/storage/app/public" \
         "$APP_DIR/storage/app/private" \
         "$APP_DIR/bootstrap/cache"

chown -R www-data:www-data "$APP_DIR/storage" "$APP_DIR/bootstrap/cache"
chmod -R 775 "$APP_DIR/storage" "$APP_DIR/bootstrap/cache"

# 5. 创建 storage 软链接 (若尚未创建)
if [ ! -L "$APP_DIR/public/storage" ]; then
    php artisan storage:link || true
fi

# 6. 如果数据库已准备好且已经完成安装，自动执行迁移
if [ -f "$APP_DIR/storage/installed.lock" ]; then
    echo ">> System already installed, verifying database migrations..."
    php artisan migrate --force --no-interaction || true
    php artisan optimize:clear || true
fi

echo ">> Starting PNLCS (PHP-FPM + Nginx via Supervisor)..."
exec /usr/bin/supervisord -n -c /etc/supervisor/conf.d/supervisord.conf
