<?php

class Progress_model extends MY_Model{
	
  	function __contruct(){
		parent::__construct;
		// $this->load->helper('url');
  	}
	
  	function getall(){
	    $this->load->database();
		
		$query = $this->db->get('project_progress');
		return $query->result_array();
  	}
}
?>
