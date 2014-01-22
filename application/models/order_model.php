<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

public class Order_Model extends CI_Model{

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
		
	public function make_order($type, $client_id, $agent_id, $products){
		if(empty($products)){
			$this->session->set_flashdata('alert_error','No products in the order made');
			return FALSE;
		}else{
			$data= array(
				'type'=>$type,
				'client_id'=>client_id,
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
			return false
		}else{
			$product['order_id'] = $id;
			return $this->db->insert('order_particulars', $product)
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
			'date_marketer' => $this->get_current_date();
			);
		return $this->update_order($order_id, $data);
	}
	
	public function admin_approve($order_id, $admin_id){
		$data = array(
			'admin_id' => $admin_id,
			'date_admin' => $this->get_current_date();
			);
		return $this->update_order($order_id, $data);
	}
	
	public function is_approved($order_id){
		$result = $this->db->get('admin_id','marketer_id')
							->where(array('order_id'=>order_id));
		$data = $result->row_array();
		if($data['admin_id']!=NULL && $data['marketer_id']!=NULL )
			return TRUE;
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
		$result = $this->db->get('sum(price*quantity) as total')
							->where(array('order_id'=>$order_id));
		$data = $result->row_array();
		return $data['total'];
	}
	
	public function get_invoice_data($order_id){
		$data = array(
			'order_id' =>$order_id,
			'date_created' => $this->get_current_time(),
			'total' => $this->get_order_total($order_id)
			);
		return $data;
	}

} 

?>