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
			 $CI->form_validation->set_rules('password', 'Password', 'required|trim|matches[retype_password]');
			 $CI->form_validation->set_rules('retype_password', 'Retype Password', 'required|trim');
			 $CI->form_validation->set_rules('email', 'Email', 'required|valid_email|check_email_org_admin');
			 $CI->form_validation->set_rules('unitno', 'Unitno', 'required');
			 $CI->form_validation->set_rules('block', 'Block Name', 'required');
			 $CI->form_validation->set_rules('usertype', 'Account Type', 'required');
			 $CI->form_validation->set_rules('contactnumber', 'contact Number', 'numeric');
			 $CI->form_validation->set_rules('first_vehicle_registration_no', 'First Vehicle Registration No', 'alpha_numeric');
			 $CI->form_validation->set_rules('second_vehicle_registration_no', 'Second Vehicle Registration No', 'alpha_numeric');
			 $CI->form_validation->set_rules('first_vehicle_iu_no', 'First Vehicle IU No', 'alpha_numeric');
			 $CI->form_validation->set_rules('second_vehicle_iu_no', 'Second Vehicle IU No', 'alpha_numeric');
			  
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
                'first_vehicle_registration_no' => set_value('first_vehicle_registration_no'),
                'second_vehicle_registration_no' => set_value('second_vehicle_registration_no'),
                'first_vehicle_iu_no' => set_value('first_vehicle_iu_no'),
                'second_vehicle_iu_no' => set_value('second_vehicle_iu_no'),
                'error_message' => validation_errors()
	            );
		  $CI->session->set_flashdata('error_message', "fields insertion error");
           
            }else{
               
                $data = array(
                'valid' => 1,
                'error_message' => "no validation error"
            );
            $CI->session->set_flashdata('success_message', "User Added");
            
            }

            $CI->session->set_flashdata('user_add_data', $data);
            return $data['valid'];
                //////////////////form validation end//////////////////
    }
    
 function edit_user_form_validation($validation_type,$user_type_name)
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
			 $CI->form_validation->set_rules('usertype', 'Account Type', 'required');
			 $CI->form_validation->set_rules('contactnumber', 'contact Number', 'numeric');
			 $CI->form_validation->set_rules('first_vehicle_registration_no', 'First Vehicle Registration No', 'alpha_numeric');
			 $CI->form_validation->set_rules('second_vehicle_registration_no', 'Second Vehicle Registration No', 'alpha_numeric');
			 $CI->form_validation->set_rules('first_vehicle_iu_no', 'First Vehicle IU No', 'alpha_numeric');
			 $CI->form_validation->set_rules('second_vehicle_iu_no', 'Second Vehicle IU No', 'alpha_numeric');
			  
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
                'first_vehicle_registration_no' => set_value('first_vehicle_registration_no'),
                'second_vehicle_registration_no' => set_value('second_vehicle_registration_no'),
                'first_vehicle_iu_no' => set_value('first_vehicle_iu_no'),
                'second_vehicle_iu_no' => set_value('second_vehicle_iu_no'),
                'error_message' => validation_errors()
	            );
		  	$CI->session->set_flashdata('error_message', "Fields Insertion error");
           
            }else{
               
                $data = array(
                'valid' => 1,
                'error_message' => "no validation error"
            );
            $CI->session->set_flashdata('success_message', "User Updated");
            
            }
			
            $CI->session->set_flashdata('user_edit_data', $data);
			
            return $data['valid'];
                //////////////////form validation end//////////////////
    }    
}

