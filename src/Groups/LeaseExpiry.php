<?php

namespace ZooplaRealTime\Groups;

use ZooplaRealTime\SynthesizeTrait;

class LeaseExpiry
{
	use SynthesizeTrait;

	protected $arrSynthesize = array(
		'expiry_date' => array('type' => 'date', 'required' => true),
		'years_remaining' => array('type' => 'integer', 'required' => true),
	);
}