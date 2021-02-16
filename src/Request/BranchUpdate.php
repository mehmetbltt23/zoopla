<?php

namespace mehmetbulut\Zoopla\Request;

use mehmetbulut\Zoopla\Groups\Location;

class BranchUpdate extends RequestBase
{
	protected $path = '/branch/update';

	protected $schema = 'https://realtime-listings.webservices.zpg.co.uk/docs/v1.2/schemas/branch/update.json';

	protected $schemaJsonFileName = 'branch-update.json';

	protected $arrSynthesize = array(
		'branch_reference' => array('type' => 'string'),
		'branch_name' => array('type' => 'string'),
		'telephone' => array('type' => 'string'),
		'email' => array('type' => 'email'),
		'website' => array('type' => 'string'),
		'location' => array('type' => 'object', 'class' => Location::class),
	);
}