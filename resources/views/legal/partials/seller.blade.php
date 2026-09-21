{{--
     The seller's identity block, read from the general settings rather than
     written into each document. Turkish consumer law requires the seller's
     registered title, address, telephone, tax office and tax number to appear
     on the distance sales contract and the pre-contractual form; the same
     block also answers the "who is the controller" question GDPR asks.

     Fields the law requires are always rendered, showing an em dash when the
     operator has not filled them in — a contract that quietly drops the
     seller's address looks complete and is not. Optional fields (MERSIS,
     trade registry) are shown only once they hold a value.
--}}
@php
    // Bu parça üç ayrı yerden çağrılıyor (yasal belgeler, hakkımızda, ileride
    // başkaları). Birinin göndermeyi unuttuğu bir anahtar sayfayı düşürmesin;
    // o satır boş görünsün yeter.
    $company = array_merge([
        'name' => '', 'legal_name' => '', 'address' => '', 'city' => '', 'state' => '',
        'postcode' => '', 'country' => '', 'phone' => '', 'email' => '', 'website' => '',
        'tax_office' => '', 'tax_id' => '', 'mersis' => '', 'trade_registry' => '',
    ], $company ?? []);

    $isZh = ($legalLocale ?? app()->getLocale()) === 'zh';
    $isTr = ($legalLocale ?? app()->getLocale()) === 'tr';

    $lbl = function($zh, $trText, $en) use ($isZh, $isTr) {
        if ($isZh) return $zh;
        if ($isTr) return $trText;
        return $en;
    };

    $mandatory = [
        $lbl('企业/注册名称', 'Unvan', 'Registered name')            => $company['legal_name'] ?: $company['name'],
        $lbl('商号 / 经营字号', 'Marka / işletme adı', 'Trading as')  => ($company['legal_name'] && $company['legal_name'] !== $company['name']) ? $company['name'] : '',
        $lbl('经营地址', 'Adres', 'Address')                         => trim(implode(', ', array_filter([
                                                                           $company['address'], $company['postcode'],
                                                                           $company['city'], $company['state'], $company['country'],
                                                                       ]))),
        $lbl('联系电话', 'Telefon', 'Telephone')                     => $company['phone'],
        $lbl('电子邮箱', 'E-posta', 'Email')                         => $company['email'],
        $lbl('官方网站', 'İnternet adresi', 'Website')               => $company['website'],
        $lbl('税务登记机关', 'Vergi dairesi', 'Tax office')           => $company['tax_office'],
        $lbl('统一税号 / 识别号', 'Vergi numarası', 'Tax number')      => $company['tax_id'],
    ];

    // Shown only when set: not every company has these, and an empty row
    // invites the question "why is that blank?" where none is warranted.
    $optional = [
        $lbl('MERSİS 商业系统编号', 'MERSİS numarası', 'MERSIS number') => $company['mersis'],
        $lbl('商业登记编号', 'Ticaret sicil numarası', 'Trade registry no') => $company['trade_registry'],
    ];

    $tradeKey = $lbl('商号 / 经营字号', 'Marka / işletme adı', 'Trading as');
    $rows = $mandatory;
    // "Marka" only earns a row when the brand and the registered name differ.
    if ($rows[$tradeKey] === '') {
        unset($rows[$tradeKey]);
    }
    foreach ($optional as $label => $value) {
        if (trim((string) $value) !== '') {
            $rows[$label] = $value;
        }
    }
@endphp
<table>
    <tbody>
    @foreach($rows as $label => $value)
        <tr>
            <th style="width:32%;">{{ $label }}</th>
            <td>{{ trim((string) $value) !== '' ? $value : '—' }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
