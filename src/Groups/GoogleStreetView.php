<?php

namespace ZooplaRealTime\Groups;

use ZooplaRealTime\SynthesizeTrait;

class GoogleStreetView
{
	use SynthesizeTrait;

	protected $arrSynthesize = array(
		'coordinates' => array('type' => 'object','class' => Coordinate::class, 'required' => true),
		'heading' => array('type' => 'number', 'required' => true),
		'pitch' => array('type' => 'number', 'required' => true),
	);
}