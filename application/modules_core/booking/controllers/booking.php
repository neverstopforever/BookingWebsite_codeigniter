<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Booking extends MY_Controller {
    public function  __construct(){
	parent::__construct();
        //$this->no_cache();
        //$this->check_admin();
        $this->add_page_title("Booking | Condo");
    }
    public function index(){
    		exit;
            
   	} 
	
	public function view(){
    		$allow_usertypes = array(1 => 'admin',2=>'staff',3=>'guard',4=>'resident');
			$usertype=$this->check_usertype_modules_core($allow_usertypes);
		    $this->load->view($usertype.'_all_bookings');   
            
   	} 
	
	public function prenew(){
    		$allow_usertypes = array(1 => 'admin',2=>'staff',3=>'guard',4=>'resident');
			$usertype=$this->check_usertype_modules_core($allow_usertypes);
            $this->load->view($usertype.'_prenew_booking');   
            
   	}
	
	public function add(){
    		$allow_usertypes = array(1 => 'admin');
			$usertype=$this->check_usertype_modules_core($allow_usertypes);
			
            $this->load->view($usertype.'_create_specialists');   
            
   	}
	public function detail(){
    		$allow_usertypes = array(1 => 'admin',2=>'staff',3=>'guard',4=>'resident');
			$usertype=$this->check_usertype_modules_core($allow_usertypes);
			$this->load->view($usertype.'_detail_bookings');  
            
   	}
	public function create(){
			$allow_usertypes = array(1 => 'admin',2=>'staff',3=>'guard',4=>'resident');
			$usertype=$this->check_usertype_modules_core($allow_usertypes);
			$this->load->view($usertype.'_new_bookings');   
                
   	}
	public function success(){
			$allow_usertypes = array(1 => 'admin',2=>'staff',3=>'guard',4=>'resident');
			$usertype=$this->check_usertype_modules_core($allow_usertypes);
			$this->load->view($usertype.'_success_booking');   
                
   	}    
}
