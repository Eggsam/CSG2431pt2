<?php
include 'AdmSession.php'; 
//create short variable names from the data received from the form
 if (isset($_POST['over_18']))
	{
		$over_18 = 1;
	}
if(isset($_POST['submit']))
	{
	$band_id = $_POST['band'];
	$venue_id = $_POST['venue'];
	$concert_date = $_POST['concert_date'];
	
	$error_message = '';

  if ($error_message != '')
  {
      echo 'Error: '.$error_message.' <a href="javascript: history.back();">Go Back</a>.';
      echo '</body></html>';
      exit;
  }
 
  else {
   // $query = "INSERT INTO concert (band_id,venue_id,concert_date) VALUES ('".$band_id."', '".$venue_id."','".$concert_date."'  )";
 $query = "INSERT INTO concert  VALUES (NULL ,'".$band_id."', '".$venue_id."','".$concert_date."','".$over_18."' )";
	echo $query;
    $result = $db->query($query);

    if ($result)
    {
      echo '<p>User details inserted into database!</p>';
	  header('Location: AdminPage.php');
    }
    else {
      echo '<p>Error inserting details. Error message:</p>';
      echo '<p>'.$db->error.'</p>';
    }
  }
  }
  
?>
