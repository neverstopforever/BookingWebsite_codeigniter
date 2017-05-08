<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Footer_content extends MY_Controller {

    public function index() {
        exit;
    }
	
	public function admin(){
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$this->load->view('admin_footer_content');
	}
	public function success(){
		$this->load->view('success_footer_content');
	}
	public function staff(){
		$access=$this->check_staff();
		$this->panels_check_permission($access);
		$this->load->view('staff_footer_content');
	}
	
	public function guard(){
		$access=$this->check_guard();
		$this->panels_check_permission($access);
		$this->load->view('guard_footer_content');
	}
	
	public function resident(){
		$access=$this->check_resident();
		$this->panels_check_permission($access);
		$this->load->view('resident_footer_content');
	}
}
?>
