<?php
class Home extends Admin_Controller {

    function __construct() {
        parent::__construct();
		$this->load->library('form_validation');
    }

	
    function index() {
		$this->load->model('order_model');
		
		$this->data['title']='CREATE USER';
		$this->data['widget_title'] = 'User Details';
		$this->data['new_orders'] = $this->order_model->count_admin_unhandled_orders();
		
		$this->render_page('dashboard', $this->data);
    }
	
	public function change_password(){
		parent::change_password('admin/home/change_password', $this->the_user->email);
	}
	private function not_finished(){
			$this->data['title']='NOT FINISHED';
			$this->data['widget_title']='NOT FINISHED';
			
			$this->render_page('notfinished', $this->data);	
	}
	
	public function view_receipts(){
		$this->not_finished();
	}
	
	public function view_invoices(){}

}

?>