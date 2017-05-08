<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Faqs_content extends MY_Controller {

    public function index() {
              exit;
    }
	public function admin_faqs_content(){

		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$this->load->model('faqs_content/faqs_content_model');	
		$data['info'] = $this->faqs_content_model->admin_faqs();
		$this->load->view('admin_view_faqs_content',$data);
	}
	public function admin_faqs_add_content(){

		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		// $this->load->model('faqs_content/faqs_content_model');	
		// $data['info'] = $this->faqs_content_model->admin_faqs();
		$this->load->view('admin_faqs_add_content',$data);
	}
	public function admin_faqs_edit_content(){

		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$this->load->model('faqs_content/faqs_content_model');	
		$data['info'] = $this->faqs_content_model->admin_faqs_one();
		$this->load->view('admin_faqs_edit_content',$data);
	}
	public function admin_faqs_save_content(){
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$this->load->helper('faqs_content/faqs_content');
		$valid = add_validation($validation_type);
		if($valid=0){
			header("Location: ".base_url()."faqs/add");
			exit;
		}
		$this->load->model('faqs_content/faqs_content_model');	
		$this->faqs_content_model->admin_faqs_save();
		header("Location: ".base_url()."faqs");
		exit;
	}
	public function admin_faqs_update_content(){
		
		$cat_id = $this->input->post('cat_id');	
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$this->load->helper('faqs_content/faqs_content');
		$valid = add_validation($validation_type);
		if($valid=0){
			header("Location: ".base_url()."faqs/edit/$cat_id");
			exit;
		}
		
		
		$this->load->model('faqs_content/faqs_content_model');	
		$this->faqs_content_model->admin_faqs_update();
		header("Location: ".base_url()."faqs");
		exit;
	}
	public function admin_faqs_delete_content(){
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$this->load->model('faqs_content/faqs_content_model');	
		$this->faqs_content_model->admin_faqs_delete();
		header("Location: ".base_url()."faqs");
		exit;
	}
	
public function admin_faqs_question_content(){
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$this->load->model('faqs_content/faqs_content_model');	
		$data['info'] = $this->faqs_content_model->admin_faqs_question();
		$this->load->view('admin_view_faqs_question_content',$data);
	}
	public function admin_faqs_question_add_content(){
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		//$this->load->model('faqs_content/faqs_content_model');	
		//$data['info'] = $this->faqs_content_model->admin_faqs_qusetion_by_id();
		$this->load->view('admin_faqs_question_add_content',$data);
	}
	public function admin_faqs_question_save_content(){
		$cat_id = $this->input->post('cat_id');
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		
		$this->load->helper('faqs_content/faqs_content');
		$valid = add_question_validation($validation_type);
		if($valid=0){
			header("Location: ".base_url()."faqs/question_add/$cat_id");
			exit;
		}
		
		$this->load->model('faqs_content/faqs_content_model');	
		$this->faqs_content_model->admin_faqs_question_save();
		header("Location: ".base_url()."faqs/question/$cat_id");
		exit;
	}
	public function admin_faqs_question_edit_content(){
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$this->load->model('faqs_content/faqs_content_model');	
		$data['info'] = $this->faqs_content_model->admin_faqs_question_one();
		$this->load->view('admin_faqs_question_edit_content',$data);
	}
	public function admin_faqs_question_update_content(){
		$cat_id = $this->input->post('cat_id');
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		
		$this->load->helper('faqs_content/faqs_content');
		$valid = add_question_validation($validation_type);
		if($valid=0){
			header("Location: ".base_url()."faqs/question_edit/$cat_id");
			exit;
		}
		
		
		$this->load->model('faqs_content/faqs_content_model');	
		$this->faqs_content_model->admin_faqs_question_update();
		header("Location: ".base_url()."faqs/question/$cat_id");
		exit;
	}
	public function admin_faqs_question_delete_content(){
		$cat_id = $this->uri->segment(4);
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$this->load->model('faqs_content/faqs_content_model');	
		$this->faqs_content_model->admin_faqs_question_delete();
		header("Location: ".base_url()."faqs/question/$cat_id");
		exit;
	}
	public function admin_faqs_view_content(){

		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$this->load->model('faqs_content/faqs_content_model');	
		$data['info'] = $this->faqs_content_model->admin_faqs();
		
		$this->load->view('admin_faqs_view_content',$data);
	}
}
?>
