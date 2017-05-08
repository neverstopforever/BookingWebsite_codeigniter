<?php

class Holiday_content_model extends MY_Model {
	public function __construct() {
		parent::__construct("app_user");
	}
	function admin_view_holiday(){
		$params = array(
		        "select" => "*",
		        "from" => "condo_holidays");
		$holidays = $this->find($params);
		return $holidays;
	}
	function admin_add_holiday(){
	
			 $userid = $this->session->userdata('userid');	
    		$CI =& get_instance();
        ////////////////form validation ///////////////////////
          	$CI->session->set_flashdata('success_message', "A new date has been added successfully");
      $params = array(
		        "holiday_date" => $this->input->post('inputdate'),
		        "public_holiday" => $this->input->post('inputholiday'),
		        "userid" => $userid,
		        "date_created" =>date("Y-m-d H:i:s")
		        );
		
				$this->insert($params,"condo_holidays");
	
	}
	function admin_update_holiday(){
	
		$Params = array(
					"holiday_date"=> $this->input->post('inputdate_edit'),
					"public_holiday"=> $this->input->post('inputholiday_edit')
					);
		$holidayid =  $this->input->post('inputholidayid_edit');
		$this->update($Params,"holidayid = '$holidayid'", "condo_holidays");
		$CI =& get_instance();
        $CI->session->set_flashdata('success_message', "The selected date has been successfully Updated");
    }
	
function admin_delete_holiday(){
			$CI =& get_instance();
        ////////////////form validation ///////////////////////
          	$id =  $this->uri->segment(3);
			$this->delete("holidayid = '$id'", "condo_holidays");
          	$CI->session->set_flashdata('success_message', "THe selected date has been successfully removed");
           
		}
function get_data_ajax($holiday_id){
		$where="holidayid ='$holiday_id'";	
		$count=$this->findOneBy($where, "condo_holidays");
		return $count;
	}
		
}
?>
