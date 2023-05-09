<?php

namespace Fatkulnurk\Snaps\Api\TransferCredits\Banks;

use Fatkulnurk\Snaps\Api\Clients\TransferCredits\Banks\VirtualAccounts\Contracts\VirtualAccountInterface;
use Fatkulnurk\Snaps\Api\Clients\TransferCredits\Banks\VirtualAccounts\VirtualAccount;

/**
 * Class Bank
 *
 * @category Class
 * @package  Fatkulnurk\BcaSnapPackages\TransferCredits\Banks
 * @author   Fatkul Nur Koirudin <rudi@dibumi.com>
 **/
class Bank
{
	public function virtualAccount(): VirtualAccountInterface
	{
		return new VirtualAccount();
	}
}