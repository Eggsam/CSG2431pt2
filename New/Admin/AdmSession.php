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
if ( !isset($_SESSION['admin']) || $_SESSION['admin'] == '' )
{
	header('Location: ../Admin/Adminlogin.php');
	exit;
}
?>
