<?php include 'AdmSession.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Add concert</title>
</head>
<h2><strong>New Concert Details </strong></h2>
<form name="concert" action="addConcert2.php" method="post">
 <table style="width: 400px; border: 1px solid black; background-color: #F6EF77;" cellspacing="1" cellpadding="1">
<tr style="background-color: #F6EF77;"><td>Band Name</td><td><select name="band">
<?php
    $band_query = 'SELECT * FROM band';
    $band_results = $db->query($band_query);
    for ( $i=0 ; $i < $band_results->num_rows ; $i++)
        {
            $band_row = $band_results->fetch_assoc();
            echo '<option value="'.$band_row['band_id'].'">';
            echo $band_row['band_name'].'</option>';
         }
?></select></td></tr>
<tr style="background-color: #F6EF77;"><td>Venue Name</td><td><select name="venue">
<?php
    $venue_query = 'SELECT * FROM venue';
    $venue_results = $db->query($venue_query);
    for ( $i=0 ; $i < $venue_results->num_rows ; $i++)
       {
            $venue_row = $venue_results->fetch_assoc();
            echo '<option value="'.$venue_row['venue_id'].'">';
            echo $venue_row['venue_name'].'</option>';
       }
?></select></td></tr>    
<tr style="background-color: #F6EF77;"><td>Concert Date</td>
<?php    $currentDateTime = date('Y-m-d\Th:i');	?>
<td><input type="datetime-local" name="concert_date" min="<?php echo $currentDateTime; ?>"  max="2020-12-31T00:00"></td>
<tr><td><label> Is this concert for over 18's?</label></td><td>Tick Me: <input type="checkbox" name="over_18" /><br /></td></tr>
<tr><td><input type="reset" name="reset" value="Reset" />
<input type="submit" name="submit" value="Submit" /></td></tr>
 </table>
</form> 
</html>


