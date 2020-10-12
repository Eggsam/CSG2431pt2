<?php
include_once 'adminheader.php';
//connect to debug
  @ $db = new mysqli('localhost', 'root', '', 'assignmentone');

  if (mysqli_connect_error())
  { //display details of any connection errors
    echo 'Error connecting to DB:<br />'.mysqli_connect_error();
    exit;
  }
	
	//create short variable names from the data received from the form
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
 $query = "INSERT INTO concert  VALUES (NULL ,'".$band_id."', '".$venue_id."','".$concert_date."'  )";
	
		
	echo $query;
    $result = $db->query($query);

    if ($result)
    {
      echo '<p>User details inserted into database!</p>';
    }
    else {
      echo '<p>Error inserting details. Error message:</p>';
      echo '<p>'.$db->error.'</p>';
    }
  }
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Attendee Registration Results</title>
</head>

<body>
<h2><strong>New Attendee Details</strong></h2>
  <table style="width: 500px; border: 0px;" cellspacing="1" cellpadding="1">
    <tr>
      <td colspan="2"><strong>Personal Details</strong></td>
    </tr>
    <tr style="background-color: #FFFFFF;">
      <td>Band Name</td>
      <td> 
       </td>
    </tr>
    <tr style="background-color: #FFFFFF;">
      <td>Venue name</td>
      <td>
       </td>
    </tr>
    <tr style="background-color: #FFFFFF;">
      <td>Date</td>
      <td>
        </td>
    </tr>
   
    <tr><td><br></td></tr>
    <tr style="background-color: #FFFFFF;">
      
    </tr>
  </table>
</body>
</html>
