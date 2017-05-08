<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('add_user_form_validation'))
{
    function add_user_form_validation($validation_type,$user_type_name)
    {
    	
        $CI =& get_instance();
        ////////////////form validation ///////////////////////
             $CI->load->helper(array('form', 'url','file'));
             //$CI->load->library('encrypt');
             $CI->load->library('form_validation');
             $CI->form_validation->set_rules('firstname', 'First Name', 'required|alpha_numeric');
			 $CI->form_validation->set_rules('lastname', 'Last Name', 'required|alpha_numeric');
			 $CI->form_validation->set_rules('email', 'Email', 'required|valid_email|check_email_org_admin');
			 $CI->form_validation->set_rules('unitno', 'Unitno', 'required');
			 $CI->form_validation->set_rules('block', 'Block Name', 'required');
			 $CI->form_validation->set_rules('usertype', 'User Type', 'requires');
			 $CI->form_validation->set_rules('contactnumber', 'contact Number', 'numeric');
			  
             if ($CI->form_validation->run($this) == FALSE){
                 
                 $data = array(
                'valid' => 0,
                'firstname' => set_value('firstname'),
                'lastname' => set_value('lastname'),
                'email' => set_value('email'),
                'unitno' => set_value('unitno'),
                'block' => set_value('block'),
                'usertype' => set_value('usertype'),
                'contactnumber' => set_value('contactnumber'),
                'error_message' => validation_errors()
	            );
            }else{
               
                $data = array(
                'valid' => 1,
                'error_message' => "no validation error"
            );
            
            }
            $CI->session->set_flashdata('user_add_data', $data);
            $CI->session->set_flashdata('success_message', "User Added");
            return $data['valid'];
                //////////////////form validation end//////////////////
    }
    
    
}

