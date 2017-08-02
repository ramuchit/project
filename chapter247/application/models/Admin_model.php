<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_model extends CI_Model {
	public function __construct(){
		parent::__construct();

	}

	public function removeData($table,$id){

		$this -> db -> where('id', $id);
  		$this -> db -> delete($table);
  		return TRUE;
	}
	public function saveData($table,$data){
		$this->db->insert($table,$data);
		return TRUE;
	}
	public function get_content($table){
		$query = $this->db->query("SELECT * FROM $table");
		return $query->result();
	}
	public function individual_admin_detail($table,$id,$column){
		$query=$this->db->select("*")
						->where($column, $id)
						->from($table);
		return $query->get()->row_array();
		
	}
	public function filteredData($table,$limit,$start){

		$this->db->limit($limit, $start);
        $query = $this->db->get($table);
	      if ($query->num_rows() > 0) {
	        return $query->result();
	      }
		      return false;
		   }

}
?>