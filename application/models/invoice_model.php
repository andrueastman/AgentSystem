<?php
class Invoice_Model extends CI_Model{
	private $client_id;
	private $agent_id;
	private $invoice_id;
	
	public function __construct(){
		$this->load->database();
		$this->agent_id = $this->ion_auth->user()->row()->id;
	}
	///made with orders in mind
	
	public function create_invoice($order_id, $total){
	
	}
	
	///made with orders in mind
	public function add_invoice_products(){
		$products = json_decode($this->input->post('products'));
		foreach($products as $product){
			$id= $product->product_id;
			$quantity = $product->quantity;
			if(!$this->insert_products($id, $quantity)){
				return false;
			}
		}
		return true;
	}
	
	public function add_invoice(){
		$data = array(
				'client_id'=> $this->client_id,
				'total' => $this->input->post('total'),
				'date_created' =>$this->get_current_date(),
				'date_due' => $this->get_due_date()
				);
		if($this->db->insert('invoice',$data)){
			return $this->db->insert_id();
		}else{
			return false;
		}
	}
	
	public function get_current_date(){
		$this->db->select('now() as date');
		$result =$this->db->get()->row_array();
		return $result['date'];
	}
	
	public function get_due_date(){
	//	$this->db->select('ADDDATE(now(), INTERVAL 10 DAY) as date');
		$result = $this->db->query('SELECT ADDDATE(now(), INTERVAL 10 DAY) as date')->row_array();
		return $result['date'];
	}
	
	public function get_invoice_id(){
		return $this->invoice_id;
	}
	
	public function set_invoice_id($id){
		$this->invoice_id =$id;
	}
	
	public function set_client_id($id){
		$this->client_id = $id;
	}
	public function insert_products($product_id, $quantity){
		//invoice_id, product_id, quantity
		$data = array(
			'invoice_id'=>$this->invoice_id,
			'product_id'=>$product_id,
			'quantity' =>$quantity
		);
		return $this->db->insert('invoiceproducts', $data);
	}
	
	public function get_company_details(){
		$result = $this->db->get('company_details');
		return $result->row_array();
	}
	
	public function get_client_info($invoice_id = FALSE){
		if($invoice_id == FALSE){
			$result = $this->db->query('select * from agentclient left join invoice on invoice.client_id = 
agentclient.id where invoice.id='.$this->invoice_id);
			return $result->row_array();
		}else{
			$result = $this->db->query('select * from agentclient left join invoice on invoice.client_id = 
agentclient.id where invoice.id='.$invoice_id);
			return $result->row_array();		
		}
	}
	
	public function get_invoice_products($invoice_id =FALSE){
		if($invoice_id == FALSE){
			$result = $this->db->query('select * from invoiceproducts left join products on 
invoiceproducts.product_id = products.id where invoiceproducts.invoice_id='.$this->invoice_id);
			return $result->result_array();
		}else{
			$result = $this->db->query('select * from invoiceproducts left join products on 
invoiceproducts.product_id = products.id where invoiceproducts.invoice_id='.$invoice_id);
			return $result->result_array();
		}
	
	}
	
	public function all_invoices_count($search=false, $agent_id = false){
		$this->db->select('invoice.client_id');
		$this->db->from('invoice');
		$this->db->join('agentclient','invoice.client_id= agentclient.id', 'left');
		if($search != FALSE){
			$this->db->like('agentclient.first_name', $search)->or_like('agentclient.last_name', $search)->or_like('agentclient.phone_no', $search)
				->or_like('agentclient.email', $search)->or_like('agentclient.postal', $search)->or_like('agentclient.company', $search);
		}
		if($agent_id != FALSE){
			$this->db->where('invoice.agent_id', $agent_id);
		}
		return $this->db->count_all_results();
	}
	
	public function get_all_invoices($limit=null, $start=0, $search=FALSE, $agent_id =false){
		$limit = (is_null($limit)?$this->products_count():$limit);
		$this->db->select('invoice.id, agentclient.first_name,agentclient.last_name,invoice.total,agentclient.phone_no, agentclient.email, invoice.client_id');
		$this->db->from('invoice');
		$this->db->join('agentclient','invoice.client_id= agentclient.id', 'left');

		if($search!=FALSE){
			$this->db->like('agentclient.first_name', $search)->or_like('agentclient.last_name', $search)->or_like('agentclient.phone_no', $search)
				->or_like('agentclient.email', $search)->or_like('agentclient.postal', $search)->or_like('agentclient.company', $search);
		}
		if($agent_id != FALSE){
			$this->db->where('invoice.agent_id', $agent_id);
		}
		$this->db->order_by("handled", "asc");
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		return $query->result_array();
	
	}
	
	public function get_count_unhandled_invoices(){
		$this->db->where('handled', 0);
		return $this->db->count_all('invoice');
	}
	
/*	public function get_all_invoices($agent_id = false){
		if($agent_id==FALSE){
				$result = $this->db->query('select invoice.id, agentclient.first_name,agentclient.last_name,invoice.total, 
agentclient.phone_no,agentclient.email, invoice.client_id from invoice left join agentclient on invoice.client_id=agentclient.id');
		return $result->result_array();
		}else{
			$result = $this->db->query('select invoice.id, agentclient.first_name,agentclient.last_name,invoice.total, 
agentclient.phone_no,agentclient.email, invoice.client_id from invoice left join agentclient on invoice.client_id=agentclient.id where agentclient.agent_id ='.$agent_id);
			return $result->result_array();
		}
	}*/
	
	public function get_invoice_total($invoice_id){
		$this->db->select('total');
		$this->db->from('invoice');
		$this->db->where('id',$invoice_id);

		$query = $this->db->get();
		$total= $query->row_array();
		return $total['total'];
	}
	
	public function get_invoice_date_created($invoice_id){
		$this->db->select('date_created')->from('invoice')->where('id', $invoice_id);
		
		$query= $this->db->get();
		$total = $query->row_array();
		return $total['date_created'];
	}
	
	public function get_invoice_date_due($invoice_id){
		$this->db->select('date_due')->from('invoice')->where('id', $invoice_id);
		
		$query= $this->db->get();
		$total = $query->row_array();
		return $total['date_due'];
	}

	
/*	public function getInvoice($invoice_id){
		$invoice_result = $this->db->get_where();
	}
	
	public function getAllInvoices($agent_id =FALSE){
		
	}
	
	public function listFields($table){
		$query = $this->db->list_fields($table);
		return $query;
	}

	*/

}
?>