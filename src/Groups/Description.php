<?php

namespace mehmetbulut\Zoopla\Groups;

use mehmetbulut\Zoopla\SynthesizeTrait;

class Description
{
	use SynthesizeTrait;

	protected $arrSynthesize = array(
		'heading' => array('type' => 'string', 'required' => true),
		'text' => array('type' => 'string', 'required' => true),
		'dimensions' => array('type' => 'objectString', 'class' => Dimensions::class, 'required' => false)
	);

	public function __construct(string $heading, string $text, string $dimension_str = null, $length = null, $width = null, $units = null)
	{
		$this->heading = $heading;
		$this->text = $text;
		if (!empty($dimension_str)) {
			$this->dimensions = $dimension_str;
		} else if(!empty($length) || !empty($width) || !empty($units)) {
			if(!empty($length)) {
				$this->dimensions->length = $length;
			}
			if(!empty($width)) {
				$this->dimensions->width = $width;
			}

			if(!empty($units)) {
				$this->dimensions->units = $units;
			}
		}

	}
}