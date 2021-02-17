<?php

use mehmetbulut\Zoopla\Groups\Content;
use mehmetbulut\Zoopla\Groups\Description;
use mehmetbulut\Zoopla\Request\SendProperty;
use mehmetbulut\Zoopla\Values\AreaUnit;
use mehmetbulut\Zoopla\Values\BillsIncluded;
use mehmetbulut\Zoopla\Values\BuyerIncentives;
use mehmetbulut\Zoopla\Values\Category;
use mehmetbulut\Zoopla\Values\CentralHeating;
use mehmetbulut\Zoopla\Values\CommercialUseClass;
use mehmetbulut\Zoopla\Values\ContentType;
use mehmetbulut\Zoopla\Values\CouncilTaxBand;
use mehmetbulut\Zoopla\Values\CurrencyCode;
use mehmetbulut\Zoopla\Values\DecorativeCondition;
use mehmetbulut\Zoopla\Values\DimensionUnit;
use mehmetbulut\Zoopla\Values\FurnishedState;
use mehmetbulut\Zoopla\Values\LifeCycleStatus;
use mehmetbulut\Zoopla\Values\ListedBuildingGrade;
use mehmetbulut\Zoopla\Values\OutSideSpace;
use mehmetbulut\Zoopla\Values\Parking;
use mehmetbulut\Zoopla\Values\PostCodeType;
use mehmetbulut\Zoopla\Values\PriceQualifier;
use mehmetbulut\Zoopla\Values\PricingRentFrequency;
use mehmetbulut\Zoopla\Values\PropertyType;
use mehmetbulut\Zoopla\Values\RentalTerm;
use mehmetbulut\Zoopla\Values\TenantEligibilityDss;
use mehmetbulut\Zoopla\Values\TenantEligibilityStudent;
use mehmetbulut\Zoopla\Values\Tenure;
use mehmetbulut\Zoopla\Values\TransactionType;
use mehmetbulut\Zoopla\ZooplaRealTime;

require 'config.php';

$c = new ZooplaRealTime(CERT_SSL_KEY, CERT_SSL_PASS, CERT_PEM_FILE, CERT_PASS, ZooplaRealTime::TEST);

$request = $c->createRequest(ZooplaRealTime::SendProperty);

$request->branch_reference = '123211';
$request->listing_reference = '123211';
$request->life_cycle_status =LifeCycleStatus::Available;
$request->category = Category::Commercial;
$request->administration_fees = '123211';
$request->display_address = '123211';
$request->summary_description = '123211';


$request->available_bedrooms = 1;
$request->bathrooms = 1;
$request->rateable_value = 1;
$request->living_rooms = 1;
$request->sap_rating = 1;
$request->total_bedrooms = 1;

$request->property_type = PropertyType::BarnConversion; //enum
$request->listed_building_grade = ListedBuildingGrade::CategoryA; //enum
$request->tenure = Tenure::Leasehold; //enum

//number
$request->annual_business_rates = 432;
$request->deposit = 432;
$request->ground_rent = 432;

//date
$request->available_from_date = date('Y-m-d');
$request->open_day = date('Y-m-d');

//array
$request->bills_included = [BillsIncluded::Electricity, BillsIncluded::Telephone];
$request->buyer_incentives = [BuyerIncentives::HelpToNuy, BuyerIncentives::NewBuy];
$request->central_heating = CentralHeating::Full;
$request->commercial_use_classes = [CommercialUseClass::A1];
$request->council_tax_band = CouncilTaxBand::A;
$request->decorative_condition = DecorativeCondition::Average;
$request->feature_list = ["test", "test2"];
//$request->floor_levels = [FloorLevels::Basement,1];
$request->furnished_state = FurnishedState::Furnished;
$request->outside_space = [OutSideSpace::CommunalCarden];
$request->parking = [Parking::DoubleGarage, Parking::SingleGarage];

