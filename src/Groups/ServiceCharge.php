<?php

namespace mehmetbulut\Zoopla\Groups;

use mehmetbulut\Zoopla\SynthesizeTrait;
use mehmetbulut\Zoopla\Values\AreaUnit;
use mehmetbulut\Zoopla\Values\Frequency;

class ServiceCharge
{
	use SynthesizeTrait;

	protected $arrSynthesize = array(
		'charge' => array('type' => 'number', 'required' => true),
		'per_unit_area_units' => array('type' => 'enum', 'class' => AreaUnit::class,'required' => true),
		'frequency' => array('type' => 'enum','class' => Frequency::class, 'required' => true),
	);
}