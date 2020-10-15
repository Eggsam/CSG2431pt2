<?php
//connect to database
  @ $db = new mysqli('localhost', 'root', '', 'assignmentone');

  if (mysqli_connect_error())
  { //display details of any connection errors
    echo 'Error connecting to DB:<br />'.mysqli_connect_error();
    exit;
  }
    
?>
<html>
<head>
  <title>Admin section</title>
  <link rel="stylesheet" type="text/css" href="AdminPageStyle.css" />
</head>
<body>
  <div id="container">
      <div id="header">
        <h1>Welcome Supreme Administration Overlord!</h1>
      </div>
      <div id="main">
          <h2>Manage Venues</h2>
		  <body>
<h3>Add venue</h3>
<?php
$query = "SELECT * FROM venue";
	if (isset($_GET['del_id']))
	{
	$del_query = 'DELETE FROM venue WHERE venue_id = '.$_GET['del_id'];
	$del_results = $db->query($del_query);
	}
 	$results = $db->query($query);
  	echo '<p>'.$results->num_rows.' venue found.</p>';
   
  echo '<table><tr>';
  echo '<th>Venue name</th>';
  echo '</tr>';
    //loop through he results and display them
  while ($row = $results->fetch_assoc())
  {
    echo '<tr><td>'.$row['venue_name'].'</td>';
	echo '<td><a href="editVenue.php?edit_id='.$row['venue_id'].'">Edit</a> ';
    echo "<td><a onClick=\"javascript: return confirm('Please confirm deletion');\" href='AdminPage.php?del_id=".$row['venue_id']."'>Delete</a></td><tr>";
  }
    echo '</table>';

include_once 'addVenue.php';
if(isset($_POST['save']))
{	 
	 $venue_name = $_POST['venue_name'];
	 $sql = "INSERT INTO venue (venue_name)
	 VALUES ('$venue_name')";
	 if (mysqli_query($db, $sql)) {
		echo "New record created successfully !";
	 } else {
		echo "Error: Venue Already Exists "  ;
	 }
	 mysqli_close($db);
}
?>
</body>
</div>
	<div id="bookings">
        <h2>Manage Bands</h2>
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

  echo "<td><a onClick=\"javascript: return confirm('Please confirm deletion');\" href='AdminPage.php?del_id=".$row['band_id']."'>Delete</a></td><tr>";
  }
  
  echo '</table>';
?>
        <h3>Add Band</h3>
		  <?php
include_once 'addBand.php';
if(isset($_POST['save']))
{	 
	$band_name = '';
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
      </div>
	  <div id="main">
          <h2>Manage Concerts</h2>
        <a href = "addConcert.php" >Add concert</a>
      </div>
            <div id="nav">
		<p>Welcome _______</p>
         <h3><a href="logout.php">Log out</a></h3>
         
      </div>
      <div id="footer">
          <p>Created by Sam and Herman</p>
      </div>
  </div>
</body>
