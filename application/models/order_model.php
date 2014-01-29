<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order_Model extends CI_Model{

/*
* types 1 is standard, 0 is non_standard
* booleans 1 is true, 0 is false
*/

/*
* UNDO actions made by users
*/
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
		
	public function get_orders($conditions= array()){	
		$this->db->select('orders.id as id, orders.cancelled as cancelled')->from('orders')->join('agentlinks','agentlinks.agent = orders.agent')->where($conditions);
		return $this->db->get()->result_array();
	}
	
	public function is_active($order_id){
		$this->db->select('active')->from('orders')->where('id',$order_id);
		$result = $this->db->get()->row_array();
		return ($result['active']==0?FALSE: TRUE);
	}
	public function make_order($type, $client_id, $agent_id, $products){
		if(empty($products)){
			$this->session->set_flashdata('alert_error','No products in the order made');
			return FALSE;
		}else{
			$data= array(
				'type'=>$type,
				'client_id'=>$client_id,
				'order_date' => $this->get_current_date(),
				'agent' => $agent_id
			);
			
			if($this->db->insert('orders', $data)){
				$id = $this->db->insert_id();
				
				foreach($products as $product){
					$this->add_order_product($product, $id);
				}
				return $id;
			}else{
				$this->session->set_flashdata('alert_error', 'Could not create order');
				return FALSE;
			}			
		}
	}
	
	public function add_order_product($product, $id){
		if(empty($product)){
			$this->session->set_flashdata('alert_error','Product is empty');
			return false;
		}else{
			$part_prod = array(
				'order_id'=>$id,
				'product_id' =>$product->product_id,
				'price' =>$product->price_agreed,
				'quantity' => $product->quantity
			);
			return $this->db->insert('order_particulars', $part_prod);
		}
	}
	
	public function get_current_date(){
		$this->db->select('now() as date');
		$result =$this->db->get()->row_array();
		return $result['date'];
	}

	public function update_order($order_id, $data){
		return $this->db->update('orders',$data, array('id'=>$order_id));
	}
	
	public function activate_order($order_id){
		$data = array('active'=>1);
		return $this->update_order($order_id, $data);
	}
	
	public function marketer_approve($order_id,$marketer_id){
		$data = array(
			'marketer_id' => $marketer_id,
			'date_marketer' => $this->get_current_date()
			);
		return $this->update_order($order_id, $data);
	}
	
	public function admin_approve($order_id, $admin_id){
		$data = array(
			'admin_id' => $admin_id,
			'date_admin' => $this->get_current_date()
			);
		return $this->update_order($order_id, $data);
	}
	
	public function is_approved($order_id){
		$this->db->select('admin_id, marketer_id')->from('orders')->where('id', $order_id);
		$result = $this->db->get();
		$data = $result->row_array();
		if($data['admin_id']!=NULL && $data['marketer_id']!=NULL ){
			return TRUE;
			}
		else return FALSE;
	}
	
	public function cancel_order($order_id){
		$data = array('cancelled' =>1);
		return $this->update_order($order_id, $data);
	}
	public function complete_order($order_id){
		$data= array('completed' =>1);
		return $this->update_order($order_id, $data);
	}
	
	public function count_admin_unhandled_orders(){
		$this->db->where('admin_id', null);
		$this->db->from('orders');
		return $this->db->count_all_results();
	}
	public function count_marketer_unhandled_orders(){
	//orders made by agent agents belon to marketers
		$id = $this->ion_auth->user()->row()->id;
		$this->db->select('*')->from('orders')->join('agentlinks','agentlinks.agent = orders.agent')
				->where('agentlinks.marketer',$id)->where('orders.marketer_id', NULL);
		return $this->db->count_all_results();	
	}
	public function get_overdue_handled_orders(){
	}
	//counts to enable notification to various levels
	public function count_orders(){
	
	}
	
	public function count_approved_orders($agent_id, $handled = 0){
	
	
	}
	
	public function count_standard_orders(){
		
	}
	
	public function count_non_standard_orders(){
	
	}
	
	public function count_cancelled_orders(){
	
	}
	
	public function get_order_total($order_id){
		$this->db->select('sum(price*quantity) as total')
				->from('order_particulars')
				->where(array('order_id'=>$order_id));
		$result = $this->db->get();
		$data = $result->row_array();
		return $data['total'];
	}
	
	public function get_invoice_data($order_id){
		$data = array(
			'order_id' =>$order_id,
			'date_created' => $this->get_current_date(),
			'total' => $this->get_order_total($order_id)
			);
		return $data;
	}

} 

?>