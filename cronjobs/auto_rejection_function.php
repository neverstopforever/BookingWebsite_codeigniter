#!/usr/bin/php -q
<?php 
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);
header('Content-type: text/html');
header("Cache-Control: no-cache, must-revalidate");
error_reporting(E_ALL);
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
//echo date("Y-m-d H:i:s");
date_default_timezone_set('Asia/Singapore');
//echo date("Y-m-d H:i:s");
//exit;

$servername = "localhost";
$username = "nvbbud";
$password = "xAjYqxoX9iiAu8";
$dbname = "nvbbud_condobuddy";

// $servername = "localhost";
// $username = "mangocoders";
// $password = "53cr3t";
// $dbname = "nvbbud_condobuddy";
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//$date = date("Y-m-d H:i:s",strtotime("-15 MINUTES"));
	
	$date = date_create(date("Y-m-d 00:00:00",strtotime("+1 days")));
	$current_date = date("Y-m-d H:i:s");
	
	$stmt = $conn->prepare("SELECT booking_id,booking_end_date FROM condo_user_bookings where status = 'Pending'");// and booking_end_date LIKE '$today_date%'"); 
	$stmt->execute();
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$tbl_send_notification_data = $stmt->fetchAll();

	foreach ($tbl_send_notification_data as $key => $value) {
				
			$booking_end_date = $value['booking_end_date'];
			$booking_end_date1 = date_create($booking_end_date);
			$diff = date_diff($date,$booking_end_date1);
			$diff= $diff->format("%a");
			$booking_id =  $value['booking_id'];

			if($diff <= 4){
				$sql = "UPDATE condo_user_bookings SET  status='Cancelled' , auto_rejection = '1' WHERE booking_id='".$booking_id."'";
				$update = $conn->prepare($sql);
				$update->execute();		
				$sql = "INSERT INTO condo_cronjob (booking_id,booking_end_date,date_created) VALUES ('$booking_id','$booking_end_date','$current_date')";
				$insert = $conn->prepare($sql);
				$insert->execute();		
			
			}
	}	
$conn = null;	
echo "done";
exit;
?>