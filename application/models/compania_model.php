<?php
	class Compania_model extends CI_Model{
    
        public function __construct(){
            parent::__construct();
        }

        public function getCompanies($idPais,$idCompania = NULL){
        	if(!is_null($idCompania)){
        		$this->db->where('idCompania',$idCompania);
        	}
        	$this->db->where('idPais',$idPais);
        	$query = $this->db->get('compania');

        	if(empty($query)){
        		return '';
        	}else{
        		if(!is_null($idCompania)){
        			return $query->row_array();	
        		}else{
        			return $query->result_array();
        		}
        	}

        }

        public function registrarCompania($idCompania, $idPais, $name){
        	$this->db->insert('compania', array('idCompania'=>$idCompania,'idPais'=>$idPais,'nombreCompania' => $name));
            $afftectedRows = $this->db->affected_rows();

            if($afftectedRows == 1){
                return true;
            }else{
                return false;
            }
        }

        public function eliminarCompania($idCompania){
        	$this->db->delete('compania', array('idCompania' => $idCompania));
            $afftectedRows = $this->db->affected_rows();

            if($afftectedRows == 1){
                return true;
            }else{
                return false;
            }
        }

        public function modificarCompania($id, $idCompania, $nombreCompania){
            $data = array(
            	'idCompania' => $idCompania,
                'nombreCompania' => $nombreCompania
            );

            $this->db->where('id', $id);
            $this->db->update('compania', $data);
            $afftectedRows = $this->db->affected_rows();

            if($afftectedRows == 1){
                return true;
            }else{
                return false;
            }
        }
	}
?>