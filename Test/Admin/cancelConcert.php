<?php include 'AdmSession.php';

if( isset($_GET['del_id']))
{

	$currentDateTime = date('Y-m-d\Th:i');
	
	$concert_id = $_GET['del_id'];
	$concert_query = "SELECT * FROM concert JOIN band ON concert.band_id = band.band_id JOIN venue ON 
		concert.venue_id = venue.venue_id WHERE concert_id =".$_GET['del_id'];
	$concert_results = $db->query($concert_query) or $db->error;
	while($row = $concert_results->fetch_assoc())
	{ 
			echo '<strong>Concert Date: </strong>'.$row['concert_date'].'<br />';
			echo '<strong>Band Name: </strong>'.$row['band_name'].'<br />';
			echo '<strong>Venue Name: </strong>'.$row['venue_name'].'<br />'; 
			$cancel_message = "<br />We regret to inform you that the ".$row['concert_date']." concert featuring ".$row['band_name']." at ".$row['venue_name']." has been cancelled.";
			echo $cancel_message;
			$message_query = "UPDATE attendee SET message = CONCAT(message , '".$cancel_message."')
			WHERE mob_phone IN (SELECT mob_phone FROM booking WHERE concert_id = ".$concert_id.")";
			$message_results = $db->query($message_query);
			$delete_query = "DELETE FROM concert WHERE concert_id = ".$_GET['del_id'];
			$del_results = $db->query($delete_query);	
			header('Location: AdminPage.php');
	}

	
		//header('Location: AdminPage.php');

}
?>
	