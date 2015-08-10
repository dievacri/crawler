<?php
	class Pais_model extends CI_Model{
    
        public function __construct(){
            parent::__construct();
        }

        public function getCountries(){
        	$query = $this->db->get('pais');

        	if(empty($query)){
        		return '';
        	}else{
        		return $query->result_array();
        	}

        }
    }
?>