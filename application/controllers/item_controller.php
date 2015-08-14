<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_controller extends CI_Controller {
	public  function __construct(){
        parent::__construct();
    }

    public function index(){

    	$idProducto = $_REQUEST['idProducto'];

        if(isset($_REQUEST['idCategoria'])){
            $idCategoria = $_REQUEST['idCategoria'];
        }

    	if($idProducto){
    		$this->load->model('item_model');
            if(isset($idCategoria)){
                $result = $this->item_model->getItemsCategoria($idCategoria);
            }else{
                $result = $this->item_model->getItems($idProducto);
            }

    		if($result){
    			echo json_encode(array("respuesta"=>"success", "mensaje" => $result));
    		}else{
    			echo json_encode(array("respuesta"=>"failed", "mensaje" => "Este producto no tiene items"));
    		}
    	}else{
    		echo json_encode(array("respuesta"=>"failed", "mensaje" => "No se ha recibido ningun producto"));
    	}
    }

    public function registrarItem()
    {
    	$idProducto = $_REQUEST['idProducto'];
    	$nombreItem = $_REQUEST['nombreItem'];
    	$zona = $_REQUEST['zona'];
    	$urlItem = $_REQUEST['urlItem'];
    	$comentario = $_REQUEST['comentario'];
    	$indice = '';
    	if($idProducto){
    		$this->load->model('item_model');
    		$data = array(
    			"idProducto" 	=> $idProducto,
    			"nombreItem" 	=> $nombreItem,
    			"zona" 			=> $zona,
    			"urlItem" 		=> $urlItem,
    			"comentario"	=> $comentario,
    			"indice"		=> $indice
    		);
    		$result = $this->item_model->registrarItem($data);
    		if($result){
    			echo json_encode(array("respuesta"=>"success"));
			}else{
				echo json_encode(array("respuesta"=>"failed", "mensaje" => "No se registro el Item"));
    		}
    	}else{
    		echo json_encode(array("respuesta"=>"failed", "mensaje" => "No se ha recibido ningun producto"));	
    	}
    }

    public function eliminarItem()
    {
    	$request_method = $_SERVER['REQUEST_METHOD'];

        switch($request_method)
        {
          CASE 'PUT':
            parse_str(file_get_contents('php://input'), $_PUT);

          CASE 'DELETE':
            parse_str(file_get_contents('php://input'), $_DELETE);
        }

        $idItem = $_DELETE['idItem'];
        if($idItem){
        	$this->load->model('item_model');
        	$result = $this->item_model->eliminarItem($idItem);
        	if($result){
        		echo json_encode(array("respuesta"=>"success"));	
        	}else{
        		echo json_encode(array("respuesta"=>"failed", "mensaje" => "No se ha eliminado el Item"));	
        	}
        }else{
        	echo json_encode(array("respuesta"=>"failed", "mensaje" => "No se ha recibido ningun Item"));	
        }
    }

    public function modificarItem(){

    	$request_method = $_SERVER['REQUEST_METHOD'];

        switch($request_method)
        {
          CASE 'PUT':
            parse_str(file_get_contents('php://input'), $_PUT);

          CASE 'DELETE':
            parse_str(file_get_contents('php://input'), $_DELETE);
        }
        $idItem = $_PUT['idItem'];
        $nombreItem = $_PUT['nombreItem'];
        $zona = $_PUT['zona'];
        $urlItem = $_PUT['urlItem'];
        $comentario = $_PUT['comentario'];

        if($idItem){
        	$data = array(
        		"nombreItem" 	=> $nombreItem,
        		"zona" 			=> $zona,
        		"urlItem" 		=> $urlItem,
        		"comentario" 	=> $comentario
        	);
        	$this->load->model('item_model');
        	$result = $this->item_model->modificarItem($idItem,$data);
        	if($result){
        		echo json_encode(array("respuesta"=>"success"));
        	}else{
        		echo json_encode(array("respuesta"=>"failed", "mensaje" => "No se ha cambiado ningun campo del Item"));
        	}
        }else{
    		echo json_encode(array("respuesta"=>"failed", "mensaje" => "No se ha recibido ningun Item"));	
        }
    }

    public function mostrarItem()
    {
    	include_once('simple_html_dom.php') ;
		$zona = $_REQUEST['zona'];
		$urlItem = $_REQUEST['url'];
		$flag = false;	
		$pdf = strpos($urlItem, ".pdf");
		
		if($pdf !== FALSE) {
			echo json_encode(array("respuesta"=>"success","tipo"=>"pdf","contenido"=>"<embed src='".$urlItem."' width='900px' height='1000px'>"));
			$flag = true;
		}
		if($flag === false){
			$html = file_get_html($urlItem);
			$value = utf8_encode($html->find($zona,0)) ;
			echo json_encode(array("respuesta"=>"success","tipo"=>"html","contenido"=>$value));			
		}
    }
}
?>