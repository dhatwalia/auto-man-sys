<!DOCTYPE html>
<html>
<body style="background-color:LightSkyBlue;">

<table align="right">
<tr><td>
<?php
session_start();
$fid = $_SESSION['fid'];
echo 'You are logged in as '.$fid;
?>
</td>
<td>
<form method="POST" action="Flogout.php">
	<input type="submit" name="logout" value="Logout">
</form>
</td></tr>
</table>

<table align="center">
<tr><td>
<p align="center">What do you want to do?</p>
</td></tr>

<tr><td>
<form method="POST" action="Flogin4.php">
	<input type="radio" name="choice" value="view" checked>View Models<br>
  	<input type="radio" name="choice" value="update">Update Status<br>
	<input type="submit" name="submit" value="Submit">
</form> 
</td></tr>
</table>
</body>
</html>
