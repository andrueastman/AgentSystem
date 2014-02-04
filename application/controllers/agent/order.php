<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends Agent_Controller{
	public function __construct(){
		parent::__construct();
	}
	
	public function get_client_orders($client_id){
		$this->load->model('order_model');
		
		$condition  = array('client_id' =>$client_id);
		$data['orders'] = $this->order_model->get_basic_orders($condition);
		$data['title']='CLIENT ORDERS';
		$data['widget_title'] = 'CLIENT ORDERS';
		
		$this->render_page('order_list', $data);
	
	}
	public function get_order_details($order_id){
		$this->load->model('order_model');
		
		$data['order'] = $this->order_model->get_order_details($order_id);
		$data['invoice'] = $this->order_model->get_order_invoice($order_id);
		$data['client'] = $this->order_model->get_order_clients($order_id);
		$data['products'] = $this->order_model->get_order_products($order_id);
		$data['receipts'] = $this->order_model->get_order_receipts($order_id);
		$data['title']='ORDER DETAILS';
		$data['widget_title'] = 'ORDER DETAILS';

		$this->render_page('order_details', $data);
	}
	public function create_client(){
		$this->load->model('client_model');
	
		$this->load->library('form_validation');
		$rules= array(
				array(
					'field'=>'first_name',
					'label'=>'first_name',
					'rules'=>'required'
				),
				array(
					'field'=>'last_name',
					'label'=>'last_name',
					'rules'=>'required'
				),
				array(
					'field'=>'phone_no',
					'label'=>'phone_no',
					'rules'=>'required'
				)
		);
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() == FALSE){
		//code for loading view of client making
			$data['title']='ORDER';
			$data['widget_title'] = 'CLIENT DETAILS';

			$this->render_page('create_client', $data);
		}else{
			$client_id = $this->client_model->add_client();
			if($client_id){
				redirect('agent/order/render_order_page/'.$client_id);
			}else{
				$this->session->set_flashdata('alert_error','Could not create client');
				redirect('agent/order/make_order','refresh');
			}			
		}
	}
	
	public function existing_client(){
		$this->load->model('client_model');
	
		$this->load->library('form_validation');
		$rules= array(
				array(
					'field'=>'first_name',
					'label'=>'first_name',
					'rules'=>'required'
				),
				array(
					'field'=>'last_name',
					'label'=>'last_name',
					'rules'=>'required'
				)
		);
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() == FALSE){
		//code for loading view of client making
			$data['title']='ORDER';
			$data['widget_title'] = 'CLIENT DETAILS';

			$this->render_page('search_client', $data);
		}else{
			$this->render_search_clients_page($this->client_model->search_clients());
		}
	}
	
	public function render_search_clients_page($clients){
		$data['title']='ORDER';
		$data['widget_title'] = 'CLIENT DETAILS';

		$data['data'] = $clients;
		$data['links'] = '';
		$this->render_page('view_clients', $data);
	}
	
	public function render_order_page($client_id){
		$this->load->library('form_validation');
		$this->load->model('product_model');
		$this->data['title']='ORDER';
		$this->data['widget_title'] = 'Order Products';
		$this->data['client_id'] = $client_id;
		$this->data['products'] = $this->product_model->getProducts();
			
		$this->render_page('create_order_products', $this->data);	
	}
	
	public function create_order($client_id){
		$this->load->model('order_model');
		$type = $this->input->post('type');
		$agent_id = $this->the_user->id;
		$products = json_decode($this->input->post('products'));
		if($order_id = $this->order_model->make_order($type, $client_id, $agent_id, $products)){
			$this->status['status'] ='success';
			$this->status['order_id']= $order_id;

		}else{
			$this->status['status']= 'error';
			$this->status['errors'] = '<p>Could not create the order</p>';
		}
		echo json_encode($this->status); 
	}

}

?>