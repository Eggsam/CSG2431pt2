<?php
include 'AdmSession.php';

//connect to debug
  @ $db = new mysqli('localhost', 'root', '', 'assignmentone');

  if (mysqli_connect_error())
  { //display details of any connection errors
    echo 'Error connecting to DB:<br />'.mysqli_connect_error();
    exit;
  }
  
  if (isset($_POST['band_name']))
  {
	
	//create short variable names from the data received from the form
	$bandname = $_POST['band_name'];
  $error_message = '';
  
  if (empty($bandname)  )
      {
        $error_message = 'One of the required values was blank';
      }
  
  $band_query = "SELECT band_name FROM band WHERE band_name = '".$bandname."' AND band_id !=".$_GET['edit_id'];
  $band_results = $db->query($band_query);

  if ($band_results->num_rows > 0)
  {
    $error_message = 'The band already exists!';
  }
  if ($error_message != '')
  {
      echo 'Error: '.$error_message.' <a href="javascript: history.back();">Go Back</a>.';
      echo '</body></html>';
      exit;
  }
  else {
    $query = "UPDATE band SET band_name = '".$bandname."' WHERE band_id = ".$_GET['edit_id'];

    $result = $db->query($query);

    if ($result)
    {
      echo '<p>Band name updated!</p>';
	  header('Location: Adminpage.php');
    }
    else {
      echo '<p>Error updating band. Error message:</p>';
      echo '<p>'.$db->error.'</p>';
    }
  }

  } 
  
  //need a user id num to kno whos details are being edited
  if (isset($_GET['edit_id']))
  {
	  //fetch user details and store in $row
	  $query = 'SELECT * FROM band WHERE band_id = '.$_GET['edit_id'];
	  $result = $db->query($query) or die($db->error);
	  $row = $result->fetch_assoc();
  }
  else
  {
  //if there is no user id redirect back to list user page
  header('Location: listBands.php');
  exit;
  }
  
?>
<!DOCTYPE html>

<html>
<h2><strong>Band Details</strong></h2>
<form name="editBandForm" method="post" action="editBand.php?edit_id=<?php echo $_GET['edit_id']?>">
  <table style="width: 400px; border: 1px solid black; background-color: #F6EF77;" cellspacing="1" cellpadding="1">
  <tr>
    <td colspan="2"><strong>Band Details</strong></td>
  </tr>
  <tr><td><br /></td></tr>
  <tr >
  <td>New Band Name</td>
    <td><input name="band_name" type="text" style="width: 200px;" maxlength="100" value="<?php echo $row['band_name'];?>" />*</td>
    </tr>
    <tr>
     <td colspan="2">&nbsp;</td>
   </tr>
   <tr>
     <td>
       <input type="reset" name="reset" value="Reset" />
   <input type="submit" name="submit" value="submit" /></td>
 </tr>
</table>
