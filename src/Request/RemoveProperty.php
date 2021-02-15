<?php

namespace mehmetbulut\Zoopla\Request;

use mehmetbulut\Zoopla\Values\DeletionReason;

class RemoveProperty extends RequestBase {

	protected $_path = '/listing/delete';

	protected $schema = 'https://realtime-listings.webservices.zpg.co.uk/docs/v1.2/schemas/listing/delete.json';

	protected $arrSynthesize = array(
		'listing_reference' => array('type' => 'string', 'required' => true),
		'deletion_reason' => array('type' => 'object','class' => DeletionReason::class, 'required' => true),
	);
}