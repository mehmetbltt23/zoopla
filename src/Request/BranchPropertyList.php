<?php

namespace mehmetbulut\Zoopla\Request;

class BranchPropertyList extends RequestBase {

	protected $path = '/listing/list';

	protected $schema = 'http://realtime-listings.webservices.zpg.co.uk/docs/v1.2/schemas/listing/list.json';

	protected $schemaJsonFileName = 'branch-property-listing.json';

	protected $arrSynthesize = array(
		'branch_reference' => array('type' => 'string'),
	);
}