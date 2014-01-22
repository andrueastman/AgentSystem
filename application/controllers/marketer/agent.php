<?php
class Agent extends Marketer_Controller{
	public function create_agent(){
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('first_name', 'first_name', 'required');		
		
		if($this->form_validation->run() == FALSE){
		//display the form
			$this->data['title']='CREATE USER';
			$this->data['widget_title'] = 'User Details';
		//	$this->ion_auth->errors()?
		//	$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
			
			$this->render_page('create_user',$this->data);
		}
		
		else{
			if($this->register()){
				$this->session->set_flashdata('alert_success',$this->ion_auth->messages());
				redirect('admin/home','refresh');
			}else{
				$this->session->set_flashdata('alert_error',$this->ion_auth->errors());
				redirect('admin/agent/create_agent', 'refresh');
			}		
		}
	}
	public function view_agents(){
		$results = $this->ion_auth->users('3')->result_array();
		$this->data['title'] = 'VIEW AGENTS';
		$this->data['widget_title']='Agents';
		$this->data['agents'] = $results;
		
		$this->render_page('view_agents', $this->data);
	}

	public function disable_agent($agent_id, $agent_active){
		$this->load->model('agent_model');
		$enable = ($agent_active==1)?'disabled':'enabled';
		
		if($this->agent_model->disable_agent($agent_id, $agent_active)){
			$this->session->set_flashdata('alert_success', 'Agent '.$agent_id. ' '.$enable);
		}else{
			$this->session->set_flashdata('alert_error','Agent '.$agent_id.' not '.$enable);
		}
		redirect('admin/agent/view_agents','refresh');
	}
	//since I use ion_auth library model function are used here
	
	public function register(){
		$first_name = strtolower($this->input->post('first_name'));
		$username = strtolower($first_name) . ' ' . strtolower($this->input->post('last_name'));
		$email    = strtolower($this->input->post('email'));
		$password = $first_name;
		
		$group = array('3');
		
		$additional_data = array(
			'first_name' => $this->input->post('first_name'),
			'last_name'  => $this->input->post('last_name'),
			'company'    => $this->input->post('company'),
			'phone'      => $this->input->post('phone'),
		);
		return $this->ion_auth->register($username, $password, $email, $additional_data, $group);
	}
}
?>