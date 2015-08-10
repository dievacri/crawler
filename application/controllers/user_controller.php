<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_controller extends CI_Controller {
	
	public  function __construct(){
        parent::__construct();
    }

     public function loginUser(){     	
        $this->load->library('form_validation');
        $this->load->library('session');
        if($_REQUEST["user"] && $_REQUEST["password"])
        {
            $this->form_validation->set_rules('password', 'password', 'required');
            $this->form_validation->set_rules('user', 'user', 'required');
            if($this->form_validation->run() == false){
                echo json_encode(array("respuesta" => "no cumple validaciones"));
            }else{
                $this->load->model("user_model");
                $user = $this->input->get_post("user");
                $password = $this->input->get_post("password");
                $loginUser = $this->user_model->loginUser($user,$password);
                if($loginUser === true){
                	$newdata = array(
					        'username'  => $user,
					        'logged_in' => TRUE
					);

					//$this->session->set_userdata($newdata);
                    echo json_encode(array("respuesta" => "success"));
                }else{
                    echo json_encode(array("respuesta" => "Email no registrado y/o Contraseña incorrecta"));
                }
            }
        }else{
            echo json_encode(array("respuesta" => "error en la datos"));
        }
    }
}
