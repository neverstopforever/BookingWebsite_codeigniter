<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//
class MY_Controller extends MX_Controller {
    
  
    public function  __construct()
    {   
        parent::__construct();
        /*
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");
        $islogin=$this->session->userdata('is_logged_in');
        if($islogin!=1){
           header("Location:".$this->config->base_url()."login_content/logout");
            exit;
            //redirect(base_url('localhost/page_login'));
             //header("Location: /page_login/index");
            //redirect('/');
        }*/
    }
    public function check_usertype_modules_core($allow_usertypes){
    	//this function will use to check module cores function access permissionds
    	 
		 $user_type=$this->session->userdata('user_type');
		 $key = array_search($user_type, $allow_usertypes);
		 if($key!=false){
		 	return $user_type;
		 }
		 else{
		 	$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
			$this->output->set_header("Pragma: no-cache");
			header("Location:".$this->config->base_url()."login_content/logout");
            exit;
		 }
		 
		
    }
    public function check_admin(){
    	
		//$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
		//$this->output->set_header("Pragma: no-cache");
        $user_type=$this->session->userdata('user_type');
        
        if ($user_type != "admin" ){
            return 0;
            exit;
        }
		else{
			return 1;
		}
    }
    
    public function check_staff(){
    	
		//$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
		//$this->output->set_header("Pragma: no-cache");
        $user_type=$this->session->userdata('user_type');
        
        if ($user_type != "staff" ){
            return 0;
            exit;
        }
		else{
			return 1;
		}
    }
	
	public function check_guard(){
    	
		//$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
		//$this->output->set_header("Pragma: no-cache");
        $user_type=$this->session->userdata('user_type');
        
        if ($user_type != "guard" ){
            return 0;
            exit;
        }
		else{
			return 1;
		}
    }
	
	public function check_resident(){
    	
		//$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
		//$this->output->set_header("Pragma: no-cache");
        $user_type=$this->session->userdata('user_type');
        
        if ($user_type != "resident" ){
            return 0;
            exit;
        }
		else{
			return 1;
		}
    }
	
    public function checkSession(){
         $islogin=$this->session->userdata('is_logged_in');
          if(!isset($islogin) || $islogin==0){
            //redirect(base_url('localhost/page_login'));
             
            redirect('/');
        }
         
    }
    
    public function add_page_title($title){
        $page_title = array(
                'page_title' => $title
            );
            $this->session->set_userdata($page_title);
    }
	
	public function get_user_ip() {
		$ip = "";
		if (isset($_SERVER["REMOTE_ADDR"])) {
			$ip = $_SERVER["REMOTE_ADDR"];
		} else if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
			$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
		} else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
			$ip = $_SERVER["HTTP_CLIENT_IP"];
		}

		return $ip;
	}
	public function panels_check_permission($access=0){
		if($access==0){
			if($this->session->userdata('user_type')){
			
			$_error =& load_class('Exceptions', 'core');
    		$template=$_error->show_401($status_code = 401);
			exit;
			}
			else{
			$_error =& load_class('Exceptions', 'core');
    		$template=$_error->show_401($status_code = 404);
			exit;
			}
		}
		else{
			
			return 1;
		}
	}
    
    protected function no_cache(){
        
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0',false);
header('Pragma: no-cache'); 
}
	
}
