<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_Model extends CI_Model{

	private $group;
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	public function register(){
		$firstname = strtolower($this->input->post('first_name'));
		$username = strtolower($this->input->post('first_name')) . ' ' . strtolower($this->input->post('last_name'));
		$email    = strtolower($this->input->post('email'));
		$password = $firstname;
		
		$user_group = $this->input->post('group');
		$this->group = $user_group;
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
	
	
	public function add_marketer($user_id){
		if($this->group == 1 || $this->group ==2){
			return $this->db->insert('agentlinks', array('agent'=>$user_id, 'marketer'=>$user_id));
		}else{
			$marketer_id = $this->input->post('marketer');
			return $this->db->insert('agentlinks', array('agent'=>$user_id, 'marketer'=>$marketer_id));
		}
	}
	
	public function get_marketer_agents($id){
		$this->db->select('*, users.id as id')->from('users')->join('agentlinks','agentlinks.agent = users.id')->where('agentlinks.marketer', $id);
		return $this->db->get()->result_array();
	}
	
	public function get_users($group=0, $search = FALSE, $marketer_id =FALSE){
		return $this->ion_auth->users();
	}


}

?>