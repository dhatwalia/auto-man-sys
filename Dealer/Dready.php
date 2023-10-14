<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";

session_start();
$did = $_SESSION['did'];

// Create connection
$conn = mysqli_connect($servername,$username,$password,$dbname);
if($conn === false)
    die("ERROR: Could not connect. " . mysqli_connect_error());

// Query
echo '<p><font size="5">Which order is ready to build?</font><br></>';    	
$sql = "SELECT vid,statuss from Orders where statuss is NULL";
$result = $conn->query($sql);

	echo '<body style="background-color:LightSkyBlue;">';
	echo '<table border="0" align="center" width="100%">';
	echo '<tr>';
	echo '<td><b> OrderID </b></td>';
	echo '<td><b> Status </b></td>';
	echo '</tr>';
	while($row = $result->fetch_assoc())
	{
		echo '<tr>';
		echo '<td>' . $row['vid'] . '</td>';
		echo '<td>' . $row['statuss'].'</td>';
		echo '</tr>';
	}
	echo '</table>';
	echo '</body>';

// Close connection
mysqli_close($conn);
?>

<html>
<body style="background-color:LightSkyBlue;">
<form method="POST" action="Dready2.php">
<table border="0" align="left">	

	<tr><td>Order ID</td><td align="left">
	<input type="text" name="vid" size="25" maxlength="5" /></td></tr>

	<tr><td colspan="2" align="center">
	<input type="submit" name="submit" value="Ready to build">

	<tr><td><a href="Dlogin3.php">back</a></td></tr>
</table>
</form>
</body>
</html>
