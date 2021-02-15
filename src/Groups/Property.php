<?php

namespace mehmetbulut\Zoopla\Groups;

use mehmetbulut\Zoopla\SynthesizeTrait;
use mehmetbulut\Zoopla\Values\BillsIncluded;
use mehmetbulut\Zoopla\Values\BuyerIncentives;
use mehmetbulut\Zoopla\Values\CentralHeating;
use mehmetbulut\Zoopla\Values\CommercialUseClass;
use mehmetbulut\Zoopla\Values\CouncilTaxBand;
use mehmetbulut\Zoopla\Values\DecorativeCondition;
use mehmetbulut\Zoopla\Values\FloorLevels;
use mehmetbulut\Zoopla\Values\FurnishedState;
use mehmetbulut\Zoopla\Values\ListedBuildingGrade;
use mehmetbulut\Zoopla\Values\OutSideSpace;
use mehmetbulut\Zoopla\Values\Parking;
use mehmetbulut\Zoopla\Values\PropertyType;
use mehmetbulut\Zoopla\Values\Tenure;

class Property
{
	use SynthesizeTrait;

	protected $arrSynthesize = array(
		'branch_reference' => array('type' => 'string', 'required' => true),
		'listing_reference' => array('type' => 'string', 'required' => true),
		'category' => array('type' => 'string', 'required' => true),

		'detailed_description' => array('type' => 'object', 'class' => Description::class, 'required' => false),
		'location' => array('type' => 'object', 'class' => Location::class, 'required' => true),
		'pricing' => array('type' => 'object', 'class' => Pricing::class, 'required' => true),
		'areas' => array('type' => 'object', 'class' => Areas::class, 'required' => true),

		'tenant_eligibility' => array('type' => 'object', 'class' => TenantEligibility::class, 'required' => false),
		'rental_term' => array('type' => 'object', 'class' => MinimumContractLength::class, 'required' => false),
		'service_charge' => array('type' => 'object', 'class' => ServiceCharge::class, 'required' => false),
		'epc_ratings' => array('type' => 'object', 'class' => EpcRating::class, 'required' => false),
		'google_street_view' => array('type' => 'object', 'class' => GoogleStreetView::class, 'required' => false),
		'lease_expiry' => array('type' => 'object', 'class' => LeaseExpiry::class, 'required' => false),

		'available_bedrooms' => array('type' => 'integer', 'required' => true),
		'bathrooms' => array('type' => 'integer', 'required' => true),
		'living_rooms' => array('type' => 'integer', 'required' => true),
		'rateable_value' => array('type' => 'integer', 'required' => false),
		'sap_rating' => array('type' => 'integer', 'required' => false),
		'total_bedrooms' => array('type' => 'integer', 'required' => false),


		'property_type' => array('type' => 'enum', 'class' => PropertyType::class, 'required' => true),
		'listed_building_grade' => array('type' => 'enum', 'class' => ListedBuildingGrade::class, 'required' => false),
		'tenure' => array('type' => 'enum', 'class' => Tenure::class, 'required' => true),


		'administration_fees' => array('type' => 'string', 'required' => false),
		'display_address' => array('type' => 'string', 'required' => false),
		'summary_description' => array('type' => 'string', 'max' => 255, 'required' => false),

		'annual_business_rates' => array('type' => 'number', 'required' => false),
		'deposit' => array('type' => 'number', 'required' => false),
		'ground_rent' => array('type' => 'number', 'required' => false),

		'available_from_date' => array('type' => 'date', 'required' => true),
		'open_day' => array('type' => 'date', 'required' => false),

		'bills_included' => array('type' => 'objectArray', 'class' => BillsIncluded::class, 'required' => false),
		'buyer_incentives' => array('type' => 'objectArray', 'class' => BuyerIncentives::class, 'required' => false),
		'central_heating' => array('type' => 'objectArray', 'class' => CentralHeating::class, 'required' => false),
		'commercial_use_classes' => array('type' => 'objectArray', 'class' => CommercialUseClass::class, 'required' => false),
		'council_tax_band' => array('type' => 'objectArray', 'class' => CouncilTaxBand::class, 'required' => false),
		'decorative_condition' => array('type' => 'objectArray', 'class' => DecorativeCondition::class, 'required' => false),
		'floor_levels' => array('type' => 'objectArray', 'class' => FloorLevels::class, 'required' => false),
		'furnished_state' => array('type' => 'objectArray', 'class' => FurnishedState::class, 'required' => false),
		'outside_space' => array('type' => 'objectArray', 'class' => OutSideSpace::class, 'required' => false),
		'parking' => array('type' => 'objectArray', 'class' => Parking::class, 'required' => false),

		'content' => array('type' => 'array', 'class' => Content::class, 'required' => false),

		'feature_list' => array('type' => 'array', 'required' => false),

		'fishing_rights' => array('type' => 'boolean', 'required' => false),
		'accessibility' => array('type' => 'boolean', 'required' => false),
		'shared_accommodation' => array('type' => 'boolean', 'required' => false),
		'basement' => array('type' => 'boolean', 'required' => false),
		'burglar_alarm' => array('type' => 'boolean', 'required' => false),
		'business_for_sale' => array('type' => 'boolean', 'required' => false),
		'chain_free' => array('type' => 'boolean', 'required' => false),
		'conservatory' => array('type' => 'boolean', 'required' => false),
		'double_glazing' => array('type' => 'boolean', 'required' => false),
		'fireplace' => array('type' => 'boolean', 'required' => false),
		'gym' => array('type' => 'boolean', 'required' => false),
		'loft' => array('type' => 'boolean', 'required' => false),
		'new_home' => array('type' => 'boolean', 'required' => false),
		'outbuildings' => array('type' => 'boolean', 'required' => false),
		'pets_allowed' => array('type' => 'boolean', 'required' => false),
		'porter_security' => array('type' => 'boolean', 'required' => false),
		'repossession' => array('type' => 'boolean', 'required' => false),
		'retirement' => array('type' => 'boolean', 'required' => false),
		'serviced' => array('type' => 'boolean', 'required' => false),
		'swimming_pool' => array('type' => 'boolean', 'required' => false),
		'tenanted' => array('type' => 'boolean', 'required' => false),
		'tennis_court' => array('type' => 'boolean', 'required' => false),
		'utility_room' => array('type' => 'boolean', 'required' => false),
		'waterfront' => array('type' => 'boolean', 'required' => false),
		'wood_floors' => array('type' => 'boolean', 'required' => false),
	);
}