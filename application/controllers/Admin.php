<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //防止用户直接访问

class Admin extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}
	function index(){
		$this->load->view('admin_header');
		$this->load->view('admin_login');
		$this->load->view('admin_footer');
	}

	function adminList(){
		$this->checkLogin();

		$data['pageTitle'] = '管理员列表';
		$data['admin'] = $_SESSION['admin'];
		$this->load->model('Admin_model');
		$data['adminList'] = $this->Admin_model->getAll();
		$this->load->view('admin_header',$data);		
		$this->load->view('admin_list');
		$this->load->view('admin_footer');
	}
	function loginPage(){
		$this->load->view('admin_header');
		$this->load->view('admin_login');
		$this->load->view('admin_footer');
	}

	function login(){
		$this->load->model('Admin_model');
		$name = $_POST['name'];
		$password = $_POST['password'];
		$admin = $this->Admin_model->searchByName($name);
		if(isset($admin) and $admin->password == $password){
			if (!session_id()) session_start();
			$_SESSION['admin'] = $admin;	
			redirect('admin/adminList');
		}else{
			header("refresh:3;url=loginPage");
			print('用户名/密码错误，登陆失败...<br> 3秒后自动跳转。');
		}
	}
	function logout(){
		$this->checkLogin();
		unset($_SESSION['admin']);
		header("refresh:3;url=loginPage");
		print('注销成功！...<br> 3秒后自动跳转。');
	}
	private function checkLogin(){
		if (!session_id()) session_start();
		if(!isset($_SESSION['admin'])){
			header("refresh:3;url=loginPage");
			print('请登陆...<br> 3秒后自动跳转。');
			exit(0);
		}
	}

	function modifyPage(){
		$this->checkLogin();
		$data['pageTitle'] = '修改密码';

		$data['admin'] = $_SESSION['admin'];
		$this->load->view('admin_header', $data);
		$this->load->view('admin_modify');
		$this->load->view('admin_footer');
	}
	function modify(){
		$this->checkLogin();
		$admin = $_SESSION['admin'];
		if(isset($_POST['orignal']) and isset($_POST['password'])){
			$orignal = $_POST['orignal'];
			$password = $_POST['password'];
			if($admin->password == $orignal){
				$this->load->model('Admin_model');
				$admin->password = $password;
				$this->Admin_model->modify($admin->name, $admin);
				header("refresh:3;url=adminList");
				print('修改成功...<br> 3秒后自动跳转。');
			exit(0);
			}else{
				header("refresh:3;url=loginPage");
				print('原始密码错误...<br> 3秒后自动跳转。');
				exit(0);
			}
		}
	}

}
