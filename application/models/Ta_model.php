<?php
class Ta_model extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function searchById($id){
		$this->db->where('openid',$id);
		$this->db->select('*');
		$query=$this->db->get('ta');
		return $query->result()[0];
	}
	function getAll(){
		$this->db->select('*');
		$query=$this->db->get('ta');
		return $query->result();
	}
	function add($data){
		$this->db->query($this->db->insert_string('ta',$data));					
		return $this->db->affected_rows();
	}
	function searchByName($name){
		$this->db->where('name',$name);
		$this->db->select('*');
		$query=$this->db->get('ta');
		if($this->db->affected_rows()){
			$sae =	$query->result();
			return $sae[0];
		}
		return $this->db->affected_rows();
	}
	function searchBySkills($skills){
		$sql="select * from ta where skills='$skills' order by star desc limit 10";
		$query=$this->db->query($sql);
		return $query->result();
	}

	function delete(){
		
	}
	function update($data){
		
	}
	
	function modify($id,$data){
		$this->db->where('openid',$id);
		$this->db->update('ta',$data);
		return $this->db->affected_rows();
	}
}
?>