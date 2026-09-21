{{--
     E-posta kurulum rehberi.

     Sayfadaki her sunucu adı, port ve güvenlik tipi canlı sistemden
     doğrulanarak yazıldı: dovecot 993/995 SSL, postfix 465 SSL ve 587
     STARTTLS dinliyor, sertifika mail/webmail/autoconfig/autodiscover
     adlarını kapsıyor. Sunucunun davranışı değişirse bu metin de
     değişmeli, tersi değil.

     legal.layout paylaşılıyor: Yasal belgeler, Hakkımızda ve SSL
     sayfaları da aynı düzeni kullanıyor.
--}}
@extends('legal.layout')

@php
    $locale = app()->getLocale();
    $isZh = $locale === 'zh';
    $isTr = $locale === 'tr';
@endphp

@section('legal-title', $isZh ? '企业邮箱客户端配置指南' : ($isTr ? 'E-posta Kurulumu' : 'Email Setup'))
@section('legal-description', $isZh
    ? '在 Outlook、iPhone、Android 及 Thunderbird 等邮件客户端中配置托管企业邮箱所需的服务器地址、端口号与 SSL 加密参数。'
    : ($isTr
        ? 'Hosting hesabınızdaki e-posta adresini Outlook, iPhone, Android ve Thunderbird üzerinde kurmak için gereken sunucu adı, port ve güvenlik ayarları.'
        : 'The server name, ports and security settings needed to set up your hosting mailbox in Outlook, iPhone, Android and Thunderbird.'))

