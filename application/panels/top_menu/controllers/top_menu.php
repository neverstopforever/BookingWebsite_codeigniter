<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Top_menu extends MY_Controller {

    public function index() {
        exit;
    }
	
	public function admin(){
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$this->load->view('admin_top_menu');
	}
	
	public function staff(){
		$access=$this->check_staff();
		$this->panels_check_permission($access);
		$this->load->view('staff_top_menu');
	}
	
	public function guard(){
		$access=$this->check_guard();
		$this->panels_check_permission($access);
		$this->load->view('guard_top_menu');
	}
	
	public function resident(){
		$access=$this->check_resident();
		$this->panels_check_permission($access);
		$this->load->view('resident_top_menu');
	}
}
?>
