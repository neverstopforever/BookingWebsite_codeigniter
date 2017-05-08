<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Booking_content extends MY_Controller {

    public function index() {
        exit;
    }
	

	public function staff_view_booking_content(){
		$access=$this->check_staff();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$this->load->model('booking_content/booking_content_model');	
		$data["view_booking"] = $this->booking_content_model->admin_view_booking();
		$this->load->view('staff_view_booking_content',$data);
	}
	public function staff_prenew_booking_content(){
		$access=$this->check_staff();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
        $error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$this->load->view('staff_prenew_booking_content',$data);
	}
	public function staff_new_booking_content(){

		$access=$this->check_staff();
		$this->panels_check_permission($access);
		$this->load->model('booking_content/booking_content_model');	
		
		if($this->uri->segment(4)){
			
			$success_message = $this->session->flashdata('success_message');
        	$error_message = $this->session->flashdata('error_message');
			$rules = $this->booking_content_model->admin_get_availabities();
			$rules['success_message']=$success_message;
			$rules['error_message']=$error_message;
			$this->load->view('staff_availabities_booking_content',$rules);
		}else{
			$rules = $this->booking_content_model->admin_check_rules();
			$this->load->view('staff_new_booking_content',$rules);
		}
	}
	public function staff_save_booking_content(){

		$access=$this->check_staff();
		$this->panels_check_permission($access);
		$this->load->model('booking_content/booking_content_model');	
		$this->booking_content_model->admin_save_booking();
		header("Location:".base_url()."booking/success");		
		exit;
	}
	
	public function staff_update_booking_content($status, $booking_id){
		$access=$this->check_staff();
		$this->panels_check_permission($access);
		$this->load->model('booking_content/booking_content_model');	
		$this->booking_content_model->admin_update_booking($status,$booking_id);
		header("Location:".base_url()."booking/view");		
		exit;
	}
	
	public function staff_detail_booking_content(){
		$access=$this->check_staff();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		
		$this->load->model('booking_content/booking_content_model');	
		$data["detail_booking"] = $this->booking_content_model->admin_detail_booking();
		
		$this->load->view('staff_detail_booking_content',$data);
	}
	//////// Guard ////////////
	
	public function guard_view_booking_content(){
			
		$access=$this->check_guard();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$this->load->model('booking_content/booking_content_model');	
		$data["view_booking"] = $this->booking_content_model->admin_view_booking();
		$this->load->view('guard_view_booking_content',$data);
	}
	public function guard_prenew_booking_content(){
		$access=$this->check_guard();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
        $error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$this->load->view('guard_prenew_booking_content',$data);
	}
	public function guard_new_booking_content(){
	
		$access=$this->check_guard();
		$this->panels_check_permission($access);
		$this->load->model('booking_content/booking_content_model');	
		
		if($this->uri->segment(4)){
		
			$success_message = $this->session->flashdata('success_message');
        	$error_message = $this->session->flashdata('error_message');
			$rules = $this->booking_content_model->admin_get_availabities();
			$rules['success_message']=$success_message;
			$rules['error_message']=$error_message;
			$this->load->view('guard_availabities_booking_content',$rules);
		}else{
			$rules = $this->booking_content_model->admin_check_rules();
			$this->load->view('guard_new_booking_content',$rules);
		}
	}
	public function guard_save_booking_content(){

		$access=$this->check_guard();
		$this->panels_check_permission($access);
		$this->load->model('booking_content/booking_content_model');	
		$this->booking_content_model->admin_save_booking();
		header("Location:".base_url()."booking/success");		
		exit;
	}
	
	public function guard_update_booking_content($status, $booking_id){
		$access=$this->check_guard();
		$this->panels_check_permission($access);
		$this->load->model('booking_content/booking_content_model');	
		$this->booking_content_model->admin_update_booking($status,$booking_id);
		header("Location:".base_url()."booking/view");		
		exit;
	}
	public function guard_detail_booking_content(){
		$access=$this->check_guard();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		
		$this->load->model('booking_content/booking_content_model');	
		$data["detail_booking"] = $this->booking_content_model->admin_detail_booking();
		
		$this->load->view('guard_detail_booking_content',$data);
	}
	
	/////// resident ////////
	
	
	public function resident_view_booking_content(){
		$access=$this->check_resident();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$this->load->model('booking_content/booking_content_model');	
		$data["view_booking"] = $this->booking_content_model->resident_view_booking();
		$this->load->view('resident_view_booking_content',$data);
	}
	public function resident_prenew_booking_content(){
		$access=$this->check_resident();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
        $error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$this->load->view('resident_prenew_booking_content',$data);
	}
	public function resident_new_booking_content(){
		$access=$this->check_resident();
		$this->panels_check_permission($access);
		$this->load->model('booking_content/booking_content_model');	
		
		if($this->uri->segment(4)){
			
			$success_message = $this->session->flashdata('success_message');
        	$error_message = $this->session->flashdata('error_message');
			$rules = $this->booking_content_model->resident_get_availabities();
			$rules['success_message']=$success_message;
			$rules['error_message']=$error_message;
			$this->load->view('resident_availabities_booking_content',$rules);
		
		}else{
			
			$rules = $this->booking_content_model->admin_check_rules();
			$this->load->view('resident_new_booking_content',$rules);
		}
	}
	public function resident_save_booking_content(){

		$access=$this->check_resident();
		$this->panels_check_permission($access);
		$this->load->model('booking_content/booking_content_model');	
		$this->booking_content_model->admin_save_booking();
		header("Location:".base_url()."booking/success");		
		exit;
	}
	
	public function resident_update_booking_content($status, $booking_id){
		$access=$this->check_resident();
		$this->panels_check_permission($access);
		$this->load->model('booking_content/booking_content_model');	
		$this->booking_content_model->admin_update_booking($status,$booking_id);
		header("Location:".base_url()."booking/view");		
		exit;
	}
	
	public function resident_detail_booking_content(){
		$access=$this->check_resident();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		
		$this->load->model('booking_content/booking_content_model');	
		$data["detail_booking"] = $this->booking_content_model->admin_detail_booking();
		
		$this->load->view('resident_detail_booking_content',$data);
	}
	
	
	public function admin_prenew_booking_content(){
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
        $error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		
		$this->load->view('admin_prenew_booking_content',$data);
	}
	

	
	
	
	
	
	public function admin_view_booking_content(){
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$this->load->model('booking_content/booking_content_model');	
		$data["view_booking"] = $this->booking_content_model->admin_view_booking();
		$this->load->view('admin_view_booking_content',$data);
	}
	public function admin_new_booking_content(){
		//echo $_SERVER[REQUEST_URI];exit;
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$this->load->model('booking_content/booking_content_model');	
		
		if($this->uri->segment(4)){
			$success_message = $this->session->flashdata('success_message');
        	$error_message = $this->session->flashdata('error_message');
			$rules = $this->booking_content_model->admin_get_availabities();
			$rules['success_message']=$success_message;
			$rules['error_message']=$error_message;
			$this->load->view('admin_availabities_booking_content',$rules);
		
		}else{
			$rules = $this->booking_content_model->admin_check_rules();
			$this->load->view('admin_new_booking_content',$rules);
		}
	}
	public function admin_detail_booking_content(){
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		
		$this->load->model('booking_content/booking_content_model');	
		$data["detail_booking"] = $this->booking_content_model->admin_detail_booking();
		
		$this->load->view('admin_detail_booking_content',$data);
	}
	public function admin_save_booking_content(){
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$this->load->model('booking_content/booking_content_model');	
		$this->booking_content_model->admin_save_booking();
		header("Location:".base_url()."booking/success");		
		exit;
	}
	public function admin_update_booking_content($status, $booking_id){
			
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$this->load->model('booking_content/booking_content_model');	
		$this->booking_content_model->admin_update_booking($status,$booking_id);
		header("Location:".base_url()."booking/view");		
		exit;
	}
	public function admin_edit_update_booking_content(){
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$this->load->model('booking_content/booking_content_model');	
		$this->booking_content_model->admin_edit_update_booking();
		header("Location:".base_url()."booking/view");		
		exit;
	}
 public function admin_export_content()
	{	
		$this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
		$filename = "x.csv";
		$this->load->model('booking_content/booking_content_model');	
		$result = $this->booking_content_model->admin_export_booking();
	    $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        
        force_download($filename, $data);
	}
	public function admin_success_booking_content(){
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$deposit = $this->session->flashdata('deposit');
		$data['success_message']=$success_message;
		$data['deposit']=$deposit;
		$data['error_message']=$error_message;
		if($deposit != ""){
			$this->load->view('admin_success_booking_content',$data);
		 }else{
			header("Location:".base_url()."booking/view");		
			exit;
		 }
	}
	public function staff_success_booking_content(){
		$access=$this->check_staff();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$deposit = $this->session->flashdata('deposit');
		$data['success_message']=$success_message;
		$data['deposit']=$deposit;
		$data['error_message']=$error_message;
		if($deposit != ""){
			$this->load->view('staff_success_booking_content',$data);
		}else{
			header("Location:".base_url()."booking/view");		
			exit;
		}
	}
	public function guard_success_booking_content(){
		$access=$this->check_guard();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$deposit = $this->session->flashdata('deposit');
		$data['success_message']=$success_message;
		$data['deposit']=$deposit;
		$data['error_message']=$error_message;
		if($deposit != ""){
			$this->load->view('guard_success_booking_content',$data);
		}else{
			header("Location:".base_url()."booking/view");		
			exit;
		}
	}
	public function resident_success_booking_content(){
		$access=$this->check_resident();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$deposit = $this->session->flashdata('deposit');
		$data['success_message']=$success_message;
		$data['deposit']=$deposit;
		$data['error_message']=$error_message;
		if($deposit != ""){
			$this->load->view('resident_success_booking_content',$data);
		}else{
			header("Location:".base_url()."booking/view");		
			exit;
		}
	}
	
	
	
}
?>
