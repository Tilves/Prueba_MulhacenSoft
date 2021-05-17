<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class diagnostic_model extends CI_Model {

	private $bss = false;

	function __construct()
	{
		parent::__construct();

			$this->bss = $this->load->database();

	}

	function listDiagnostic($id_paciente){

		$this->db->select('id, descripcion, fecha_diagnostico');
		$this->db->where('id_paciente', $id_paciente);
		$this->db->from('diagnosticos');
		$query = $this->db->get();

		return $query->result_array();
	}
    
    function insertDiagnostic($data){

        if($this->db->insert('diagnosticos', $data)){
			return TRUE;
		}else{
			return FALSE;
		}
    }
    
}