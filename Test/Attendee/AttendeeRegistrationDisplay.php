<?php
//connect to debug
  @ $db = new mysqli('localhost', 'root', '', 'assignmentone');

  if (mysqli_connect_error())
  { //display details of any connection errors
    echo 'Error connecting to DB:<br />'.mysqli_connect_error();
    exit;
  }

	//create short variable names from the data received from the form
	$firstname = $_POST['firstname'];
	$surname = $_POST['surname'];
	$DOB = $_POST['DOB'];
	$mobilephone = $_POST['mobilephone'];
	$password = $_POST['password'];
	$confirmPassword =$_POST['confirmPassword'];
	$error_message = '';
  if (empty($firstname)  || empty($surname) || empty($mobilephone) || empty($password))
      {
        $error_message = 'One of the required values was blank';
      }
  else if(!is_numeric($mobilephone))
  {
    $error_message = 'Your home phone number is not numeric';
  }
  else if (strlen($password) < 5)
  {
    $error_message = 'Your password is too short';
  }
  else if($password != $confirmPassword)
  {
    $error_message = 'Passwords didnt match';
  }
  if ($error_message != '')
  {
      echo 'Error: '.$error_message.' <a href="javascript: history.back();">Go Back</a>.';
      echo '</body></html>';
      exit;
  }
  else {
    $query = "INSERT INTO attendee VALUES ('".$mobilephone."','".$firstname."', '".$surname."','".$password."', '".$DOB."' ,NULL )";
	echo $query;
    $result = $db->query($query);

    if ($result)
    {
      echo '<p>User details inserted into database!</p>';
    }
    else {
      echo '<p>Error inserting details. Error message:</p>';
      echo '<p>'.$db->error.'</p>';
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Attendee Registration Results</title>
</head>

<body>
<h2><strong>New Attendee Details</strong></h2>
  <table style="width: 500px; border: 0px;" cellspacing="1" cellpadding="1">
    <tr>
      <td colspan="2"><strong>Personal Details</strong></td>
    </tr>
    <tr style="background-color: #FFFFFF;">
      <td>First Name</td>
      <td>
        <?php echo $firstname; ?></td>
    </tr>
    <tr style="background-color: #FFFFFF;">
      <td>Surname</td>
      <td>
        <?php echo $surname; ?></td>
    </tr>
    <tr style="background-color: #FFFFFF;">
      <td>D.O.B.</td>
      <td>
        <?php echo $DOB; ?></td>
    </tr>
    <tr style="background-color: #FFFFFF;">
      <td>Mobile Phone</td>
      <td>
        <?php echo $mobilephone; ?></td>
    </tr>
    <tr style="background-color: #FFFFFF;">
      <td>Password</td>
      <td>
        <?php echo $password; ?></td>
    </tr>
    <tr style="background-color: #FFFFFF;">
      <td>Confirm Password</td>
      <td>
        <?php echo $confirmPassword; ?></td>
    </tr>
    <tr><td><br></td></tr>
    <tr style="background-color: #FFFFFF;">
      <td><a href="/new/Homepage.php">Homepage</a></td>
    </tr>
  </table>
</body>
</html>
