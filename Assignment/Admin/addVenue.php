<?php

  @ $db =  mysqli_connect('localhost', 'root', '', 'assignmentone');

  if (mysqli_connect_error())
  { //display details of any connection errors
    echo 'Error connecting to DB:'.mysqli_connect_error();
    exit;
  }
?>
<!DOCTYPE html>
<html>
  <body>
	<form method="post" action="AdminPage.php">
		Venue name:<br>
		<input type="text" name="venue_name">
		<br>
		<input type="submit" name="save" value="submit">
	</form>
  </body>
</html>

<?php
if(isset($_POST['submit']))
{	 
	$venue_name = "";
	 $venue_name = $_POST['venue_name'];
	 $sql = "INSERT INTO venue (venue_name)
	 VALUES ('$venue_name')";
	 if (mysqli_query($db, $sql)) {
		echo "New record created successfully !";
	 } else {
		echo "Error: Venue Already Exists";
	 }
	 mysqli_close($db);
}
?>
