<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends Admin_Controller{
	
	public function approve($order_id){
		$this->load->model('order_model');
		$this->load->model('invoice_model');
		
		if($this->order_model->admin_approve($order_id, $this->the_user->id)){
			if($this->order_model->is_approved() && !$this->invoice_model->exists($order_id)){
				$this->invoice_model->create_invoice($this->order_model->get_invoice_data($order_id));
			}
		}
	}
}

?>