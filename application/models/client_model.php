<?php 
class Client_Model extends CI_Model{
	public function __constructor(){
			$this->load->database();
		}
		
	public function search_clients(){
		$firstname = $this->input->post('first_name');
		$lastname = $this->input->post('last_name');
		$search = array(
			'Firstname' => $firstname,
			'Lastname' => $lastname
			//'Phone' =>$this->input->post('phone_no');
			);
		$search2 = array(
			'Firstname' =>$lastname,
			'Lastname' =>$firstname
			);
		$this->db->like($search)->or_like($search2);
		$result = $this->db->get('clients');
		return $result->result_array();
	}
		
	public function clients_count($search =FALSE, $agent_id = FALSE){
			$this->db->select('id');
			$this->db->from('agentclient');
			if($search != FALSE){
				$this->db->like('first_name', $search)->or_like('last_name', $search)->or_like('phone_no', $search)
				->or_like('email', $search)->or_like('postal', $search)->or_like('company', $search);
			}
			if($agent_id != FALSE){
				$this->db->where('agent_id', $agent_id);
			}
			return $this->db->count_all_results();
	}
		
	public function get_clients($limit=null, $start=0, $search=FALSE, $agent_id =false){
		$limit = (is_null($limit)?$this->clients_count():$limit);
		$this->db->select('*');
		$this->db->from('agentclient');

		if($search!=FALSE){
				$this->db->like('first_name', $search)->or_like('last_name', $search)->or_like('phone_no', $search)
				->or_like('email', $search)->or_like('postal', $search)->or_like('company', $search);
		}
		if($agent_id != FALSE){
			$this->db->where('agent_id', $agent_id);
		}
		
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getClients($agent_id =FALSE){
			$result = $this->db->get('agentclient');
			return $result->result_array();
		
		}
		
	public function listFields($table){
		$query = $this->db->list_fields($table);
		return $query;
		}
		
		public function add_client(){
			$first_name = $this->input->post('first_name');
			$last_name = $this->input->post('last_name');
			$phone_no = $this->input->post('phone_no');
			$email = $this->input->post('email');
			$company = $this->input->post('company');
			$data = array(
				'Firstname'=>$first_name,
				'Lastname' => $last_name,
				'Phone' =>$phone_no,
				'Email' => $email,
				//'company' =>$company,
				'Creator' =>$this->ion_auth->user()->row()->id,
				'CurrentAgent' =>$this->ion_auth->user()->row()->id
			);
			if($this->db->insert('clients', $data)){
				return $this->db->insert_id();
			}else {
				return FALSE;
			}
		}
		
		public function get_client_details($cient_id=FALSE){
		}
	}
?>