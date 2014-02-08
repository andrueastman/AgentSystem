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
	
	public function cancel($order_id){
		$this->load->model('order_model');
		if($this->order_model->cancel_order($order_id)){
			$this->session->set_flashdata('alert_error','The order '.$order_id.' has been cancelled');
		}else $this->session->set_flashdata('alert_error','The order '.$order_id.' failed to cancel. Please try again');
		redirect('marketer/order/view_unhandled','refresh');
	
	}
	
	public function get_order_details($order_id){
		$this->load->model('order_model');
		
		$this->load->model('comment_model');
		$data['row'] = $this->comment_model->get_post(1);
		$data['comments'] = $this->comment_model->retrieve_comments_with_post_id($order_id);
		$data['order'] = $this->order_model->get_order_details($order_id);
		$data['invoice'] = $this->order_model->get_order_invoice($order_id);
		$data['client'] = $this->order_model->get_order_clients($order_id);
		$data['products'] = $this->order_model->get_order_products($order_id);
		$data['receipts'] = $this->order_model->get_order_receipts($order_id);
		$data['title']='ORDER DETAILS';
		$data['widget_title'] = 'ORDER DETAILS';

		$this->render_page('order_details', $data);
	}
	public function get_orders_with_comments(){
		$this->load->model('order_model');
		
		$data['orders'] = $this->order_model->get_marketer_orders_with_comments();
		$data['title']='CLIENT ORDERS';
		$data['widget_title'] = 'CLIENT ORDERS';
		
		$this->render_page('order_list', $data);
	
	}

	public function view_unhandled(){
		$this->load->model('order_model');
		
		$data['title']='ORDER';
		$data['widget_title'] = 'Orders';
		
		$condition = array(
			'orders.marketer_id' => NULL,
			'agentlinks.marketer' =>$this->the_user->id,
			'orders.cancelled' =>0
			);
		$data['data'] = $this->order_model->get_orders($condition);
		$this->render_page('view_orders', $data);
	}

}

?>