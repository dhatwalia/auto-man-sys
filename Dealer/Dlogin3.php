<!DOCTYPE html>
<html>
<body style="background-color:LightSkyBlue;">

<table align="right">
<tr><td>
<?php
session_start();
$did = $_SESSION['did'];
echo 'You are logged in as '.$did;
?>
</td>
<td>
<form method="POST" action="Dlogout.php">
	<input type="submit" name="logout" value="Logout">
</form>
</td></tr>
</table>

<table align="center">
<tr><td>
<p align="center">What do you want to do?</p>
</td></tr>

<tr><td>
<form method="POST" action="Dlogin4.php">
	<input type="radio" name="choice" value="view" checked>View Models<br>
  	<input type="radio" name="choice" value="update">Update Cost<br>
	<input type="radio" name="choice" value="ready">Ready to build<br>
	<input type="radio" name="choice" value="delete">Delete Order<br><br>
	<input type="submit" name="submit" value="Submit">
</form> 
</td></tr>
</table>
</body>
</html>
