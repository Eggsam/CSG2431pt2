<?php include 'AdmSession.php'; ?>
<!DOCTYPE html>
<html>
<h1>Add Band</h1>
<form name="editBandForm" method="post" onsubmit="return ValidateForm();" action="addBand.php?edit_id=<?php echo $_GET['edit_id']?> ">
  <table style="width: 400px; border: 1px solid black; background-color: #F6EF77;" cellspacing="1" cellpadding="1">
  <tr><td><br /></td></tr>
  <tr >
  <td>Band Name</td>
  <td>
  <input name="band_name" type="text" style="width: 200px;" maxlength="100" />*</td>
  </tr>  
   <tr>
     <td colspan="2">&nbsp;</td>
   </tr>
   <tr>
     <td>
	 <input type="submit" name="submit" value="submit" /></td>
 </tr>
</table>
</html>
<?php
if(isset($_POST['band_name']))
{	 
	$band_name = '';
	$band_name = $_POST['band_name'];
	 
	if($band_name == '')
	{
		echo "FILL IN THE NAME";
	}
	else
	{
	 $sqlB = "INSERT INTO band (band_id, band_name) VALUES (NULL, '".$band_name."')";
	if (mysqli_query($db, $sqlB)) {
		echo "New record created successfully !";
		header('Location: AdminPage.php');
		
	 } else {
		echo "Error: Band Already Exists "  ;
	 }
	}
}
?>