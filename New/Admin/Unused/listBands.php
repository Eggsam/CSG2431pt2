<?php include ('adminHeader.php');?>
<!DOCTYPE html>
<html>
<head>
 <title>List Bands</title>
 <style type="text/css">
 th, td {border: 1px solid black; width: 150px;}
 </style>
</head>

<body>
<h2><strong>List Bands</strong></h2>
<?php
//connect to database
  @ $db = new mysqli('localhost', 'root', '', 'assignmentone');


  if (mysqli_connect_error())
  { //display details of any connection errors
    echo 'Error connecting to DB:<br />'.mysqli_connect_error();
    exit;
  }
    $query = "SELECT * FROM band";

	if (isset($_GET['del_id']))
	{
	$del_query = 'DELETE FROM band WHERE band_id = '.$_GET['del_id'];
	$del_results = $db->query($del_query);
	}
  //execute query
	$results = $db->query($query);
  //show how many row query returns
	echo '<p>'.$results->num_rows.' user found.</p>';
  
  
  //start the table in which user list will be shown
  echo '<table><tr>';
  echo '<th>Band Name</th>';
  echo '</tr>';
  
  //loop through he results and display them
  while ($row = $results->fetch_assoc())
  {
    echo '<tr><td>'.$row['band_name'].'</td>';
	
	
  echo '<td><a href="editBand.php?edit_id='.$row['band_id'].'">Edit</a> ';
  echo '<a href="AdminPage.php?del_id='.$row['band_id'].'"onclick="return confirm(\Are you sure?\');">Delete</a></td></tr>';
  }
  
  echo '</table>';
?>
<h2>Add Band</h2>
<?php
include_once 'addBand.php';
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
</body>
<html>
