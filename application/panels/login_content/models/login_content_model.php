<?php

class Login_content_model extends MY_Model {
	public function __construct() {
		parent::__construct("app_user");
	}

	function validate($attempt) {
		$username = $this -> input -> post('username');
		$pass=$this->input->post("password");
		$password = hash("sha256",$pass,False);
		
		$login_data = $this->findOneBy(array(
		"username" => $username,
		"password" => $password,
		"status" => "Active"
		),'condo_users');
		if($login_data!=0){
		$this->update(array(
		"last_logged_in" => date("Y/m/d H:i")
		),"userid = '$login_data->userid'",'condo_users');
		}
		return $login_data;
	}
	
	
		function create_user(){
			
			$url = "/users/register";
			$data = array(
	                'first_name' => $this->input->post('first_name'),
	                'last_name'=>$this->input->post('last_name'),
	                'email'=>$this->input->post('email'),
	                'phone'=>$this->input->post('phone'),
	                'status'=>"Active"
	                 
	        );
			
			$actions = factory::getCEServiceInstance();
				$username = $this -> input -> post('email');
				$guid="248b46ea-d297d5e66b6a-f046c0de5bd0";
				$pass=$this->input->post("password").$guid;
				$password = hash("sha256",$pass,False);
				$bstr = $username . ":" . $password;
				
				$header['Key']="RneMXqHt1h8dvPz4Ey53FOxyz";
				$header['Authorization'] = "Basic " . base64_encode($bstr);
				
				$result = $actions-> post($url, $header,$data);
				print_r($result);exit;
		
		
			if (isset($result['status']) && $result['status'] == "Success"){
				$CI =& get_instance();
				$CI->session->set_flashdata('success_message', "User has been Created Succesfully");
				if(isset($is_value))
					return $result['data'];
				else
					return 1;
			}
			else {
				$CI =& get_instance();
				$CI->session->set_flashdata('error_message', "Sorry,User not Created.Please try again.");
				return 0;
			}
		}
	
	function check_unique_email($email){
        $where="email ='$email'";
       
       
       $count=$this->count($where, "dr_users");
        
        return $count;
    }
	
	function check_reset_code($reset_code){
		$user_type = $this -> findOneBy(array("reset_code" => $reset_code), 'password_resets');
		return $user_type;
	}

	function insert_password_history($user) {
		$data = array("user_id" => $user -> user_id, "user_password" => $user -> password, "timestamp" => date("Y-m-d H:i:s"));
		$this->db->insert('password_history', $data); 
	}

	function insert_reset_password($user, $token, $timeafteronehour) {
		$data = array("reset_code" => $token, "user_id" => $user -> user_id, "expiration" => $timeafteronehour, "created_date" => date('Y-m-d H:i:s'), "used" => 0, "creator_id" => $user -> user_id);
		return $this->db->insert('password_resets',$data);
		
	}

	function update_reset_password($user, $unique_code) {
		$data = array('password' => hash("sha256",$unique_code,False), 'password_change_required'=> '1', 'last_password_change_date'=>date("Y-m-d H:i:s"), 'updated_date' => date('Y-m-d H:i:s'), 'updater_id' => $user -> user_id);
		$this -> db -> where('user_id', $user -> user_id);
		$this -> db -> update('system_users', $data);
		return true;
	}

	function update_user_password($user, $new_password) {
		$data = array('password' => hash("sha256",$new_password,False), 'password_change_required'=> '0', 'last_password_change_date'=>date("Y-m-d H:i:s"), 'updated_date' => date('Y-m-d H:i:s'), 'updater_id' => $user -> user_id);
		$this -> db -> where('user_id', $user -> user_id);
		$this -> db -> update('system_users', $data);
		return true;
	}
	
	function update_password_used($user, $reset_code) {
		$data = array('used' =>'1','updated_date' => date('Y-m-d H:i:s'), 'updater_id' => $user -> user_id);
		$this -> db -> where('user_id', $user -> user_id, 'reset_code', $reset_code);
		$this -> db -> update('password_resets', $data);
		return true;
	}

	}
?>
