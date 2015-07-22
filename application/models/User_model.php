<?php
class User_model extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function searchById($id){
		$this->db->where('id',$id);
		$this->db->select('*');
		$query=$this->db->get('user');
		$sae = $query->result();
		return $sae[0];
	}
	function getAll(){
		$this->db->select('*');
		$query=$this->db->get('user');
		return $query->result();
	}
	function add($data){
		$this->db->query($this->db->insert_string('user',$data));					
		return $this->db->affected_rows();
	}
	function searchByName($name){
		$this->db->where('name',$name);
		$this->db->select('*');
		$query=$this->db->get('user');
		if($this->db->affected_rows()){
			$sae =	$query->result();
			return $sae[0];
		}
		return $this->db->affected_rows();
	}

	function delete(){
		
	}
	function update($data){
		
	}
	
	function modify($id,$data){
		$this->db->where('id',$id);
		$this->db->update('user',$data);
		return $this->db->affected_rows();
	}
}
?>