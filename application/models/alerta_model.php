<?php
	class Alerta_model extends CI_Model{
    
        public function __construct(){
            parent::__construct();
        }

        public function getEstados()
        {
        	$query = $this->db->get('estadoAlerta');
        	if($query){
        		return $query->result_array();
        	}else{
        		return false;
        	}
        }

        public function getAlertas($fechaDesde, $fechaHasta, $categoria, $estado, $ordenar,$pais)
        {
        	$this->db->select('*, producto.id as idProducto') ;
			$this->db->from('alerta');
			$this->db->join('estadoAlerta','estadoAlerta.idEstado = alerta.idEstado','INNER');
			$this->db->join('item','item.idItem = alerta.idItem','INNER');
			$this->db->join('producto','producto.idProducto = item.idProducto','INNER');
			$this->db->join('categoria','producto.idCategoria = categoria.idCategoria','INNER');
			
			$this->db->join('compania','compania.idCompania = producto.idCompania','INNER');
			$this->db->join('pais','pais.idPais = compania.idPais','INNER');
			
			$this->db->where("alerta.fecha BETWEEN '$fechaDesde' AND '$fechaHasta'");
			$this->db->where('pais.idPais',$pais);
			
			if(!is_null($estado)){
				$this->db->where('alerta.idEstado', $estado);
			}else{
				$this->db->where('alerta.idEstado !=', 2);
			}
				
			if(!is_null($categoria))	$this->db->where('producto.idCategoria', $categoria);

			if(!is_null($ordenar)){
				$this->db->order_by($ordenar, 'desc');
			}else{
				$this->db->order_by('fecha', 'desc');
			}
			
			$query = $this->db->get();
			
			if($query->num_rows()>0) return $query->result_array();
			else return false;
        }


		public function rechazarAlerta($id){
			$this->db->where('idAlerta',$id);
			$query = $this->db->update('alerta', array('idEstado'=>3));
			$afftectedRows = $this->db->affected_rows();

            if($afftectedRows == 1){
                return true;
            }else{
                return false;
            }
		}
		
		public function aceptarAlerta($id){
			$this->db->where('idAlerta',$id);
			$query = $this->db->update('alerta', array('idEstado'=>2));
			$afftectedRows = $this->db->affected_rows();

            if($afftectedRows == 1){
                return true;
            }else{
                return false;
            }
		}

		public function getAlerta($idAlerta){
			$this->db->from('alerta');
			$this->db->join('estadoAlerta','estadoAlerta.idEstado = alerta.idEstado','INNER');
			$this->db->join('item','item.idItem = alerta.idItem','INNER');
			$this->db->join('producto','producto.idProducto = item.idProducto','INNER');
			$this->db->join('categoria','producto.idCategoria = categoria.idCategoria','INNER');
			
			$this->db->join('compania','compania.idCompania = producto.idCompania','INNER');
			$this->db->join('pais','pais.idPais = compania.idPais','INNER');
			$this->db->where('alerta.idAlerta',$idAlerta);
			$query = $this->db->get();
			//print_r($query->result());
			if($query->num_rows()>0) return $query->row_array();
			else return false;
		}
    }
?>