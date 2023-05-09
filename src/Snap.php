<?php

namespace Fatkulnurk\Snaps;

use Fatkulnurk\Snaps\Clients\TransferCredits\TransferCredit;
use Fatkulnurk\Snaps\Servers\Webhooks\Webhook;

/**
 * Class BcaSnap
 *
 * @category Class
 * @author   Fatkul Nur Koirudin <rudi@dibumi.com>
 * @package  Fatkulnurk\BcaSnapPackages
 **/
class Snap
{
	/**
	 * @return TransferCredit
	 */
	public function transferCredit(): TransferCredit
	{
		return new TransferCredit();
	}

	/**
	 * @return Webhook
	 */
	public function webhook(): Webhook
	{
		return new Webhook();
	}
}