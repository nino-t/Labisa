<?php

namespace App\Components;

use Session;

class AlertClass
{

  public function alertJSON($type, $message)
	{
		$alert = [
			'type' => $type,
			'message' => $message
		];

		return $alert;
	}

	public function makeAlert($type, $message)
	{
		$alert = $this->alertJSON($type, $message);
		Session::flash('alert', $alert);
	}
}