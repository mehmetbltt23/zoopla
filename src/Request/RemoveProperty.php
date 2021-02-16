<?php

namespace mehmetbulut\Zoopla\Request;

use mehmetbulut\Zoopla\Values\DeletionReason;

class RemoveProperty extends RequestBase {

	protected $path = '/listing/delete';

	protected $schema = 'https://realtime-listings.webservices.zpg.co.uk/docs/v1.2/schemas/listing/delete.json';

	protected $schemaJsonFileName = 'remove-property.json';

	protected $arrSynthesize = array(
		'listing_reference' => array('type' => 'string'),
		'deletion_reason' => array('type' => 'enum','class' => DeletionReason::class),
	);
}