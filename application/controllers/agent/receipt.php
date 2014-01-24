<?php

class Receipt extends Agent_Controller{


	public function test_reporting($receipt_id){
		$this->load->model('invoice_model');
		$this->load->model('receipt_model');
		$this->data['title'] = 'RECEIPT OPTIONS';
		$this->data['widget_title']='Receipt';
		$this->data['print_link'] =site_url('agent/receipt/view_receipt').'/'.$receipt_id;
		$this->data['download_link'] = site_url('agent/receipt/download_receipt').'/'.$receipt_id;
		$this->render_page('report_handler', $this->data);
	}
	
	public function download_receipt($receipt_id){
		$this->load->model('invoice_model');
		$this->load->model('receipt_model');
		$this->load->helper('pdf');
		
		$invoice_id = $this->receipt_model->get_invoice_id($receipt_id);
		$this->data['receipt_id'] = sprintf('%1$03d',$receipt_id);
		//$this->data['company'] = $this->invoice_model->get_company_details();
		$this->data['client'] = $this->invoice_model->get_client_info($invoice_id);
		$this->data['receipt'] = $this->receipt_model->get_receipt_details($receipt_id);
			//	$this->data['date_created'] = date('m-d-y', strtotime($this->invoice_model->get_invoice_date_created($invoice_id)));
		$this->data['date_paid'] = date('m-d-y', strtotime($this->data['receipt']['date_paid']));
		$html = $this->load->view("templates/receipt_pdf",$this->data, TRUE);
		make_invoice_pdf($html,true);
	}
	
	public function view_receipt($receipt_id){
		$this->load->model('invoice_model');
		$this->load->model('receipt_model');
		$invoice_id = $this->receipt_model->get_invoice_id($receipt_id);
		$this->data['receipt_id'] = sprintf('%1$03d',$receipt_id);
		
		$this->data['company'] = $this->invoice_model->get_company_details();
		$this->data['client'] = $this->invoice_model->get_client_info($invoice_id);
		$this->data['receipt'] = $this->receipt_model->get_receipt_details($receipt_id);
		$this->data['date_paid'] = date('m-d-y', strtotime($this->data['receipt']['date_paid']));
		$this->load->view("templates/receipt", $this->data);
	//	$html = $this->load->view("templates/receipt_pdf",$this->data, TRUE);
	//	$this->email_invoice($html);

	}

	public function viewReceipts(){
		$this->load->model('receipt_model');
		$product = $this->receipt_model->getReceipts();
		$this->data['title'] = 'VIEW RECEIPTS';
		$this->data['widget_title']='Receipt';
		$this->data['products'] = $product;
		$this->data['tableheaders'] = $this->receipt_model->listFields('receipt');
		
		$this->render_page('view_receipt', $this->data);
	}
	
	public function createReceipt(){
		$this->load->model('receipt_model');
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('invoice_id', 'invoice_id', 'required');
		//$this->form_validation->set_rules('product_id', 'product_id', 'required');
		//$this->form_validation->set_rules('quantity','quantity','required');
		if($this->form_validation->run() == FALSE){
			$this->data['title']='RECEIPT';
			$this->data['widget_title'] = 'Receipt Details';
			
			$this->render_page('create_receipt', $this->data);
		}
		else{
			if(($receipt_id=$this->receipt_model->add_receipt())){
				$this->session->set_flashdata('alert_success','Receipt added');
				redirect('agent/receipt/test_reporting/'.$receipt_id,'refresh');			
			}else{
			//	$this->session->set_flashdata('alert_error','Could not create receipt');
				redirect('agent/receipt/createReceipt','refresh');			
			}
		}
	}
}

?>