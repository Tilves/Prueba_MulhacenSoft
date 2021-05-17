<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class patient_model extends CI_Model {

	private $bss = false;

	function __construct()
	{
		parent::__construct();
		$this->bss = $this->load->database();
	}
    
    function insertPatient($data){
        if($this->db->insert('pacientes', $data)){
			return TRUE;
		}else{
			return FALSE;
		}
    }

	function updatePatient($data, $id){
		$this->db->where('id', $id);
		if($this->db->update('pacientes', $data)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

    function listPatients(){
		$this->db->select('id, nombre, dni');
		$this->db->from('pacientes');
		$query = $this->db->get();

		return $query->result_array();
	}

    function patientDetails($dni){

		$this->db->select('*');
		$this->db->where('dni', $dni);
		$this->db->from('pacientes');
		$query = $this->db->get();

		return $query->result_array();
	}

    function deletePatient($dni){
		$this->db->where('dni', $dni);
		if($this->db->delete('pacientes') && $this->db->affected_rows() > 0){
            return TRUE;
		}else{
			return FALSE;
		}
	}

	function selectPatient($id){
		$this->db->select('*');
		$this->db->where('id', $id);
		$this->db->from('pacientes');
		$query = $this->db->get();

		return $query->result_array();
	}

	function comprobarDNI($dni){
		$this->db->select('id');
		$this->db->where('dni', $dni);
		$this->db->from('pacientes');
		$query = $this->db->get();

		return $query->result();
	}
	
}