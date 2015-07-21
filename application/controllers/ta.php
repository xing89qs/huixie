<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //防止用户直接访问

class Ta extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}
	function taList()
	{
		$data['pageTitle'] = '所有 TA';
		$this->load->model('TaModel');
		$data['taList'] = $this->TaModel->getAll();
		$this->load->view('adminHeader', $data);
		$this->load->view('taList');
		$this->load->view('adminFooter');
	}
	function addTaPage(){
		$data['pageTitle'] = '添加 TA';
		$this->load->view('adminHeader',$data);
		$this->load->view('addTA');
		$this->load->view('adminFooter');
	}
	function addTa(){
		$this->load->model('TaModel');
		$data['name']=$_POST['name'];
		$data['email']=$_POST['email'];
		$data['skills']=$_POST['skills'];
		$data['star'] = $_POST['star'];
		$data['unitPrice'] = $_POST['unitPrice'];
		date_default_timezone_set('PRC');
		$data['createTime'] = date('Y-m-d h:i:s');
		if(isset($data['name'])){
			$time = 3;
			header("refresh:$time;url=addTaPage");
			print('添加失败...<br>'.$time.'秒后自动跳转。');
		}
		if (!$this->TaModel->add($data)) {
			$time = 3;
			header("refresh:$time;url=addTaPage");
			print('添加失败...<br>'.$time.'秒后自动跳转。');
		}else{
			redirect('ta/taList');
		}
	}
	
}