<?php include 'AdmSession.php'; ?>
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


<?php

	$query = "SELECT * FROM venue";
	if (isset($_GET['del_id']))
	{
	$del_query = 'DELETE FROM venue WHERE venue_id = '.$_GET['del_id'];
	$del_results = $db->query($del_query);
	}
 	$results = $db->query($query);
  	echo '<p>'.$results->num_rows.' venue found.</p>';
	$capacity_query = "SELECT capacity FROM venue";
	$capacity_result = $db->query($capacity_query);
   
  echo '<table><tr>';
  echo '<th>Venue name</th><th>Capacity</th>';
  echo '</tr>';
    //loop through he results and display them
  while ($row = $results->fetch_assoc())
  {
    echo '<tr><td>'.$row['venue_name'].'</td>';
	echo '<td>Max capacity: '.$row['capacity'].'</td>';
	echo '<td><a href="editCapacity.php?edit_id='.$row['venue_id'].'">Increase</a> </td>';
	echo '<td><a href="editVenue.php?edit_id='.$row['venue_id'].'">Edit</a> </td>';
    echo "<td><a onClick=\"javascript: return confirm('Please confirm deletion');\" href='AdminPage.php?del_id=".$row['venue_id']."'>Delete</a></td></tr>";
	
  }
    echo '</table><br />';
	
	echo '<table><tr><td><strong>Add Venue</strong></td>';
	echo '<td><br /></td><td><a href="addVenue.php?edit_id='.$row['venue_id'].'">Add</a> </td></tr></table>';

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
echo '<a href="addBand.php?edit_id='.$row['venue_id'].'">Add Band</a> <br />';
if(isset($_POST['save']))
{	 
	$band_name = '';
	$band_name = $_POST['band_name'];
	 
	if($band_name == '')
	{
		echo "FILL IN THE NAME";
	}
	else
	{
	 $sql = "INSERT INTO band (band_name)
	 VALUES ('$band_name')";
	
	 if (mysqli_query($db, $sql)) {
		echo "New record created successfully !";
		
		
	 } else {
		echo "Error: Band Already Exists "  ;
	 }
	}
}
?>
      </div>
	  <div id="main">
          <h2>Manage Concerts</h2>
		   
        <a href = "addConcert.php" >Add concert</a><br />
		<?php
		$currentDateTime = date('Y-m-d\Th:i');
		$con_query =" SELECT concert_id, concert_date,band_name,venue_name, over_18, capacity
		FROM concert JOIN band ON concert.band_id = band.band_id JOIN venue ON concert.venue_id = venue.venue_id";
		$id = $_SESSION['user'];
		$limit_query = "SELECT mob_phone, concert_date FROM booking JOIN concert ON concert.concert_ID = booking.concert_id 
		WHERE mob_phone =  '".$id."' AND (concert_date > '".$currentDateTime."')";
		$limit_result = $db->query($limit_query);
		$limit_rows = mysqli_num_rows($limit_result);
	
  		if ($result = $db->query($con_query)) 
		{
			  while ($row = $result->fetch_assoc()) 
			{
				
				if($row['over_18'] == 1)
					{
						$row['over_18'] = 'Yes';
					}
				else if( $row['over_18'] == 0)
					{
						$row['over_18'] = 'No';
					}
			echo'<br /><strong>Concert Date: </strong>'.$row['concert_date'].'<br />';
			echo '<strong>Band Name: </strong>'.$row['band_name'].'<br />';
			echo '<strong>Venue Name: </strong>'.$row['venue_name'].'<br />'; 
			echo '<strong>Over 18\'s: </strong>'.$row['over_18'].'<br />';
			echo '<strong>Capacity: </strong>'.$row['capacity'].'<br />';
			if ( $currentDateTime < $row['concert_date'])
			{
			echo "<a onClick=\"javascript: return confirm('Please confirm cancelation');\" href='cancelConcert.php?del_id=".$row['concert_id']."'>Cancel</a>";
			}
		}
		}
	$result->free();  
	
    ?>
      </div>
            <div id="nav">
		<p>Welcome </p>
		<?php 
		$id = $_SESSION['admin'];
		$name_query = "SELECT admin_name FROM admin";
		$results = $db->query($name_query);
		while ($row = $results->fetch_assoc()) 
		{
		echo $row['admin_name'];
		break;
		}
		?>
		
         <h3><a href="logout.php">Log out</a></h3>
         
      </div>
      <div id="footer">
          <p>Created by Sam and Herman</p>
      </div>
  </div>
</body>
