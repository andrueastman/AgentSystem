<?php
class Records extends Admin_Controller{
	public function index(){
	
		$this->data['title'] = 'RECORD OPTIONS';
		$this->data['widget_title']='Record';
		$this->data['client_link'] =site_url('admin/records/view_clients');
		$this->data['invoice_link'] = site_url('admin/records/view_invoices');

		$this->render_page('record_handler',$this->data);
	}
	
	public function view_receipts(){
		$this->load->model('product_model');
		
		$data['base_url'] = 'admin/products/view_products';
		$data['total_rows'] =$this->product_model->products_count($search);
		$data['per_page'] =10;
		
		$data['data']=$this->product_model->get_products($data["per_page"], $page, $search);;
		$data['title']='VIEW PRODUCTS';
		$data['widget_title']='edit_products';
		$data['page']='view_table_data';
		
		$this->view_data_page($search, $page, $data);

	}
	
	public function confirm_payment(){
	
	}
	public function get_unconfirmed_receipts(){}

}

?>