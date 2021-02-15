<?php

namespace mehmetbulut\Zoopla\Groups;

use mehmetbulut\Zoopla\SynthesizeTrait;
use mehmetbulut\Zoopla\Values\ContentType;

class Content
{
	use SynthesizeTrait;

	protected $arrSynthesize = array(
		'url' => array('type' => 'string', 'required' => true),
		'type' => array('type' => 'enum', 'class' => ContentType::class, 'required' => true),
		'caption' => array('type' => 'string', 'required' => true),
	);

	public function __construct(string $url, string $media_type, string $caption)
	{
		$this->url = $url;
		$this->type = $media_type;
		$this->caption = $caption;
	}
}