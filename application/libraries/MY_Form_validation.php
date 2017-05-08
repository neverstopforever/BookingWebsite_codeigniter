<?php if (!defined('BASEPATH')) exit('No direct script access allowed.');
class MY_Form_validation extends CI_Form_validation {

public function MY_Form_validation($config) {
    parent::__construct($config);
  }

  
 
  
  public function check_unique_email($str){
      
      $CI =& get_instance();
      $userid=Null;
      
      $CI->load->model('login_content/login_content_model');
      $email=$CI->input->post('email');
      
      $count_email=$CI->login_content_model->check_unique_email($email);
      
      if ($count_email > 0){
          $this->set_message('check_unique_email', 'Please use Unique Email Address.');
          return false;
      }
      return True;
      
  }
    public function check_file($str) {
        $CI =& get_instance();
        
        if ($_FILES['userfile']['error'] == 0){
            $filename=$_FILES['userfile']['name'];
            $ext = substr($filename, -4);
            $foldername="tmp";
            $data = array(
                'foldername' => $foldername,
            );
            $CI->session->set_userdata('image_folder', $data);
            $CI->load->library('uploader',"tmp");
           $image_data=$CI->uploader->do_upload();
            if(!$image_data['status']->success){
                $this->set_message('check_file', $image_data['status']->message);
                return false;
                exit;
            }
            }
        
        return True;
    }
    
    public function check_upload_txt_file($str) {
        $CI =& get_instance();
        
        if ($_FILES['userfile']['error'] == 0){
            
            $filename=$_FILES['userfile']['name'];
            $ext = substr($filename, -4);
            
            if(strtolower($ext)!=".txt" || $_FILES['userfile']['type']!="text/plain" ){
              $CI->session->set_flashdata('error_message', "Please upload Text File.");
                return false;
                exit;  
            }
            
            }
            else if($_FILES['userfile']['error'] == 4){
                $this->set_message('check_upload_txt_file', "Text File is Required.");
                return false;
                exit;  
            }
            
        
        return True;
    }
    
    

    public function alpha_dash_space($str,$field){
    $CI =& get_instance();
    
    if (!preg_match("/^([-a-z_ ])+$/i", $str)){
      $this->set_message('alpha_dash_space', $field.' Can contain only alphabets and space.');
      return False;  
    }
    return True;
    }
    
    public function check_currency($str,$field){
    $CI =& get_instance();
    $num = str_replace( ',', '', $str );
    $num = str_replace( '.', '', $num );
    
    if(! is_numeric($num)){
        $this->set_message('check_currency', $field.' Can contain only digits,comma or dot.');
        return False;  
    }
    return True;
    }
    
    
    public function check_password(){
    	$CI =& get_instance();
    	$password = $CI->input->post('password');
      	$cpassword=$CI->input->post('confirm_password');
	  
	  if($password!=$cpassword){
	  	 $this->set_message('check_password', 'Passwords not match.');
          return false;
	  }
	  return true;
    }
}//class ends
?>
