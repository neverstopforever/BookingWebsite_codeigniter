<?php
	if (isset($error_message) && $error_message!=""){ ?>
	    <script>
	       setTimeout(function() {
	            $.bootstrapGrowl('<?php echo $error_message;?>', {
	                type: 'danger',
	                align: 'center',
	                width: 'auto',
	                allow_dismiss: false
	            });
	        }, 1);
	    </script>
<?php } ?>
<?php
	if (isset($success_message) && $success_message!=""){ ?>
	<script>
	       setTimeout(function() {
	            $.bootstrapGrowl('<?php echo $success_message;?>', {
	                type: 'success',
	                align: 'center',
	                width: 'auto',
	                allow_dismiss: false
	            });
	        }, 1);
	    </script>
<?php } ?>
		<div class="content twocols page11">
			<div class="row">
				<div class="col-md-4 col-sm-6 col-xs-12">
					<div class="container-fluid guestlist">
						<p class="left"><b>Select your Date and Slot</b></p>
						<div class="clear"></div>
						<div>
							<div class="aros" style="float: left; margin-top: 5px; margin-right: 5px;"><a href="#"><i class="glyphicon glyphicon-triangle-left"></i></a></div>
							<div style="float: left; width: 75%;" class="date form_date input-group date" data-date="" data-date-format="dd-M-yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
								<input type="text" class="form-control" id="inputDateofVisit" value="<?php echo $booking_facility_day;?>" >
								<span class="input-group-addon"><img src="<?php echo $this->config->base_url(); ?>r/img/calendar-icon.png" class="date"></span>
							</div>
							<div class="aros" style="float: left; margin-top: 5px; margin-left: 5px;"><a href="#"><i class="glyphicon glyphicon-triangle-right"></i></a></div>
						</div>	
					</div>
					<div class="container-fluid date-pick">
						<div class="row">
							<div class="col-md-6">
								
								<?php
								$c = count($timing);
								$c = $c / 2;
								$c = round($c);
								$i = 1;
								 foreach ($timing as $key => $value) {
								?>
										<button class="btn btn-date-default"  onClick="reply_click('<?php echo $value;?>')" href="#"><?php echo $value; ?></button>
									<?php
									if ($i == $c):
									?>
									</div>
									<div class="col-md-6">
									<?php	
									endif;
									 $i++;
								} ?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-8 col-sm-6 col-xs-12">
					<div class="container-fluid guestlist">
						<p class="left"><b></b></p>
						<div class="clear"></div>
							<div class="input-group select-div facility-select-box" style="left:10px; margin-top:10px;">
								<label for="facility-select">Facility</label><br />
								 <?php $type =  $this->uri->segment(3);?>
								    <select id="facility-select" name="facilitySelect">
									<option value="tennis_court_1"  <?php if($type=="tennis_court_1"){echo "selected";}?>>Tennis Court 1</option>
									<option value="tennis_court_2"  <?php if($type=="tennis_court_2"){echo "selected";}?>>Tennis Court 2</option>
									<option value="audio_visual_room" <?php if($type=="audio_visual_room"){echo "selected";}?>>Audio-Visual Room</option>
									<option value="multi-purpose-function-room"  <?php if($type=="multi-purpose-function-room"){echo "selected";}?>>Multi-Purpose Function Room</option>
									<option value="bbq_pit_1" <?php if($type=="bbq_pit_1"){echo "selected";}?>>BBQ Pit 1</option>
									<option value="bbq_pit_2" <?php if($type=="bbq_pit_2"){echo "selected";}?>>BBQ Pit 2</option>
									<option value="bbq_pit_3" <?php if($type=="bbq_pit_3"){echo "selected";}?>>BBQ Pit 3</option>
									</select>
							</div>
					</div>
					<form class="form-horizontal form-edit" style="background:url(<?php echo $this->config->base_url(); ?>r/img/bg_pattern.png); padding:20px 40px;" method="post" action="<?php echo $this->config->base_url()?>booking_content/staff_save_booking_content">
						
						<input type="hidden" class="form-control" name = "selected_timing" id="selected_timing" placeholder="" value="<?php echo $timing[0];?>" requried>
						<input type="hidden" class="form-control" name = "booking_facility_id" id="booking_facility_id" value="<?php echo $booking_facility_id;?>">
						<input type="hidden" class="form-control" name = "booking_facility_date" id="booking_facility_date" value="<?php echo $booking_facility_date;?>">
						<div class="row" style="margin-left:0px;">
							<div class="date"><b>Date:</b> <?php echo $booking_facility_date;?></div>
							<div class="date"><b>Time:</b> <span id="timing"> <?php echo $timing[0];?></span></div>
							<div class="date"><b>Facility:</b> <?php echo $booking_facility_title;?></div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<label for="inputSender" class="control-label">NAME*</label>
								<input type="text" name = "name" class="form-control" id="inputSender" placeholder="">
							</div>
							<div class="col-md-4">
								<label for="inputSender" class="control-label">RESIDENT BLOCK</label>
								<input type="text" name="desident_block" class="form-control" id="inputSender" placeholder="">
							</div>
							<div class="col-md-3">
								<label for="inputSender" class="control-label">RESIDENT UNIT</label>
								<input type="text" name="desident_unit" class="form-control" id="inputSender" placeholder="">
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<label for="inputSender" class="control-label">RESIDENT EMAIL*</label>
								<input type="text" name="desident_email" class="form-control" id="inputSender" placeholder="">
							</div>
							<div class="col-md-4">
								<label for="inputSender" class="control-label">RESIDENT CONTACT NUMBER</label>
								<input type="text" name="desident_number" class="form-control" id="inputSender" placeholder="">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label>&nbsp;</label><br/>
								<p class="terms">By clicking "submit", you have agreed to the <a href=""  class="open-AddBookDialog-cancel" id = "terms_conditon" data-toggle="modal" data-target="">Terms & Conditions</a>.</p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								</br><span class="compulsory">* Compulsory <br> <text style="margin-left:10px;">fields</text></span>
							</div>
							<div class="col-md-2">
								</br><button class="btn btn-default" href="#" style="margin:0;">SUBMIT</button>	
							</div>
							<!-- <div class="col-md-8" style="margin-top:10px;">
								<br/><span class="correctly">Please fill out all fields correctly</span>
							</div> -->
						</div>
					</form>
				</div>
			</div>
		
	
		<!-- Modal -->
		<div class="modal fade" id="tocModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content"></div>
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
		      </div>
		      <div class="modal-body">
		        A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single
		      </div>
		    </div>
		  </div>
		  
		  
		   <div class="modal fade" id="tennis_court_1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-body">
		        <p style="text-align: center;">
		        	<center><h4>Tennis Court 1	</h4></center>
		        	<strong>
				<p>1. Opening hours are 8.00 am to 10.00 pm daily.</p>
					<p>2. The security officers are authorized to stop any games that extend beyond 10.00 pm and switch
					off all lightings to the courts.</p>
					<p>3. The maximum number of guests per apartment unit who may use the tennis court shall not exceed
					four (4) persons at any one time.</p>
					<p>4. All players must be properly attired for the games.</p>
					<p>5. Advance booking can be made on a first-come-first-served basis up to a maximum of 7 days.</p>
					<p>6. Each apartment unit may book a maximum of two (2) hours per session in any one day.</p>
					<p>7. Residents can make a maximum of two bookings within the same week, but only one of these
					sessions will be allowed for the peak hours between 6.00 pm and 10.00 pm.</p>
					<p>8. All bookings are not transferable.</p>
					<p>9. Residents must be punctual for any game. Bookings shall be treated as cancelled if not claimed
					within ten minutes of the time booked and thereafter the court will be allocated to another
					resident on a first-come-first-served basis.</p>
					<p>10. Residents are to vacate and keep clear of the court during showers, rain or thunderstorm.</p>
					<p>11. Residents shall be responsible for any damages caused by their guests or themselves. Any
					existing damages shall be reported to the management office or guardhouse immediately prior
					to the commencement of the game.</p>
					<p>12. The court shall be solely for its respective purpose. No bicycle, roller blade and the like shall be
					permitted in the court.</p>
					<p>13. No pets are allowed in the court.</p>
					<p>14. The Management shall not be responsible for any mishaps, injuries or loss of life or property
					sustained by the residents or their guests when using the court and its facilities.</p>
					<p>15. These rules and regulations are subject to revision at the discretion of the Management as and
					when necessary.</p>
				</strong></p>
		        <div class="col-md-7">
			        <button type="button"  class="btn btn-primary pull-right" style="text-align: center;" id="no" data-dismiss="modal">Close</button>
			    	</div>
			    	<div class="col-md-12">&nbsp;</div>
			    	<div style="clear:both"></div>
		      </div>
		    </div>
		  </div>
		</div>
   
 	<!-- pop up view Tennis Court 2	 -->

	<div class="modal fade" id="tennis_court_2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-body">
		        <p style="text-align: center;">
		        	<center><h4>Tennis Court 2	</h4></center>
		        	<strong>
				<p>1. Opening hours are 8.00 am to 10.00 pm daily.</p>
