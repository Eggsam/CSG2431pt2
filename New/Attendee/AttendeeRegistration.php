<!DOCTYPE html>
<html>
<head>
  <title>Attendee Registration Form</title>

  <script language="JavaScript" type="text/javascript">

  function ValidateForm()
  {
    if (document.AttendeeRegistration.firstname.value =='')
    {
      alert('Firstname field cannot be blank.');
      document.AttendeeRegistration.firstname.focus();
      return false;
    }
    if (document.AttendeeRegistration.surname.value =='')
    {
      alert('Surname field cannot be blank.');
      document.AttendeeRegistration.surname.focus();
      return false;
    }
    var dateformat = /^(\d{4})-(\d{1,2})-(\d{1,2})$/;
    if(!document.AttendeeRegistration.DOB.value.match(dateformat))
    {
      alert('DOB must be valid.');
      document.AttendeeRegistration.DOB.focus();
      return false;
    }
    if (document.AttendeeRegistration.mobilephone.value =='')
    {
      alert('Mobile Phone field cannot be blank.');
      document.AttendeeRegistration.mobilephone.focus();
      return false;
    }
    if (isNaN(document.AttendeeRegistration.mobilephone.value))
    {
      alert('Mobile Phone must be a number.');
      document.AttendeeRegistration.mobilephone.focus();
      return false;
    }
    if (document.AttendeeRegistration.password.value =='')
    {
      alert('Password field cannot be blank.');
      document.AttendeeRegistration.password.focus();
      return false;
    }
    if (document.AttendeeRegistration.password.value.length < 5)
    {
      alert('Password field must be at least 5 characters long.');
      document.AttendeeRegistration.password.focus();
      return false;
    }
    if (document.AttendeeRegistration.confirmPassword.value =='')
    {
      alert('Password confirmatiom field cannot be blank.');
      document.AttendeeRegistration.confirmPassword.focus();
      return false;
    }
    if (document.AttendeeRegistration.password.value != document.AttendeeRegistration.confirmPassword.value)
    {
      alert('Password fields do not match!.');
      document.AttendeeRegistration.confirmPassword.focus();
      return false;
    }
    return true;
  }
  </script>
</head>

<h1>Attendee Registration</h1>
<form name="AttendeeRegistration" method="post" action="AttendeeRegistrationDisplay.php" onsubmit="return ValidateForm();">
  <table style="width: 400px; border: 1px solid black;" cellspacing="1" cellpadding="1">
   <tr type="text" style="width: 200px;">
    <p>Please complete the form to create your account.</p>
  </tr>
  <tr>
    <td colspan="2"><strong>Personal Details</strong></td>
  </tr>
  <tr style="background-color: #FFFFFF;">
  <td>First Name</td>
  <td>
    <input name="firstname" type="text" style="width: 200px;" maxlength="100" />*</td>
  </tr>
  <tr style="background-color: #FFFFFF;">
    <td>Surname</td>
    <td>
      <input name="surname" type="text" style="width: 200px;" maxlength="100" />*</td>
  </tr>
  <tr style="background-color: #FFFFFF;">
    <td>D.O.B.<small> (YYYY-MM-DD)</small></td>
    
	<?php
    $currentDateTime = date('Y-m-d');
    
	?>
    <td><input name="DOB" type="date" min="1901-01-01" max="<?php echo $currentDateTime; ?>" style="width: 200px;"></td>
  </tr>
  <tr style="background-color: #FFFFFF;">
    <td>Mobile Phone </td>
    <td>
      <input name="mobilephone" type="text" style="width: 200px;" maxlength="15" />*</td>
  <tr style="background-color: #FFFFFF;">
    <td>Password</td>
    <td>
      <input name="password" type="password" style="width: 200px;" maxlength="20" />*</td>
   </tr>
  <tr style="background-color: #FFFFFF;">
    <td>Confirm Password</td>
    <td>
      <input name="confirmPassword" type="password" style="width: 200px;" maxlength="20" />*</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr style="background-color: #FFFFFF;">
    <td>
      <input type="reset" name="reset" value="Reset" />
  <input type="submit" name="submit" value="Submit" /></td>
    <td>
      <div align="right">* indicates required field</div></td>
  </tr>
</table>
</form>
