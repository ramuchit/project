<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Shop_model extends CI_Model {
	public function __construct(){
		parent::__construct();

	}
	public function get_data_single($table,$id){
		 $query = $this->db->get_where($table, array('id' => $id));
		  return $query->row_array();
	}
	public function get_content($table){
		// $query = $this->db->query("SELECT * FROM $table ");
		// return $query->get->result();
		$query=$this->db->select("*")
						->from($table);
		return $query->get()->result();

	}
	public function get_content_one($table,$id,$column){
		$query=$this->db->select("*")
						->where("$column", $id)
						->from($table);
		return $query->get()->row_array();
	}
	public function saveData($table,$data){
		$this->db->insert($table,$data);
		return TRUE;
	}
	public function updateData($table,$data,$where){
		$this->db->where('id', $where);
       $this->db->update($table, $data);
		return TRUE;
	}
	public function removeData($table,$id){

		$this -> db -> where('id', $id);
  		$this -> db -> delete($table);
  		return TRUE;
	}
	public function serchData($table,$key){

		$qry=$this->db->select('*')->from($table)
                                   ->where("p_name LIKE '%$key%'")
                                   ->get();
           return $qry->result();
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