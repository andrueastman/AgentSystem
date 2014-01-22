<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function index()
	{
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'callback_username_check|required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('login');
		}
		else
		{
			$this->load->view('formsuccess');
		}
	}
}

?>