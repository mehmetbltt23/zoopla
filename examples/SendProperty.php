<?php

use ZooplaRealtime\ZooplaRealTime;

require 'config.php';

$c = new ZooplaRealTime(CERT_SSL_KEY, CERT_PEM_FILE, CERT_PASS, ZooplaRealTime::TEST);

$request = $c->createRequest(ZooplaRealTime::SendProperty);


$request->property->branch_reference = '123211';

$request->property->detailed_description->text = 'Mehmet Bulut';

$request->property->detailed_description->dimension->width = 'd';

var_dump(json_decode(json_encode($request)));