<p>2. The security officers are authorized to stop any games that extend beyond 10.00 pm and switch
off all lightings to the courts.</p>
<p>3. The maximum number of guests per apartment unit who may use the tennis court shall not exceed
four (4) persons at any one time.</p>
<p>4. All players must be properly attired for the games.</p>
<p>5. Advance booking can be made on a first-come-first-served basis up to a maximum of 7 days.</p>
<p>6. Each apartment unit may book a maximum of two (2) hours per session in any one day.</p>
<p>7. Residents can make a maximum of two bookings within the same week, but only one of these
sessions will be allowed for the peak hours between 6.00 pm and 10.00 pm.</p>
<p>8. All bookings are not transferable.</p>
<p>9. Residents must be punctual for any game. Bookings shall be treated as cancelled if not claimed
within ten minutes of the time booked and thereafter the court will be allocated to another
resident on a first-come-first-served basis.</p>
<p>10. Residents are to vacate and keep clear of the court during showers, rain or thunderstorm.</p>
<p>11. Residents shall be responsible for any damages caused by their guests or themselves. Any
existing damages shall be reported to the management office or guardhouse immediately prior
to the commencement of the game.</p>
<p>12. The court shall be solely for its respective purpose. No bicycle, roller blade and the like shall be
permitted in the court.</p>
<p>13. No pets are allowed in the court.</p>
<p>14. The Management shall not be responsible for any mishaps, injuries or loss of life or property
sustained by the residents or their guests when using the court and its facilities.</p>
<p>15. These rules and regulations are subject to revision at the discretion of the Management as and
when necessary.</p>
				</strong>
				</p>
		       <div class="col-md-7">
			        <button type="button"  class="btn btn-primary pull-right" style="text-align: center;" id="no" data-dismiss="modal">Close</button>
			    	</div>
			    	<div class="col-md-12">&nbsp;</div>
			    	<div style="clear:both"></div>
		      </div>
		    </div>
		  </div>
		</div>
    <!-- pop up view Multi Purpose Function Room -->

	<div class="modal fade" id="multi-purpose-function-room" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-body">
		        <p style="text-align: center;">
		        	<center><h4>Multi Purpose Function Room</h4></center>
		        	<strong>
		        	<p>1. The opening hours are divided into 2 sessions daily:
