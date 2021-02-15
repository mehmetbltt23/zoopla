<?php


namespace mehmetbulut\Zoopla\Groups;


use mehmetbulut\Zoopla\SynthesizeTrait;
use mehmetbulut\Zoopla\Values\AreaUnit;

class PricePerUnitArea
{
	use SynthesizeTrait;

	protected $arrSynthesize = array(
		'price' => array('type' => 'number', 'required' => true),
		'units' => array('type' => 'enum','class' => AreaUnit::class, 'required' => true)
	);
}