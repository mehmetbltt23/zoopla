<?php


namespace ZooplaRealTime\Groups;


use ZooplaRealTime\SynthesizeTrait;

class PricePerUnitArea
{
	use SynthesizeTrait;

	protected $arrSynthesize = array(
		'price' => array('type' => 'number', 'required' => true),
		'units' => array('type' => 'enum', 'required' => true)
	);
}