<?php
class Memo extends Agent_Controller{
	public function view_memo($memo_id = FALSE){
		if($memo_id == FALSE){
			$this->load_all_memos();
		}
		else{
			$this->load_memo($memo_id);
		}
	}
	
	public function load_all_memos(){
		$this->load->model('memo_model');
	//	$this->load->library('form_validation');
		$this->data['memos'] = $this->memo_model->get_memos($this->the_user->id);
		
		$this->data['title']='CREATE USER';
		$this->data['widget_title'] = 'User Details';
		
		$this->render_page('view_memo', $this->data);		
	}
	
	public function load_memo($memo_id){
		$this->load->model('memo_model');
		$data['title']='CREATE USER';
		$data['widget_title'] = 'User Details';
		$data['memo_id']= $memo_id;
		$data['memo'] = $this->memo_model->get_memo($memo_id);
		$this->render_page('view_memo', $data);
	}
	public function mark_as_read($memo_id){
	
	}

}
?>