//boolean
$request->fishing_rights = false;
$request->accessibility = true;
$request->shared_accommodation = true;
$request->basement = true;
$request->burglar_alarm = true;
$request->business_for_sale = true;
$request->chain_free = true;
$request->conservatory = true;
$request->double_glazing = true;
$request->fireplace = true;
$request->gym = true;
$request->loft = true;
$request->new_home = true;
$request->outbuildings = true;
$request->pets_allowed = true;
$request->porter_security = true;
$request->repossession = true;
$request->retirement = true;
$request->serviced = true;
$request->swimming_pool = true;
$request->tenanted = true;
$request->tennis_court = true;
$request->utility_room = true;
$request->waterfront = true;
$request->wood_floors = true;

//detail

$request->detailed_description = [
	new Description('heading','title',null,100,200,DimensionUnit::Feet),
];


//location
$request->location->property_number_or_name = 'ds';
$request->location->street_name = 'ds';
$request->location->street_name = 'ds';
$request->location->locality = 'ds';
$request->location->town_or_city = 'ds';
$request->location->county = 'London';
$request->location->postal_code = 'CM3 8EQ';
$request->location->country_code = 'UK';
$request->location->coordinates->latitude = 0.213213;
$request->location->coordinates->longitude = -0.213213;
$request->location->paf_address->address_key = '02341509';
$request->location->paf_address->organisation_key = '00000000';
$request->location->paf_address->postcode_type = PostCodeType::L;
$request->location->paf_udprn = "00001234";

$request->pricing->transaction_type = TransactionType::Sales;
$request->pricing->currency_code = CurrencyCode::GBP;
$request->pricing->price = 100.000;
$request->pricing->price_per_unit_area->price = 200.000;
$request->pricing->price_per_unit_area->units = AreaUnit::SqFeet;
$request->pricing->rent_frequency = PricingRentFrequency::PerPersonPerWeek;
$request->pricing->price_qualifier = PriceQualifier::GuidePrice;
$request->pricing->auction = false;

$request->areas->external->minimum->value = 21;
$request->areas->external->minimum->units = AreaUnit::sqMetres;
$request->areas->external->maximum->value = 21;
$request->areas->external->maximum->units = AreaUnit::sqMetres;

$request->areas->internal->minimum->value = 21;
$request->areas->internal->minimum->units = AreaUnit::sqMetres;
$request->areas->internal->maximum->value = 100;
$request->areas->internal->maximum->units = AreaUnit::sqMetres;

$request->tenant_eligibility->dss = TenantEligibilityDss::Excluded;
$request->tenant_eligibility->students = TenantEligibilityStudent::Excluded;

//	$request->rental_term->minimum_length = 11;
//	$request->rental_term->units = RentalTermUnit::Days;
$request->rental_term = RentalTerm::FixedTerm;

$request->service_charge->charge = 232;
$request->service_charge->per_unit_area_units = AreaUnit::SqFeet;
//		$request->service_charge->frequency = Frequency::PerPersonPerWeek;

$request->epc_ratings->eer_current_rating = 2;
$request->epc_ratings->eer_potential_rating = 3;
$request->epc_ratings->eir_current_rating = 4;
$request->epc_ratings->eir_potential_rating = 5;

$request->google_street_view->coordinates->latitude = 0.212323;
$request->google_street_view->coordinates->longitude = -0.212323;
$request->google_street_view->heading = 2.32321;
$request->google_street_view->pitch = 2.32321;

//$request->lease_expiry->expiry_date = date('Y-m-d', strtotime('+ 10 day'));
$request->lease_expiry->years_remaining = 2000;

$request->content = [
	new Content('https://www.talkwalker.com/images/2020/blog-headers/image-analysis.png', ContentType::Image, 'test'),
	new Content('https://static.money.product.which.co.uk/money/media/images/600x400_ct/1092_EPC_Rating_09123307f0f8cd0e679ec8a5ac9835e7.png', ContentType::EpcGraph, 'epc')
];

$d = $c->send($request,true,null,false);

var_dump($d);
