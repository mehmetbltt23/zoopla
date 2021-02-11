<?php

namespace ZooplaRealTime\Groups;

use ZooplaRealTime\SynthesizeTrait;

class ServiceCharge
{
	use SynthesizeTrait;

	protected $arrSynthesize = array(
		'charge' => array('type' => 'number', 'required' => true),
		'per_unit_area_units' => array('type' => 'enum', 'required' => true),
		'frequency' => array('type' => 'enum', 'required' => true),
	);
}