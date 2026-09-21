<?php

return [
    'categories' => [
        'Getting Started' => [
            'name' => '入门指南',
            'description' => '您的首次订购、客户中心使用以及账户安全设置。',
            'eng_name' => 'Getting Started',
            'eng_description' => 'Your first order, your client area, and how to keep your account safe.',
        ],
        'Hosting & Websites' => [
            'name' => '虚拟主机与建站',
            'description' => '主机服务内置的管理工具：文件管理、数据库、邮箱、DNS、定时任务和备份。',
            'eng_name' => 'Hosting & Websites',
            'eng_description' => 'The tools inside your hosting service: files, databases, email, DNS, cron, backups.',
        ],
        'Apps & Docker' => [
            'name' => '容器应用与 Docker',
            'description' => '在您的主机上运行容器应用 — 资源配额、如何安装以及如何绑定到您的域名。',
            'eng_name' => 'Apps & Docker',
            'eng_description' => 'Running applications on your hosting - what they cost you, how to install them and how to put them on your domain.',
        ],
        'Domains' => [
            'name' => '域名管理',
            'description' => '域名注册、转入、DNS 解析、域名服务器（Nameservers）、续费与隐私保护。',
            'eng_name' => 'Domains',
            'eng_description' => 'Registering, transferring, DNS, nameservers, renewal and protection.',
        ],
        'Billing' => [
            'name' => '财务与账单',
            'description' => '发票管理、银行转账付款、账户余额及服务续费指南。',
            'eng_name' => 'Billing',
            'eng_description' => 'Invoices, paying by bank transfer, account credit and renewals.',
        ],
        'Support' => [
            'name' => '技术支持',
            'description' => '工单系统、服务公告以及如何快速提交问题以便技术团队迅速解决。',
            'eng_name' => 'Support',
            'eng_description' => 'Tickets, announcements and how to report a problem so it gets fixed fast.',
        ],
        'SSL Certificates' => [
            'name' => 'SSL 证书',
            'description' => '免费自动证书签发、全站 HTTPS 加密与自定义第三方证书导入。',
            'eng_name' => 'SSL Certificates',
            'eng_description' => 'Free automatic certificates, HTTPS, and importing your own.',
        ],
    ],
    'articles' => [
        'What am I buying: hosting or an app?' => [
            'title' => '我购买的是什么：虚拟主机还是应用？',
            'article' => '您购买的是主机服务底层资源 — 即特定的内存、CPU、磁盘存储和网络流量配额。容器应用则是运行在这些配额之内的软件环境。

这意味着系统没有单独的“Docker 容器产品”需要二次购买。您所选购的主机方案决定了整个账户拥有的内存与 CPU 上限，您安装的每个容器应用都在此配额内共享运行。例如：在 4 GB 方案上安装 3 个应用，这 3 个应用共同共享这 4 GB 内存，而不是每个应用分别独占 4 GB。

主机方案中有两项核心指标直接影响应用运行：

- 内存与 CPU — 账户内所有服务与应用共用的总资源上限。
- 应用安装数限制 — 您可以同时安装的应用数量上限。

在日常使用中，内存往往是关键指标。轻量级应用可能仅需 128 MB，而大型复杂应用可能需要 1 GB 或更多，因此您能同时运行多少个应用主要取决于所安装应用的内存需求。',
            'eng_title' => 'What am I buying: hosting or an app?',
            'eng_article' => 'You are buying hosting - an amount of memory, CPU, disk and bandwidth. Apps are what you run inside it.

That means there is no separate "Docker product" to buy. Your plan says how much memory and CPU your account has, and every app you install runs inside that. Three apps on a 4 GB plan share 4 GB between them; they do not get 4 GB each.

Two numbers on your plan matter for apps:

- Memory and CPU - the total for everything in your account.
- App limit - the most apps you may have installed at once.

In practice memory is the real limit. A small app might need 128 MB, a large one a gigabyte or more, so how many you can run at the same time depends on which ones you pick.',
        ],
        'Installing an app' => [
            'title' => '如何安装容器应用',
            'article' => '进入您的主机服务管理页面，然后点击“应用中心”标签页。

1. 寻找应用：应用目录上方设有搜索框，所有应用按类别清晰分类 — 网站系统、数据库、AI 工具、开发者套件等。
2. 检查资源要求：每个应用卡片均标明该应用建议的内存配额及启动的容器数量。若某应用所需内存超过您方案的可用配额，卡片会有相应提示。
3. 点击卡片上的“安装”：下方会展开设置框，您可以为该应用命名；若留空，则默认以应用名称命名。

点击确认后系统将自动拉取并启动容器镜像。轻量应用通常耗时数秒，大型镜像可能需要数分钟。在此期间您可以自由离开该页面，后台将自动完成部署。

部署完成后，该应用将出现在“我的应用”列表中，状态显示为绿色“运行中”徽标，您可以随时在此进行启动、停止、重启或卸载操作。',
            'eng_title' => 'Installing an app',
            'eng_article' => 'Open your service, then the Apps tab.

1. Find the app. There is a search box above the catalogue, and the apps are grouped into sections - Websites, Databases, AI, Developer Tools and so on.
2. Check what it needs. Each card shows the memory the app wants and how many containers it starts. An app that needs more memory than your plan allows is marked before you choose it.
3. Press Install on the card. A box opens underneath where you can give it a name - leave it empty and it is named after the app.

Installing downloads the app, which takes anything from a few seconds to several minutes for larger ones. You can leave the page while it works.

When it is done the app appears in Your Apps with a Running badge, and you can start, stop, restart or remove it from there.',
        ],
        'Putting an app on your own domain' => [
            'title' => '将容器应用绑定到您自己的域名',
            'article' => '应用安装完成后运行在账户的内部网络环境中，默认尚未绑定到公网独立域名。

在“应用中心”标签页中，找到正在运行的目标应用，在域名下拉列表中选择您已绑定的域名，然后点击“解析到此应用”。系统将自动配置 Web 反向代理，域名即可直接对外提供该应用的服务，域名将以可点击的链接形式展示。

如需解绑并恢复，只需点击域名右侧的“×”图标。解绑后，该域名将立即恢复为常规 Web 虚拟主机托管，继续对外呈现您网站根目录下的常规网页文件。

两点注意事项：
- 域名必须已将 DNS 解析指向本服务器，否则浏览器将无法访问。
- 若绑定时勾选自动 SSL，系统会自动为该应用域名申请并部署 HTTPS 安全证书。',
            'eng_title' => 'Putting an app on your own domain',
            'eng_article' => 'An app is installed inside your account and is not on your domain until you say so.

In the Apps tab, under a running app, pick one of your domains from the list and press "Point here". The domain then serves that app, and its name appears as a link you can open.

To take it back, press the small x next to the domain name. The domain returns to ordinary web hosting and serves your files again.

Two things to know:

- The app has to be running first. A domain cannot point at an app that is stopped or failing to start.
- One domain serves one app. A domain already serving an app does not appear in the list until you unlink it.

If you have no domains on the account yet, add one first - the app has nowhere to go otherwise.',
        ],
        'My app says "Not starting"' => [
            'title' => '应用提示“启动失败 (Not starting)”的排查方法',
            'article' => '当应用显示该状态徽标时，意味着容器进程启动后异常退出，并且系统正在不断尝试重启它。这并非镜像下载卡顿，而是容器内部的主进程在启动时遭遇错误。

常见原因及排查方案：

1. 内存不足 (OOM)：某些应用（如 Java、Node.js 编译型工具或数据库）启动阶段瞬间需要较多内存。请检查主机总内存使用量，尝试暂停其他非必要应用以释放内存后再次启动。
2. 端口冲突或依赖缺失：部分应用在启动时需要外接数据库连接配置或特定的环境变量设置。
3. 检查容器日志：在应用卡片上点击“日志”图标，查看标准输出与错误日志，绝大多数启动崩溃的真实原因都会直接打印在最后几行中。
4. 重启或重新部署：如果配置发生过修改，尝试先停止容器，再重新点击启动。若问题依旧，可卸载后重新全新安装。',
            'eng_title' => 'My app says "Not starting"',
            'eng_article' => 'That badge means the app starts, fails, and is being restarted over and over. It is not stuck downloading - something is wrong with the app itself.

The two common causes:

Not enough memory. The app needs more than your plan allows, or more than is left after your other apps. Stop or remove another app and try again, or move to a larger plan.

It needs configuration. Some apps will not start until they are given a database, a key, or a settings file. The app\'s own documentation says which.

What to do:

1. Remove the app and install it again - a failed first start sometimes leaves it in a bad state.
2. Check the memory figure on the app\'s card against what your plan gives.
3. If neither helps, open a support ticket and say which app it is. We can read its log, which you cannot see from here.',
        ],
        'How many apps can I run?' => [
            'title' => '我最多可以同时运行多少个应用？',
            'article' => '应用数量受两重限制约束，以先达到的上限为准：

1. 方案硬性数量上限：您购买的主机套餐中规定了“最大应用容器数”，页面右上角的计数器会直观显示当前已安装数量与最大配额。
2. 物理资源上限（主要是内存）：所有正在运行的应用所占用的内存总和不能超过主机的总内存限制。

例如：即使您的方案允许安装 10 个应用，但如果安装的两个应用已经占满了 4 GB 内存，剩余资源将不足以稳定启动第三个大型应用。相反，如果运行的都是仅需 64 MB 的超轻量服务，只要未超过数量上限，就可以一直添加。系统会在安装前预检当前剩余可用内存。',
            'eng_title' => 'How many apps can I run?',
            'eng_article' => 'Two limits apply, and the smaller one wins.

Your plan has an app limit - the counter at the top right of the Apps tab shows it, for example "2 / 5". When it is full the install form disappears until you remove one.

Your plan also has a memory ceiling, and every app draws on it. This is usually the real limit: five apps that each want a gigabyte will not fit in a two gigabyte plan even if your app limit says five.

Some apps count as more than one. An app that also runs a database or a cache starts several containers, and the card says so - "4 containers", for example. They all share your account\'s memory.

If you are running out of room, either remove something you are not using or upgrade the plan.',
        ],
        'Removing an app' => [
            'title' => '卸载与彻底删除应用',
            'article' => '在“应用中心”标签页中，找到需要删除的应用，点击其右侧的垃圾桶图标并确认。

卸载应用将彻底删除对应的容器实例及其关联的独立数据卷。如果该应用曾绑定过特定域名，解除关联后该域名将自动退回常规 Web 托管模式。

重要提示：
- 卸载是不可逆的操作。如果该应用内包含重要业务数据、数据库或用户上传的内容，请务必在卸载前通过文件管理或应用内置导出功能完成数据备份。',
            'eng_title' => 'Removing an app',
            'eng_article' => 'In the Apps tab, press the bin icon next to the app and confirm.

Removing an app deletes it and its data. There is no undo, and the files it kept are not in your backups unless you copied them out yourself first.

If a domain was pointing at the app, that domain goes back to serving your ordinary web hosting.

The memory and the slot in your app limit are freed straight away, so you can install something else immediately.',
        ],
        'Your app\'s address, login details and shell' => [
            'title' => '应用的访问地址、登录凭据与终端 Shell',
            'article' => '应用安装完成后，其卡片上会提供您实际管理和使用它所需的一切信息：

- 访问地址：如果已绑定独立域名，点击链接即可在浏览器中打开；若未绑定独立域名，卡片会展示内部端口或临时访问地址。
- 初始凭据：对于包含后台登录系统的应用（例如 WordPress、Nextcloud 等），卡片会展示自动生成的管理员用户名与临时高强度密码。首次登录后建议立即在应用内修改密码。
- 环境变量与配置：点击“配置”可以查看和修改注入到容器中的参数，例如数据库密码、密钥或第三方 API 凭据。
- 容器 Shell 终端：点击终端图标即可在浏览器中直接打开该容器的交互式命令行（bash/sh），方便开发者执行排错、数据库迁移或依赖检查命令。',
            'eng_title' => 'Your app\'s address, login details and shell',
            'eng_article' => 'Every installed app on the Apps tab has a card, and the card carries what you need to actually use it:

- Open app - the address the app answers on. For an app linked to your domain, that is the domain; otherwise the server address and the app\'s port.
- Connection details - the logins the app was created with: admin users, database passwords. Values are masked; press the copy button next to one to copy it. These are the details recorded at install time - if you changed a password inside the app afterwards, the app is right and the card is stale.
- Data folder - where the app\'s files live in your account. You can reach it through the Files tab; it is yours.
- Open shell - a terminal inside the app\'s container, in the browser, as the app\'s own user or as root. For following logs, running the app\'s own command-line tools, quick fixes.

The card also shows the app\'s state. Crashing means it starts and dies repeatedly - the hint on the card says what to check first, and "My app says Not starting" in this category goes deeper.',
        ],
        'Ordering: you do not need an account first' => [
            'title' => '订购指南：您无需提前注册账户',
            'article' => '在选购商品时，您可以直接浏览商城并自定义配置产品（计费周期、可配置项、绑定域名等），无需提前登录或繁琐注册。

您的新账户将在最后的结账支付步骤自动创建。结账页面会在付款方式上方要求您填写姓名、邮箱地址并设置密码；点击一次“提交订单”按钮，系统便会一步到位完成新账户开通、自动登录并完成下单，整个流程一气呵成。

如果您已经是老客户，结账页面顶部提供了快捷登录链接。在此登录后，您购物车中已选好的商品会自动保留并关联至您的已有账户。

下单成功后，您将直接进入客户中心，新订单及对应的账单可在“我的服务”和“我的发票”中即时查看。',
            'eng_title' => 'Ordering: you do not need an account first',
            'eng_article' => 'Browse the store and configure a product - billing cycle, options, a domain if the product wants one - without signing in. Nothing asks you to register while you shop.

Your account is created at the payment step. The checkout page asks for your name, email and a password right above the payment method; press the order button once and the account is opened, you are signed in, and the order is placed - one step, nothing to repeat.

Already have an account? The checkout page has a sign in link. Log in there and your cart comes with you.

After ordering you land in the client area, where the order and its invoice are waiting under Services and Invoices.',
        ],
        'Finding your way around the client area' => [
            'title' => '客户中心导航与功能指引',
            'article' => '您名下的所有资产与服务均可通过顶部导航栏便捷触达：

- 我的服务 (Services) — 您的所有虚拟主机方案与容器应用。点击任意主机即可进入管理工具箱：文件管理、数据库、邮箱、DNS 解析等。
- 域名管理 (Domains) — 账户下的所有域名资产：查看续费日期、修改域名服务器 (NS)、管理 DNS 解析及转移操作。
- 财务发票 (Invoices) — 未付及已付发票，支持一键在线支付及下载标准 PDF 发票凭证。
- 服务工单 (Tickets) — 与专业技术支持团队沟通的官方通道。
- 账户设置 (Account) — 个人资料、修改密码、安全中心（两步验证）及授权附属联系人。

仪表盘首页还会智能汇总待办事项：未付账单提醒、即将到期域名及客服最新回复，一目了然。',
            'eng_title' => 'Finding your way around the client area',
            'eng_article' => 'Everything you own is reachable from the navigation:

- Services - your hosting plans and apps. Open one to reach its tools: files, databases, email, DNS and more.
- Domains - every domain on the account: renewal dates, nameservers, DNS, transfers.
- Invoices - open and paid invoices, each downloadable as a PDF.
- Tickets - your conversations with support.
- Account - profile, password, security and the contacts allowed to reach support on your behalf.

The dashboard shows the things that need you: unpaid invoices, expiring domains, open tickets.',
        ],
        'Securing your account' => [
            'title' => '保障您的账户安全',
            'article' => '在导航栏的“账户”菜单下，您可以进行以下核心安全设置：

- 修改密码 — 随时更新登录凭据。出于安全考虑，设定新密码前需要验证当前旧密码。
- 安全中心（两步验证 2FA） — 强烈建议开启！启用后，除密码外，登录时还需输入手机身份验证器应用生成的 6 位动态验证码。即便密码不慎泄露，攻击者依然无法登录您的账户。
- 附属联系人 — 为需要协助管理账户的其他人员（如技术团队、财务专员、合作伙伴）创建独立授权子账号，无需共享主账号密码。

建议您为本系统设置独一无二的高强度独立密码，并立即开启两步验证 — 这是防范黑客攻击最行之有效的措施。',
            'eng_title' => 'Securing your account',
            'eng_article' => 'Under Account you will find:

- Password - change it any time. You need the current password to set a new one.
- Security - two-factor authentication. Once enabled, signing in asks for a six-digit code from your authenticator app on top of the password. If someone learns your password, they still cannot get in.
- Contacts - additional people (a colleague, your developer) allowed on the account, with their own details.

Use a password you use nowhere else, and turn on two-factor - it is the single most effective thing on this page.',
        ],
        'Signing in, lost passwords, and active sessions' => [
            'title' => '登录、找回密码与活跃会话管理',
            'article' => '请使用注册时填写的电子邮箱与密码登录客户中心。

忘记密码？
登录页面提供了“找回密码”链接：输入您的注册邮箱，系统将立即发送包含安全重置令牌的邮件。点击邮件中的链接即可设置全新密码（链接有效时长为 60 分钟）。

活跃会话管理：
在“账户”->“安全设置”中，系统列出了当前所有处于登录状态的设备与客户端会话（包括设备 IP、浏览器类型及最后活跃时间）。如果您发现了非本人操作的可疑会话，点击旁边的“撤销”按钮即可立即强制将其下线，同时建议立刻修改登录密码。

如果您开启了两步验证但丢失了手机验证器，请使用注册邮箱向客服提交工单，以便支持人员核验身份后协助重置。',
            'eng_title' => 'Signing in, lost passwords, and active sessions',
            'eng_article' => 'Sign in with the email address and password you set when the account was created.

Forgot the password? The login page has a reset link: enter your email, and a message with a reset link arrives if an account exists for it. The link opens a page where you set a new password.

Under Account, the Security page lists your active sessions - every device currently signed in, with its IP and last activity. If you see a session you do not recognise, press Revoke next to it and change your password immediately. Revoking a session signs that device out on its next click.

If two-factor authentication is enabled, signing in asks for a six-digit code after the password. Lost access to your authenticator app? Open a ticket from the email address on the account so support can verify you.',
        ],
        'Your profile and additional contacts' => [
            'title' => '个人资料与附属联系人管理',
            'article' => '在“账户设置”中的“个人资料”页面，保存着您的姓名、公司名称、详细地址与联系电话 — 这些信息将直接呈现在您的发票和收据凭证中。

请务必保持您的电子邮箱真实有效：发票通知、工单回复、安全告警以及域名续费提醒均会发送至该邮箱。邮箱失效往往是导致域名因错过续费而被注销的主要原因。

“附属联系人”功能：
如果您有团队成员、外包开发人员或财务人员需要访问系统，可以在“联系人”页面为他们创建专属账号，并为其分配特定权限（例如仅接收账单通知，或仅能提交技术工单）。切勿直接共享主管理员密码！',
            'eng_title' => 'Your profile and additional contacts',
            'eng_article' => 'Under Account, the Profile page holds your name, company, address and phone - the details that appear on your invoices. Keep the email address current above all: invoices, ticket replies and renewal notices go there, and a dead address is how domains expire unnoticed.

The Contacts page adds more people to the account - a colleague, your developer, your accountant. Each contact has their own name and email. Use it instead of sharing your own password: sharing the password shares everything, including the right to close the account.',
        ],
        'The tools inside your service' => [
            'title' => '虚拟主机内置管理工具总览',
            'article' => '进入“我的服务”并点击您的虚拟主机方案，顶部的功能标签页就是您的综合控制台：

- 文件管理 (Files) — 在浏览器中直接管理、上传、编辑、打包和解压网站文件。
- 数据库 (Databases) — 创建 MySQL 数据库与用户，一键登录 phpMyAdmin 进行数据运维。
- 邮箱管理 (Email) — 基于您自己的独立域名创建企业邮局与邮件转发。
- DNS 解析 (DNS) — 自主管理域名的各项解析记录。
- 子域名管理 (Subdomains) — 便捷创建 blog.yourdomain.com 等二级子域名。
- 定时任务 (Cron) — 设置按计划周期自动执行的脚本命令。
- FTP 账户 (FTP) — 为 FileZilla 等桌面客户端创建 FTP 连接凭据。
- 备份快照 (Backups) — 查看历史快照备份并进行一键整站还原。
- 应用中心 (Apps) — Docker 现代化应用一键部署。

此处的所有操作均在严格的沙箱隔离环境下运行，确保安全稳定。',
            'eng_title' => 'The tools inside your service',
            'eng_article' => 'Open Services and click your hosting plan. The tabs across the top are your toolbox:

- Files - browse, upload, edit and extract files in your webspace, in the browser.
- Databases - create databases and users; open a database in the web database manager.
- Email - mailboxes and forwarders on your domain.
- DNS - the records of your domain zone.
- Subdomains - carve blog.yourdomain.com and friends out of your site.
- Cron - scheduled jobs that run on your account.
- FTP - accounts for uploading with an FTP client.
- Backups - what is kept of your account, and restore.
- Apps - one-click applications (covered in the Apps & Docker section).

Everything here acts on your own account only.',
        ],
        'Putting your website online' => [
            'title' => '如何上传网站并使其上线',
            'article' => '将您的网站文件部署到主机空间有两种最常用的方式：

1. 在线文件管理器（推荐快速建站）：
   直接点击“文件管理”标签页，在浏览器中拖拽上传。对于文件较多的网站，强烈建议在本地打包为 .zip 压缩包上传，并在服务器端一键解压，这比逐个上传成千上万个小文件快几十倍。

2. 桌面 FTP 客户端（推荐日常维护）：
   在“FTP 账户”标签页中创建一个 FTP 账户，使用 FileZilla、WinSCP 等软件连接（填写页面给出的主机地址、端口、用户名和密码），即可像操作本地文件夹一样自由拖拽同步文件。

文件上传完成后，请确保网站首页文件（如 index.html 或 index.php）放置在正确的网站根目录下，并在浏览器中输入您的域名即可访问上线。',
            'eng_title' => 'Putting your website online',
            'eng_article' => 'Two ways to get files into your webspace:

1. The Files tab - upload straight from the browser. Archives can be uploaded whole and extracted on the server, which is the fastest way to move a large site.
2. FTP - create an account under the FTP tab and connect with a client such as FileZilla, using the server address, the username and the password shown there.

Your site is served from the public web folder of your account. Put the site\'s index file there - index.html or index.php - and your domain shows it.

If you are moving in from another host: upload the files, import the database under Databases, then update your site\'s configuration file with the new database name, user and password.',
        ],
        'Databases' => [
            'title' => '数据库快速创建与使用',
            'article' => '在“数据库管理”标签页中，您只需三步即可完成数据库配置：

1. 创建数据库：输入数据库名称后缀（系统会自动附加用户名前缀以保证全网唯一）。
2. 创建数据库用户：为该数据库设置专属用户名和高强度密码。
3. 关联授权：为该用户授予访问该数据库的权限。

数据库管理工具：
页面提供了 phpMyAdmin 的一键免密直连按钮，点击即可在新窗口打开图形化管理面板，支持执行 SQL 查询、导入/导出 .sql 数据脚本以及表结构优化。

若需要使用外部工具（如 Navicat 或 DBeaver）远程连接，请在页面开启“远程连接授权”并添加您的本地客户端公网 IP。',
            'eng_title' => 'Databases',
            'eng_article' => 'Under the Databases tab:

1. Create a database.
2. Create a database user with a strong password.
3. Connect them, so the user may use the database.

Your website\'s configuration needs three things: the database name, the username and the password. The database server address is usually localhost.

The web database manager opens from the same tab - browse tables, run queries, import and export dumps. Importing an existing site\'s dump here is the usual last step of a migration.',
        ],
        'Backups: what is kept, and how to get it back' => [
            'title' => '数据备份机制与灾难恢复指南',
            'article' => '“备份与恢复”标签页直观呈现了系统为您保存的所有快照备份，并支持随时一键还原。

备份涵盖的内容包括：
- 您的完整 Web 文件目录（包括所有网站源代码、图片及上传附件）。
- 所有关联的 MySQL 数据库完整快照。
- 邮箱账户及其邮件归档。

恢复流程：
当网站出现异常或遭遇代码改挂时，在历史快照列表中选择合适的时间点，点击“还原”按钮。系统会在恢复前提示您确认，并在后台自动将文件与数据库回滚至该时间点。

您还可以随时点击“立即创建快照”手动生成即时备份，或点击“下载归档”将备份包保存到本地电脑妥善保管。',
            'eng_title' => 'Backups: what is kept, and how to get it back',
            'eng_article' => 'The Backups tab shows what the platform holds for your account and lets you restore from it.

Two habits worth having anyway:

- Before a big change - upgrading your site\'s software, editing its configuration - download a copy of the files and export the database. Five minutes now beats an evening later.
- After finishing a migration in, take one backup so the earliest good state of the new home is on record.

Restores overwrite what is currently there. If you are unsure, open a ticket first and say what you need back - support can see what exists for your account.',
        ],
        'The Files tab, button by button' => [
            'title' => '文件管理器各项功能按钮详解',
            'article' => '点击“文件管理”标签页即可进入在线文件管理系统：

- 上传 (Upload) — 点击按钮选择文件，或直接从桌面将文件拖拽至页面虚线框中。
- 新建文件 / 新建文件夹 — 随时在当前目录下新建文件或目录并命名。
- 目录导航 — 点击任意文件夹即可进入，顶部的面包屑导航路径让您一键返回上级目录。
- 单项操作菜单：
  - 在线编辑 (Edit) — 在内置的代码编辑器中修改代码或配置文件，按 Ctrl+S 即可实时保存。
  - 重命名 (Rename) — 更改文件或目录名称。
  - 下载 (Download) — 将指定文件快速下载至本地。
  - 权限设置 (Permissions) — 修改 Linux 权限掩码（文件推荐 644，目录推荐 755）。
  - 打包 / 解压 (Extract/Compress) — 支持在线处理 ZIP、TAR.GZ 格式压缩包。
  - 删除 (Delete) — 清理不需要的废弃文件。',
            'eng_title' => 'The Files tab, button by button',
            'eng_article' => 'Open your service and choose Files. You are looking at your webspace.

- Upload - press it, or simply drag files from your computer onto the page ("Drop here"). Progress is shown per file.
- New File / New Folder - create either, name it in the box that opens.
- Click a folder to enter it; the path above the listing walks you back up.
- Each file\'s row offers: Edit (opens text files in a browser editor - save writes straight back), Rename, Download, Permissions (the Unix mode, e.g. 644 for files, 755 for folders), and Delete, which asks before it acts.
- Archives: upload a .zip of your whole site and extract it on the server - far faster than uploading a thousand small files.

The listing shows each item\'s size and when it was last modified. If a page of your site behaves oddly after an edit, this Modified column tells you what changed last.',
        ],
        'FTP accounts: creating one and connecting' => [
            'title' => 'FTP 账户创建与连接使用教程',
            'article' => '“FTP 账户”标签页用于管理桌面客户端（如 FileZilla、WinSCP、Cyberduck）的连接权限。

点击“创建账户”填写：
- 用户名：FTP 账户名。
- 密码：建议使用系统自动生成的强密码。
- 根目录限制：指定该账户登录后锁定的访问目录。保持默认则为整个主机根目录；若只想授权某位设计师访问特定站点，可指定为该站点的根目录。
- 存储配额：可限制该 FTP 账户允许上传的最大容量。

连接参数：
页面中的“连接信息”卡片展示了服务器地址、端口（默认 21）及推荐的加密协议。强烈建议在客户端中选用 FTPS (Explicit TLS) 传输加密方式，切勿使用不加密的明文 FTP，以免密码在网络传输中被嗅探。',
            'eng_title' => 'FTP accounts: creating one and connecting',
            'eng_article' => 'The FTP tab manages accounts for uploading with a desktop client such as FileZilla or WinSCP.

Press Create. You choose:
- Username - the account name.
- Password - use a generated one; you can change it later with Change password.
- Directory - where the account lands and is confined. Leave the default for the account root, or point it at a single folder to give someone access to just that folder.
- Quota (MB) - how much the account may store.

The Connection box on the same page shows exactly what to type into your client: host, port and protocol. Heed the protocol hint - connect with the secure variant your client offers, not plain FTP, so your password does not travel readable.

Your plan sets how many FTP accounts you may have; the page tells you when the limit is reached.',
        ],
        'Email mailboxes and webmail' => [
            'title' => '企业邮局账户创建与 Webmail 网页邮局',
            'article' => '“邮箱管理”标签页允许您在自己的独立域名下创建专业的企业邮箱（如 contact@yourdomain.com）。

创建步骤：
点击“新建邮箱”，选择域名，输入邮箱前缀、设置高强度密码及容量配额。创建后数秒内即可正常收发外网邮件。

网页邮局 (Webmail)：
在邮箱列表中点击对应邮箱右侧的“网页邮局”按钮，无需任何客户端设置，直接在浏览器中打开 Webmail 界面即可查阅、撰写和管理邮件。

客户端配置（手机或 Outlook）：
若需在 iPhone、Android 或 Outlook 中添加该邮箱，请参考页面给出的 IMAP/SMTP 客户端连接参数，登录用户名为完整邮箱地址。',
            'eng_title' => 'Email mailboxes and webmail',
            'eng_article' => 'The Email tab creates real mailboxes on your domain.

Press Create: pick the name (the part before the @), the domain, a password, and a quota in MB - or unlimited, if the plan allows. The new address can send and receive within moments.

- Webmail - every mailbox row has a Webmail button; it opens the inbox in the browser, no setup at all.
- Change password - per mailbox, from its row.
- Usage - the row shows how much of the quota is used.
- Delete - removes the mailbox AND its stored mail. Download anything you need first.

For a phone or desktop mail app, use the mail server settings shown on the page; the username is the full address.

If the tab says no domains are available, the service has no domain yet - email lives on a domain.',
        ],
        'DNS records on the hosting DNS tab' => [
            'title' => '主机 DNS 解析记录增删改查',
            'article' => '在主机的“DNS 解析”标签页中，您可以直接维护域名的 DNS 区域解析记录。

点击“添加记录”填写：
- 记录类型 (Type)：
  - A 记录：将域名直接指向服务器的 IPv4 地址。
  - AAAA 记录：将域名指向 IPv6 地址。
  - CNAME 记录：别名解析，将域名指向另一个域名。
  - MX 记录：邮件路由解析，附带优先级参数（数字越小优先级越高）。
  - TXT 记录：常用于域名所有权验证、SPF 反垃圾邮件及 SSL 验证。
- 主机记录 (Name)：域名前缀。输入 www 代表 www.yourdomain.com，输入 @ 代表根域名本身。
- 记录值 (Value)：具体的目标 IP、目标域名或 TXT 文本字符串。
- TTL：缓存有效时间（建议默认 3600 秒）。',
            'eng_title' => 'DNS records on the hosting DNS tab',
            'eng_article' => 'The DNS tab edits the zone of a domain on your hosting.

Press Create and fill four fields:
- Type - A for "this name points at this server address", CNAME for "this name is an alias of that name", MX for mail routing (with a Priority - lower is tried first), TXT for verifications such as SPF.
- Name - the host part. The hint under the field shows how it completes: www becomes www.yourdomain.com, @ means the domain itself.
- Value - the address or text the record answers with.
- TTL - how long the world may cache the answer, in seconds. 3600 is a sensible default.

Rows marked Protected are records the platform manages for your hosting to function - the hint on them explains why they resist editing. Change those only if you know exactly why.

Edits are live in the zone immediately, but the internet honours the old TTL, so give changes time.',
        ],
        'Subdomains' => [
            'title' => '子域名的创建与根目录映射',
            'article' => '“子域名管理”标签页允许您将主域名细分为多个二级网站（例如 blog.yourdomain.com 或 shop.yourdomain.com），每个子域名均可拥有完全独立的网站文件与程序。

创建流程：
1. 点击“新建子域名”。
2. 输入期望的二级前缀（如 blog）。
3. 指定站点根目录：系统默认会在 public_html 下创建同名子目录，您也可以自定义映射路径。

创建完成后，系统会自动生成对应的 DNS 解析并配置 Web 服务器虚拟主机，您只需将该子站点的网页文件上传至对应的子目录即可。',
            'eng_title' => 'Subdomains',
            'eng_article' => 'The Subdomains tab carves sections out of your domain - blog.yourdomain.com, shop.yourdomain.com - each with its own folder.

Press Create:
- Name - just the first label ("blog"); the page shows the full name it will become.
- Domain - which of your domains it hangs off.
- Document root - the folder its files live in; a default is suggested.
- PHP - the PHP version it runs, independent of the main site if you need that.
- SSL - note the hint: the certificate situation of a fresh subdomain is described right there.

A subdomain is a separate website in every practical sense: its own folder in Files, its own entry in DNS. Deleting one removes the subdomain, and asks first.',
        ],
        'Cron jobs: scheduled tasks' => [
            'title' => '定时任务 (Crontab) 设置与执行',
            'article' => '“定时任务”标签页允许您设定在特定周期自动触发的后台脚本（例如 WordPress 定时发布、数据库定时备份、系统缓存清理等）。

添加定时任务：
1. 设置周期：系统提供了常用预设（每小时、每日午夜、每周日等），也支持标准的 5 位 Cron 表达式输入。
2. 输入执行命令：输入需要执行的 Linux 命令或 PHP 脚本路径，例如：
   /usr/bin/php /var/www/yoursite/artisan schedule:run
3. 邮件通知（可选）：可配置当任务输出报错时将执行日志发送至指定邮箱。

任务列表还提供了“手动立即运行”按钮，方便您在保存后立即测试命令是否能正常成功执行。',
            'eng_title' => 'Cron jobs: scheduled tasks',
            'eng_article' => 'The Cron tab runs commands on a schedule - the heartbeat behind things like WordPress maintenance or a Laravel scheduler.

Press Create. Two modes:
- Basic - pick a frequency from a list.
- Advanced - set the five classic fields yourself: minute, hour, day of month, month, day of week.

The Command field is what runs. The Examples on the page cover the common cases - running a PHP script, a WordPress cron, a Laravel scheduler, or fetching a URL - copy the one that matches and adjust the path.

Email on error - give an address and the job\'s output is mailed to you when it fails, which is the only way you will ever hear about a broken nightly task.

Jobs can be disabled without deleting them - useful while debugging. Your plan caps how many jobs you may have.',
        ],
        'Backups on the Backups tab, precisely' => [
            'title' => '快照备份与手动创建步骤',
            'article' => '除了系统每天夜间自动执行的周期性快照外，在您对网站进行重大升级（如 WordPress 核心更新或插件大版本更新）之前，强烈建议手动创建即时快照。

操作步骤：
1. 进入“备份”标签页，点击“立即创建备份”。
2. 输入本次备份的备注名称（例如“升级 WooCommerce 之前”），方便日后辨识。
3. 点击开始，备份任务将在后台静默运行，不会影响当前网站的正常访问。

创建完成后，该条目会带有手动快照标记，支持随时下载为 tar.gz 压缩包或一键覆盖还原。',
            'eng_title' => 'Backups on the Backups tab, precisely',
            'eng_article' => 'The Backups tab shows your restore points and creates new ones.

Press Create: name the backup (or accept the suggestion), choose the scope - the whole account or specific domains - and whether it is full or incremental. Incremental records only what changed since the last one, so it is faster and smaller; full stands alone.

Each restore point lists what it contains. From a point you can download the archive - keep a copy off the server before risky work - or restore, which the hint on the page describes: restoring puts things back AS THEY WERE, overwriting what is there now.

Backups marked encrypted are stored encrypted at rest.

Rule of thumb: create a point before every upgrade or migration, and download one copy of anything you could not bear to lose.',
        ],
        'Database users, roles and the web manager' => [
            'title' => '数据库用户权限分配与高级管理',
            'article' => '数据库管理标签页深入指南：

- 用户与数据库独立解耦：在 MySQL 中，数据库与用户是独立实体。一个数据库可以被多个不同权限的用户访问，一个用户也可以同时管理多个数据库。
- 权限分配：您可以为数据库用户赋予“只读 (SELECT)”权限或“完全读写 (ALL PRIVILEGES)”权限，这在为第三方开发者提供有限查询权限时尤为实用。
- 密码更新：直接在用户列表点击“修改密码”即可快速更新凭据，更新后记得同步修改网站配置文件（如 .env 或 wp-config.php）。
- 图形化 Web 管理器：点击 phpMyAdmin 即可直连登录，支持大容量 SQL 脚本分卷导入、数据表一键修复与索引分析。',
            'eng_title' => 'Database users, roles and the web manager',
            'eng_article' => 'The Databases tab, in detail.

Creating a database offers to create its primary user in the same stroke - accept that unless you have a reason not to; a database without a user cannot be used by anything.

Add user attaches more users to an existing database, each with a role - full rights for the application itself, tighter rights for, say, a reporting tool that should only read.

Change password is per user, from its row. Your website\'s configuration must be updated with the new password at the same moment, or the site loses its database until you do.

The phpMyAdmin button opens the database in the web manager, already signed in - browse tables, run SQL, import and export dumps. Export is also the quickest manual database backup there is.

Deleting a database asks first, and means it: the data goes with it.',
        ],
        'Registering a domain' => [
            'title' => '如何注册全新域名',
            'article' => '在客户中心或首页的“域名搜索”框中输入您心仪的域名名称：

1. 查重检索：系统将实时检索该域名在 ICANN 全球注册局的状态，并列出是否可注册以及不同后缀（.com、.cn、.net 等）的首年注册与续费价格。
2. 加入购物车：找到合适的域名后点击“加入购物车”，可同时选购关联的 Web 主机服务或免费 DNS 解析。
3. 配置选项：结账时系统提供“WHOIS 隐私保护”选项，开启后可隐藏您的真实姓名与联系电话，避免被推销电话骚扰。
4. 结账开通：付款成功后，系统通过 API 直连注册局自动完成注册，几分钟内即可在全球根服务器生效可用。',
            'eng_title' => 'Registering a domain',
            'eng_article' => 'Use Domain Search - from the homepage or the client area. Type the name, and the results show whether it is free and what it costs per year, along with suggestions for other endings.

Press Register on the one you want, and it goes to the cart like any product. After payment the domain is registered to you and appears under Domains.

From its page you manage everything: nameservers, DNS records, the registrar lock, ID protection and renewal. Auto-renew is worth turning on for any domain you care about - an expired domain takes your website and email down with it, and getting one back after expiry is slow and sometimes expensive.',
        ],
        'Transferring a domain to us' => [
            'title' => '将外部域名转入到本平台',
            'article' => '域名转入可以将您在其他注册商处的域名管理与续费统一部署在此处。域名转入过程中，您现有的网站和邮箱不会发生任何中断。

转入三步曲：
1. 在原注册商处解锁并获取授权码：登录原注册商平台，关闭“域名转移锁 (Registrar Lock)”，并申请获取 EPP 转移密码（Transfer Code）。
2. 在本平台发起转入：在域名转入页面输入域名和 EPP 授权码，加入购物车并结算转入费用（通常转入会包含额外赠送 1 年续费时长）。
3. 邮箱确认核验：部分域名后缀会向原注册人邮箱发送确认邮件，点击邮件中的同意链接后，通常在 1~5 个工作日内即可全自动顺利完成转移。',
            'eng_title' => 'Transferring a domain to us',
            'eng_article' => 'A transfer moves the management and billing of your domain here. Your website keeps running throughout.

Three steps, in this order:

1. Unlock the domain at your current registrar - turn off its transfer lock.
2. Request the EPP code there (also called an Auth code). It is usually emailed to the domain owner.
3. Open Domain Transfer here, enter the domain and the code, and complete the order.

The transfer usually completes within 5-7 days; your current registrar may email you a confirmation that speeds things up. The registration time you already paid for is kept, and a year is added on top.

The step that stalls most transfers is the second one - if you cannot find the EPP code, it comes from your CURRENT registrar, not from us.',
        ],
        'Nameservers, DNS and the difference' => [
            'title' => '域名服务器 (Nameservers) 与 DNS 解析的区别',
            'article' => '理解两者区别有助于快速排查建站解析问题：

- 域名服务器 (Nameservers / NS)：相当于指路牌，决定了“由哪台服务器来解答关于您域名的所有访问查询”。
  通常形如 ns1.pnlcs.com 和 ns2.pnlcs.com。
- DNS 解析记录 (Records)：则是该指路牌背后具体的详细清单（如 A 记录、CNAME 记录、MX 记录）。

工作机制：
如果您的域名 Nameserver 设置为本平台的 NS，那么在主机控制台添加的 A 记录和邮箱解析才能正常生效；如果您使用了 Cloudflare 或第三方 CDN 的 NS，则解析记录必须前往该第三方控制台进行维护。',
            'eng_title' => 'Nameservers, DNS and the difference',
            'eng_article' => 'Nameservers say WHO answers questions about your domain. DNS records are the answers themselves.

If your domain uses our nameservers, edit records under the domain\'s Manage DNS: A records point names at server addresses, CNAME records point names at other names, MX records route your email, TXT records carry verifications (SPF, domain ownership and so on).

If the domain points at another provider\'s nameservers - a CDN, an external DNS host - then records are edited THERE, and our DNS page for that domain has no effect. That mismatch is the most common reason a record "does not work".

DNS changes are not instant: allow up to a few hours for the world to notice, though most changes show within minutes.',
        ],
        'EPP codes, registrar lock and ID protection' => [
            'title' => 'EPP 转移码、域名转移锁与隐私保护',
            'article' => '域名详情页上的三大核心安全机制：

- 域名转移锁 (Registrar Lock)：
  默认应始终保持开启。锁定状态下，任何未经授权的域名转出申请都会被注册局直接无条件拦截，有效防止域名被恶意盗转。
- EPP 转移密码 (Auth/EPP Code)：
  类似域名的“房产证密码”。当且仅当您确实需要将域名转移至其他注册商时，才需要关闭转移锁并复制此代码提供给新注册商。
- WHOIS 隐私保护 (ID Protection)：
  全球公共 WHOIS 数据库默认对外公示所有者的姓名、地址和邮箱。开启隐私保护后，公示信息将被隐私代理机构替代，有效杜绝垃圾邮件和电话轰炸。',
            'eng_title' => 'EPP codes, registrar lock and ID protection',
            'eng_article' => 'Three switches on the domain\'s page, all about ownership:

- Registrar lock - blocks transfers away while enabled. Keep it on; turn it off only when you are deliberately transferring out.
- EPP code - the password a transfer needs. Get EPP Code shows yours when you want to move the domain elsewhere. Treat it like a password: whoever has it can start a transfer.
- ID protection - hides your personal details from the public WHOIS directory, which otherwise lists the owner of every domain.

If you are leaving: unlock first, then request the EPP code, and hand it only to the registrar you are moving to.',
        ],
        'The domain page, field by field' => [
            'title' => '域名管理详情页各项参数详解',
            'article' => '进入“我的域名”并点击特定域名，即可进入该域名的管理中枢：

- 基础状态：显示域名状态（Active/正常、Expired/已过期、Pending/待处理）、注册日期及下次续费到期日。
- 自动续费开关：开启后，系统会在到期前自动从您的账户余额或绑定支付方式中扣费续展，防止因遗忘导致域名被抢注。
- Nameservers (DNS 服务器)：可自由选择“使用官方默认托管服务器”或“指定自定义外部服务器”。
- DNS 管理：直接在此维护域名的全局 A、CNAME、MX、TXT 解析记录。
- 注册人联络信息：依 ICANN 规范维护所有者、管理联系人、技术联系人的详细地址与邮编。',
            'eng_title' => 'The domain page, field by field',
            'eng_article' => 'Open Domains and click one. The page is the domain\'s control room:

- Domain information - registration and expiry dates. The expiry date is the one to respect: a domain past it stops resolving, taking the website and every mailbox on it down.
- Auto Renew - on means an invoice is issued and the domain renewed before expiry, automatically. For any domain that matters, on.
- Nameservers - who answers DNS for this domain. Save changes here only when moving DNS hosting; the page will say if the registrar does not allow it.
- Manage DNS - the record editor, when the domain uses our DNS.
- Registrar Lock - keeps transfers away blocked. Leave it on.
- ID Protection - keeps your details out of public WHOIS.
- Get EPP Code - the transfer password, for when you deliberately move the domain elsewhere.

Renewal itself is an invoice like any other: it appears under Invoices ahead of the date, and paying it is what renews the domain.',
        ],
        'How invoices work' => [
            'title' => '账单周期与发票运作机制',
            'article' => '我们所有的周期性服务均按您下单时选定的计费周期（月付、季付、年付等）自动运转：

- 提前出账：系统通常会在服务到期日前若干天（通常为 7-14 天）自动生成续费发票，并通过邮件提醒您。
- 宽限期：若到期日当天未及时付款，系统通常会提供 1~3 天的宽限期供您处理账单，期间业务不会立即中断。
- 暂停与恢复：超出宽限期仍未付款的实例会被系统自动暂时停机挂起（Suspended）。只要补缴账单，系统会秒级全自动恢复服务，数据原封不动。
- 正式发票下载：所有已付款的发票均可在“我的发票”详情中点击“下载 PDF”导出符合财税规范的正式电子凭证。',
            'eng_title' => 'How invoices work',
            'eng_article' => 'Every product renews on a cycle you chose at order time, and an invoice is issued ahead of each renewal - you will find it under Invoices and in your email.

An invoice shows its issue date, due date and lines. Pay it with any of the payment methods offered on its page; once payment is confirmed the invoice flips to Paid, and a PDF of it can be downloaded any time - the PDF carries the company details and the tax lines, suitable for your bookkeeping.

An unpaid invoice past its due date can suspend the service it belongs to, so if something about an invoice looks wrong, open a ticket before the due date rather than letting it slide.',
        ],
        'Paying by bank transfer' => [
            'title' => '银行对公/线下转账汇款支付流程',
            'article' => '对于不支持实时线上扫码或需要大额对公结算的企业客户，我们支持银行转账支付：

1. 获取汇款信息：在未付发票的支付方式下拉框中选择“银行转账”，页面会展示我方对公收款银行户名、开户行账号及开户支行名称。
2. 附言备注发票号：进行银行汇款时，请务必在转账“附言/备注”栏中填入您的发票编号（如 INV-10023），以便财务系统快速自动匹配对账。
3. 上传转账水单：汇款完成后，点击发票下方的“提交汇款凭证”，上传银行转账回单截图。
4. 人工入账：财务专员通常在工作时间内 1~2 小时内完成核验，核销发票并自动激活对应的服务。',
            'eng_title' => 'Paying by bank transfer',
            'eng_article' => 'Bank transfers are confirmed by a person, so they are not instant. The flow:

1. Open the invoice and choose bank transfer. The page shows the account details - use your INVOICE NUMBER as the payment reference, it is how your money finds your invoice.
2. Send the transfer at your bank.
3. Tell us on the invoice page that you paid - attach the receipt if you have one.

Your note lands in a review queue. When the transfer is confirmed, the invoice is marked paid and anything waiting on it proceeds. If the amount differs from the invoice - a partial payment - the invoice stays open for the remainder.',
        ],
        'Account credit' => [
            'title' => '账户余额预存与自动扣款',
            'article' => '在客户中心顶部导航栏的“账户”->“充值余额 (Add Funds)”中，您可以提前预存资金到账户余额中：

- 余额优先原则：当账户内存在可用余额时，未来系统生成续费发票时会自动优先使用余额全额扣除，避免因银行卡过期或临时遗忘导致业务停机。
- 多退少补：如果余额不足以完全抵扣账单，剩余未支付差额可继续通过支付宝、微信或信用卡在线补缴。
- 退款去向：在符合退款政策的前提下，申请退还的款项通常会优先退回至账户余额，方便您随时选购其他产品。',
            'eng_title' => 'Account credit',
            'eng_article' => 'Under Add Funds you can load money onto the account before you owe it - a few preset amounts, or a custom one.

Credit is applied to invoices as they are issued, which is useful in two situations: renewals you never want to bounce (the invoice pays itself from credit the moment it is issued), and accounting flows where one larger payment is easier to process than many small ones.

Your current balance shows on the same page and on invoices as they consume it.',
        ],
        'Cancelling a service' => [
            'title' => '服务取消与停用申请流程',
            'article' => '如果您不再需要某项主机或服务，可以通过客户中心主动提交取消申请：

1. 进入“我的服务”，点击需要退订的实例。
2. 点击左侧操作菜单栏中的“申请取消服务 (Request Cancellation)”。
3. 简要填写取消原因（以便我们改善产品与服务）。
4. 选择取消生效时间：
   - 账期结束时取消（推荐）：该服务将继续正常运行直至当前付费周期结束，系统此后不会再为其生成新的续费账单。
   - 立即取消：系统将在 24 小时内停止并彻底注销该实例及其数据。

重要提醒：取消前请务必自行将网站文件、数据库及重要数据下载备份至本地。',
            'eng_title' => 'Cancelling a service',
            'eng_article' => 'Open the service and request cancellation. Two flavours:

- End of billing period - the service runs until the day you already paid for, then closes. The usual choice.
- Immediate - the service closes right away.

Cancelling stops future invoices for that service. It does not delete your invoices or your account, and other services are untouched.

Take your data first. A closed service\'s files and databases are removed - download what you need under Files and Databases before the end date, not after.',
        ],
        'Promo codes' => [
            'title' => '优惠码使用与折扣减免规则',
            'article' => '如果您获得了官方促销活动优惠码：

1. 输入优惠码：在选购商品结算时的购物车页面，找到“输入优惠码”输入框，填入您的代码并点击“应用优惠”。
2. 折扣校验：系统会立即核验该优惠码的适用范围（特定方案、最低金额、首次购买等）并刷新显示减免后的实付金额。
3. 优惠类型：
   - 一次性折扣：仅对当前首期账单生效，后续周期续费按原价结算。
   - 永久循环折扣：首期及后续每个周期的续费账单均享受同等折扣减免。

一个订单每次结算仅能使用一个有效优惠码，不可叠加使用。',
            'eng_title' => 'Promo codes',
            'eng_article' => 'A promotion code is entered in the cart, before checkout: the cart page has a field for it, and applying a valid code recalculates the totals immediately - you see the discount before paying anything.

Codes have terms set by the operator: some work only on the first invoice, some on every renewal, some only for specific products or billing cycles. If a code is refused, the cart says so rather than silently ignoring it.

One code applies per cart.',
        ],
        'Upgrading or downgrading a plan' => [
            'title' => '主机套餐升配与降配指南',
            'article' => '随着业务规模扩展，您可以随时调整主机的硬件配置，升级过程平滑无缝，数据零丢失：

1. 在“我的服务”中打开目标实例，点击左侧菜单的“升级/降配”。
2. 选择期望的目标套餐（例如从基础版升级至专业版）。
3. 补差价计算：系统会精确按天计算当前方案尚未用完的剩余价值，自动折抵到新方案中，您仅需支付当前计费周期剩余天数的差额。
4. 支付生效：差价账单支付完成后，系统通过底层 cgroups 立即实时调整该主机的 CPU、内存与磁盘配额，无需繁琐的数据迁移。',
            'eng_title' => 'Upgrading or downgrading a plan',
            'eng_article' => 'Open the service and choose Upgrade/Downgrade. The page shows the plan you are currently on and the plans you may move to; pick one and press Request change.

What happens next depends on the direction. An upgrade is priced for the remainder of the current period - you pay the difference, not a full new term. The service\'s resources change once the request is processed and any difference is settled.

Your files, databases, email and apps ride along untouched: a plan change resizes the account, it does not rebuild it. Downgrading to a plan smaller than what you currently use - more disk in use than the new plan allows, more apps than it permits - is the one case to check before requesting.

If the page says no changes are available, the operator has not defined an upgrade path for your product; a ticket is the way to ask.',
        ],
        'Opening a support ticket' => [
            'title' => '如何提交技术支持工单',
            'article' => '工单是与我们专业工程师团队沟通的核心官方渠道。通过工单沟通时，工程师可以直接查阅您关联的主机配置与系统日志，高效定位问题。

提交优质工单的技巧：
1. 选择匹配的部门：根据问题类型选择“技术支持”、“财务计费”或“售前咨询”。
2. 关联具体服务：在“关联产品/服务”下拉框中选定出问题的主机或域名。
3. 设定合理优先级：普通使用咨询请选择“普通/中”，生产环境重大中断可选择“高/紧急”。
4. 详实描述现象：
   - 涉及的具体域名或访问 URL。
   - 遇到的完整报错信息或 HTTP 错误码（如 502 Bad Gateway）。
   - 复现问题的具体操作步骤。',
            'eng_title' => 'Opening a support ticket',
            'eng_article' => 'Tickets are the channel with your account attached - the person answering sees your services and history, which no email address can offer.

Under Tickets, press to open one: pick the department, a subject, the priority, and - this matters - the related service, so nobody has to ask which of your products you mean. Attachments are welcome: a screenshot of an error beats a description of one.

What makes a ticket fast to solve: what you did, what you expected, what happened instead, and when. "The site is down" takes three round-trips; "example.com shows a 500 error since about 14:00, right after I updated a plugin" is often solved in one.',
        ],
        'What happens after you open a ticket' => [
            'title' => '工单流转流程与客服响应时效',
            'article' => '工单成功提交后，系统将自动分配唯一的跟踪工单号（如 #TID-88231）：

- 自动邮件通知：系统会第一时间发送确认邮件。客服团队处理并回复后，回复内容将同步抄送至您的注册邮箱。
- 在线直接追问：您可以直接登录客户中心在工单页面回复，也可以直接在收到的通知邮件中点击“直接回复”，系统会自动将邮件内容解析追加至工单会话中。
- 状态演进：
  - 待处理 (Open) — 工单已派发，等待工程师首次响应。
  - 已回复 (Answered) — 客服已给出解答方案，等待您核实测试。
  - 客户回复 (Customer Reply) — 您已补充了新的问题描述，等待客服进一步跟进。
  - 已关闭 (Closed) — 问题已妥善解决。若后续又有疑问，您可以随时重新开启该工单。',
            'eng_title' => 'What happens after you open a ticket',
            'eng_article' => 'A new ticket lands with the department you chose, marked with your priority and, if you set one, the related service - which is why setting it matters: the person answering opens your ticket already looking at the right product.

Replies arrive two ways at once: on the ticket\'s page, and as an email to your account address. Answering the email or replying on the page are the same conversation.

A ticket stays open while the conversation is live. When it is answered and done, it is closed - and a closed ticket is not a locked door: replying to it brings it back.

Attachments can be added with any reply, not just the first message. When support asks for a screenshot or a log, drop it into your next reply on the ticket page.',
        ],
        'Announcements and staying informed' => [
            'title' => '平台服务公告与维护通知',
            'article' => '“服务公告 (Announcements)”页面是我们发布全网重要通知的官方平台：

- 计划内维护通知：机房硬件升级、主干网络扩容或操作系统底层安全补丁更新通常会提前 24~48 小时在此公示具体的维护窗口与可能受影响的服务范围。
- 突发故障通报：若遭遇突发网络拥堵或上游故障，工程师团队会在公告中实时播报排查修复进度。
- 新功能与优惠上线：重大产品功能更新与年度促销福利活动也会在此第一时间首发。

建议重要企业客户保持注册邮箱通畅，系统对于高等级维护公告会同步进行邮件广播。',
            'eng_title' => 'Announcements and staying informed',
            'eng_article' => 'The Announcements page carries news that concerns customers - maintenance windows, new features, pricing changes. Worth a glance when something seems off before opening a ticket: a known maintenance window answers the question faster than we can.

Your email address on the account is where invoices, ticket replies and important notices go. Keep it current under Account - a bounced address means missed renewal notices, and missed renewal notices are how domains expire by surprise.',
        ],
        'Ordering an SSL certificate' => [
            'title' => 'SSL 安全证书选购与开通指引',
            'article' => '为网站部署 SSL 证书是启用 HTTPS 加密传输、防止数据被篡改并提升搜索引擎 SEO 权重的必要步骤。

我们提供两种 SSL 方案：
1. 免费 Let\'s Encrypt 证书：
   所有虚拟主机均默认支持一键签发免费的自动续期 SSL 证书，适合绝大多数个人博客与常规企业官网。
2. 付费商业级证书（Sectigo / DigiCert）：
   在“SSL 证书”页面可购买商业 DV 单域名、通配符（Wildcard，支持无限二级子域名）以及专业 OV/EV 企业级证书，提供高达数十万美元的安全赔付保障及专属浏览器安全绿色标识。',
            'eng_title' => 'Ordering an SSL certificate',
            'eng_article' => 'The SSL page under your client area lists your certificates and sells new ones - these are paid certificates issued by a certificate authority, the kind that carries organisation validation or warranty where the product includes it.

Ordering is like any product: pick the certificate, pay the invoice. The new certificate then appears under My certificates as Pending configuration - it exists as an order, and the next article\'s configuration step is what turns it into an issued certificate.

Certificates have their own expiry, shown on each one\'s page. Renewal is a fresh invoice ahead of the date, like a domain.',
        ],
        'Configuring and validating your certificate' => [
            'title' => 'SSL 证书配置与域名所有权验证',
            'article' => '购买付费商业 SSL 证书后，需要完成以下三步即可正式签发：

1. 生成或粘贴 CSR 请求：在证书配置页面填写组织信息并生成 CSR（Certificate Signing Request）公钥请求文件与私钥 (Private Key)。请务必将私钥妥善保存至本地。
2. 域名所有权验证 (DCV)：
   权威 CA 机构需要确认您对该域名拥有合法管理权。支持三种方式（任选其一）：
   - DNS 验证（最推荐）：在您的域名解析中添加一条指定的 CNAME 或 TXT 记录。
   - 邮箱验证：CA 机构向 admin@yourdomain.com 等指定管理员邮箱发送核验链接。
   - HTTP 文件验证：在网站根目录下指定路径放置一个由 CA 指定特征字符串的文本文件。
3. 审核与下载：验证通过后数分钟内，证书即签发成功。您可在页面直接下载 CRT 证书文件，并在主机的“SSL 部署”页面粘贴导入即可启用 HTTPS。',
            'eng_title' => 'Configuring and validating your certificate',
            'eng_article' => 'Open the pending certificate and press Configure now. Three things happen on this page:

1. The CSR. A certificate signing request carries the domain name (the Common name) and, on multi-domain certificates, the additional names (SANs). Paste one from your server if you have it - the page decodes it so you can check what it says - or let the page generate it. The Common name must be exactly the domain the certificate is for.
2. Contact details - the administrative contact the authority records.
3. The validation method - how the authority checks the domain is yours:
   - Email - a message to an address on the domain; click its link.
   - DNS - add the CNAME record the page shows to the domain\'s DNS.
   - HTTP - place the file the page provides at the path it names on your site.

After validation the authority issues the certificate and it lands on the certificate\'s page, ready to install. If validation stalls, the page shows which method it is waiting on - the DNS record or file it expects is spelled out there.',
        ],
    ],
];
