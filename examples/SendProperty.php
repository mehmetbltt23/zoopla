<?php

require_once '../vendor/autoload.php';
require 'config.php';

$c = new ZooplaRealtime\ZooplaRealTime(CERT_SSL_KEY, CERT_PEM_FILE, CERT_PASS, ZooplaRealtime\ZooplaRealTime::TEST);

$request = $c->createRequest(ZooplaRealtime\ZooplaRealTime::SendProperty);

$request->property->branch_reference = '123211';

$request->property->detailed_description->text = 'Mehmet Bulut';

$request->property->detailed_description->dimension->width = 'd';

var_dump(json_decode(json_encode($request)));
