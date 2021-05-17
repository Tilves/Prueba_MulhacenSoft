<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diagnostic extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model(array('diagnostic_model', 'api_model'));
	}

    //Función encargada de mostrar el listado de diagnósticos asignados al paciente
	public function listDiagnostic($id_paciente)
	{
        if($this->session->is_logued_in == TRUE){

            $diagnostics = $this->diagnostic_model->listDiagnostic($id_paciente);

            if($diagnostics == TRUE)
            {

                //Insertamos acción realizada en la API en el histórico
                $accion = "Se ha visitado el listado de diagnósticos del paciente con identificador: ".$id_paciente;

                $dataAction = array(				
                    "accion" => $accion,
                    "tipo" => 2
                );
                $insertAction = $this->api_model->insertAction($dataAction);

                $this->load->view('resources/header.php');
                $this->load->view('diagnostic/listDiagnostic.php', array('diagnostics' => $diagnostics));
                $this->load->view('resources/footer.php');

            }else{
                $this->session->set_flashdata('error', $this->lang->line('diagnostic_empty'));
                redirect(base_url()."patient/index");
            }

        }else{
            redirect(base_url());
        }
	}

    //Función encargada de mostrar la vista de registro de diagnóstico.
    public function viewInsert($id)
	{
        if($this->session->is_logued_in == TRUE){
            $this->load->view('resources/header.php');
            $this->load->view('diagnostic/addDiagnostic.php', array('idPatient' => $id));
            $this->load->view('resources/footer.php');
        }else{
            redirect(base_url());
        }
	}

    //Función encargada de dar de alta un diagnóstico.
    public function insert()
    {
        if($this->session->is_logued_in == TRUE){

            $id_paciente = $this->input->post('id_paciente');
            $descripcion = $this->input->post('descripcion');
            $this->form_validation->set_rules('descripcion', 'descripcion', 'required');


            //Verifica que el formulario esté validado.
            if ($this->form_validation->run() == TRUE){

                $data = array(	
                    "id_paciente" => $id_paciente,
                    "descripcion" => $descripcion,
                );

                $insertDiagnostic = $this->diagnostic_model->insertDiagnostic($data);
                
                if($insertDiagnostic == TRUE)
                {
                    //Insertamos acción realizada en la API en el histórico
                    $accion = "Diagnóstico asignado al paciente con identificador: ".$id_paciente;

                    $dataAction = array(				
                        "accion" => $accion,
                        "tipo" => 2
                    );
                    $insertAction = $this->api_model->insertAction($dataAction);

                    $this->session->set_flashdata('success', $this->lang->line('assigned_diagnostic'));
                    redirect(base_url()."diagnostic/viewInsert/".$id_paciente);

                }else{
                    $this->session->set_flashdata('error', $this->lang->line('diagnostic_error'));
                    redirect(base_url()."diagnostic/viewInsert/".$id_paciente);
                }

            }else{
                    $this->session->set_flashdata('error', $this->lang->line('incorrect_data'));
                    redirect(base_url()."diagnostic/viewInsert/".$id_paciente);
            }

        }else{
            redirect(base_url());
        }
    }



}
