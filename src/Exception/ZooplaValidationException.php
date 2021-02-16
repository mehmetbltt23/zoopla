<?php

namespace mehmetbulut\Zoopla\Exception;

class ZooplaValidationException extends \Exception
{
	private $errors;

	public function __construct(array $errors, string $message, int $code)
	{
		$this->errors = $errors;

		parent::__construct($message, $code);
	}

	/**
	 * @return array
	 */
	public function getErrors()
	{
		return $this->errors;
	}
}