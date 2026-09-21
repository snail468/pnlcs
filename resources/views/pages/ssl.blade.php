{{--
     SSL sertifikaları.

     Bu sayfa bir ürün satmıyor; pakete dahil olan bir özelliği anlatıyor.
     Yazan her şey sunucunun bugünkü davranışıdır — sertifika sağlayıcısı,
     kapsam ve yenileme süresi canlı sistemden doğrulanarak yazıldı. Bir
     davranış değişirse bu metin de değişmeli, tersi değil.

     legal.layout paylaşılıyor: Hakkımızda sayfası da aynı düzeni kullanıyor.
--}}
@extends('legal.layout')

@php
    $locale = app()->getLocale();
    $isZh = $locale === 'zh';
    $isTr = $locale === 'tr';
@endphp

@section('legal-title', $isZh ? 'SSL 安全证书' : ($isTr ? 'SSL Sertifikaları' : 'SSL Certificates'))
@section('legal-description', $isZh
    ? '所有虚拟主机套餐均免费赠送 SSL 安全证书，自动化安装部署并在到期前无缝自动续期。免去手动配置繁琐，永不断期。'
    : ($isTr
        ? 'Bütün hosting paketlerinde SSL sertifikası ücretsizdir, otomatik kurulur ve kendiliğinden yenilenir. Kurulum yok, 90 günde bir uğraşmak yok.'
        : 'An SSL certificate is included free with every hosting plan, installed automatically and renewed on its own. No setup, no 90-day chore.'))

