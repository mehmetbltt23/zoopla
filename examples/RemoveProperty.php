<?php

use mehmetbulut\Zoopla\Request\BranchPropertyList;
use mehmetbulut\Zoopla\Request\RemoveProperty;
use mehmetbulut\Zoopla\Values\DeletionReason;
use mehmetbulut\Zoopla\ZooplaRealTime;

require 'config.php';

$c = new ZooplaRealTime(CERT_SSL_KEY, CERT_SSL_PASS, CERT_PEM_FILE, CERT_PASS, ZooplaRealTime::TEST);

$request = $c->createRequest(ZooplaRealTime::RemoveProperty);

$request->listing_reference = 'new_property';
$request->deletion_reason = DeletionReason::Completed;

$request->validate();

$d = $c->send($request, true, null, false);
var_dump($d);