<?php


namespace mehmetbulut\Zoopla\Groups;


use mehmetbulut\Zoopla\SynthesizeTrait;

class Coordinate
{
	use SynthesizeTrait;

	protected $arrSynthesize = array(
		'latitude' => array('type' => 'float', 'required' => true),
		'longitude' => array('type' => 'float', 'required' => true)
	);
}