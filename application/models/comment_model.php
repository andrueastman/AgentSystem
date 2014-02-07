<?php
class Comment_Model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}


	public function get_post($id){
		$this->db->select('*')->from('coments')->where('id', $id);
		return $this->db->get()->row_array();
	}
	
	public function retrieve_comments_with_post_id($id){
		$this->db->select('users.email, commentlist.Comment')->from('commentlist')->join('users','commentlist.UserId = users.id')->where('commentlist.OrderID',$id);
		return $this->db->get()->result_array();
	}
	public function add_comment($id){
		$data = array(
			'commentId' => $this->input->post('postid'), 
			'userId' => $id,
			'OrderID'=>$this->input->post('orderid'),
			'comment' =>$this->input->post('comment') 
		);
		return $this->db->insert('commentlist', $data);
	}



}

?>