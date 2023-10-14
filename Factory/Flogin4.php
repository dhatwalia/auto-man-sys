<html>
<body>
<p align="center"><font size="5">Models you manufacture</font></p> 
</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";

session_start();
$fid = $_SESSION['fid'];
//$fpasswords = $_SESSION['fpasswords'];

// Create connection
$conn = mysqli_connect($servername,$username,$password,$dbname);
if($conn === false)
    die("ERROR: Could not connect. " . mysqli_connect_error());

// Query    	
$sql = "SELECT * from Factory where fid='$fid';";
$result = $conn->query($sql);

if($_POST['choice']=="view")
{
	echo '<body style="background-color:LightSkyBlue;">';
	echo '<table align="center" width="95%">';
	echo '<tr>';
	echo '<td><b> Brand </b></td>';
	echo '<td><b> Model </b></td>';
	
	while($row = $result->fetch_assoc())
	{
		if($fid == $row['fid'])
		{
			echo '<tr>';
			echo '<td>' . $row['brand'] . '</td>';
			echo '<td>' . $row['model'].'</td>';
			echo '</tr>';
		}
	}
	echo '</table>';
	echo '<p align="left"><a href="Flogin3.php">back</a></>';
	echo '</body>';
}
else
if($_POST['choice']=="update")
{
	mysqli_close($conn);
	header('Location: Fupdate.php');
}
else	//if($_POST['choice']=="delete")
{
	mysqli_close($conn);
	header('Location: Fdelete.php');
}
// Close connection
mysqli_close($conn);
?>