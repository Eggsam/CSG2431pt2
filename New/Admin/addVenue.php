<?php include 'AdmSession.php'; ?>
<!DOCTYPE html>
<html>
<script language="JavaScript" type="text/javascript">

  function ValidateForm()
  {
    if (document.addVenue.venue_name.value =='')
    {
      alert('Venue name field cannot be blank.');
      document.addVenue.venue_name.focus();
      return false;
    }
  }
</script>

<h1>Add Venue</h1>
<form name="editVenueForm" method="post" onsubmit="return ValidateForm();" action="addVenue.php?edit_id=<?php echo $_GET['edit_id']?> ">
  <table style="width: 400px; border: 1px solid black; background-color: #F6EF77;" cellspacing="1" cellpadding="1">
  <tr><td><br /></td></tr>
  <tr >
  <td>Venue Name</td>
  <td>
  <input name="venue_name" type="text" style="width: 200px;" maxlength="100" />*</td>
  </tr>
  <tr>
  <td>Capacity</td>
  <td>
  <input name="capacity" type="text" style="width: 200px;" maxlength="100"  />*</td>
  </tr>
   <tr>
     <td colspan="2">&nbsp;</td>
   </tr>
   <tr>
     <td>
	 <input type="submit" name="submit" value="submit" /></td>
 </tr>
</table>


<?php
if(isset($_POST['venue_name']))
{	 
	 $venue_name = "";
	 $venue_name = $_POST['venue_name'];
	 $capacity= $_POST['capacity'];
	if($venue_name == '')
	{
		echo "FILL IN THE NAME";
	}
	else 
	{
	
	 $sqlV = "INSERT INTO venue (venue_id, venue_name,capacity) VALUES (NULL, '$venue_name','$capacity')";
 	

	 if (mysqli_query($db, $sqlV)) {
		echo "New record created successfully !";
		header('Location: AdminPage.php');
		
	 } else {
		echo "Error: Venue Already Exists";
		echo $db->error;
	 }
	}
}
?>