Day session - 9.00 am to 3.00 pm
Evening session - 4.00 pm to 10.00 pm</p><p>
2. The maximum number of persons who may use the Multi-Purpose Function Room shall not exceed
50 persons during each session.</p>
<p>3. Subject to demand, each apartment unit may only reserve the Multi-Purpose Function Room for
one session per month.</p>
<p>4. When booking the Multi-Purpose Function Room, residents shall deposit a sum of $150.00 with
the Management. Crossed cheque is preferred. The deposit shall be refunded, free of interest,
after the event if the Multi-Purpose Function Room and its surrounding area used are handed over
in a clean and satisfactory condition as determined by the Management and without damage to
any part of it including proper disposal of all rubbish. Should the Management incur any costs
for repair or additional charges, such costs will be deducted from the deposit and the balance
refunded free of interest. However, if such costs and additional charges exceed the amount
deposited, the resident will have to pay the difference. When claiming the refund, the receipt
issued at the time of booking must be returned to the Management (see Form D).</p>
<p>5. Bookings for the Multi-Purpose Function Room shall be made in person on a first-come-first served
basis up to one (1) month in advance upon payment of the deposit. Bookings are subject to the
Management’s approval on the purpose of use.</p>
<p>should be made personally to the Management. Failure to cancel the booking in time would
result in forfeiture of the deposit.</p>
<p>6. Cancellation of bookings must be made at least seven (7) days before the date booked and
should be made personally to the Management. Failure to cancel the booking in time would
result in forfeiture of the deposit.</p>
<p>7. Bookings are not transferable.</p>
<p>8. The Multi-Purpose Function Room can only be used for birthday parties or any other social
functions approved by the Management. It cannot be used for gambling, religious, political,
commercial, illegal or immoral activities. Private classes, sales talks or company gatherings are
not permitted in the Multi-Purpose Function Room.</p>
<p>9. The Management reserves the right to use the Multi-Purpose Function for official matters.</p>
<p>10. Live bands or mobile discos are not permitted.</p>
<p>11. No rowdy behaviour is allowed and noise level should be kept to a minimum.</p>
<p>12. No smoking, skating, skateboarding, cycling or any ball games are permitted.</p>
<p>13. No pets and persons in swimming attire are permitted at the Multi-Purpose Function Room.</p>
<p>14. Residents shall be responsible for the good conduct of their guests during the period of use.</p>
<p>15. The area must be kept in a clean and tidy condition during and after use.</p>
<p>16. Permission must be obtained from the Management prior to hiring of additional tables and
chairs to be used.</p>
<p></p>17. These rules and regulations are subject to revision at the discretion of the Management as and
when necessary.
		        </strong></p>
		        <div class="col-md-7">
			        <button type="button"  class="btn btn-primary pull-right" style="text-align: center;" id="no" data-dismiss="modal">Close</button>
			    	</div>
			    	<div class="col-md-12">&nbsp;</div>
			    	<div style="clear:both"></div>
		      </div>
		    </div>
		  </div>
		</div>
    
	<!-- pop up view Audio Visual Room -->

	<div class="modal fade" id="audio_visual_room" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-body">
		        <p style="text-align: center;">
		        	<center><h4>Audio Visual Room</h4></center>
		        	<strong>
		        	<p>1. Opening hours are from 8.00 am to 10.00 pm daily.</p>
