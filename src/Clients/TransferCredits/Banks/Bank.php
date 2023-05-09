<?php

namespace Fatkulnurk\Snaps\TransferCredits\Banks;

use Fatkulnurk\Snaps\Clients\TransferCredits\Banks\VirtualAccounts\Contracts\VirtualAccountInterface;
use Fatkulnurk\Snaps\Clients\TransferCredits\Banks\VirtualAccounts\VirtualAccount;

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