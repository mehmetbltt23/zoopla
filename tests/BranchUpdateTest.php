<?php

namespace mehmetbulut\Zoopla\Tests;

use mehmetbulut\Zoopla\Request\BranchUpdate;
use mehmetbulut\Zoopla\Values\PostCodeType;
use mehmetbulut\Zoopla\ZooplaRealTime;
use PHPUnit\Framework\TestCase;

class BranchUpdateTest extends TestCase
{
	protected function setUp(): void
	{
		parent::setUp();

		define('CERT_SSL_KEY', './zoopla/test/mycert.crt');

		define('CERT_SSL_PASS', null);

		define('CERT_PEM_FILE', './zoopla/test/private.pem');

		define('CERT_PASS', null);
	}

	public function testSendPropertyParams()
	{
		$c = new ZooplaRealTime(CERT_SSL_KEY, CERT_SSL_PASS, CERT_PEM_FILE, CERT_PASS, ZooplaRealTime::TEST);

		$request = $c->createRequest(ZooplaRealTime::BranchUpdate);

		$this->assertInstanceOf(BranchUpdate::class, $request);

		$request->branch_reference = "new_branch";
		$request->branch_name = "New Branch";
		$request->telephone = "123123123";
		$request->email = "new@branch.com";
		$request->website = "https://branch.com";

		$request->location->property_number_or_name = "14A";
		$request->location->street_name = "Barker Road";
		$request->location->locality = "Sutton Coldfield";
		$request->location->town_or_city = "Birmingham";
		$request->location->county = "West Midlands";
		$request->location->postal_code = "B19 4JY";
		$request->location->country_code = "GB";
		$request->location->coordinates->latitude = 54.123456;
		$request->location->coordinates->longitude = 119.265984;
		$request->location->paf_address->address_key = '02341509';
		$request->location->paf_address->organisation_key ='00000000';
		$request->location->paf_address->postcode_type = PostCodeType::L;
		$request->location->paf_udprn = "00001234";


		//$this->assertIsArray($request->getArray());
		$this->assertNotEmpty($request->getArray());
		//$this->assertIsObject($request->getObject());
		$this->assertJson($request->getJson());
		$this->assertNotEmpty($request->getJson());

		$request->validate();

	//	$d = $c->send($request,true,null,false);
	}
}