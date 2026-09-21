@extends('legal.layout')

@php
    $isZh = $legalLocale === 'zh';
    $isTr = $legalLocale === 'tr';
@endphp

@section('legal-title', $isZh ? '法律条款与政策' : ($isTr ? 'Yasal Belgeler' : 'Legal'))
@section('legal-description', $isZh
    ? $company['name'].' 服务条款、隐私政策、退款政策以及其他法律条款文件。'
    : ($isTr
        ? $company['name'].' kullanım koşulları, gizlilik politikası, iade politikası ve diğer yasal belgeler.'
        : $company['name'].' terms of service, privacy policy, refund policy, service level agreement and other legal documents.'))

@section('legal-content')
    <div class="legal-head">
        <h1>{{ $isZh ? '法律条款与政策' : ($isTr ? 'Yasal Belgeler' : 'Legal Documents') }}</h1>
        <p>
            {{ $isZh
                ? '使用我们的服务时适用的所有协议与政策。每份文件均注明生效日期；订单受下单当日生效的文件约束。'
                : ($isTr
                    ? 'Hizmetlerimizi kullanırken geçerli olan sözleşme ve politikaların tamamı. Her belge yürürlük tarihi taşır; bir siparişe, siparişin verildiği tarihte yürürlükte olan metin uygulanır.'
                    : 'Every agreement and policy that applies when you use our services. Each document carries an effective date; an order is governed by the text in force on the day it was placed.') }}
        </p>
    </div>

    <div class="legal-cards">
        @foreach($documents as $slug => $doc)
            <a href="{{ route('legal.show', $slug) }}" class="legal-card">
                <i class="{{ $doc['icon'] }}"></i>
                <b>
                    {{ $doc[$legalLocale][0] ?? ($doc['zh'][0] ?? $doc['en'][0]) }}
                    @if(!empty($doc['tr_only']))
                        <span class="legal-tag">{{ $isZh ? '土耳其法律适用' : 'Türkiye' }}</span>
                    @endif
                </b>
                <span>{{ $doc[$legalLocale][1] ?? ($doc['zh'][1] ?? $doc['en'][1]) }}</span>
            </a>
        @endforeach
    </div>

    <div class="legal-note" style="margin-top:32px;">
        <p>
            <strong>{{ $isZh ? '如有疑问' : ($isTr ? 'Sorularınız için' : 'Questions') }}</strong> —
            {{ $isZh ? '如对这些条款文件有任何疑问，请发送邮件至' : ($isTr ? 'Bu belgelerle ilgili her türlü soru için' : 'For any question about these documents, write to') }}
            <a href="mailto:{{ $company['email'] }}">{{ $company['email'] }}</a>{{ $isZh ? '。' : ($isTr ? ' adresine yazabilirsiniz.' : '.') }}
            {{ $isZh
                ? '举报滥用与版权侵权请联系'
                : ($isTr
                    ? 'Kötüye kullanım ve telif ihlali bildirimleri için'
                    : 'Abuse reports and copyright complaints go to') }}
            <a href="mailto:{{ $company['abuse_email'] }}">{{ $company['abuse_email'] }}</a>{{ $isZh ? '。' : '.' }}
        </p>
    </div>

    <p class="legal-meta">
        {{ $isZh ? '最后更新于' : ($isTr ? 'Son güncelleme' : 'Last updated') }}:
        {{ \Carbon\Carbon::parse($revised)->translatedFormat($isZh ? 'Y年n月j日' : ($isTr ? 'd F Y' : 'F j, Y')) }}
    </p>
@endsection
