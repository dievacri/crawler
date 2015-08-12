<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compania_controller extends CI_Controller {
	public  function __construct(){
        parent::__construct();
        $this->load->library('session');
    }

    public function index(){
    	$idPais = $this->session->pais;
    	$this->load->model('compania_model');
    	$companies = $this->compania_model->getCompanies($idPais);

    	if(empty($companies)){
    		echo json_encode(array("respuesta" => 'failed',"mensaje" => 'No hay compañias registradas en este pais'));
    	}else{
    		echo json_encode(array("respuesta"=>'success','mensaje' => $companies));
    	}
    }

    public function registrarCompania(){
		$idCompania = $_REQUEST["idCompania"];
    	$name = $_REQUEST["name"];
    	$idPais = $_REQUEST["idPais"];
        if($name){
            $this->load->model("compania_model");
            $result = $this->compania_model->registrarCompania($idCompania,$idPais,$name);
            if($result){                
                echo json_encode(array("respuesta" => 'success'));
            }else{
                echo json_encode(array("respuesta"=>'failed',"mensaje"=>'No se registro la Compañia'));    
            }
        }else{
            echo json_encode(array("respuesta"=>'failed',"mensaje"=>'No se envio ningun nombre o ID'));
        }
    }

    public function eliminarCompania(){
    	$request_method = $_SERVER['REQUEST_METHOD'];

        switch($request_method)
        {
          CASE 'PUT':
            parse_str(file_get_contents('php://input'), $_PUT);

          CASE 'DELETE':
            parse_str(file_get_contents('php://input'), $_DELETE);
        }

		$idCompania = $_DELETE["idCompania"];

        if($idCompania){
            $this->load->model("compania_model");
            $result = $this->compania_model->eliminarCompania($idCompania);
            if($result){                
                echo json_encode(array("respuesta" => 'success'));
            }else{
                echo json_encode(array("respuesta"=>'failed',"mensaje"=>'No se elimino la Compañia'));    
            }
        }else{
            echo json_encode(array("respuesta"=>'failed',"mensaje"=>'No se envio ningun dato'));
        }
    }

    public function modificarCompania(){
	  	$request_method = $_SERVER['REQUEST_METHOD'];

        switch($request_method)
        {
          CASE 'PUT':
            parse_str(file_get_contents('php://input'), $_PUT);

          CASE 'DELETE':
            parse_str(file_get_contents('php://input'), $_DELETE);
        }

        $idCompany = $_PUT["idCompany"];
        $idCompanyOld = $_PUT["idCompanyOld"];
        $nombreCompany = $_PUT["nombreCompany"];
    	$idPais = $this->session->pais;
        $this->load->model("compania_model");
        $company = $this->compania_model->getCompanies($idPais,$idCompanyOld);

        if($idPais){
            $result = $this->compania_model->modificarCompania($company['id'],$idCompany,$nombreCompany);
            if($result){                
                echo json_encode(array("respuesta" => 'success'));
            }else{
                echo json_encode(array("respuesta"=>'failed',"mensaje"=>'No se ha modificado ningun campo de la compañia'));    
            }
        }else{
            echo json_encode(array("respuesta"=>'failed',"mensaje"=>'No se envio ningun nombre'));
        }
    } 
}
?>