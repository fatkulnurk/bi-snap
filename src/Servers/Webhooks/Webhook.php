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
	/**
	 * @param                 $app
	 * @param WebhookResource $webhookResource
	 *
	 * @return array
	 */
	public function dispatch($app, WebhookResource $webhookResource)
	{
		$response = null;
		if (filled($app->webhook)) {
			$response = Http::withHeaders([
				'Content-Type' => 'application/json',
				'X-Partner-Key' => $app->id,
			])->asJson()->post($app->webhook, [
				'external_id' => $webhookResource->getExternalId(),
				'type' => $webhookResource->getType(),
				'event' => $webhookResource->getEvent(),
				'data' => $webhookResource->getData()
			]);
		}

		return [
			'is_success' => $response->successful() ?? false,
			'data' => $response->json() ?? []
		];
	}

	/**
	 * @param $request
	 *
	 * @return WebhookResource
	 */
	public function retrieve($request): WebhookResource
	{
		return (new WebhookResource())
			->setExternalId($request->external_id)
			->setType($request->type)
			->setEvent($request->event)
			->setData($request->data ?? []);
	}
}