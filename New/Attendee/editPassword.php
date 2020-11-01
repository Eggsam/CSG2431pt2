<?php include 'AttSession.php';

  if (isset($_['password']))
  {
	//create short variable names from the data received from the form
	$id = $_SESSION['user'];
	$previous_password = $_POST['previous_password'];
	$password = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];
	$error_message = '';
  
  if (empty($password)  )
      {
        $error_message = 'One of the required values was blank';
      }
  
  $venue_query = "SELECT password FROM attendee WHERE mob_phone = '".$id."'";
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
	  header('Location: AdminPage.php');
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
<h1>Change Password</h1>
<form name="editPasswordForm" method="post" action="editPassword.php?edit_id=<?php echo $_SESSION['user']?>">
  <table style="width: 400px; border: 1px solid black; background-color: #F6EF77;" cellspacing="1" cellpadding="1">
  <tr>
    <td colspan="2"><strong>Edit Password</strong></td>
  </tr>
  <tr><td><br /></td></tr>
  <tr >
  <td>Previous Password</td>
  <td>
  <input name="previous_password" type="text" style="width: 200px;" maxlength="100" />*</td>
  </tr>
  <tr >
  <td>Password</td>
  <td>
  <input name="password" type="text" style="width: 200px;" maxlength="100" />*</td>
  </tr>
   <tr >
  <td>Confirm Password</td>
  <td>
  <input name="confirm_password" type="text" style="width: 200px;" maxlength="100" />*</td>
  </tr>
   <tr>
     <td colspan="2">&nbsp;</td>
   </tr>
   <tr>
   <td>
	<input type="submit" name="submit" value="submit" /></td>
 </tr>
</table>
</html>
