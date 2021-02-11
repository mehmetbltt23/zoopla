<?php

namespace ZooplaRealTime\Groups;

use ZooplaRealTime\SynthesizeTrait;

class Pricing
{
	use SynthesizeTrait;

	protected $arrSynthesize = array(
		'transaction_type' => array('type' => 'enum', 'required' => true),
		'currency_code' => array('type' => 'enum', 'required' => true),
		'price' => array('type' => 'number', 'required' => true),
		'price_per_unit_area' => array('type' => 'object', 'class' => PricePerUnitArea::class, 'required' => true),
		'rent_frequency' => array('type' => 'enum', 'required' => true),
		'price_qualifier' => array('type' => 'enum', 'required' => true),
		'auction' => array('type' => 'boolean', 'required' => true),
	);
}