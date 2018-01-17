<?php
class Home extends CI_controller{

     public function index(){
     	if($this->session->userdata('logged_in')){
           
            $user_id = $this->session->userdata('user_id');

            $data['lists'] = $this->List_model->get_all_lists($user_id);
            
            $data['tasks'] = $this->Task_model->get_users_tasks($user_id);
        }
       
     	$data['main_content'] = 'home';

     $this->load->helper('form');
     $this->load->view('layouts/main' ,$data);
     $this->load->library('session');


     }
}