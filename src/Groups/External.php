<?php

namespace ZooplaRealTime\Groups;

use ZooplaRealTime\SynthesizeTrait;

class External
{
	use SynthesizeTrait;

	protected $arrSynthesize = array(
		'minimum' => array('type' => 'number', 'required' => true),
		'maximum' => array('type' => 'number', 'required' => true)
	);
}