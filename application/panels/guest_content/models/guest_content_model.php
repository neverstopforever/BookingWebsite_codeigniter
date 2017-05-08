<?php

class guest_content_model extends MY_Model {
	public function __construct() {
		parent::__construct("app_user");
	}
	function admin_get_guest_list(){
		$userid = $this->session->userdata('userid');
		$params = array(
		        "select" => "*",
		        "from" => "condo_guest_list", 
				"order_by" => "visitor_id DESC");
		$guest_list = $this->find($params);
	
		return $guest_list;
	}
	function get_resident_detail(){
		$userid = $this->session->userdata('userid');
		$params = array(
		        "select" => "*",
		        "from" => "condo_users", 
				"where" => "userid = $userid
							And user_type = 'resident'");
		$guest_list = $this->find($params);
		
		return $guest_list;
	}
	
	function resident_get_guest_list(){
		$userid = $this->session->userdata('userid');
		$params = array(
		        "select" => "*",
		        "from" => "condo_guest_list", 
		        "where" => "userid = $userid",
				"order_by" => "visitor_id DESC");
		$guest_list = $this->find($params);
	
		return $guest_list;
	}
	function admin_get_guest(){
		$visitor_id = $this->input->get('visitor_id');
		$params = array(
		        "select" => "*",
		        "from" => "condo_guest_list",
		        "where" =>"visitor_id = '$visitor_id'"
			);
		$guest_list = $this->find($params);
		
		return json_encode($guest_list);
	}
	function resident_get_guest(){
		$visitor_id = $this->input->get('visitor_id');
		$userid = $this->session->userdata('userid');
		$params = array(
		        "select" => "*",
		        "from" => "condo_guest_list",
		        "where" =>"visitor_id = '$visitor_id'
		        			AND userid = '$userid'"
			);
		$guest_list = $this->find($params);
		
		return json_encode($guest_list);
	}
	public function admin_update_guest(){
		$userid = $this->session->userdata('userid');	
    	
		$visitor_id = $this->input->post('visitor_id');
									$params = array(
										// "username"=>$this->input->post('username'),
									//    "resident_name"=>$this->input->post('resident_name'),
										"resident_block"=>$this->input->post('resident_block'),
										"resident_unit_no"=>$this->input->post('resident_unit'),
										"date_start"=>date("Y-m-d", strtotime($this->input->post('date_start'))),
										"date_end"=>date("Y-m-d", strtotime($this->input->post('date_end'))),
										"time_start"=>$this->input->post('time_start'),
										"time_end"=>$this->input->post('time_end'),
										"vehicle_no"=>$this->input->post('vehicle_no'),
										"visitor_name"=>$this->input->post('visitor_name'),
										"visitor_contact"=>$this->input->post('visitor_no'),
										"purpose"=>$this->input->post('purpose'),
										"updated_by"=>$userid,
										"date_updated" => date("Y-m-d H:i:s")
										); 
					
				$this->update($params,"visitor_id = '$visitor_id'", "condo_guest_list");	
				$CI =& get_instance();
		        $CI->session->set_flashdata('success_message','Guest has been updated successfully');
	    		
}

public function resident_update_guest(){
		$userid = $this->session->userdata('userid');	
    	$visitor_id = $this->input->post('visitor_id');
									$params = array(
										"resident_block"=>$this->input->post('resident_block'),
										"resident_unit_no"=>$this->input->post('resident_unit'),
										"date_start"=>date("Y-m-d", strtotime($this->input->post('date_start'))),
										"date_end"=>date("Y-m-d", strtotime($this->input->post('date_end'))),
										"time_start"=>$this->input->post('time_start'),
										"time_end"=>$this->input->post('time_end'),
										"vehicle_no"=>$this->input->post('vehicle_no'),
										"visitor_name"=>$this->input->post('visitor_name'),
										"visitor_contact"=>$this->input->post('visitor_no'),
										"purpose"=>$this->input->post('purpose'),
										"updated_by"=>$userid,
										"date_updated" => date("Y-m-d H:i:s")
										); 
					
				$this->update($params,"visitor_id = '$visitor_id'", "condo_guest_list");	
				$CI =& get_instance();
		        $CI->session->set_flashdata('success_message','Guest has been updated successfully');
	    		
}
	
	public function admin_add_guest(){
				$vehicle_no = $this->input->post('vehicle_no');
				$purpose = $this->input->post('purpose');
				$visitor_contact = $this->input->post('visitor_contact');
				$visitor_name =	$this->input->post('visitor_name');
		
				$username=$this->input->post('username');
				$customers_detail = $this->findOneBy(array(
									"username" => $username
									),'condo_users');	
								 
				 if(isset($customers_detail->userid)){
				 
					$userid = $this->session->userdata('userid');	
    				for ($i=0; $i < sizeof($vehicle_no) ; $i++) { 
									$params = array(
												"user_name"=>$this->input->post('username'),
										//		"resident_name"=>$this->input->post('resident_name'),
												"resident_block"=>$this->input->post('resident_block'),
												"resident_unit_no"=>$this->input->post('resident_unit_no'),
												"date_start"=>date("Y-m-d", strtotime($this->input->post('start_date'))),
												"date_end"=>date("Y-m-d", strtotime($this->input->post('end_date'))),
												"time_start"=>$this->input->post('time_start'),
												"time_end"=>$this->input->post('time_end'),
												"vehicle_no"=>$vehicle_no[$i],
												"visitor_name"=>$visitor_name[$i],
												"visitor_contact"=>$visitor_contact[$i],
												"purpose"=>$purpose[$i],
												"userid"=>$customers_detail->userid,
												"created_by"=>$userid,
												"date_created" => date("Y-m-d H:i:s")
												); 
							
						$this->insert($params, "condo_guest_list");	
					}
					$CI =& get_instance();
		        	$CI->session->set_flashdata('success_message','Guest has been added successfully');
		        	return TRUE;
				}else{
					$CI =& get_instance();
		        	$CI->session->set_flashdata('error_message','Username is invalid. Try Agian');
		        	return FALSE;
		        }
}
	
function admin_delete_guest($id){

		$this->delete("visitor_id = '$id'", "condo_guest_list");
		$CI =& get_instance();
		$CI->session->set_flashdata('success_message','Guest has been removed successfully');
		return TRUE;
}	
function resident_delete_guest($id){
		$userid = $this->session->userdata('userid');	
    	$this->delete("visitor_id = '$id' and userid = '$userid'", "condo_guest_list" );
		$CI =& get_instance();
		$CI->session->set_flashdata('success_message','Guest has been removed successfully');
		return TRUE;
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