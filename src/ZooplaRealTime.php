<?php

namespace mehmetbulut\Zoopla;

use mehmetbulut\Zoopla\Request\BranchUpdate;
use mehmetbulut\Zoopla\Request\GetBranchPropertyList;
use mehmetbulut\Zoopla\Request\RemoveProperty;
use mehmetbulut\Zoopla\Request\SendProperty;

class ZooplaRealTime
{
	private $certFile;
	private $certPassword;
	private $SSLKey;
	private $SSLKeyPassword;
	private $environment;

	const TEST = 0;
	const LIVE = 1;

	const SendProperty = 1;
	const RemoveProperty = 2;
	const GetBranchPropertyList = 3;
	const BranchUpdate = 3;

	public function __construct($ssl_key, $ssl_key_password, $str_cert_file, $str_cert_pass, $num_environment = self::TEST)
	{
		$this->SSLKey = $str_cert_file;
		$this->SSLKeyPassword = $str_cert_pass;
		$this->certFile = $ssl_key;
		$this->certPassword = $ssl_key_password;
		$this->environment = $num_environment;
	}

	public function createRequest($numRequestType)
	{
		switch ($numRequestType) {
			case self::SendProperty:
				return new SendProperty();
			case self::RemoveProperty:
				return new RemoveProperty();
			case self::GetBranchPropertyList:
				return new GetBranchPropertyList();
			case self::BranchUpdate:
				return new BranchUpdate();
			default:
				throw new \Exception('Invalid Type', Response::HTTP_BAD_REQUEST);
		}
	}

	public function send($obj_request, bool $zpg_listing_e_tag = false, string $str_url_override = null, bool $bool_debug = false)
	{
		$obj_request->validate($obj_request);

		$str_url = ($str_url_override) ? $str_url_override : $obj_request->getURL($this->environment);

		$params = [
			'data' => $obj_request->getArray(),
			'url' => $str_url,
			'ssl_key' => $this->SSLKey,
			'ssl_password' => $this->SSLKeyPassword,
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