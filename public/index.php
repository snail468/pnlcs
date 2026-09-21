<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// 自动识别并纠正反向代理 HTTPS 与端口，防止 Symfony 生成带 :80 端口的 https 链接导致 ERR_SSL_PROTOCOL_ERROR
$isHttps = (!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off')
    || (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && str_contains(strtolower($_SERVER['HTTP_X_FORWARDED_PROTO']), 'https'));

if ($isHttps) {
    $_SERVER['HTTPS'] = 'on';
    if (!empty($_SERVER['SERVER_PORT']) && (string)$_SERVER['SERVER_PORT'] === '80') {
        $_SERVER['SERVER_PORT'] = '443';
    }
    if (!empty($_SERVER['HTTP_X_FORWARDED_PORT']) && (string)$_SERVER['HTTP_X_FORWARDED_PORT'] === '80') {
        $_SERVER['HTTP_X_FORWARDED_PORT'] = '443';
    }
    if (!empty($_SERVER['HTTP_HOST'])) {
        $_SERVER['HTTP_HOST'] = preg_replace('/:80$/', '', $_SERVER['HTTP_HOST']);
    }
}

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

$app->handleRequest(Request::capture());
