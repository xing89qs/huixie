<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //防止用户直接访问

class Weixin extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}
	function getAllFollower(){
		$this->load->model('WeixinModel');
		//echo $this->WeixinModel->getAccessToken();
		echo $this->WeixinModel->getAllFollower();
	}
	
}