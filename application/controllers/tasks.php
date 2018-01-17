<?php
class Tasks extends CI_Controller{
	public function show($id){
		$data['task'] = $this->Task_model->get_task($id);

		$data['is_completed'] = $this->Task_model->check_if_complete($id);

		$data['main_content'] = 'tasks/show';
		$this->load->view('layouts/main',$data);
		

	}

	 public function add($list_id = null){
        $this->form_validation->set_rules('task_name','Task Name','trim|required|xss_clean');
        $this->form_validation->set_rules('task_body','Task Body','trim|xss_clean');       
        if($this->form_validation->run() == FALSE){
            
            $data['list_name'] = $this->Task_model->get_list_name($list_id); 
           
            $data['main_content'] = 'tasks/add_task';
            $this->load->view('layouts/main',$data);  
        } else {
             //Insert the value of the tasks to the database 

            $data = array(             
                'task_name'    => $this->input->post('task_name'),
                'task_body'    => $this->input->post('task_body'),
                'due_date'     => $this->input->post('due_date'),
                'list_id'      => $list_id
            );
           
           if($this->Task_model->create_task($data)){
                $this->session->set_flashdata('task_created', 'Your requested task has been created');
                


                redirect('lists/show/'.$list_id.'');
           }
        }
    }

     public function edit($task_id){
        $this->form_validation->set_rules('task_name','Task Name','trim|required|xss_clean');
        $this->form_validation->set_rules('task_body','Task Body','trim|xss_clean');       
        if($this->form_validation->run() == FALSE){
            
            $data['list_id'] = $this->Task_model->get_task_list_id($task_id);
           
            $data['list_name'] = $this->Task_model->get_list_name($data['list_id']); 
            
            $data['this_task'] = $this->Task_model->get_task_data($task_id);
          
            $data['main_content'] = 'tasks/edit_task';
            $this->load->view('layouts/main',$data);  

        } else {
          
            $list_id = $this->Task_model->get_task_list_id($task_id);
            
            $data = array(             
                'task_name'    => $this->input->post('task_name'),
                'task_body'    => $this->input->post('task_body'),
                'due_date'     => $this->input->post('due_date'),
                'list_id'      => $list_id
            );
           if($this->Task_model->edit_task($task_id,$data)){
                $this->session->set_flashdata('task_updated', 'Your requested task has been updated');
            
                redirect('lists/show/'.$list_id.'');
           }
        }
    }

    public function delete($list_id,$task_id){

        $this->Task_model->delete($task_id);

        $this->session->set_flashdata('task_deleted', 'Your requested task has been deleted');

        redirect('lists/show/'.$list_id.'');
    }

    public function mark_new($task_id){
        if($this->Task_model->mark_new($task_id)){
            $list_id = $this->Task_model->get_task_list_id($task_id);
            $this->session->set_flashdata('marked_new','Task has been marked as New');
            redirect('lists/show/'.$list_id.'');
        }
    }

    public function mark_complete($task_id){
        if($this->Task_model->mark_complete($task_id)){
            $list_id = $this->Task_model->get_task_list_id($task_id);
            $this->session->set_flashdata('marked_complete','Task has been marked as Completed');
            redirect('lists/show/'.$list_id.'');
        }
    }
}
