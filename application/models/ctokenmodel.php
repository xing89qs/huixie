<?php
class CtokenModel extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function searchById($id){
		$this->db->where('id',$id);
		$this->db->select('*');
		$query=$this->db->get('ctoken');
		$sae = $query->result();
		return $sae[0];
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
		$appId = 'wxcd901e4412fc040b';
		$appSecret = '16a24c163a44ee41fa3ef630c1c455ec';
		$this->load->Model('HttpModel');
		if($force == false){

		}else{
			//强制重新获取
			$url = 'https://api.weixin.qq.com/cgi-bin/token';
			$para = array(
				'grant_type' => 'client_credential',
				'appid' => $appId,
				'secret' => $appSecret
			);
			$ret = $this->HttpModel->doCurlGetRequest($url, $para);
			$retData = json_decode($ret, true);
			if(!$retData or !isset($retData['errcode'])){
				return false;
			}
			$token = $retData['access_token'];
			$expire = $retData['expires_in'];
			return $token;
		}

	}
}
?>