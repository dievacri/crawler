<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria_controller extends CI_Controller {
	public  function __construct(){
        parent::__construct();
        $this->load->library('session');        
    }

    public function index(){
    	$idPais = $this->session->pais;
    	$this->load->model('categoria_model');
    	$categories = $this->categoria_model->getCategories($idPais);

    	if(empty($categories)){
    		echo json_encode(array("respuesta" => 'failed',"mensaje" => 'No hay categorias registradas en este pais'));
    	}else{
    		echo json_encode(array("respuesta"=>'success','mensaje' => $categories));
    	}
    }

    public function registrarCategoria(){
    	$name = $_REQUEST["name"];
    	$idPais = $_REQUEST["idPais"];
        if($name){
            $this->load->model("categoria_model");
            $result = $this->categoria_model->registrarCategoria($idPais,$name);
            if($result){                
                echo json_encode(array("respuesta" => 'success'));
            }else{
                echo json_encode(array("respuesta"=>'failed',"mensaje"=>'No se registro la Compañia'));    
            }
        }else{
            echo json_encode(array("respuesta"=>'failed',"mensaje"=>'No se envio ningun nombre o ID'));
        }
    }

    public function eliminarCategoria(){
    	$request_method = $_SERVER['REQUEST_METHOD'];

        switch($request_method)
        {
          CASE 'PUT':
            parse_str(file_get_contents('php://input'), $_PUT);

          CASE 'DELETE':
            parse_str(file_get_contents('php://input'), $_DELETE);
        }

		$idCategoria = $_DELETE["idCategoria"];

        if($idCategoria){
            $this->load->model("categoria_model");
            $result = $this->categoria_model->eliminarCategoria($idCategoria);
            if($result){                
                echo json_encode(array("respuesta" => 'success'));
            }else{
                echo json_encode(array("respuesta"=>'failed',"mensaje"=>'No se elimino la Compañia'));    
            }
        }else{
            echo json_encode(array("respuesta"=>'failed',"mensaje"=>'No se envio ningun dato'));
        }
    }

    public function modificarCategoria(){
    	$request_method = $_SERVER['REQUEST_METHOD'];

        switch($request_method)
        {
          CASE 'PUT':
            parse_str(file_get_contents('php://input'), $_PUT);

          CASE 'DELETE':
            parse_str(file_get_contents('php://input'), $_DELETE);
        }

		$idCategory = $_PUT["idCategory"];
		$nameCategory = $_PUT["nameCategory"];

        if($idCategory){
            $this->load->model("categoria_model");
            $result = $this->categoria_model->modificarCategoria($idCategory,$nameCategory);
            if($result){                
                echo json_encode(array("respuesta" => 'success'));
            }else{
                echo json_encode(array("respuesta"=>'failed',"mensaje"=>'No se actualizo la Compañia'));    
            }
        }else{
            echo json_encode(array("respuesta"=>'failed',"mensaje"=>'No se envio ningun dato'));
        }
    }
}