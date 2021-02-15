<?php

namespace mehmetbulut\Zoopla\Groups;

use mehmetbulut\Zoopla\SynthesizeTrait;

class GoogleStreetView
{
	use SynthesizeTrait;

	protected $arrSynthesize = array(
		'coordinates' => array('type' => 'object','class' => Coordinate::class, 'required' => true),
		'heading' => array('type' => 'float', 'required' => true),
		'pitch' => array('type' => 'float', 'required' => true),
	);
}