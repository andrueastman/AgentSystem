<?php
class Client extends Agent_Controller{
	public function viewClients(){
		$this->load->model('client_model');
		$product = $this->client_model->getClients($this->ion_auth->user()->row()->id);
		$this->data['title'] = 'VIEW CLIENTS';
		$this->data['widget_title']='Clients';
		$this->data['products'] = $product;
		$this->data['tableheaders'] = $this->client_model->listFields('agentclient');
		
		$this->render_page('view_table', $this->data);
	}
	
	public function notify_client($agent_id = FALSE){
		$this->load->model('client_model');
		
		$data['links'] = '';
		if($agent_id){
			$condition = array('clients.CurrentAgent'=>$this->the_user->id);
			$data['data']=$this->client_model->get_clients_unnotified($condition);		
		}else{
			$data['data']=$this->client_model->get_clients_unnotified();
		}
		$this->render_page('view_clients', $data);
	}
	
	public function client_notified($client_id){
		$this->load->model('client_model');
		if($this->client_model->client_notified($client_id)){
			$this->session->set_flashdata('alert_success','Client notification by you has been updated in the database');
		}else{
			$this->session->set_flashdata('alert_error','Client has not been notified, Please try again');
		}
		redirect('agent/client/notify_client','refresh');
	}

	
	public function find_client(){
		$this->load->helper('form');
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
			$data['title']="FIND CLIENT";
			$data['widget_title'] ="FIND CLIENT";
			$this->render_page('find_client', $data);		
		}else{
			$data['title']="FIND CLIENT";
			$data['widget_title'] ="FIND CLIENT";
		
			$data['data'] = $this->client_model->search_clients();
			$data['links'] = '';
			$this->render_page('view_clients', $data);
		}
	
	}
	public function get_order_list($client_id){
		$this->load->model('');
	}
	
	public function get_client_receipts($client_id){
		$this->load->model('receipt_model');
		$results = $this->receipt_model->get_client_receipts($client_id);
		echo print_r($results);
	}
	public function view_client_details($client_id){
		$this->load->model('receipt_model');
		
		
		$this->receipt_model->get_client_receipts($client_id);
	
	}
	
	public function view_client_order_details($order_id){
	
	}
	
	public function view_receipts(){
	}
	public function view_clients($search=0, $page=0){
		$this->load->model('client_model');
		
		$data['base_url'] = 'agent/client/view_clients';
		$data['total_rows'] =$this->client_model->clients_count($search, $this->the_user->id);
		$data['per_page'] =10;
		
		$data['data']=$this->client_model->get_clients($data["per_page"], $page, $search, $this->the_user->id);;
		$data['title']='VIEW CLIENTS';
		$data['widget_title']='Clients';
		$data['page']='view_clients';
		
		$this->view_data_page($search, $page, $data);
	}


}
?>