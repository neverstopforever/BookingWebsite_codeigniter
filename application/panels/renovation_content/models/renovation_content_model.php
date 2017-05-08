<?php

class Renovation_content_model extends MY_Model {
	public function __construct() {
		parent::__construct("app_user");
	}
	function admin_get_renovation_list(){
		$userid = $this->session->userdata('userid');
		$params = array(
		        "select" => "*",
		        "from" => "condo_renovation_list", 
				"order_by" => "renovation_id DESC");
		$renovation_list = $this->find($params);
	
		return $renovation_list;
	}

	function admin_get_renovation(){
		$renovation_id = $this->input->get('renovation_id');
		$params = array(
		        "select" => "*",
		        "from" => "condo_renovation_list",
		        "where" =>"renovation_id = '$renovation_id'"
			);
		$renovation_list = $this->find($params);
        
        $customers_detail = $this->find(array(
            'select' => 'first_name, last_name',
            "from" => "condo_users",
            "limit" => "1",
            "where" =>"userid = ".$renovation_list[0]->created_by
        ),'condo_users');

        $renovation_list['created_by_user'] = $customers_detail;

		return json_encode($renovation_list);
	}

	public function admin_update_renovation(){
		$userid = $this->session->userdata('userid');	
    	
		$renovation_id = $this->input->post('renovation_id');
										$params = array(
											//	"user_name"=>$this->input->post('user_name'),
												"resident_contact"=>$this->input->post('resident_contact'),
												"resident_block"=>$this->input->post('resident_block'),
												"resident_unit_no"=>$this->input->post('resident_unit_no'),
												"date_start"=>date("Y-m-d", strtotime($this->input->post('date_start'))),
												"date_end"=>date("Y-m-d", strtotime($this->input->post('date_end'))),
												"time_start"=>$this->input->post('time_start'),
												"time_end"=>$this->input->post('time_end'),
												"vehicle_no"=>$this->input->post('vehicle_no'),
												"contractor_name"=>$this->input->post('contractor_name'),
												"contractor_contact"=>$this->input->post('contractor_contact'),
												"remarks"=> $this->input->post('remarks'),
												"updated_by"=>$userid,
												"date_created" => date("Y-m-d H:i:s"),
												"date_updated" => date("Y-m-d H:i:s")
												); 
					
				$this->update($params,"renovation_id = '$renovation_id'", "condo_renovation_list");	
				$CI =& get_instance();
		        $CI->session->set_flashdata('success_message','The selected renovation has been successfully updated');
	    		
}


	
	public function admin_add_renovation(){
			$username=$this->input->post('user_name');
				$customers_detail = $this->findOneBy(array(
									"username" => $username
									),'condo_users');	
								 
				 if(isset($customers_detail->userid)){
		$userid = $this->session->userdata('userid');
									$params = array(
												"user_name"=>$this->input->post('user_name'),
												"resident_contact"=>$this->input->post('resident_contact'),
												"resident_block"=>$this->input->post('resident_block'),
												"resident_unit_no"=>$this->input->post('resident_unit_no'),
												"date_start"=>date("Y-m-d", strtotime($this->input->post('date_start'))),
												"date_end"=>date("Y-m-d", strtotime($this->input->post('date_end'))),
												"time_start"=>$this->input->post('time_start'),
												"time_end"=>$this->input->post('time_end'),
												"vehicle_no"=>$this->input->post('vehicle_no'),
												"contractor_name"=>$this->input->post('contractor_name'),
												"contractor_contact"=>$this->input->post('contractor_contact'),
												"remarks"=> $this->input->post('remarks'),
												"userid"=>$customers_detail->userid,
												"created_by"=>$userid,
												"date_created" => date("Y-m-d H:i:s"),
												"date_updated" => date("Y-m-d H:i:s")
												); 
							
						$this->insert($params, "condo_renovation_list");	
					$CI =& get_instance();
		        	$CI->session->set_flashdata('success_message','A new renovation(s) has been successfully added');
		        	return TRUE;
				}else{
					$CI =& get_instance();
		        	$CI->session->set_flashdata('error_message','Username is invalid. Try Agian');
		        	return FALSE;
		        }
}
	
function admin_delete_renovation($id){

		$this->delete("renovation_id = '$id'", "condo_renovation_list");
		$CI =& get_instance();
		$CI->session->set_flashdata('success_message','The selected renovation has been successfully deleted');
		return TRUE;
}	

// Resident section start from here. //	
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
	
function resident_get_renovation_list(){
		$userid = $this->session->userdata('userid');
		$params = array(
		        "select" => "*",
		        "from" => "condo_renovation_list", 
		        "where" => "userid = $userid",
				"order_by" => "renovation_id DESC");
		$renovation_list = $this->find($params);
	
		return $renovation_list;
	}	
	function resident_get_renovation(){
		$renovation_id = $this->input->get('renovation_id');
		$userid = $this->session->userdata('userid');
		$params = array(
		        "select" => "*",
		        "from" => "condo_renovation_list",
		        "where" =>"renovation_id = '$renovation_id'
		        			AND userid = '$userid'"
			);
		$renovation_list = $this->find($params);
		
		return json_encode($renovation_list);
	}
	public function resident_update_renovation(){
			$userid = $this->session->userdata('userid');	
	    	$renovation_id = $this->input->post('renovation_id');
										$params = array(
												"resident_contact"=>$this->input->post('resident_contact'),
												"resident_block"=>$this->input->post('resident_block'),
												"resident_unit_no"=>$this->input->post('resident_unit_no'),
												"date_start"=>date("Y-m-d", strtotime($this->input->post('date_start'))),
												"date_end"=>date("Y-m-d", strtotime($this->input->post('date_end'))),
												"time_start"=>$this->input->post('time_start'),
												"time_end"=>$this->input->post('time_end'),
												"vehicle_no"=>$this->input->post('vehicle_no'),
												"contractor_name"=>$this->input->post('contractor_name'),
												"contractor_contact"=>$this->input->post('contractor_contact'),
												"remarks"=> $this->input->post('remarks'),
												"userid"=>$userid,
												"created_by"=>$userid,
												"date_created" => date("Y-m-d H:i:s"),
												"date_updated" => date("Y-m-d H:i:s")
												); 
					
						
					$this->update($params,"renovation_id = '$renovation_id'", "condo_renovation_list");	
					$CI =& get_instance();
			        $CI->session->set_flashdata('success_message','Renovation has been updated successfully');
		    		
	}	
	function resident_delete_renovation($id){
	
			$this->delete("renovation_id = '$id'", "condo_renovation_list");
			$CI =& get_instance();
			$CI->session->set_flashdata('success_message','Renovation has been removed successfully');
			return TRUE;
	}	

}
?>