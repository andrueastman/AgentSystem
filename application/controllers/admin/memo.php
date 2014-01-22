<?php
class Memo extends Admin_Controller{
	
	public function create_memo(){
		$this->load->model('memo_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->data['title']='CREATE MEMO';
		$this->data['widget_title'] = 'MEMO';
		$results = $this->ion_auth->users('3')->result_array();
		$this->data['agents'] = $results;
		
		$this->form_validation->set_rules('agents', 'agents', 'required');
		$this->form_validation->set_rules('message', 'message', 'required');
		
		if($this->form_validation->run()==FALSE){
			$this->render_page('create_memo',$this->data);
		}else{
			if(($memo_id =$this->memo_model->insert_memo())){
					if($this->memo_model->insert_agent_memo($memo_id)){
						$this->session->set_flashdata('alert_success','Memo created and sent');
						redirect('admin/home','refresh');
					}
					else{
						$this->session->set_flashdata('alert_error','Could not put into agent memo');
						//redirect('admin/memo/create_memo','refresh');
					}
			}else{
				$this->session->set_flashdata('alert_error','Could not create memo');
				redirect('admin/memo/create_memo','refresh');
			}
		}
	}

}
?>