<p>2. The security guards are authorized to stop any use of the Audio-Visual Room that extends beyond
10pm.</p>
<p>3. No more than 9 persons may be in the Audio -Visual Room at any time.</p>
<p>4. Advance booking can be made on a first-come-first served basis up to a maximum of 7 days.</p>
<p>5. Each apartment unit may book a maximum of two (2) hours per session in any one day.</p>
<p>6. Residents can make a maximum of two booking within the same week, but only one of these
sessions may be made between the peak hours of 6.00 pm to 10.00 pm.</p>
<p>7. Residents must be punctual for their bookings. Bookings shall be treated as cancelled if not
claimed within 15 minutes and the Audio Visual Room will be allocated to another resident on
a first-come-first-serve basis.</p>
<p>8. Reservations are not transferable. If the person who has made reservation is unable to use
the facilities on the date reserved, he or she is to inform the Management Office 48 hours in
advance. Residents who fail to cancel booking will be barred from booking the room for the next
1 calendar month.</p>
<p>9. Residents must sign in for the use of the Audio-Visual Room</p>
<p>10. When booking the Audio-Visual Room, resident shall place a refundable deposit of $100 with
the Management. Crossed cheque is preferred. The deposit shall be refunded free of interest
only if the equipment is returned in good order and the Audio-Visual Room in a good and clean
condition without damage to any part of it and all rubbish properly disposed of. Should the
Management incur any costs for repair, cleaning or disposal, such costs will be recovered from
the residents accordingly. When claiming the refund, the receipt issued at the time of booking
must be returned to the Management.</p>
<p>11. Children under 12 years old must be accompanied & supervised by an adult who shall be
responsible for their behaviour and safety while engaging in the activity.</p>
<p>12. Smoking, pets, food and drinks are not allowed in the Audio Visual Room.</p>
<p>13. The Management shall not be responsible for any injury caused to the persons using the Audio
Visual Room.</p>
<p>14. Residents concerned will be responsible for any loss or damages caused to the equipment and
furniture, by their guests or themselves. Replacement costs are chargeable to the resident who
booked the Audio-Visual Room.</p>
<p>15. The Audio-Visual Room shall be used solely for its intended purpose.</p>
<p>16. Illegal or immoral activities are strictly prohibited in the Audio-Visual Room.</p>
<p>17. These rules and regulations are subject to revision by the Management as and when it is deem
necessary.</p>
			</strong></p>
		         <div class="col-md-7">
			        <button type="button"  class="btn btn-primary pull-right" style="text-align: center;" id="no" data-dismiss="modal">Close</button>
			    	</div>
			    	<div class="col-md-12">&nbsp;</div>
			    	<div style="clear:both"></div>
		      </div>
		    </div>
		  </div>
		</div>
   
 <!-- pop up view BBQ Pit 1	 -->
		
	<div class="modal fade" id="bbq_pit_1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-body">
		        <p style="text-align: center;">
		        	<center><h4>BBQ Pit 1</h4></center>
		        	<strong>
				<p>1. Opening hours are divided into 2 sessions daily:
