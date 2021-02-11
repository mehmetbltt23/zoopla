<?php

namespace ZooplaRealTime\Groups;

use ZooplaRealTime\SynthesizeTrait;

class TenantEligibility
{
	use SynthesizeTrait;

	protected $arrSynthesize = array(
		'dss' => array('type' => 'enum', 'required' => true),
		'students' => array('type' => 'enum', 'required' => true),
	);
}