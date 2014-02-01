<?php

class Quotation extends Agent_Controller{
	public function download(){
		$this->load->model('invoice_model');
		$this->load->model('product_model');
		
		$this->data['company'] = $this->invoice_model->get_company_details();
		$this->data['products'] = $this->product_model->get_products();
		$html = $this->load->view("templates/quotation",$this->data, TRUE);
		
		$this->load->helper('pdf');
		make_invoice_pdf($html, TRUE);
		redirect('agent/home','refresh');
	}
	public function email(){
	}
}	
?>