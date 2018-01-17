<?php
class User_model extends CI_Model{
	public function create_member(){
		$this->load->model('user_model');
		$this->load->database();
		$this->load->library('session');

		$enc_password = md5($this->input->post('password'));

		$data = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'email' => $this->input->post('email'),
			'username' => $this->input->post('username'),
			'password' => $enc_password
			);

		$insert = $this->db->insert('users',$data);
		return $insert;

	}

	public function login_user($username,$password){
		$enc_password = md5($password);

		// check for the where clauses for results 
		$this->db->where('username',$username);
		$this->db->where('password',$enc_password);

		$result = $this->db->get('users');
		if($result->num_rows() == 1){
			return $result->row(0)->id; // returns the result of the user ID and the start of the array is set to 1
		} else {
			return false; 
		}
	}
}