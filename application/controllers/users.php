<?php
class Users extends CI_Controller{
	public function register() {

		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->helper('security');
		$this->load->library('session');


     $this->form_validation->set_rules('first_name','First Name','trim|required|max_length[60]|min_length[2]|xss_clean');
     $this->form_validation->set_rules('last_name','Last Name','trim|required|max_length[60]|min_length[2]|xss_clean');
     $this->form_validation->set_rules('email','Email','trim|required|max_length[100]|min_length[5]|xss_clean|valid_email');
     $this->form_validation->set_rules('username','Username','trim|required|max_length[20]|min_length[4]|xss_clean');
     $this->form_validation->set_rules('password','Password','trim|required|max_length[20]|min_length[4]|xss_clean');
     $this->form_validation->set_rules('password2','Confirm Password','trim|required|max_length[60]|min_length[2]|xss_clean|matches[password]');
	 
	 if ($this->form_validation->run() == FALSE){


	 	$data['main_content'] = 'users/register';
	 	$this->load->view('layouts/main',$data);
	 } else {

	 	if($this->User_model->create_member()) {
	 		$this->session->set_flashdata('registered','You are now registered with dietchecker and can log In');
	 		redirect('home/index');
	 	}

	 }

	}

 public function login(){
 	$this->form_validation->set_rules('username','Username','trim|required|min_length[4]|xss_clean');
 		$this->form_validation->set_rules('password','Password','trim|required|min_length[4]|max_length[50]|xss_clean');

 		if ($this->form_validation->run() == FALSE){

 		} else {
 			$username = $this->input->post('username');
 			$password = $this->input->post('password');

 			$user_id = $this->User_model->login_user($username,$password);

 			if ($user_id){

 				$user_data = array (
 					'user_id' => $user_id,
 					'username'=> $username,
 					'logged_in' => true

 					);

 				$this->session->set_userdata($user_data);

 				$this->session->set_flashdata('login_success','You are now Logged In');

 				redirect('home/index');
 			} else {
 				$this->session->set_flashdata('login_failed','Sorry,the login info that you entered is invalid');
 				redirect ('home/index');
 	  }
 	}
  }

public function logout(){
	// unset all the user data 
	$this->session->unset_userdata('logged_in');
	$this->session->unset_userdata('user_id');
	$this->session->unset_userdata('username');
	$this->session->sess_destroy();

	redirect('home/index');

}

}