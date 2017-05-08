<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('set_remember_cookie'))
{
    function set_remember_cookie($remember_me = '')
    {
    	
        $CI =& get_instance();
        if ($remember_me == "on"){
            $CI->load->helper('cookie');
           $cookie = array(
                'name'   => 'remember',
                'value'  => $CI->input->post('username'),
                'expire' => 86500,
                'secure' => FALSE
            );
            $CI->input->set_cookie($cookie);
        }
        else{
            $cookie = array(
                'name'   => 'remember',
                'value'  => $CI->input->post('username'),
                'secure' => FALSE
            );
            $CI->input->set_cookie($cookie);
        }
    }   
}



if ( ! function_exists('save_user_session'))
{
    function save_user_session($username,$userdata)
    {
        $CI =& get_instance();
        $data = array(
                'email' => $username,
                'is_logged_in' => 1,
                'user_type' => $userdata->user_type,
                'userid' => $userdata->userid,
                'first_name' => $userdata->first_name,
                'last_name' => $userdata->last_name
            );
        
        $CI->session->set_userdata($data);
    }
}

