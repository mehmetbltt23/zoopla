<?php

namespace mehmetbulut\Zoopla\Groups;

use mehmetbulut\Zoopla\SynthesizeTrait;

class Location
{
	use SynthesizeTrait;

	protected $arrSynthesize = array(
		'property_number_or_name' => array('type' => 'string', 'required' => true),
		'street_name' => array('type' => 'string', 'required' => true),
		'locality' => array('type' => 'string', 'required' => true),
		'town_or_city' => array('type' => 'string', 'required' => true),
		'county' => array('type' => 'string', 'required' => true),
		'postal_code' => array('type' => 'string', 'required' => true),
		'country_code' => array('type' => 'string', 'required' => true),
		'coordinates' => array('type' => 'object', 'class' => Coordinate::class, 'required' => true),
		'paf_address' => array('type' => 'object', 'class' => Dimensions::class, 'required' => true),
		'paf_udprn' => array('type' => 'string', 'required' => true),
	);
}