<?php

namespace mehmetbulut\Zoopla\Groups;

use mehmetbulut\Zoopla\SynthesizeTrait;
use mehmetbulut\Zoopla\Values\DimensionUnit;

class Dimensions
{
	use SynthesizeTrait;

	protected $arrSynthesize = array(
		'length' => array('type' => 'number', 'required' => true),
		'width' => array('type' => 'number', 'required' => true),
		'units' => array('type' => 'enum', 'class' => DimensionUnit::class, 'required' => true),
	);
}