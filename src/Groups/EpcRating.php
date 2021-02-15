<?php

namespace mehmetbulut\Zoopla\Groups;

use mehmetbulut\Zoopla\SynthesizeTrait;

class EpcRating
{
	use SynthesizeTrait;

	protected $arrSynthesize = array(
		'eer_current_rating' => array('type' => 'integer', 'required' => true),
		'eer_potential_rating' => array('type' => 'integer', 'required' => true),
		'eir_current_rating' => array('type' => 'integer', 'required' => true),
		'eir_potential_rating' => array('type' => 'integer', 'required' => true),
	);
}