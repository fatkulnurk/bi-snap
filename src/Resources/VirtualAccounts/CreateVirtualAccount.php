<?php

namespace Fatkulnurk\Snaps\Resources\VirtualAccounts;

/**
 * Class CreateVirtualAccount
 *
 * @category Class
 * @package  Fatkulnurk\Snaps\Resources\VirtualAccounts
 * @author   Fatkul Nur Koirudin <rudi@dibumi.com>
 **/
class CreateVirtualAccount
{
	public string $externalId;
	public bool $isSuccess;

	/**
	 * @var string
	 */
	public string $message = '';
	public array $data = [];

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
	 * @return CreateVirtualAccount
	 */
	public function setExternalId(string $externalId): CreateVirtualAccount
	{
		$this->externalId = $externalId;

		return $this;
	}

	/**
	 * @return bool
	 */
	public function isSuccess(): bool
	{
		return $this->isSuccess;
	}

	/**
	 * @param bool $isSuccess
	 *
	 * @return CreateVirtualAccount
	 */
	public function setIsSuccess(bool $isSuccess): CreateVirtualAccount
	{
		$this->isSuccess = $isSuccess;

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
	 * @return CreateVirtualAccount
	 */
	public function setData(array $data): CreateVirtualAccount
	{
		$this->data = $data;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getMessage(): string
	{
		return $this->message;
	}

	/**
	 * @param string $message
	 *
	 * @return CreateVirtualAccount
	 */
	public function setMessage(string $message): CreateVirtualAccount
	{
		$this->message = $message;
		return $this;
	}

}