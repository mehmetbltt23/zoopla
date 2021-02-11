<?php

namespace ZooplaRealTime\Groups;

use ZooplaRealTime\SynthesizeTrait;

class Property
{
	use SynthesizeTrait;

	protected $arrSynthesize = array(
		'branch_reference' => array('type' => 'string', 'required' => true),
		'listing_reference' => array('type' => 'string', 'required' => true),
		'category' => array('type' => 'string', 'required' => true),

		'detailed_description' => array('type' => 'object', 'class' => Description::class, 'required' => true),
		'location' => array('type' => 'object', 'class' => Description::class, 'required' => true),
		'pricing' => array('type' => 'object', 'class' => Pricing::class, 'required' => true),
		'areas' => array('type' => 'object', 'class' => Areas::class, 'required' => true),

		'tenant_eligibility' => array('type' => 'object', 'class' => TenantEligibility::class, 'required' => true),
		'rental_term' => array('type' => 'object','class' => MinimumContractLength::class, 'required' => true),
		'service_charge' => array('type' => 'object', 'class' => ServiceCharge::class, 'required' => true),
		'epc_ratings' => array('type' => 'object','class' => EpcRating::class, 'required' => true),
		'google_street_view' => array('type' => 'object','class' => GoogleStreetView::class, 'required' => true),
		'lease_expiry' => array('type' => 'object','class' => LeaseExpiry::class, 'required' => true),
		'content' => array('type' => 'object','class' => Content::class, 'required' => true),

		'available_bedrooms' => array('type' => 'integer', 'required' => true),
		'bathrooms' => array('type' => 'integer', 'required' => true),
		'living_rooms' => array('type' => 'integer', 'required' => true),
		'rateable_value' => array('type' => 'integer', 'required' => true),
		'sap_rating' => array('type' => 'integer', 'required' => true),
		'total_bedrooms' => array('type' => 'integer', 'required' => true),


		'property_type' => array('type' => 'enum', 'required' => true),
		'fishing_rights' => array('type' => 'enum', 'required' => true),
		'listed_building_grade' => array('type' => 'enum', 'required' => true),
		'tenure' => array('type' => 'enum', 'required' => true),


		'administration_fees' => array('type' => 'string', 'required' => true),
		'display_address' => array('type' => 'string', 'required' => true),
		'summary_description' => array('type' => 'string', 'required' => true),

		'annual_business_rates' => array('type' => 'number', 'required' => true),
		'deposit' => array('type' => 'number', 'required' => true),
		'ground_rent' => array('type' => 'number', 'required' => true),


		'available_from_date' => array('type' => 'date', 'required' => true),
		'open_day' => array('type' => 'date', 'required' => true),


		'bills_included' => array('type' => 'array', 'required' => true),
		'buyer_incentives' => array('type' => 'array', 'required' => true),
		'central_heating' => array('type' => 'array', 'required' => true),
		'commercial_use_classes' => array('type' => 'array', 'required' => true),
		'council_tax_band' => array('type' => 'array', 'required' => true),
		'decorative_condition' => array('type' => 'array', 'required' => true),
		'feature_list' => array('type' => 'array', 'required' => true),
		'floor_levels' => array('type' => 'array', 'required' => true),
		'furnished_state' => array('type' => 'array', 'required' => true),
		'outside_space' => array('type' => 'array', 'required' => true),
		'parking' => array('type' => 'array', 'required' => true),


		'accessibility' => array('type' => 'boolean', 'required' => true),
		'shared_accommodation' => array('type' => 'boolean', 'required' => true),
		'basement' => array('type' => 'boolean', 'required' => true),
		'burglar_alarm' => array('type' => 'boolean', 'required' => true),
		'business_for_sale' => array('type' => 'boolean', 'required' => true),
		'chain_free' => array('type' => 'boolean', 'required' => true),
		'conservatory' => array('type' => 'boolean', 'required' => true),
		'double_glazing' => array('type' => 'boolean', 'required' => true),
		'fireplace' => array('type' => 'boolean', 'required' => true),
		'gym' => array('type' => 'boolean', 'required' => true),
		'loft' => array('type' => 'boolean', 'required' => true),
		'new_home' => array('type' => 'boolean', 'required' => true),
		'outbuildings' => array('type' => 'boolean', 'required' => true),
		'pets_allowed' => array('type' => 'boolean', 'required' => true),
		'porter_security' => array('type' => 'boolean', 'required' => true),
		'repossession' => array('type' => 'boolean', 'required' => true),
		'retirement' => array('type' => 'boolean', 'required' => true),
		'serviced' => array('type' => 'boolean', 'required' => true),
		'swimming_pool' => array('type' => 'boolean', 'required' => true),
		'tenanted' => array('type' => 'boolean', 'required' => true),
		'tennis_court' => array('type' => 'boolean', 'required' => true),
		'utility_room' => array('type' => 'boolean', 'required' => true),
		'waterfront' => array('type' => 'boolean', 'required' => true),
		'wood_floors' => array('type' => 'boolean', 'required' => true),
	);
}