<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_model extends CI_Model {

	private $bss = false;

	function __construct()
	{
		parent::__construct();

			$this->bss = $this->load->database();

	}
    
    function checkLogin($email, $password){
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        
        $query = $this->db->get('usuarios');
        
        if($query->num_rows() == 1)
        {
            return $query->row();
        
        }else{
            return FALSE;
        }
    }

    
}