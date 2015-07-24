<?php
class Weixin_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function getFollowerInfo($openid){
		$this->load->model('Ctoken_model');
		$token = $this->Ctoken_model->getAccessToken();

		$url = 'https://api.weixin.qq.com/cgi-bin/user/info';
		$para = array(
			'access_token' => $token,
			'openid' => $openid,
			'lang' => 'zh_CN'
		);
		$ret = $this->Http_model->doCurlGetRequest($url, $para);
		$retData = json_decode($ret, true);
		var_dump($retData);
		
		return $retData;
	}

	//每两个小时更新一次，写中转服务
	// function getAccessToken(){
	// 	$appid = 'wxcd901e4412fc040b';
	// 	$appsecret = '16a24c163a44ee41fa3ef630c1c455ec';
	// 	$url='https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$appid.'&secret='.$appsecret;
		
	// 	$ch = curl_init();
	// 	$timeout = 5;
	// 	curl_setopt ($ch, CURLOPT_URL, $url);
	// 	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
	// 	curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	// 	$file_contents = curl_exec($ch);
	// 	curl_close($ch);

	// 	return $file_contents;
	// }

	function getAllFollower(){
		$this->load->model('Ctoken_model');
		$token = $this->Ctoken_model->getAccessToken();

		$url = 'https://api.weixin.qq.com/cgi-bin/user/get';
		$para = array(
			'access_token' => $token,
			'next_openid' => ''
		);
		$ret = $this->Http_model->doCurlGetRequest($url, $para);
		$retData = json_decode($ret, true);
		var_dump($retData);

		return $retData;
	}
	function sendMessage(){
		$openid = 'oJWDev7W6DN_6gKuLumLPoOUeky4';
		//shezhi
	}
	
}
?>