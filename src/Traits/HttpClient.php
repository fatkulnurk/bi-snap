<?php

namespace Fatkulnurk\Snaps\Traits;

use Fatkulnurk\Snaps\Config\Config;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

/**
 * Class Request
 *
 * @category Class
 * @package  Fatkulnurk\Snaps\Request
 * @author   Fatkul Nur Koirudin <rudi@dibumi.com>
 **/
trait HttpClient
{
	public function getBaseUrl(): string
	{
		return Config::getInstance()->getHost();
	}

	public function getToken(): string
	{
		return Cache::remember(HttpClient::class . '_getToken', Carbon::now()->addHours(4), function () {
			return $this->requestToken();
		});
	}

	private function requestToken(): string
	{
		$config = Config::getInstance();
		$url = $config->getHost() . '/api/oauth/token';
		$response = Http::withBasicAuth($config->getApiKey(), $config->getSecretKey())->post($url, [
			'grant_type' => $config->getClientCredential(),
			'scope' => $config->getScope()
		]);

		if (!$response->ok()) {
			throw new \Exception($response->reason());
		}

		return $response->json()['data']['access_token'];
	}

	public function getHttpClient()
	{
		return Http::asJson()->withToken($this->getToken());
	}
}