<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guest extends MY_Controller {
    public function  __construct(){
	parent::__construct();
        $this->add_page_title("Guest List | Condo");
    }
    public function index(){
    	exit;
    } 
	
	public function view(){
    		$allow_usertypes = array(1 => 'admin',2=>'staff',3=>'guard',4=>'resident');
			$usertype=$this->check_usertype_modules_core($allow_usertypes);
		    $this->load->view($usertype.'_view_guests');   
   	} 
	
	public function add(){
			$allow_usertypes = array(1 => 'admin',2=>'staff',3=>'resident');
			$usertype=$this->check_usertype_modules_core($allow_usertypes);
		    $this->load->view($usertype.'_add_guest');   
    } 
	public function edit(){
			$allow_usertypes = array(1 => 'admin',2=>'staff',3=>'resident');
			$usertype=$this->check_usertype_modules_core($allow_usertypes);
		    $this->load->view($usertype.'_edit_applications');   
            
   	} 
	
}
