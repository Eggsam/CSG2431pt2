<?php
//Start or resume a session
session_start();

//If the "uname" session variable is set and not empty, redirect to menu page
if ( isset($_SESSION['uname']) && $_SESSION['uname'] != '' )
{
	header('Location: Homepage.php');
	exit;
}

//If form has been submitted, check login credentials
if ( isset($_POST['mob_phone']) )
{

	@ $db = new mysqli('localhost', 'root', '', 'assignmentone');

  if (mysqli_connect_error())
  { //display details of any connection errors
    echo 'Error connecting to DB:<br />'.mysqli_connect_error();
    exit;
  }
	
	$query = "SELECT * FROM attendee WHERE mob_phone ='".$_POST['mob_phone']."' AND password='".$_POST['password']."'";

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
		$_SESSION['uname'] = $user['mob_phone'];
		$_SESSION['level'] = $user['level'];
		header('Location: AttendeePage.php');
		exit;
	}
}
?>

<form name="Attendeelogin" method="post" action="login.php" >
	Username: <input type="text" name="mob_phone" /><br />
	Password: <input type="password" name="password" /><br />
	<input type="submit" name="submit" value="submit" />
</form>