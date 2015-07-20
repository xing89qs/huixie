<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //防止用户直接访问

class Order extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}
	// Admin page
	function orderList()
	{
		$data['pageTitle'] = '所有订单';
		$this->load->model('OrderModel');
		$data['orderList'] = $this->OrderModel->getAll();
		$this->load->view('adminHeader', $data);
		$this->load->view('orderList');
		$this->load->view('adminFooter');
	}
	function unpaidOrderList(){
		$data['pageTitle'] = '未付款订单';
		$this->load->model('OrderModel');
		$data['orderList'] = $this->OrderModel->searchBy1('hasPaid', 0);
		$this->load->view('adminHeader', $data);
		$this->load->view('orderList');
		$this->load->view('adminFooter');
	}
	function untakenOrderList(){
		$data['pageTitle'] = '未接单订单';
		$this->load->model('OrderModel');
		$data['orderList'] = $this->OrderModel->searchBy2('hasPaid', 1, 'hasTaken', 0);
		$this->load->view('adminHeader', $data);
		$this->load->view('orderList');
		$this->load->view('adminFooter');
	}
	function unfinishedOrderList(){
		$data['pageTitle'] = '未完成订单';
		$this->load->model('OrderModel');
		$data['orderList'] = $this->OrderModel->searchBy2('hasTaken', 1, 'hasFinished', 0);
		$this->load->view('adminHeader', $data);
		$this->load->view('orderList');
		$this->load->view('adminFooter');
	}
	function finishedOrderList(){
		$data['pageTitle'] = '已完成订单';
		$this->load->model('OrderModel');
		$data['orderList'] = $this->OrderModel->searchBy2('hasPaid', 1, 'hasFinished', 1);
		$this->load->view('adminHeader', $data);
		$this->load->view('orderList');
		$this->load->view('adminFooter');
	}

}