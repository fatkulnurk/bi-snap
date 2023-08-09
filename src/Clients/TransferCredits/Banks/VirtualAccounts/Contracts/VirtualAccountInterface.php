<?php

namespace Fatkulnurk\Snaps\Clients\TransferCredits\Banks\VirtualAccounts\Contracts;

use Fatkulnurk\Snaps\Resources\VirtualAccounts\CreateVirtualAccount;
use Fatkulnurk\Snaps\Resources\VirtualAccounts\DeleteVirtualAccount;
use Fatkulnurk\Snaps\Resources\VirtualAccounts\InquiryStatusVirtualAccount;

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
	 * @return InquiryStatusVirtualAccount
	 */
	public function inquiryStatus(string $externalId): InquiryStatusVirtualAccount;

	/**
	 * @param string $externalId
	 *
	 * @return DeleteVirtualAccount
	 */
	public function delete(string $externalId): DeleteVirtualAccount;
}