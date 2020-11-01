<?php include 'AttSession.php';
 
	if (isset($_POST['password']))
	{
		$password = $_POST['password'];
		$venue_id = $_GET['edit_id'];
		$id = $_SESSION['user'];
		$error_message = '';
		$password_query = "SELECT mob_phone, password FROM attendee WHERE mob_phone= '.$id.'";
		$password_results = $db->query($password_query) or $db->error;
		echo $db->error;
		while($row = $password_results->fetch_assoc())
			{
			if ($previous_password != $row['password']) 
				{
        $error_message = 'Your passwords didnt match';
				}
			}
	If (empty($password) )
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
    $query = "UPDATE attendee SET password = '".$password."' WHERE mob_phone = ".$_GET['edit_id'];

    $result = $db->query($query);

    if ($result)
    {
      echo '<p>password Updated inserted into database!</p>';
	  header('Location: AdminPage.php');
    }
    else {
      echo '<p>Error updating password. Error message:</p>';
      echo '<p>'.$db->error.'</p>';
    }
  }

  } 

  
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit password Form</title>
</head>
<html>
<h1>Edit password</h1>

<form name="editpasswordForm" method="post" action="editpassword.php?edit_id=<?php echo $_GET['edit_id']?>">
  <table style="width: 400px; border: 1px solid black; background-color: #F6EF77;" cellspacing="1" cellpadding="1">
  <tr>
    <td colspan="2"><strong>Edit password</strong></td>
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
     <td colspan="2">&nbsp;</td>
   </tr>
   <tr>
     <td>
	 
      <input type="submit" name="submit" value="submit" /></td>
 </tr>
</table>
