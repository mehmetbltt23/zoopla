<?php

namespace mehmetbulut\Zoopla\Groups;

use mehmetbulut\Zoopla\SynthesizeTrait;
use mehmetbulut\Zoopla\Values\CurrencyCode;
use mehmetbulut\Zoopla\Values\PriceQualifier;
use mehmetbulut\Zoopla\Values\PricingRentFrequency;
use mehmetbulut\Zoopla\Values\TransactionType;

class Pricing
{
	use SynthesizeTrait;

	protected $arrSynthesize = array(
		'transaction_type' => array('type' => 'enum','class' => TransactionType::class, 'required' => true),
		'currency_code' => array('type' => 'enum','class' => CurrencyCode::class, 'required' => true),
		'price' => array('type' => 'number', 'required' => true),
		'price_per_unit_area' => array('type' => 'object', 'class' => PricePerUnitArea::class, 'required' => true),
		'rent_frequency' => array('type' => 'enum', 'class' => PricingRentFrequency::class,'required' => true),
		'price_qualifier' => array('type' => 'enum','class' => PriceQualifier::class, 'required' => true),
		'auction' => array('type' => 'boolean', 'required' => true),
	);
}