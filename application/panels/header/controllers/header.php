<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Header extends MY_Controller {

    public function index() {
        exit;
    }
	
	public function login_header(){
		$this->load->view("login_header");
	}
	
	public function admin_header(){
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$this->load->view("admin_header");
	}
	
	public function staff_header(){
		$access=$this->check_staff();
		$this->panels_check_permission($access);
		$this->load->view("staff_header");
	}
	
	public function guard_header(){
		$access=$this->check_guard();
		$this->panels_check_permission($access);
		$this->load->view("guard_header");
	}
	
	public function resident_header(){
		$access=$this->check_resident();
		$this->panels_check_permission($access);
		$this->load->view("resident_header");
	}
}
?>
