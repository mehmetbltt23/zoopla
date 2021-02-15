<?php

namespace mehmetbulut\Zoopla\Groups;

use mehmetbulut\Zoopla\SynthesizeTrait;

class LeaseExpiry
{
	use SynthesizeTrait;

	protected $arrSynthesize = array(
		'expiry_date' => array('type' => 'date', 'required' => true),
		'years_remaining' => array('type' => 'integer', 'required' => true),
	);
}