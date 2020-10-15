<?php
//connect to debug
  @ $db = new mysqli('localhost', 'root', '', 'assignmentone');

  if (mysqli_connect_error())
{ //display details of any connection errors
    echo 'Error connecting to DB:<br />'.mysqli_connect_error();
    exit;
}	

?>
<html>
<head>
  <title>Attendee section!</title>
  <link rel="stylesheet" type="text/css" href='AttendeePage.css' />
</head>
<body>
  <div id="container">
      <div id="header">
        <h1>Welcome to Free Gigs Attendee Section!</h1>
      </div>
      <div id="main">
          <h2>Upcoming Concerts</h2>
        <?php
		$con_query ='SELECT  concert_date, band_name, venue_name FROM concert, band, venue ';
  
		if ($result = $db->query($con_query)) 
		{
			  if($row = $result->fetch_assoc()) 
			{
			    printf   ("%s  ,  %s is playing at %s ", $row["concert_date"], $row["band_name"], $row["venue_name"]);
				echo "<br /></n>";
				
			}
			
		}
	
	$result->free();  
    ?>
      </div>
		<div id="bookings">
          <h2>Your Concerts</h2>
          <p>Concert 1</p>
          <p>Concert 2</p>
      </div>
            <div id="nav">
		Welcome <?php $name_query = 'SELECT first_name, last_name FROM Attendee';
		$results = $db->query($name_query);
		while ($row = $results->fetch_assoc()) {
		echo $row['first_name']." ";
		echo $row['last_name']."<br />";
		break;
		
}?>
<h3><a href="/new/logout.php">Logout</a></h3><br>
<h3><a href="/new/Admin/AdminLogin.php">Admin Login</a></h3><br>
      </div>
      <div id="footer">
          <p>Created by Sam and Herman</p>
      </div>
  </div>
</body>
