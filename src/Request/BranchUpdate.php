<?php

namespace mehmetbulut\Zoopla\Request;

use mehmetbulut\Zoopla\Groups\Location;

class BranchUpdate extends RequestBase
{

	protected $_path = '/branch/update';

	protected $schema = 'https://realtime-listings.webservices.zpg.co.uk/docs/v1.2/schemas/branch/update.json';

	protected $arrSynthesize = array(
		'branch_reference' => array('type' => 'string', 'required' => true),
		'branch_name' => array('type' => 'string', 'required' => true),
		'location' => array('type' => 'object', 'class' => Location::class, 'required' => true),
	);
}