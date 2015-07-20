<?php
class WeixinModel extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	//每两个小时更新一次，写中转服务
	function getAccessToken(){
		$appid = 'wxcd901e4412fc040b';
		$appsecret = '16a24c163a44ee41fa3ef630c1c455ec';
		$url='https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$appid.'&secret='.$appsecret;
		
		$ch = curl_init();
		$timeout = 5;
		curl_setopt ($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$file_contents = curl_exec($ch);
		curl_close($ch);

		return $file_contents;
	}

	function getAllFollower(){
		$accessToken = 'QLUKc7Gm4zKhY_AmU75vrKoShi7gMhXH7I8EcQMzbUxDKEKk0PPHDdgTWevv_fEiACBCBUORK4IAPwflKppcrkl1zEXVE27HK_6OJzjzoUU';
		$url = 'https://api.weixin.qq.com/cgi-bin/user/get?access_token='.$accessToken;
		$ch = curl_init();
		$timeout = 5;
		curl_setopt ($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$file_contents = curl_exec($ch);
		curl_close($ch);

		return $file_contents;
	}
	function sendMessage(){
		$openid = 'oJWDev7W6DN_6gKuLumLPoOUeky4';
	}
	
}
?>