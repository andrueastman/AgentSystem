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
	
	public function view_clients($search=0, $page=0){
		$this->load->model('client_model');
		
		$data['base_url'] = 'admin/records/view_clients';
		$data['total_rows'] =$this->client_model->clients_count($search);
		$data['per_page'] =10;
		
		$data['data']=$this->client_model->get_clients($data["per_page"], $page, $search);;
		$data['title']='VIEW CLIENTS';
		$data['widget_title']='view clients';
		$data['theaders'] = array('first_name','last_name','phone_no','email','postal');
		$data['page']='view_table_data';
		
		
		$this->view_data_page($search, $page, $data);
	
	}
	
	public function view_invoices($search=0, $page=0){
		$this->load->model('invoice_model');
		
		$data['base_url'] = 'admin/records/view_invoices';
		$data['total_rows'] =$this->invoice_model->all_invoices_count($search);
		$data['per_page'] =10;
		
		$data['data']=$this->invoice_model->get_all_invoices($data["per_page"], $page, $search);;
		$data['title']='VIEW INVOICES';
		$data['widget_title']='view invoices';
		$data['theaders'] = array('id','first_name','last_name','phone_no','total');
		$data['page']='view_table_data';
		
		
		$this->view_data_page($search, $page, $data);
	
	}

}

?>