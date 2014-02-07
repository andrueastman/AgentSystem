<?php
class Comment_Model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}


	public function get_post($id){
		$this->db->select('*')->from('coments')->where('id', $id);
		return $this->db->get()->result_array();
	}


}

?>