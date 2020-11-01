<?php include 'AttSession.php';
 
	if (isset($_GET['concert_id']))
	{
	$concert_id = $_GET['concert_id'];
	$id = $_SESSION['user'];
	
	$over_18_query = "SELECT * FROM attendee WHERE mob_phone = '".$id."' 
	AND (DATE_ADD(date_of_birth, INTERVAL 18 year) <= (SELECT concert_date FROM concert 
	WHERE concert_id = '".$concert_id."') or (SELECT over_18 FROM concert WHERE concert_id = '".$concert_id."') = '0')";
	$over_18_result = $db->query($over_18_query);
	$count_over_18 = mysqli_num_rows($over_18_result);

	$count = '';
	$error_message = '';
	$book_query = "SELECT concert_id, mob_phone FROM booking WHERE concert_id = '".$concert_id."' AND mob_phone = '".$id."'";
	$book_results = $db->query($book_query);
	$count_book = mysqli_num_rows($book_results);
	
	$count_query = "SELECT mob_phone FROM booking WHERE mob_phone = '".$id."'";
	$count_result = $db->query($count_query);
	$count_rows = "";
	$count_rows = mysqli_num_rows($count_result);

    $dob_query = "SELECT mob_phone, date_of_birth FROM attendee WHERE mob_phone = '".$id."' ";
	$dob_result = $db->query($dob_query);

	

 if($count_over_18 <= 0 )
	{
	echo $db->error;
	$error_message = 'You under 18';
	}

  if (empty($concert_id)  || empty($id) )
      {
        $error_message = 'One of the required values was blank';
      }
  else if( ($count_book > 0 AND $count_rows > 0 ) )
  {
		$error_message = 'You already have a booking for this concert';
  }
	else if ($count_rows >= 2 )
  {
	$error_message = 'You are only allowed a maximum of two bookings.';
	}
  if ($error_message != '')
  {
      echo 'Error: '.$error_message.' <a href="javascript: history.back();">Go Back</a>.';
      echo '</body></html>';
      exit;
  }
 
  else {
    $query = "INSERT INTO booking VALUES (NULL,'".$id."','".$concert_id."')";
	echo $query;
    $result = $db->query($query);

    if ($result)
    {
      echo '<p>Concert booked!</p>';
	  header('Location: AttendeePage.php');
    }
    else {
      echo '<p>Error. Error message:</p>';
      echo '<p>'.$db->error.'</p>';
    }
  }
}
?>

