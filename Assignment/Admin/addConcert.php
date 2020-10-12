<?php include ('adminHeader.php');?>
<?php
//connect to debug
  @ $db = new mysqli('localhost', 'root', '', 'assignmentone');

  if (mysqli_connect_error())
  { //display details of any connection errors
    echo 'Error connecting to DB:'.mysqli_connect_error();
    exit;
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add concert</title>
</head>
<h2><strong>New Concert Details</strong></h2>
<form name="concert" action="addConcert2.php" method="post">
  <table style="width: 500px; border: 0px;" cellspacing="1" cellpadding="1">
     <tr style="background-color: #FFFFFF;">
      <td>Band Name</td>
	  <td><select name="band">
	  <?php
          $band_query = 'SELECT * FROM band';
          $band_results = $db->query($band_query);
          for ( $i=0 ; $i < $band_results->num_rows ; $i++)
          {
            $band_row = $band_results->fetch_assoc();

            echo '<option value="'.$band_row['band_id'].'">';
            echo $band_row['band_name'].'</option>';
          }
          ?></select></td>      
    </tr>
	<tr style="background-color: #FFFFFF;">
      <td>Venue Name</td>
	  <td><select name="venue">
	  <?php
          $venue_query = 'SELECT * FROM venue';
          $venue_results = $db->query($venue_query);
          for ( $i=0 ; $i < $venue_results->num_rows ; $i++)
          {
            $venue_row = $venue_results->fetch_assoc();

            echo '<option value="'.$venue_row['venue_id'].'">';
            echo $venue_row['venue_name'].'</option>';
          }
          ?></select></td>      
    </tr
    
    <tr style="background-color: #FFFFFF;">
      <td>Concert Date</td>
      <td><input type="datetime-local" id="concert-time"
       name="concert_date" value="2018-06-12T19:30"
      ></td>
    </tr>
	<td>
      <input type="reset" name="reset" value="Reset" />
  <input type="submit" name="submit" value="Submit" /></td>
  <tr><td><br /></td></tr>
  <td><h2>List Concert</h2></td>
  <?php $query = "SELECT * FROM concert";

	if (isset($_GET['del_id']))
	{
	$del_query = 'DELETE FROM concert WHERE concert_id = '.$_GET['del_id'];
	$del_results = $db->query($del_query);
	}
  //execute query
	$results = $db->query($query);
  //show how many row query returns
	echo '<p>'.$results->num_rows.' user found.</p>';
  
  
  //start the table in which user list will be shown
  echo '<table><tr>';
  echo '<th>Concert</th>';
  echo '</tr>';
  
  //loop through he results and display them
  while ($row = $results->fetch_assoc())
  {
    echo '<tr><td>'.$row['concert_id'].'</td>';
	
    echo '<td>'.$venue_row['venue_name'].'</td>';

	echo '<td>'.$band_row['band_name'].'</td>';
	
	
  }
  
  echo '</table>';
?> </td>
    
  </table>
</form>
</html>


