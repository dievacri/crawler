<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alerta_controller extends CI_Controller {
	
	public  function __construct(){
        parent::__construct();
    }

    public function index()
    {
    	$this->load->library('session');
        date_default_timezone_set('America/Lima');
    	$fechaDesde = (isset($_REQUEST['fechaDesde']))?date("Y-m-d",strtotime($_REQUEST['fechaDesde'])):NULL;
    	$fechaHasta = (isset($_REQUEST['fechaHasta']))?date("Y-m-d",strtotime($_REQUEST['fechaHasta'])):NULL;
    	$categoria = (isset($_REQUEST['categoria']))?$_REQUEST['categoria']:NULL;
    	$estado = (isset($_REQUEST['estado']))?$_REQUEST['estado']:NULL;
    	$ordenar = (isset($_REQUEST['ordenar']))?$_REQUEST['ordenar']:NULL;
    	$pais = $this->session->pais;

    	$this->load->model('alerta_model');
    	/*var_dump($fechaDesde);
    	var_dump($fechaHasta);
    	var_dump($categoria);
    	var_dump($estado);
    	var_dump($ordenar);
    	var_dump($pais);*/

    	$result = $this->alerta_model->getAlertas($fechaDesde,$fechaHasta,$categoria,$estado,$ordenar,$pais);

    	if($result){
    		echo json_encode(array("respuesta" => "success", "mensaje" => $result));    		
    	}else{
    		echo json_encode(array("respuesta" => "failed", "mensaje" => "Ese estado no presenta alertas"));    		
    	}
    }

    public function getEstados()
    {
    	$this->load->model('alerta_model');
    	$estados = $this->alerta_model->getEstados();
    	if($estados){
    		echo json_encode(array("respuesta" => "success", "mensaje" => $estados));
    	}else{
    		echo json_encode(array("respuesta" => "failed", "mensaje" => "No hay estados registrados"));
    	}
    }

    public function aceptarAlerta()
    {
    	$request_method = $_SERVER['REQUEST_METHOD'];

        switch($request_method)
        {
          CASE 'PUT':
            parse_str(file_get_contents('php://input'), $_PUT);

          CASE 'DELETE':
            parse_str(file_get_contents('php://input'), $_DELETE);
        }

        $idAlerta = $_PUT['idAlerta'];

        if ($idAlerta) {
        	$this->load->model('alerta_model');
        	$result = $this->alerta_model->aceptarAlerta($idAlerta);
        	if ($result) {
        		echo json_encode(array("respuesta"=>"success"));
        	}else{
        		echo json_encode(array("respuesta" => "failed", "mensaje" => "No se pudo aceptar la alerta"));
        	}
        }else{
        	echo json_encode(array("respuesta" => "failed", "mensaje" => "No se envio ningun dato"));
        }
    }

    public function rechazarAlerta()
    {
    	$request_method = $_SERVER['REQUEST_METHOD'];

        switch($request_method)
        {
          CASE 'PUT':
            parse_str(file_get_contents('php://input'), $_PUT);

          CASE 'DELETE':
            parse_str(file_get_contents('php://input'), $_DELETE);
        }

        $idAlerta = $_PUT['idAlerta'];

        if ($idAlerta) {
        	$this->load->model('alerta_model');
        	$result = $this->alerta_model->rechazarAlerta($idAlerta);
        	if ($result) {
        		echo json_encode(array("respuesta"=>"success"));
        	}else{
        		echo json_encode(array("respuesta" => "failed", "mensaje" => "No se pudo rechazar la Alerta"));
        	}
        }else{
        	echo json_encode(array("respuesta" => "failed", "mensaje" => "No se envio ningun dato"));
        }
    }

    public function getAlerta()
    {
    	$idAlerta = $_REQUEST['idAlerta'];
    	if($idAlerta){
    		$this->load->model('alerta_model');
    		$result = $this->alerta_model->getAlerta($idAlerta);
    		if($result){
    			echo json_encode(array("respuesta"=>"success","mensaje"=>$result));
    		}else{
    			echo json_encode(array("respuesta"=>"failed","mensaje"=>"No se encontro datos de la Alerta"));
    		}
    	}else{
    		echo json_encode(array("respuesta"=>"failed","mensaje"=>"no se envio dato"));
    	}
    }
}    