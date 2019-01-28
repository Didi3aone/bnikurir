<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_datacust extends CI_Model {

	// public $variable;
	public function getDataCustomer($UserId)
	{
		$data = array();
		// print_r($UserId);exit();
		$this->db->select('a.AssignId as ID, b.DM_FirstName as Name, b.DM_AddressLine1 as HomeAddress, b.DM_OfficeLine1 as OfficeAddress, b.DM_City as City, b.DM_MobilePhoneNum as Phone, b.DM_KurirStatusKode as Status');
		$this->db->from('t_gn_assignment a');
		$this->db->join('t_gn_customer_master b', 'a.AssignCustId = b.DM_Id', 'INNER', true);
		$this->db->where('a.AssignKurirId', $UserId);
		$result = $this->db->get();
		// echo $this->db->last_query();
		return $result->result_array();
	}

	public function showCustomer($id)
	{
		$this->db->select('a.AssignId as ID, b.DM_FirstName as Name, b.DM_AddressLine1 as HomeAddress, b.DM_OfficeLine1 as OfficeAddress, b.DM_City as City, b.DM_MobilePhoneNum as Phone, b.DM_KurirStatusKode as Status');
		$this->db->from('t_gn_assignment a');
		$this->db->join('t_gn_customer_master b', 'a.AssignCustId = b.DM_Id', 'INNER', true);
		$this->db->where('a.AssignKurirId', $id);
		$result = $this->db->get();

		return $result->row();

	}

}

/* End of file m_datacust.php */
/* Location: ./application/models/m_datacust.php */