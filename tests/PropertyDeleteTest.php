<?php

namespace mehmetbulut\Zoopla\Tests;

use mehmetbulut\Zoopla\Request\BranchPropertyList;
use mehmetbulut\Zoopla\Request\RemoveProperty;
use mehmetbulut\Zoopla\Values\DeletionReason;
use mehmetbulut\Zoopla\ZooplaRealTime;
use PHPUnit\Framework\TestCase;

class PropertyDeleteTest extends TestCase
{
	protected function setUp(): void
	{
		parent::setUp();
	}

	public function testSendPropertyParams()
	{
		$c = new ZooplaRealTime('./zoopla/test/mycert.crt', null, './zoopla/test/private.pem', null, ZooplaRealTime::TEST);

		$request = $c->createRequest(ZooplaRealTime::RemoveProperty);

		$this->assertInstanceOf(RemoveProperty::class, $request);

		$request->listing_reference = 'new_property';
		$request->deletion_reason = DeletionReason::Completed;

		//$this->assertIsArray($request->getArray());
		$this->assertNotEmpty($request->getArray());
	//	$this->assertIsObject($request->getObject());
		$this->assertJson($request->getJson());
		$this->assertNotEmpty($request->getJson());

		$request->validate();

		//$d = $c->send($request, true, null, false);
		//var_dump($d);
	}
}