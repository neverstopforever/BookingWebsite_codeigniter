<?php

class notice_content_model extends MY_Model {
	public function __construct() {
		parent::__construct("app_user");
	}
	function admin_view_applcation(){
		$userid = $this->session->userdata('userid');	
    	$params = array(
		        "select" => "a.*,b.username",
		        "from" => "condo_notice_upload a, condo_users b", 
				"where" => "a.userid = '$userid'
							and b.userid = '$userid'",
				"order_by" => "a.fileid DESC");
		$booking = $this->find($params);
	
		return $booking;
	}
	function admin_view_download_applcation(){
		
		$params = array(
		        "select" => "a.*,b.username",
		        "from" => "condo_notice_upload a, condo_users b", 
				"where" => "a.userid = b.userid",
				"order_by" => "a.fileid DESC");
		$booking = $this->find($params);
		return $booking;
	}
	function admin_edit_applcation($id){

		$userid = $this->session->userdata('userid');	
    	$params = array(
		        "select" => "a.*",
		        "from" => "condo_notice_upload a", 
				"where" => "a.userid = '$userid'
							and fileid = '$id'");
		$booking = $this->find($params);
		return $booking;
	}
	
	
public function admin_save_applcation($fileName,$file_path,$full_path,$fileSize,$docName){

	$userid = $this->session->userdata('userid');	
    	
			$name = $this->input->post('name');
									$params = array("userid"=>$userid,
										"file_name"=>$fileName,
										"file_path"=>$file_path,
										"full_path"=>$full_path,
										"file_size"=>$fileSize,
										"doc_name"=>$docName,
										"date_created" => date("Y-m-d H:i:s")
										); 
						
				$this->insert($params, "condo_notice_upload");	
				
				$CI =& get_instance();
		        $CI->session->set_flashdata('success_message','File Uploaded Successfully');
	    		
}
public function admin_update_file_applcation($fileName,$file_path,$full_path,$fileSize,$docName){

		$file_id = $this->input->post('file_id');
									$params = array(
										"file_name"=>$fileName,
										"file_path"=>$file_path,
										"full_path"=>$full_path,
										"file_size"=>$fileSize,
										"doc_name"=>$docName,
										"date_updated" => date("Y-m-d H:i:s")
										); 
						
				$this->update($params,"fileid = '$file_id'", "condo_notice_upload");	
				$CI =& get_instance();
		        $CI->session->set_flashdata('success_message','File Uploaded Successfully');
	    		
}
function admin_delete_applcation($id){
		$params = array(
		        "select" => "a.full_path",
		        "from" => "condo_notice_upload a", 
				"where" => "a.fileid = '$id'");
		$booking = $this->find($params);
		$file = $booking[0]->full_path;
		$file_name = str_replace(".jpg", "_thumb.jpg",$booking[0]->full_path);
		$file_name = str_replace(".jpeg", "_thumb.jpeg",$file_name);
		unlink($file);
		unlink($file_name);
		$this->delete("fileid = '$id'", "condo_notice_upload");
}

function admin_remove_applcation(){
		$file_id = $this->input->post('file_id');
		$params = array(
		        "select" => "a.full_path",
		        "from" => "condo_notice_upload a", 
				"where" => "a.fileid = '$file_id'");
		$booking = $this->find($params);
		$file = $booking[0]->full_path;
		$file_name = str_replace(".jpg", "_thumb.jpg",$booking[0]->full_path);
		$file_name = str_replace(".jpeg", "_thumb.jpeg",$file_name);
		unlink($file);
		unlink($file_name);
		
}
public function admin_update_applcation(){

	$userid = $this->session->userdata('userid');	

			$fileid = $this->input->post('file_id');
			$docName = $this->input->post('docName');
			$params = array(
				"doc_name"=>$docName,
				"date_updated" => date("Y-m-d H:i:s")
				); 

				$result = $this->update($params,"fileid = '$fileid'", "condo_notice_upload");	
				$CI =& get_instance();
		        $CI->session->set_flashdata('success_message','File Uploaded Successfully');
	    		
}
}
?>