@extends('install.layout', ['step' => 'finish'])
@section('title', '安装完成')
@section('content')
    <div class="text-center py-6">
        <div class="w-16 h-16 mx-auto rounded-full bg-green-100 text-green-600 flex items-center justify-center text-3xl mb-4">✓</div>
        <h2 class="text-2xl font-bold text-slate-900 mb-2">PNLCS 安装成功！</h2>
        <p class="text-slate-600 mb-6">系统已成功初始化就绪。为保证服务器安全，安装向导已被永久锁定禁用。</p>

        <div class="bg-slate-50 border border-slate-200 rounded p-4 max-w-md mx-auto mb-6 text-left text-sm">
            <div class="text-slate-700 font-semibold mb-2">接下来建议进行以下配置：</div>
            <ul class="text-slate-600 space-y-1.5">
                <li>1. 使用管理员账号 <code class="bg-white px-2 py-0.5 rounded border border-slate-200 text-blue-600 font-medium">{{ $username }}</code> 登录管理后台</li>
                <li>2. 在系统设置中配置 SMTP 发信服务（保障账单与通知投递）</li>
                <li>3. 接入至少一种在线支付网关（如 Stripe、PayPal 或线下转账）</li>
                <li>4. 连接服务器节点模块（Panelica / cPanel / Plesk / Proxmox）并创建主机销售方案</li>
            </ul>
        </div>

        <a href="/admin/login" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-semibold rounded hover:bg-blue-700">
            进入管理员登录页面 →
        </a>
    </div>
@endsection
