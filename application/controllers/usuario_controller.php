<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_controller extends CI_Controller {
	
	public  function __construct(){
        parent::__construct();
        $this->load->library('session');
    }

    public function index(){
        $this->load->model('usuario_model');
        $result = $this->usuario_model->getUsers();
        if($result){
            echo json_encode(array('respuesta' => "success", 'mensaje' => $result));
        }else{
            echo json_encode(array('respuesta' => "failed", 'mensaje' => 'No hay usuarios registrados'));
        }
    }

    public function loginUser(){     	
        $this->load->library('form_validation');
        if($_REQUEST["user"] && $_REQUEST["password"])
        {
            $this->form_validation->set_rules('password', 'password', 'required');
            $this->form_validation->set_rules('user', 'user', 'required');
            if($this->form_validation->run() == false){
                echo json_encode(array("respuesta" => "no cumple validaciones"));
            }else{
                $this->load->model("usuario_model");
                $user = $this->input->get_post("user");
                $password = $this->input->get_post("password");
                $loginUser = $this->usuario_model->loginUser($user,$password);
                if($loginUser){
                	$newdata = array(
					        'username'  => $user,
                            'pais' => $loginUser['idPais'],
					        'logged_in' => TRUE
					);

					$this->session->set_userdata($newdata);
                    echo json_encode(array("respuesta" => "success","pais"=>$loginUser['idPais']));
                }else{
                    echo json_encode(array("respuesta" => "Email no registrado y/o Contraseña incorrecta"));
                }
            }
        }else{
            echo json_encode(array("respuesta" => "error en la datos"));
        }
    }

    public function cambiarPais(){
        $request_method = $_SERVER['REQUEST_METHOD'];

        switch($request_method)
        {
          CASE 'PUT':
            parse_str(file_get_contents('php://input'), $_PUT);

          CASE 'DELETE':
            parse_str(file_get_contents('php://input'), $_DELETE);
        }

        $idPais = $_PUT['idPais'];
        $this->session->set_userdata('pais', $idPais);
        echo json_encode(array("respuesta" => "success"));
    }

    public function registrarUsuario(){
        $nombreUsuario = $_REQUEST['nombreUsuario'];
        $apellidoUsuario = $_REQUEST['apellidoUsuario'];
        $emailUsuario = $_REQUEST['emailUsuario'];
        $passwordUsuario = $_REQUEST['passwordUsuario'];
        $pais = $_REQUEST['pais'];

        $this->load->model('usuario_model');
        $existUser = $this->usuario_model->loginUser($emailUsuario,$passwordUsuario);

        if($existUser){
           echo json_encode(array("respuesta"=>"failed","mensaje"=>"Ya existe un usuario con este correo")); 
        }else{
            $result = $this->usuario_model->registrarUsuario($nombreUsuario, $apellidoUsuario, $emailUsuario, $passwordUsuario, $pais);
            if($result){
                echo json_encode(array("respuesta"=>"success"));
            }else{
                echo json_encode(array("respuesta"=>"failed", "mensaje"=>"No se pudo registrar al usuario"));
            }
        }
    }

    public function eliminarUsuario(){
        $request_method = $_SERVER['REQUEST_METHOD'];

        switch($request_method)
        {
          CASE 'PUT':
            parse_str(file_get_contents('php://input'), $_PUT);

          CASE 'DELETE':
            parse_str(file_get_contents('php://input'), $_DELETE);
        }

        $idUsuario = $_DELETE['idUsuario'];
        if($idUsuario){
            $this->load->model('usuario_model');
            $result = $this->usuario_model->eliminarUsuario($idUsuario);
            if($result){
                echo json_encode(array("respuesta"=>"success"));
            }else{
                echo json_encode(array("respuesta"=>"failed", "mensaje"=>"No se pudo eliminar el usuario"));
            }
        }else{
            echo json_encode(array("respuesta"=>"failed", "mensaje"=>"No se pudo elimino el usuario"));
        }
    }

    public function modificarUsuario(){
        $request_method = $_SERVER['REQUEST_METHOD'];

        switch($request_method)
        {
          CASE 'PUT':
            parse_str(file_get_contents('php://input'), $_PUT);

          CASE 'DELETE':
            parse_str(file_get_contents('php://input'), $_DELETE);
        }

        $nombreUsuario = $_PUT['nombreUsuario'];
        $apellidoUsuario = $_PUT['apellidoUsuario'];
        $mailUsuario = $_PUT['mailUsuario'];
        $idPais = $_PUT['idPais'];
        $idUsuario = $_PUT['idUsuario'];

        if($idUsuario){
            $this->load->model('usuario_model');
            $result = $this->usuario_model->modificarUsuario($nombreUsuario, $apellidoUsuario, $idPais, $idUsuario);
            if($result){
                echo json_encode(array("respuesta"=>"success"));
            }else{
                echo json_encode(array("respuesta"=>"failed", "mensaje"=>"No se ha modificado ningun campo"));
            }
        }else{
            echo json_encode(array("respuesta"=>"failed", "mensaje"=>"No se pudo modificar el usuario"));
        }
    }
}
