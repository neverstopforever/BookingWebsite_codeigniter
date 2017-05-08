<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Holiday extends MY_Controller {
    public function  __construct(){
	parent::__construct();
        $this->add_page_title("Holiday | Condo");
    }
    public function view(){
    	    $allow_usertypes = array(1 => 'admin',2=>'staff');
			$usertype=$this->check_usertype_modules_core($allow_usertypes);
		    $this->load->view($usertype.'_all_holidays');   
    } 
	public function add(){
    		$allow_usertypes = array(1 => 'admin',2=>'staff');
			$usertype=$this->check_usertype_modules_core($allow_usertypes);
			$this->load->view($usertype.'_add_holidays');   
    }
	public function edit(){
    		$allow_usertypes = array(1 => 'admin',2=>'staff');
			$usertype=$this->check_usertype_modules_core($allow_usertypes);
			$this->load->view($usertype.'_edit_holidays');   
    }
// 	
	// public function view(){
    		// $allow_usertypes = array(1 => 'admin');
			// $usertype=$this->check_usertype_modules_core($allow_usertypes);
		    // $this->load->view($usertype.'_all_bookings');   
//             
   	// } 
// 	
	// public function prenew(){
    		// $allow_usertypes = array(1 => 'admin',2=>'staff',3=>'guard',4=>'resident');
			// $usertype=$this->check_usertype_modules_core($allow_usertypes);
            // $this->load->view($usertype.'_prenew_booking');   
//             
   	// }
// 	
	
	// public function edit(){
    		// $allow_usertypes = array(1 => 'admin',2=>'staff',3=>'guard',4=>'resident');
			// $usertype=$this->check_usertype_modules_core($allow_usertypes);
			// $this->load->view($usertype.'_edit_bookings');  
//             
   	// }
	// public function create(){
			// $allow_usertypes = array(1 => 'admin',2=>'staff',3=>'guard',4=>'resident');
			// $usertype=$this->check_usertype_modules_core($allow_usertypes);
			// $this->load->view($usertype.'_new_bookings');   
//                 
   	// }    
}
