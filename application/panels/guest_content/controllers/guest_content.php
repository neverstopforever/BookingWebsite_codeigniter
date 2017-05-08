<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Guest_content extends MY_Controller {

    public function index() {
        exit;
    }
	
	
	public function admin_view_guest_content(){
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$this->load->model('guest_content/guest_content_model');	
		$data["view_guest"] = $this->guest_content_model->admin_get_guest_list();
		
		$this->load->view('admin_view_guest_content',$data);
	}
	public function admin_add_guest_content(){
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$this->load->view('admin_add_guest_content',$data);
	}
	public function admin_get_guest_record(){
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$this->load->model('guest_content/guest_content_model');	
		$view_guest = $this->guest_content_model->admin_get_guest();
		print_r($view_guest);
		exit;
	}
	public function admin_add_guest(){
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$this->load->model('guest_content/guest_content_model');	
		$result = $this->guest_content_model->admin_add_guest();
		if($result){
		header("Location:".base_url()."guest/view");
		exit;	
		}else{
		header("Location:".base_url()."guest/add");
		exit;
		}
	}

	public function admin_guest_update(){
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$this->load->model('guest_content/guest_content_model');	
		$view_guest = $this->guest_content_model->admin_update_guest();
		header("Location:".base_url()."guest/view");
		exit;
	}



	public function admin_delete_guest_content($id){
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$this->load->model('guest_content/guest_content_model');	
		$this->guest_content_model->admin_delete_guest($id);
		header("Location:".base_url()."guest/view");
		exit;
	}
///////////////////////// staff  /////////////////////////////////


	public function staff_view_guest_content(){
		$access=$this->check_staff();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$this->load->model('guest_content/guest_content_model');	
		$data["view_guest"] = $this->guest_content_model->admin_get_guest_list();
		$this->load->view('staff_view_guest_content',$data);
	}
	public function staff_add_guest_content(){
		$access=$this->check_staff();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$this->load->view('staff_add_guest_content',$data);
	}
	public function staff_get_guest_record(){
		$access=$this->check_staff();
		$this->panels_check_permission($access);
		$this->load->model('guest_content/guest_content_model');	
		$view_guest = $this->guest_content_model->admin_get_guest();
		print_r($view_guest);
		exit;
	}
	public function staff_add_guest(){
		$access=$this->check_staff();
		$this->panels_check_permission($access);
		$this->load->model('guest_content/guest_content_model');	
		$result = $this->guest_content_model->admin_add_guest();
		if($result){
		header("Location:".base_url()."guest/view");
		exit;	
		}else{
		header("Location:".base_url()."guest/add");
		exit;
		}
	}

	public function staff_guest_update(){
		$access=$this->check_staff();
		$this->panels_check_permission($access);
		$this->load->model('guest_content/guest_content_model');	
		$view_guest = $this->guest_content_model->admin_update_guest();
		header("Location:".base_url()."guest/view");
		exit;
	}

	public function staff_delete_guest_content($id){
		$access=$this->check_staff();
		$this->panels_check_permission($access);
		$this->load->model('guest_content/guest_content_model');	
		$this->guest_content_model->admin_delete_guest($id);
		header("Location:".base_url()."guest/view");
		exit;
	}	
	
	
	/////////////////////// guard ////////////////////////////
	
	public function guard_view_guest_content(){
		$access=$this->check_guard();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$this->load->model('guest_content/guest_content_model');	
		$data["view_guest"] = $this->guest_content_model->admin_get_guest_list();
		$this->load->view('guard_view_guest_content',$data);
	}
	public function guard_get_guest_record(){
		$access=$this->check_guard();
		$this->panels_check_permission($access);
		$this->load->model('guest_content/guest_content_model');	
		$view_guest = $this->guest_content_model->admin_get_guest();
		print_r($view_guest);
		exit;
	}
	
	/////////////////////////// resident ///////////////////////////
	
	
	public function resident_view_guest_content(){
		$access=$this->check_resident();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$this->load->model('guest_content/guest_content_model');	
		$data["view_guest"] = $this->guest_content_model->resident_get_guest_list();
		$this->load->view('resident_view_guest_content',$data);
	}
	public function resident_add_guest_content(){
		$access=$this->check_resident();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$this->load->model('guest_content/guest_content_model');	
		$result = $this->guest_content_model->get_resident_detail();
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$data['resident_detail']=$result;
		$this->load->view('resident_add_guest_content',$data);
	}
	public function resident_get_guest_record(){
		$access=$this->check_resident();
		$this->panels_check_permission($access);
		$this->load->model('guest_content/guest_content_model');	
		$view_guest = $this->guest_content_model->resident_get_guest();
		print_r($view_guest);
		exit;
	}
	public function resident_add_guest(){
		$access=$this->check_resident();
		$this->panels_check_permission($access);
		$this->load->model('guest_content/guest_content_model');	
		$result = $this->guest_content_model->admin_add_guest();
		if($result){
		header("Location:".base_url()."guest/view");
		exit;	
		}else{
		header("Location:".base_url()."guest/add");
		exit;
		}
	}

	public function resident_guest_update(){
		$access=$this->check_resident();
		$this->panels_check_permission($access);
		
		$this->load->model('guest_content/guest_content_model');	
		$view_guest = $this->guest_content_model->resident_update_guest();
		header("Location:".base_url()."guest/view");
		exit;
	}

	public function resident_delete_guest_content($id){
		$access=$this->check_resident();
		$this->panels_check_permission($access);
		$this->load->model('guest_content/guest_content_model');	
		$this->guest_content_model->resident_delete_guest($id);
		header("Location:".base_url()."guest/view");
		exit;
	}
	
	
}
?>
