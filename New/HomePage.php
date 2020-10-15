<?php
//connect to debug
  @ $db = new mysqli('localhost', 'root', '', 'assignmentone');

  if (mysqli_connect_error())
{ //display details of any connection errors
    echo 'Error connecting to DB:<br />'.mysqli_connect_error();
    exit;
}	
?>

<!DOCTYPE html>
<html>
<head>
  <title>Free Gigs</title>
  <link rel="stylesheet" type="text/css" href="HomePageStyle.css" />
</head>
<body>
  <div id="container">
      <div id="header">
        <h1>Welcome to Free Gigs!</h1>
      </div>
      <div id="main">
          <h2>Upcoming Concerts</h2>
	<td>   
    <?php
		$con_query ='SELECT concert_date, band_name, venue_name FROM concert, band, venue ';
  
		if ($result = $db->query($con_query)) 
		{
			  if ($row = $result->fetch_assoc()) 
			{
			    printf   ("%s  ,  %s is playing at %s ", $row["concert_date"], $row["band_name"], $row["venue_name"]);
				echo "<br /></n>";
			}
		}
		
	$result->free();  
    ?>
	</td>
	</div>
    <div id="nav">
    <tr style="background-color: #FFFFFF;">
		<td><p>You must be logged in to book tickets!</p></td>
	<h3><a href="login.php">Login</a></h3>
 </tr>
		<h3>Other Links</h3>
         <h3><a href="/new/Attendee/AttendeeRegistration_js">Register</a></h3>
         <h3><a href="../Admin/AdminLogin.php">Admin Login</a></h3><br>
      </div>
      <div id="footer">
          <p>Created by Sam and Herman</p>
      </div>	
  </div>
</body>
</html>