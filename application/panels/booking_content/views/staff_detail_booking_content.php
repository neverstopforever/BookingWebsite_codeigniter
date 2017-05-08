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

		<div class="content-edit">
			<div class="row">
				<div class="container-fluid">
					<div class="back-guest-list">
						<a href="<?php echo $this->config->base_url();?>booking/view"><img src="<?php echo $this->config->base_url();?>r/img/icon-back-to-GL.png">Back to View Booking</a>
					</div>
					<form class="form-horizontal" method="post" action="<?php echo $this->config->base_url();?>booking_content/admin_edit_update_booking_content">
					<div class="row">
						<div class="col-md-6">
							<label for="inputSubmitedAt" class="col-sm-4 control-label" >SUBMITTED AT:</label>
							<div class="col-sm-6">
								
								<input type="text" class="form-control" id="inputSubmitedAt" name = "inputSubmitedAt" placeholder="" value="<?php echo $detail_booking[0]->booking_date;?>" readonly>
								<input type="hidden" class="form-control" id="bookingId" name = "bookingId" placeholder="" value="<?php echo $detail_booking[0]->booking_id?>" readonly>
							</div>
							<label for="inputFacilityBooked" class="col-sm-4 control-label">FACILITY BOOKED:</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="inputFacilityBooked" name="inputFacilityBooked" placeholder="" value="<?php echo $detail_booking[0]->booking_facility_title;?>" readonly>
							</div>
							<label for="inputBookingDate" class="col-sm-4 control-label">BOOKING DATE:</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="inputBookingDate" name="inputBookingDate" placeholder="" value="<?php echo $detail_booking[0]->booking_end_date;?>" readonly>
							</div>
							<label for="inputBookingTime" class="col-sm-4 control-label">BOOKING TIME:</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="inputBookingTime" name="inputBookingTime" value="<?php echo $detail_booking[0]->booking_hours;?>" readonly>
							</div>
							<label for="inputFacilityStatus" class="col-sm-4 control-label">BOOKING STATUS:</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="inputFacilityStatus" name="inputFacilityStatus" value="<?php echo $detail_booking[0]->status;?>" readonly>
							</div>
						</div>
						<div class="col-md-6">
							<label for="inputResidentName" class="col-sm-4 control-label">Username:</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="inputResidentName" name="inputResidentName" placeholder="" value="<?php echo $detail_booking[0]->user_name;?>" readonly>
							</div>
							<label for="inputResidentEmail" class="col-sm-4 control-label">RESIDENT EMAIL:</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="inputResidentEmail" name="inputResidentEmail" placeholder="" value="<?php echo $detail_booking[0]->desident_email;?>" readonly>
							</div>
							<label for="inputResidentContact" class="col-sm-4 control-label">RESIDENT CONTACT NO.:</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="inputResidentContact" name="inputResidentContact" placeholder="" value="<?php echo $detail_booking[0]->desident_contact_no;?>" readonly>
							</div>
							<label for="inputResidentBlock" class="col-sm-4 control-label">RESIDENT BLOCK:</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="inputResidentBlock" name="inputResidentBlock" placeholder="" value="<?php echo $detail_booking[0]->desident_block;?>" readonly>
							</div>
							<label for="inputResidentUnitNo" class="col-sm-4 control-label">RESIDENT UNIT NO.:</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="inputResidentUnitNo" name="inputResidentUnitNo" placeholder="" value="<?php echo $detail_booking[0]->desident_unit;?>" readonly>
							</div>
						</div>
					</div>
					<!-- <div class="row">
						<div class="col-md-12">
						<div class="col-sm-2">
							</br><span class="compulsory">* Compulsory <br> <text style="margin-left:10px;">fields</text></span>
						</div>
						<div class="col-sm-2">
							<a class="btn btn-default" href="<?php echo $this->config->base_url();?>booking_content/admin_update_booking_content/Conformed/<?php echo $detail_booking[0]->booking_id?>">Approved </a>             
						</div>
						
						<div class="col-sm-2 col-sm-offset-2">
							<button type="submit" class="btn btn-default pull-right">SAVE</button>
						</div>
						</div>
					</div> -->
					</form>
				</div>
			</div>
		</div>
		