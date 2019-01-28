<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class datacust extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('m_datacust');
	}

	public function index()
	{
		$UserId = $this->session->userdata('userid');
		$Data['cust'] = $this->m_datacust->getDataCustomer($UserId);
		// print_r($Data);exit();
		if($this->session->userdata('logged') == 1){
			$this->load->view('layout/v_header');
			$this->load->view('datacustomer/v_datacust', $Data);
			$this->load->view('layout/v_footer');
		}
		else{
			redirect(base_url(),'refresh');
		}
	}

	public function viewCustomer($id)
	{
		$data = $this->m_datacust->showCustomer($id);
		print_r($data);
		$this->load->view('layout/v_header');
		$this->load->view('datacustomer/v_detail_customer');
		$this->load->view('layout/v_footer');
	}

}

/* End of file datacust.php */
/* Location: ./application/controllers/datacust.php */