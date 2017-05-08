<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Renovation_content extends MY_Controller {

    public function index() {
        exit;
    }
	
	
	public function admin_view_renovation_content(){
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$this->load->model('renovation_content/renovation_content_model');	
		$data["view_renovation"] = $this->renovation_content_model->admin_get_renovation_list();
		$this->load->view('admin_view_renovation_content',$data);
	}
	public function admin_add_renovation_content(){
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$this->load->view('admin_add_renovation_content',$data);
	}
	public function admin_get_renovation_record(){
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$this->load->model('renovation_content/renovation_content_model');	
		$view_renovation = $this->renovation_content_model->admin_get_renovation();
		print_r($view_renovation);
		exit;
	}
	public function admin_add_renovation(){
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$this->load->model('renovation_content/renovation_content_model');	
		$result = $this->renovation_content_model->admin_add_renovation();
		if($result){
		header("Location:".base_url()."renovation/view");
		exit;	
		}else{
		header("Location:".base_url()."renovation/add");
		exit;
		}
	}

	public function admin_renovation_update(){
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$this->load->model('renovation_content/renovation_content_model');	
		$view_renovation = $this->renovation_content_model->admin_update_renovation();
		header("Location:".base_url()."renovation/view");
		exit;
	}



	public function admin_delete_renovation_content($id){
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$this->load->model('renovation_content/renovation_content_model');	
		$this->renovation_content_model->admin_delete_renovation($id);
		header("Location:".base_url()."renovation/view");
		exit;
	}
///////////////////////// staff  /////////////////////////////////


	public function staff_view_renovation_content(){
		$access=$this->check_staff();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$this->load->model('renovation_content/renovation_content_model');	
		$data["view_renovation"] = $this->renovation_content_model->admin_get_renovation_list();
		$this->load->view('staff_view_renovation_content',$data);
	}
	public function staff_add_renovation_content(){
		$access=$this->check_staff();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$this->load->view('staff_add_renovation_content',$data);
	}
	public function staff_get_renovation_record(){
		$access=$this->check_staff();
		$this->panels_check_permission($access);
		$this->load->model('renovation_content/renovation_content_model');	
		$view_renovation = $this->renovation_content_model->admin_get_renovation();
		print_r($view_renovation);
		exit;
	}
	public function staff_add_renovation(){
		$access=$this->check_staff();
		$this->panels_check_permission($access);
		$this->load->model('renovation_content/renovation_content_model');	
		$result = $this->renovation_content_model->admin_add_renovation();
		if($result){
		header("Location:".base_url()."renovation/view");
		exit;	
		}else{
		header("Location:".base_url()."renovation/add");
		exit;
		}
	}

	public function staff_renovation_update(){
		$access=$this->check_staff();
		$this->panels_check_permission($access);
		$this->load->model('renovation_content/renovation_content_model');	
		$view_renovation = $this->renovation_content_model->admin_update_renovation();
		header("Location:".base_url()."renovation/view");
		exit;
	}

	public function staff_delete_renovation_content($id){
		$access=$this->check_staff();
		$this->panels_check_permission($access);
		$this->load->model('renovation_content/renovation_content_model');	
		$this->renovation_content_model->admin_delete_renovation($id);
		header("Location:".base_url()."renovation/view");
		exit;
	}	
	
	
	/////////////////////// guard ////////////////////////////
	
	public function guard_view_renovation_content(){
		$access=$this->check_guard();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$this->load->model('renovation_content/renovation_content_model');	
		$data["view_renovation"] = $this->renovation_content_model->admin_get_renovation_list();
		$this->load->view('guard_view_renovation_content',$data);
	}
	public function guard_get_renovation_record(){
		$access=$this->check_guard();
		$this->panels_check_permission($access);
		$this->load->model('renovation_content/renovation_content_model');	
		$view_renovation = $this->renovation_content_model->admin_get_renovation();
		print_r($view_renovation);
		exit;
	}
	
	/////////////////////////// resident ///////////////////////////
	
	
	public function resident_view_renovation_content(){
		$access=$this->check_resident();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$this->load->model('renovation_content/renovation_content_model');	
		$data["view_renovation"] = $this->renovation_content_model->resident_get_renovation_list();
		$this->load->view('resident_view_renovation_content',$data);
	}
	public function resident_add_renovation_content(){
		$access=$this->check_resident();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$this->load->model('renovation_content/renovation_content_model');	
		$result = $this->renovation_content_model->get_resident_detail();
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$data['resident_detail']=$result;
		$this->load->view('resident_add_renovation_content',$data);
	}
	public function resident_get_renovation_record(){
		$access=$this->check_resident();
		$this->panels_check_permission($access);
		$this->load->model('renovation_content/renovation_content_model');	
		$view_renovation = $this->renovation_content_model->resident_get_renovation();
		print_r($view_renovation);
		exit;
	}
	public function resident_add_renovation(){
		$access=$this->check_resident();
		$this->panels_check_permission($access);
		$this->load->model('renovation_content/renovation_content_model');	
		$result = $this->renovation_content_model->admin_add_renovation();
		if($result){
		header("Location:".base_url()."renovation/view");
		exit;	
		}else{
		header("Location:".base_url()."renovation/add");
		exit;
		}
	}

	public function resident_renovation_update(){
		$access=$this->check_resident();
		$this->panels_check_permission($access);
		
		$this->load->model('renovation_content/renovation_content_model');	
		$view_renovation = $this->renovation_content_model->resident_update_renovation();
		header("Location:".base_url()."renovation/view");
		exit;
	}

	public function resident_delete_renovation_content($id){
		$access=$this->check_resident();
		$this->panels_check_permission($access);
		$this->load->model('renovation_content/renovation_content_model');	
		$this->renovation_content_model->resident_delete_renovation($id);
		header("Location:".base_url()."renovation/view");
		exit;
	}
	
	
}
?>
