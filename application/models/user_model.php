<?php
	class User_model extends CI_Model{
    
        public function __construct(){
            parent::__construct();
        }

        public function loginUser($user, $password){
        	$this->db->where("mailUsuario", $user);
            $this->db->where("contrasenaUsuario", $password);
            $query = $this->db->get("usuario");
            if($query->num_rows() == 1){
                return true;
            }else{
                return false;
            }
        }
    }
?>