<?php include 'AttSession.php' ?>
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
		$currentDateTime = date('Y-m-d\Th:i');
		$con_query =" SELECT concert_id, concert_date,band_name,venue_name, over_18, capacity
		FROM concert JOIN band ON concert.band_id = band.band_id JOIN venue ON concert.venue_id = venue.venue_id
		
		WHERE (concert_date > '".$currentDateTime."')";
		$id = $_SESSION['user'];
		$currentDateTime = date('Y-m-d\Th:i');
		$limit_query = "SELECT mob_phone, concert_date FROM booking JOIN concert ON concert.concert_id = booking.concert_id 
		WHERE mob_phone = '".$id."' AND (concert_date > '".$currentDateTime."')";
		$limit_result = $db->query($limit_query);
		$limit_rows = mysqli_num_rows($limit_result);
		
		$concert_count = "SELECT COUNT(booking_id) AS c, c.concert_id,  concert_date,band_name,venue_name, over_18, capacity
FROM concert c JOIN band ON c.band_id = band.band_id JOIN venue ON c.venue_id = venue.venue_id
LEFT JOIN booking ON booking.concert_id =c.concert_id
GROUP BY c.concert_id
UNION
SELECT COUNT(booking_id) AS c, c.concert_id, concert_date,band_name,venue_name, over_18, capacity
FROM concert c JOIN band ON c.band_id = band.band_id JOIN venue ON c.venue_id = venue.venue_id
LEFT JOIN booking ON booking.concert_id =c.concert_id
		WHERE (concert_date > '".$currentDateTime."') GROUP BY c.concert_id ";
		
	
  		if ($result = $db->query($concert_count) or $db->error) 
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
			
			$currentDateTime = date('Y-m-d\Th:i');
			echo '<strong>Concert Date: </strong>'.$row['concert_date'].'<br />';
			echo '<strong>Band Name: </strong>'.$row['band_name'].'<br />';
			echo '<strong>Venue Name: </strong>'.$row['venue_name'].'<br />'; 
			echo '<strong>Over 18\'s: </strong>'.$row['over_18'].'<br />';
			
			if ($row['c'] != $row['capacity'])
			{
			echo '<strong>Capacity: </strong>'.$row['c'].'\\'.$row['capacity'].'<br />';
			}
			else if ($row['c'] == $row['capacity'])
			{
			echo '<strong>Capacity: </strong>'.$row['c'].'\\'.$row['capacity'].' (Fully booked).<br />';
			}
			if ($limit_rows >= 2)
			{
				echo '<strong>Maximum bookings reached</strong><br />';
			}
			else if ($limit_rows < 2 AND ($row['concert_date'] >= $currentDateTime ))
			{	
				echo '<a href="bookConcert.php?concert_id='.$row['concert_id'].'">Book</a><br /> '; 
			}
			echo "<br /></n>";
			}
		}
		
	$result->free();  
	
    ?>
</div>
<div id="bookings">
<h2>Your Concerts</h2>    
<?php 
		$id = $_SESSION['user'];
		$book_query ="SELECT c.concert_id, c.concert_date,b.band_name,v.venue_name,v.capacity, k.mob_phone
		FROM concert c JOIN band b ON c.band_id = b.band_id JOIN venue v ON c.venue_id = v.venue_id 
		JOIN booking k ON c.concert_id= k.concert_id WHERE mob_phone = '".$id."'";
		if($result = $db->query($book_query) or die($db->error))
		{ 
			while($row = $result->fetch_assoc())
			{
				echo '<strong>Concert Date: </strong>'.$row['concert_date'].'<br />';
				echo '<strong>Band Name: </strong>'.$row['band_name'].'<br />';
				echo '<strong>Venue Name: </strong>'.$row['venue_name'].'<br />';  
				echo "<br /></n>";
			}
		}
?>  
</div>
<div id="nav">
<h2>Welcome</h2>
		<?php 
		$id = $_SESSION['user'];
		$name_query = "SELECT first_name, last_name,message FROM Attendee WHERE mob_phone = '".$id."'";
		$results = $db->query($name_query);
		while ($row = $results->fetch_assoc()) 
		{
		echo $row['first_name']." ";
		echo $row['last_name']." ";
		if ( $row['message'] != '')
		{
		echo $row['message']."<br />";
		$update_message = "UPDATE attendee SET message = ''";
		$message = $db->query($update_message);
		break;
		}
		}
		
		while ($row = $results->fetch_assoc()) 
		{
		echo $row['message']." ";
		
		}
		?>

<h3><a href="/new/logout.php">Logout</a></h3>
<h3><a href="/new/Admin/AdminLogin.php">Admin Login</a></h3>
<h3><a href="changePassword.php?edit_id=<?php echo $_SESSION['user']; ?>">Change Password</a></h3><br>
      </div>
      <div id="footer">
          <p>Created by Sam and Herman</p>
      </div>
  </div>
</body>
