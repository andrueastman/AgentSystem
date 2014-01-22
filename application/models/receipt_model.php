<?php
class Receipt_Model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}
	
	public function add_receipt(){
		$data = array(
			'invoice_id' =>$this->input->post('invoice_id'),
			'amount' => $this->input->post('amount'),
			'date_paid' =>$this->get_current_date()
		);
		if($this->db->insert('receipt',$data)){
			return $this->db->insert_id();
		}else{
			return false;
		}		
	}
	
	public function get_receipt_details($receipt_id){
		$result = $this->db->query('select * from receipt where id='.$receipt_id);
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
		$result =$this->db->query('select invoice_id from receipt where id='.$receipt_id);
		$invoice_id = $result->row_array();	
		return $invoice_id['invoice_id'];
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