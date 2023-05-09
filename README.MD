PT Bukuku Solusi Kreatif
---
Packages untuk integrasi Snap Bank Indonesia di aplikasi internal PT Bukuku Solusi kreatif


### contoh

set config
```text
Config::getInstance()
	->setHost('')
	->setApiKey('')
	->setSecretKey('')
	->setAppId('')
	->setPartnerServiceId('');
```

retrieve config
```text
Config::getInstance()->getHost();
```

create virtual account
```text
$va = (new Snap())
	->transferCredit()
	->bank()
	->virtualAccount();
	
// buat virtual akun
$va->create([
	'app_id' => '',
	'partner_service_id' => '',
	'external_id' => '',
	'customer_no' => '',
	'va_number' => '',
	'va_name' => '',
	'va_email' => '',
	'va_phone_number' => '',
	'amount' => 10000,
	'payment_details' => [],
	'expired_at' => CarbonImmutable::now()->addDay(),
]);
```

cek status va
```
// cek status va
$externalId = ''; // id dari transactions di personal atau bisnis
$va->inquiryStatus($externalId);
```