Day session - 9.00 am to 3.00 pm
Evening session - 4.00 pm to 10.00 pm</p>
<p>2. The maximum number of guests per apartment unit who may use the BBQ pit shall not exceed
15 persons during each session and residents shall ensure that their guests observe the house
rules contained herein.</p>
<p>3. Bookings for the BBQ pits shall be made in person on a first-come-first-served basis up to one (1)
month in advance upon payment of the deposit.</p>
<p>4. Subject to residents’ demand, the Management reserves the right to allow only one booking per
apartment unit within every two weeks.</p>
<p>5. When booking the BBQ pit, resident shall deposit a sum of $100.00 per pit with the Management.
Crossed cheque is preferred. The deposit shall be refunded, free of interest, after the event if the
BBQ pit and its surrounding area used are handed over in a clean and satisfactory condition as
determined by the Management and without damage to any part of it including proper disposal
of all rubbish. Should the Management incur any costs for repair or additional charges, such
costs will be deducted from the deposit and the balance refunded free of interest. However, if
such costs and additional charges exceed the amount deposited, the resident will have to pay
the difference. When claiming the refund, the receipt issued at the time of booking must be
returned to the Management (see Form E).</p>
<p>6. In addition to the refundable deposit stated above, residents shall also pay a non-refundable
charge of $15.00 per pit for the use of cylinder gas supplied by the Management when
booking the BBQ pit. The charge for use of cylinder gas is subject to revision without prior
notification to residents.</p>
<p>7. Cancellation of bookings must be made at least seven (7) days before the date booked and
should be made personally to the Management. Failure to cancel the booking in time would
result in forfeiture of the deposit.</p>
<p>8. Bookings are not transferable.</p>
<p>9. Light refuse such as litter, food waste and disposable cups/plates/cutleries, etc. must be contained
in plastic bags properly tied and disposed off in the refuse containers provided. Bulky refuse like
crates, boxes of materials and articles, etc. must be disposed of at the user’s own arrangement.
Any loose furniture and utensils brought by the user must be removed from the site after use.
Should the Management incur any cost in cleaning or repairing damages caused by misuse, the
resident will be charged accordingly.</p>
<p>10. Washing of utensils shall only be done in the resident’s apartment. Taps and wash basins in the
changing rooms are not to be used for this purpose.</p>
<p>11. Residents using the BBQ pit must restrict their activities to the area. Consumption of food and
drinks by the pool is not allowed. Residents and their guests are not permitted to use the pool
facilities at the same time.</p>
<p>12. Simple decorations (such as hanging of balloons, banners, ribbons, etc.) are allowed but due
care must be exercised to prevent damage the furniture and fittings. All decorations must be
removed immediately after the session.</p>
<p>13. The Management shall not be responsible for any mishaps, injuries or loss of life or property
sustained by the residents or their guests when using the BBQ Pavilion and its facilities.</p>
<p>14. No rowdy behaviour is allowed and noise level should be kept to a minimum.</p>
<p>15. Live bands or mobile discos are not permitted.</p>
<p>16. Permission must be obtained from the Management prior to hiring of additional tables and
chairs to be used at the BBQ Corners.</p>
<p>17. These rules and regulations are subject to revision at the discretion of the Management as and
when necessary.</p>
				</strong>
				</p>
		         <div class="col-md-7">
			        <button type="button"  class="btn btn-primary pull-right" style="text-align: center;" id="no" data-dismiss="modal">Close</button>
			    	</div>
			    	<div class="col-md-12">&nbsp;</div>
			    	<div style="clear:both"></div>
		      </div>
		    </div>
		  </div>
		</div>
    
 <!-- pop up view BBQ Pit 2	 -->
		
	<div class="modal fade" id="bbq_pit_2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-body">
		        <p style="text-align: center;">
		        	<center><h4>BBQ Pit 2</h4></center>
		        	<strong>
				<p>1. Opening hours are divided into 2 sessions daily:
