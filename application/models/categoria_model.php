<?php
	class Categoria_model extends CI_Model{
    
        public function __construct(){
            parent::__construct();
        }

        public function getCategories($idPais){
        	$this->db->where('idPais',$idPais);
        	$query = $this->db->get('categoria');

        	if(empty($query)){
        		return '';
        	}else{
        		return $query->result_array();
        	}
        }

        public function registrarCategoria($idPais, $name){
        	$this->db->insert('categoria', array('idPais'=>$idPais,'nombreCategoria' => $name));
            $afftectedRows = $this->db->affected_rows();

            if($afftectedRows == 1){
                return true;
            }else{
                return false;
            }
        }

        public function eliminarCategoria($idCategoria){
        	$this->db->delete('categoria', array('idCategoria' => $idCategoria));
            $afftectedRows = $this->db->affected_rows();

            if($afftectedRows == 1){
                return true;
            }else{
                return false;
            }
        }

        public function modificarCategoria($idCategory,$nameCategory){
        	$data = array(
                'nombreCategoria' => $nameCategory
            );

            $this->db->where('idCategoria', $idCategory);
            $this->db->update('categoria', $data);
            $afftectedRows = $this->db->affected_rows();

            if($afftectedRows == 1){
                return true;
            }else{
                return false;
            }
        }

    }
?>