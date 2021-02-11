<?php

namespace ZooplaRealTime\Groups;

use ZooplaRealTime\SynthesizeTrait;

class MinMaxArea
{
	use SynthesizeTrait;

	protected $arrSynthesize = array(
		'minimum' => array('type' => 'object', 'class' => Area::class, 'required' => true),
		'maximum' => array('type' => 'object', 'class' => Area::class, 'required' => true),
	);
}