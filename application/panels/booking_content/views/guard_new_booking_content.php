
    <div class="content twocols">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="container-fluid guestlist">
            <p class="left"><b></b></p>
            <div class="clear"></div>
          </div>
          <div id="calendar">
			<div class="input-group select-div facility-select-box">
				<label for="facility-select">Facility</label>
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
        </div>
      </div>
    </div>
   
    
   
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
    <!-- <script>
    	var date = new Date();
				var d = date.getDate();
				var m = date.getMonth();
				var y = date.getFullYear();
				var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
				Date.prototype.getWeek = function() {
				  var date = new Date(this.getTime());
				   date.setHours(0, 0, 0, 0);
				  // Thursday in current week decides the year.
				  date.setDate(date.getDate() + 3 - (date.getDay() + 6) % 7);
				  // January 4 is always in week 1.
				  var week1 = new Date(date.getFullYear(), 0, 4);
				  // Adjust to Thursday in week 1 and count number of weeks from date to week1.
				  return 1 + Math.round(((date.getTime() - week1.getTime()) / 86400000
										- 3 + (week1.getDay() + 6) % 7) / 7);
				}
    	var availability = {};
				var i = 0;	

				var residentBooked = [];
				
				
					var  f = 1;
					for(var i=0; i <=28; i++) {
						var day = new Date(y+'-'+(m+1)+'-'+(d+i));

						if(day == 'Invalid Date' || day.getMonth() > m) {
							break;
						}
						
						if(day.getDate() <= 3) {
							f = day.getDate() + 1;
						}
						
						availability[y+'-'+(m+1)+'-'+(d+i)] = 0;						
					}

					for(var j=i; i <=28; i++) {
						availability[y+'-'+(m+2)+'-'+(f++)] = 0;
					}
    	var events = [];
				var i = 0;
				$.each(availability, function(da, count) {
					das = da.split('-');
					
					if(!residentBooked[das[1]]) {
					
						var limit;
						if('BBQ Pit 1' == 'Function Room' || 'BBQ Pit 1'.startsWith("BBQ")) {
							limit = 2;
						} else if('BBQ Pit 1' == 'Tennis Court' || 'BBQ Pit 1' == 'Basketball Court') {
							limit = 15;
						} 
						if(count == limit) {
							title = 'Not Available';
							className = '';
						} else {
							title = 'Available: ' + (limit-count)
							className = 'fc-event-available ' + da
						}
						events[i++] = {title: title, start: new Date(das[0], das[1]-1, das[2]), className: className};
					}
				});	
				
				$('#calendar').fullCalendar({
					firstDay: 1,
					header: {
						left: 'prev, title, next',
						center: '',
						right: ''
					},
					contentHeight: 600,
					events: events,
					viewRender: function(view, element) {
				
						// Rewrite calendar day header
						$('th.fc-day-header').each(function() {
				  
							if ( $(this).hasClass('fc-mon') ) {
								$(this).text('Monday');
							}
							
							else if ( $(this).hasClass('fc-tue') ) {
								$(this).text('Tuesday');
							}
							
							else if ( $(this).hasClass('fc-wed') ) {
								$(this).text('Wednesday');
							}
							
							else if ( $(this).hasClass('fc-thu') ) {
								$(this).text('Thursday');
							}
							
							else if ( $(this).hasClass('fc-fri') ) {
								$(this).text('Friday');
							}
							
							else if ( $(this).hasClass('fc-sat') ) {
								$(this).text('Saturday');
							}
							
							else {
								$(this).text('Sunday');
							}
							
						});
						
						// Bind availableClick function after each calendar view rendered
						setTimeout( availableClick, 250 );

					},
					eventRender: function(event, element, view)
					{
					   if(event.start.getMonth() !== view.start.getMonth()) { return false; }
					},
					dayRender: function (date, cell) {
						$.each(events, function(i, event){
							if(date.getTime() === event.start.getTime()) {
								cell.addClass("available-slot");
							}
						});
					}
				});
				
				// Script to run when 'Available' content clicked
				function availableClick() {
					$('.fc-event-available .fc-event-inner').each(function() {
						$(this).click(function() {
							alert("dd");
							// Write script here							
							// var arr = $(this).parent().attr('class').split(" ");
							// var date = arr[arr.length - 1];						
							// var darr = date.split('-');
							// date = darr[2]+'-'+months[darr[1]-1]+'-'+darr[0]
							// $.ajax({
								// type: "GET",
								// url: '/booking/getBookedTime/',
								// data: {date: date, facility: $('#facility').val()},
								// success: function(response){			
// 									
									// $.each(response.entity.results, function(i, obj){
										// $('#'+obj.hoursFrom+''+obj.hoursTo+'t').hide();
									// });
								// }	
							// });								
							// $('#date').html(date);
							// $('#inputDateofVisit').val(date);
							// $('.content').hide();
							// $('.page11').show();		
							// changeFooterPosition();							
							// //window.location = 'http://www.condobuddy.com.sg/resident_booking_form.html';
						});
					});
				}
	  
		
    </script> -->
    
    
     <script>
		$(document).ready(function() {
		
			$.getScript('http://arshaw.com/js/fullcalendar-1.6.4/fullcalendar/fullcalendar.min.js', function() {

			var date = new Date();
			var d = date.getDate();
			var m = date.getMonth();
			var y = date.getFullYear();
      
				$('#calendar').fullCalendar({
					firstDay: 1,
					header: {
						left: 'prev, title, next',
						center: '',
						right: ''
					},
					contentHeight: 600,
					editable: true,
					events: [
						<?php for($i=$start_date-1;$i<=$advance_booking;$i++){
					  	?>
					  	{
					  	id: 293,	
					  	<?php if($booking_availability['availability'][$i]<=0){
					  	}else{?>
					  	title: 'Available: ' + '<?php echo $booking_availability['availability'][$i];?>',			// Content 'Available'
						start: new Date(y, m, <?php echo $i;?>),
						className: 'fc-event-available '+'<?php echo $booking_availability['date_for_availability'][$i];?>'
						<?php }?>
						 },
					  <?php
					  }?>
					],
					viewRender: function() {
				
						// Rewrite calendar day header
						$('th.fc-day-header').each(function() {
				  
							if ( $(this).hasClass('fc-mon') ) {
								$(this).text('Monday');
							}
							
							else if ( $(this).hasClass('fc-tue') ) {
								$(this).text('Tuesday');
							}
							
							else if ( $(this).hasClass('fc-wed') ) {
								$(this).text('Wednesday');
							}
							
							else if ( $(this).hasClass('fc-thu') ) {
								$(this).text('Thursday');
							}
							
							else if ( $(this).hasClass('fc-fri') ) {
								$(this).text('Friday');
							}
							
							else if ( $(this).hasClass('fc-sat') ) {
								$(this).text('Saturday');
							}
							
							else {
								$(this).text('Sunday');
							}
							
						});
						
						// Bind availableClick function after each calendar view rendered
						setTimeout( availableClick, 250 );

					 }//,
					// dayClick: function(date, jsEvent, view) { 
            			// var path = "<?php //echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"?>";
        				// var month = date.getMonth()+1; 
        				// window.location = path +"/"+date.getFullYear()+"-"+month+"-"+date.getDate();
//         			
        			// }

				});
				
				// Script to run when 'Available' content clicked
				function availableClick() {

					 $('.fc-event-available .fc-event-inner').each(function() {
					 $(this).click(function(date, jsEvent, view) {
					   var arr = $(this).parent().attr('class').split(" ");
					   var date = arr[arr.length - 3];						
					   var path = "<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"?>";
        			   window.location = path +"/"+date;
					});
					});
				}
	  
			});
	
			
	  
		});
    </script> 
	<script type="text/javascript">
			// Mandatory for dropdown styling
			$('select').selectOrDie();
		</script>	
