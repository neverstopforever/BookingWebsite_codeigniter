<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Holiday_content extends MY_Controller {

    public function index() {
              exit;
    }
	
	public function admin_view_holiday_content(){
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$this->load->model('holiday_content/holiday_content_model');	
		$data["view_holiday"] = $this->holiday_content_model->admin_view_holiday();
		$this->load->view('admin_view_holidays_content',$data);
	}
	public function staff_view_holiday_content(){
		$access=$this->check_staff();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$this->load->model('holiday_content/holiday_content_model');	
		$data["view_holiday"] = $this->holiday_content_model->admin_view_holiday();
		$this->load->view('staff_view_holidays_content',$data);
	}
	public function admin_holiday_add_content(){
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$this->load->helper('holiday_content/holiday_content');
		$valid = add_user_form_validation();
		if($valid==0){
			$CI =& get_instance();
        	$CI->session->set_flashdata('error_message', "Fields Insertion Error");
    		header("Location:" . $this -> config -> base_url() . "holiday/view");
	    	exit;
		}
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$this->load->model('holiday_content/holiday_content_model');	
		$data["add_user"] = $this->holiday_content_model->admin_add_holiday();
		header("Location:" . $this -> config -> base_url() . "holiday/view");
	    exit;
	}
	public function staff_holiday_add_content(){
		$access=$this->check_staff();
		$this->panels_check_permission($access);
		$this->load->helper('holiday_content/holiday_content');
		$valid = add_user_form_validation();
		if($valid==0){
			$CI =& get_instance();
        	$CI->session->set_flashdata('error_message', "Fields Insertion Error");
    		header("Location:" . $this -> config -> base_url() . "holiday/view");
	    	exit;
		}
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$this->load->model('holiday_content/holiday_content_model');	
		$data["add_user"] = $this->holiday_content_model->admin_add_holiday();
		header("Location:" . $this -> config -> base_url() . "holiday/view");
	    exit;
	}
	public function admin_delete_holiday_content(){
	
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$this->load->model('holiday_content/holiday_content_model');	
		$this->holiday_content_model->admin_delete_holiday();
		header("Location:" . $this -> config -> base_url() . "holiday/view");
	    exit;
	
	}	
	public function staff_delete_holiday_content(){
	
		$access=$this->check_staff();
		$this->panels_check_permission($access);
		$this->load->model('holiday_content/holiday_content_model');	
		$this->holiday_content_model->admin_delete_holiday();
		header("Location:" . $this -> config -> base_url() . "holiday/view");
	    exit;
	
	}	
	
	public function admin_holiday_update_content(){
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$this->load->helper('holiday_content/holiday_content');
		$valid = add_holiday_form_validation();
		if($valid==0){
			$CI =& get_instance();
        	$CI->session->set_flashdata('error_message', "Fields Insertion Error");
    		header("Location:" . $this -> config -> base_url() . "holiday/view");
	    	exit;
		}
		
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$this->load->model('holiday_content/holiday_content_model');	
		$this->holiday_content_model->admin_update_holiday();
		header("Location:" . $this -> config -> base_url() . "holiday/view");
	    exit;
	}
	
	public function staff_holiday_update_content(){
		$access=$this->check_staff();
		$this->panels_check_permission($access);
		$this->load->helper('holiday_content/holiday_content');
		$valid = add_holiday_form_validation();
		if($valid==0){
			$CI =& get_instance();
        	$CI->session->set_flashdata('error_message', "Fields Insertion Error");
    		header("Location:" . $this -> config -> base_url() . "holiday/view");
	    	exit;
		}
		
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$this->load->model('holiday_content/holiday_content_model');	
		$this->holiday_content_model->admin_update_holiday();
		header("Location:" . $this -> config -> base_url() . "holiday/view");
	    exit;
	}
	public function admin_add_holiday_content(){
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$this->load->view('admin_add_user_content',$data);
	}
	public function admin_get_holiday_data(){
		 $access=$this->check_admin();
		 $this->panels_check_permission($access);
		 $holiday_id=$this->input->get("holiday_id");
		 $this->load->model('holiday_content/holiday_content_model');
		 $result=$this->holiday_content_model->get_data_ajax($holiday_id);
// 		
		 echo json_encode($result);exit;
	}
	
	public function staff_get_holiday_data(){
		 $access=$this->check_staff();
		 $this->panels_check_permission($access);
		 $holiday_id=$this->input->get("holiday_id");
		 $this->load->model('holiday_content/holiday_content_model');
		 $result=$this->holiday_content_model->get_data_ajax($holiday_id);
// 		
		 echo json_encode($result);exit;
	}
		
}
?>
