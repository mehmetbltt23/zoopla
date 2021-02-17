<?php

use mehmetbulut\Zoopla\Request\BranchPropertyList;
use mehmetbulut\Zoopla\ZooplaRealTime;

require 'config.php';

$c = new ZooplaRealTime(CERT_SSL_KEY, CERT_SSL_PASS, CERT_PEM_FILE, CERT_PASS, ZooplaRealTime::TEST);

$request = $c->createRequest(ZooplaRealTime::BranchPropertyList);

$request->branch_reference = 'new_branch';

$request->validate();

$d = $c->send($request, true, null, false);
var_dump($d);