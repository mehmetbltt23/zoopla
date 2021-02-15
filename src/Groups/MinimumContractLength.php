<?php

namespace mehmetbulut\Zoopla\Groups;

use mehmetbulut\Zoopla\SynthesizeTrait;
use mehmetbulut\Zoopla\Values\AreaUnit;

class MinimumContractLength
{
	use SynthesizeTrait;

	protected $arrSynthesize = array(
		'minimum_length' => array('type' => 'number', 'required' => true),
		'units' => array('type' => 'enum','class' => AreaUnit::class, 'required' => true),
	);
}