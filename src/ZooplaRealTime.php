<?php

namespace mehmetbulut\Zoopla;

use mehmetbulut\Zoopla\Request\BranchUpdate;
use mehmetbulut\Zoopla\Request\BranchPropertyList;
use mehmetbulut\Zoopla\Request\RemoveProperty;
use mehmetbulut\Zoopla\Request\SendProperty;

class ZooplaRealTime
{
	private $certFile;
	private $certPassword;
	private $pemFile;
	private $pemFilePass;
	private $environment;

	const TEST = 0;
	const LIVE = 1;

	const SendProperty = 1;
	const RemoveProperty = 2;
	const BranchPropertyList = 3;
	const BranchUpdate = 4;

	public function __construct($cert_file, $cert_pass, $pem_file, $pem_file_pass, $num_environment = self::TEST)
	{
		$this->pemFile = $pem_file;
		$this->pemFilePass = $pem_file_pass;
		$this->certFile = $cert_file;
		$this->certPassword = $cert_pass;
		$this->environment = $num_environment;
	}

	public function createRequest(int $request_type)
	{
		switch ($request_type) {
			case self::SendProperty:
				return new SendProperty();
			case self::RemoveProperty:
				return new RemoveProperty();
			case self::BranchPropertyList:
				return new BranchPropertyList();
			case self::BranchUpdate:
				return new BranchUpdate();
			default:
				throw new \Exception('Invalid Request Type', Response::HTTP_BAD_REQUEST);
		}
	}

	public function send($obj_request, bool $zpg_listing_e_tag = false, string $str_url_override = null, bool $bool_debug = false)
	{
		$obj_request->validate($obj_request);

		$str_url = ($str_url_override) ? $str_url_override : $obj_request->getURL($this->environment);

		$params = [
			'data' => $obj_request->getArray(),
			'url' => $str_url,
			'ssl_key' => $this->pemFile,
			'ssl_password' => $this->pemFilePass,
			'cert_file' => $this->certFile,
			'cert_password' => $this->certPassword,
			'headers' => ['Content-Type' => 'application/json; profile='.$obj_request->getSchema()],
		];

		if ($zpg_listing_e_tag) {
			$params['headers']['ZPG-Listing-ETag'] = md5(serialize($obj_request->getArray()));
		}

		return Curl::send($params, $bool_debug);
	}
}