<?php

Class Agent_Model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}
	
	public function get_agents(){
		
	}

	public function disable_agent($agent_id, $agent_active){
		$status = ($agent_active==1)?0:1;
		$this->db->where('id',$agent_id);
		return $this->db->update('users', array('active'=>$status));
	}
	public function register(){
			$username = strtolower($this->input->post('first_name')) . ' ' . strtolower($this->input->post('last_name'));
			$email    = strtolower($this->input->post('email'));
			$password = $this->input->post('password');
			$group = 'agent';
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