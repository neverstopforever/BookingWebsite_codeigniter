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
             $CI->form_validation->set_rules('inputdate', 'Date', 'required');
			 $CI->form_validation->set_rules('inputholiday', 'Public Holiday', 'required');
			  
             if ($CI->form_validation->run($this) == FALSE){
                 
                 $data = array(
                'valid' => 0,
                'inputdate' => set_value('inputdate'),
                'inputholiday' => set_value('inputholiday'),
                'error_message' => validation_errors()
	            );
            }else{
               
                $data = array(
                'valid' => 1,
                'error_message' => "no validation error"
            );
            
            }
            return $data['valid'];
                //////////////////form validation end//////////////////
    }
    
    
}

if ( ! function_exists('add_holiday_form_validation'))
{
    function add_holiday_form_validation($validation_type,$user_type_name)
    {
    	
        $CI =& get_instance();
        ////////////////form validation ///////////////////////
             $CI->load->helper(array('form', 'url','file'));
             //$CI->load->library('encrypt');
             $CI->load->library('form_validation');
             $CI->form_validation->set_rules('inputdate_edit', 'Date', 'required');
			 $CI->form_validation->set_rules('inputholiday_edit', 'Public Holiday', 'required');
			  
             if ($CI->form_validation->run($this) == FALSE){
                 
                 $data = array(
                'valid' => 0,
                'inputdate_edit' => set_value('inputdate_edit'),
                'inputholiday_edit' => set_value('inputholiday_edit'),
                'error_message' => validation_errors()
	            );
            }else{
               
                $data = array(
                'valid' => 1,
                'error_message' => "no validation error"
            );
            
            }
            return $data['valid'];
                //////////////////form validation end//////////////////
    }
    
    
}
