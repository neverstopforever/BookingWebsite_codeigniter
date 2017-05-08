<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Notice_content extends MY_Controller {

    public function index() {
        exit;
    }
	
	
	public function admin_view_application_content(){
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$this->load->model('notice_content/notice_content_model');	
		$data["view_application"] = $this->notice_content_model->admin_view_applcation();
		$this->load->view('admin_view_application_content',$data);
	}
	public function staff_view_application_content(){
		$access=$this->check_staff();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$this->load->model('notice_content/notice_content_model');	
		$data["view_application"] = $this->notice_content_model->admin_view_applcation();
		$this->load->view('staff_view_application_content',$data);
	}
	public function admin_upload_application_content(){
		
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		// $this->load->model('application_content/application_content_model');	
		// $data["view_booking"] = $this->application_content_model->admin_view_applcation();
		 $this->load->view('admin_upload_application_content',$data);
	}
	public function staff_upload_application_content(){
		
		$access=$this->check_staff();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$this->load->view('staff_upload_application_content',$data);
	}
	
	public function admin_save_application_content(){
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		list($width, $height, $type, $attr) = getimagesize($_FILES["userfile"]['tmp_name']);
		$width;
		$height;
		$fileName = $_FILES['userfile']['name'];
	    $tmpName  = $_FILES['userfile']['tmp_name'];
		$fileSize = $_FILES['userfile']['size'];
		$fileType = $_FILES['userfile']['type'];
		
		$this->load->library('uploader_file','pdf_uploader');
     	$error = false;
		$csv_data=$this->uploader_file->do_upload();				
		$message = $csv_data['status']->message;
		
		if($message=="File Uploaded Successfully"){
	
			 $file_name = $csv_data['uploaded_file']['file_name'];				
		     $file_path = $csv_data['uploaded_file']['file_path'];
			 $full_path = $csv_data['uploaded_file']['full_path'];
			 $file_size = $csv_data['uploaded_file']['file_size'];
			 $docName = $this->input->post('docName');
			
			 $this->load->model('notice_content/notice_content_model');	
			 $this->notice_content_model->admin_save_applcation($file_name,$file_path,$full_path,$file_size,$docName);
			
			if($width>700){
				$height = 700/$width*$height;	
				$diff = $width-700;
				$width = $width-$diff;
			}
			$source_path=dirname($_SERVER["SCRIPT_FILENAME"])."/application_form/".$file_name;
			$target_path = dirname($_SERVER["SCRIPT_FILENAME"]).'/application_form/'.$file_name;
				    
				    $config_manip = array(
				        'image_library' => 'gd2',
				        'source_image' => $source_path,
				        'new_image' => $target_path,
				        'maintain_ratio' => TRUE,
				        'create_thumb' => TRUE,
				        'thumb_marker' => '_thumb',
				        'width' => $width,
				        'height' => $height
				    );
					
				    $this->load->library('image_lib', $config_manip);
					$this->image_lib->initialize($config_manip);								
				    if (!$this->image_lib->resize()) {
				    	
				        echo $this->image_lib->display_errors();
				        exit;
				    }
					
				    // clear //
					$this->image_lib->clear();
			
			header("Location:".base_url()."notice/view");		
			exit;
						
		}else{
			$CI =& get_instance();
		       		 $CI->session->set_flashdata('error_message',$message);	
					header("Location:".base_url()."notice/view");		
					exit;
		}
		
	}
public function staff_save_application_content(){
		$access=$this->check_staff();
		$this->panels_check_permission($access);
		list($width, $height, $type, $attr) = getimagesize($_FILES["userfile"]['tmp_name']);
		$width;
		$height;
		$fileName = $_FILES['userfile']['name'];
	    $tmpName  = $_FILES['userfile']['tmp_name'];
		$fileSize = $_FILES['userfile']['size'];
		$fileType = $_FILES['userfile']['type'];
		
		$this->load->library('uploader_file','pdf_uploader');
     	$error = false;
		$csv_data=$this->uploader_file->do_upload();				
		$message = $csv_data['status']->message;
		
		if($message=="File Uploaded Successfully"){
	
			 $file_name = $csv_data['uploaded_file']['file_name'];				
		     $file_path = $csv_data['uploaded_file']['file_path'];
			 $full_path = $csv_data['uploaded_file']['full_path'];
			 $file_size = $csv_data['uploaded_file']['file_size'];
			 $docName = $this->input->post('docName');
			
			 $this->load->model('notice_content/notice_content_model');	
			 $this->notice_content_model->admin_save_applcation($file_name,$file_path,$full_path,$file_size,$docName);
			
			if($width>700){
				$height = 700/$width*$height;	
				$diff = $width-700;
				$width = $width-$diff;
			}
			$source_path=dirname($_SERVER["SCRIPT_FILENAME"])."/application_form/".$file_name;
			$target_path = dirname($_SERVER["SCRIPT_FILENAME"]).'/application_form/'.$file_name;
				    
				    $config_manip = array(
				        'image_library' => 'gd2',
				        'source_image' => $source_path,
				        'new_image' => $target_path,
				        'maintain_ratio' => TRUE,
				        'create_thumb' => TRUE,
				        'thumb_marker' => '_thumb',
				        'width' => $width,
				        'height' => $height
				    );
					
				    $this->load->library('image_lib', $config_manip);
					$this->image_lib->initialize($config_manip);								
				    if (!$this->image_lib->resize()) {
				    	
				        echo $this->image_lib->display_errors();
				        exit;
				    }
					
				    // clear //
					$this->image_lib->clear();
			
			header("Location:".base_url()."notice/view");		
			exit;
						
		}else{
			$CI =& get_instance();
		       		 $CI->session->set_flashdata('error_message',$message);	
					header("Location:".base_url()."notice/view");		
					exit;
		}
		
	}
	public function admin_edit_application_content(){
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$id = $this->uri->segment(3);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$this->load->model('notice_content/notice_content_model');	
	 	 $data["edit_application"] = $this->notice_content_model->admin_edit_applcation($id);
		 $this->load->view('admin_edit_application_content',$data);
	}
	public function staff_edit_application_content(){
		$access=$this->check_staff();
		$this->panels_check_permission($access);
		$id = $this->uri->segment(3);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$this->load->model('notice_content/notice_content_model');	
	 	 $data["edit_application"] = $this->notice_content_model->admin_edit_applcation($id);
		 $this->load->view('staff_edit_application_content',$data);
	}
	public function admin_delete_application_content($id){
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$this->load->model('notice_content/notice_content_model');	
	    $this->notice_content_model->admin_delete_applcation($id);
		$CI =& get_instance();
		$CI->session->set_flashdata('success_message',"File is Removed Successfully");	
			
		header("Location:".base_url()."notice/view");		
		exit;
		}
	public function staff_delete_application_content($id){
		$access=$this->check_staff();
		$this->panels_check_permission($access);
		$this->load->model('notice_content/notice_content_model');	
	    $this->notice_content_model->admin_delete_applcation($id);
		$CI =& get_instance();
		$CI->session->set_flashdata('success_message',"File is Removed Successfully");	
			
		header("Location:".base_url()."notice/view");		
		exit;
		}
	public function admin_update_application_content(){
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		if($_FILES['userfile']['error']==0){
				$this->load->library('uploader_file','pdf_uploader');
	         	$error = false;
				list($width, $height, $type, $attr) = getimagesize($_FILES["userfile"]['tmp_name']);
				$width;
				$height;
				
				
				$fileName = $_FILES['userfile']['name'];
			    $tmpName  = $_FILES['userfile']['tmp_name'];
				$fileSize = $_FILES['userfile']['size'];
				$fileType = $_FILES['userfile']['type'];
				
				$csv_data=$this->uploader_file->do_upload();	
				$message = $csv_data['status']->message;				
				
				if($message=="File Uploaded Successfully"){
					 $this->load->model('notice_content/notice_content_model');	
					 $this->notice_content_model->admin_remove_applcation();
					 $file_name = $csv_data['uploaded_file']['file_name'];				
				     $file_path = $csv_data['uploaded_file']['file_path'];
					 $full_path = $csv_data['uploaded_file']['full_path'];
					 $file_size = $csv_data['uploaded_file']['file_size'];
					 $docName = $this->input->post('docName');
					 $this->notice_content_model->admin_update_file_applcation($file_name,$file_path,$full_path,$file_size,$docName);
					
					if($width>700){
						$height = 700/$width*$height;	
						$diff = $width-700;
						$width = $width-$diff;
					}
					$source_path=dirname($_SERVER["SCRIPT_FILENAME"])."/application_form/".$file_name;
					$target_path = dirname($_SERVER["SCRIPT_FILENAME"]).'/application_form/'.$file_name;
					
					$config_manip = array(
					    'image_library' => 'gd2',
					'source_image' => $source_path,
					'new_image' => $target_path,
					'maintain_ratio' => TRUE,
					'create_thumb' => TRUE,
					'thumb_marker' => '_thumb',
					'width' => $width,
					'height' => $height
					);
					
					$this->load->library('image_lib', $config_manip);
					$this->image_lib->initialize($config_manip);								
					if (!$this->image_lib->resize()) {
						
					    echo $this->image_lib->display_errors();
					    exit;
					}
					
					// clear //
					$this->image_lib->clear();

					
					
					
					header("Location:".base_url()."notice/view");		
					exit;
								
				}else{
						
					$CI =& get_instance();
		       		 $CI->session->set_flashdata('error_message',$message);	
					header("Location:".base_url()."notice/view");		
					exit;
					
				}
						
		}else{
			 $this->load->model('notice_content/notice_content_model');	
			 $this->notice_content_model->admin_update_applcation();
			 header("Location:".base_url()."notice/view");		
			 exit;
		
		}
		exit;
		
	}
public function staff_update_application_content(){
		$access=$this->check_staff();
		$this->panels_check_permission($access);
		if($_FILES['userfile']['error']==0){
				$this->load->library('uploader_file','pdf_uploader');
	         	$error = false;
				list($width, $height, $type, $attr) = getimagesize($_FILES["userfile"]['tmp_name']);
				$width;
				$height;
				
				
				$fileName = $_FILES['userfile']['name'];
			    $tmpName  = $_FILES['userfile']['tmp_name'];
				$fileSize = $_FILES['userfile']['size'];
				$fileType = $_FILES['userfile']['type'];
				
				$csv_data=$this->uploader_file->do_upload();	
				$message = $csv_data['status']->message;				
				
				if($message=="File Uploaded Successfully"){
					 $this->load->model('notice_content/notice_content_model');	
					 $this->notice_content_model->admin_remove_applcation();
					 $file_name = $csv_data['uploaded_file']['file_name'];				
				     $file_path = $csv_data['uploaded_file']['file_path'];
					 $full_path = $csv_data['uploaded_file']['full_path'];
					 $file_size = $csv_data['uploaded_file']['file_size'];
					 $docName = $this->input->post('docName');
					 $this->notice_content_model->admin_update_file_applcation($file_name,$file_path,$full_path,$file_size,$docName);
					
					if($width>700){
						$height = 700/$width*$height;	
						$diff = $width-700;
						$width = $width-$diff;
					}
					$source_path=dirname($_SERVER["SCRIPT_FILENAME"])."/application_form/".$file_name;
					$target_path = dirname($_SERVER["SCRIPT_FILENAME"]).'/application_form/'.$file_name;
					
					$config_manip = array(
					    'image_library' => 'gd2',
					'source_image' => $source_path,
					'new_image' => $target_path,
					'maintain_ratio' => TRUE,
					'create_thumb' => TRUE,
					'thumb_marker' => '_thumb',
					'width' => $width,
					'height' => $height
					);
					
					$this->load->library('image_lib', $config_manip);
					$this->image_lib->initialize($config_manip);								
					if (!$this->image_lib->resize()) {
						
					    echo $this->image_lib->display_errors();
					    exit;
					}
					
					// clear //
					$this->image_lib->clear();
					header("Location:".base_url()."notice/view");		
					exit;
								
				}else{
						
					$CI =& get_instance();
		       		 $CI->session->set_flashdata('error_message',$message);	
					header("Location:".base_url()."notice/view");		
					exit;
					
				}
						
		}else{
			 $this->load->model('notice_content/notice_content_model');	
			 $this->notice_content_model->admin_update_applcation();
			 header("Location:".base_url()."notice/view");		
			 exit;
		
		}
	}
	public function admin_view_notice_content(){
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$this->load->model('notice_content/notice_content_model');	
		$data["view_application"] = $this->notice_content_model->admin_view_download_applcation();
		$this->load->view('admin_view_notice_content',$data);
	}
	public function guard_view_notice_content(){
		$access=$this->check_guard();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$this->load->model('notice_content/notice_content_model');	
		$data["view_application"] = $this->notice_content_model->admin_view_download_applcation();
		$this->load->view('admin_view_notice_content',$data);
	}
	public function staff_view_notice_content(){
		$access=$this->check_staff();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$this->load->model('notice_content/notice_content_model');	
		$data["view_application"] = $this->notice_content_model->admin_view_download_applcation();
		$this->load->view('admin_view_notice_content',$data);
	}
	public function resident_view_notice_content(){
		$access=$this->check_resident();
		$this->panels_check_permission($access);
		$success_message = $this->session->flashdata('success_message');
    	$error_message = $this->session->flashdata('error_message');
		$data['success_message']=$success_message;
		$data['error_message']=$error_message;
		$this->load->model('notice_content/notice_content_model');	
		$data["view_application"] = $this->notice_content_model->admin_view_download_applcation();
		$this->load->view('admin_view_notice_content',$data);
	}
	public function admin_view_download_application(){
		$access=$this->check_admin();
		$this->panels_check_permission($access);
		$path = $this->uri->segment_array();
		$file = "";
		for ($i=3; $i <= count($path); $i++) {
			$file .= "/"; 
			$file .=$path[$i];
		}
		header('Content-Description: File Transfer');
	    header('Content-Type: application/octet-stream');
	    header('Content-Disposition: attachment; filename="'.basename($file).'"');
	    header('Expires: 0');
	    header('Cache-Control: must-revalidate');
	    header('Pragma: public');
	    header('Content-Length: ' . filesize($file));
	    readfile($file);
	    
	}

	
}
?>
