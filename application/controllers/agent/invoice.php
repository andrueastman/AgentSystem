<?php
class Invoice extends Agent_Controller{


	public function find_invoice(){
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
			$data['title']="FIND INVOICE";
			$data['widget_title'] ="FIND INVOICE";
			$this->render_page('find_invoice', $data);		
		}else{
			$data['title']="FIND INVOICE";
			$data['widget_title'] ="FIND INVOICE";
		
			$data['data'] = $this->client_model->search_clients();
			$data['links'] = '';
			$this->render_page('view_clients', $data);
		}
	
	}
	
	public function relink_invoice_id_to_invoice($invoice_id){
		$this->load->model('invoice_model');
		if($this->invoice_model->invoice_exists($invoice_id)){
			redirect ('agent/invoice/view_invoice/'.$invoice_id);
		}else{
			$this->session->set_flashdata('alert_error','The invoice '.$invoice_id." does not exists");
			redirect('agent/invoice/find_invoice','refresh');
		}
		
	}
	
	public function get_invoice_from_client_id($client_id){
		$this->load->model('invoice_model');

			$data['title']="FIND INVOICE";
			$data['widget_title'] ="FIND INVOICE";
		
		$data['data'] = $this->invoice_model->find_client_invoices($client_id);
		$data['links'] = '';
		
		$this->render_page('view_invoice',$data);
	}
	public function view_invoice_as_table($invoice_id){
		$this->load->model('invoice_model');
			$data['title']="FIND INVOICE";
			$data['widget_title'] ="FIND INVOICE";
		
		$condition = array('id'=>$invoice_id);
		$data['data'] = $this->invoice_model->get_invoice($condition);
		$data['links'] = '';
		
		$this->render_page('view_invoice',$data);
		
	}

	public function test_reporting($invoice_id){
		$this->load->model('invoice_model');
		$this->data['title'] = 'INVOICE OPTIONS';
		$this->data['widget_title']='Invoice';
		$this->data['print_link'] =site_url('agent/invoice/view_invoice').'/'.$invoice_id;
		$this->data['download_link'] = site_url('agent/invoice/download_invoice').'/'.$invoice_id;
		$this->render_page('report_handler', $this->data);
	}
	
	public function download_invoice($invoice_id){
		$this->load->model('invoice_model');
		$this->load->helper('pdf');
		$this->load->helper('date');
		
		$this->data['invoice_id'] = sprintf('%1$03d',$invoice_id);
		$this->data['company'] = $this->invoice_model->get_company_details();
		$this->data['client'] = $this->invoice_model->get_client_info($invoice_id);
		$this->data['products'] = $this->invoice_model->get_invoice_products($invoice_id);
		$this->data['total'] = $this->invoice_model->get_invoice_total($invoice_id);
		
		$this->data['date_created'] = date('m-d-y', strtotime($this->invoice_model->get_invoice_date_created($invoice_id)));
		$this->data['date_due'] = date('m-d-y', strtotime($this->invoice_model->get_invoice_date_due($invoice_id)));
		$html = $this->load->view("templates/invoice_pdf",$this->data, TRUE);
		make_invoice_pdf($html,true,'INV'.$this->data['invoice_id']);
	}

	public function view(){
		$this->load->model('client_model');
		$this->load->model('invoice_model');
		$this->load->model('product_model');
			$this->load->library('form_validation');
			$this->data['title']='INVOICE';
			$this->data['widget_title'] = 'Invoice Details';
			$this->data['products'] = $this->product_model->get_products();
			
			$this->render_page('create_client', $this->data);	
	}
	public function create_client_invoice(){
		$this->load->model('client_model');
		$this->load->model('invoice_model');
		$this->load->model('product_model');

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
			$this->status['status'] ='error';
			$this->status['errors']= validation_errors();
		}
		else{
			$client_id = $this->client_model->add_client();
			if($client_id){
				$this->invoice_model->set_client_id($client_id);		
				$invoice_id = $this->invoice_model->add_invoice();
				if($invoice_id){
					$this->invoice_model->set_invoice_id($invoice_id);
					if($this->invoice_model->add_invoice_products()){
						$this->status['status'] ='success';
						$this->status['invoice_id'] = $invoice_id;
					}else{
						$this->status['status'] ='error';
						$this->status['errors'] = '<p>cannot add products</p>';
					}
				}else{
					$this->status['status'] ='error';
					$this->status['errors'] = '<p>cannot add invoice</p>';
				}
				
			}else{
				$this->status['status'] ='error';
				$this->status['errors'] = '<p>cannot add client</p>';
			}
		}
		
		echo json_encode($this->status);
	}
		             
	
	public function view_invoice($invoice_id){
		$this->load->model('invoice_model');
		$this->load->helper('date');
		
		$this->data['invoice_id'] = sprintf('%1$03d',$invoice_id);
		$this->data['company'] = $this->invoice_model->get_company_details();
		$this->data['client'] = $this->invoice_model->get_client_info($invoice_id);
		$this->data['products'] = $this->invoice_model->get_invoice_products($invoice_id);
		$this->data['total'] = $this->invoice_model->get_invoice_total($invoice_id);
		
		$this->data['date_created'] = date('m-d-y', strtotime($this->invoice_model->get_invoice_date_created($invoice_id)));
		$this->data['date_due'] = date('m-d-y', strtotime($this->invoice_model->get_invoice_date_due($invoice_id)));
		$this->load->view("templates/invoice", $this->data);
		$html = $this->load->view("templates/invoice_pdf",$this->data, TRUE);
		//$this->email_invoice($html);
	}
	
	public function get_date(){
		$this->load->model('invoice_model');
		echo $this->invoice_model->get_due_date();
	}
	public function view_all_invoices($search=0, $page=0){
		$this->load->model('invoice_model');
		
		$data['base_url'] = 'agent/invoice/view_all_invoices';
		$data['total_rows'] =$this->invoice_model->all_invoices_count($search, $this->the_user->id);
		$data['per_page'] =10;
		
		$data['data']=$this->invoice_model->get_all_invoices($data["per_page"], $page, $search, $this->the_user->id);;
		$data['title']='VIEW INVOICES';
		$data['widget_title']='INVOICES';
		$data['page']='view_invoice';
		
		$this->view_data_page($search, $page, $data);

	}
/*	public function view_all_invoices(){
		$this->load->model('invoice_model');
		$invoices = $this->invoice_model->get_all_invoices();
		$this->data['title'] = 'VIEW INVOICES';
		$this->data['widget_title']='Invoices';
		$this->data['invoices'] = $invoices;
		$this->load->view('header', $this->data);
		
		$this->render_page('view_invoice', $this->data);
	}
C*/	
	public function email_invoice($html){
		$this->load->library('email');
		$this->load->helper('pdf');
		
		$config['protocol'] = 'smtp';
		$config['smtp_host'] ='127.0.0.1';
		$config['smtp_user'] = 'root';
		$config['smtp_pass'] = 'root';
		
		$this->email->initialize($config);

		$this->email->from('admin@agent.com', 'Your Name');
		$this->email->to('root@localhost.com'); 

		$this->email->subject('Invoice');
		$this->email->message('Attached is your invoice');	
		$this->email->attach(make_invoice_pdf($html,false));

		$this->email->send();

	//	echo $this->email->print_debugger();

	
	}

}
?>