@section('legal-content')
    <div class="legal-head">
        <h1>{{ $isZh ? '企业邮箱客户端配置指南' : ($isTr ? 'E-posta Kurulumu' : 'Email Setup') }}</h1>
        <p>
            {{ $isZh
                ? '本页面汇集了在手机与电脑邮件客户端中收发企业邮箱所需的全部连接参数。对于现代客户端，通常只需输入完整邮箱地址与密码，系统即可通过 Autodiscover 自动识别并完成配置。'
                : ($isTr
                    ? 'Hesabınızda açtığınız e-posta adresini telefonunuzda ve bilgisayarınızdaki posta programında kullanmak için gereken her şey bu sayfada. Çoğu programda adres ile parolayı yazmanız yeterli, ayarları kendisi buluyor.'
                    : 'Everything you need to use your mailbox on your phone and in your desktop mail program is on this page. In most programs, entering the address and password is enough — the settings are found automatically.') }}
        </p>
    </div>

    <div class="legal-grid">
        <nav class="legal-side">
            <p class="legal-side-title">{{ $isZh ? '本页导览' : ($isTr ? 'BU SAYFADA' : 'ON THIS PAGE') }}</p>
            <a href="#ayarlar">{{ $isZh ? '核心服务器参数' : ($isTr ? 'Sunucu ayarları' : 'Server settings') }}</a>
            <a href="#otomatik">{{ $isZh ? '自动发现配置' : ($isTr ? 'Otomatik kurulum' : 'Automatic setup') }}</a>
            <a href="#outlook">Outlook</a>
            <a href="#iphone">{{ $isZh ? 'iPhone 与 iPad' : ($isTr ? 'iPhone ve iPad' : 'iPhone and iPad') }}</a>
            <a href="#android">Android</a>
            <a href="#thunderbird">Thunderbird</a>
            <a href="#webmail">{{ $isZh ? '网页邮箱 Webmail' : ($isTr ? 'Tarayıcıdan e-posta' : 'Email in the browser') }}</a>
            <a href="#imap-pop3">{{ $isZh ? 'IMAP 与 POP3 对比' : ($isTr ? 'IMAP mi POP3 mü' : 'IMAP or POP3') }}</a>
            <a href="#sorunlar">{{ $isZh ? '常见问题排查' : ($isTr ? 'Sık karşılaşılan sorunlar' : 'Common problems') }}</a>
        </nav>

        <article class="legal-body">
            <h2 id="ayarlar">{{ $isZh ? '核心服务器参数' : ($isTr ? 'Sunucu ayarları' : 'Server settings') }}</h2>

            @if($isZh)
                <p>无论您使用何种客户端软件或手机系统，均使用下列标准连接参数。接收与发送服务器主机名完全一致，仅端口号与加密协议有所区别：</p>
            @elseif($isTr)
                <p>Hangi programı kullanırsanız kullanın, girilecek değerler bunlar. Gelen ve giden sunucu adı aynı; değişen sadece port ve protokol.</p>
            @else
                <p>Whichever program you use, these are the values to enter. The incoming and outgoing server names are the same; only the port and protocol differ.</p>
            @endif

            <table>
                <thead>
                    <tr>
                        <th>{{ $isZh ? '协议与用途' : ($isTr ? 'Ne için' : 'Purpose') }}</th>
                        <th>{{ $isZh ? '服务器主机名' : ($isTr ? 'Sunucu' : 'Server') }}</th>
                        <th>{{ $isZh ? '端口' : ($isTr ? 'Port' : 'Port') }}</th>
                        <th>{{ $isZh ? '安全加密' : ($isTr ? 'Güvenlik' : 'Security') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>IMAP</strong><br><span style="opacity:.7">{{ $isZh ? '接收邮件 — 强烈推荐' : ($isTr ? 'gelen posta — önerilen' : 'incoming — recommended') }}</span></td>
                        <td>{{ $mail['host'] }}</td>
                        <td><strong>993</strong></td>
                        <td>SSL/TLS</td>
                    </tr>
                    <tr>
                        <td><strong>POP3</strong><br><span style="opacity:.7">{{ $isZh ? '接收邮件 — 离线备选' : ($isTr ? 'gelen posta — alternatif' : 'incoming — alternative') }}</span></td>
                        <td>{{ $mail['host'] }}</td>
                        <td><strong>995</strong></td>
                        <td>SSL/TLS</td>
                    </tr>
                    <tr>
                        <td><strong>SMTP</strong><br><span style="opacity:.7">{{ $isZh ? '发送邮件 — 标准端口' : ($isTr ? 'giden posta' : 'outgoing') }}</span></td>
                        <td>{{ $mail['host'] }}</td>
                        <td><strong>465</strong></td>
                        <td>SSL/TLS</td>
                    </tr>
                    <tr>
                        <td><strong>SMTP</strong><br><span style="opacity:.7">{{ $isZh ? '发送邮件 — 备用端口' : ($isTr ? 'giden posta — alternatif' : 'outgoing — alternative') }}</span></td>
                        <td>{{ $mail['host'] }}</td>
                        <td><strong>587</strong></td>
                        <td>STARTTLS</td>
                    </tr>
                </tbody>
            </table>

            @if($isZh)
                <ul>
                    <li><strong>用户名：请务必输入完整邮箱地址。</strong>绝不能只输入 <code>@</code> 前缀部分 — 必须完整输入如 <code>info@{{ $mail['domain'] }}</code>。这是配置中最常见的失误。</li>
                    <li><strong>密码：</strong>在控制面板创建该邮箱账号时设置的独立邮箱密码，而非客户中心账户的登录密码。</li>
                    <li><strong>发件服务器（SMTP）必须启用身份验证</strong>，且勾选“使用与接收邮件服务器相同的设置”。若未开启验证，将无法成功发送邮件。</li>
                    <li>全程采用 <strong>TLS 1.2 及以上</strong>高强度加密传输。证书由全球受信任的 Let's Encrypt 颁发，客户端不会弹出不受信任证书警告。</li>
                </ul>

                <div class="legal-note">
                    <p style="margin:0">请在服务器主机名一栏统一填写 <strong>{{ $mail['host'] }}</strong>，切勿填写您自己的独立域名。虽然解析指向相同，但权威 SSL 证书是与服务器主机名绑定的；若填写您自己的域名，客户端可能会弹出主机名不匹配的安全警告。</p>
                </div>
            @elseif($isTr)
                <ul>
                    <li><strong>Kullanıcı adı: e-posta adresinizin tamamı.</strong> Sadece soldaki kısım değil — <code>info@{{ $mail['domain'] }}</code> gibi, <code>@</code> ve sonrasıyla birlikte. En sık yapılan hata budur.</li>
                    <li><strong>Parola:</strong> e-posta kutusunu açarken belirlediğiniz parola. Müşteri panelindeki hesap parolanız değil.</li>
                    <li><strong>Giden sunucu kimlik doğrulaması açık olmalı</strong> ve gelen sunucuyla aynı kullanıcı adı ile parolayı kullanmalı. Kapalıysa posta gönderemezsiniz.</li>
                    <li>Bağlantı <strong>TLS 1.2 ve üzeri</strong> ile şifreleniyor. Sertifika Let's Encrypt tarafından veriliyor, program uyarı vermez.</li>
                </ul>

                <div class="legal-note">
                    <p style="margin:0">Sunucu adı olarak kendi alan adınızı değil, <strong>{{ $mail['host'] }}</strong> yazın. Alan adınızın postası bu sunucuya düşse de sertifika bu ada verilmiştir; başka bir ad yazarsanız programınız güvenlik uyarısı gösterir.</p>
                </div>
            @else
                <ul>
                    <li><strong>Username: your full email address.</strong> Not just the part before the <code>@</code> — enter it as <code>info@{{ $mail['domain'] }}</code>. This is the most common mistake.</li>
                    <li><strong>Password:</strong> the password you set when creating the mailbox. Not your client area password.</li>
                    <li><strong>Outgoing server authentication must be enabled</strong>, using the same username and password as the incoming server. Without it you cannot send mail.</li>
                    <li>Connections are encrypted with <strong>TLS 1.2 or newer</strong>. The certificate is issued by Let's Encrypt, so your program will not warn you.</li>
                </ul>

                <div class="legal-note">
                    <p style="margin:0">Enter <strong>{{ $mail['host'] }}</strong> as the server name, not your own domain. Even though your domain's mail is delivered here, the certificate is issued for this name; any other name will make your program show a security warning.</p>
                </div>
            @endif

            <h2 id="otomatik">{{ $isZh ? '自动发现配置' : ($isTr ? 'Otomatik kurulum' : 'Automatic setup') }}</h2>

            @if($isZh)
                <p>Microsoft Outlook、Mozilla Thunderbird 及 Apple 邮件客户端均内置支持服务端自动发现协议（Autodiscover / Autoconfig）。在绝大多数情况下，您只需<strong>输入完整邮箱地址与密码</strong>，软件即可自动向服务器获取全部端口与加密参数，无需手动繁琐填写。</p>
                <p>若由于本地网络限制或旧版软件未能成功自动识别，客户端将提示您手动输入参数。届时请参考上方表格填写，各常见客户端的具体操作步骤如下：</p>
            @elseif($isTr)
                <p>Outlook, Thunderbird ve Apple Mail ayarları sunucudan kendisi sorabiliyor. Bu programlarda çoğu zaman <strong>e-posta adresi ile parolayı yazmanız yeterli</strong>; sunucu adını ve portları elle girmenize gerek kalmaz.</p>
                <p>Otomatik kurulum bir sebeple çalışmazsa program sizden ayarları isteyecektir. O zaman yukarıdaki tabloyu kullanın; aşağıdaki bölümlerde her program için adımlar var.</p>
            @else
                <p>Outlook, Thunderbird and Apple Mail can ask the server for the settings themselves. In these programs it is usually enough to <strong>enter your email address and password</strong> — you do not need to type the server name or ports.</p>
                <p>If automatic setup does not work for some reason, the program will ask you for the settings. Use the table above; the sections below give the steps for each program.</p>
            @endif

            <h2 id="outlook">Outlook</h2>

            @if($isZh)
                <h3>新版 Outlook 与 Microsoft 365</h3>
                <ol>
                    <li>启动 Outlook，点击菜单栏 <strong>文件 &rarr; 添加账户</strong>。</li>
                    <li>输入您的完整邮箱地址，点击 <strong>连接</strong>。</li>
                    <li>输入邮箱密码。Outlook 将自动从服务器获取配置并完成绑定。</li>
                </ol>
                <p>若 Outlook 无法自动探测到服务器并要求选择账户类型，请选择 <strong>IMAP</strong> 并按照上方表格填写。</p>

                <h3>经典版 Outlook 手动配置</h3>
                <ol>
                    <li>点击 <strong>文件 &rarr; 添加账户</strong>，输入完整邮箱地址。</li>
                    <li>展开 <strong>高级选项</strong>，勾选 <strong>“让我手动设置我的账户”</strong>，点击 <strong>连接</strong>。</li>
                    <li>在账户类型列表中选择 <strong>IMAP</strong>。</li>
                    <li>接收邮件服务器：<code>{{ $mail['host'] }}</code>，端口 <strong>993</strong>，加密方法选择 <strong>SSL/TLS</strong>。</li>
                    <li>发送邮件服务器：<code>{{ $mail['host'] }}</code>，端口 <strong>465</strong>，加密方法选择 <strong>SSL/TLS</strong>。</li>
                    <li>点击 <strong>下一步</strong>，输入邮箱密码后完成添加。</li>
                </ol>
                <p>在用户名一栏中请确认输入的是完整邮箱地址。在发送服务器设置中，确保已勾选<strong>“我的发送服务器 (SMTP) 要求验证”</strong>，并选择<strong>“使用与接收邮件服务器相同的设置”</strong>。</p>
            @elseif($isTr)
                <h3>Yeni Outlook ve Microsoft 365</h3>
                <ol>
                    <li>Outlook'u açın, <strong>Dosya &rarr; Hesap Ekle</strong> yolunu izleyin.</li>
                    <li>E-posta adresinizi yazıp <strong>Bağlan</strong>'a basın.</li>
                    <li>Parolanızı girin. Outlook ayarları sunucudan kendisi alır ve kurulum biter.</li>
                </ol>
                <p>Outlook ayarları bulamaz ve hesap türü sorarsa <strong>IMAP</strong>'i seçip yukarıdaki tabloyu doldurun.</p>

                <h3>Elle kurulum (klasik Outlook)</h3>
                <ol>
                    <li><strong>Dosya &rarr; Hesap Ekle</strong>, e-posta adresinizi yazın.</li>
                    <li><strong>Gelişmiş seçenekler</strong>'i açıp <strong>Hesabımı el ile ayarlamama izin ver</strong> kutusunu işaretleyin, <strong>Bağlan</strong>'a basın.</li>
                    <li>Hesap türü olarak <strong>IMAP</strong>'i seçin.</li>
                    <li>Gelen posta: <code>{{ $mail['host'] }}</code>, port <strong>993</strong>, şifreleme <strong>SSL/TLS</strong>.</li>
                    <li>Giden posta: <code>{{ $mail['host'] }}</code>, port <strong>465</strong>, şifreleme <strong>SSL/TLS</strong>.</li>
                    <li><strong>Bağlan</strong>'a basıp parolanızı girin.</li>
                </ol>
                <p>Kullanıcı adı sorulduğunda e-posta adresinizin tamamını yazın. Giden sunucu ayarlarında <strong>“Giden sunucum (SMTP) kimlik doğrulaması gerektiriyor”</strong> seçeneğinin işaretli, <strong>“Gelen posta sunucumla aynı ayarları kullan”</strong> seçili olduğundan emin olun.</p>
            @else
                <h3>New Outlook and Microsoft 365</h3>
                <ol>
                    <li>Open Outlook and go to <strong>File &rarr; Add Account</strong>.</li>
                    <li>Enter your email address and click <strong>Connect</strong>.</li>
                    <li>Enter your password. Outlook fetches the settings from the server and finishes the setup.</li>
                </ol>
                <p>If Outlook cannot find the settings and asks for an account type, choose <strong>IMAP</strong> and fill in the table above.</p>

                <h3>Manual setup (classic Outlook)</h3>
                <ol>
                    <li><strong>File &rarr; Add Account</strong>, then enter your email address.</li>
                    <li>Open <strong>Advanced options</strong>, tick <strong>Let me set up my account manually</strong> and click <strong>Connect</strong>.</li>
                    <li>Choose <strong>IMAP</strong> as the account type.</li>
                    <li>Incoming: <code>{{ $mail['host'] }}</code>, port <strong>993</strong>, encryption <strong>SSL/TLS</strong>.</li>
                    <li>Outgoing: <code>{{ $mail['host'] }}</code>, port <strong>465</strong>, encryption <strong>SSL/TLS</strong>.</li>
                    <li>Click <strong>Connect</strong> and enter your password.</li>
                </ol>
                <p>When asked for a username, enter your full email address. In the outgoing server settings, make sure <strong>“My outgoing server (SMTP) requires authentication”</strong> is ticked and <strong>“Use same settings as my incoming mail server”</strong> is selected.</p>
            @endif

            <h2 id="iphone">{{ $isZh ? 'iPhone 与 iPad' : ($isTr ? 'iPhone ve iPad' : 'iPhone and iPad') }}</h2>

            @if($isZh)
                <ol>
                    <li>打开设备 <strong>设置</strong>。iOS 18 及更高版本请进入 <strong>App &rarr; 邮件</strong>；旧版本请直接点击 <strong>邮件</strong>。</li>
                    <li>点击 <strong>邮件账户 &rarr; 添加账户 &rarr; 其他 &rarr; 添加邮件账户</strong>。</li>
                    <li>填写您的显示姓名、完整邮箱地址与密码，点击右上角 <strong>下一步</strong>。</li>
                    <li>在顶部标签栏中确认选中的是 <strong>IMAP</strong>。</li>
                    <li>在 <strong>收件服务器</strong> 和 <strong>发件服务器</strong> 两栏中，主机名均填写 <code>{{ $mail['host'] }}</code>，用户名均填写完整邮箱地址，密码填写邮箱密码。</li>
                    <li>点击 <strong>下一步</strong>，系统验证连接通过后，点击 <strong>存储</strong> 即可。</li>
                </ol>
                <p>请注意：虽然发件服务器下方的“用户名”和“密码”标有“选填”，但<strong>实际必须全部完整填写</strong>；若留空，您在手机上将无法发送外部邮件。</p>
            @elseif($isTr)
                <ol>
                    <li><strong>Ayarlar</strong>'ı açın. iOS 18 ve sonrasında <strong>Uygulamalar &rarr; Mail</strong>, daha eski sürümlerde doğrudan <strong>Mail</strong>'e girin.</li>
                    <li><strong>Mail Hesapları &rarr; Hesap Ekle &rarr; Diğer &rarr; Mail Hesabı Ekle</strong>.</li>
                    <li>Adınızı, e-posta adresinizi ve parolanızı yazıp <strong>İleri</strong>'ye dokunun.</li>
                    <li>Üstteki sekmelerden <strong>IMAP</strong>'in seçili olduğundan emin olun.</li>
                    <li><strong>Gelen Postalar Sunucusu</strong> ve <strong>Giden Postalar Sunucusu</strong> alanlarının ikisine de sunucu adı olarak <code>{{ $mail['host'] }}</code>, kullanıcı adı olarak e-posta adresinizin tamamını, parola olarak da kutu parolanızı yazın.</li>
                    <li><strong>İleri</strong>'ye dokunun, doğrulama bitince <strong>Kaydet</strong>'e basın.</li>
                </ol>
                <p>Giden sunucu bölümünde kullanıcı adı ve parola “isteğe bağlı” görünse de <strong>ikisini de doldurmanız gerekiyor</strong>; boş bırakırsanız telefondan posta gönderemezsiniz.</p>
            @else
                <ol>
                    <li>Open <strong>Settings</strong>. On iOS 18 and later go to <strong>Apps &rarr; Mail</strong>; on earlier versions go straight to <strong>Mail</strong>.</li>
                    <li><strong>Mail Accounts &rarr; Add Account &rarr; Other &rarr; Add Mail Account</strong>.</li>
                    <li>Enter your name, email address and password, then tap <strong>Next</strong>.</li>
                    <li>Make sure <strong>IMAP</strong> is selected in the tabs at the top.</li>
                    <li>For both <strong>Incoming Mail Server</strong> and <strong>Outgoing Mail Server</strong>, enter <code>{{ $mail['host'] }}</code> as the host name, your full email address as the username, and your mailbox password.</li>
                    <li>Tap <strong>Next</strong>, and once verification finishes tap <strong>Save</strong>.</li>
                </ol>
                <p>Although the username and password look optional under the outgoing server, <strong>you must fill in both</strong>; leaving them empty means you cannot send mail from the phone.</p>
            @endif

            <h2 id="android">Android</h2>

            @if($isZh)
                <p>以下以官方 Gmail 客户端为例。在三星邮件（Samsung Email）或其他客户端中界面略有差异，但所需配置参数完全一致：</p>
                <ol>
                    <li>打开 Gmail App，点击右上角个人头像，选择 <strong>添加其他账户</strong>。</li>
                    <li>在列表底部选择 <strong>其他</strong>。</li>
                    <li>输入完整邮箱地址，点击左下角 <strong>手动设置</strong> 并选择 <strong>个人 (IMAP)</strong>。</li>
                    <li>输入邮箱密码。</li>
                    <li>接收服务器设置：服务器填写 <code>{{ $mail['host'] }}</code>，端口 <strong>993</strong>，安全类型选择 <strong>SSL/TLS</strong>。</li>
                    <li>发送服务器设置（SMTP）：服务器填写 <code>{{ $mail['host'] }}</code>，端口 <strong>465</strong>，安全类型选择 <strong>SSL/TLS</strong>，并确保勾选 <strong>“要求登录”</strong>。</li>
                </ol>
            @elseif($isTr)
                <p>Aşağıdaki adımlar Gmail uygulamasına göredir. Samsung E-posta ve diğer uygulamalarda isimler değişse de istenen bilgiler aynıdır.</p>
                <ol>
                    <li>Gmail uygulamasını açın, sağ üstteki profil resmine dokunup <strong>Başka hesap ekle</strong>'yi seçin.</li>
                    <li>Listenin sonundaki <strong>Diğer</strong> seçeneğine dokunun.</li>
                    <li>E-posta adresinizi yazın, <strong>Elle kurulum</strong>'a dokunup <strong>Kişisel (IMAP)</strong>'i seçin.</li>
                    <li>Parolanızı girin.</li>
                    <li>Gelen sunucu: <code>{{ $mail['host'] }}</code>, port <strong>993</strong>, güvenlik <strong>SSL/TLS</strong>.</li>
                    <li>Giden sunucu (SMTP): <code>{{ $mail['host'] }}</code>, port <strong>465</strong>, güvenlik <strong>SSL/TLS</strong>, <strong>Oturum açmayı gerektir</strong> açık.</li>
                </ol>
            @else
                <p>These steps follow the Gmail app. Names differ in Samsung Email and other apps, but the information asked for is the same.</p>
                <ol>
                    <li>Open the Gmail app, tap your profile picture at the top right and choose <strong>Add another account</strong>.</li>
                    <li>Tap <strong>Other</strong> at the bottom of the list.</li>
                    <li>Enter your email address, tap <strong>Manual setup</strong> and choose <strong>Personal (IMAP)</strong>.</li>
                    <li>Enter your password.</li>
                    <li>Incoming server: <code>{{ $mail['host'] }}</code>, port <strong>993</strong>, security <strong>SSL/TLS</strong>.</li>
                    <li>Outgoing server (SMTP): <code>{{ $mail['host'] }}</code>, port <strong>465</strong>, security <strong>SSL/TLS</strong>, with <strong>Require sign-in</strong> enabled.</li>
                </ol>
            @endif

            <h2 id="thunderbird">Thunderbird</h2>

            @if($isZh)
                <ol>
                    <li>点击菜单 <strong>账户设置 &rarr; 账户操作 &rarr; 添加邮件账户</strong>。</li>
                    <li>输入您的姓名、完整邮箱地址及密码，点击 <strong>继续</strong>。</li>
                    <li>Thunderbird 会自动从服务器检测探测出正确配置。在协议中确认保持选中 <strong>IMAP</strong>，点击 <strong>完成</strong> 即可。</li>
                </ol>
            @elseif($isTr)
                <ol>
                    <li><strong>Hesap Ayarları &rarr; Hesap İşlemleri &rarr; E-posta Hesabı Ekle</strong>.</li>
                    <li>Adınızı, e-posta adresinizi ve parolanızı yazıp <strong>Devam</strong>'a basın.</li>
                    <li>Thunderbird ayarları sunucudan kendisi alır. <strong>IMAP</strong> seçili gelen öneriyi onaylayıp <strong>Bitti</strong>'ye basın.</li>
                </ol>
            @else
                <ol>
                    <li><strong>Account Settings &rarr; Account Actions &rarr; Add Mail Account</strong>.</li>
                    <li>Enter your name, email address and password, then click <strong>Continue</strong>.</li>
                    <li>Thunderbird fetches the settings from the server. Confirm the suggestion with <strong>IMAP</strong> selected and click <strong>Done</strong>.</li>
                </ol>
            @endif

            <h2 id="webmail">{{ $isZh ? '网页邮箱 Webmail' : ($isTr ? 'Tarayıcıdan e-posta' : 'Email in the browser') }}</h2>

            @if($isZh)
                <p>无需安装或配置任何客户端软件，您也可以直接在浏览器中打开网页邮箱收发邮件。特别适用于在临时电脑上操作，或在配置客户端前快速验证账号密码是否正确。</p>
                <p>访问网址：<a href="{{ $mail['webmail'] }}" target="_blank" rel="noopener">{{ $mail['webmail_label'] }}</a> — 用户名填写完整邮箱地址，密码填写该邮箱对应的密码。在客户中心 <strong>我的服务 &rarr; 邮箱账户</strong> 页面点击 <strong>Webmail</strong> 快捷按钮同样可直接免密跳转。</p>
            @elseif($isTr)
                <p>Hiçbir kurulum yapmadan, tarayıcıdan da postanıza girebilirsiniz. Başkasının bilgisayarındayken veya kurulumu denemeden önce hesabın çalıştığını görmek için pratiktir.</p>
                <p>Adres: <a href="{{ $mail['webmail'] }}" target="_blank" rel="noopener">{{ $mail['webmail_label'] }}</a> — kullanıcı adı e-posta adresinizin tamamı, parola kutu parolanızdır. Müşteri panelinde <strong>Hizmetlerim &rarr; E-posta Hesapları</strong> sayfasındaki <strong>Webmail</strong> düğmesi de sizi buraya getirir.</p>
            @else
                <p>You can also read your mail in a browser without setting anything up. It is handy on someone else's computer, or to confirm the account works before configuring a program.</p>
                <p>Address: <a href="{{ $mail['webmail'] }}" target="_blank" rel="noopener">{{ $mail['webmail_label'] }}</a> — the username is your full email address and the password is your mailbox password. The <strong>Webmail</strong> button on the <strong>My Services &rarr; Email Accounts</strong> page in the client area takes you to the same place.</p>
            @endif

            <h2 id="imap-pop3">{{ $isZh ? 'IMAP 与 POP3 对比' : ($isTr ? 'IMAP mi POP3 mü' : 'IMAP or POP3') }}</h2>

            @if($isZh)
                <p><strong>强烈推荐使用 IMAP。</strong>您的所有邮件和文件夹结构均实时保留在云端服务器上，手机、平板与电脑始终保持无缝双向同步：在电脑上已读的邮件，手机上同步显示为已读；将邮件移动至分类文件夹，所有设备同步分类。</p>
                <p><strong>POP3</strong> 则会在客户端连通后将邮件下载至单机本地，并且默认行为会从服务器上直接删除。POP3 仅适用于单台离线设备孤立使用的情况；若您在多台设备（如手机和电脑）上同时收信，POP3 将导致邮件状态严重错乱，且一旦设备损坏或丢失，所有历史邮件将无法恢复。</p>
                <p>您可随时在客户中心的邮箱管理页面查看当前各邮箱的存储配额占用情况。使用 IMAP 时，建议定期归档或清理带有大附件的历史旧邮件以释放云端配额。</p>
            @elseif($isTr)
                <p><strong>IMAP kullanın.</strong> Postalarınız sunucuda durur, telefonunuz ile bilgisayarınız aynı kutuyu görür: birinde okuduğunuz posta diğerinde de okunmuş görünür, bir klasöre taşıdığınızda her iki cihazda da taşınır.</p>
                <p><strong>POP3</strong> postaları sunucudan indirip çoğu ayarda sunucudan siler. Tek bir cihaz kullanıyorsanız ve postaları yalnızca o cihazda saklamak istiyorsanız işe yarar; iki cihazdan bakıyorsanız kutularınız birbirini tutmaz. Ayrıca postalar yalnızca o cihazda olduğu için cihaz kaybolduğunda postalar da gider.</p>
                <p>Kutu doluluğunuzu müşteri panelindeki e-posta sayfasından takip edebilirsiniz. IMAP'ta postalar sunucuda durduğu için kotayı asıl dolduran budur; eski ve büyük ekli postaları silmek yer açar.</p>
            @else
                <p><strong>Use IMAP.</strong> Your mail stays on the server and your phone and computer see the same mailbox: a message you read on one shows as read on the other, and moving it to a folder moves it on both.</p>
                <p><strong>POP3</strong> downloads messages and, with most settings, deletes them from the server. It works if you use a single device and want the mail kept only there; if you check from two devices, the mailboxes will not match. And because the mail lives only on that device, losing the device loses the mail.</p>
                <p>You can follow your mailbox usage on the email page in the client area. With IMAP the mail stays on the server, so this is what fills the quota — deleting old messages with large attachments frees up space.</p>
            @endif

            <h2 id="sorunlar">{{ $isZh ? '常见问题排查' : ($isTr ? 'Sık karşılaşılan sorunlar' : 'Common problems') }}</h2>

            @if($isZh)
                <h3>能够接收邮件，但无法发送邮件</h3>
                <p>这几乎 100% 是由于发件服务器（SMTP）未启用身份验证导致的。请在客户端账户设置的 SMTP 选项中，打开“需要身份验证”，并确认勾选“使用与接收邮件相同的用户名和密码”。</p>
                <p>部分宽带运营商或企业防火墙会<strong>强制封锁 25 端口</strong>。我们的邮件系统支持标准的加密端口 465（SSL/TLS）与 587（STARTTLS）；若设置中为 25，请立即更改为 465。</p>

                <h3>提示用户名或密码错误</h3>
                <p>请确认用户名必须为完整邮箱地址：是 <code>info@{{ $mail['domain'] }}</code> 而绝非仅填写 <code>info</code>。若忘记密码，您无需知道旧密码，可随时在客户中心 <strong>我的服务 &rarr; 邮箱账户</strong> 中直接重设新密码。</p>

                <h3>出现 SSL 安全证书不匹配告警</h3>
                <p>这是因为您在服务器主机名中填写了自己的域名。请统一修改为官方主机名 <code>{{ $mail['host'] }}</code> 即可立即消除警告。切勿直接点击“忽略警告”，这会导致数据明文泄露。</p>

                <h3>手机上能看到邮件，电脑上却看不到</h3>
                <p>说明其中一台设备错误地配置成了 POP3 协议，在收信时将邮件从服务器彻底删除了。请将所有设备的收信协议均统一重新配置为 IMAP。</p>

                <h3>发出的邮件被收件方归入垃圾箱</h3>
                <p>通常是因为域名的 DNS 解析中缺少 SPF、DKIM 或 DMARC 认证记录。如果您的域名解析是由我们平台托管，这些记录在开通时已自动生成生效；如果您的 DNS 托管在第三方平台，请提交工单，我们将把需要添加的 TXT 记录参数发送给您。</p>
            @elseif($isTr)
                <h3>Posta alıyorum ama gönderemiyorum</h3>
                <p>Neredeyse her zaman giden sunucu kimlik doğrulamasının kapalı olmasındandır. Programınızın SMTP ayarlarında kimlik doğrulamayı açın ve gelen sunucuyla aynı kullanıcı adı ile parolayı kullandığından emin olun.</p>
                <p>Bazı internet sağlayıcıları ve şirket ağları giden posta için kullanılan <strong>25. portu kapatır</strong>. Zaten 465 veya 587 kullanmanızı istiyoruz; 25 yazılıysa 465 ile değiştirin.</p>

                <h3>Kullanıcı adı veya parola kabul edilmiyor</h3>
                <p>Kullanıcı adına e-posta adresinin tamamını yazdığınızdan emin olun: <code>info</code> değil <code>info@{{ $mail['domain'] }}</code>. Parolayı hatırlamıyorsanız müşteri panelinde <strong>Hizmetlerim &rarr; E-posta Hesapları</strong> sayfasından yeni bir parola belirleyebilirsiniz; eski parolayı bilmenize gerek yok.</p>

                <h3>Sertifika uyarısı görüyorum</h3>
                <p>Sunucu adı olarak kendi alan adınızı yazmışsınızdır. <code>{{ $mail['host'] }}</code> ile değiştirin; uyarı kalkacaktır. Uyarıyı “yok say” diyerek geçmeyin, bağlantınız korumasız kalır.</p>

                <h3>Postalar telefonda görünüp bilgisayarda görünmüyor</h3>
                <p>Cihazlardan biri POP3 ile kurulmuş ve postaları sunucudan indirip silmiş demektir. Her iki cihazı da IMAP ile kurun.</p>

                <h3>Gönderdiğim postalar karşı tarafta spam'e düşüyor</h3>
                <p>Alan adınızın SPF, DKIM ve DMARC kayıtları eksikse böyle olur. Alan adının DNS'i bizdeyse bu kayıtlar hesap açılırken tanımlanır. DNS'i başka bir yerdeyse destek talebi açın, hangi kayıtları eklemeniz gerektiğini gönderelim.</p>
            @else
                <h3>I can receive but not send</h3>
                <p>Almost always because outgoing server authentication is off. Turn it on in your program's SMTP settings and make sure it uses the same username and password as the incoming server.</p>
                <p>Some internet providers and company networks <strong>block port 25</strong>. We ask you to use 465 or 587 anyway; if 25 is set, change it to 465.</p>

                <h3>The username or password is rejected</h3>
                <p>Make sure the username is the full email address: <code>info@{{ $mail['domain'] }}</code>, not <code>info</code>. If you do not remember the password, you can set a new one on the <strong>My Services &rarr; Email Accounts</strong> page in the client area — you do not need the old one.</p>

                <h3>I get a certificate warning</h3>
                <p>You have entered your own domain as the server name. Replace it with <code>{{ $mail['host'] }}</code> and the warning will go away. Do not dismiss the warning and continue; your connection would be left unprotected.</p>

                <h3>Mail shows on the phone but not on the computer</h3>
                <p>One of the devices was set up with POP3 and has downloaded the mail off the server. Set both devices up with IMAP.</p>

                <h3>My messages land in the recipient's spam folder</h3>
                <p>This happens when your domain is missing SPF, DKIM and DMARC records. If we host your domain's DNS, these are created when the account is set up. If your DNS is elsewhere, open a support ticket and we will send you the records to add.</p>
            @endif

            <p style="margin-top:32px">
                {{ $isZh
                    ? '若按照上述指南设置后仍遇到连接异常，请在客户中心提交工单；请在工单中注明您使用的客户端软件版本及报错截图，我们的工程师将协助您迅速排障。'
                    : ($isTr
                        ? 'Adımları uyguladığınız halde hesap çalışmıyorsa müşteri panelinden destek talebi açın; hangi programı kullandığınızı ve aldığınız hata mesajını yazarsanız daha hızlı çözeriz.'
                        : 'If the account still does not work after following these steps, open a support ticket in the client area; telling us which program you use and the exact error message helps us solve it faster.') }}
            </p>
        </article>
    </div>
@endsection
