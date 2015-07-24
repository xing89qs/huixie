<?php
class Ctoken_model extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function searchByAppid($id){
		$sql="select * from ctoken where appid='$id' order by createTime desc limit 3";
		$query=$this->db->query($sql);
		return $query->result();
	}
	function getAll(){
		$this->db->select('*');
		$query=$this->db->get('ctoken');
		return $query->result();
	}
	function add($data){
		$this->db->query($this->db->insert_string('ctoken',$data));					
		return $this->db->affected_rows();
	}
	function getAccessToken($force = false){
		$appid = 'wxcd901e4412fc040b';
		$appSecret = '16a24c163a44ee41fa3ef630c1c455ec';
		$this->load->Model('Http_model');
		if($force == false){
			$result = $this->searchByAppid($appid);
			if(isset($result[0])){
				$ctoken = $result[0];
				$now = time();
				if(($now - 60 - $ctoken->createTime) > $ctoken->expire){
					//超时
					return $this->getAccessToken(true);
				}else{
					return $ctoken->token;
				}
			}else{
				return $this->getAccessToken(true);
			}
		}else{

			//强制重新获取
			$url = 'https://api.weixin.qq.com/cgi-bin/token';
			$para = array(
				'grant_type' => 'client_credential',
				'appid' => $appid,
				'secret' => $appSecret
			);
			$ret = $this->Http_model->doCurlGetRequest($url, $para);
			$retData = json_decode($ret, true);
			if(!$retData or isset($retData['errcode'])){
				return false;
			}
			$token = $retData['access_token'];
			$expire = $retData['expires_in'];

			$data['appid'] = $appid;
			$data['token'] = $token;
			$data['expire'] = $expire;
			$data['createTime'] = time();
			$this->add($data);

			return $token;
		}

	}
}
?>