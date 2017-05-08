<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Contact_content extends MY_Controller {

    public function index() {
              exit;
    }
	
	public function resident_contact_content(){
		$access=$this->check_resident();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$this->load->view('resident_contact_content',$data);
	}
		
		
	public function resident_add_contact()
	{
		$access=$this->check_resident();
		$this->panels_check_permission($access);
		$this->load->model('contact_content/contact_content_model');	
		$this->contact_content_model->resident_contact_submit();
		header("Location:".base_url()."contact");		
		exit;
		}
	public function resident_feedback_content(){
		$access=$this->check_resident();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$this->load->view('resident_feedback_content',$data);
	}
		
		
	public function resident_add_feedback()
	{
		$access=$this->check_resident();
		$this->panels_check_permission($access);
		$this->load->model('contact_content/contact_content_model');	
		$this->contact_content_model->resident_feedback_submit();
		header("Location:".base_url()."contact/feedback");		
		exit;
		}
	public function admin_siteinfo_content(){
	
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$this->load->model('contact_content/contact_content_model');	
		$data['info'] = $this->contact_content_model->admin_siteinfo();
		$this->load->view('admin_siteinfo_content',$data);
	}
		public function admin_siteinfo_edit_content(){

		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$this->load->model('contact_content/contact_content_model');	
		$data['info'] = $this->contact_content_model->admin_siteinfo();
		$this->load->view('admin_siteinfo_edit_content',$data);
	}
		
	public function admin_update_siteinfo_content(){
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$this->load->model('contact_content/contact_content_model');	
		$this->contact_content_model->admin_update_siteinfo();
		header("Location:".base_url()."contact/siteinfo");		
		exit;
			}
	
	
}
?>
