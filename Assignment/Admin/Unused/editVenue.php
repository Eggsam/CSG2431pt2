<?php
//connect to debug
include_once 'adminheader.php';
  @ $db = new mysqli('localhost', 'root', '', 'assignmentone');

  if (mysqli_connect_error())
  { //display details of any connection errors
    echo 'Error connecting to DB:<br />'.mysqli_connect_error();
    exit;
  }
  
  if (isset($_POST['venue_name']))
  {
	
	//create short variable names from the data received from the form
	$venuename = $_POST['venue_name'];
	$error_message = '';
  
  if (empty($venuename)  )
      {
        $error_message = 'One of the required values was blank';
      }
  
  $venue_query = "SELECT venue_name FROM venue WHERE venue_name = '".$venuename."' AND venue_id !=".$_GET['edit_id'];
  $venue_results = $db->query($venue_query);

  if ($venue_results->num_rows > 0)
  {
    $error_message = 'The venue already exists!';
  }
  if ($error_message != '')
  {
      echo 'Error: '.$error_message.' <a href="javascript: history.back();">Go Back</a>.';
      echo '</body></html>';
      exit;
  }
  else {
    $query = "UPDATE venue SET venue_name = '".$venuename."' WHERE venue_id = ".$_GET['edit_id'];

    $result = $db->query($query);

    if ($result)
    {
      echo '<p>venue inserted into database!</p>';
    }
    else {
      echo '<p>Error inserting venue. Error message:</p>';
      echo '<p>'.$db->error.'</p>';
    }
  }

  } 
  
  //need a user id num to kno whos details are being edited
  if (isset($_GET['edit_id']))
  {
	  //fetch user details and store in $row
	  $query = 'SELECT * FROM venue WHERE venue_id = '.$_GET['edit_id'];
	  $result = $db->query($query) or die($db->error);
	  $row = $result->fetch_assoc();
  }
  else
  {
  //if there is no user id redirect back to list user page
  header('Location: listVenue.php');
  exit;
  }
  
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit user Form</title>
</head>

<body>
<h2><strong>Edit Venue Name</strong></h2>
<form name="editvenueForm" method="post" action="editvenue.php?edit_id=<?php echo $_GET['edit_id']?>">
  <table style="width: 500px; border: 0px;" cellspacing="1" cellpadding="1">

    <tr style="background-color: #FFFFFF;">
      <td>New venue name</td>
    <td><input name="venue_name" type="text" style="width: 200px;" maxlength="100" value="<?php echo $row['venue_name'];?>" />*</td>
      <td colspan="2">&nbsp;</td>
    </tr>

   
    <tr style="background-color: #FFFFFF;">
      <td>
        <input type="reset" name="reset" value="Reset" />
		<input type="submit" name="submit" value="Submit" /></td>
      <td>
        <div align="right">* indicates required field</div></td>
    </tr>
  </table>
</form>
</body>
</html>