Day session - 9.00 am to 3.00 pm
Evening session - 4.00 pm to 10.00 pm</p>
<p>2. The maximum number of guests per apartment unit who may use the BBQ pit shall not exceed
15 persons during each session and residents shall ensure that their guests observe the house
rules contained herein.</p>
<p>3. Bookings for the BBQ pits shall be made in person on a first-come-first-served basis up to one (1)
month in advance upon payment of the deposit.</p>
<p>4. Subject to residents’ demand, the Management reserves the right to allow only one booking per
apartment unit within every two weeks.</p>
<p>5. When booking the BBQ pit, resident shall deposit a sum of $100.00 per pit with the Management.
Crossed cheque is preferred. The deposit shall be refunded, free of interest, after the event if the
BBQ pit and its surrounding area used are handed over in a clean and satisfactory condition as
determined by the Management and without damage to any part of it including proper disposal
of all rubbish. Should the Management incur any costs for repair or additional charges, such
costs will be deducted from the deposit and the balance refunded free of interest. However, if
such costs and additional charges exceed the amount deposited, the resident will have to pay
the difference. When claiming the refund, the receipt issued at the time of booking must be
returned to the Management (see Form E).</p>
<p>6. In addition to the refundable deposit stated above, residents shall also pay a non-refundable
charge of $15.00 per pit for the use of cylinder gas supplied by the Management when
booking the BBQ pit. The charge for use of cylinder gas is subject to revision without prior
notification to residents.</p>
<p>7. Cancellation of bookings must be made at least seven (7) days before the date booked and
should be made personally to the Management. Failure to cancel the booking in time would
result in forfeiture of the deposit.</p>
<p>8. Bookings are not transferable.</p>
<p>9. Light refuse such as litter, food waste and disposable cups/plates/cutleries, etc. must be contained
in plastic bags properly tied and disposed off in the refuse containers provided. Bulky refuse like
crates, boxes of materials and articles, etc. must be disposed of at the user’s own arrangement.
Any loose furniture and utensils brought by the user must be removed from the site after use.
Should the Management incur any cost in cleaning or repairing damages caused by misuse, the
resident will be charged accordingly.</p>
<p>10. Washing of utensils shall only be done in the resident’s apartment. Taps and wash basins in the
changing rooms are not to be used for this purpose.</p>
<p>11. Residents using the BBQ pit must restrict their activities to the area. Consumption of food and
drinks by the pool is not allowed. Residents and their guests are not permitted to use the pool
facilities at the same time.</p>
<p>12. Simple decorations (such as hanging of balloons, banners, ribbons, etc.) are allowed but due
care must be exercised to prevent damage the furniture and fittings. All decorations must be
removed immediately after the session.</p>
<p>13. The Management shall not be responsible for any mishaps, injuries or loss of life or property
sustained by the residents or their guests when using the BBQ Pavilion and its facilities.</p>
<p>14. No rowdy behaviour is allowed and noise level should be kept to a minimum.</p>
<p>15. Live bands or mobile discos are not permitted.</p>
<p>16. Permission must be obtained from the Management prior to hiring of additional tables and
chairs to be used at the BBQ Corners.</p>
<p>17. These rules and regulations are subject to revision at the discretion of the Management as and
when necessary.</p>
				</strong></p>
		       
		       <div class="col-md-7">
			        <button type="button"  class="btn btn-primary pull-right" style="text-align: center;" id="no" data-dismiss="modal">Close</button>
			    	</div>
			    	<div class="col-md-12">&nbsp;</div>
			    	<div style="clear:both"></div>
		      </div>
		    </div>
		  </div>
		</div>
    
	<!-- pop up view BBQ Pit 3	 -->
		
	<div class="modal fade" id="bbq_pit_3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-body">
		        <p style="text-align: center;">
		        	<center><h4>BBQ Pit 3</h4></center>
		        	<strong>
				<p>1. Opening hours are divided into 2 sessions daily:
