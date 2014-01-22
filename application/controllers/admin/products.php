<?php
class Products extends Admin_Controller{
	public function __construct(){
		parent::__construct();
		}
	
	public function add_product(){
		$this->load->model('product_model');
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('min_price', 'min_price', 'required');
		$this->form_validation->set_rules('max_price', 'max_price', 'required');
		
		if($this->form_validation->run() == FALSE){
			$this->data['title']='ADD PRODUCT';
			$this->data['widget_title'] = 'Product Details';
			$this->render_page('create_product', $this->data);
		}
		else{
			if($this->product_model->set_product()){
				$this->session->set_flashdata('alert_success','Product created');
				redirect('admin/products/add_product','refresh');
			}else{
				$this->session->set_flashdata('alert_error','Could not create product');
				redirect('admin/products/add_product','refresh');
			}			
		}
	}
	
	public function disable_product($id, $status){
		$info = ($status==0?'enabled':'disabled');
		$this->load->model('product_model');
		if($this->product_model->disable_product($id,$status)){
			$this->session->set_flashdata('alert_success', 'Product '.$id.'successfully '.$info);
		}
		else{
			$this->session->set_flashdata('alert_error','Could not change status of product '.$id);
		}
		redirect('admin/products/view_products','refresh');
	}
	
	public function edit_product($id){
		$this->load->helper('form');
		$this->load->model('product_model');
		$this->data['title']='EDIT PRODUCT';
		$this->data['widget_title'] = 'Product Details';
		$this->data['id']= $id;
		$this->data['product'] = $this->product_model->getProductById($id);
		
		$this->render_page('edit_product', $this->data);
	}
	public function edit_product_data($id){
		$this->load->model('product_model');
		(($this->product_model->edit_product($id))?($this->session->set_flashdata('alert_success', 'Product successfully edited')):($this->session->set_flashdata('alert_erro', 'Product edit failed')));
		redirect('admin/products/view_products','refresh');
	
	}
	
/*	public function view_products($search=0, $page=0){
		$this->load->helper('url');
		$this->load->library('pagination');
		$this->load->model('product_model');
		
		$search = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		

		$config = array();
        $config["base_url"] = site_url('admin/products/view_products') . '/'.$search. '/'; 
        $config["total_rows"] = $this->product_model->products_count($search);
        $config["per_page"] = 10;
        $config["uri_segment"] = 5;
 
        $this->pagination->initialize($config);
		
		//$search = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
        $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
     
		//$search = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$this->data["products"] = $this->product_model->
            get_products($config["per_page"], $page, $search);
        $this->data["links"] = $this->pagination->create_links();
		
		
		//$product = $this->product_model->getProducts();
		$this->data['title'] = 'VIEW PRODUCTS';
		$this->data['widget_title']='Products';
		//$this->data['products'] = $product;
		$this->data['tableheaders'] = $this->product_model->listFields('products');
		$this->data['action_name'] = 'edit_products';

		$this->render_page('view_products', $this->data);
	}
*/
	public function view_products($search=0, $page=0){
		$this->load->model('product_model');
		
		$data['base_url'] = 'admin/products/view_products';
		$data['total_rows'] =$this->product_model->products_count($search);
		$data['per_page'] =10;
		
		$data['data']=$this->product_model->get_products($data["per_page"], $page, $search);;
		$data['title']='VIEW PRODUCTS';
		$data['widget_title']='edit_products';
		$data['page']='view_products';
		
		$this->view_data_page($search, $page, $data);
	}


}
?>