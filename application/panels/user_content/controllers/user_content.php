<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_content extends MY_Controller {

    public function index() {
              exit;
    }
	
	public function admin_view_user_content(){
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$this->load->model('user_content/user_content_model');	
		$data["view_user"] = $this->user_content_model->admin_view_user();
		$this->load->view('admin_view_users_content',$data);
	}
	public function staff_view_user_content(){
		$access=$this->check_staff();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$this->load->model('user_content/user_content_model');	
		$data["view_user"] = $this->user_content_model->admin_view_user();
		$this->load->view('staff_view_users_content',$data);
	}
	
	public function staff_edit_user_content(){
		
		$access=$this->check_staff();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$user_edit_data = $this->session->flashdata('user_edit_data');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$data['user_edit_data']=$user_edit_data;
		$this->load->model('user_content/user_content_model');	
		$data["edit_user"] = $this->user_content_model->admin_edit_user();
		$this->load->view('staff_edit_user_content',$data);
	}
	
	public function admin_edit_user_content(){
		
		$this->load->model('user_content/user_content_model');	
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$user_edit_data = $this->session->flashdata('user_edit_data');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$data['user_edit_data']=$user_edit_data;
		
		$data["edit_user"] = $this->user_content_model->admin_edit_user();
		$this->load->view('admin_edit_user_content',$data);
	}
	
	public function admin_update_user_content($id){
		
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		/*$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;*/
		$this->load->helper('user_content/user_content');
		$valid = edit_user_form_validation();
		if($valid==0){
			header("Location:" . $this -> config -> base_url() . "user/edit/$id");
	        exit;
		}else{
			$this->load->model('user_content/user_content_model');	
			$this->user_content_model->admin_update_user();
			header("Location:" . $this -> config -> base_url() . "user/view");
		    exit;
		}
	}
	public function staff_update_user_content($id){
		$access=$this->check_staff();
		$this->panels_check_permission($access);
		/*$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;*/
		$this->load->helper('user_content/user_content');
		$valid = edit_user_form_validation();
		if($valid==0){
			header("Location:" . $this -> config -> base_url() . "user/edit/$id");
	        exit;
		}else{
			$this->load->model('user_content/user_content_model');	
			$this->user_content_model->admin_update_user();
			header("Location:" . $this -> config -> base_url() . "user/view");
		    exit;
		}
	}
	
	public function admin_add_user_content(){
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$user_add_data = $this->session->flashdata('user_add_data');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$data['user_add_data']=$user_add_data;
		$this->load->view('admin_add_user_content',$data);
	}
	public function staff_add_user_content(){
		$access=$this->check_staff();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$user_add_data = $this->session->flashdata('user_add_data');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$data['user_add_data']=$user_add_data;
		$this->load->view('staff_add_user_content',$data);
	}
	public function admin_delete_user_content(){
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$this->load->model('user_content/user_content_model');	
		$this->user_content_model->admin_delete_user();
		header("Location:" . $this -> config -> base_url() . "user/view");
	    exit;
	
	}
	public function staff_delete_user_content(){
		$access=$this->check_staff();
		$this->panels_check_permission($access);
		$this->load->model('user_content/user_content_model');	
		$this->user_content_model->admin_delete_user();
		header("Location:" . $this -> config -> base_url() . "user/view");
	    exit;
	
	}	
	public function admin_add_user(){  
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$this->load->helper('user_content/user_content');
		$valid = add_user_form_validation();
		if($valid==0){
			header("Location:" . $this -> config -> base_url() . "user/add");
	        exit;
		}else{
			$this->load->model('user_content/user_content_model');	
			$pass = $this->user_content_model->admin_add_user();
			$message="Your Password is: "."$pass";
            $email=$this->input->post('email');
		    mail($email, "Condo Buddy Password Send Notification", $message);
				// $subject="Condo Buddy Password Send Notification";
                // $message="Your Password is: "."$pass";
                // $sender_email = "nvbbud@server.bbud.sg";
                // $from = "Condo Buddy";
                // $this->load->library('Cphpmailer');
                // $oMail = new Cphpmailer();	
                // $oMail -> Subject = stripslashes($subject);
                // $oMail -> MsgHTML(mb_convert_encoding($message, "HTML-ENTITIES", "UTF-8"));
                // $oMail -> CharSet = "utf-8";
                // $oMail -> AddAddress($email, "");
                // $oMail -> SetFrom($sender_email, $from);
                // $oMail -> AddReplyTo($sender_email, "");
                // $oMail -> Mailer = 'sendmail';
                // $email_status = $oMail -> Send();
// 			
			header("Location:" . $this -> config -> base_url() . "user/view");
	        exit;
			//$this->load->view('admin_view_users_content',$data);
			//echo $valid;
		}
		//exit;
		
	}
public function staff_add_user(){
		
		$access=$this->check_staff();
		$this->panels_check_permission($access);
		$this->load->helper('user_content/user_content');
		$valid = add_user_form_validation();
		if($valid==0){
			header("Location:" . $this -> config -> base_url() . "user/add");
	        exit;
		}else{
			$this->load->model('user_content/user_content_model');	
			$pass = $this->user_content_model->admin_add_user();
			$message="Your Password is: "."$pass";
            $email=$this->input->post('email');
		    mail($email, "Condo Buddy Password Send Notification", $message);
				// $subject="Condo Buddy Password Send Notification";
                // $message="Your Password is: "."$pass";
                // $sender_email = "nvbbud@server.bbud.sg";
                // $from = "Condo Buddy";
                // $this->load->library('Cphpmailer');
                // $oMail = new Cphpmailer();	
                // $oMail -> Subject = stripslashes($subject);
                // $oMail -> MsgHTML(mb_convert_encoding($message, "HTML-ENTITIES", "UTF-8"));
                // $oMail -> CharSet = "utf-8";
                // $oMail -> AddAddress($email, "");
                // $oMail -> SetFrom($sender_email, $from);
                // $oMail -> AddReplyTo($sender_email, "");
                // $oMail -> Mailer = 'sendmail';
                // $email_status = $oMail -> Send();
// 			
			header("Location:" . $this -> config -> base_url() . "user/view");
	        exit;
			//$this->load->view('admin_view_users_content',$data);
			//echo $valid;
		}
		//exit;
		
	}
	public function admin_check_email(){
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$email=$this->input->get("email");
		$this->load->model('user_content/user_content_model');
		$result=$this->user_content_model->check_email_ajax($email);
		
		echo json_encode($result);exit;
	}
	public function staff_check_email(){
		$access=$this->check_staff();
		$this->panels_check_permission($access);
		$email=$this->input->get("email");
		$this->load->model('user_content/user_content_model');
		$result=$this->user_content_model->check_email_ajax($email);
		
		echo json_encode($result);exit;
	}
	
		
}
?>
