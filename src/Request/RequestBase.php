<?php

namespace mehmetbulut\Zoopla\Request;

use mehmetbulut\Zoopla\SynthesizeTrait;

class RequestBase implements \JsonSerializable
{
	use SynthesizeTrait;

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
		return json_decode($this->getJson(),true);
	}

	public function getObject()
	{
		return json_decode($this->getJson(),false);
	}

	public function jsonSerialize() {
		$data = [];
		foreach ($this->arrSynthesize as $key => $value) {
			$data[$key] = $this->{$key};
		}

		return $data;
	}
}