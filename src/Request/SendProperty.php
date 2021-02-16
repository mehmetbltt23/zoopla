<?php

namespace mehmetbulut\Zoopla\Request;

use mehmetbulut\Zoopla\Groups\Areas;
use mehmetbulut\Zoopla\Groups\Content;
use mehmetbulut\Zoopla\Groups\EpcRating;
use mehmetbulut\Zoopla\Groups\GoogleStreetView;
use mehmetbulut\Zoopla\Groups\LeaseExpiry;
use mehmetbulut\Zoopla\Groups\Location;
use mehmetbulut\Zoopla\Groups\MinimumContractLength;
use mehmetbulut\Zoopla\Groups\Pricing;
use mehmetbulut\Zoopla\Groups\ServiceCharge;
use mehmetbulut\Zoopla\Groups\TenantEligibility;
use mehmetbulut\Zoopla\Values\BillsIncluded;
use mehmetbulut\Zoopla\Values\BuyerIncentives;
use mehmetbulut\Zoopla\Values\Category;
use mehmetbulut\Zoopla\Values\CentralHeating;
use mehmetbulut\Zoopla\Values\CommercialUseClass;
use mehmetbulut\Zoopla\Values\CouncilTaxBand;
use mehmetbulut\Zoopla\Values\DecorativeCondition;
use mehmetbulut\Zoopla\Values\FloorLevels;
use mehmetbulut\Zoopla\Values\FurnishedState;
use mehmetbulut\Zoopla\Values\LifeCycleStatus;
use mehmetbulut\Zoopla\Values\ListedBuildingGrade;
use mehmetbulut\Zoopla\Values\OutSideSpace;
use mehmetbulut\Zoopla\Values\Parking;
use mehmetbulut\Zoopla\Values\PropertyType;
use mehmetbulut\Zoopla\Values\Tenure;

class SendProperty extends RequestBase
{
	protected $path = '/listing/update';

	protected $schema = 'https://realtime-listings.webservices.zpg.co.uk/docs/v1.2/schemas/listing/update.json';

	protected $schemaJsonFileName = 'send-property.json';

	protected $arrSynthesize = array(
		'branch_reference' => array('type' => 'string', ),
		'listing_reference' => array('type' => 'string', ),

		'detailed_description' => array('type' => 'array', ),
		'location' => array('type' => 'object', 'class' => Location::class, ),
		'pricing' => array('type' => 'object', 'class' => Pricing::class, ),
		'areas' => array('type' => 'object', 'class' => Areas::class, ),

		'tenant_eligibility' => array('type' => 'object', 'class' => TenantEligibility::class, ),
		'rental_term' => array('type' => 'objectString', 'class' => MinimumContractLength::class, ),
		'service_charge' => array('type' => 'object', 'class' => ServiceCharge::class, ),
		'epc_ratings' => array('type' => 'object', 'class' => EpcRating::class, ),
		'google_street_view' => array('type' => 'object', 'class' => GoogleStreetView::class, ),
		'lease_expiry' => array('type' => 'object', 'class' => LeaseExpiry::class, ),

		'available_bedrooms' => array('type' => 'integer', ),
		'bathrooms' => array('type' => 'integer', ),
		'living_rooms' => array('type' => 'integer', ),
		'rateable_value' => array('type' => 'integer', ),
		'sap_rating' => array('type' => 'integer', ),
		'total_bedrooms' => array('type' => 'integer', ),


		'property_type' => array('type' => 'enum', 'class' => PropertyType::class, ),
		'listed_building_grade' => array('type' => 'enum', 'class' => ListedBuildingGrade::class, ),
		'tenure' => array('type' => 'enum', 'class' => Tenure::class, ),
		'central_heating' => array('type' => 'enum', 'class' => CentralHeating::class, ),
		'decorative_condition' => array('type' => 'enum', 'class' => DecorativeCondition::class, ),
		'category' => array('type' => 'enum', 'class' => Category::class, ),
		'furnished_state' => array('type' => 'enum', 'class' => FurnishedState::class, ),
		'council_tax_band' => array('type' => 'enum', 'class' => CouncilTaxBand::class, ),
		'life_cycle_status' => array('type' => 'enum', 'class' => LifeCycleStatus::class, ),

		'administration_fees' => array('type' => 'string', ),
		'display_address' => array('type' => 'string', ),
		'summary_description' => array('type' => 'string', 'max' => 255, ),

		'annual_business_rates' => array('type' => 'number', ),
		'deposit' => array('type' => 'number', ),
		'ground_rent' => array('type' => 'number', ),

		'available_from_date' => array('type' => 'date', ),
		'open_day' => array('type' => 'date', ),

		'bills_included' => array('type' => 'objectArray', 'class' => BillsIncluded::class, ),
		'buyer_incentives' => array('type' => 'objectArray', 'class' => BuyerIncentives::class, ),
		'commercial_use_classes' => array(
			'type' => 'objectArray',
			'class' => CommercialUseClass::class,

		),
		'floor_levels' => array('type' => 'array', 'class' => FloorLevels::class, ),
		'outside_space' => array('type' => 'objectArray', 'class' => OutSideSpace::class, ),
		'parking' => array('type' => 'objectArray', 'class' => Parking::class, ),

		'content' => array('type' => 'array', 'class' => Content::class, ),

		'feature_list' => array('type' => 'array', ),

		'fishing_rights' => array('type' => 'boolean', ),
		'accessibility' => array('type' => 'boolean', ),
		'shared_accommodation' => array('type' => 'boolean', ),
		'basement' => array('type' => 'boolean', ),
		'burglar_alarm' => array('type' => 'boolean', ),
		'business_for_sale' => array('type' => 'boolean', ),
		'chain_free' => array('type' => 'boolean', ),
		'conservatory' => array('type' => 'boolean', ),
		'double_glazing' => array('type' => 'boolean', ),
		'fireplace' => array('type' => 'boolean', ),
		'gym' => array('type' => 'boolean', ),
		'loft' => array('type' => 'boolean', ),
		'new_home' => array('type' => 'boolean', ),
		'outbuildings' => array('type' => 'boolean', ),
		'pets_allowed' => array('type' => 'boolean', ),
		'porter_security' => array('type' => 'boolean', ),
		'repossession' => array('type' => 'boolean', ),
		'retirement' => array('type' => 'boolean', ),
		'serviced' => array('type' => 'boolean', ),
		'swimming_pool' => array('type' => 'boolean', ),
		'tenanted' => array('type' => 'boolean', ),
		'tennis_court' => array('type' => 'boolean', ),
		'utility_room' => array('type' => 'boolean', ),
		'waterfront' => array('type' => 'boolean', ),
		'wood_floors' => array('type' => 'boolean', ),
	);
}