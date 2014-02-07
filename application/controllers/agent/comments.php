<?php
class Comments extends Agent_Controller{
	public function view_comments(){
		$this->load->model('comment_model');
		$data['row'] = $this->comment_model->get_post(1);
		$data['comments'] = $this->comment_model->retrieve_comments_with_post_id(1);
		
		$this->render_page('comments', $data);
	}
	
	public function insert_comment(){
		$this->load->model('comment_model');
		if($this->comment_model->add_comment($this->the_user->id)){
			$data['message'] = 'success';
		}else{
			$this->session->set_flashdata('alert_error','Your comment has not been added');
			$data['message'] ='error';
		}
	
	}
}
?>