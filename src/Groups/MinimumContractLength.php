<?php

namespace ZooplaRealTime\Groups;

use ZooplaRealTime\SynthesizeTrait;

class MinimumContractLength
{
	use SynthesizeTrait;

	protected $arrSynthesize = array(
		'minimum_length' => array('type' => 'number', 'required' => true),
		'units' => array('type' => 'enum', 'required' => true),
	);
}