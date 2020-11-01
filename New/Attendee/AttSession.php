<?php
//Start or resume a session
session_start();
@ $db =  mysqli_connect('localhost', 'root', '', 'assignmentone');

  if (mysqli_connect_error())
  { //display details of any connection errors
    echo 'Error connecting to DB:'.mysqli_connect_error();
    exit;
  }
//If the user session variable is not set or is empty, redirect to login page
if ( !isset($_SESSION['user']) || $_SESSION['user'] == '' )
{
	header('Location: ../login.php');
	exit;
}
else (isset$_SESSION['user'])
{
	
}
?>
<?php

  $db_query = "(INSERT INTO log_details) values (VALUES (NULL, '"$_SESSION['uname']."',
         'Users registration: ".$_POST['username']."',  
['uname']."','"$_SESSION['uname']."', NULL ))
{
}
}
?>