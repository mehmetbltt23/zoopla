<?php

namespace mehmetbulut\Zoopla\Request;

use JsonSchema\Constraints\Constraint;
use JsonSchema\Validator;
use mehmetbulut\Zoopla\Exception\ZooplaValidationException;
use mehmetbulut\Zoopla\SynthesizeTrait;
use mehmetbulut\Zoopla\ZooplaRealTime;

class RequestBase implements \JsonSerializable
{
	use SynthesizeTrait;

	private $liveUrl = 'https://realtime-listings-api.webservices.zpg.co.uk/live/v1';
	private $testUrl = 'https://realtime-listings-api.webservices.zpg.co.uk/sandbox/v1';

	/*protected function removeEmptyValues($property)
	{
		foreach ($property as $key => $value) {
			if (is_object($value)) {
				$this->removeEmptyValues($property->$key);
			} else if ($value == null) {
				unset($property->$key);
			}
		}

		return $property;
	}*/

	public function getJson()
	{
		return json_encode($this);
	}

	public function getArray()
	{
		return json_decode($this->getJson(), true);
	}

	public function getObject()
	{
		return json_decode($this->getJson(), false);
	}

	public function jsonSerialize()
	{
		$data = [];
		foreach ($this->arrSynthesize as $key => $value) {
			if(isset($this->{$key}) && !empty($this->{$key})) {
				$data[$key] = $this->{$key};
			}
		}

		return $data;
	}

	public function getUrl($environment)
	{
		if ($environment == ZooplaRealTime::TEST) {
			$url = $this->testUrl.$this->path;
		} else {
			$url = $this->liveUrl.$this->path;
		}

		return $url;
	}

	public function getSchemaFile()
	{
		$local_path = 'schema/'.$this->schemaJsonFileName;
		if(!realpath($local_path)) {
			file_put_contents($local_path,file_get_contents($this->schema));
		}

		return $local_path;
	}

	public function getSchema()
	{
		return $this->schema;
	}

	public function validate()
	{
		$data = $this->getObject();

		$validator = new Validator();
		$validator->validate($data, (object)['$ref' => 'file://'.realpath($this->getSchemaFile())],Constraint::CHECK_MODE_VALIDATE_SCHEMA);

		if (!$validator->isValid()) {
			throw new ZooplaValidationException($validator->getErrors(),'JSON does not validate. Violations',400);
		}
	}
}