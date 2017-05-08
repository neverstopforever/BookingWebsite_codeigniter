<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
class MY_Exceptions extends CI_Exceptions
{
    public function show_401($status_code = 401)
    {
        $ci =& get_instance();
        if (!$page = $ci->uri->uri_string()) {
            $page = 'home';
        }
		
        switch($status_code) {
            case 403: {$heading = 'Access Forbidden'; $message="Sorry! you don't have access to use this feature.Please contact System Admin to resolve this issue.Thanks";} break;
            case 404: {$heading = 'Page Not Found'; $message="Sorry! you don't have access to use this feature.Please contact System Admin to resolve this issue.Thanks";} break;
            case 503: {$heading = 'Undergoing Maintenance'; $message="Sorry! you don't have access to use this feature.Please contact System Admin to resolve this issue.Thanks";} break;
			case 401: {$heading = "Access Denied"; $message="Sorry! you don't have access to use this feature.Please contact System Admin to resolve this issue.Thanks";}
        }
		
		
        log_message('error', $status_code . ' ' . $heading . ' --> '. $page);
		
		$data = array(
		    'heading' => $heading,
		    'message'=>$message,
		    'status_code'=>$status_code
		);
		
		if($ci->session->userdata("user_type")){
			echo parent::show_error($heading, $message, 'error_general', $status_code);exit;
			//$ci->load->view("error_panel",$data);exit;
		}
		else
        	echo parent::show_error($heading, $message, 'error_general', $status_code);exit;
    }
    
    
}