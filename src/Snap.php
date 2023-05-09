<?php

namespace Fatkulnurk\Snaps;

use Fatkulnurk\Snaps\Api\Clients\TransferCredits\TransferCredit;
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
	public function transferCredit()
	{
		return new TransferCredit();
	}

	public function webhook()
	{
		return new Webhook();
	}
}