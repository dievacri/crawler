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

        public function registrarPais($name){
            $this->db->insert('pais', array('nombrePais' => $name));
            $afftectedRows = $this->db->affected_rows();

            if($afftectedRows == 1){
                return true;
            }else{
                return false;
            }
        }

        public function eliminarPais($idPais){
            $this->db->delete('pais', array('idPais' => $idPais));
            $afftectedRows = $this->db->affected_rows();

            if($afftectedRows == 1){
                return true;
            }else{
                return false;
            }
        }

        public function modificarPais($idPais, $nombrePais){
            $data = array(
                'nombrePais' => $nombrePais
            );

            $this->db->where('idPais', $idPais);
            $this->db->update('pais', $data);
            $afftectedRows = $this->db->affected_rows();

            if($afftectedRows == 1){
                return true;
            }else{
                return false;
            }
        }
    }
?>