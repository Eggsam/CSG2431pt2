<?php if ( !isset($_SESSION['admin']) || $_SESSION['admin'] == '' )
{
	header('Location: ../Admin/Adminlogin.php');
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
