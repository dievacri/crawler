<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comparador_controller extends CI_Controller {
	public  function __construct(){
        parent::__construct();
    }

    public function compararItem(){
    	$idItem = $_REQUEST['idItem'];
    	$idProducto = $_REQUEST['idProducto'];
    	$this->load->model('item_model');
    	$item = $this->item_model->getItems($idProducto, $idItem);
    	print_r($item);
    }
}
?>    