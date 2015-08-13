<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto_controller extends CI_Controller {
	public  function __construct(){
        parent::__construct();
        $this->load->library('session');
    }

    public function index(){
    	$idCategoria = $_REQUEST['idCategoria'];
    	if($idCategoria){
    		$this->load->model("producto_model");
    		$result = $this->producto_model->getProducts($idCategoria);
    		if(!empty($result)){
    			echo json_encode(array("respuesta"=>"success","mensaje"=>$result));
    		}else{
    			echo json_encode(array("respuesta"=>"failed","mensaje"=>"No se ha registrado ningun producto en esta categoria"));
			}
    	}else{
    		echo json_encode(array("respuesta"=>"failed","mensaje"=>"No se ha seleccionado ninguna Categoria"));
    	}
    }

    public function registrarProducto(){
    	$producto = $_REQUEST;
    	if($producto['idProducto']){
    		$this->load->model("producto_model");
    		$result = $this->producto_model->registrarProducto($producto);
    		if($result){
    			echo json_encode(array("respuesta"=>"success"));
    		}else{
    			echo json_encode(array("respuesta"=>"failed","mensaje"=>"No se pudo registrar el producto"));
    		}
    	}else{
    		echo json_encode(array("respuesta"=>"failed","mensaje"=>"No se ha enviado ningun Dato"));
    	}
    }

    public function eliminarProducto(){
    	$request_method = $_SERVER['REQUEST_METHOD'];

        switch($request_method)
        {
          CASE 'PUT':
            parse_str(file_get_contents('php://input'), $_PUT);

          CASE 'DELETE':
            parse_str(file_get_contents('php://input'), $_DELETE);
        }

		$idProducto = $_DELETE["idProducto"];

		if($idProducto){
			$this->load->model("producto_model");
			$result = $this->producto_model->eliminarProducto($idProducto);
			if($result){
				echo json_encode(array("respuesta"=>"success"));
			}else{
				echo json_encode(array("respuesta"=>"failed","mensaje"=>"No se pudo eliminar el producto"));
			}
		}else{
			echo json_encode(array("respuesta"=>"failed","mensaje"=>"No se ha enviado ningun Dato"));
		}
    }

    public function modificarProducto(){
    	$request_method = $_SERVER['REQUEST_METHOD'];

        switch($request_method)
        {
          CASE 'PUT':
            parse_str(file_get_contents('php://input'), $_PUT);

          CASE 'DELETE':
            parse_str(file_get_contents('php://input'), $_DELETE);
        }

        $idProductoOld = $_PUT['idProductoOld'];
        $idProducto = $_PUT['idProducto'];
        $idCategoriaOld = $_PUT['idCategoriaOld'];
        $idCategoria = $_PUT['idCategoria'];
        $idCompania = $_PUT['idCompania'];
        $nombreProducto = $_PUT['nombreProducto'];

		$this->load->model("producto_model");
		$product = $this->producto_model->getProducts($idCategoriaOld,$idProductoOld);

		if($_PUT){
            $result = $this->producto_model->modificarProducto($product['id'],$idProducto,$idCategoria,$idCompania,$nombreProducto);
            if($result){                
                echo json_encode(array("respuesta" => 'success'));
            }else{
                echo json_encode(array("respuesta"=>'failed',"mensaje"=>'No se ha modificado ningun campo del producto'));    
            }
        }else{
            echo json_encode(array("respuesta"=>'failed',"mensaje"=>'No se envio ningun dato'));
        }
    }
}
?>