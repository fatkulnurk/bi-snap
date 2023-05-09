<?php

namespace Fatkulnurk\Snaps\Api\Clients\TransferCredits;

use Fatkulnurk\Snaps\Api\TransferCredits\Banks\Bank;

/**
 * Class TransferCredit
 *
 * @category Class
 * @author   Fatkul Nur Koirudin <rudi@dibumi.com>
 **/
class TransferCredit
{
	public function bank()
	{
		return new Bank();
	}

	public function nonBank()
	{

	}
}