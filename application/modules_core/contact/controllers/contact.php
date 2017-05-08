<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends MY_Controller {
    public function  __construct(){
		parent::__construct();
        $this->add_page_title("Contact | Condo");
    }
    public function index(){
    	    $allow_usertypes = array(1 => 'resident');
			$usertype=$this->check_usertype_modules_core($allow_usertypes);
		    $this->load->view($usertype.'_contact');   
    } 
	public function feedback(){
    		$allow_usertypes = array(1 => 'resident');
			$usertype=$this->check_usertype_modules_core($allow_usertypes);
			$this->load->view($usertype.'_feedback');   
    }
    public function siteinfo(){
    		$allow_usertypes = array(1 => 'admin');
			$usertype=$this->check_usertype_modules_core($allow_usertypes);
			$this->load->view($usertype.'_siteinfo');   
    }
	  public function edit(){
    		$allow_usertypes = array(1 => 'admin');
			$usertype=$this->check_usertype_modules_core($allow_usertypes);
			$this->load->view($usertype.'_siteinfo_edit');   
    }
    
   
}
