<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
	}

	public function index()
	{
		if($this->session->userdata('logged') == 1){
			$greeting['data'] = $this->greeting();
			$this->load->view('layout/v_header');
			$this->load->view('dashboard/v_dashboard', $greeting);
			$this->load->view('layout/v_footer');
		}
		else{
			redirect(base_url(),'refresh');
		}
	}

	public function greeting()
	{
		$time = date("H");
		// print_r($time);
		if($time < 12)
		{
 			$greeting = "Good Morning";
 		}
 		elseif($time >= 12 && $time < 18)
 		{
 			$greeting = "Good Afternoon"; 
   		}
   		elseif($time > 17)
   		{
     		$greeting = "Good Evening"; 
   		}

   		return $greeting;
	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */