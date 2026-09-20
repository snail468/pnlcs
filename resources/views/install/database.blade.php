@extends('install.layout', ['step' => 'database'])
@section('title', '数据库配置')
@section('content')
    <h2 class="text-xl font-semibold text-slate-900 mb-1">数据库连接配置</h2>
    <p class="text-slate-600 text-sm mb-6">请输入 MySQL / MariaDB 数据库连接信息。请确保目标数据库已预先创建，向导将自动执行数据表迁移与初始化。</p>

    <form method="POST" action="/install/database" class="space-y-4">
        @csrf
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="text-sm font-medium text-slate-700">数据库主机 (Host)</label>
                <input type="text" name="host" value="{{ old('host', $host) }}" required class="mt-1 w-full px-3 py-2 border border-slate-300 rounded text-sm focus:ring-blue-500 focus:border-blue-500">
                <p class="text-xs text-slate-500 mt-1">Docker 容器环境请填写 <code>db</code>，本地环境填 <code>127.0.0.1</code></p>
            </div>
            <div>
                <label class="text-sm font-medium text-slate-700">端口号 (Port)</label>
                <input type="number" name="port" value="{{ old('port', $port) }}" required class="mt-1 w-full px-3 py-2 border border-slate-300 rounded text-sm focus:ring-blue-500 focus:border-blue-500">
                <p class="text-xs text-slate-500 mt-1">默认 MySQL / MariaDB 端口为 <code>3306</code></p>
            </div>
        </div>
        <div>
            <label class="text-sm font-medium text-slate-700">数据库名称 (Database Name)</label>
            <input type="text" name="database" value="{{ old('database', $database) }}" required class="mt-1 w-full px-3 py-2 border border-slate-300 rounded text-sm focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="text-sm font-medium text-slate-700">数据库用户名 (Username)</label>
                <input type="text" name="username" value="{{ old('username', $username) }}" required class="mt-1 w-full px-3 py-2 border border-slate-300 rounded text-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label class="text-sm font-medium text-slate-700">数据库密码 (Password)</label>
                <input type="password" name="password" value="{{ old('password', $password ?? '') }}" class="mt-1 w-full px-3 py-2 border border-slate-300 rounded text-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
        </div>

        <div id="test-result" class="hidden p-3 rounded text-sm"></div>

        <div class="flex gap-3 pt-2">
            <button type="button" id="test-btn" class="px-4 py-2 bg-slate-200 text-slate-700 text-sm font-semibold rounded hover:bg-slate-300">
                测试连接
            </button>
            <button type="submit" class="px-5 py-2 bg-blue-600 text-white text-sm font-semibold rounded hover:bg-blue-700">
                保存并执行数据表迁移 →
            </button>
        </div>
    </form>

    <script>
        document.getElementById('test-btn').addEventListener('click', async () => {
            const form = document.querySelector('form');
            const fd = new FormData(form);
            const res = document.getElementById('test-result');
            res.className = 'p-3 rounded text-sm bg-slate-100 text-slate-700';
            res.textContent = '正在测试数据库连接，请稍候...';
            res.classList.remove('hidden');
            try {
                const resp = await fetch('/install/database/test', {
                    method: 'POST',
                    headers: {'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content, 'Accept': 'application/json'},
                    body: fd,
                });
                const data = await resp.json();
                res.className = 'p-3 rounded text-sm ' + (resp.ok ? 'bg-green-50 text-green-800 border border-green-200' : 'bg-red-50 text-red-800 border border-red-200');
                res.textContent = (resp.ok ? '✓ 连接成功！数据库凭据正确。' : '✗ 连接失败：') + (resp.ok ? '' : data.message);
            } catch (e) {
                res.className = 'p-3 rounded text-sm bg-red-50 text-red-800 border border-red-200';
                res.textContent = '✗ 连接异常：' + e.message;
            }
        });
    </script>
@endsection
