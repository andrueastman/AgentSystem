<?php
class Auth extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->database();
	}
	
	public function index(){
		if (!$this->ion_auth->logged_in()){
			//redirect them to the login page
			redirect('auth/login', 'refresh');
		}else {
			$this->redirectGroup();
		}
	}
	
	public function login(){
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		
		if ($this->form_validation->run() === FALSE){
			$this->session->set_flashdata( 'alert_error', (validation_errors()) ? validation_errors() : $this->session->flashdata('alert_error'));
			$data['title'] = 'LOGIN';
			$this->load->view('header', $data);
			$this->load->view('login',$data);
		}
		else{
			$identity = $this->input->post('username');
            $password = $this->input->post('password');

            if($this->ion_auth->login($identity,$password)) {
                //capture the user
                $user = $this->ion_auth->user()->row();
                $this->redirectGroup();
            }
            else {
                $this->session->set_flashdata('alert_error','Your login attempt failed.');
				redirect('auth/login');
			}
		}
	}
	
	public function redirectGroup(){
		if($this->ion_auth->is_admin()){
			redirect('admin/home');
		}else if($this->ion_auth->in_group('marketer')){
			redirect('marketer/home');
		}else if($this->ion_auth->in_group('agent')){
			redirect ('agent/home');
		}
		else{
			redirect('auth/logout');
		}
	}

	public function logout(){
		$this->data['title'] = "Logout";
		$logout = $this->ion_auth->logout();
		//redirect them to the login page
		$this->session->set_flashdata('alert_info', $this->ion_auth->messages());
		redirect('auth/login', 'refresh');
	}

	//to be worked on
	public function change_password(){
		$this->form_validation->set_rules('old', 'old', 'required');
		$this->form_validation->set_rules('new', 'new', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
		$this->form_validation->set_rules('new_confirm', 'new_confirm', 'required');
	
	}
	
	function forgot_password()
	{
		$this->form_validation->set_rules('email', 'email', 'required');
		if ($this->form_validation->run() == false)
		{
			$data['title'] = 'LOGIN';
			$this->session->set_flashdata('alert_error',(validation_errors()) ? validation_errors() : $this->session->flashdata('alert_error'));
			$this->load->view('header', $data);
			$this->load->view('forgot_password',$data);
		}
		else
		{
			// get identity for that email
            $identity = $this->ion_auth->where('email', strtolower($this->input->post('email')))->users()->row();
            if(empty($identity)) {
                $this->ion_auth->set_message('forgot_password_email_not_found');
                $this->session->set_flashdata('alert_error', $this->ion_auth->messages());
                redirect("auth/forgot_password", 'refresh');
            }
            
			//run the forgotten password method to email an activation code to the user
			$forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

			if ($forgotten)
			{
				//if there were no errors
				$this->session->set_flashdata('alert_success', $this->ion_auth->messages());
				redirect("auth/login", 'refresh'); //we should display a confirmation page here instead of the login page
			}
			else
			{
				$this->session->set_flashdata('alert_error', $this->ion_auth->errors());
				redirect("auth/forgot_password", 'refresh');
			}
		}
	}

	//reset password - final step for forgotten password
	public function reset_password($code = NULL)
	{
		if (!$code)
		{
			show_404();
		}

		$user = $this->ion_auth->forgotten_password_check($code);

		if ($user)
		{
			//if the code is valid then display the password reset form

			$this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
			$this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');

			if ($this->form_validation->run() == false)
			{
				//display the form

				//set the flash data error message if there is one
				$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

				$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
				$this->data['new_password'] = array(
					'name' => 'new',
					'id'   => 'new',
				'type' => 'password',
					'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
				);
				$this->data['new_password_confirm'] = array(
					'name' => 'new_confirm',
					'id'   => 'new_confirm',
					'type' => 'password',
					'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
				);
				$this->data['user_id'] = array(
					'name'  => 'user_id',
					'id'    => 'user_id',
					'type'  => 'hidden',
					'value' => $user->id,
				);
				$this->data['csrf'] = $this->_get_csrf_nonce();
				$this->data['code'] = $code;

				//render
				$this->_render_page('auth/reset_password', $this->data);
			}
			else
			{
				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id'))
				{

					//something fishy might be up
					$this->ion_auth->clear_forgotten_password_code($code);

					show_error($this->lang->line('error_csrf'));

				}
				else
				{
					// finally change the password
					$identity = $user->{$this->config->item('identity', 'ion_auth')};

					$change = $this->ion_auth->reset_password($identity, $this->input->post('new'));

					if ($change)
					{
						//if the password was successfully changed
						$this->session->set_flashdata('message', $this->ion_auth->messages());
						$this->logout();
					}
					else
					{
						$this->session->set_flashdata('message', $this->ion_auth->errors());
						redirect('auth/reset_password/' . $code, 'refresh');
					}
				}
			}
		}
		else
		{
			//if the code is invalid then send them back to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("auth/forgot_password", 'refresh');
		}
	}

}

?>