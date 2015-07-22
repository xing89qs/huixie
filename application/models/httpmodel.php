<?php
class HttpModel extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	/**
	*封装curl的调用接口，get的请求方式
	*/
	function doCurlGetRequest($url, $data, $timeout=5){
		if($url == '' or $timeout <= 0){
			return false;
		}
		$url = $url.'?'.http_build_query($data);

		$con = curl_init((string)$url);
		curl_setopt($con, CURLOPT_HEADER, false);
		curl_setopt($con, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($con, CURLOPT_TIMEOUT, (int)$timeout);

		return curl_exec($con);
	}

	/**
	*封装curl的调用接口，post的请求方式
	*/
	function doCurlPostRequest($url, $requestStr, $timeout=5){
		if($url == '' or $timeout <= 0 or $requestStr == ''){
			return false;
		}

		$con = curl_init((string)$url);
		curl_setopt($con, CURLOPT_HEADER, false);
		curl_setopt($con, CURLOPT_POSTFIELDS, $requestStr);
		curl_setopt($con, CURLOPT_POST, true);
		curl_setopt($con, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($con, CURLOPT_TIMEOUT, (int)$timeout);

		return curl_exec($con);
	}
	
}
?>