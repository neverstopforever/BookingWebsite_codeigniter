<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Login_content extends MX_Controller {

	public function __construct() {
		parent::__construct();

	}

	public function index($login_error = 0) {
		
		$this -> load -> helper('cookie');
		$this -> load -> helper('login_content/login_content');
		$this -> load -> model('login_content/login_content_model');
		
		$data['username'] = $this -> input -> cookie('remember');
		if ($login_error == 1) {
			$data['message'] = "yes";
		} else {
			$data['message'] = "no";
		}
		$this -> load -> view('login_content', $data);
	}
	
	public function password_reset() {
		$this->load->helper('captcha');
		$length = 6;
        $words  = "abcdefghijlmnopqrstvwyz";
        $vocals = "aeiou";

        $text  = "";
        $vocal = rand(0, 1);
        for ($i=0; $i<$length; $i++) {
            if ($vocal) {
                $text .= substr($vocals, mt_rand(0, 4), 1);
            } else {
                $text .= substr($words, mt_rand(0, 22), 1);
            }
            $vocal = !$vocal;
        }
		$vals = array(
		    'word' => $text,
		    'img_path' => getcwd().'/r/captcha/',
		    'img_url' => $this->config->base_url().'r/captcha/',
		    'font_path' =>  getcwd().'/r/resources/fonts/Ding-DongDaddyO.ttf',
		    'img_width' => '180',
		    'img_height' => 50,
		    'expiration' => 120
		);
		//print_r(phpinfo());exit;
		$cap = create_captcha($vals);
		$data = array('image' => $cap['image'], 'word'=>$cap['word']);
		//print_r($cap);exit;
		$this -> load -> view('reset_code', $data);
	}

	public function login_validate() {
		$username = $this -> input -> post('username');
		$this -> load -> helper('login_content/login_content');
		$this -> load -> model('login_content/login_content_model');
		$validate = $this -> login_content_model -> validate();
	if ($validate != 0) {
			if ($validate->user_type == "admin" || $validate->user_type == "staff" || $validate->user_type == "guard") {
				save_user_session($username, $validate);
				header("Location:" . $this -> config -> base_url() . "booking/view");
				exit;
			}
			else if ($validate->user_type == "resident") {
				save_user_session($username, $validate);
				header("Location:" . $this -> config -> base_url() . "booking/view");
				exit ;
			}
			else{
				header("Location:" . $this -> config -> base_url() . "login/index?error=1");
				exit ;
			}
		} else {// incorrect username or password
			header("Location:" . $this -> config -> base_url() . "login/index?error=1");
			exit ;
		}
	}


	public function register_user_form(){
		$data=array();
		$data = $this->session->flashdata('user_add_data');
		$this -> load -> view('register_user_content', $data);
	}
	
	public function create_user(){
		$validation_type='add';
        $this->load->helper('login_content/login_content');
		
        $valid=add_user_form_validation();
		
		if($valid==0){
        	    
            redirect($this->config->base_url().'register'); // change module_name with your module name
            exit;
        }
		else{
			$this -> load -> model('login_content/login_content_model');
			$validate = $this -> login_content_model -> create_user();
		}
		
	}
	
	
	public function logout() {
		//remove PHPSESSID from browser
		if (isset($_COOKIE[session_name()]))
			setcookie(session_name(), "", time() - 3600, "/");
		//clear session from globals
		$_SESSION = array();
		//clear session from disk
		//session_destroy();
		$this -> session -> userdata('user_type') == '';
		//$this->session->unset_userdata('user_type');
		$this -> session -> unset_userdata('is_logged_in');
		$this -> session -> unset_userdata('userid');
		$this -> session -> unset_userdata('username');
		unset($this -> session -> userdata);
		$this -> session -> sess_destroy();

		//print_r($this->session->userdata);exit;
		//$this->session->set_userdata(array(
		// 'user_id'  => 0,
		//any others you created upon user login
		//));
		//foreach (array_keys($this->session->userdata) as $key) {
		//    $this->session->unset_userdata($key);
		// }
		header("Location:" . $this -> config -> base_url() . "login");
		exit ;
	}

}
