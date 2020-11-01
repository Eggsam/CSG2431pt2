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
if ( isset($_POST['mob_phone']) )
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
		$_SESSION['admin_name'] = $user['admin'];
		header('Location: AttendeePage.php');
		exit;
	}
}
?>
<form method="post" action="login.php">
	mob_phone: <input type="text" name="mob_phone" /><br />
	Password: <input type="password" name="password" /><br />
	<input type="submit" name="submit" value="submit" />
</form>