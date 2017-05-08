<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {
    public function  __construct(){
	parent::__construct();
        //$this->no_cache();
        //$this->check_admin();
        $this->add_page_title("Login | emr");
    }
    public function index(){   
            $this->load->view('login');

   	} 
	public function forgot_password(){
		$this->add_page_title("Forgot Password | emr");
        $this->load->view('forgot_password');
    }
	public function password_reset(){
		$this->add_page_title("Reset Password | emr");
        $this->load->view('reset_code');
    }
}
