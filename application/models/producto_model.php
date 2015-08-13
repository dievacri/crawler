<?php
	class Producto_model extends CI_Model{
    
        public function __construct(){
            parent::__construct();
        }

        public function getProducts($idCategoria,$idProducto = NULL)
        {
        	if(!is_null($idProducto)){
        		$this->db->where('idProducto',$idProducto);
        	}
        	$this->db->where('idCategoria',$idCategoria);
        	$query = $this->db->get('producto');

        	if(empty($query)){
        		return '';
        	}else{
        		if(!is_null($idProducto)){
        			return $query->row_array();
        		}else{
        			return $query->result_array();
        		}
        	}
        }

        public function registrarProducto($producto){
        	$data = array(
        		"idProducto" => $producto['idProducto'],
        		"idCategoria" => $producto['idCategoria'],
        		"idCompania" => $producto['idCategoria'],
        		"nombreProducto" => $producto['nombreProducto']
        	);
        	$this->db->insert('producto',$data);
            $afftectedRows = $this->db->affected_rows();

            if($afftectedRows == 1){
                return true;
            }else{
                return false;
            }
        }

        public function eliminarProducto($idProducto){
        	$this->db->delete('producto',array('idProducto',$idProducto));
        	$afftectedRows = $this->db->affected_rows();

        	if($afftectedRows == 1){
        		return true;
        	}else{
        		return false;
        	}
        }

        public function modificarProducto($id,$idProducto,$idCategoria,$idCompania,$nombreProducto){
        	$data = array(
            	'idProducto' => $idProducto,
            	'idCategoria' => $idCategoria,
            	'idCompania' => $idCompania,
                'nombreProducto' => $nombreProducto
            );

            $this->db->where('id', $id);
            $this->db->update('producto', $data);
            $afftectedRows = $this->db->affected_rows();

            if($afftectedRows == 1){
                return true;
            }else{
                return false;
            }
        }
	}

?>