<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model(array('user_model'));
	}

	public function index()
	{
		$this->load->view('index.php');
	}
    

    public function login(){

        $email = $this->input->post('email');
        $password = $this->input->post('password');

        //Comprobamos que hayan rellenado todos los campos obligatorios
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        //Verifica que el formulario esté validado.
        if ($this->form_validation->run() == TRUE){
        
            //Encriptamos contraseña para comparar con la de base de datos
            $salt = md5($password);
            $password_encrypt= crypt($email, $salt);
            
            $check_user = $this->user_model->checkLogin($email, $password_encrypt);
            
            if($check_user == TRUE)
            {
                //Creamos sesion de usuario
                $data = array(
                    'is_logued_in'      =>  TRUE,
                    'idusuario'         =>  $check_user->id,
                    'nombre'            =>  $check_user->nombre,
                    'email'             =>  $check_user->email,
                );
            
                $this->session->set_userdata($data);

                redirect(base_url()."patient/index");
            }else{
                $this->session->set_flashdata('error', $this->lang->line('incorrect_data'));
                redirect(base_url());
            }
        }else{
            $this->session->set_flashdata('error', $this->lang->line('login_error'));
            redirect(base_url());
        }
    }

    public function logout(){
        session_destroy();
        redirect(base_url());
    }


}
