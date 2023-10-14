<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";

session_start();
$cid = $_SESSION['cid'];
//$passwords = $_SESSION['passwords'];

// Create connection
$conn = mysqli_connect($servername,$username,$password,$dbname);
if($conn === false)
    die("ERROR: Could not connect. " . mysqli_connect_error());

// Query    	
$sql = "SELECT * from Orders O, Vehicle V where O.vid=V.vid and O.cid='$cid';";
$result = $conn->query($sql);

if($_POST['choice']=="view")
{
	echo '<body style="background-color:LightSkyBlue;">';
	echo '<table align="center" width="95%">';
	echo '<tr>';
	echo '<td><b> OrderID </b></td>';
	echo '<td><b> Brand </b></td>';
	echo '<td><b> Model </b></td>';
	echo '<td><b> Color </b></td>';
	echo '<td><b> Cylinder </b></td>';
	echo '<td><b> Transmission </b></td>';
	echo '<td><b> Deadline </b></td>';
	echo '<td><b> DealerID </b></td>';
	echo '<td><b> Cost </b></td>';
	echo '<td><b> Status </b></td>';
	echo '</tr>';
	while($row = $result->fetch_assoc())
	{
		if($cid == $row['cid'])
		{
			echo '<tr>';
			echo '<td>' . $row['vid'] . '</td>';
			echo '<td>' . $row['brand'].'</td>';
			echo '<td>' . $row['model'].'</td>';
			echo '<td>' . $row['color'].'</td>';
			echo '<td>' . $row['cylinder'].'</td>';
			echo '<td>' . $row['transmission'].'</td>';
			echo '<td>' . $row['deadline'].'</td>';
			echo '<td>' . $row['did'].'</td>';
			echo '<td>' . $row['cost'].'</td>';
			echo '<td>' . $row['statuss'].'</td>';
			echo '</tr>';
		}
	}
	echo '</table>';
	echo '<p align="left"><a href="Clogin3.php">back</a></>';
	echo '</body>';
}
else
if($_POST['choice']=="place")
{
	mysqli_close($conn);
	header('Location: Corder.html');
}
else	//if($_POST['choice']=="delete")
{
	mysqli_close($conn);
	header('Location: Cdelete.php');
}
// Close connection
mysqli_close($conn);
?>