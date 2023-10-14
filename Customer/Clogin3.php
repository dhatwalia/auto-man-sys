<!DOCTYPE html>
<html>
<body style="background-color:LightSkyBlue;">

<table align="right">
<tr><td>
<?php
session_start();
$cid = $_SESSION['cid'];
echo 'You are logged in as '.$cid;
?>
</td>
<td>
<form method="POST" action="Clogout.php">
	<input type="submit" name="logout" value="Logout">
</form>
</td></tr>
</table>

<table align="center">
<tr><td>
<p align="center">What do you want to do?</p>
</td></tr>

<tr><td>
<form method="POST" action="Clogin4.php">
	<input type="radio" name="choice" value="view" checked>View Orders<br>
  	<input type="radio" name="choice" value="place">Place new Order<br>
	<input type="radio" name="choice" value="delete">Delete Order<br><br>
	<input type="submit" name="submit" value="Submit">
</form> 
</td></tr>
</table>
</body>
</html>
