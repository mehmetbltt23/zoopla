<?php

namespace mehmetbulut\Zoopla\Groups;

use mehmetbulut\Zoopla\SynthesizeTrait;
use mehmetbulut\Zoopla\Values\AreaUnit;

class Dimensions
{
	use SynthesizeTrait;

	protected $arrSynthesize = array(
		'length' => array('type' => 'number', 'required' => true),
		'width' => array('type' => 'number', 'required' => true),
		'units' => array('type' => 'enum','class' => AreaUnit::class, 'required' => true),
	);
}