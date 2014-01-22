<?php
class Product_Model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}
	
	/*public function get_products($name=FALSE){
		if($name === FALSE){
			$query = $this->db->get('products');
			return $query->result_array();
		}
		$query = $this->db->get_where('products', array('name'=>$name));
		return $query->row_array();
	}*/
	
	private function check_enabled($name){
		if (strpos($name,'enable') !== false) {
			return 1;
		}else if(strpos($name,'disable')!==false){
			return 0;
		}else return -1;
	}
	
	public function products_count($name= FALSE) {
		if($name!=FALSE){
			$this->db->like('name', $name);
			$this->db->or_like('description',$name);
			
			if(($status=$this->check_enabled($name))>= 0){
				$this->db->or_like('status', $status);
			}
		}
        return $this->db->count_all("products");
    }
    //find way to return string if result is null
	public function get_products($limit=null, $start=0, $name=FALSE){
		$limit = (is_null($limit)?$this->products_count($name):$limit);
		if($name!=FALSE){
			$this->db->like('name', $name);
			$this->db->or_like('description',$name);
		//	$this->db->or_like('status', (strtolower($name)=='enabled'?1:0));
		}
		$this->db->limit($limit, $start);
		$query = $this->db->get('products');
		return $query->result_array();
	}
	
	public function disable_product($prod_id, $status){
		$change = ($status==0?1:0);
		$this->db->where('id',$prod_id);
		return $this->db->update('products', array('status'=>$change));
	}

	public function getProducts($name=FALSE){
		if($name === FALSE){
			$query = $this->db->get('products');
			return $query->result_array();
		}
		$query = $this->db->get_where('products', array('name'=>$name));
		return $query->row_array();
	}

	public function getProductById($id){
		$query = $this->db->get_where('products', array('id'=>$id));
		return $query->row_array();
	}
	
	public function add_product(){
		$data = array(
			
			);
	}
	public function set_product(){
		$data = array(
			'Name'=>$this->input->post('name'),
			'Description' =>$this->input->post('description'),
			'MinPrice' =>$this->input->post('min_price'),
			'MaxPrice' =>$this->input->post('max_price')
		);	
		return $this->db->insert('products',$data);
	}
	
	public function listFields($table){
		$query = $this->db->list_fields($table);
		return $query;
	}
	
	public function edit_product($id){
		$data = array(
			'name'=>$this->input->post('name'),
			'Description' =>$this->input->post('description'),
			'MinPrice' =>$this->input->post('min_price'),
			'MaxPrice' =>$this->input->post('max_price')
		);	
		$this->db->where('id',$id);
		return $this->db->update('products',$data);
	}

}
?>