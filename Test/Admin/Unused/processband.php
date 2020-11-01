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
		Band name:<br>
		<input type="text" name="band_name">
		<br>
		<input type="submit" name="save" value="submit">
	</form>
  </body>
</html>
<?php

if(isset($_POST['save']))
{	 
	 $band_name = $_POST['band_name'];
	 $sql = "INSERT INTO band (band_name)
	 VALUES ('$band_name')";
	 if (mysqli_query($db, $sql)) {
		echo "New record created successfully !";
	 } else {
		echo "Error: Band Already Exists "  ;
	 }
	 mysqli_close($db);
}
?>

