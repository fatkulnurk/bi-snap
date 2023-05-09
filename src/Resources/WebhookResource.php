<?php

namespace Fatkulnurk\Snaps\Resources;

/**
 * Class WebhookResource
 *
 * @category Class
 * @package  Fatkulnurk\BcaSnapPackages\Webhooks\Resources
 * @author   Fatkul Nur Koirudin <rudi@dibumi.com>
 **/
class WebhookResource
{
	protected string $externalId;
	protected array $data;
	protected string $event; // "created", "updated", "deleted"
	protected string $type;

	/**
	 * @return string
	 */
	public function getExternalId(): string
	{
		return $this->externalId;
	}

	/**
	 * @param string $externalId
	 *
	 * @return WebhookResource
	 */
	public function setExternalId(string $externalId): WebhookResource
	{
		$this->externalId = $externalId;
		return $this;
	}

	/**
	 * @return array
	 */
	public function getData(): array
	{
		return $this->data;
	}

	/**
	 * @param array $data
	 *
	 * @return WebhookResource
	 */
	public function setData(array $data): WebhookResource
	{
		$this->data = $data;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getEvent(): string
	{
		return $this->event;
	}

	/**
	 * @param string $event
	 *
	 * @return WebhookResource
	 */
	public function setEvent(string $event): WebhookResource
	{
		$this->event = $event;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getType(): string
	{
		return $this->type;
	}

	/**
	 * @param string $type
	 *
	 * @return WebhookResource
	 */
	public function setType(string $type): WebhookResource
	{
		$this->type = $type;
		return $this;
	}
}