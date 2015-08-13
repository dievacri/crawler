<?php
	class Usuario_model extends CI_Model{
    
        public function __construct(){
            parent::__construct();
        }

        public function loginUser($user, $password){
        	$this->db->where("mailUsuario", $user);
            $this->db->where("contrasenaUsuario", $password);
            $query = $this->db->get("usuario");
            if($query->num_rows() == 1){
                return $query->row_array();
            }else{
                return false;
            }
        }

        public function getUsers($idUsuario = NULL){
            if(!is_null($idUsuario)){
                $this->db->where('idUsuario',$idUsuario);
            }
            $query = $this->db->get('usuario');

            if(empty($query)){
                return false;
            }else{
                if(!is_null($idUsuario)){
                    return $query->row_array();
                }else{
                    return $query->result_array();                    
                }
            }

        }

        public function registrarUsuario($nombreUsuario, $apellidoUsuario, $emailUsuario, $passwordUsuario, $pais){
            $data = array(
                "nombreUsuario" => $nombreUsuario,
                "apellidoUsuario" => $apellidoUsuario,
                "mailUsuario" => $emailUsuario,
                "contrasenaUsuario" => $passwordUsuario,
                "idPais" => $pais  
            );

            $this->db->insert('usuario', $data);
            $afftectedRows = $this->db->affected_rows();

            if($afftectedRows == 1){
                return true;
            }else{
                return false;
            }
        }

        public function eliminarUsuario($idUsuario){
            $this->db->where('idUsuario',$idUsuario);
            $this->db->delete('usuario');
            $afftectedRows = $this->db->affected_rows();

            if($afftectedRows == 1){
                return true;
            }else{
                return false;
            }
        }

        public function modificarUsuario($nombreUsuario, $apellidoUsuario, $idPais, $idUsuario){
            $data = array(
                'nombreUsuario' => $nombreUsuario,
                'apellidoUsuario' => $apellidoUsuario,
                'idPais' => $idPais
            );

            $this->db->where('idUsuario', $idUsuario);
            $this->db->update('usuario', $data);
            $afftectedRows = $this->db->affected_rows();

            if($afftectedRows == 1){
                return true;
            }else{
                return false;
            }
        }
    }
?>