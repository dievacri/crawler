<?php
	class Item_model extends CI_Model{
    
        public function __construct(){
            parent::__construct();
        }

        public function getItems($idProducto, $idItem = NULL){
        	if(!is_null($idItem)) $this->db->where('idItem', $idItem);
        	$this->db->where('idProducto', $idProducto);
        	$query = $this->db->get('item');

        	if(empty($query)){
        		return false;
        	}else{
        		if(!is_null($idItem)) return $query->row_array();
        		else return $query->result_array();
        	}
        }

        public function getItemsCategoria($idCategoria){
            $this->db->where('producto.idCategoria', $idCategoria);
            $this->db->join('producto', 'producto.idProducto = item.idProducto');
            $query = $this->db->get('item');

            if(empty($query)){
                return false;
            }else{
                return $query->result_array();
            }
        }

        public function registrarItem($data)
        {
        	$this->db->insert('item',$data);
        	$afftectedRows = $this->db->affected_rows();

            if($afftectedRows == 1){
                return true;
            }else{
                return false;
            }
        }

        public function eliminarItem($idItem)
        {
        	$this->db->delete('item', array('idItem' => $idItem));
        	$afftectedRows = $this->db->affected_rows();

            if($afftectedRows == 1){
                return true;
            }else{
                return false;
            }
        }
        public function modificarItem($idItem, $data)
        {	
        	$this->db->where('idItem', $idItem);
        	$this->db->update('item',$data);
        	$afftectedRows = $this->db->affected_rows();

            if($afftectedRows == 1){
                return true;
            }else{
                return false;
            }
        }
    }
?>