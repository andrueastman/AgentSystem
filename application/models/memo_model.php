<?php
class Memo_Model extends CI_Model{
	private $memo_id;
	
	public function __construct(){
		$this->load->database();
	}
	
	public function insert_memo(){
		$memo = $this->input->post('message');
		$data = array(
			'message' =>$memo
		);
		if($this->db->insert('admin_memo', $data)){
			return $this->db->insert_id();
		}else{
			return false;
		}
	}
		
	public function insert_agent_memo($id){
		$agentdata = $this->input->post('agents');
		$agents = explode(",", $agentdata);
		foreach($agents as $agent){
			$data = array(
				'memo_id' =>$id,
				'agent_id' =>$agent
			);
			if(!$this->db->insert('memo_receivers', $data))
				return false;
		}
		return true;
	}
	public function get_memos($agent_id =FALSE){
		if($agent_id==FALSE){
			$results = $this->db->query('select * from admin_memo inner join memo_receivers on 
			admin_memo.id=memo_receivers.memo_id');
			return $result->result_array();
		}else{
			$result = $this->db->query('select * from admin_memo inner join memo_receivers on 
			admin_memo.id=memo_receivers.memo_id where memo_receivers.agent_id='.$agent_id);
			return $result->result_array();
		}
	}
	
	public function get_memo($memo_id){
		$result = $this->db->query('select * from admin_memo where id ='.$memo_id);
		return $result->row_array();
	
	}
	
	public function get_count_unread($agent_id){
		$result = $this->db->query('select count(memo_id) as unread from memo_receivers where viewed=0 and agent_id='.$agent_id);
		$count = $result->row_array();
		return $count['unread'];
		
	}
}
?>