<?php

namespace Fatkulnurk\Snaps\Clients\TransferCredits\Banks\VirtualAccounts;

use Carbon\CarbonImmutable;
use Fatkulnurk\Snaps\Clients\TransferCredits\Banks\VirtualAccounts\Contracts\VirtualAccountInterface;
use Fatkulnurk\Snaps\Config\Config;
use Fatkulnurk\Snaps\Resources\VirtualAccounts\CreateVirtualAccount;
use Fatkulnurk\Snaps\Resources\VirtualAccounts\DeleteVirtualAccount;
use Fatkulnurk\Snaps\Resources\VirtualAccounts\InquiryStatusVirtualAccount;
use Fatkulnurk\Snaps\Traits\HttpClient;
use Illuminate\Support\Facades\Validator;

/**
 * Class VirtualAccounts
 *
 * @category Class
 * @author   Fatkul Nur Koirudin <rudi@dibumi.com>
 **/
class VirtualAccount implements VirtualAccountInterface
{
	use HttpClient;

	/**
	 * @param array $payload
	 *
	 * @return CreateVirtualAccount
	 * @throws \Exception
	 */
	public function create(array $payload): CreateVirtualAccount
	{
		$validator = Validator::make($payload, [
			'app_id' => ['required', 'string'],
//			'partner_service_id' => ['required', 'string'],
			'external_id' => ['required', 'string'],
			'customer_no' => ['required', 'string'],
			'va_number' => ['required', 'string'],
			'va_name' => ['required', 'string'],
			'va_email' => ['nullable', 'string'],
			'va_phone_number' => ['nullable', 'string'],
			'amount' => ['required', 'numeric', 'min:1'],
			'payment_details.*' => ['nullable'],
			'expired_at' => ['required', 'date'],
		]);

		if ($validator->fails()) {
			throw new \Exception($validator);
		}

		$url = Config::getInstance()->getHost() . '/api/transaction';
		$response = $this->getHttpClient()->post($url, $payload);

		return (new CreateVirtualAccount())
			->setExternalId($payload['external_id'])
			->setIsSuccess($response->ok())
			->setMessage(($response->json()['message'] ?? $response->reason()))
			->setData($response->json()['data'] ?? []);
	}

	/**
	 * @param string $externalId
	 *
	 * @return InquiryStatusVirtualAccount
	 */
	public function inquiryStatus(string $externalId): InquiryStatusVirtualAccount
	{
		$url = Config::getInstance()->getHost() . '/api/transaction-status/' . $externalId;
		$response = $this->getHttpClient()->get($url);

		$isSuccess = $response->ok();
		$data = $response->json()['data'] ?? [];
		$status = 'PENDING';
		if ($isSuccess) {
			if (filled($data['paid_at'] ?? null)) {
				$status = 'SUCCESS';
			} else {
				if (CarbonImmutable::parse($data['expired_at'])->lte(CarbonImmutable::now())) {
					$status = 'EXPIRED';
				} else {
					$status = 'PENDING';
				}
			}
		}

		return (new InquiryStatusVirtualAccount())
			->setExternalId($externalId)
			->setIsSuccess($isSuccess)
			->setMessage(($response->json()['message'] ?? $response->reason()))
			->setData([
				'payment_status' => $status,
				'data' => $data
			]);
	}

	/**
	 * @param string $externalId
	 *
	 * @return DeleteVirtualAccount
	 */
	public function delete(string $externalId): DeleteVirtualAccount
	{
		$url = Config::getInstance()->getHost() . '/api/delete-va/' . $externalId;
		$response = $this->getHttpClient()->get($url);

		return (new DeleteVirtualAccount())
			->setExternalId($externalId)
			->setIsSuccess($response->ok())
			->setMessage(($response->json()['message'] ?? $response->reason()))
			->setData($response->json()['data'] ?? []);
	}
}