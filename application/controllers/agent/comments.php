<?php
class Comments extends Agent_Controller{
	public function view_comments(){
		$this->load->model('comment_model');
		$data['row'] = $this->comment_model->get_post(1);
		
		$this->render_page('comments', $data);
	}
}
?>