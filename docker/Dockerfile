# ==============================================================================
# PNLCS 多架构生产级运行容器 Dockerfile
# 支持系统架构: linux/amd64 (x86_64), linux/arm64 (aarch64 / Apple Silicon / 树莓派 / ARM云服务器)
# ==============================================================================
FROM php:8.4-fpm-bookworm

LABEL maintainer="Panelica / PNLCS Community"
LABEL description="PNLCS Multi-Arch Production Runtime Container (PHP 8.4, Nginx, Node.js 20, Supervisor)"

ENV DEBIAN_FRONTEND=noninteractive
ENV NODE_VERSION=20

# 1. 安装基础依赖、Nginx、Supervisor 及编译运行环境
RUN apt-get update && apt-get install -y --no-install-recommends \
    nginx \
    supervisor \
    git \
    curl \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libc-client-dev \
    libkrb5-dev \
    mariadb-client \
    ca-certificates \
    gnupg \
    && rm -rf /var/lib/apt/lists/*

# 2. 安装并启用核心 PHP 扩展 (跨架构自动匹配编译二进制)
RUN curl -sSLf https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions -o /usr/local/bin/install-php-extensions \
    && chmod +x /usr/local/bin/install-php-extensions \
    && install-php-extensions \
        bcmath \
        curl \
        dom \
        fileinfo \
        gd \
        intl \
        mbstring \
        mysqli \
        openssl \
        pdo_mysql \
        tokenizer \
        xml \
        zip \
        imap \
        redis \
        opcache

# 3. 安装 Node.js 20 LTS (官方支持 arm64 与 amd64)
RUN mkdir -p /etc/apt/keyrings \
    && curl -fsSL https://deb.nodesource.com/gpgkey/nodesource-repo.gpg.key | gpg --dearmor -o /etc/apt/keyrings/nodesource.gpg \
    && echo "deb [signed-by=/etc/apt/keyrings/nodesource.gpg] https://deb.nodesource.com/node_$NODE_VERSION.x nodistro main" | tee /etc/apt/sources.list.d/nodesource.list \
    && apt-get update \
    && apt-get install -y --no-install-recommends nodejs \
    && rm -rf /var/lib/apt/lists/*

# 4. 从官方镜像复制 Composer 2
COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

# 5. 配置 Nginx 与 PHP
RUN rm -f /etc/nginx/sites-enabled/default
COPY docker/nginx.conf /etc/nginx/conf.d/pnlcs.conf
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY docker/php.ini /usr/local/etc/php/conf.d/99-pnlcs.ini

# 6. 设置工作目录并复制源码
WORKDIR /var/www/pnlcs
COPY . /var/www/pnlcs

# 7. 预先安装 PHP 依赖与构建前端静态资源 (加速容器首次启动速度)
RUN composer install --no-dev --optimize-autoloader --no-interaction \
    && npm install \
    && npm run build \
    && rm -rf node_modules ~/.npm

# 8. 入口脚本与更新脚本配置
COPY docker/docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
COPY docker/update.sh /usr/local/bin/update.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh /usr/local/bin/update.sh \
    && chown -R www-data:www-data /var/www/pnlcs \
    && git config --global --add safe.directory /var/www/pnlcs || true

EXPOSE 80

ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]
