<?php

namespace mehmetbulut\Zoopla;

use mehmetbulut\Zoopla\Request\BranchUpdate;
use mehmetbulut\Zoopla\Request\GetBranchPropertyList;
use mehmetbulut\Zoopla\Request\RemoveProperty;
use mehmetbulut\Zoopla\Request\SendProperty;
use mehmetbulut\Zoopla\Response;

class ZooplaRealTime
{
	private $certFile;
	private $certSSLKey;
	private $certPass;
	private $environment;

	const TEST = 0;
	const LIVE = 1;

	const SendProperty = 1;
	const RemoveProperty = 2;
	const GetBranchPropertyList = 3;
	const BranchUpdate = 3;

	public function __construct($cert_ssl_key, $str_cert_file, $str_cert_pass, $num_environment = self::TEST)
	{
		$this->certFile = $cert_ssl_key;
		$this->certSSLKey = $str_cert_file;
		$this->certPass = $str_cert_pass;
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

	public function send($objRequest, $strURLOverride = '', $zpg_listing_e_tag = false)
	{
		$str_URL = ($strURLOverride) ? $strURLOverride : $objRequest->getURL($this->environment);

		return Curl::send($objRequest, $str_URL, $this->certSSLKey, $this->certFile, $this->certPass, '', $zpg_listing_e_tag);
	}
}