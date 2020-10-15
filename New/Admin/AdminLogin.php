<?php
//Start or resume a session
session_start();

//If the "mob_phone" session variable is set and not empty, redirect to menu page
if ( isset($_SESSION['mob_phone']) && $_SESSION['mob_phone'] != '' )
{
	header('Location: Adminlogin.php');
	exit;
}

//If form has been submitted, check login credentials
if ( isset($_POST['username']) )
{

	@ $db = new mysqli('localhost', 'root', '','assignmentone');
	if (mysqli_connect_errno())
	{
		echo 'Could not connect the database - Please try again later';
		exit;
	}

	$query = "SELECT * FROM admin WHERE admin_username='".$_POST['username']."' AND admin_password='".$_POST['password']."'";

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
		$_SESSION['mob_phone'] = $user['username'];
		$_SESSION['level'] = $user['level'];
		header('Location: AdminPage.php');
		exit;
	}
}
?>
<!DOCTYPE html>
<html>
<h1>Admin Login</h1>
<form method="post" action="Adminlogin.php">
  <table style="width: 400px; border: 1px solid black; background-color: #F6EF77;" cellspacing="1" cellpadding="1">
  <tr>
    <td colspan="2"><strong>Login Details</strong></td>
  </tr>
  <tr><td><br /></td></tr>
  <tr >
  <td>Username</td>
  <td>
    <input name="username" type="text" style="width: 200px;" maxlength="100" />*</td>
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
   <input type="submit" name="submit" value="Log in" /></td>
 </tr>
</table>
