<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class api_model extends CI_Model {

	private $bss = false;

	function __construct()
	{
		parent::__construct();

			$this->bss = $this->load->database();

	}
    
	//Función encargada de insertar en el histórico la acción realizada en la API. Se guarda la accion realizada y el tipo
	//(0 significa que se ha realizada alguna acción referente a Paciente y 1 referente a Diagnóstico).
	function insertAction($data){
        if($this->db->insert('historico', $data)){
			return TRUE;
		}else{
			return FALSE;
		}
	}
    
}