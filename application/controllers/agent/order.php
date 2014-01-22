<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends Agent_Controller{
	public function __construct(){
		parent::__construct();
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
		}else{
			$client_id = $this->client_model->add_client();
			if($client_id){
				$this->render_order_page($client_id);
			}else{
				$this->session->set_flashdata('alert_error','Could not create client');
				redirect('agent/order/make_order','refresh');
			}			
		}
	}
	
	public function render_order_page($client_id){
		$this->load->library('form_validation');
		$this->data['title']='ORDER';
		$this->data['widget_title'] = 'Order Products';
		$this->data['products'] = $this->product_model->get_products();
			
		$this->render_page('create_client', $this->data);	
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