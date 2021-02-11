<?php

namespace ZooplaRealtime;

use DateTime;

trait SynthesizeTrait
{
	public function __set($property, $value)
	{
		if ($this->hasProperty($property)) {
			$this->setProperty(...func_get_args());
		} else {
			throw new \Exception('The '.$property.' param not found', Response::HTTP_NOT_FOUND);
		}
	}

	public function __call($a, $b)
	{
		dd($a);
	}

	public function __get($property)
	{
		if (property_exists($this, $property)) {
			return $this->{$property};
		} else if ($this->hasProperty($property)) {
			if (is_array($property)) {
				return $this->{$property};
			} else {
				$class = $this->arrSynthesize[$property]['class'];
				return $this->{$property} = app($class);
			}
		}

		throw new \Exception('Invalid param', Response::HTTP_BAD_REQUEST);
	}

	private function hasProperty($property): bool
	{
		if (isset($this->arrSynthesize[$property])) {
			return true;
		} else {
			return false;
		}
	}

	private function setProperty($property, $value)
	{
		$param = $this->arrSynthesize[$property];
		$check = null;
		switch ($param['type']) {
			case 'string':
				$check = is_string($value);
				break;

			case 'integer':
				$check = is_int($value);
				break;

			case 'number':
				$check = is_numeric($value);
				break;

			case 'enum':
				break;

			case 'array':
				$check = is_array($value);
				break;

			case 'object':
				$check = is_object($value);
				break;

			case 'float':
				$check = is_float($value);
				break;

			case 'email':
				$check = filter_var($value, FILTER_VALIDATE_EMAIL);
				break;

			case 'boolean':
				$check = is_bool($value);
				break;

			case 'date'://Y-m-d
				$format = 'Y-m-d';
				$d = DateTime::createFromFormat($format, $value);
				$check = $d && $d->format($format) == $value;
				break;

			case 'datetime'://Y-m-d H:i:s
				$format = 'Y-m-d H:i:s';
				$d = DateTime::createFromFormat($format, $value);
				$check = $d && $d->format($format) == $value;
				break;
		}

		if (!$check) {
			throw new \Exception('Invalid type '.$property.' '.$param['type'], Response::HTTP_BAD_REQUEST);
		} else if ($param['required'] === true && empty($value)) {
			throw new \Exception('Must be '.$property.' '.$param['type'], Response::HTTP_BAD_REQUEST);
		} else if ($value) {
			$this->{$property} = $value;
		}
	}
}