<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends Admin_Controller{


	public function create_user(){
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('user_model');

		$this->form_validation->set_rules('first_name', 'first_name', 'required');		
		
		if($this->form_validation->run() == FALSE){
			$this->data['title']='CREATE USER';
			$this->data['widget_title'] = 'User Details';
			$this->data['user_groups'] = $this->ion_auth->groups()->result_array();
			$this->data['marketers'] = $this->ion_auth->users('2')->result_array();
			$this->render_page('create_user',$this->data);
		}
		else{
			if($user_id = $this->user_model->register()){
					$this->user_model->add_marketer($user_id);
					$this->session->set_flashdata('alert_success',$this->ion_auth->messages());
					redirect('admin/home','refresh');				
			}else{
				$this->session->set_flashdata('alert_error',$this->ion_auth->errors());
				redirect('admin/agent/create_agent', 'refresh');
			}		
		}
	}
	
	public function view_users($user_type = 0 ){
		$user= ($user_type==0?'':$user_type);
		$results = $this->ion_auth->users($user)->result_array();
		$this->data['title'] = 'VIEW AGENTS';
		$this->data['widget_title']='Agents';
		$this->data['agents'] = $results;
		
		$this->render_page('view_agents', $this->data);

	
	}
	
	
		public function register(){
		$firstname = strtolower($this->input->post('first_name'));
		$username = strtolower($this->input->post('first_name')) . ' ' . strtolower($this->input->post('last_name'));
		$email    = strtolower($this->input->post('email'));
		$password = $firstname;
		
		$user_group = $this->input->post('group');
		$group = array();
		for($i= $user_group; $i<=3; $i++){
			array_push($group, $i);
		}
		
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