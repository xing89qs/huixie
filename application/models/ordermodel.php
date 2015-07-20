<?php
class OrderModel extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function searchBy1($key, $value){
		$this->db->where($key, $value);
		$this->db->select('*');
		$query=$this->db->get('order');
		$sae = $query->result();
		return $sae;
	}
	function searchBy2($key1, $value1, $key2, $value2){
		$this->db->where($key1, $value1);
		$this->db->where($key2, $value2);
		$this->db->select('*');
		$query=$this->db->get('order');
		$sae = $query->result();
		return $sae;
	}
	function searchBy3($key1, $value1, $key2, $value2, $key3, $value3){
		$this->db->where($key1, $value1);
		$this->db->where($key2, $value2);
		$this->db->where($key3, $value3);
		$this->db->select('*');
		$query=$this->db->get('order');
		$sae = $query->result();
		return $sae;
	}
	function getAll(){
		$this->db->select('*');
		$query=$this->db->get('order');
		return $query->result();
	}
	function add($data){
		$this->db->query($this->db->insert_string('order',$data));
		$query=$this->db->query("select @@identity as id");
		return $query->result();
	}
	function delete(){
		
	}
	function update($data){
		$this->db->where('id',$data['id']);
		$this->db->update('order',$data);
		return $this->db->affected_rows();
	}
	function selectTa($data){
		$this->db->query($this->db->insert_string('selectedTa',$data));
		return $this->db->affected_rows();
	}
}
?>