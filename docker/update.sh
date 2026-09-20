#!/bin/bash
set -e

echo ">> Updating PNLCS to the latest version..."
cd /var/www/pnlcs

git config --global --add safe.directory /var/www/pnlcs || true

# 拉取最新代码 (如果是 git 仓库)
if [ -d ".git" ]; then
    git pull origin main || git pull
fi

# 安装最新依赖与构建前端
composer install --no-dev --optimize-autoloader --no-interaction
npm run build

# 执行迁移与清理缓存
php artisan migrate --force --no-interaction
php artisan optimize:clear

chown -R www-data:www-data storage bootstrap/cache
echo ">> Update complete!"
