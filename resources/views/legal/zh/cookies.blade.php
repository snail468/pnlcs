<p>本政策旨在说明 {{ $company['website'] }} 网站所使用的 Cookie 及类似本地存储技术。首先向您明确说明：<strong>本网站绝不植入任何跨站广告 Cookie、追踪像素或第三方用户行为分析插件。</strong>我们使用的每一个 Cookie，要么是保障网站正常交互所绝对必需的核心凭证，要么用于记录您主动选定的显示偏好。</p>

<h2>1. 什么是 Cookie</h2>
<p>Cookie 是您在浏览网页时，由网站发送并保存在您浏览器本地的小型文本文件。当您再次访问或在页面间跳转时，浏览器将携带这些凭据以供服务器识别 — 例如识别您已成功登录的身份会话，或记忆您选定的界面语言。</p>

<h2>2. 本站使用的 Cookie 明细清单</h2>
<table>
    <thead><tr><th>Cookie 名称</th><th>核心作用</th><th>有效期</th><th>属性类别</th></tr></thead>
    <tbody>
        <tr>
            <td><code>{{ config('session.cookie') }}</code></td>
            <td>用于保持您的用户登录会话状态。若禁用此项，您将无法登录客户中心或管理面板。</td>
            <td>2 小时</td>
            <td>绝对必要型（Strictly Necessary）</td>
        </tr>
        <tr>
            <td><code>XSRF-TOKEN</code></td>
            <td>用于防御跨站请求伪造（CSRF）攻击，保障表单提交与资金交互的账户安全性。</td>
            <td>2 小时</td>
            <td>绝对必要型（Strictly Necessary）</td>
        </tr>
        <tr>
            <td><code>pnlcs_locale</code></td>
            <td>记录您所选定的界面语言（例如简体中文），避免每次页面刷新都重复选择。</td>
            <td>30 天</td>
            <td>用户偏好型（Preference）</td>
        </tr>
        <tr>
            <td><code>pnlcs_theme</code></td>
            <td>记录您对明亮（浅色）或黑暗（深色）主题风格的喜好偏好。</td>
            <td>浏览器关闭即失效</td>
            <td>用户偏好型（Preference）</td>
        </tr>
        <tr>
            <td><code>pnlcs_aff</code></td>
            <td>若您是通过合作伙伴推广链接访问，用于记录推荐人来源以便准确核算佣金分成。仅在点击推广链接时触发。</td>
            <td>90 天</td>
            <td>功能型（Functional）</td>
        </tr>
    </tbody>
</table>

<h2>3. 我们坚决不使用的技术</h2>
<p>为了切实保护您的隐私与访问宁静，我们郑重承诺 — <strong>本站绝不包含</strong>下列任何技术：</p>
<ul>
    <li>Google Analytics、百度统计等任何第三方网页埋点分析；</li>
    <li>Facebook Pixel、Google Ads、TikTok 等广告转化与再营销追踪探针；</li>
    <li>跨站重定向与精准广告 Cookie；</li>
    <li>网站鼠标热力图（Heatmaps）、屏幕录制及窥探式行为回放插件；</li>
    <li>任何将浏览数据转卖或共享给广告联盟的行为。</li>
</ul>
<p>由于本站仅使用绝对必要的系统 Cookie 及您明确选定的本地偏好，依据欧盟 GDPR 及 ePrivacy 指令，此类 Cookie<strong>依法无需弹窗强制要求预先授权同意</strong>，因此我们不向您展示烦人的全屏 Cookie 授权横幅。如果我们未来引入任何需授权的分析组件，必定会先获得您的明确许可并同步更新此页面。</p>

<h2>4. 第三方静态网络资源</h2>
<p>为了保障美观的字体排版与快速的全球加载，网页会加载以下两处外部公共 CDN 资源。这些资源本身不会在您的电脑中植入任何 Cookie，但您的浏览器在向其发起请求时会传输 IP 地址：</p>
<ul>
    <li><strong>Google Fonts</strong>（<code>fonts.googleapis.com</code>, <code>fonts.gstatic.com</code>）— 提供现代化 Web 字体显示；</li>
    <li><strong>jsDelivr CDN</strong>（<code>cdn.jsdelivr.net</code>）— 加载轻量级矢量图标库与前端交互脚本。</li>
</ul>

<h2>5. 如何在浏览器中管理与清除 Cookie</h2>
<p>您完全可以通过浏览器的设置菜单，随时查看、删除或全局禁用 Cookie：</p>
<ul>
    <li><strong>Google Chrome：</strong>设置 &rsaquo; 隐私和安全 &rsaquo; 第三方 Cookie 与网站数据</li>
    <li><strong>Mozilla Firefox：</strong>设置 &rsaquo; 隐私与安全 &rsaquo; Cookie 和网站数据</li>
    <li><strong>Apple Safari：</strong>偏好设置 &rsaquo; 隐私 &rsaquo; 阻止所有 Cookie</li>
    <li><strong>Microsoft Edge：</strong>设置 &rsaquo; Cookie 和网站权限</li>
</ul>
<div class="legal-note">
    <p>请注意：若您选择在浏览器中全面禁用所有 Cookie，您将无法登录客户中心、无法提交订单，也无法创建技术工单。因为会话与防伪令牌是 Web 系统正常交互所必需的技术基础。</p>
</div>

<h2>6. 关联政策文件</h2>
<p>了解本公司如何依法收集与保护客户全部个人数据，请参阅完整的<a href="{{ route('legal.show', 'privacy') }}">《隐私政策》</a>。</p>
