<?php
//connect to debug
  @ $db = new mysqli('localhost', 'root', '', 'assignmentone');

  if (mysqli_connect_error())
{ //display details of any connection errors
    echo 'Error connecting to DB:<br />'.mysqli_connect_error();
    exit;
}	
session_start();
//If the "mob_phone" session variable is set and not empty, redirect to Home page
if ( isset($_SESSION['user']) && $_SESSION['user'] != '' )
{
	header('Location: AttendeePage.php');
	exit;
}
//If form has been submitted, check login credentials
if ( isset($_POST['submit']) )
{
	$query = "SELECT * FROM attendee WHERE mob_phone='".$_POST['mob_phone']."' AND password='".$_POST['password']."'";
	$results = $db->query($query);
	if ($results->num_rows == 0)
	{
		echo '<div style="color: red;">Invalid login.  Try again.</div>';
	}
	else
	{
		//Log the user in
		$user = $results->fetch_assoc();
		//Set session variables then redirect to menu page
		$_SESSION['user'] = $user['mob_phone'];
		$_SESSION['admin'] = $user['admin_name'];
		header('Location: Attendee/AttendeePage.php');
		exit;
	}
}
?>


<html>
<h1>Attendee Login</h1>
<form method="post" action="login.php">
  <table style="width: 400px; border: 1px solid black; background-color: #F6EF77;" cellspacing="1" cellpadding="1">
  <tr>
    <td colspan="2"><strong>Login Details</strong></td>
  </tr>
  <tr><td><br /></td></tr>
  <tr >
  <td>Mobile Phone</td>
  <td>
    <input name="mob_phone" type="text" style="width: 200px;" maxlength="100" />*</td>
  </tr>
  <tr>
    <td>Password</td>
    <td>
      <input name="password" type="password" style="width: 200px;" maxlength="20" />*</td>
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