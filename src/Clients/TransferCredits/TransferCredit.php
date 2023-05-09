<?php

namespace Fatkulnurk\Snaps\Clients\TransferCredits;

use Fatkulnurk\Snaps\TransferCredits\Banks\Bank;

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