<?php

namespace mehmetbulut\Zoopla\Groups;

use mehmetbulut\Zoopla\SynthesizeTrait;
use mehmetbulut\Zoopla\Values\TenantEligibilityDss;
use mehmetbulut\Zoopla\Values\TenantEligibilityStudent;

class TenantEligibility
{
	use SynthesizeTrait;

	protected $arrSynthesize = array(
		'dss' => array('type' => 'enum','class' => TenantEligibilityDss::class, 'required' => true),
		'students' => array('type' => 'enum','class' => TenantEligibilityStudent::class, 'required' => true),
	);
}