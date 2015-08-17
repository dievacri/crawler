<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comparador_controller extends CI_Controller {
	public  function __construct(){
        parent::__construct();
    }

    public function compararItem($idI = 0,$idP =0, $all = false)
    {
    	
        $idItem = ($idI != 0)?$idI:$_REQUEST['idItem'];
    	
        $idProducto = ($idP != 0)?$idP:$_REQUEST['idProducto'];
        
        $mensaje = '';

    	$this->load->model('item_model');
        $this->load->model('comparador_model');
        $this->load->helper('text');

    	$item = $this->item_model->getItems($idProducto, $idItem);

        $urlItem = $item['urlItem'];
        $zona = $item['zona'];
        $indice = trim($item['indice']) ;    
        if($indice == "" || $indice == NULL) {
            $indice = 0 ;
        } 

        $itemContent = $this->comparador_model->url_get_contents($urlItem);
        $itemContent = ascii_to_entities($itemContent);

        include_once "./simple_html_dom.php";  

        $file_headers = @get_headers($urlItem);
        $error_ht = FALSE ;
        $http_errors = array( 'HTTP/1.1 3', 'HTTP/1.1 4',  'HTTP/1.1 5') ;
        foreach ($http_errors as $h_error) {
            $pos = strpos($file_headers[0], $h_error);  
            if (!($pos ===  FALSE)) {
                $error_ht = TRUE ;
                break ; 
            }
        }
        
        if  ($error_ht) {
            $res = $this->comparador_model->crearAlerta($idItem, $file_headers[0], 4);
            if($res === false){
                echo json_encode(array("respuesta"=>"failed","mensaje" => "No se pudo crear la alerta"));
                exit;
            }
            $mensaje = $file_headers[0] ;
        }else{
            $html = file_get_html($urlItem);
        
            $pdf = strpos($urlItem, ".pdf");
            
            if($pdf !== FALSE){
                $curl = curl_init($urlItem);
                curl_setopt($curl, CURLOPT_NOBODY, true);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_FILETIME, true);
                $result = curl_exec($curl);
                
                if ($result === false) {
                    die (curl_error($curl)); 
                }
                date_default_timezone_set('America/Lima');
                $timestamp = curl_getinfo($curl, CURLINFO_FILETIME);
                if ($timestamp != -1) { 
                    $zonaItem = date("Y-m-d", $timestamp); 
                } 

                $mensaje = "es pdf<br>Ultima modificacion: ".$zonaItem;
            }else{
                $zonaItem = utf8_encode($html->find($zona, $indice)) ;
            }

            if($item){
                if($item['valorItem'] == "" || $item['valorItem'] == NULL){
                    $mensaje = "No existen regisros primer ingreso del item";
                    date_default_timezone_set('America/Lima');

                    $data = array("valorItem" => $zonaItem,"ultimaModificacion"=>date("Y-m-d h:i:s"));
                    $res = $this->item_model->modificarItem($idItem,$data);
                    if($res === FALSE){
                        echo json_encode(array("respuesta"=>"failed","mensaje" => "No se pudo actualizar el item"));
                        exit;
                    }
                }else if($item['valorItem'] == $zonaItem){
                    $mensaje = "No presenta Cambios";
                }else if ($zonaItem != $item['valorItem']) {
                    $mensaje = "Cambio de contenido";
                    $alerta = $this->comparador_model->obtenerAlerta($idItem); 
                    if($alerta){
                        $idAlerta = $alerta['idAlerta'];
                        $res = $this->comparador_model->modificarAlerta($idAlerta, $zonaItem);
                        if ($res === FALSE) {
                            echo json_encode(array("respuesta"=>"failed","mensaje" => "No se pudo actualizar la alerta"));
                            exit;                                
                        }
                    }else{
                        $res = $this->comparador_model->crearAlerta($idItem,$zonaItem);
                        if($res === false){
                            echo json_encode(array("respuesta"=>"failed","mensaje" => "No se pudo crear el item"));
                            exit;
                        }
                    }
                }
            }else{
                $mensaje = "No hubo coincidencias";
            }            
        }
        
        if($all === false){
            echo json_encode(array("respuesta"=>"success","mensaje"=>$mensaje));
        }else{
            return $mensaje;
        }
    }

    public function compararTodos()
    {
        $this->load->model('item_model');
        $idCategoria = $_REQUEST['idCategoria'];

        $items = $this->item_model->getItemsCategoria($idCategoria);

        $result = array();
        $cont = 0;
        foreach ($items as $item) {
            $result[] = array('idResult' => $cont, 'mensaje' => $this->compararItem($item['idItem'],$item['idProducto'],true));
            $cont ++;
        }

        echo json_encode(array("respuesta"=>"success","mensaje"=>$result));
    }
}
?>    