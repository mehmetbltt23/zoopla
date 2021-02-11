<?php

namespace ZooplaRealTime\Groups;

use ZooplaRealTime\SynthesizeTrait;

class Dimensions
{
	use SynthesizeTrait;

	protected $arrSynthesize = array(
		'length' => array('type' => 'number', 'required' => true),
		'width' => array('type' => 'number', 'required' => true),
		'units' => array('type' => 'enum', 'required' => true),
	);
}