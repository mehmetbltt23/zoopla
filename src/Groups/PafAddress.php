<?php


namespace ZooplaRealTime\Groups;


use ZooplaRealTime\SynthesizeTrait;

class PafAddress
{
	use SynthesizeTrait;

	protected $arrSynthesize = array(
		'address_key' => array('type' => 'string', 'required' => true),
		'organisation_key' => array('type' => 'string', 'required' => true),
		'postcode_type' => array('type' => 'enum', 'required' => true)
	);
}