<?php

namespace ZooplaRealTime\Request;

use ZooplaRealTime\SynthesizeTrait;

class RequestBase
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
}