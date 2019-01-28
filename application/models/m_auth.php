<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_auth extends CI_Model {

	// public $variable;

	public function getlogin($username, $password)
	{
		$this->db->select('*');
		$this->db->from('tms_agent');
		$this->db->where('id', $username);
		$this->db->where('password', $password);
		$data = $this->db->get();
		// echo $this->db->last_query();exit();
		return $data->row(); 
	}

}

/* End of file m_auth.php */
/* Location: ./application/models/m_auth.php */