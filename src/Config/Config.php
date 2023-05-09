<?php

namespace Fatkulnurk\Snaps\Config;

/**
 * Class Config
 *
 * @category Class
 * @package  Fatkulnurk\Snaps\Config
 * @author   Fatkul Nur Koirudin <rudi@dibumi.com>
 **/
class Config
{
	/**
	 * @var null
	 */
	private static ?self $instance = null;
	/**
	 * @var string
	 */
	private string $host = '';
	private string $apiKey = '';
	private string $secretKey = '';
	private string $clientCredential= 'client_credentials';
	private string $scope = '';
	private string $appId = '';
	private string $partnerServiceId = '';

	private string $corporateCode = '';

	// 1 = personal, 2 = bisnis
	private int $privateAppCode = 1;

	/**
	 *
	 */
	private function __construct()
	{
	}

	/**
	 * @return Config|null
	 */
	public static function getInstance()
	{
		if (self::$instance == null)
		{
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * @return string
	 */
	public function getHost(): string
	{
		return $this->host;
	}

	/**
	 * @param string $host
	 *
	 * @return Config
	 */
	public function setHost(string $host): Config
	{
		$this->host = $host;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getApiKey(): string
	{
		return $this->apiKey;
	}

	/**
	 * @param string $apiKey
	 *
	 * @return Config
	 */
	public function setApiKey(string $apiKey): Config
	{
		$this->apiKey = $apiKey;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getSecretKey(): string
	{
		return $this->secretKey;
	}

	/**
	 * @param string $secretKey
	 *
	 * @return Config
	 */
	public function setSecretKey(string $secretKey): Config
	{
		$this->secretKey = $secretKey;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getAppId(): string
	{
		return $this->appId;
	}

	/**
	 * @param string $appId
	 *
	 * @return Config
	 */
	public function setAppId(string $appId): Config
	{
		$this->appId = $appId;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getPartnerServiceId(): string
	{
		return $this->partnerServiceId;
	}

	/**
	 * @param string $partnerServiceId
	 *
	 * @return Config
	 */
	public function setPartnerServiceId(string $partnerServiceId): Config
	{
		$this->partnerServiceId = $partnerServiceId;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getClientCredential(): string
	{
		return $this->clientCredential;
	}

	/**
	 * @param string $clientCredential
	 *
	 * @return Config
	 */
	public function setClientCredential(string $clientCredential): Config
	{
		$this->clientCredential = $clientCredential;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getScope(): string
	{
		return $this->scope;
	}

	/**
	 * @param string $scope
	 *
	 * @return Config
	 */
	public function setScope(string $scope): Config
	{
		$this->scope = $scope;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getPrivateAppCode(): int
	{
		return $this->privateAppCode;
	}

	/**
	 * @param int $privateAppCode
	 *
	 * @return Config
	 */
	public function setPrivateAppCode(int $privateAppCode): Config
	{
		$this->privateAppCode = $privateAppCode;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getCorporateCode(): string
	{
		return $this->corporateCode;
	}

	/**
	 * @param string $corporateCode
	 *
	 * @return Config
	 */
	public function setCorporateCode(string $corporateCode): Config
	{
		$this->corporateCode = $corporateCode;
		return $this;
	}
}