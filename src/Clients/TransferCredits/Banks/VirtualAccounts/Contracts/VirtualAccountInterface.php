<?php

namespace Fatkulnurk\Snaps\Api\Clients\TransferCredits\Banks\VirtualAccounts\Contracts;
use Fatkulnurk\Snaps\Resources\VirtualAccounts\CreateVirtualAccount;

/**
 * Interface VirtualAccountInterface
 *
 * @category Interface
 * @author   Fatkul Nur Koirudin <rudi@dibumi.com>
 **/
interface VirtualAccountInterface
{

	public function create(array $payload): CreateVirtualAccount;

	public function inquiryStatus(string $externalId);
	public function delete(string $externalId);
}