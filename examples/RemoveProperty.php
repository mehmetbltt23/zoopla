<?php

use mehmetbulut\Zoopla\Request\BranchPropertyList;
use mehmetbulut\Zoopla\Request\RemoveProperty;
use mehmetbulut\Zoopla\Values\DeletionReason;
use mehmetbulut\Zoopla\ZooplaRealTime;

require 'config.php';

$c = new ZooplaRealTime(CERT_SSL_KEY, CERT_SSL_PASS, CERT_PEM_FILE, CERT_PASS, ZooplaRealTime::TEST);

$request = $c->createRequest(ZooplaRealTime::RemoveProperty);

$this->assertInstanceOf(RemoveProperty::class, $request);

$request->listing_reference = 'new_property';
$request->deletion_reason = DeletionReason::Completed;

$this->assertIsArray($request->getArray());
$this->assertNotEmpty($request->getArray());
$this->assertIsObject($request->getObject());
$this->assertJson($request->getJson());
$this->assertNotEmpty($request->getJson());

$request->validate();

$d = $c->send($request, true, null, false);
var_dump($d);