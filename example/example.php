<?php

use Carbon\CarbonImmutable;
use Fatkulnurk\Snaps\Config\Config;
use Fatkulnurk\Snaps\Resources\WebhookResource;
use Fatkulnurk\Snaps\Snap;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Request;

require_once '../vendor/autoload.php';
/*
 * set config or example usage
 * */
Config::getInstance()
	->setHost('')
	->setApiKey('')
	->setSecretKey('')
	->setAppId('')
	->setPartnerServiceId('');

//Config::getInstance()->getHost();

/*
 * Client
 *
 * bukuku personal & bisnis
 * */
// pembuatan
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


// cek status va
$externalId = ''; // id dari transactions di personal atau bisnis
$va->inquiryStatus($externalId);


// terima webhook
$webhookResource = (new Snap())->webhook()->retrieve((new Request()));

/*
 * SERVER
 *
 * dari aplikasi bca ke aplikasi personal atau bisnis
 * */
$app = \App\Models\App::query()->first();
$response = (new Snap())->webhook()->dispatch($app, (new WebhookResource())
	->setExternalId('')
	->setType('')
	->setEvent('')
	->setData([])
);


$command = new class {
	private array $commands = [];
	private string $action;

	public function setCommand(string $action, callable $callback): void {
		$this->commands[] = compact('action', 'callback');
	}

	public function setAction($action)
	{
		$this->action = $action;
	}

	public function run()
	{
		$action = collect($this->commands)->firstWhere('action', $this->action);

		if (blank($action)) {
			throw new Exception('Command not found');
		}

		$query = [];
		$action['callback']($query);
	}
};

$command->setCommand('bot xxx', function ($query) {
	echo 'bot';
});

$command->setAction('x');
$command->run();