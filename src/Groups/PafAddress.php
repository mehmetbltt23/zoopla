<?php


namespace mehmetbulut\Zoopla\Groups;


use mehmetbulut\Zoopla\SynthesizeTrait;

class PafAddress
{
	use SynthesizeTrait;

	protected $arrSynthesize = array(
		'address_key' => array('type' => 'string', 'required' => true),
		'organisation_key' => array('type' => 'string', 'required' => true),
		'postcode_type' => array('type' => 'enum', 'required' => true)
	);
}