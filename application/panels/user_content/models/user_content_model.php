<?php

class User_content_model extends MY_Model {
	public function __construct() {
		parent::__construct("app_user");
	}
	function admin_view_user(){
		$params = array(
		        "select" => "*",
		        "from" => "condo_users");
		$users = $this->find($params);
	
		return $users;
	}
	function admin_edit_user(){
		$id = $this->uri->segment(3);
		$params = array(
		        "select" => "*",
		        "from" => "condo_users",
				"where" =>"userid = '$id'");
		$users = $this->find($params);
		return $users;
	}
	function admin_update_user(){

		if($this->input->post('change_pass')=='on') {
		$pass = $this->input->post('password');
		$password = hash("sha256",$pass,False);	
		$params = array(
					"username"=> $this->input->post('username'),
					"first_name"=> $this->input->post('firstname'),
					"last_name"=> $this->input->post('lastname'),
					"password" => $password,
					"email"=> $this->input->post('email'),
					"block"=> $this->input->post('block'),
					"unit"=> $this->input->post('unitno'),
					"contact_no"=> $this->input->post('contactnumber'),
					"first_vehicle_registration_no"=> $this->input->post('first_vehicle_registration_no'),
					"second_vehicle_registration_no"=> $this->input->post('second_vehicle_registration_no'),
					"first_vehicle_iu_no"=> $this->input->post('first_vehicle_iu_no'),
					"second_vehicle_iu_no"=> $this->input->post('second_vehicle_iu_no'),
					"user_type"=> $this->input->post('usertype'),
					"status"=> $this->input->post('status')
				);
		} else {

		$params = array(
					"username"=> $this->input->post('username'),
					"first_name"=> $this->input->post('firstname'),
					"last_name"=> $this->input->post('lastname'),
					"email"=> $this->input->post('email'),
					"block"=> $this->input->post('block'),
					"unit"=> $this->input->post('unitno'),
					"contact_no"=> $this->input->post('contactnumber'),
					"first_vehicle_registration_no"=> $this->input->post('first_vehicle_registration_no'),
					"second_vehicle_registration_no"=> $this->input->post('second_vehicle_registration_no'),
					"first_vehicle_iu_no"=> $this->input->post('first_vehicle_iu_no'),
					"second_vehicle_iu_no"=> $this->input->post('second_vehicle_iu_no'),
					"user_type"=> $this->input->post('usertype'),
					"status"=> $this->input->post('status')
				);
		}
		$userid =  $this->input->post('userid');

		$this->update($params,"userid = '$userid'", "condo_users");
		$CI =& get_instance();
        $CI->session->set_flashdata('success_message', "User Has been Updated");
    		
	
	}
	function admin_add_user(){
		$count = $this->check_email_ajax($this->input->post('email'));
		$count2 = $this->check_username_ajax($this->input->post('username'));	
		if ($count!=0 || $count2 != 0){
			$CI =& get_instance();
        ////////////////form validation ///////////////////////
          	$CI->session->set_flashdata('success_message', "");
          	if ($count != 0)
            	$CI->session->set_flashdata('error_message', "Email Already Exist");
			else
				$CI->session->set_flashdata('error_message', "Username Already Exist"); 
		   header("Location:" . $this -> config -> base_url() . "user/add");
	       exit;
		return false;
		}else{
			
			
		/*$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$pass = '';
	    for ($i = 0; $i < 6; $i++) {
	        $pass .= $characters[rand(0, $charactersLength - 1)];
	    }	*/	
	    $pass = $this->input->post('password');
		$password = hash("sha256",$pass,False);	
		$params = array(
		        "username" => $this->input->post('username'),
		        "first_name" => $this->input->post('firstname'),
		        "last_name" => $this->input->post('lastname'),
		        "password" => $password,
		        "contact_no" => $this->input->post('contactnumber'),
		        "block" => $this->input->post('block'),
		        "email" => $this->input->post('email'),
		        "first_vehicle_registration_no" => $this->input->post('first_vehicle_registration_no'),
		        "second_vehicle_registration_no" => $this->input->post('second_vehicle_registration_no'),
		        "first_vehicle_iu_no" => $this->input->post('first_vehicle_iu_no'),
		        "second_vehicle_iu_no" => $this->input->post('second_vehicle_iu_no'),
		        "user_type" => $this->input->post('usertype'),
		        "unit" => $this->input->post('unitno'),
		        "status" => $this->input->post('status'),
		        "date_created" =>date("Y-m-d H:i:s")
		        );
				$this->insert($params,"condo_users");
		 		}
		return $pass;
	}
function admin_delete_user(){
			$CI =& get_instance();
        ////////////////form validation ///////////////////////
          	$id =  $this->uri->segment(3);
			$this->delete("userid = '$id'", "condo_user_bookings");
			$this->delete("userid = '$id'", "condo_notice_upload");
			$this->delete("userid = '$id'", "condo_holidays");
			$this->delete("userid = '$id'", "condo_guest_list");
			$this->delete("userid = '$id'", "condo_file_upload");
			$this->delete("userid = '$id'", "condo_contact");
			$this->delete("userid = '$id'", "condo_users");
          	$CI->session->set_flashdata('success_message', "User Has Been Successfully Deleted");
           
		}
function check_email_ajax($email){
		$where="email ='$email'";	
		$count=$this->count($where, "condo_users");
		return $count;
	}
	
function check_username_ajax($username){
		$where="username ='$username'";	
		$count=$this->count($where, "condo_users");
		return $count;
	}
		
}
?>
