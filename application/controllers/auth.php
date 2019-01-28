<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('m_auth');
	}

	public function index()
	{
		if($this->session->userdata('logged') == 1)
		{
			redirect('home');
		}else{
			$this->load->view('login/v_login');
		}
	}

	public function login()
	{
		$output['error'] = false;

		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		// print_r($password);
		$data = $this->m_auth->getlogin($username, $password);
		// print_r($data);
		if(!empty($data) && $data->user_state == 1)
		{
			$row = array(
				'logged'	=> TRUE,
				'userid'	=> $data->UserId,
				'username'	=> $data->code_user,
				'user_role'	=> $data->profile_id
			);

			$this->session->set_userdata($row);
			$output['redirect'] = base_url('index.php')."/home";

		} 
		else if(!empty($data) && $data->user_state == 0){
			$output['error'] = true; 
			$output['message'] = "User Not Active";
			
		} 
		else{
			$output['error'] = true;
			$output['message'] = "Username or Password Incorect";
		}

		echo json_encode($output);
	}

	public function logout()
	{
		// $user = $this->session->userdata('username');
		
		// if($user)
		// {
		// 	$this->M_Auth->updatelogout(0);
			$this->session->sess_destroy();
		// }
		
		redirect(base_url());
	}

}

/* End of file  */
/* Location: ./application/controllers/ */