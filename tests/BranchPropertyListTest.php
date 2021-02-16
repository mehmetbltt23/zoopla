<?php

namespace mehmetbulut\Zoopla\Tests;

use mehmetbulut\Zoopla\Request\BranchPropertyList;
use mehmetbulut\Zoopla\ZooplaRealTime;
use PHPUnit\Framework\TestCase;

class BranchPropertyListTest extends TestCase
{
	public function testSendPropertyParams()
	{
		$c = new ZooplaRealTime('./zoopla/test/mycert.crt', null, './zoopla/test/private.pem', null, ZooplaRealTime::TEST);

		$request = $c->createRequest(ZooplaRealTime::BranchPropertyList);

		$this->assertInstanceOf(BranchPropertyList::class, $request);

		$request->branch_reference = 'new_branch';

	//	$this->assertIsArray($request->getArray());
		$this->assertNotEmpty($request->getArray());
	//	$this->assertIsObject($request->getObject());
		$this->assertJson($request->getJson());
		$this->assertNotEmpty($request->getJson());

		$request->validate();

		//$d = $c->send($request, true, null, false);
		//var_dump($d);
	}
}