<?php

namespace ZooplaRealTime\Groups;

use ZooplaRealTime\SynthesizeTrait;

class Area
{
	use SynthesizeTrait;

	protected $arrSynthesize = array(
		'value' => array('type' => 'number', 'required' => true),
		'units' => array('type' => 'enum', 'required' => true),
	);
}