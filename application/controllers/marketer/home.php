<?php

class Home extends Marketer_Controller{
    function __construct() {
        parent::__construct();
		$this->load->library('form_validation');
    }

    function index() {
		$this->load->model('order_model');
		$this->load->model('receipt_model');
		
		$data['title']='CREATE USER';
		$data['widget_title'] = 'User Details';
		$data['new_orders'] = $this->order_model->count_marketer_unhandled_orders();
		$data['receipts'] = $this->receipt_model->count_marketer_receipts($this->the_user->id);
		$data['comments'] =$this->order_model->get_marketer_orders_with_comments(TRUE);
		
		$this->render_page('dashboard', $data);
    }
	
	public function change_password(){
		$this->load->library('form_validation');
		parent::change_password('marketer/home/change_password', $this->the_user->email);
	}
	
	public function view_products($search=0, $page=0){
		$this->load->model('product_model');
		
		$data['base_url'] = 'admin/products/view_products';
		$data['total_rows'] =$this->product_model->products_count($search);
		$data['per_page'] =10;
		
		$data['data']=$this->product_model->get_products($data["per_page"], $page, $search);;
		$data['title']='VIEW PRODUCTS';
		$data['widget_title']='edit_products';
		$data['page']='view_products';
		
		$this->view_data_page($search, $page, $data);
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