<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pais_controller extends CI_Controller {
	public  function __construct(){
        parent::__construct();
    }

    public function index(){
    	$this->load->model('pais_model');
    	$countries = $this->pais_model->getCountries();

    	if(empty($countries)){
    		echo json_encode(array("respuesta" => 'failed',"mensaje" => 'No hay paises registrados'));
    	}else{
    		echo json_encode(array("respuesta"=>'success','mensaje' => $countries));
    	}
    }

    public function registrarPais(){
        $name = $_REQUEST["name"];
        if($name){
            $this->load->model("pais_model");
            $result = $this->pais_model->registrarPais($name);
            if($result){                
                echo json_encode(array("respuesta" => 'success'));
            }else{
                echo json_encode(array("respuesta"=>'failed',"mensaje"=>'No se registro el Pais'));    
            }
        }else{
            echo json_encode(array("respuesta"=>'failed',"mensaje"=>'No se envio ningun nombre'));
        }
    }

    public function eliminarPais(){
        $request_method = $_SERVER['REQUEST_METHOD'];

        switch($request_method)
        {
          CASE 'PUT':
            parse_str(file_get_contents('php://input'), $_PUT);

          CASE 'DELETE':
            parse_str(file_get_contents('php://input'), $_DELETE);
        }
        $idPais = $_DELETE['idPais'];
        if($idPais){
            $this->load->model("pais_model");
            $result = $this->pais_model->eliminarPais($idPais);
            if($result){                
                echo json_encode(array("respuesta" => 'success'));
            }else{
                echo json_encode(array("respuesta"=>'failed',"mensaje"=>'No se elimino el Pais'));    
            }
        }else{
            echo json_encode(array("respuesta"=>'failed',"mensaje"=>'No se envio ningun id'));
        }
    }

    public function modificarPais(){
        $request_method = $_SERVER['REQUEST_METHOD'];

        switch($request_method)
        {
          CASE 'PUT':
            parse_str(file_get_contents('php://input'), $_PUT);

          CASE 'DELETE':
            parse_str(file_get_contents('php://input'), $_DELETE);
        }

        $idPais = $_PUT["idPais"];
        $nombrePais = $_PUT["nombrePais"];
        if($idPais){
            $this->load->model("pais_model");
            $result = $this->pais_model->modificarPais($idPais,$nombrePais);
            if($result){                
                echo json_encode(array("respuesta" => 'success'));
            }else{
                echo json_encode(array("respuesta"=>'failed',"mensaje"=>'No se registro el Pais'));    
            }
        }else{
            echo json_encode(array("respuesta"=>'failed',"mensaje"=>'No se envio ningun nombre'));
        }
    }
}
?>