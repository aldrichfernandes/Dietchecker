<?php
class Lists extends CI_Controller {
	public function __construct(){
		parent::__construct();

		if(!$this->session->userdata('logged_in')){
			$this->session->set_flashdata('noaccess', 'Sorry , You are not logged in');
			redirect('home/index');
		}
	}

public function index(){
	$user_id = $this->session->userdata('user_id');

	$data['lists'] = $this->List_model->get_lists();

	//creating a view for the layout 
	$data['main_content'] = 'lists/index';
	$this->load->view('layouts/main',$data);

      

      }

      public function show($id){

      	//getting info from the list model 
      	$data['list'] = $this->List_model->get_list($id);

        $data['active_tasks'] = $this->List_model->get_list_tasks($id,true);

        $data['inactive_tasks'] = $this->List_model->get_list_tasks($id,false);
        




      	//load the view and the layout and send it to index
      	$data['main_content'] = 'lists/show';
      	$this->load->view('layouts/main',$data);

      }
       public function add(){
       	$this->form_validation->set_rules('list_name','List Name','trim|required|xss_clean');
       	$this->form_validation->set_rules('list_body','List Body','trim|xss_clean');

       	if($this->form_validation->run() == FALSE){

       		$data['main_content'] = 'lists/add_list';
       		$this->load->view('layouts/main',$data);

       	} else {
       		$data = array(
       			'list_name'  => $this->input->post('list_name'),
       			'list_body'  => $this->input->post('list_body'),
       			'list_user_id' => $this->session->userdata('user_id')
       			);
       		if($this->List_model->create_list($data)){
       			$this->session->set_flashdata('list_created','Your Task List Reminder has been created');

       			redirect('lists/index');
       		}
       	}
      
      }


       public function edit($list_id){
        $this->form_validation->set_rules('list_name','List Name','trim|required|xss_clean');
        $this->form_validation->set_rules('list_body','List Body','trim|xss_clean');
        
        if($this->form_validation->run() == FALSE){
            
            $data['this_list'] = $this->List_model->get_list_data($list_id);
            
            $data['main_content'] = 'lists/edit_list';
            $this->load->view('layouts/main',$data);  
        } else {
            
            $data = array(             
                'list_name'    => $this->input->post('list_name'),
                'list_body'    => $this->input->post('list_body'),
                'list_user_id' => $this->session->userdata('user_id')
            );
           if($this->List_model->edit_list($list_id,$data)){      
                $this->session->set_flashdata('list_updated', 'Your task list has been updated');
                

                redirect('lists/index');
           }
        }
    }

    public function delete($list_id){

    	$this->List_model->delete_list($list_id);

    	$this->session->set_flashdata('list_deleted','Your requsted list has been deleted');
    	
    	redirect('lists/index');

    }
}
