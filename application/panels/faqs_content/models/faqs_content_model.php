<?php

class Faqs_content_model extends MY_Model {
	public function __construct() {
		parent::__construct("app_user");
	}
	public function admin_faqs()
	{
		$params = array(
		        "select" => "*",
		        "from" => "condo_faqs_cat");
		$booking = $this->find($params);
		return $booking;
	}
	
	
	public function admin_faqs_question()
	{
		$cat_id = $this->uri->segment(3);
		
		$params = array(
		        "select" => "*",
		        "from" => "condo_faqs",
				"where" =>"cat_id = '$cat_id'");
		$booking = $this->find($params);
		// echo "<pre>";
		// print_r($booking);
		// exit;
		return $booking;
	}
	public function admin_faqs_qusetion_by_id()
	{
		$params = array(
		        "select" => "*",
		        "from" => "condo_faqs",
				"where" =>"cat_id = '$cat_id'");
		$booking = $this->find($params);
		// echo "<pre>";
		// print_r($booking);
		// exit;
		return $booking;
	}
	public function admin_faqs_one()
	{
		$cat_id = $this->uri->segment(3);
		$params = array(
		        "select" => "*",
		        "from" => "condo_faqs_cat",
				"where"=>"cat_id = '$cat_id'");
		$booking = $this->find($params);
		// echo "<pre>";
		// print_r($booking);
		// exit;
		return $booking;
	}
	public function admin_faqs_question_one()
	{
		$faq_id = $this->uri->segment(3);
		$params = array(
		        "select" => "*",
		        "from" => "condo_faqs",
				"where"=>"faq_id = '$faq_id'");
		$booking = $this->find($params);
		// echo "<pre>";
		// print_r($booking);
		// exit;
		return $booking;
	}
	function admin_faqs_save(){
		$params = array(
		        "cat_name" => $this->input->post('name'),
		        "status" => $this->input->post('status'),
		        "date_created" =>date("Y-m-d H:i:s")
		        );
				$this->insert($params,"condo_faqs_cat");
				$CI =& get_instance();
        		$CI->session->set_flashdata('success_message', "Category has been added Successfully");
	}
	function admin_faqs_question_save(){
		$params = array(
		        "cat_id" => $this->input->post('cat_id'),
		        "question" => $this->input->post('name'),
		        "awnser" => $this->input->post('awnser'),
		        "status" => $this->input->post('status'),
		        "date_created" =>date("Y-m-d H:i:s")
		        );
				$this->insert($params,"condo_faqs");
				$CI =& get_instance();
        		$CI->session->set_flashdata('success_message', "Question has been added Successfully");
	}
	function admin_faqs_question_update(){
	
		$params = array(
		        "question" => $this->input->post('name'),
		        "awnser" => $this->input->post('awnser'),
		        "status" => $this->input->post('status'),
		        "date_updated" =>date("Y-m-d H:i:s")
		        );
		        $faq_id = $this->input->post('faq_id');
			$where = "faq_id = $faq_id";		
				$this->update($params,$where,"condo_faqs");
				$CI =& get_instance();
        		$CI->session->set_flashdata('success_message', "question has been updated Successfully");
	}
	function admin_faqs_update(){
			
		$params = array(
		        "cat_name" => $this->input->post('name'),
		        "status" => $this->input->post('status'),
		        "date_updated" =>date("Y-m-d H:i:s")
		        );
		        $cat_id = $this->input->post('cat_id');
			$where = "cat_id = $cat_id";		
				$this->update($params,$where,"condo_faqs_cat");
				$CI =& get_instance();
        		$CI->session->set_flashdata('success_message', "Category has been updated Successfully");
	}
	function admin_faqs_delete(){
		
				$cat_id = $this->uri->segment(3);
				$where = "cat_id = $cat_id";		
				$this->delete($where,"condo_faqs");
				$this->delete($where,"condo_faqs_cat");
				$CI =& get_instance();
        		$CI->session->set_flashdata('success_message', "Category has been Deleted Successfully");
	}
	function admin_faqs_question_delete(){
		
				$faq_id = $this->uri->segment(3);
				$where = "faq_id = $faq_id";		
				$this->delete($where,"condo_faqs");
				$CI =& get_instance();
        		$CI->session->set_flashdata('success_message', "Question has been Deleted Successfully");
	}
	// function resident_feedback_submit(){
		// $userid =  $this->session->userdata('userid');	
		// $params = array(
		        // "userid" => $userid,
		        // "message" => $this->input->post('firstname'),
		        // "date_created" =>date("Y-m-d H:i:s")
		        // );
				// $this->insert($params,"condo_feedback");
				// $CI =& get_instance();
        		// $CI->session->set_flashdata('success_message', "Feedback has been sent Successfully");
// 		 		
	// }
	
	// public function admin_update_siteinfo()
	// {
		// $params = array(
		        // "name" => $this->input->post('name'),
		        // "address" => $this->input->post('address'),
		        // "tel" => $this->input->post('tel'),
		        // "email" => $this->input->post('email'),
		        // "operating_hours" => $this->input->post('operating_hours'),
		        // "operating_sat_hours" => $this->input->post('operating_sat_hours'),
		        // "operating_closed" => $this->input->post('operating_closed'),
		        // "police" => $this->input->post('police'),
		        // "ambulance" => $this->input->post('ambulance'),
		        // "fire" => $this->input->post('fire'),
		        // "uc_1" => $this->input->post('uc_1'),
		        // "uc_2" => $this->input->post('uc_2'),
		        // "uc_3" => $this->input->post('uc_3'),
		        // "uc_4" => $this->input->post('uc_4'),
		        // "uc_5" => $this->input->post('uc_5')
		        // );
			// $this->update($params,"","condo_siteinfo");
			// $CI =& get_instance();
        	// $CI->session->set_flashdata('success_message', "Site Info updated Successfully");
// 	
	// }

		
}
?>
