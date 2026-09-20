@extends('install.layout', ['step' => 'requirements'])
@section('title', '系统环境检测')
@section('content')
    <h2 class="text-xl font-semibold text-slate-900 mb-1">系统运行环境检测</h2>
    <p class="text-slate-600 text-sm mb-6">在开始安装前，请确认当前运行环境满足 PNLCS 的基本要求。</p>

    <div class="space-y-3 mb-6">
        <div class="flex items-center justify-between p-3 rounded border {{ $phpOk ? 'border-green-200 bg-green-50' : 'border-red-200 bg-red-50' }}">
            <span class="text-sm font-medium text-slate-700">PHP 版本要求 (&ge; 8.4)</span>
            <span class="text-sm {{ $phpOk ? 'text-green-700 font-semibold' : 'text-red-700 font-semibold' }}">{{ $phpOk ? '✓ 满足要求' : '✗ 版本过低' }} (当前 PHP {{ $php }})</span>
        </div>

        <div class="border border-slate-200 rounded p-3">
            <div class="text-sm font-medium text-slate-700 mb-2">PHP 扩展模块检测</div>
            <div class="grid grid-cols-3 gap-2">
                @foreach($extensions as $ext => $ok)
                    <span class="text-xs px-2 py-1 rounded {{ $ok ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ $ok ? '✓' : '✗' }} {{ $ext }}
                    </span>
                @endforeach
            </div>
        </div>

        <div class="border border-slate-200 rounded p-3">
            <div class="text-sm font-medium text-slate-700 mb-2">关键目录可写权限</div>
            @foreach($writable as $path => $ok)
                <div class="text-xs flex justify-between py-0.5">
                    <code class="text-slate-600">{{ $path }}</code>
                    <span class="{{ $ok ? 'text-green-700' : 'text-red-700' }}">{{ $ok ? '✓ 拥有写入权限' : '✗ 权限不足（不可写）' }}</span>
                </div>
            @endforeach
        </div>

        <div class="border border-slate-200 rounded p-3">
            <div class="text-sm font-medium text-slate-700 mb-2">静态构建资源与依赖文件</div>
            @foreach($assets as $path => $ok)
                <div class="text-xs flex justify-between py-0.5">
                    <code class="text-slate-600">{{ $path }}</code>
                    <span class="{{ $ok ? 'text-green-700' : 'text-red-700' }}">{{ $ok ? '✓ 文件就绪' : '✗ 缺失 — 请运行 composer install / npm run build' }}</span>
                </div>
            @endforeach
        </div>
    </div>

    @if($allOk)
        <a href="/install/database" class="inline-flex items-center px-5 py-2.5 bg-blue-600 text-white text-sm font-semibold rounded hover:bg-blue-700">
            环境检测通过，进入数据库配置 →
        </a>
    @else
        <div class="p-3 rounded bg-amber-50 border border-amber-200 text-amber-800 text-sm">
            部分必要依赖或权限未满足要求，请根据上方红字提示排查后刷新此页面重试。
        </div>
        <a href="/install/requirements" class="mt-4 inline-flex items-center px-5 py-2.5 bg-slate-200 text-slate-700 text-sm font-semibold rounded hover:bg-slate-300">
            重新检测
        </a>
    @endif
@endsection
