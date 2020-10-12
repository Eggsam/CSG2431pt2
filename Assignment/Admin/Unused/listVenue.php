

<head>
 <title>List Venues</title>
 <style type="text/css">
 th, td {border: 1px solid black; width: 150px;}
 </style>
</head>

<body>
<h2><strong>List venues</strong></h2>
<?php
include_once 'adminheader.php';
//connect to database
  @ $db = new mysqli('localhost', 'root', '', 'assignmentone');


  if (mysqli_connect_error())
  { //display details of any connection errors
    echo 'Error connecting to DB:<br />'.mysqli_connect_error();
    exit;
  }
    $query = "SELECT * FROM venue";

	if (isset($_GET['del_id']))
	{
	$del_query = 'DELETE FROM venue WHERE venue_id = '.$_GET['del_id'];
	$del_results = $db->query($del_query);
	}
  //execute query
	$results = $db->query($query);
  //show how many row query returns
	echo '<p>'.$results->num_rows.' venue found.</p>';
  
  
  //start the table in which user list will be shown
  echo '<table><tr>';
  echo '<th>venue Name</th>';
  echo '</tr>';
  
  //loop through he results and display them
  while ($row = $results->fetch_assoc())
  {
    echo '<tr><td>'.$row['venue_name'].'</td>';
	
	
  echo '<td><a href="AdminPage.php?edit_id='.$row['venue_id'].'">Edit</a> ';
  echo '<a href="AdminPage.php?del_id='.$row['venue_id'].'" onclick="return confirm(\Are you sure?\');">Delete</a> </td></tr>';
  }
  
  echo '</table>';
?>
<h2>Add venue</h2>
<?php
//include_once 'addVenue.php';
if(isset($_POST['save']))
{	 
	 $venue_name = $_POST['venue_name'];
	 $sql = "INSERT INTO venue (venue_name) VALUES (NULL, '$venue_name')";
	 echo $sql;
	 if (mysqli_query($db, $sql)) {
		echo "New record created successfully !";
	 } else {
		echo "Error: Venue Already Exists";
	 }
	 mysqli_close($db);
}
?>
<!DOCTYPE html>
<html>
  <body>
	<form method="post" action="listVenue.php">
		Venue name:<br>
		<input type="text" name="venue_name">
		<br>
		<input type="submit" name="save" value="submit">
	</form>
  </body>
</html>

</body>
<html>
