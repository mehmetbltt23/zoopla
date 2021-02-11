<?php

namespace ZooplaRealTime\Groups;

use ZooplaRealTime\SynthesizeTrait;

class Content
{
	use SynthesizeTrait;

	protected $arrSynthesize = array(
		'url' => array('type' => 'string', 'required' => true),
		'type' => array('type' => 'enum', 'required' => true),
		'caption' => array('type' => 'string', 'required' => true),
	);
}