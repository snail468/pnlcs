@extends('install.layout', ['step' => 'app'])
@section('title', '系统基础设置')
@section('content')
    <h2 class="text-xl font-semibold text-slate-900 mb-1">系统基础信息设置</h2>
    <p class="text-slate-600 text-sm mb-6">最后一步：配置平台对外访问地址、品牌名称与系统默认语言。</p>

    <form method="POST" action="/install/app" class="space-y-4">
        @csrf
        <div>
            <label class="text-sm font-medium text-slate-700">平台访问基础 URL</label>
            <input type="url" name="app_url" value="{{ old('app_url', $app_url) }}" required class="mt-1 w-full px-3 py-2 border border-slate-300 rounded text-sm focus:ring-blue-500 focus:border-blue-500">
            <p class="text-xs text-slate-500 mt-1">客户与管理员访问此 PNLCS 系统的公网完整网址（例如：<code>https://billing.example.com</code> 或 <code>http://IP:8090</code>，末尾不要带斜杠）。</p>
        </div>
        <div>
            <label class="text-sm font-medium text-slate-700">系统/品牌名称</label>
            <input type="text" name="app_name" value="{{ old('app_name', $app_name) }}" required class="mt-1 w-full px-3 py-2 border border-slate-300 rounded text-sm focus:ring-blue-500 focus:border-blue-500">
            <p class="text-xs text-slate-500 mt-1">对外展示的云主机平台/IDC 品牌名称（例如：<code>PNLCS 云计算</code>）。</p>
        </div>
        <div>
            <label class="text-sm font-medium text-slate-700">系统默认语言 (Default Locale)</label>
            <select name="app_locale" class="mt-1 w-full px-3 py-2 border border-slate-300 rounded text-sm focus:ring-blue-500 focus:border-blue-500">
                <option value="zh" {{ ($app_locale === 'zh' || empty($app_locale)) ? 'selected' : '' }}>简体中文 (Simplified Chinese)</option>
                <option value="en" {{ $app_locale === 'en' ? 'selected' : '' }}>English (英文)</option>
                <option value="tr" {{ $app_locale === 'tr' ? 'selected' : '' }}>Türkçe (土耳其语)</option>
                <option value="de">Deutsch (德语)</option>
                <option value="fr">Français (法语)</option>
                <option value="es">Español (西班牙语)</option>
                <option value="it">Italiano (意大利语)</option>
                <option value="ru">Русский (俄语)</option>
                <option value="pt-br">Português - BR (巴西葡萄牙语)</option>
                <option value="nl">Nederlands (荷兰语)</option>
                <option value="pl">Polski (波兰语)</option>
                <option value="cs">Čeština (捷克语)</option>
            </select>
            <p class="text-xs text-slate-500 mt-1">前台客户门户与管理后台默认使用的初始界面语言。</p>
        </div>

        <div class="flex gap-3 pt-2">
            <button type="submit" class="px-5 py-2 bg-blue-600 text-white text-sm font-semibold rounded hover:bg-blue-700">
                完成安装并锁定向导 →
            </button>
        </div>
    </form>
@endsection
