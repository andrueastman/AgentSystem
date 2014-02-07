<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends Admin_Controller{
	
	public function approve($order_id){
		$this->load->model('order_model');
		$this->load->model('invoice_model');
		
		echo $this->the_user->id;
		if($this->order_model->admin_approve($order_id, $this->the_user->id)){
			
			if($this->order_model->is_approved($order_id) && !$this->invoice_model->exists($order_id)){
				$this->invoice_model->create_invoice($this->order_model->get_invoice_data($order_id));
			}
			$this->session->set_flashdata('alert_info','You have approved this order');
		}else{
			$this->session->set_flashdata('alert_error','Failed to approve');
		}
		redirect('admin/order/view_unhandled', 'refresh');
	}
	
	public function cancel($order_id){
		$this->load->model('order_model');
		if($this->order_model->cancel_order($order_id)){
			$this->session->set_flashdata('alert_error','The order '.$order_id.' has been cancelled');
		}else $this->session->set_flashdata('alert_error','The order '.$order_id.' failed to cancel. Please try again');
		redirect('admin/order/view_unhandled','refresh');
	
	}

	
	public function view_unhandled(){
		$this->load->model('order_model');
		
		$data['title']='ORDER';
		$data['widget_title'] = 'Orders';
		$condition = array(
			'orders.admin_id' => NULL,
			'orders.cancelled' =>0
			);
		$data['data'] = $this->order_model->get_orders($condition);
		$this->render_page('view_orders', $data);
	}
}

?>