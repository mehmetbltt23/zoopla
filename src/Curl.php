<?php

namespace mehmetbulut\Zoopla;

class Curl
{
	/**
	 * @param array $params
	 * @param false $bool_debug
	 * @return mixed|null
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public static function send(array $params, $bool_debug = false)
	{
		$client = new \GuzzleHttp\Client();

		$response = $client->post($params['url'], [
			'headers' => $params['headers'],
			'json' => $params['data'],
			'ssl_key' => [$params['ssl_key'],$params['ssl_password']],
			'cert' => [$params['cert_file'],$params['cert_password']],
			'verify' => true,
			'debug' => $bool_debug,
			'http_errors' => false
		])
			->getBody()
			->getContents();

		return $response ? json_decode($response) : null;
	}
}