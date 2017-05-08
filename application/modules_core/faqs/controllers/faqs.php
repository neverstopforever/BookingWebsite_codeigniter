<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Faqs extends MY_Controller {
    public function  __construct(){
		parent::__construct();
        $this->add_page_title("Contact | Condo");
    }
    public function index(){
    	    $allow_usertypes = array(1 => 'admin');
			$usertype=$this->check_usertype_modules_core($allow_usertypes);
		    $this->load->view($usertype.'_faqs');   
    }
	public function add(){
    	    $allow_usertypes = array(1 => 'admin');
			$usertype=$this->check_usertype_modules_core($allow_usertypes);
		    $this->load->view($usertype.'_faqs_add');   
    }
	public function edit(){
    	    $allow_usertypes = array(1 => 'admin');
			$usertype=$this->check_usertype_modules_core($allow_usertypes);
		    $this->load->view($usertype.'_faqs_edit');   
    }   
	public function question(){
    	    $allow_usertypes = array(1 => 'admin');
			$usertype=$this->check_usertype_modules_core($allow_usertypes);
		    $this->load->view($usertype.'_faqs_question');   
    }  
	public function question_add(){
    	    $allow_usertypes = array(1 => 'admin');
			$usertype=$this->check_usertype_modules_core($allow_usertypes);
		    $this->load->view($usertype.'_faqs_question_add');   
    }
	public function question_edit(){
    	    $allow_usertypes = array(1 => 'admin');
			$usertype=$this->check_usertype_modules_core($allow_usertypes);
		    $this->load->view($usertype.'_faqs_question_edit');   
    }
	public function view(){
    	    $allow_usertypes = array(1 => 'admin',2=>'resident',3=>'staff',4=>'guard');
			$usertype=$this->check_usertype_modules_core($allow_usertypes);
		    $this->load->view($usertype.'_faqs_view');   
    }   
	// public function feedback(){
    		// $allow_usertypes = array(1 => 'resident');
			// $usertype=$this->check_usertype_modules_core($allow_usertypes);
			// $this->load->view($usertype.'_feedback');   
    // }
    // public function siteinfo(){
    		// $allow_usertypes = array(1 => 'admin');
			// $usertype=$this->check_usertype_modules_core($allow_usertypes);
			// $this->load->view($usertype.'_siteinfo');   
    // }
	  // public function edit(){
    		// $allow_usertypes = array(1 => 'admin');
			// $usertype=$this->check_usertype_modules_core($allow_usertypes);
			// $this->load->view($usertype.'_siteinfo_edit');   
    // }
//     
   
}
