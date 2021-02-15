<?php

namespace mehmetbulut\Zoopla\Tests;

use mehmetbulut\Zoopla\Groups\Content;
use mehmetbulut\Zoopla\Request\SendProperty;
use mehmetbulut\Zoopla\Values\AreaUnit;
use mehmetbulut\Zoopla\Values\BillsIncluded;
use mehmetbulut\Zoopla\Values\BuyerIncentives;
use mehmetbulut\Zoopla\Values\CentralHeating;
use mehmetbulut\Zoopla\Values\CommercialUseClass;
use mehmetbulut\Zoopla\Values\ContentType;
use mehmetbulut\Zoopla\Values\CouncilTaxBand;
use mehmetbulut\Zoopla\Values\CurrencyCode;
use mehmetbulut\Zoopla\Values\DecorativeCondition;
use mehmetbulut\Zoopla\Values\FloorLevels;
use mehmetbulut\Zoopla\Values\FurnishedState;
use mehmetbulut\Zoopla\Values\ListedBuildingGrade;
use mehmetbulut\Zoopla\Values\OutSideSpace;
use mehmetbulut\Zoopla\Values\Parking;
use mehmetbulut\Zoopla\Values\PricePerUnitAreaUnit;
use mehmetbulut\Zoopla\Values\PriceQualifier;
use mehmetbulut\Zoopla\Values\PricingRentFrequency;
use mehmetbulut\Zoopla\Values\PropertyType;
use mehmetbulut\Zoopla\Values\ServiceChargeFrequency;
use mehmetbulut\Zoopla\Values\TenantEligibilityDss;
use mehmetbulut\Zoopla\Values\TenantEligibilityStudent;
use mehmetbulut\Zoopla\Values\Tenure;
use mehmetbulut\Zoopla\Values\TransactionType;
use mehmetbulut\Zoopla\ZooplaRealTime;
use PHPUnit\Framework\TestCase;

class SendPropertyTest extends TestCase
{

	protected function setUp(): void
	{
		parent::setUp();

		define('CERT_SSL_KEY', 'fdsfdsf');

		define('CERT_PEM_FILE', ' fds fdsf ds');

		define('CERT_PASS', ' fdsfdsfds');
	}

