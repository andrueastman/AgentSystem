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