Day session - 9.00 am to 3.00 pm
Evening session - 4.00 pm to 10.00 pm</p>
<p>2. The maximum number of guests per apartment unit who may use the BBQ pit shall not exceed
15 persons during each session and residents shall ensure that their guests observe the house
rules contained herein.</p>
<p>3. Bookings for the BBQ pits shall be made in person on a first-come-first-served basis up to one (1)
month in advance upon payment of the deposit.</p>
<p>4. Subject to residents’ demand, the Management reserves the right to allow only one booking per
apartment unit within every two weeks.</p>
<p>5. When booking the BBQ pit, resident shall deposit a sum of $100.00 per pit with the Management.
Crossed cheque is preferred. The deposit shall be refunded, free of interest, after the event if the
BBQ pit and its surrounding area used are handed over in a clean and satisfactory condition as
determined by the Management and without damage to any part of it including proper disposal
of all rubbish. Should the Management incur any costs for repair or additional charges, such
costs will be deducted from the deposit and the balance refunded free of interest. However, if
such costs and additional charges exceed the amount deposited, the resident will have to pay
the difference. When claiming the refund, the receipt issued at the time of booking must be
returned to the Management (see Form E).</p>
<p>6. In addition to the refundable deposit stated above, residents shall also pay a non-refundable
charge of $15.00 per pit for the use of cylinder gas supplied by the Management when
booking the BBQ pit. The charge for use of cylinder gas is subject to revision without prior
notification to residents.</p>
<p>7. Cancellation of bookings must be made at least seven (7) days before the date booked and
should be made personally to the Management. Failure to cancel the booking in time would
result in forfeiture of the deposit.</p>
<p>8. Bookings are not transferable.</p>
<p>9. Light refuse such as litter, food waste and disposable cups/plates/cutleries, etc. must be contained
in plastic bags properly tied and disposed off in the refuse containers provided. Bulky refuse like
crates, boxes of materials and articles, etc. must be disposed of at the user’s own arrangement.
Any loose furniture and utensils brought by the user must be removed from the site after use.
Should the Management incur any cost in cleaning or repairing damages caused by misuse, the
resident will be charged accordingly.</p>
<p>10. Washing of utensils shall only be done in the resident’s apartment. Taps and wash basins in the
changing rooms are not to be used for this purpose.</p>
<p>11. Residents using the BBQ pit must restrict their activities to the area. Consumption of food and
drinks by the pool is not allowed. Residents and their guests are not permitted to use the pool
facilities at the same time.</p>
<p>12. Simple decorations (such as hanging of balloons, banners, ribbons, etc.) are allowed but due
care must be exercised to prevent damage the furniture and fittings. All decorations must be
removed immediately after the session.</p>
<p>13. The Management shall not be responsible for any mishaps, injuries or loss of life or property
sustained by the residents or their guests when using the BBQ Pavilion and its facilities.</p>
<p>14. No rowdy behaviour is allowed and noise level should be kept to a minimum.</p>
<p>15. Live bands or mobile discos are not permitted.</p>
<p>16. Permission must be obtained from the Management prior to hiring of additional tables and
chairs to be used at the BBQ Corners.</p>
<p>17. These rules and regulations are subject to revision at the discretion of the Management as and
when necessary.</p>
				</strong>
				
				</p>
		        <div class="col-md-7">
			        <button type="button"  class="btn btn-primary pull-right" style="text-align: center;" id="no" data-dismiss="modal">Close</button>
			    	</div>
			    	<div class="col-md-12">&nbsp;</div>
			    	<div style="clear:both"></div>
		      </div>
		    </div>
		  </div>
		</div>
    </div>
		  
		  
		  
		</div>
		
		<script src="js/jquery.js"></script>
		<!-- Bootstrap javascript -->
		<script src="js/bootstrap.min.js"></script>
		<script src="js/bootstrap-datetimepicker.js"></script>
		<script src="js/selectordie.min.js"></script>
		
		<script type="text/javascript">
			var defaulttext = $('.defualt-text').text();

			$('.selectDefault').text(defaulttext);

			$('.selectBox').on('change',function(){
			   var defaulttext2 = $('.selectBox').find(":selected").text(); 
				$('.selectDefault').text(defaulttext2);
			});
		</script>	
		<script type="text/javascript">

			$('.form_date').datetimepicker({
				weekStart: 1,
				autoclose: 0,
				todayHighlight: 1,
				startView: 2,
				minView: 2,
				forceParse: 0
				});			
		</script>
		<script type="text/javascript">
			// Mandatory for dropdown styling
			$('select').selectOrDie();
		</script>	
		<script type="text/javascript">
		function reply_click(clicked_id)
		{
		    document.getElementById('selected_timing').value=clicked_id;
		    $("#timing").text(clicked_id);
		}
		</script>
		<script type="text/javascript">
	<?php $type =  $this->uri->segment(3);?>
		 var orgid = "<?php echo $type?>";
		if(orgid == "tennis_court_1"){
			data_target = "tennis_court_1";
		}
		if(orgid == "tennis_court_2"){
			data_target = "tennis_court_2";
			
		}
		if(orgid == "bbq_pit_1"){
			data_target = "bbq_pit_1";
			
		}
		if(orgid == "bbq_pit_2"){
			data_target = "bbq_pit_2";
			
		}
		if(orgid == "bbq_pit_3"){
			data_target = "bbq_pit_3";
			
		}
		if(orgid == "multi-purpose-function-room"){
			data_target = "multi-purpose-function-room";
			
		}
		if(orgid == "audio_visual_room"){
			data_target = "audio_visual_room";
			
		}
		data_target = "#"+data_target;
		$('#terms_conditon').attr('data-target',data_target);
 	
	
</script>		