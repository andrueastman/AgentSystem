<?php

class Root_Controller extends CI_Controller{

	public function __construct(){
		parent::__construct();
	}
	public function send_email($data = null){
		$this->load->library('email');
		
		$config['protocol'] = 'smtp';
		$config['smtp_host'] ='127.0.0.1';
		$config['smtp_user'] = 'root';
		$config['smtp_pass'] = 'root';
		
		$this->email->initialize($config);
		
		$from = (empty($data['from'])?'admin@admin.com':$data['from']);
		$name = (empty($data['name'])?'admin':$data['name']);
		$to = (empty($data['to'])?'root@localhost.com':$data['to']);
		$subject = (empty($data['subject'])?'Testing':$data['subject']);
		$message = (empty($data['message'])?'This is just a test':$data['message']);
		
		$success = (empty($data['success'])?'Email successfully sent':$data['success']);
		$failure = (empty($data['failure'])?'Email not sent':$data['failure']);
		

		$this->email->from($from, $name);
		$this->email->to($to); 

		$this->email->subject($subject);
		$this->email->message($message);
		
		if(!empty($data['attachment']))
			$this->email->attach($data['attachment']);

		if($this->email->send()){
			$this->session->set_flashdata('alert_success',$success);
		}else{
			$this->session->set_flashdata('alert_error', $failure);
		}	
	}
	
	public function force_download(){
	
	}
	public function user_jobs_links(){
		$jobs = $this->ion_auth->get_users_groups()->result_array();
		
		$links = array();
		foreach($jobs as $job){
			if($job['id'] == 1){
				$admin= array('title'=>'admin','url'=>site_url('admin/home'));
				array_push($links, $admin);
				}
			else if ($job['id'] == 2){
				$marketer = array('title'=>'marketer','url'=>site_url('marketer/home'));
				array_push($links, $marketer);
				}
			else if($job['id'] == 3){
				$agent = array('title'=>'agent','url'=>site_url('agent/home'));
				array_push($links, $agent);
				}
		}
	return $links;
	}
	
	public function render_page($prefix, $unique_page, $data){
		$data['jobs'] = $this->user_jobs_links();
		$this->load->view('header',$data);
		$this->load->view($prefix.'menu',$data);
		$this->load->view($prefix.$unique_page,$data);
		//$this->load->view($prefix.'sidebar', $data);
		$this->load->view('footer', $data);
	}

	public function view_data_page($search=0, $page=0, $local_data){
		$this->load->helper('url');
		$this->load->library('pagination');
		
		$search = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		
		$config = array();
        $config["base_url"] = site_url($local_data['base_url']) . '/'.$search. '/'; 
        $config["total_rows"] = $local_data['total_rows'];
        $config["per_page"] = $local_data['per_page'];
        $config["uri_segment"] = 5;
 
        $this->pagination->initialize($config);
		
		//$search = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
        $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
     
		$this->data['base_url'] = site_url($local_data['base_url']);
		if(!empty($local_data['theaders']))
			$this->data['theaders'] = $local_data['theaders'];
		//$search = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$this->data["data"] = $local_data['data'];
		
        $this->data["links"] = $this->pagination->create_links();
		
		
		//$product = $this->product_model->getProducts();
		$this->data['title'] = $local_data['title'];
		$this->data['widget_title']=$local_data['widget_title'];
		//$this->data['products'] = $product;
		//$this->data['action_name'] = 'edit_products';

		$this->render_page($local_data['page'], $this->data);
	}	
	
	public function change_password($link, $identity){
		$this->form_validation->set_rules('old', 'old', 'required');
		$this->form_validation->set_rules('new', 'new', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
		$this->form_validation->set_rules('new_confirm', 'new_confirm', 'required');
		
		if($this->form_validation->run() == FALSE){
			$data['title'] = "CHANGE PASSWORD";
			$data['widget_title'] = 'Change Password';
			$data['identity'] = $identity;
			$data['link'] = $link;
			$this->render_page('change_password', $data);
		}else{
			$change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));
			if($change){
				$this->session->set_flashdata('alert_success', 'password changed');
				$this->ion_auth->logout();
				redirect('/');
			}else{
				$this->session->set_flashdata('alert_error','Failed to change password');
				redirect($link, 'refresh');
			}
		}

	
	}
}

class Marketer_Controller extends Root_Controller {

    protected $the_user;

    public function __construct() {

        parent::__construct();

		$group = array('marketer');
        if($this->ion_auth->in_group($group)) {
            $this->the_user = $this->ion_auth
                ->user()->row();
			$data = new stdClass();
            $data->the_user = $this->the_user;
            $this->load->vars($data);
        }
        else {
            redirect('/');
        }
    }
	
	public function render_page($unique_page,$data){
		parent::render_page('marketer/', $unique_page, $data);
	}
}

class Agent_Controller extends Root_Controller {

    protected $the_user;

    public function __construct() {

        parent::__construct();

        if($this->ion_auth->in_group('agent')) {
            $this->the_user = $this->ion_auth
                ->user()
                ->row();
			if($this->the_user->active==1){
			$data= new stdClass();
            $data->the_user = $this->the_user;
            $this->load->vars($data);
			}else{
				redirect('/');
			}
        }
        else {
            redirect('/');
        }
    }
	
	public function render_page($unique_page, $data){
		parent::render_page('agent/', $unique_page, $data);
	}
}

class Admin_Controller extends Root_Controller {

    protected $the_user;

    public function __construct() {

        parent::__construct();

        if($this->ion_auth->is_admin()) {
            $this->the_user = $this->ion_auth
                ->user()->row();
			$data = new stdClass();

            $data->the_user = $this->the_user;
            $this->load->vars($data);
        }
        else {
            redirect('/');
        }
    }
	
	public function render_page($unique_page,$data){
		parent::render_page('admin/', $unique_page, $data);
	}
}


class Common_Auth_Controller extends CI_Controller {

    protected $the_user;

    public function __construct() {

        parent::__construct();

        if($this->ion_auth->logged_in()) {
            $this->the_user = $this->ion_auth
                ->user()
                ->row();
			if($this->the_user['active']==1){
            $data->the_user = $this->the_user;
            $this->load->vars($data);
			}
			else{
				redirect('/');
			}
        }
        else {
            redirect('/');
        }
    }
}
?>