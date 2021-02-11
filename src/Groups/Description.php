<?php


namespace ZooplaRealTime\Groups;


use ZooplaRealTime\SynthesizeTrait;

class Description
{
	use SynthesizeTrait;

	protected $arrSynthesize = array(
		'heading' => array('type' => 'string', 'required' => true),
		'text' => array('type' => 'string', 'required' => true),
		'dimension' => array('type' => 'object', 'class' => Dimensions::class, 'required' => false)
	);
}