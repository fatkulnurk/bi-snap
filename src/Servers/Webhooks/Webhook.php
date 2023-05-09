<?php

namespace Fatkulnurk\Snaps\Servers\Webhooks;

use Fatkulnurk\Snaps\Resources\WebhookResource;
use Illuminate\Support\Facades\Http;

/**
 * Class Webhook
 *
 * @category Class
 * @author   Fatkul Nur Koirudin <rudi@dibumi.com>
 **/
class Webhook
{
	public function dispatch($app, WebhookResource $webhookResource)
	{
		if (filled($app->webhook)) {
			return Http::withHeaders([
				'Content-Type' => 'application/json',
				'X-Partner-Key' => $app->id,
			])->asJson()->post($app->webhook, [
				'external_id' => $webhookResource->getExternalId(),
				'type' => $webhookResource->getType(),
				'event' => $webhookResource->getEvent(),
				'data' => $webhookResource->getData()
			]);
		}

		return null;
	}

	public function retrieve($request)
	{

	}
}