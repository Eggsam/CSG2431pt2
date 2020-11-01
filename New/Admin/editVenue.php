<?php include 'AttSession.php';
 
  if (isset($_POST['password_name']))
  {
	
	//create short variable names from the data received from the form
	$passwordname = $_POST['password_name'];
	$error_message = '';
  
  if (empty($passwordname)  )
      {
        $error_message = 'One of the required values was blank';
      }
  
  $password_query = "SELECT password_name, FROM password WHERE password_name = '".$passwordname."' AND password_id !=".$_GET['edit_id'];
  $password_results = $db->query($password_query);

  if ($password_results->num_rows > 0)
  {
    $error_message = 'The password already exists!';
  }
  if ($error_message != '')
  {
      echo 'Error: '.$error_message.' <a href="javascript: history.back();">Go Back</a>.';
      echo '</body></html>';
      exit;
  }
  else {
    $query = "UPDATE password SET password_name = '".$passwordname."' WHERE password_id = ".$_GET['edit_id'];

    $result = $db->query($query);

    if ($result)
    {
      echo '<p>password inserted into database!</p>';
	  header('Location: AdminPage.php');
    }
    else {
      echo '<p>Error inserting password. Error message:</p>';
      echo '<p>'.$db->error.'</p>';
    }
  }

  } 
  
  //need a user id num to kno whos details are being edited
  if (isset($_GET['edit_id']))
  {
	  //fetch user details and store in $row
	  $query = 'SELECT * FROM password WHERE password_id = '.$_GET['edit_id'];
	  $result = $db->query($query) or die($db->error);
	  $row = $result->fetch_assoc();
  }
  else
  {
  //if there is no user id redirect back to list user page
  header('Location: listpassword.php');
  exit;
  }
  
?>
<!DOCTYPE html>

<html>
<h2><strong>Edit password Name</strong></h2>
<form name="editpasswordForm" method="post" action="editpassword.php?edit_id=<?php echo $_GET['edit_id']?>">
  <table style="width: 400px; border: 1px solid black; background-color: #F6EF77;" cellspacing="1" cellpadding="1">
  <tr>
    <td colspan="2"><strong>Login Details</strong></td>
  </tr>
  <tr><td><br /></td></tr>
  <tr >
  <td>New password name</td>
    <td><input name="password_name" type="text" style="width: 200px;" maxlength="100" value="<?php echo $row['password_name'];?>" />*</td>
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