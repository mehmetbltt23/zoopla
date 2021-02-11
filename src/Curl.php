<?php

namespace ZooplaRealtime;

class Curl
{
	/**
	 * @param $data
	 * @param $str_url
	 * @param $str_ssl_key
	 * @param $str_cert_file
	 * @param $str_cert_pass
	 * @param $profile
	 * @param false $zpg_listing_e_tag
	 * @return mixed|null
	 */
	public static function send($data, $str_url, $str_ssl_key, $str_cert_file, $str_cert_pass, $profile, $zpg_listing_e_tag = false)
	{
		$client = new \GuzzleHttp\Client();

		$headers = [
			'Content-Type' => 'application/json; profile='.$profile,
		];

		if ($zpg_listing_e_tag) {
			$headers['ZPG-Listing-ETag'] = md5(serialize($data));
		}
		$response = $client->post($str_url, [
			'headers' => $headers,
			'json' => $data,
			'ssl_key' => $str_ssl_key,
			'cert' => [$str_cert_file, $str_cert_pass],
			'verify' => true,
			'http_errors' => false
		])
			->getBody()
			->getContents();

		return $response ? json_decode($response) : null;
	}
}