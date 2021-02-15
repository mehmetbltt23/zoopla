<?php

namespace mehmetbulut\Zoopla\Groups;

use mehmetbulut\Zoopla\SynthesizeTrait;
use mehmetbulut\Zoopla\Values\PricePerUnitAreaUnit;
use mehmetbulut\Zoopla\Values\ServiceChargeFrequency;

class ServiceCharge
{
	use SynthesizeTrait;

	protected $arrSynthesize = array(
		'charge' => array('type' => 'number', 'required' => true),
		'per_unit_area_units' => array('type' => 'enum', 'class' => PricePerUnitAreaUnit::class,'required' => true),
		'frequency' => array('type' => 'enum','class' => ServiceChargeFrequency::class, 'required' => true),
	);
}