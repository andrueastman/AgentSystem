<?php
class Receipt_Model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}
	
	public function add_receipt(){
		$invoice_id = $this->input->post('invoice_id');
		if($this->check_invoice_available($invoice_id)){
			$data = array(
				'invoice_id' =>$invoice_id,
				'amount' => $this->input->post('amount'),
				'type' =>$this->input->post('type'),
				'date_paid' =>$this->get_current_date()
			);
			if($this->db->insert('receipts',$data)){
				return $this->db->insert_id();
			}else{
				return false;
			}
		}else{
			$this->session->set_flashdata('alert_error','The invoice you put does not exist');
			return FALSE;
		}		
	}
	
	private function check_invoice_available($invoice_id){
		$this->db->select('id')->from('invoices')->where('id',$invoice_id);
		$result = $this->db->count_all_results();
		if($result>0)return TRUE;
		else return FALSE;
	}
	
	public function get_receipt_details($receipt_id){
		$this->db->where('id', $receipt_id);
		$result = $this->db->get('receipts');
		return $result->row_array();
	}
	
	public function get_current_date(){
		$this->db->select('now() as date');
		$result =$this->db->get()->row_array();
		return $result['date'];
	}

	public function get_balance(){
	
	}
	
	public function get_invoice_id($receipt_id){
		$result =$this->get_receipt_details($receipt_id);
		print_r($result);
		return $result['invoice_id'];
	}
	
	public function addReceipt(){
		$data = array(
			'invoice_id' =>$this->input->post('invoice_id'),
			'amount' => $this->input->post('amount')
		);
		$this->db->insert('receipt',$data);	
	}
	public function getReceipts(){
		$result = $this->db->get('receipt');
		return $result->result_array();
	}
	public function listFields($table){
		$query = $this->db->list_fields($table);
		return $query;
	}


}

?>