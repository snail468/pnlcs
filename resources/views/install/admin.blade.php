@extends('install.layout', ['step' => 'admin'])
@section('title', '创建超级管理员账户')
@section('content')
    <h2 class="text-xl font-semibold text-slate-900 mb-1">创建超级管理员账户</h2>
    <p class="text-slate-600 text-sm mb-6">该账户拥有对管理后台（Admin Area）的所有最高权限，请妥善保管凭据。</p>

    <form method="POST" action="/install/admin" class="space-y-4">
        @csrf
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="text-sm font-medium text-slate-700">管理员用户名</label>
                <input type="text" name="username" value="{{ old('username', 'admin') }}" required class="mt-1 w-full px-3 py-2 border border-slate-300 rounded text-sm focus:ring-blue-500 focus:border-blue-500">
                <p class="text-xs text-slate-500 mt-1">仅支持字母、数字、破折号与下划线</p>
            </div>
            <div>
                <label class="text-sm font-medium text-slate-700">管理员电子邮箱</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="mt-1 w-full px-3 py-2 border border-slate-300 rounded text-sm focus:ring-blue-500 focus:border-blue-500" placeholder="admin@yourdomain.com">
                <p class="text-xs text-slate-500 mt-1">用于接收系统关键通知与找回密码</p>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="text-sm font-medium text-slate-700">姓氏 (First Name)</label>
                <input type="text" name="first_name" value="{{ old('first_name', '系统') }}" required class="mt-1 w-full px-3 py-2 border border-slate-300 rounded text-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label class="text-sm font-medium text-slate-700">名字 (Last Name)</label>
                <input type="text" name="last_name" value="{{ old('last_name', '管理员') }}" class="mt-1 w-full px-3 py-2 border border-slate-300 rounded text-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="text-sm font-medium text-slate-700">登录密码</label>
                <input type="password" name="password" required minlength="6" class="mt-1 w-full px-3 py-2 border border-slate-300 rounded text-sm focus:ring-blue-500 focus:border-blue-500" placeholder="至少 6 位字符">
            </div>
            <div>
                <label class="text-sm font-medium text-slate-700">确认登录密码</label>
                <input type="password" name="password_confirmation" required minlength="6" class="mt-1 w-full px-3 py-2 border border-slate-300 rounded text-sm focus:ring-blue-500 focus:border-blue-500" placeholder="再次输入密码">
            </div>
        </div>

        <div class="flex gap-3 pt-2">
            <button type="submit" class="px-5 py-2 bg-blue-600 text-white text-sm font-semibold rounded hover:bg-blue-700">
                创建管理员并进入下一步 →
            </button>
        </div>
    </form>
@endsection
