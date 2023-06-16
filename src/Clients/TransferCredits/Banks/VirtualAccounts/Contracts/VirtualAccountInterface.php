<?php

namespace Fatkulnurk\Snaps\Clients\TransferCredits\Banks\VirtualAccounts\Contracts;
use Fatkulnurk\Snaps\Resources\VirtualAccounts\CreateVirtualAccount;

/**
 * Interface VirtualAccountInterface
 *
 * @category Interface
 * @author   Fatkul Nur Koirudin <rudi@dibumi.com>
 **/
interface VirtualAccountInterface
{
	/**
	 * @param array $payload
	 *
	 * @return CreateVirtualAccount
	 */
	public function create(array $payload): CreateVirtualAccount;

	/**
	 * @param string $externalId
	 *
	 * @return mixed
	 */
	public function inquiryStatus(string $externalId);

	/**
	 * @param string $externalId
	 *
	 * @return mixed
	 */
	public function delete(string $externalId);
}