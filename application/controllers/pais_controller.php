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
}
?>