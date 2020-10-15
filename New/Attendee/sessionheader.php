<?php

	session_start();
  @ $db =  mysqli_connect('localhost', 'root', '', 'assignmentone');

  if (mysqli_connect_error())
  { //display details of any connection errors
    echo 'Error connecting to DB:'.mysqli_connect_error();
    exit;
  }
?>