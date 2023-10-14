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
echo '<p><font size="5">Which order do you want to delete?</font><br></>';    	
$sql = "SELECT * from Orders O, Vehicle V where O.vid=V.vid and O.did='$did'";
$result = $conn->query($sql);

	echo '<body style="background-color:LightSkyBlue;">';
	echo '<table border="0" align="center" width="100%">';
	echo '<tr>';
	echo '<td><b> OrderID </b></td>';
	echo '<td><b> Brand </b></td>';
	echo '<td><b> Model </b></td>';
	echo '<td><b> Color </b></td>';
	echo '<td><b> Cylinder </b></td>';
	echo '<td><b> Transmission </b></td>';
	echo '<td><b> Deadline </b></td>';
	echo '<td><b> CustomerID </b></td>';
	echo '<td><b> Cost </b></td>';
	echo '<td><b> Status </b></td>';
	echo '</tr>';
	while($row = $result->fetch_assoc())
	{
		if($did == $row['did'])
		{
			echo '<tr>';
			echo '<td>' . $row['vid'] . '</td>';
			echo '<td>' . $row['brand'].'</td>';
			echo '<td>' . $row['model'].'</td>';
			echo '<td>' . $row['color'].'</td>';
			echo '<td>' . $row['cylinder'].'</td>';
			echo '<td>' . $row['transmission'].'</td>';
			echo '<td>' . $row['deadline'].'</td>';
			echo '<td>' . $row['cid'].'</td>';
			echo '<td>' . $row['cost'].'</td>';
			echo '<td>' . $row['statuss'].'</td>';
			echo '</tr>';
		}
	}
	echo '</table>';
	echo '</body>';

// Close connection
mysqli_close($conn);
?>

<html>
<body style="background-color:LightSkyBlue;">
<form method="POST" action="Ddelete2.php">
<table border="0" align="left">	

	<tr><td>Order ID</td><td align="left">
	<input type="text" name="vid" size="25" maxlength="25" /></td></tr>

	<tr><td colspan="2" align="center">
	<input type="submit" name="submit" value="Submit">
	<input type="reset" value="Reset"></tr>

	<tr><td><a href="Dlogin3.php">back</a></td></tr>
</table>
</form>
</body>
</html>
