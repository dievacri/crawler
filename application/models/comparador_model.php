<?php
	class Comparador_model extends CI_Model{
    
        public function __construct(){
            parent::__construct();
        }

        public function url_get_contents($url, $useragent='cURL', $headers=false, $follow_redirects=true, $debug=false) 
		{
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL,$url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			if ($headers==true){
				curl_setopt($ch, CURLOPT_HEADER,1);
			}
			if ($headers=='headers only') {
				curl_setopt($ch, CURLOPT_NOBODY ,1);
			}
			if ($follow_redirects==true) {
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
			}
			if ($debug==true) {
				$result['contents']=curl_exec($ch);
				$result['info']=curl_getinfo($ch);
			}
			else $result=curl_exec($ch);
			curl_close($ch);
			return $result;
		}

		public function crearAlerta($idItem, $valorItem, $idEstado = 1)
		{
			$date = date("Y-m-d h:i:s");
			$this->db->insert('alerta', array('idItem' => $idItem, 'valorAlerta' => $valorItem,'fecha'=>$date,'idEstado'=>$idEstado));
			$afftectedRows = $this->db->affected_rows();

            if($afftectedRows == 1){
                return true;
            }else{
                return false;
            }
		}

		public function obtenerAlerta($idItem){
			$this->db->where('idItem', $idItem);
			$this->db->where('idEstado', 1);
			$query = $this->db->get('alerta');
			if($query->num_rows()>0) return $query->row_array(); 
			else return false;
		}

		public function modificarAlerta($idAlerta, $valorItem)
		{
			$fechaActual=date("Y-m-d h:i:s");
			$this->db->where('idAlerta', $idAlerta);
			$query = $this->db->update('alerta', array('valorAlerta'=>$valorItem, 'fecha'=>$fechaActual));
		}
    }
?>