<?php


namespace ZooplaRealTime\Groups;


use ZooplaRealTime\SynthesizeTrait;

class Coordinate
{
	use SynthesizeTrait;

	protected $arrSynthesize = array(
		'latitude' => array('type' => 'float', 'required' => true),
		'longitude' => array('type' => 'float', 'required' => true)
	);
}