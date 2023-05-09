<?php

namespace Fatkulnurk\Snaps\Clients\TransferCredits;

use Fatkulnurk\Snaps\Clients\TransferCredits\Banks\Bank;

/**
 * Class TransferCredit
 *
 * @category Class
 * @author   Fatkul Nur Koirudin <rudi@dibumi.com>
 **/
class TransferCredit
{
	/**
	 * @return Bank
	 */
	public function bank(): Bank
	{
		return new Bank();
	}

	public function nonBank()
	{

	}
}