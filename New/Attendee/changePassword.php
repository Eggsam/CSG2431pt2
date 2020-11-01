<?php include 'AttSession.php';

if (isset($_POST['submit']))
	{	
		$id = $_SESSION['user'];
		$password = $_POST['password'];
		$error_message = '';
		$password_query = "SELECT mob_phone,password FROM attendee WHERE mob_phone = '".$id."'";
		$password_results = $db->query($password_query);
		if(empty($_POST['password']))
		{
		$error_messagge = "Your password is empty";
		}
		else if(strlen($_POST["password"]) < 6)
		{
        $error_message = "You password is too short, Minimum 6.";
		} 
		
		if(empty($error_message))
		{	
			echo "NO ERROR";
			$query = "UPDATE attendee SET password = '".$password."' WHERE mob_phone = '".$id."'";
			$result = $db->query($query);
		
			if ($result)
			{
			  echo '<p>password Updated inserted into database!</p>';
			  //header('Location: AttendeePage.php');
			}
			else
			{
			  echo '<p>Error updating password. Error message:</p>';
			  echo '<p>'.$db->error.'</p>';
			}
		}
		else
		{
			echo "ERROR";
			echo $error_message;
		}
		
	}
	
	
	
?>
<html>
<h1>Change Password</h1>
<form name="editPasswordForm" method="post" action="changePassword.php?edit_id=<?php echo $_SESSION['user']?>">
  <table style="width: 400px; border: 1px solid black; background-color: #F6EF77;" cellspacing="1" cellpadding="1">
  <tr>
    <td colspan="2"><strong>Edit Password</strong></td>
  </tr>
  <tr><td><br /></td></tr>
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
