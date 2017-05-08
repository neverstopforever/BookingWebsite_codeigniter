<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('add_validation'))
{
    function add_validation($validation_type)
    {
    	
        $CI =& get_instance();
        ////////////////form validation ///////////////////////
             $CI->load->helper(array('form', 'url','file'));
             //$CI->load->library('encrypt');
             $CI->load->library('form_validation');
             $CI->form_validation->set_rules('name', 'Category Name Required', 'required|alpha_numeric');
			 $CI->form_validation->set_rules('status', 'Status Required', 'numeric');
			 
             if ($CI->form_validation->run($this) == FALSE){
                 
                 $data = array(
                'valid' => 0,
                'name' => set_value('name'),
                'status' => set_value('status'),
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

if ( ! function_exists('add_question_validation'))
{
    function add_question_validation($validation_type)
    {
    	
        $CI =& get_instance();
        ////////////////form validation ///////////////////////
             $CI->load->helper(array('form', 'url','file'));
             //$CI->load->library('encrypt');
             $CI->load->library('form_validation');
             $CI->form_validation->set_rules('name', 'Category Name Required', 'required|alpha_numeric');
			 $CI->form_validation->set_rules('awnser', 'Awnser Required', 'required|alpha_numeric');
			 $CI->form_validation->set_rules('status', 'Status Required', 'numeric');
			 
             if ($CI->form_validation->run($this) == FALSE){
                 
                 $data = array(
                'valid' => 0,
                'name' => set_value('name'),
                'awnser' => set_value('awnser'),
                'status' => set_value('status'),
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

