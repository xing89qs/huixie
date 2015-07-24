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
		$this->load->model('Order_model');
		$data['orderList'] = $this->Order_model->getAll();
		$this->load->view('admin_header', $data);
		$this->load->view('order_list');
		$this->load->view('admin_footer');
	}
	function unpaidOrderList(){
		$data['pageTitle'] = '未付款订单';
		$this->load->model('Order_model');
		$data['orderList'] = $this->Order_model->searchBy1('hasPaid', 0);
		$this->load->view('admin_header', $data);
		$this->load->view('order_list');
		$this->load->view('admin_footer');
	}
	function untakenOrderList(){
		$data['pageTitle'] = '未接单订单';
		$this->load->model('Order_model');
		$data['orderList'] = $this->Order_model->searchBy2('hasPaid', 1, 'hasTaken', 0);
		$this->load->view('admin_header', $data);
		$this->load->view('order_list');
		$this->load->view('admin_footer');
	}
	function unfinishedOrderList(){
		$data['pageTitle'] = '未完成订单';
		$this->load->model('Order_model');
		$data['orderList'] = $this->Order_model->searchBy2('hasTaken', 1, 'hasFinished', 0);
		$this->load->view('admin_header', $data);
		$this->load->view('order_list');
		$this->load->view('admin_footer');
	}
	function finishedOrderList(){
		$data['pageTitle'] = '已完成订单';
		$this->load->model('Order_model');
		$data['orderList'] = $this->Order_model->searchBy2('hasPaid', 1, 'hasFinished', 1);
		$this->load->view('admin_header', $data);
		$this->load->view('order_list');
		$this->load->view('admin_footer');
	}

}
