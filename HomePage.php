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
    ?></td>
	
      </div>
            <div id="nav">
     <tr style="background-color: #FFFFFF;">
		<td><p>You must be logged in to book tickets!</p></td>
		<form name="Attendeelogin" method="post" action="login.php" >
		  <td>Mobile Phone</td>
		  <td>
			<input name="mobilephone" type="text" style="width: 150px;" maxlength="100" />*</td>
		  </tr>
		  <tr style="background-color: #FFFFFF;">
			<td>Password</td>
			<td>
			  <input name="password" type="password" style="width: 150px;" maxlength="20" />*</td>
		   </tr>
		   <tr>
			 <td colspan="2">&nbsp;</td>
		   </tr>
		   <tr style="background-color: #FFFFFF;">
			 <td>
			   <input type="reset" name="reset" value="Reset" />
		   <input type="submit" name="submit" value="Submit" /></td>
		   </form>
 </tr>
		<h3>Other Links</h3>
         <h3><a href="AttendeeRegistration_js">Register</a></h3>
         <h3><a href="../Admin/AdminLogin.php">Admin Login</a></h3><br>
      </div>
      <div id="footer">
          <p>Created by Sam and Herman</p>
      </div>	
  </div>
</body>
</html>