<?php

class Contact_content_model extends MY_Model {
	public function __construct() {
		parent::__construct("app_user");
	}
	function resident_contact_submit(){
		$userid =  $this->session->userdata('userid');	
		$params = array(
		        "userid" => $userid,
		        "message" => $this->input->post('firstname'),
		        "date_created" =>date("Y-m-d H:i:s")
		        );
				$this->insert($params,"condo_contact");
				$CI =& get_instance();
        		$CI->session->set_flashdata('success_message', "Message has been sent Successfully");
		 		
	}
	function resident_feedback_submit(){
		$userid =  $this->session->userdata('userid');	
		$params = array(
		        "userid" => $userid,
		        "message" => $this->input->post('firstname'),
		        "date_created" =>date("Y-m-d H:i:s")
		        );
				$this->insert($params,"condo_feedback");
				$CI =& get_instance();
        		$CI->session->set_flashdata('success_message', "Feedback has been sent Successfully");
		 		
	}
	public function admin_siteinfo()
	{
		$params = array(
		        "select" => "*",
		        "from" => "condo_siteinfo");
		$booking = $this->find($params);
		return $booking;
	}
	public function admin_update_siteinfo()
	{
		$params = array(
		        "name" => $this->input->post('name'),
		        "address" => $this->input->post('address'),
		        "tel" => $this->input->post('tel'),
		        "email" => $this->input->post('email'),
		        "operating_hours" => $this->input->post('operating_hours'),
		        "operating_sat_hours" => $this->input->post('operating_sat_hours'),
		        "operating_closed" => $this->input->post('operating_closed'),
		        "police" => $this->input->post('police'),
		        "ambulance" => $this->input->post('ambulance'),
		        "fire" => $this->input->post('fire'),
		        "uc_1" => $this->input->post('uc_1'),
		        "uc_2" => $this->input->post('uc_2'),
		        "uc_3" => $this->input->post('uc_3'),
		        "uc_4" => $this->input->post('uc_4'),
		        "uc_5" => $this->input->post('uc_5')
		        );
			$this->update($params,"","condo_siteinfo");
			$CI =& get_instance();
        	$CI->session->set_flashdata('success_message', "Site Info updated Successfully");
	
	}

		
}
?>
