<?php

namespace mehmetbulut\Zoopla\Request;

use mehmetbulut\Zoopla\Groups\Property;
use mehmetbulut\Zoopla\Request\RequestBase;

class SendProperty extends RequestBase
{
	protected $_path = '/listing/update';

	protected $schema = 'https://realtime-listings.webservices.zpg.co.uk/docs/v1.2/schemas/listing/update.json';

	protected $arrSynthesize = array(
		'property' => array('type' => 'object','class' => Property::class, 'required' => true),
	);

	public $dsdfdfds = "fdsfsdf ndskfndlsjk fndsjlkf ndskj fnkjdsfnkds";
}