<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends Marketer_Controller{
	
	public function approve($order_id){
		$this->load->model('order_model');
		$this->load->model('invoice_model');
		
		if($this->order_model->marketer_approve($order_id, $this->the_user->id)){
			if($this->order_model->is_approved($order_id) && !$this->invoice_model->exists($order_id)){
				$this->invoice_model->create_invoice($this->order_model->get_invoice_data($order_id));
			}
			$this->session->set_flashdata('alert_info','You have approved this order');
		}else{
			$this->session->set_flashdata('alert_error','Failed to approve');
		}
		redirect('marketer/order/view_unhandled','refresh');
	}
	public function view_unhandled(){
		$this->load->model('order_model');
		
		$condition = array(
			'marketer_id' => NULL,
			'agentlinks.marketer' =>$this->the_user->id
			);
		$data['data'] = $this->order_model->get_orders($condition);
		$this->render_page('view_orders', $data);
	}

}

?>