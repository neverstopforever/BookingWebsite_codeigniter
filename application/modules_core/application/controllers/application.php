<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Application extends MY_Controller {
    public function  __construct(){
	parent::__construct();
        //$this->no_cache();
        //$this->check_admin();
        $this->add_page_title("Application Form | Condo");
    }
    public function index(){
    		exit;
            
   	} 
	
	public function view(){
	
    		$allow_usertypes = array(1 => 'admin',2=>'staff');
			$usertype=$this->check_usertype_modules_core($allow_usertypes);
		    $this->load->view($usertype.'_all_applications');   
            
   	} 
	
	public function upload(){
	
    		$allow_usertypes = array(1 => 'admin',2=>'staff');
			$usertype=$this->check_usertype_modules_core($allow_usertypes);
		    $this->load->view($usertype.'_upload_applications');   
            
   	} 
	public function download(){
	
    		$allow_usertypes = array(1 => 'admin',2=>'staff',3=>'guard',4=>'resident');
			$usertype=$this->check_usertype_modules_core($allow_usertypes);
		    $this->load->view($usertype.'_download_applications');   
            
   	} 
	public function edit(){
			$allow_usertypes = array(1 => 'admin',2=>'staff');
			$usertype=$this->check_usertype_modules_core($allow_usertypes);
		    $this->load->view($usertype.'_edit_applications');   
            
   	} 
	
}