	public function testSendPropertyParams()
	{
		$c = new ZooplaRealTime(CERT_SSL_KEY, CERT_PEM_FILE, CERT_PASS, ZooplaRealTime::TEST);

		$request = $c->createRequest(ZooplaRealTime::SendProperty);

		$this->assertInstanceOf(SendProperty::class, $request);

		$request->property->branch_reference = '123211';
		$request->property->listing_reference = '123211';
		$request->property->category = '123211';
		$request->property->administration_fees = '123211';
		$request->property->display_address = '123211';
		$request->property->summary_description = '123211';

		$request->property->available_bedrooms = 1;
		$request->property->bathrooms = 1;
		$request->property->rateable_value = 1;
		$request->property->living_rooms = 1;
		$request->property->sap_rating = 1;
		$request->property->total_bedrooms = 1;

		$request->property->property_type = PropertyType::BarnConversion; //enum
		$request->property->listed_building_grade = ListedBuildingGrade::CategoryA; //enum
		$request->property->tenure = Tenure::Leasehold; //enum

		//number
		$request->property->annual_business_rates = 432;
		$request->property->deposit = 432;
		$request->property->ground_rent = 432;

		//date
		$request->property->available_from_date = date('Y-m-d');
		$request->property->open_day = date('Y-m-d');

		//array
		$request->property->bills_included = [BillsIncluded::Electricity, BillsIncluded::Telephone];
		$request->property->buyer_incentives = [BuyerIncentives::HelpToNuy, BuyerIncentives::NewBuy];
		$request->property->central_heating = [CentralHeating::Full];
		$request->property->commercial_use_classes = [CommercialUseClass::A1];
		$request->property->council_tax_band = [CouncilTaxBand::A];
		$request->property->decorative_condition = [DecorativeCondition::Average];
		$request->property->feature_list = ["test", "test2"];
		$request->property->floor_levels = [FloorLevels::Basement, FloorLevels::Zero];
		$request->property->furnished_state = [FurnishedState::Furnished];
		$request->property->outside_space = [OutSideSpace::CommunalCarden];
		$request->property->parking = [Parking::DoubleGarage, Parking::SingleGarage];

		//boolean
		$request->property->fishing_rights = false;
		$request->property->accessibility = true;
		$request->property->shared_accommodation = true;
		$request->property->basement = true;
		$request->property->burglar_alarm = true;
		$request->property->business_for_sale = true;
		$request->property->chain_free = true;
		$request->property->conservatory = true;
		$request->property->double_glazing = true;
		$request->property->fireplace = true;
		$request->property->gym = true;
		$request->property->loft = true;
		$request->property->new_home = true;
		$request->property->outbuildings = true;
		$request->property->pets_allowed = true;
		$request->property->porter_security = true;
		$request->property->repossession = true;
		$request->property->retirement = true;
		$request->property->serviced = true;
		$request->property->swimming_pool = true;
		$request->property->tenanted = true;
		$request->property->tennis_court = true;
		$request->property->utility_room = true;
		$request->property->waterfront = true;
		$request->property->wood_floors = true;

		//detail
		$request->property->detailed_description->text = 'Mehmet Bulut';
		$request->property->detailed_description->heading = 'Mehmet Bulut';
		$request->property->detailed_description->dimension->width = 4;
		$request->property->detailed_description->dimension->length = 4;
		$request->property->detailed_description->dimension->units = AreaUnit::SqFeet;

		//location
		$request->property->location->property_number_or_name = 'ds';
		$request->property->location->street_name = 'ds';
		$request->property->location->street_name = 'ds';
		$request->property->location->locality = 'ds';
		$request->property->location->town_or_city = 'ds';
		$request->property->location->county = 'London';
		$request->property->location->postal_code = 'CM3 8EQ';
		$request->property->location->country_code = 'UK';
		$request->property->location->coordinates->latitude = 0.213213;
		$request->property->location->coordinates->longitude = -0.213213;
		$request->property->location->paf_address->length = 21;
		$request->property->location->paf_address->width = 2132;
		$request->property->location->paf_address->units = AreaUnit::SqFeet;
		$request->property->location->paf_udprn = "test";

		$request->property->pricing->transaction_type = TransactionType::Sales;
		$request->property->pricing->currency_code = CurrencyCode::GBP;
		$request->property->pricing->price = 100.000;
		$request->property->pricing->price_per_unit_area->price = 200.000;
		$request->property->pricing->price_per_unit_area->units = AreaUnit::SqFeet;
		$request->property->pricing->rent_frequency = PricingRentFrequency::PerPersonPerWeek;
		$request->property->pricing->price_qualifier = PriceQualifier::GuidePrice;
		$request->property->pricing->auction = false;

		$request->property->areas->external->minimum->value = 21;
		$request->property->areas->external->minimum->units = AreaUnit::sqMetres;
		$request->property->areas->external->maximum->value = 21;
		$request->property->areas->external->maximum->units = AreaUnit::sqMetres;

		$request->property->areas->internal->minimum->value = 21;
		$request->property->areas->internal->minimum->units = AreaUnit::sqMetres;
		$request->property->areas->internal->maximum->value = 100;
		$request->property->areas->internal->maximum->units = AreaUnit::sqMetres;

		$request->property->tenant_eligibility->dss = TenantEligibilityDss::Excluded;
		$request->property->tenant_eligibility->students = TenantEligibilityStudent::Excluded;

		$request->property->rental_term->minimum_length = 11;
		$request->property->rental_term->units = AreaUnit::sqMetres;

		$request->property->service_charge->charge = 232;
		$request->property->service_charge->per_unit_area_units = PricePerUnitAreaUnit::SqFeet;
		$request->property->service_charge->frequency = ServiceChargeFrequency::PerPersonPerWeek;

		$request->property->epc_ratings->eer_current_rating = 2;
		$request->property->epc_ratings->eer_potential_rating = 3;
		$request->property->epc_ratings->eir_current_rating = 4;
		$request->property->epc_ratings->eir_potential_rating = 5;

		$request->property->google_street_view->coordinates->latitude = 0.212323;
		$request->property->google_street_view->coordinates->longitude = -0.212323;
		$request->property->google_street_view->heading = 2.32321;
		$request->property->google_street_view->pitch = 2.32321;

		$request->property->lease_expiry->expiry_date = date('Y-m-d',strtotime('+ 10 day'));
		$request->property->lease_expiry->years_remaining = 2000;

		$request->property->content = [
			new Content('http://www.google.com/image.jpeg',ContentType::Image,'test'),
			new Content('http://www.google.com/epc.jpeg',ContentType::EpcGraph,'epc')
		];

var_dump($request->getArray()); die;

		$request->property->epc_ratings = '';
		$request->property->google_street_view = '';
		$request->property->lease_expiry = '';
		$request->property->content = '';

		$this->assertIsArray($request->getArray());
		$this->assertNotEmpty($request->getArray());
		$this->assertIsObject($request->getObject());
		$this->assertJson($request->getJson());
		$this->assertNotEmpty($request->getJson());
	}
}