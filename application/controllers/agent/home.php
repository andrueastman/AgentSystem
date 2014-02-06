<?php
class Home extends Agent_Controller{

	private $local_invoice_client_id;
	
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
	//	$this->view_invoice(2);
		$this->loadDashboard();
	}
	public function change_password(){
		$this->load->library('form_validation');
		parent::change_password('agent/home/change_password', $this->the_user->email);
	}	
	public function loadDashboard(){
		$this->load->model('memo_model');
		$data['title'] = "Dashboard";
		$user = $this->ion_auth->user()->row_array();
		$data['unread_memos'] = 10;// $this->memo_model->get_count_unread($user['id']);
		
		$this->render_page('dashboard',$data);
	}
	
	public function testing_pdf($invoice_id){
		$this->load->helper('pdf');
		$this->load->model('invoice_model');
		$this->data['company'] = $this->invoice_model->get_company_details();
		$this->data['client'] = $this->invoice_model->get_client_info($invoice_id);
		$this->data['products'] = $this->invoice_model->get_invoice_products($invoice_id);
		$this->data['total'] = $this->invoice_model->get_invoice_total($invoice_id);
		$html = $this->load->view("templates/invoice_pdf", $this->data, TRUE);
		testing_pdf($html);
	}
	
	private function not_finished(){
			$this->data['title']='NOT FINISHED';
			$this->data['widget_title']='NOT FINISHED';
			$this->load->view('header', $this->data);
			$this->load->view('agent/agentmenu', $this->data);
			$this->load->view('notfinished');
			$this->load->view('agent/agent_sidebar');
			$this->load->view('footer');
	
	}

	public function still_unfinished(){
		$this->not_finished();
	}
	
	public function test_email(){
		   $config = Array(
  'protocol' => 'smtp',
  'smtp_host' => 'ssl://smtp.googlemail.com',
  'smtp_port' => 587,
  'smtp_user' => 'yohanaizraeli@gmail.com', // change it to yours
  'smtp_pass' => 'swimming', // change it to yours
  'mailtype' => 'html',
  'charset' => 'iso-8859-1',
  'wordwrap' => TRUE
	);

        $message = 'Thisis the messag i am testing';
        $this->load->library('email');
      $this->email->set_newline("\r\n");
		$this->email->from('yohanaizraeli@gmail.com', 'Johnny'); // change it to yours
      $this->email->to('somekenyan@gmail.com');// change it to yours
      $this->email->subject('Resume from JobsBuddy for your Job posting');
      $this->email->message($message);
      if($this->email->send())
     {
      echo 'Email sent.';
     }
     else
    {
     show_error($this->email->print_debugger());
    }
	}
	public function email(){
		$this->load->library('email');
		$this->load->helper('pdf');

		$this->email->from('your@example.com', 'Your Name');
		$this->email->to('someone@example.com'); 
		$this->email->cc('another@another-example.com'); 
		$this->email->bcc('them@their-example.com'); 

		$this->email->subject('Email Test');
		$this->email->message('Testing the email class.');	
		$this->email->attach(testing_pdf());

		$this->email->send();

		echo $this->email->print_debugger();
	}
	
	

}
?>