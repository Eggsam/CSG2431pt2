<?php
include 'AdmSession.php'; 
 
	if (isset($_POST['capacity']))
	{
		$capacity = $_POST['capacity'];
		$venue_id = $_GET['edit_id'];
		$error_message = '';
		$capacity_query = "SELECT capacity, venue_id FROM venue WHERE Venue_id = '".$venue_id."'";
		$capacity_results = $db->query($capacity_query) or $db->error;
		echo $db->error;
		while($row = $capacity_results->fetch_assoc())
			{
			if ($capacity <= $row['capacity']) 
				{
        $error_message = 'You can only increase the capacity';
				}
			}
	If (empty($capacity) )
      {
        $error_message = 'One of the required values was blank';
      }
	
  if ($error_message != '')
  {
      echo 'Error: '.$error_message.' <a href="javascript: history.back();">Go Back</a>.';
      echo '</body></html>';
      exit;
  }
  else {
    $query = "UPDATE venue SET capacity = '".$capacity."' WHERE venue_id = ".$_GET['edit_id'];

    $result = $db->query($query);

    if ($result)
    {
      echo '<p>Capacity Updated inserted into database!</p>';
	  header('Location: AdminPage.php');
    }
    else {
      echo '<p>Error updating capacity. Error message:</p>';
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
  <title>Edit Capacity Form</title>
</head>
<html>
<h1>Edit Capacity</h1>
<h5>Must be greater than: <?php echo $row['capacity']; ?> </h5>
<form name="editCapacityForm" method="post" action="editCapacity.php?edit_id=<?php echo $_GET['edit_id']?>">
  <table style="width: 400px; border: 1px solid black; background-color: #F6EF77;" cellspacing="1" cellpadding="1">
  <tr>
    <td colspan="2"><strong>Edit Capacity</strong></td>
  </tr>
  <tr><td><br /></td></tr>
  <tr >
  <td>Capacity</td>
  <td>
  <input name="capacity" type="text" style="width: 200px;" maxlength="100" value="<?php echo $row['capacity'];?>" />*</td>
  </tr>
   <tr>
     <td colspan="2">&nbsp;</td>
   </tr>
   <tr>
     <td>
	 <input type="reset" name="reset" value="Reset" />
      <input type="submit" name="submit" value="submit" /></td>
 </tr>
</table>
