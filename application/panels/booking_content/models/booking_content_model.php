<?php

class Booking_content_model extends MY_Model {
	public function __construct() {
		parent::__construct("app_user");
	}
	function admin_view_booking(){
		$params = array(
		        "select" => "a.*,b.booking_facility_name,c.username",
		        "from" => "condo_user_bookings a , condo_booking_facilities b,condo_users c", 
				"where" => "a.booking_facility_id = b.booking_facility_id
							and a.created_by = c.userid");
		$booking = $this->find($params);
	
		return $booking;
	}
	function admin_export_booking(){
	
		
		$query = $this->db->select('condo_users.username AS "Created By",
									condo_user_bookings.booking_date as "Created On",
									condo_user_bookings.user_name as "Username",
									condo_user_bookings.booking_end_date as "Date",
									condo_user_bookings.booking_hours as "Time",
									condo_booking_facilities.booking_facility_title as "Facility",
									condo_user_bookings.status as "Status",
									condo_user_bookings.desident_email as "Email Address",
									condo_user_bookings.desident_contact_no as "Contact No.",
									condo_user_bookings.desident_unit as "Blk. No.",
									condo_user_bookings.desident_block as "Unit No."
									')
							->from('condo_user_bookings')
							->join('condo_booking_facilities', 'condo_booking_facilities.booking_facility_id = condo_user_bookings.booking_facility_id')
							->join('condo_users', 'condo_users.userid = condo_user_bookings.created_by')
							->get();
							// echo "<pre>";
							// print_r($query);
							// exit;
		
		return $query;
	}
	function resident_view_booking(){
		$userid = $this->session->userdata('userid');	
    	$params = array(
		        "select" => "a.*,b.booking_facility_name,c.username",
		        "from" => "condo_user_bookings a , condo_booking_facilities b,condo_users c", 
				"where" => "a.booking_facility_id = b.booking_facility_id
							and a.created_by = c.userid
							AND a.userid = '$userid'");
		$booking = $this->find($params);
	
		return $booking;
	}
	
	
	function admin_detail_booking(){
		$id =  $this->uri->segment(3);
	 	$params = array(
		        "select" => "a.*,b.*",
		        "from" => "condo_user_bookings a , condo_booking_facilities b", 
				"where" => "a.booking_facility_id = b.booking_facility_id 
							and a.booking_id = $id");
						
		$booking = $this->find($params);
		
		return $booking;
	}
	
	function admin_check_rules(){
     $userid = $this->session->userdata('userid');	
     $type =  $this->uri->segment(3);
	 
	 
	switch ($type) {
		case 'audio_visual_room':
			return $this->admin_audio_visual_room_view();
			break;
		
		case 'bbq_pit_1':
		return	$this->admin_bbq_pit_view();
			break;
		case 'bbq_pit_2':
		return	$this->admin_bbq_pit_view();
			break;
			
		case 'bbq_pit_3':
		return $this->admin_bbq_pit_view();
			break;
		
		case 'multi-purpose-function-room':
			return $this->admin_multi_purpose_function_room_view();
			break;
		
		case 'tennis_court_1':
			return $this->admin_tennis_court_view();
			break;
		case 'tennis_court_2':
			return $this->admin_tennis_court_view();
			break;
		
		default:
			
			break;
	} 
	 
	 	 
	}

	function admin_get_availabities(){
     
			     $userid = $this->session->userdata('userid');	
			     $type =  $this->uri->segment(3);
				 $date =  $this->uri->segment(4);
				
				 $params = array(
			        "select" => "booking_facility_id,booking_facility_title",
			        "from" => "condo_booking_facilities",
			        "where" => "booking_facility_name = '$type'"
			     );
				 $data = $this->find($params);
			     $booking_facility_id = $data[0]->booking_facility_id;
				 $booking_facility_title = $data[0]->booking_facility_title;
				
				 $params = array(
			        "select" => "booking_hours",
			        "from" => "condo_booking_facilities_rules",
			        "where" => "booking_facility_id = '$booking_facility_id'"
			     );
				 $data = $this->find($params);
				
			    $timing = explode(",",$data[0]->booking_hours);
			 
			 	$params = array(
				        "select" => "booking_hours",
				        "from" => "condo_user_bookings",
				        "where" => "booking_facility_id =  '$booking_facility_id'
				        			and booking_end_date Like '$date%'
				        			and status != 'Cancelled'");
				$booking = $this->find($params);
				
				foreach ($booking as $key => $value) {
					foreach ($timing as $key1 => $value1) {
						if(strcmp($value->booking_hours , $value1)==0)
						{
								$index = array_search($value1, $timing);	
								unset($timing[$index]);
						}		
					}	
				}
				$data ['timing'] = $timing;	
				$data['booking_facility_id'] = $booking_facility_id;
				$data['booking_facility_date'] = $date;
				$date = new DateTime($date);
				$data['booking_facility_day'] = $date->format('Y-M-d');
				$data['booking_facility_title'] = $booking_facility_title;
				
				return $data;	
	
	}
	function admin_save_booking(){
			
		$name = $this->input->post('name');
		$booking_facility_id = $this->input->post('booking_facility_id');
		$booking_facility_date = $this->input->post('booking_facility_date');
		$params = array(
		        "select" => "userid",
		        "from" => "condo_users",
		        "where" => "username =  '$name'
		        			and user_type = 'resident'");
		$booking = $this->find($params);
		$userid = $booking[0]->userid;
		$time = date('H:i a');
		//echo $time."/";
		//exit;
		$selected_timing_for_booking =  explode(" to ", $this->input->post('selected_timing'));
		$time =  date("H", strtotime($selected_timing_for_booking[0]));
		$date =  date("Y-m-d H:i:s");
		$date1 = date("Y-m-d");
 		$params = array(
	        "select" => "booking_hours",
	        "from" => "condo_user_bookings",
	        "where" => "userid = '$userid'
	        			and booking_end_date Like '$booking_facility_date%'
	        			and (status = 'Pending'
	        			or status = 'Confirmed')"
	     );
		 $booking_id = $this->find($params);
		$same_time_booking = 0;
		foreach ($booking_id as $key => $value) {
		 	$current_bookings =  explode(" to ", $value->booking_hours);
		 	$start =  date("H", strtotime($current_bookings[0]));
		 	$end =  date("H", strtotime($current_bookings[1]));
			if($start<=$time && $end>$time){
				$same_time_booking = 1;
			}	
		}

		//echo "<br>time".$time."<br>";
		//echo $same_time_booking;
		//print_r($booking_id);
		//exit;
		
		
		if($same_time_booking==0){
			
		switch ($booking_facility_id) {
				case 1:
					$this->admin_bbq_pit_save();
					break;
				
				case 2:
					$this->admin_bbq_pit_save();
					break;
				
				case 3:
					$this->admin_bbq_pit_save();
					break;
				
				case 6:
					$this->admin_tennis_court_save();
					break;
				
				case 7:
					$this->admin_tennis_court_save();
					break;
				
				case 5:
					$this->admin_multi_purpose_function_room_save();
					break;
		
		
				case 4:
					$this->admin_audio_visual_room_save();
					break;
					
				
				default:
					
					break;
			}
			
			
		}else{
			$CI =& get_instance();
	        $CI->session->set_flashdata('error_message','not allowed to book any 2 facilities at the same time');
			header("Location:".$_SERVER['HTTP_REFERER']);		
			exit;
		}	
			
		
	}
	function admin_update_booking($status,$booking_id){
			$userid = $this->session->userdata('userid');	
    	
		if($status == "Cancelled"){
			 	$params = array(
		        "select" => "booking_end_date,booking_facility_id",
		        "from" => "condo_user_bookings",
		        "where" => "booking_id =  '$booking_id'");
				$booking = $this->find($params);
 				$booking_facility_id =  $booking[0]->booking_facility_id;
				$booking_end_date  = $booking[0]->booking_end_date;
				$date1=date_create($booking_end_date);
				$date2=date('Y/m/d');
				$date2 = date_create($date2);
				$diff=date_diff($date2,$date1);
				$diff= $diff->format("%a");
				$params = array(
		        "select" => "cancellation",
		        "from" => "condo_booking_facilities_rules",
		        "where" => "booking_facility_id =  '$booking_facility_id'");
				$booking = $this->find($params);
 				$cancellation =  $booking[0]->cancellation;
				 if($diff>$cancellation){
					$prams = array("status"=>$status);
					$where = "booking_id = $booking_id";
					$this->update($prams,$where,"condo_user_bookings");
					$CI =& get_instance();
	        		$CI->session->set_flashdata('success_message','Booking has been Updated');
				 }else{
				 	 $result = $this->findOneBy(array(
						"userid" => $userid
						),'condo_users');
						if($result->user_type == 'admin' || $result->user_type == 'staff'){
								$prams = array("status"=>$status);
								$where = "booking_id = $booking_id";
								$this->update($prams,$where,"condo_user_bookings");
								$CI =& get_instance();
				        		$CI->session->set_flashdata('success_message','Booking has been Updated');
								return TRUE;
						}
					 $CI =& get_instance();
	        		 $CI->session->set_flashdata('error_message','Booking has not been Update Because Remaining days is less then 7 from booked date ');
				 }
			}else{	
				$prams = array("status"=>$status);
				$where = "booking_id = $booking_id";
				$this->update($prams,$where,"condo_user_bookings");
				
				$CI =& get_instance();
	        	$CI->session->set_flashdata('success_message','Booking has been Updated');
				
		}
	
	}
public function admin_bbq_pit_view()
{
	$userid = $this->session->userdata('userid');	
    $type =  $this->uri->segment(3);
		
	$params = array(
			        "select" => "booking_facility_id",
			        "from" => "condo_booking_facilities",
			        "where" => "booking_facility_name = '$type'"
			     );
				 $data = $this->find($params);
				 
				 $booking_facility_id = $data[0]->booking_facility_id;
				 if($booking_facility_id!=null){
						 $params = array(
					        "select" => "*",
					        "from" => "condo_booking_facilities_rules",
					        "where" => "booking_facility_id =  $booking_facility_id"
					     );
						 $data = $this->find($params);
						
						
						 $result['advance_booking'] = $data[0]->advance_booking + date(d);	 
						 if(date(d) == "01"){
							$result['start_date'] = 01;
								
						}else{
							 $result['start_date'] = date(d);
						}
						 $start = date(d);
						 $end = $data[0]->advance_booking + date(d);	 
				 		 $booking_availability = array();
				 		 
				 		  $mon_date = date("Y-m-d");
						  $sun_date = date("Y-m-d",strtotime("+30 days"));
						
						 for ($i=0; $i <=30 ; $i++) { 
							 $date_search[] =  date("Y-m-d",strtotime("+$i days"));
						 }
						
						 $advance_booking  = $data[0]->advance_booking;
				 		 $limit = count(explode(",", $data[0]->booking_hours));
				 		 for($i=0;$i<=$advance_booking;$i++){
			    	 			
							$date_for_availability = date("Y-m-d",strtotime("+$i days"));
						
							$params = array(
					        "select" => "*",
					        "from" => "condo_user_bookings",
					        "where" => "booking_facility_id =  '$booking_facility_id'
					        			and booking_end_date LIKE '$date_for_availability%'
					        			and status != 'Cancelled'"
					     	);
						 	$booking = $this->find($params);
						 	if(count($booking)>=$limit){
						 		$booking_availability["availability"][$start+$i] =0;
						 	}else{
						 		if(!in_array($date_for_availability, $date_search)){
						 			$booking_availability["availability"][$start+$i] =  0;
						 		}else{
						 		$booking_availability["availability"][$start+$i] =  $limit - count($booking);
						 		
						 		}	
						 	}
							$booking_availability["date_for_availability"][$start+$i] = $date_for_availability;
						 }
						$result['booking_availability'] = $booking_availability;
					 }
	// echo "<pre>";
	// print_r($result);
	// exit;
					 return $result;
}
public function admin_tennis_court_view()
{
	$userid = $this->session->userdata('userid');	
    $type =  $this->uri->segment(3);
	
				$params = array(
			        "select" => "booking_facility_id",
			        "from" => "condo_booking_facilities",
			        "where" => "booking_facility_name = '$type'"
			     );
				 $data = $this->find($params);
				 
				 $booking_facility_id = $data[0]->booking_facility_id;
				 if($booking_facility_id!=null){
						 $params = array(
					        "select" => "*",
					        "from" => "condo_booking_facilities_rules",
					        "where" => "booking_facility_id =  $booking_facility_id"
					     );
						 $data = $this->find($params);
						
						
						 $result['advance_booking'] = $data[0]->advance_booking + date(d);	 
						 if(date(d) == "01"){
							$result['start_date'] = 01;
								
						}else{
							 $result['start_date'] = date(d);
						}
						$start = date(d);
						 $end = $data[0]->advance_booking + date(d);	 
				 		 $booking_availability = array();
				 		 
				 		 
						 
			 			  // $day_no = 7-date(N);
				 		  // $mon = date(d)-date(N)+1;
				 		  // $sun = date(d)+$day_no;
						  // $m = date(N)-1;
						  // $mon_date = date("Y-m-d",strtotime("-$m days"));
						  // $sun_date = date("Y-m-d",strtotime("+$day_no days"));
						  // $date_search = array();
						 // for ($i=$m; $i >=0 ; $i--) { 
							 // $date_search[] =  date("Y-m-d",strtotime("-$i days"));
						 // }
						 for ($i=0; $i <=7 ; $i++) { 
							 $date_search[] =  date("Y-m-d",strtotime("+$i days"));
						 }
						 
						 
						 $advance_booking  = $data[0]->advance_booking;
				 		 $limit = count(explode(",", $data[0]->booking_hours));
				 		 for($i=0;$i<=$advance_booking;$i++){
			    	 			
							$date_for_availability = date("Y-m-d",strtotime("+$i days"));
							$params = array(
					        "select" => "*",
					        "from" => "condo_user_bookings",
					        "where" => "booking_facility_id =  '$booking_facility_id'
					        			and booking_end_date LIKE '$date_for_availability%'
					        			and status != 'Cancelled'"
					     	);
						 	$booking = $this->find($params);
						 	if(count($booking)>=$limit){
						 		$booking_availability["availability"][$start+$i] =0;
						 	}else{
						 		if(!in_array($date_for_availability, $date_search)){
						 			$booking_availability["availability"][$start+$i] =  0;
						 		}else{
						 		$booking_availability["availability"][$start+$i] =  $limit - count($booking);
						 		
						 		}	
						 	}
							$booking_availability["date_for_availability"][$start+$i] = $date_for_availability;
						 }
						$result['booking_availability'] = $booking_availability;
					 }
				  	 
				 return $result;	
}
public function admin_audio_visual_room_view()
{
	$userid = $this->session->userdata('userid');	
    $type =  $this->uri->segment(3);
	
				$params = array(
			        "select" => "booking_facility_id",
			        "from" => "condo_booking_facilities",
			        "where" => "booking_facility_name = '$type'"
			     );
				 $data = $this->find($params);
				 
				 $booking_facility_id = $data[0]->booking_facility_id;
				 if($booking_facility_id!=null){
						 $params = array(
					        "select" => "*",
					        "from" => "condo_booking_facilities_rules",
					        "where" => "booking_facility_id =  $booking_facility_id"
					     );
						 $data = $this->find($params);
						
						
						 $result['advance_booking'] = $data[0]->advance_booking + date(d);	 
						 if(date(d) == "01"){
							$result['start_date'] = 01;
								
						}else{
							 $result['start_date'] = date(d);
						}
						$start = date(d);
						 $end = $data[0]->advance_booking + date(d);	 
				 		 $booking_availability = array();
				 		 
				 		 
						 
			 			  // $day_no = 7-date(N);
				 		  // $mon = date(d)-date(N)+1;
				 		  // $sun = date(d)+$day_no;
						  // $m = date(N)-1;
						  // $mon_date = date("Y-m-d",strtotime("-$m days"));
						  // $sun_date = date("Y-m-d",strtotime("+$day_no days"));
						  // $date_search = array();
						 // for ($i=$m; $i >=0 ; $i--) { 
							 // $date_search[] =  date("Y-m-d",strtotime("-$i days"));
						 // }
						 for ($i=0; $i <=7 ; $i++) { 
							 $date_search[] =  date("Y-m-d",strtotime("+$i days"));
						 }
						 
						 
						 $advance_booking  = $data[0]->advance_booking;
				 		 $limit = count(explode(",", $data[0]->booking_hours));
				 		 for($i=0;$i<=$advance_booking;$i++){
			    	 			
							$date_for_availability = date("Y-m-d",strtotime("+$i days"));
							$params = array(
					        "select" => "*",
					        "from" => "condo_user_bookings",
					        "where" => "booking_facility_id =  '$booking_facility_id'
					        			and booking_end_date LIKE '$date_for_availability%'
					        			and status != 'Cancelled'"
					     	);
						 	$booking = $this->find($params);
						 	if(count($booking)>=$limit){
						 		$booking_availability["availability"][$start+$i] =0;
						 	}else{
						 		if(!in_array($date_for_availability, $date_search)){
						 			$booking_availability["availability"][$start+$i] =  0;
						 		}else{
						 		$booking_availability["availability"][$start+$i] =  $limit - count($booking);
						 		
						 		}	
						 	}
							$booking_availability["date_for_availability"][$start+$i] = $date_for_availability;
						 }
						$result['booking_availability'] = $booking_availability;
					 }
				 return $result;
		}
public function admin_multi_purpose_function_room_view()
{
	$userid = $this->session->userdata('userid');	
    $type =  $this->uri->segment(3);
    
				$params = array(
			        "select" => "booking_facility_id",
			        "from" => "condo_booking_facilities",
			        "where" => "booking_facility_name = '$type'"
			     );
				 $data = $this->find($params);
				 
				$booking_facility_id = $data[0]->booking_facility_id;
				 
				 if($booking_facility_id!=null){
						 $params = array(
					        "select" => "*",
					        "from" => "condo_booking_facilities_rules",
					        "where" => "booking_facility_id =  $booking_facility_id"
					     );
						 $data = $this->find($params);
						
						
						 $result['advance_booking'] = $data[0]->advance_booking + date(d);	 
						 if(date(d) == "01"){
							$result['start_date'] = 01;
								
						}else{
							 $result['start_date'] = date(d);
						}
						 $start = date(d);
						 $end = $data[0]->advance_booking + date(d);	 
				 		 $booking_availability = array();
				 		
						 
						 $start = date(d);
						 $end = $data[0]->advance_booking + date(d);	 
				 		 $booking_availability = array();
				 		 
				 		  $mon_date = date("Y-m-d");
						  $sun_date = date("Y-m-d",strtotime("+30 days"));
						
						 for ($i=0; $i <=30 ; $i++) { 
							 $date_search[] =  date("Y-m-d",strtotime("+$i days"));
						 }
					 	
						 
						 $advance_booking  = $data[0]->advance_booking;
				 		 $limit = count(explode(",", $data[0]->booking_hours));
				 		 for($i=0;$i<=$advance_booking;$i++){
			    	 			
							$date_for_availability = date("Y-m-d",strtotime("+$i days"));
							$params = array(
					        "select" => "*",
					        "from" => "condo_user_bookings",
					        "where" => "booking_facility_id =  '$booking_facility_id'
					        			and booking_end_date LIKE '$date_for_availability%'
					        			and status != 'Cancelled'"
					     	);
						 	$booking = $this->find($params);
						 	if(count($booking)>=$limit){
						 		$booking_availability["availability"][$start+$i] =0;
						 	}else{
						 		if(!in_array($date_for_availability, $date_search)){
						 			$booking_availability["availability"][$start+$i] =  0;
						 		}else{
						 		$booking_availability["availability"][$start+$i] =  $limit - count($booking);
						 		
						 		}	
						 	}
							$booking_availability["date_for_availability"][$start+$i] = $date_for_availability;
						 }
						$result['booking_availability'] = $booking_availability;
					 }
				  	 
				 return $result;
		
}
public function admin_bbq_pit_save()
{
			$created_by = $this->session->userdata('userid');	
			$name = $this->input->post('name');
							$booking_facility_id = $this->input->post('booking_facility_id');
							$params = array(
							        "select" => "userid",
							        "from" => "condo_users",
							        "where" => "username =  '$name'
							        			and user_type = 'resident'");
							$booking = $this->find($params);
						 	$userid = $booking[0]->userid;
							
							if(count($booking)>0){
								
									 $last_day_this_month  = date('Y-m-t');
						 			  $first_day_this_month = date('Y-m-01');
						 			  
						 			  $day_no = date(t)-date(d);
							 		  $mon = date(d)-date(t)+1;
							 		  $sun = date(d)+$day_no;
									  $m = date(t)-1;
									  $date_search = array();
									 
									 for ($i=1; $i <=date(t) ; $i++) {
										 if($i<10){
										 	$i = "0".$i;
										 }	 
										 $date_search[] =  date("Y-m-$i");
									 }
									$booking_facility_date = $this->input->post('booking_facility_date');
									$date =  date("Y-m-d H:i:s");
									$date1 = date("Y-m-d");
							 		$booking_count = 0;
									
									if(in_array($booking_facility_date, $date_search))	 
										{
											foreach ($date_search as $key => $value) {
												$params = array(
											        "select" => "booking_id,booking_hours",
											        "from" => "condo_user_bookings",
											        "where" => "booking_facility_id  IN (1,2,3)
											        			and userid = '$userid'
											        			and booking_end_date Like '$value%'
											        			and status != 'Cancelled'"
											     );
												  $booking_id = $this->find($params);
												  if(count($booking_id)>0){
												  	$booking_count += count($booking_id);
												 }
											}
										}
										else{
											$date2=date('Y-m-t');
									 		$date2 = date_create($date2);
											$date1 = date_create($date1);
											$diff=date_diff($date2,$date1);
											$diff= $diff->format("%a");
				
										 for ($i=$diff+1; $i <30+$diff ; $i++) { 
											  $value =  date("Y-m-d",strtotime("+$i days"));
												$params = array(
											        "select" => "booking_id,booking_hours",
											        "from" => "condo_user_bookings",
											        "where" => "booking_facility_id IN (1,2,3)
											        			and userid = '$userid'
											        			and booking_end_date Like '$value%'
											        			and status != 'Cancelled'"
											     );
												  $booking_id = $this->find($params);
												  if(count($booking_id)>0){
												  	$booking_count += count($booking_id);
												 }
											}
										}		
								
								 if($booking_count>=1){
								 	$CI =& get_instance();
							        $CI->session->set_flashdata('error_message','Booking Cancel because Resident have already 1 booking already');
						    		header("Location:".$_SERVER['HTTP_REFERER']);		
									exit;
								 }else{
								 	
									
								 		$date =  date("Y-m-d H:i:s");
						 			 	$booking_facility_date = $this->input->post('booking_facility_date');
										
									 	$booking_end_date = $booking_facility_date." ".date("h:i:s");
									 	$selected_timing = $this->input->post('selected_timing');
										$desident_block = $this->input->post('desident_block');
										$desident_unit = $this->input->post('desident_unit');
										$desident_email = $this->input->post('desident_email');
										$desident_number = $this->input->post('desident_number');
										
										
										$params = array("userid"=>$userid,
														"created_by"=>$created_by,
														"booking_facility_id"=>$booking_facility_id,
														"user_name"=>$name,
														"desident_block"=>$desident_block,
														"desident_unit"=>$desident_unit,
														"desident_email"=>$desident_email,
														"desident_contact_no"=>$desident_number,
														"booking_hours"=>$selected_timing,
														"booking_date" => $date,
														"booking_end_date" => $booking_end_date,
														"status" => "Pending"
														); 
										
										if($this->input->post('selected_timing')=="")
										{
											$CI =& get_instance();
									        $CI->session->set_flashdata('error_message','Please select timing');
								    		header("Location:".$_SERVER['HTTP_REFERER']);		
											exit;	
										}else{
										    $booking_id =  $this->insert($params,"condo_user_bookings");	
											$params = array(
											        "select" => "a.deposit",
											        "from" => "condo_booking_facilities_rules a, condo_user_bookings b",
											        "where" => "a.booking_facility_id = b.booking_facility_id
											        			and b.booking_id = '$booking_id'"
											     );
												  $booking_id = $this->find($params);
												 $deposit = $booking_id[0]->deposit;
												
												$CI =& get_instance();
								        		$CI->session->set_flashdata('success_message','Booking saved');
											 	$CI->session->set_flashdata('deposit',$deposit);
								    	
								    	}
								 }		
							}else{
								$CI =& get_instance();
						        $CI->session->set_flashdata('error_message','invalid resident username');
					    		header("Location:".$_SERVER['HTTP_REFERER']);		
								exit;
							}
		
}

public function admin_tennis_court_save(){
		
							$created_by = $this->session->userdata('userid');	
							$name = $this->input->post('name');
							$booking_facility_id = $this->input->post('booking_facility_id');
							$params = array(
							        "select" => "userid",
							        "from" => "condo_users",
							        "where" => "username =  '$name'
							        			and user_type = 'resident'");
							$booking = $this->find($params);
							$userid = $booking[0]->userid;
							
							if(count($booking)>0){
								
								
									  $day_no = 7-date(N);
							 		  $mon = date(d)-date(N)+1;
							 		  $sun = date(d)+$day_no;
									  $m = date(N)-1;
									  $mon_date = date("Y-m-d",strtotime("-$m days"));
									  $sun_date = date("Y-m-d",strtotime("+$day_no days"));
									  $date_search = array();
									 for ($i=$m; $i >=0 ; $i--) { 
										 $date_search[] =  date("Y-m-d",strtotime("-$i days"));
									 }
									 for ($i=1; $i <=$day_no ; $i++) { 
										 $date_search[] =  date("Y-m-d",strtotime("+$i days"));
									 }
									$booking_facility_date = $this->input->post('booking_facility_date');
									$date =  date("Y-m-d H:i:s");
									$date1 = date("Y-m-d");
							 		$booking_count = 0;
									$peek_hours = array("6:00 PM to 7:00 PM","7:00 PM to 8:00 PM","8:00 PM to 9:00 PM","9:00 PM to 10:00 PM");
									$peek_hours_count = 0;
									
									
									if(in_array($booking_facility_date, $date_search)){
										
										foreach ($date_search as $key => $value) {
											$params = array(
										        "select" => "booking_id,booking_hours",
										        "from" => "condo_user_bookings",
										        "where" => "booking_facility_id IN (6,7)
										        			and userid = '$userid'
										        			and booking_end_date Like '$value%'
										        			and status != 'Cancelled'"
										     );
											  $booking_id = $this->find($params);
											  if(count($booking_id)>0){
											  	// if booking dates are not same 
											  		if($booking_facility_date != $value){
											  			$CI =& get_instance();
													        $CI->session->set_flashdata('error_message','You can only book adjacent hour according to previous booking');
												    		header("Location:".$_SERVER['HTTP_REFERER']);		
															exit;	
											  		}
												
											  	$booking_count += count($booking_id);
												if($booking_count == 2){
												   	$CI =& get_instance();
												   	$CI->session->set_flashdata('error_message','Booking Cancel because Resident have already 2 booking already');
						    					    header("Location:".$_SERVER['HTTP_REFERER']);		
													exit;
												}
												
												// if user has booked one peek hour before
											 	 $selected_timing = $this->input->post('selected_timing');
											 	 if(in_array($booking_id[0]->booking_hours,$peek_hours)){
														
													$peek_hours_count = 1;	
													
													// if selected time also peek hour
													if(in_array($selected_timing,$peek_hours)){
														$CI =& get_instance();
												        $CI->session->set_flashdata('error_message','Booking cancelled as resident has already booked 1 peak hour');
											    		header("Location:".$_SERVER['HTTP_REFERER']);		
														exit;
													}else{
														// if selected time not peek hour	
														
														$current_bookings =  explode(" to ", $selected_timing);
														//$selected_time_start =  date("H", strtotime($current_bookings[0]));
														$selected_time_end =  date("H", strtotime($current_bookings[1]));				
														
														$current_bookings =  explode(" to ", $booking_id[0]->booking_hours);
														$booked_time_start =  date("H", strtotime($current_bookings[0]));
														//$booked_time_end =  date("H", strtotime($current_bookings[1]));				
														
														//if hours or not adjecent
														
														if($selected_time_end != $booked_time_start){
															$CI =& get_instance();
													        $CI->session->set_flashdata('error_message','Booking Cancel because you are not selecting adjecent time');
												    		header("Location:".$_SERVER['HTTP_REFERER']);		
															exit;
														}
													}
												}else{
												
														// if selected time not peek hour	
														$current_bookings =  explode(" to ", $selected_timing);
														$selected_time_start =  date("H", strtotime($current_bookings[0]));
														$selected_time_end =  date("H", strtotime($current_bookings[1]));				
														$count_seleted_time = $selected_time_start + $selected_time_end;
														
														$current_bookings =  explode(" to ", $booking_id[0]->booking_hours);
														$booked_time_start =  date("H", strtotime($current_bookings[0]));
														$booked_time_end =  date("H", strtotime($current_bookings[1]));				
														$count_booked_time = $booked_time_start + $booked_time_end;
																												$totel_time_hour_diff =  $count_seleted_time - $count_booked_time;
														//if hours or not adjecent
														if($totel_time_hour_diff == 2 || $totel_time_hour_diff == -2){
														}else{
															$CI =& get_instance();
													        $CI->session->set_flashdata('error_message','You can only book adjacent hour according to previous booking');
												    		header("Location:".$_SERVER['HTTP_REFERER']);		
															exit;
														}
														
												}
											 }
										}
									}else{
											$date2 =date($date_search[6]);
									 		$date2 = date_create($date2);
											$date1 = date_create($date1);
											$diff=date_diff($date2,$date1);
											$diff= $diff->format("%a");
											
										 for ($i=$diff+1; $i <7+$diff ; $i++) { 
												 $value =  date("Y-m-d",strtotime("+$i days"));
												$params = array(
										        "select" => "booking_id,booking_hours",
										        "from" => "condo_user_bookings",
										        "where" => "booking_facility_id =  '$booking_facility_id'
										        			and userid = '$userid'
										        			and booking_end_date Like '$value%'
										        			and status != 'Cancelled'"
										     );
											  $booking_id = $this->find($params);
											  if(count($booking_id)>0){
											  	
												// if booking dates are not same 
											  		if($booking_facility_date != $value){
											  			$CI =& get_instance();
													        $CI->session->set_flashdata('error_message','You can only book adjacent hour according to previous booking');
												    		header("Location:".$_SERVER['HTTP_REFERER']);		
															exit;	
											  		}
												
											  	$booking_count += count($booking_id);
											
											 	 if(in_array($booking_id[0]->booking_hours,$peek_hours)){
													$peek_hours_count = 1;	
											 	 	
											 	 	$selected_timing = $this->input->post('selected_timing');
													if(in_array($selected_timing,$peek_hours)){
														$CI =& get_instance();
												        $CI->session->set_flashdata('error_message','Booking cancelled as resident has already booked 1 peak hour');
											    		header("Location:".$_SERVER['HTTP_REFERER']);		
														exit;
													}else{
														// if selected time not peek hour	
														
														$current_bookings =  explode(" to ", $selected_timing);
														//$selected_time_start =  date("H", strtotime($current_bookings[0]));
														$selected_time_end =  date("H", strtotime($current_bookings[1]));				
														
														$current_bookings =  explode(" to ", $booking_id[0]->booking_hours);
														$booked_time_start =  date("H", strtotime($current_bookings[0]));
														//$booked_time_end =  date("H", strtotime($current_bookings[1]));				
														
														//if hours or not adjecent
														if($selected_time_end != $booked_time_start){
															$CI =& get_instance();
													        $CI->session->set_flashdata('error_message','Booking Cancel because you are not selecting adjecent time');
												    		header("Location:".$_SERVER['HTTP_REFERER']);		
															exit;
														}
													}
												 }else{
												
														// if selected time not peek hour	
														$current_bookings =  explode(" to ", $selected_timing);
														$selected_time_start =  date("H", strtotime($current_bookings[0]));
														$selected_time_end =  date("H", strtotime($current_bookings[1]));				
														$count_seleted_time = $selected_time_start + $selected_time_end;
														
														$current_bookings =  explode(" to ", $booking_id[0]->booking_hours);
														$booked_time_start =  date("H", strtotime($current_bookings[0]));
														$booked_time_end =  date("H", strtotime($current_bookings[1]));				
														$count_booked_time = $booked_time_start + $booked_time_end;
																												$totel_time_hour_diff =  $count_seleted_time - $count_booked_time;
														//if hours or not adjecent
														if($totel_time_hour_diff == 2 || $totel_time_hour_diff == -2){
														}else{
															$CI =& get_instance();
													        $CI->session->set_flashdata('error_message','You can only book adjacent hour according to previous booking');
												    		header("Location:".$_SERVER['HTTP_REFERER']);		
															exit;
														}
														
												}
											 }
										
										}
									}	
										
									
									
								 if($booking_count>=2){
								 	$CI =& get_instance();
							        $CI->session->set_flashdata('error_message','Booking Cancel because Resident have already 2 booking already');
						    		header("Location:".$_SERVER['HTTP_REFERER']);		
									exit;
								 }else{
								 		$date =  date("Y-m-d H:i:s");
						 			 	$booking_facility_date = $this->input->post('booking_facility_date');
										
									 	$booking_end_date = $booking_facility_date." ".date("h:i:s");
									 	$selected_timing = $this->input->post('selected_timing');
										$desident_block = $this->input->post('desident_block');
										$desident_unit = $this->input->post('desident_unit');
										$desident_email = $this->input->post('desident_email');
										$desident_number = $this->input->post('desident_number');
										
										if(in_array($selected_timing,$peek_hours) && $peek_hours_count == 1){
												$CI =& get_instance();
										        $CI->session->set_flashdata('error_message','Booking cancelled as resident has already booked 1 peak hour');
									    		header("Location:".$_SERVER['HTTP_REFERER']);		
												exit;
										 }
										
										$params = array("userid"=>$userid,
														"created_by"=>$created_by,
														"booking_facility_id"=>$booking_facility_id,
														"user_name"=>$name,
														"desident_block"=>$desident_block,
														"desident_unit"=>$desident_unit,
														"desident_email"=>$desident_email,
														"desident_contact_no"=>$desident_number,
														"booking_hours"=>$selected_timing,
														"booking_date" => $date,
														"booking_end_date" => $booking_end_date,
														"status" => "Confirmed"
														); 
										
										if($this->input->post('selected_timing')=="")
										{
											$CI =& get_instance();
									        $CI->session->set_flashdata('error_message','Please select timing');
								    		header("Location:".$_SERVER['HTTP_REFERER']);		
											exit;	
										}else{
										 $booking_id =  $this->insert($params,"condo_user_bookings");	
											$params = array(
											        "select" => "a.deposit",
											        "from" => "condo_booking_facilities_rules a, condo_user_bookings b",
											        "where" => "a.booking_facility_id = b.booking_facility_id
											        			and b.booking_id = '$booking_id'"
											     );
												  $booking_id = $this->find($params);
												 $deposit = $booking_id[0]->deposit;
												
												$CI =& get_instance();
								        		$CI->session->set_flashdata('success_message','Booking saved');
											 	$CI->session->set_flashdata('deposit',$deposit);
								    	}
								 }		
							}else{
								$CI =& get_instance();
						        $CI->session->set_flashdata('error_message','invalid resident username');
					    		header("Location:".$_SERVER['HTTP_REFERER']);		
								exit;
							}	
}
public function admin_multi_purpose_function_room_save()
{
			$created_by = $this->session->userdata('userid');	
			$name = $this->input->post('name');
							$booking_facility_id = $this->input->post('booking_facility_id');
							$params = array(
							        "select" => "userid",
							        "from" => "condo_users",
							        "where" => "username =  '$name'
							        			and user_type = 'resident'");
							$booking = $this->find($params);
							$userid = $booking[0]->userid;
							
							if(count($booking)>0){
								
									
									 $last_day_this_month  = date('Y-m-t');
						 			  $first_day_this_month = date('Y-m-01');
						 			  
						 			  $day_no = date(t)-date(d);
							 		  $mon = date(d)-date(t)+1;
							 		  $sun = date(d)+$day_no;
									  $m = date(t)-1;
									  $date_search = array();
									 
									 for ($i=1; $i <=date(t) ; $i++) {
										 if($i<10){
										 	$i = "0".$i;
										 }	 
										 $date_search[] =  date("Y-m-$i");
					
					
									 }
									 
									 
										 
									$booking_facility_date = $this->input->post('booking_facility_date');
									$date =  date("Y-m-d H:i:s");
									$date1 = date("Y-m-d");
							 		$booking_count = 0;
									
									if(in_array($booking_facility_date, $date_search))	 
										{
											foreach ($date_search as $key => $value) {
												$params = array(
											        "select" => "booking_id,booking_hours",
											        "from" => "condo_user_bookings",
											        "where" => "booking_facility_id ='$booking_facility_id'
											        			and userid = '$userid'
											        			and booking_end_date Like '$value%'
											        			and status != 'Cancelled'"
											     );
												  $booking_id = $this->find($params);
												  if(count($booking_id)>0){
												  	$booking_count += count($booking_id);
												 }
											}
										}
										else{
											$date2=date('Y-m-t');
									 		$date2 = date_create($date2);
											$date1 = date_create($date1);
											$diff=date_diff($date2,$date1);
											$diff= $diff->format("%a");
				
										 for ($i=$diff+1; $i <30+$diff ; $i++) { 
					
											
											  $value =  date("Y-m-d",strtotime("+$i days"));
												$params = array(
											        "select" => "booking_id,booking_hours",
											        "from" => "condo_user_bookings",
											        "where" => "booking_facility_id ='$booking_facility_id'
											        			and userid = '$userid'
											        			and booking_end_date Like '$value%'
											        			and status != 'Cancelled'"
											     );
												  $booking_id = $this->find($params);
												  if(count($booking_id)>0){
												  	$booking_count += count($booking_id);
												 }
											}
										}		
									
									
								 if($booking_count>=1){
								 	$CI =& get_instance();
							        $CI->session->set_flashdata('error_message','Booking Cancel because Resident have already 1 booking already');
						    		header("Location:".$_SERVER['HTTP_REFERER']);		
									exit;
								 }else{
								 		$date =  date("Y-m-d H:i:s");
						 			 	$booking_facility_date = $this->input->post('booking_facility_date');
										
									 	$booking_end_date = $booking_facility_date." ".date("h:i:s");
									 	$selected_timing = $this->input->post('selected_timing');
										$desident_block = $this->input->post('desident_block');
										$desident_unit = $this->input->post('desident_unit');
										$desident_email = $this->input->post('desident_email');
										$desident_number = $this->input->post('desident_number');
										
										
										$params = array("userid"=>$userid,
														"created_by"=>$created_by,
														"booking_facility_id"=>$booking_facility_id,
														"user_name"=>$name,
														"desident_block"=>$desident_block,
														"desident_unit"=>$desident_unit,
														"desident_email"=>$desident_email,
														"desident_contact_no"=>$desident_number,
														"booking_hours"=>$selected_timing,
														"booking_date" => $date,
														"booking_end_date" => $booking_end_date,
														"status" => "Pending"
														); 
										
										if($this->input->post('selected_timing')=="")
										{
											$CI =& get_instance();
									        $CI->session->set_flashdata('error_message','Please select timing');
								    		header("Location:".$_SERVER['HTTP_REFERER']);		
											exit;	
										}else{
											$booking_id =  $this->insert($params,"condo_user_bookings");	
											$params = array(
											        "select" => "a.deposit",
											        "from" => "condo_booking_facilities_rules a, condo_user_bookings b",
											        "where" => "a.booking_facility_id = b.booking_facility_id
											        			and b.booking_id = '$booking_id'"
											     );
												  $booking_id = $this->find($params);
												 $deposit = $booking_id[0]->deposit;
												
												$CI =& get_instance();
								        		$CI->session->set_flashdata('success_message','Booking saved');
											 	$CI->session->set_flashdata('deposit',$deposit);
								     	}
								 }		
							}else{
								$CI =& get_instance();
						        $CI->session->set_flashdata('error_message','invalid resident username');
					    		header("Location:".$_SERVER['HTTP_REFERER']);		
								exit;
							}
		
}

public function admin_audio_visual_room_save()
{
							$created_by = $this->session->userdata('userid');	
							$name = $this->input->post('name');
							$booking_facility_id = $this->input->post('booking_facility_id');
							$params = array(
							        "select" => "userid",
							        "from" => "condo_users",
							        "where" => "username =  '$name'
							        			and user_type = 'resident'");
							$booking = $this->find($params);
							$userid = $booking[0]->userid;
							
							if(count($booking)>0){
								
									  $day_no = 7-date(N);
							 		  $mon = date(d)-date(N)+1;
							 		  $sun = date(d)+$day_no;
									  $m = date(N)-1;
									  $mon_date = date("Y-m-d",strtotime("-$m days"));
									  $sun_date = date("Y-m-d",strtotime("+$day_no days"));
									  $date_search = array();
									 for ($i=$m; $i >=0 ; $i--) { 
										 $date_search[] =  date("Y-m-d",strtotime("-$i days"));
									 }
									 for ($i=1; $i <=$day_no ; $i++) { 
										 $date_search[] =  date("Y-m-d",strtotime("+$i days"));
									 }
									$booking_facility_date = $this->input->post('booking_facility_date');
									$date =  date("Y-m-d H:i:s");
									$date1 = date("Y-m-d");
							 		$booking_count = 0;
									$peek_hours = array("6:00 PM to 7:00 PM","7:00 PM to 8:00 PM","8:00 PM to 9:00 PM","9:00 PM to 10:00 PM");
									$peek_hours_count = 0;
									
									if(in_array($booking_facility_date, $date_search)){
										
										foreach ($date_search as $key => $value) {
											$params = array(
										        "select" => "booking_id,booking_hours",
										        "from" => "condo_user_bookings",
										        "where" => "booking_facility_id =  '$booking_facility_id'
										        			and userid = '$userid'
										        			and booking_end_date Like '$value%'
										        			and status != 'Cancelled'"
										     );
											  $booking_id = $this->find($params);
											  if(count($booking_id)>0){
											  	// if booking dates are not same 
											  		if($booking_facility_date != $value){
											  			$CI =& get_instance();
													        $CI->session->set_flashdata('error_message','You can only book adjacent hour according to previous booking');
												    		header("Location:".$_SERVER['HTTP_REFERER']);		
															exit;	
											  		}
												
											  	$booking_count += count($booking_id);
												// if user has booked one peek hour before
											 	 $selected_timing = $this->input->post('selected_timing');
											 	 if(in_array($booking_id[0]->booking_hours,$peek_hours)){
														
													$peek_hours_count = 1;	
													
													// if selected time also peek hour
													if(in_array($selected_timing,$peek_hours)){
														$CI =& get_instance();
												        $CI->session->set_flashdata('error_message','Booking cancelled as resident has already booked 1 peak hour');
											    		header("Location:".$_SERVER['HTTP_REFERER']);		
														exit;
													}else{
														// if selected time not peek hour	
														
														$current_bookings =  explode(" to ", $selected_timing);
														//$selected_time_start =  date("H", strtotime($current_bookings[0]));
														$selected_time_end =  date("H", strtotime($current_bookings[1]));				
														
														$current_bookings =  explode(" to ", $booking_id[0]->booking_hours);
														$booked_time_start =  date("H", strtotime($current_bookings[0]));
														//$booked_time_end =  date("H", strtotime($current_bookings[1]));				
														
														//if hours or not adjecent
														
														if($selected_time_end != $booked_time_start){
															$CI =& get_instance();
													        $CI->session->set_flashdata('error_message','Booking Cancel because you are not selecting adjecent time');
												    		header("Location:".$_SERVER['HTTP_REFERER']);		
															exit;
														}
													}
												}else{
												
														// if selected time not peek hour	
														$current_bookings =  explode(" to ", $selected_timing);
														$selected_time_start =  date("H", strtotime($current_bookings[0]));
														$selected_time_end =  date("H", strtotime($current_bookings[1]));				
														$count_seleted_time = $selected_time_start + $selected_time_end;
														
														$current_bookings =  explode(" to ", $booking_id[0]->booking_hours);
														$booked_time_start =  date("H", strtotime($current_bookings[0]));
														$booked_time_end =  date("H", strtotime($current_bookings[1]));				
														$count_booked_time = $booked_time_start + $booked_time_end;
																												$totel_time_hour_diff =  $count_seleted_time - $count_booked_time;
														//if hours or not adjecent
														if($totel_time_hour_diff == 2 || $totel_time_hour_diff == -2){
														}else{
															$CI =& get_instance();
													        $CI->session->set_flashdata('error_message','You can only book adjacent hour according to previous booking');
												    		header("Location:".$_SERVER['HTTP_REFERER']);		
															exit;
														}
														
												}
											 }
										}
									}else{
											$date2 =date($date_search[6]);
									 		$date2 = date_create($date2);
											$date1 = date_create($date1);
											$diff=date_diff($date2,$date1);
											$diff= $diff->format("%a");
											
										 for ($i=$diff+1; $i <7+$diff ; $i++) { 
												 $value =  date("Y-m-d",strtotime("+$i days"));
												$params = array(
										        "select" => "booking_id,booking_hours",
										        "from" => "condo_user_bookings",
										        "where" => "booking_facility_id =  '$booking_facility_id'
										        			and userid = '$userid'
										        			and booking_end_date Like '$value%'
										        			and status != 'Cancelled'"
										     );
											  $booking_id = $this->find($params);
											  if(count($booking_id)>0){
											  	
												// if booking dates are not same 
											  		if($booking_facility_date != $value){
											  			$CI =& get_instance();
													        $CI->session->set_flashdata('error_message','You can only book adjacent hour according to previous booking');
												    		header("Location:".$_SERVER['HTTP_REFERER']);		
															exit;	
											  		}
												
											  	$booking_count += count($booking_id);
											
											 	 if(in_array($booking_id[0]->booking_hours,$peek_hours)){
													$peek_hours_count = 1;	
											 	 	
											 	 	$selected_timing = $this->input->post('selected_timing');
													if(in_array($selected_timing,$peek_hours)){
														$CI =& get_instance();
												        $CI->session->set_flashdata('error_message','Booking cancelled as resident has already booked 1 peak hour');
											    		header("Location:".$_SERVER['HTTP_REFERER']);		
														exit;
													}else{
														// if selected time not peek hour	
														
														$current_bookings =  explode(" to ", $selected_timing);
														//$selected_time_start =  date("H", strtotime($current_bookings[0]));
														$selected_time_end =  date("H", strtotime($current_bookings[1]));				
														
														$current_bookings =  explode(" to ", $booking_id[0]->booking_hours);
														$booked_time_start =  date("H", strtotime($current_bookings[0]));
														//$booked_time_end =  date("H", strtotime($current_bookings[1]));				
														
														//if hours or not adjecent
														if($selected_time_end != $booked_time_start){
															$CI =& get_instance();
													        $CI->session->set_flashdata('error_message','Booking Cancel because you are not selecting adjecent time');
												    		header("Location:".$_SERVER['HTTP_REFERER']);		
															exit;
														}
													}
												 }else{
												
														// if selected time not peek hour	
														$current_bookings =  explode(" to ", $selected_timing);
														$selected_time_start =  date("H", strtotime($current_bookings[0]));
														$selected_time_end =  date("H", strtotime($current_bookings[1]));				
														$count_seleted_time = $selected_time_start + $selected_time_end;
														
														$current_bookings =  explode(" to ", $booking_id[0]->booking_hours);
														$booked_time_start =  date("H", strtotime($current_bookings[0]));
														$booked_time_end =  date("H", strtotime($current_bookings[1]));				
														$count_booked_time = $booked_time_start + $booked_time_end;
																												$totel_time_hour_diff =  $count_seleted_time - $count_booked_time;
														//if hours or not adjecent
														if($totel_time_hour_diff == 2 || $totel_time_hour_diff == -2){
														}else{
															$CI =& get_instance();
													        $CI->session->set_flashdata('error_message','You can only book adjacent hour according to previous booking');
												    		header("Location:".$_SERVER['HTTP_REFERER']);		
															exit;
														}
														
												}
											 }
										
										}
									}	
										
										
										
								 if($booking_count>=2){
								 	$CI =& get_instance();
							        $CI->session->set_flashdata('error_message','Booking Cancel because Resident have already 2 booking already');
						    		header("Location:".$_SERVER['HTTP_REFERER']);		
									exit;
								 }else{
								 		$date =  date("Y-m-d H:i:s");
						 			 	$booking_facility_date = $this->input->post('booking_facility_date');
										
									 	$booking_end_date = $booking_facility_date." ".date("h:i:s");
									 	$selected_timing = $this->input->post('selected_timing');
										$desident_block = $this->input->post('desident_block');
										$desident_unit = $this->input->post('desident_unit');
										$desident_email = $this->input->post('desident_email');
										$desident_number = $this->input->post('desident_number');
										
										if(in_array($selected_timing,$peek_hours) && $peek_hours_count == 1){
												$CI =& get_instance();
										        $CI->session->set_flashdata('error_message','Booking cancelled as resident has already booked 1 peak hour');
									    		header("Location:".$_SERVER['HTTP_REFERER']);		
												exit;
										 }
										
										$params = array("userid"=>$userid,
														"created_by"=>$created_by,
														"booking_facility_id"=>$booking_facility_id,
														"user_name"=>$name,
														"desident_block"=>$desident_block,
														"desident_unit"=>$desident_unit,
														"desident_email"=>$desident_email,
														"desident_contact_no"=>$desident_number,
														"booking_hours"=>$selected_timing,
														"booking_date" => $date,
														"booking_end_date" => $booking_end_date,
														"status" => "Pending"
														); 
										
										if($this->input->post('selected_timing')=="")
										{
											$CI =& get_instance();
									        $CI->session->set_flashdata('error_message','Please select timing');
								    		header("Location:".$_SERVER['HTTP_REFERER']);		
											exit;	
										}else{
											$booking_id =  $this->insert($params,"condo_user_bookings");	
											$params = array(
											        "select" => "a.deposit",
											        "from" => "condo_booking_facilities_rules a, condo_user_bookings b",
											        "where" => "a.booking_facility_id = b.booking_facility_id
											        			and b.booking_id = '$booking_id'"
											     );
												  $booking_id = $this->find($params);
												 $deposit = $booking_id[0]->deposit;
												
												$CI =& get_instance();
								        		$CI->session->set_flashdata('success_message','Booking saved');
											 	$CI->session->set_flashdata('deposit',$deposit);
								    	}
								 }		
							}else{
								$CI =& get_instance();
						        $CI->session->set_flashdata('error_message','invalid resident username');
					    		header("Location:".$_SERVER['HTTP_REFERER']);		
								exit;
							}
	}
	function admin_edit_update_booking(){
	
		$prams = array(
					"booking_date"=>$this->input->post('inputSubmitedAt')
					
				);
		$where = "booking_id = $booking_id";
				
		
	}	


	function resident_get_availabities(){
     		     $userid = $this->session->userdata('userid');	
			     $type =  $this->uri->segment(3);
				 $date =  $this->uri->segment(4);
								
				 $params = array(
			        "select" => "booking_facility_id,booking_facility_title",
			        "from" => "condo_booking_facilities",
			        "where" => "booking_facility_name = '$type'"
			     );
				 $data = $this->find($params);
			     $booking_facility_id = $data[0]->booking_facility_id;
				 $booking_facility_title = $data[0]->booking_facility_title;
				
				 $params = array(
			        "select" => "booking_hours",
			        "from" => "condo_booking_facilities_rules",
			        "where" => "booking_facility_id = '$booking_facility_id'"
			     );
				 $data = $this->find($params);
				
			    $timing = explode(",",$data[0]->booking_hours);
			 	$params = array(
				        "select" => "booking_hours",
				        "from" => "condo_user_bookings",
				        "where" => "booking_facility_id =  '$booking_facility_id'
				        			and booking_end_date Like '$date%'
				        			and status != 'Cancelled'");
				$booking = $this->find($params);
				
				foreach ($booking as $key => $value) {
					foreach ($timing as $key1 => $value1) {
						if(strcmp($value->booking_hours , $value1)==0)
						{
								$index = array_search($value1, $timing);	
								unset($timing[$index]);
						}	
					}	
				}
				 $params = array(
			        "select" => "*",
			        "from" => "condo_users",
			        "where" => "userid = '$userid'"
			     );
				$user_data = $this->find($params);
			    $data["user_data"]  = $user_data[0];
				$data ['timing'] = $timing;	
				$data['booking_facility_id'] = $booking_facility_id;
				$data['booking_facility_date'] = $date;
				$date = new DateTime($date);
				$data['booking_facility_day'] = $date->format('Y-M-d');
				$data['booking_facility_title'] = $booking_facility_title;
				return $data;	
	}

}
?>
