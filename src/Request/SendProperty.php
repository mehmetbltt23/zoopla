<?php

namespace ZooplaRealTime\Request;

use ZooplaRealTime\Groups\Property;

class SendProperty extends RequestBase
{
	protected $_path = '/listing/update';

	protected $schema = 'https://realtime-listings.webservices.zpg.co.uk/docs/v1.2/schemas/listing/update.json';

	protected $arrSynthesize = array(
		'property' => array('type' => 'object','class' => Property::class, 'required' => true),
	);
}