@section('legal-content')
    <div class="legal-head">
        <h1>{{ $isZh ? 'SSL 安全证书' : ($isTr ? 'SSL Sertifikaları' : 'SSL Certificates') }}</h1>
        <p>
            {{ $isZh
                ? '全线主机套餐标配、永久免费且全自动签发。无需您手动申请，更无需每隔 90 天手动续期，全程零维护。'
                : ($isTr
                    ? 'Bütün paketlerde ücretsiz, otomatik ve süresiz. Kurmanız gereken bir şey yok, 90 günde bir yenilemeniz gereken bir şey de yok.'
                    : 'Free on every plan, automatic, with no end date. Nothing for you to install, and nothing to renew every 90 days.') }}
        </p>
    </div>

    <div class="legal-grid">
        <nav class="legal-side">
            <p class="legal-side-title">{{ $isZh ? '本页导览' : ($isTr ? 'BU SAYFADA' : 'ON THIS PAGE') }}</p>
            <a href="#dahil">{{ $isZh ? '套餐标配特性' : ($isTr ? 'Pakete dahil' : "What's included") }}</a>
            <a href="#nasil">{{ $isZh ? '工作运行原理' : ($isTr ? 'Nasıl çalışıyor' : 'How it works') }}</a>
            <a href="#kapsam">{{ $isZh ? '证书覆盖范围' : ($isTr ? 'Neyi kapsıyor' : 'What it covers') }}</a>
            <a href="#fark">{{ $isZh ? '拒绝繁琐的手动维护' : ($isTr ? 'Elle yenileme derdi' : 'The renewal chore') }}</a>
            <a href="#kurumsal">{{ $isZh ? '企业增强型验证证书' : ($isTr ? 'Şirket doğrulamalı sertifika' : 'Company-validated certificates') }}</a>
        </nav>

        <article class="legal-body">
            <h2 id="dahil">{{ $isZh ? '套餐标配特性' : ($isTr ? 'Pakete dahil' : "What's included") }}</h2>

            @if($isZh)
                <p>无论您选购哪款主机方案，高品质 SSL 数字证书费用均已包含在套餐内。它并非需要额外付费的增值组件，而是主机账户原生交付的核心安全能力。</p>
                <ul>
                    <li><strong>永久免费</strong> — 除套餐标准月费/年费外，不收取任何证书附加费，后续自动续期终身免费。</li>
                    <li><strong>全自动安装</strong> — 您无需提交人工申请工单，系统在检测到域名解析生效后自动向 CA 机构申请并配置到 Web 服务。</li>
                    <li><strong>静默无感自动续期</strong> — 在证书到期前，自动化运维守护进程会自动执行 HTTP-01 验证并更新证书，您无需进行任何干预。</li>
                    <li><strong>不限域名与子域名数量</strong> — 您在控制面板中添加的每一个主域名、附加域名及子域名，均享有专属的 SSL 安全证书保护。</li>
                </ul>
                <p>证书由全球知名的开源证书授权机构 <strong>Let's Encrypt</strong> 签发。受全球所有主流 Web 浏览器、iOS/Android 移动系统及现代安全支付网关完全信任。在绿色安全锁标识、HTTPS 加密强度及搜索引擎 SEO 权重方面，与商业付费证书享有同等防护标准。</p>
            @elseif($isTr)
                <p>Hangi hosting paketini alırsanız alın, SSL sertifikası fiyata dahildir. Ayrıca satın alınan bir ürün değil, hesabın kendisiyle gelen bir özelliktir.</p>
                <ul>
                    <li><strong>Ücretsiz</strong> — paket ücretinin dışında hiçbir bedel yok, yenilemede de yok.</li>
                    <li><strong>Otomatik kurulum</strong> — talep etmenize gerek yok, sertifika kendiliğinden alınır ve siteye tanımlanır.</li>
                    <li><strong>Otomatik yenileme</strong> — süresi dolmadan kendiliğinden yenilenir. Sizin bir şey yapmanız gerekmez.</li>
                    <li><strong>Alan adı sayısı sınırsız</strong> — hesabınızdaki her alan adı ve alt alan adı için ayrı sertifika alınır.</li>
                </ul>
                <p>Sertifikalar <strong>Let's Encrypt</strong> tarafından veriliyor. Bütün tarayıcılar, mobil işletim sistemleri ve ödeme altyapıları tarafından tanınıyor; kilit simgesi ve HTTPS bakımından ücretli bir sertifikadan farkı yok.</p>
            @else
                <p>Whichever hosting plan you buy, an SSL certificate is part of the price. It is not a separate product you purchase; it comes with the account.</p>
                <ul>
                    <li><strong>Free</strong> — nothing beyond the plan price, and nothing at renewal either.</li>
                    <li><strong>Installed automatically</strong> — you do not have to request it; the certificate is obtained and applied on its own.</li>
                    <li><strong>Renewed automatically</strong> — it renews before it expires. Nothing is required from you.</li>
                    <li><strong>No limit on domains</strong> — every domain and subdomain in your account gets a certificate.</li>
                </ul>
                <p>Certificates are issued by <strong>Let's Encrypt</strong> and are trusted by every browser, mobile operating system and payment platform. In terms of the padlock and HTTPS, there is no difference from a paid certificate.</p>
            @endif

            <h2 id="nasil">{{ $isZh ? '工作运行原理' : ($isTr ? 'Nasıl çalışıyor' : 'How it works') }}</h2>

            @if($isZh)
                <p>当您的主机账户创建时，服务器会先预置一个本地自签名过渡证书，确保从第一秒起即可通过 HTTPS 访问站点。此阶段浏览器可能会提示暂未受信任证书，这属于正常现象，且持续时间极短。</p>
                <p><strong>只要您的域名 DNS 解析生效并正式指向我们的服务器 IP</strong>，系统守护进程就会秒级向 CA 发起权威签发，获取真实的合规证书并自动热替换。浏览器的警告即刻消失，转为安全的挂锁图标。</p>
                <p>这种先后顺序十分关键：为了签发合规证书，CA 证书机构必须核验域名的 A 记录确实解析到本服务器。因此当您绑定新域名或修改 DNS 时，证书的签发与生效通常需要等待几分钟的 DNS 解析传播时间。</p>
                <p>此后您完全无需操心。系统每日自动巡检所有站点的证书健康度；哪怕续订偶遇异常，智能运维系统也会在我们工程师收到告警并处置完毕前自动进行重试，用户甚至察觉不到任何中断。</p>
            @elseif($isTr)
                <p>Hesabınız açıldığında sunucu, siteniz ilk andan itibaren HTTPS ile açılabilsin diye geçici bir sertifika koyar. Bu geçici sertifikada tarayıcı uyarı gösterir; normaldir ve kısa sürelidir.</p>
                <p><strong>Alan adınız sunucumuzu göstermeye başladığı anda</strong> gerçek sertifika otomatik olarak alınır ve geçici olanın yerine geçer. Uyarı kaybolur, kilit simgesi belirir.</p>
                <p>Bu sıra önemli: sertifikayı verebilmek için alan adının bize baktığının doğrulanması gerekiyor. Bu yüzden yeni bir alan adı yönlendirdiğinizde sertifikanın oturması kısa bir zaman alabilir.</p>
                <p>Sonrasında ilgilenmeniz gereken bir şey kalmaz. Sertifikaların durumunu her gün kontrol ediyoruz; bir yenileme başarısız olursa bunu siz fark etmeden önce biz görüyoruz.</p>
            @else
                <p>When your account is created, the server installs a temporary certificate so your site can be reached over HTTPS from the first moment. Browsers show a warning on that temporary certificate; this is expected and short-lived.</p>
                <p><strong>As soon as your domain points to our server,</strong> the real certificate is obtained automatically and replaces the temporary one. The warning disappears and the padlock appears.</p>
                <p>The order matters: to issue the certificate, the authority must verify that the domain resolves to us. So when you point a new domain, the certificate can take a short while to settle.</p>
                <p>After that there is nothing left for you to do. We check certificate health every day, so if a renewal fails we see it before you do.</p>
            @endif

            <h2 id="kapsam">{{ $isZh ? '证书覆盖范围' : ($isTr ? 'Neyi kapsıyor' : 'What it covers') }}</h2>

            @if($isZh)
                <ul>
                    <li><strong>主域名与 www 前缀</strong> — <code>yoursite.com</code> 和 <code>www.yoursite.com</code> 自动合并在同一张证书中（SAN 多域名扩展）。</li>
                    <li><strong>全量子域名支持</strong> — 您在控制面板中创建的每个二级子域名（如 <code>blog.yoursite.com</code>、<code>shop.yoursite.com</code>）均会自动生成并绑定独立证书，无需手动操作。</li>
                    <li><strong>Webmail 网页邮箱与邮件服务器</strong> — 您的 IMAP、POP3、SMTP 邮件收发与 Webmail 界面均同样享受高强度 TLS 传输加密。</li>
                    <li><strong>全站强制 HTTPS 301 重定向</strong> — 控制面板中支持一键开启强制 HTTPS，系统级自动将所有 HTTP 明文流量无缝重定向至安全加密通道。</li>
                </ul>
                <p>证书的标准有效期为 90 天，系统会在到期前 30 天自动完成静默续订。相比传统付费证书的一年有效期，更短的证书生命周期是现代密码学最佳安全实践 — 一旦私钥遭受泄露，脆弱时间窗口极短。而由于续期全程由系统后台全自动化托管，生命周期的长短完全不会给您带来任何维护负担。</p>
            @elseif($isTr)
                <ul>
                    <li><strong>Alan adınız ve www hâli</strong> — <code>siteniz.com</code> ve <code>www.siteniz.com</code> aynı sertifikada.</li>
                    <li><strong>Alt alan adlarınız</strong> — panelden oluşturduğunuz her alt alan adı sertifikaya eklenir. <code>blog.siteniz.com</code>, <code>shop.siteniz.com</code> için ayrıca bir şey yapmanız gerekmez.</li>
                    <li><strong>Webmail ve posta sunucusu</strong> — e-posta hesaplarınız da şifreli bağlantıyla çalışır.</li>
                    <li><strong>HTTPS yönlendirmesi</strong> — isterseniz siteniz kendiliğinden HTTPS'e yönlendirilir; panelden açıp kapatabilirsiniz.</li>
                </ul>
                <p>Sertifikalar 90 gün geçerlidir ve süresi dolmadan yenilenir. Bu, ücretli sertifikaların bir yıllık süresinden kısa olduğu için kimi zaman eksiklik sanılıyor; aslında tersi — sertifika ne kadar kısa süreliyse çalınması hâlinde açık kalan pencere o kadar dar olur. Yenilemeyi biz yaptığımız için süre sizin açınızdan bir fark yaratmaz.</p>
            @else
                <ul>
                    <li><strong>Your domain and its www form</strong> — <code>yoursite.com</code> and <code>www.yoursite.com</code> on the same certificate.</li>
                    <li><strong>Your subdomains</strong> — every subdomain you create in the panel is added to the certificate. Nothing extra is needed for <code>blog.yoursite.com</code> or <code>shop.yoursite.com</code>.</li>
                    <li><strong>Webmail and the mail server</strong> — your email accounts run over encrypted connections too.</li>
                    <li><strong>HTTPS redirection</strong> — your site can redirect to HTTPS automatically; you can turn this on or off in the panel.</li>
                </ul>
                <p>Certificates are valid for 90 days and are renewed before they expire. Because paid certificates run for a year, the shorter term is sometimes mistaken for a shortcoming; it is the opposite — the shorter the certificate, the narrower the window if a key is ever stolen. Since we handle renewal, the term makes no difference to you.</p>
            @endif

            <h2 id="fark">{{ $isZh ? '拒绝繁琐的手动维护' : ($isTr ? 'Elle yenileme derdi' : 'The renewal chore') }}</h2>

            @if($isZh)
                <p>如今市面上多数主机商都声称支持免费 SSL，但关键的区别在于<strong>实际交付与运维体验</strong>。</p>
                <p>在许多传统服务商处，需要<em>您自己</em>手动生成 CSR、配置 TXT DNS 解析记录、等待 CA 验证通过后再手动导入证书文本；而且每过 90 天就得将这一整套繁琐流程<em>重复操作一次</em>。一旦某次由于忙碌遗忘续费，访客打开您的网站就会立即遭遇刺眼的“安全证书已过期，您的连接不是私密连接”红色拦截页，严重损害商业信誉。</p>
                <p>在我们的平台上，这一繁琐操作被彻底终结。无论初次颁发还是后续无限次续期，全程后台自治，您甚至不需要登录控制面板。</p>
            @elseif($isTr)
                <p>Ücretsiz SSL'i bugün hemen her hosting firması veriyor. Fark, verilme biçiminde.</p>
                <p>Bazı sağlayıcılarda sertifikayı <em>siz</em> kuruyorsunuz ve 90 günde bir <em>siz</em> yeniliyorsunuz — çoğu zaman DNS kaydı ekleyip doğrulama beklemek gerekiyor. Unuttuğunuz gün siteniz ziyaretçiye güvenlik uyarısı gösteriyor.</p>
                <p>Bizde böyle bir işlem yok. Sertifika alınırken de yenilenirken de sizin bir şey yapmanız gerekmiyor, panele girmeniz bile gerekmiyor.</p>
            @else
                <p>Almost every hosting company offers free SSL today. The difference is in how it is delivered.</p>
                <p>With some providers <em>you</em> install the certificate and <em>you</em> renew it every 90 days — often by adding a DNS record and waiting for validation. The day you forget, your visitors get a security warning.</p>
                <p>There is no such step here. Neither issuance nor renewal asks anything of you; you do not even need to log in.</p>
            @endif

            <h2 id="kurumsal">{{ $isZh ? '企业增强型验证证书' : ($isTr ? 'Şirket doğrulamalı sertifika' : 'Company-validated certificates') }}</h2>

            @if($isZh)
                <p>免费的 DV 级 SSL 证书能够准确验证域名的归属所有权。对于绝大多数普通网站与企业展示站而言，这已能提供 100% 完整的传输加密能力与浏览器安全锁。</p>
                <p>然而部分大型金融机构、政府或集团企业用户可能存在更严苛的合规需求：例如要求在证书详情中<strong>验证企业真实法人主体身份</strong>（OV 组织验证型证书）、在浏览器证书查看器中展示企业法定名称（EV 增强验证型），或者附带百万美元级别的商业担保理赔条款。此类证书无法由开源自动化机构免费颁发，需要提交营业执照、邓白氏编码并经过人工电话核实。</p>
                <p>如果您对商业级 OV/EV 证书有采购需求，欢迎随时<a href="{{ route('client.contact') }}">与我们联系</a>；我们将根据您的具体应用场景与行业合规要求，为您推荐最适配的商业证书解决方案。</p>
            @elseif($isTr)
                <p>Ücretsiz sertifika, alan adının size ait olduğunu doğrular. Bu, siteler için yeterlidir ve tarayıcıdaki kilit simgesi bakımından hiçbir eksiği yoktur.</p>
                <p>Bazı kurumsal kullanımlarda daha fazlası isteniyor: sertifikanın <strong>şirketinizin kimliğini de doğrulaması</strong> (OV), tarayıcıda şirket unvanının görünmesi (EV), ya da belli bir para garantisi. Bunlar ücretsiz sertifikalarla verilemiyor; ayrı bir doğrulama süreci ve evrak gerektiriyor.</p>
                <p>Böyle bir sertifikaya ihtiyacınız varsa <a href="{{ route('client.contact') }}">bize yazın</a>; ihtiyacınıza uygun olanı ve süresini birlikte belirleyelim.</p>
            @else
                <p>The free certificate proves that the domain belongs to you. For a website that is enough, and as far as the browser padlock goes it lacks nothing.</p>
                <p>Some corporate uses ask for more: a certificate that also <strong>validates your company's identity</strong> (OV), shows your company name in the browser (EV), or carries a stated warranty. These cannot be issued for free; they require a separate validation process and paperwork.</p>
                <p>If you need one, <a href="{{ route('client.contact') }}">write to us</a> and we will work out which one fits and how long it takes.</p>
            @endif
        </article>
    </div>
@endsection
