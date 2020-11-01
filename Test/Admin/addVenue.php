<?php if ( !isset($_SESSION['admin']) || $_SESSION['admin'] == '' )
{
	header('Location: ../Admin/Adminlogin.php');
	exit;
}
?>
<!DOCTYPE html>
<html>
  <body>
  <table>
	<form method="post" action="AdminPage.php">
	<tr><td>Venue name:<input type="text" name="venue_name"><br /></td></tr>
	
	<tr><td><input type="submit" name="submit" value="submit"></tr></td>
	</form>
  </table>
  </body>
</html>

<?php
if(isset($_POST['venue_name']))
{	 
	 $venue_name = "";
	 $venue_name = $_POST['venue_name'];
	 $capacity = $_POST['capacity'];
	 $sqlV = "INSERT INTO venue (venue_name, capacity) VALUES ('$venue_name','$capacity')";
 	

	 if (mysqli_query($db, $sqlV)) {
		echo "New record created successfully !";
	 } else {
		echo "Error: Venue Already Exists";
		echo $db->error;
	 }
	
}
?>
