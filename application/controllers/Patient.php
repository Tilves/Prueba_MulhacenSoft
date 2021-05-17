<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model(array('patient_model', 'api_model'));
	}

    //Función encargada de mostrar el listado de pacientes. (Actua como index en la API)
	public function index()
	{
        if($this->session->is_logued_in == TRUE){
            
            $patients = $this->patient_model->listPatients();

            if($patients == TRUE)
            {
                $this->load->view('resources/header.php');
                $this->load->view('patient/patientList.php', array('patients' => $patients));
                $this->load->view('resources/footer.php');

            }else{
                $patients = array();

                $this->load->view('resources/header.php');
                $this->load->view('patient/patientList.php', array('patients' => $patients));
                $this->load->view('resources/footer.php');
            }

        }else{
            redirect(base_url());
        }
	}

    //Función encargada de mostrar la vista de registro de paciente.
    public function viewInsert()
	{
        if($this->session->is_logued_in == TRUE){
            $this->load->view('resources/header.php');
            $this->load->view('patient/addPatient.php');
            $this->load->view('resources/footer.php');
        }else{
            redirect(base_url());
        }
	}

    //Función encargada de mostrar la vista de edición de paciente.
    //Se usa la misma vista para registrar y editar paciente (Para evitar tener dos vistas iguales).
    public function viewEdit($id)
    {
        if($this->session->is_logued_in == TRUE){
            $selectPatient = $this->patient_model->selectPatient($id);

            if($selectPatient){
                $this->load->view('resources/header.php');
                $this->load->view('patient/addPatient.php', array('data' => $selectPatient));
                $this->load->view('resources/footer.php');
            }else{
                $this->session->set_flashdata('error', $this->lang->line('error_view_edit'));
                redirect(base_url()."patient/index");
            }
        }else{
            redirect(base_url());
        }
    }

    //Función encargada de registrar un paciente.
    public function insert()
	{
        if($this->session->is_logued_in == TRUE){

            $nombre = $this->input->post('nombre');
            $dni = strtoupper($this->input->post('dni')); //Guardamos la letra del DNI siempre en mayusculas para evitar que lo dupliquen
            $fecha_nacimiento = $this->input->post('fecha_nacimiento');
            $direccion = $this->input->post('direccion');
            $email = $this->input->post('email');


            $this->form_validation->set_rules('nombre', 'nombre', 'required');
            $this->form_validation->set_rules('dni', 'dni', 'required'); //Unique
            $this->form_validation->set_rules('fecha_nacimiento', 'fecha_nacimiento', 'required');
            $this->form_validation->set_rules('direccion', 'direccion', 'required');
            $this->form_validation->set_rules('email', 'email', 'required');


            //Verifica que el formulario esté validado.
            if ($this->form_validation->run() == TRUE){
            
                //Comprobamos si el DNI es correcto
                $letra = substr($dni, -1);
                $numeros = substr($dni, 0, -1);
                if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) == $letra && strlen($letra) == 1 && strlen ($numeros) == 8){
                    
                    //Comprobamos que el DNI no esté ya registrado en la API (Debe de ser único)
                    $comprobarDni = $this->patient_model->comprobarDNI($dni);
                    if($comprobarDni){
                        $this->session->set_flashdata('error', $this->lang->line('pacient_exist'));
                        redirect(base_url()."patient/viewInsert");
                    }
                }else{
                    $this->session->set_flashdata('error', $this->lang->line('incorrect_dni'));
                    redirect(base_url()."patient/viewInsert");
                }

                $data = array(		
                    "nombre" => $nombre,
                    "dni" => $dni,
                    "fecha_nacimiento" => $fecha_nacimiento,
                    "direccion" => $direccion,
                    "email" => $email,

                );

                $insertPatient = $this->patient_model->insertPatient($data);
                
                if($insertPatient == TRUE)
                {
                    //Insertamos acción realizada en la API en el histórico
                    $accion = "Paciente dado de alta correctamente con DNI: ".$dni;

                    $dataAction = array(				
						"accion" => $accion,
						"tipo" => 1
					);
                    $insertAction = $this->api_model->insertAction($dataAction);

                    $this->session->set_flashdata('success', $this->lang->line('insert_pacient_successfully'));
                    redirect(base_url()."patient/viewInsert");
                }else{
                    $this->session->set_flashdata('error', $this->lang->line('error_insert_pacient'));
                    redirect(base_url()."patient/viewInsert");
                }
            }else{
                    $this->session->set_flashdata('error', $this->lang->line('incorrect_data'));
                    redirect(base_url()."patient/viewInsert");
            }
        }else{
            redirect(base_url());
        }
	}

    //Función encargada de modificar un paciente.
    public function edit($id)
    {
        if($this->session->is_logued_in == TRUE){

            $nombre = $this->input->post('nombre');
            $dni = strtoupper($this->input->post('dni')); //Guardamos la letra del DNI siempre en mayusculas para evitar que lo dupliquen
            $fecha_nacimiento = $this->input->post('fecha_nacimiento');
            $direccion = $this->input->post('direccion');
            $email = $this->input->post('email');

        
            //Comprobamos si el DNI es correcto
            $letra = substr($dni, -1);
            $numeros = substr($dni, 0, -1);
            if ( substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) == $letra && strlen($letra) == 1 && strlen ($numeros) == 8 ){
                
            }else{
                $this->session->set_flashdata('error', $this->lang->line('incorrect_dni'));
                redirect(base_url()."patient/viewEdit/".$id);
            }

            $data = array(		
                "nombre" => $nombre,
                "dni" => $dni,
                "fecha_nacimiento" => $fecha_nacimiento,
                "direccion" => $direccion,
                "email" => $email,

            );

            $editPatient = $this->patient_model->updatePatient($data, $id);
            
            if($editPatient == TRUE)
            {
                //Insertamos acción realizada en la API en el histórico
                $accion = "Paciente editado correctamente con DNI: ".$dni;

                $dataAction = array(				
                    "accion" => $accion,
                    "tipo" => 1
                );
                $insertAction = $this->api_model->insertAction($dataAction);

                $this->session->set_flashdata('success', $this->lang->line('edit_pacient_successfully'));
                redirect(base_url()."patient/viewEdit/".$id);
            }else{
                $this->session->set_flashdata('error', $this->lang->line('error_edit_pacient'));
                redirect(base_url()."patient/viewEdit/".$id);
            }
        }else{
                $this->session->set_flashdata('error', $this->lang->line('incorrect_data'));
                redirect(base_url()."patient/viewEdit/".$id);
        }
    }

    //Función encargada de mostrar el detalle de un paciente.
    public function details($dni)
	{
        if($this->session->is_logued_in == TRUE){

            $data = $this->patient_model->patientDetails($dni);

            if($data == TRUE)
            {
                //Insertamos acción realizada en la API en el histórico
                $accion = "Se ha inspeccionado la ficha del paciente con DNI: ".$dni;

                $dataAction = array(				
                    "accion" => $accion,
                    "tipo" => 1
                );
                $insertAction = $this->api_model->insertAction($dataAction);

                $this->load->view('resources/header.php');
                $this->load->view('patient/viewDetails.php', array('data' => $data));
                $this->load->view('resources/footer.php');
            }else{
                $this->session->set_flashdata('error', $this->lang->line('error_view_details_pacient'));
                redirect(base_url()."patient/index");
            }
        }else{
            redirect(base_url());
        }
	}

    //Función encargada de eliminar a un paciente
	public function deletePatient($dni)
	{
        if($this->session->is_logued_in == TRUE){

            $deletePatient = $this->patient_model->deletePatient($dni);

            if($deletePatient == TRUE)
            {
                //Insertamos acción realizada en la API en el histórico
                $accion = "Se ha eliminado el paciente con DNI: ".$dni;

                $dataAction = array(				
                    "accion" => $accion,
                    "tipo" => 1
                );
                $insertAction = $this->api_model->insertAction($dataAction);

                $this->session->set_flashdata('success', $this->lang->line('delete_pacient_successfully'));
                redirect(base_url()."patient/index");
            }else{
                $this->session->set_flashdata('error', $this->lang->line('error_delete_pacient'));
                redirect(base_url()."patient/index");
            }
        }else{
            redirect(base_url());
        }

	}

}
