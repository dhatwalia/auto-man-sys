<html>
<body>
<p align="center"><font size="5">Models you deal with</font></p> 
</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";

session_start();
$did = $_SESSION['did'];
//$dpasswords = $_SESSION['dpasswords'];

// Create connection
$conn = mysqli_connect($servername,$username,$password,$dbname);
if($conn === false)
    die("ERROR: Could not connect. " . mysqli_connect_error());

// Query    	
$sql = "SELECT * from Dealer where did='$did';";
$result = $conn->query($sql);

if($_POST['choice']=="view")
{
	echo '<body style="background-color:LightSkyBlue;">';
	echo '<table align="center" width="95%">';
	echo '<tr>';
	echo '<td><b> Brand </b></td>';
	echo '<td><b> Model </b></td>';
	echo '<td><b> FactoryID </b></td>';
	echo '<td><b> Cost </b></td>';
	echo '</tr>';
	while($row = $result->fetch_assoc())
	{
		if($did == $row['did'])
		{
			echo '<tr>';
			echo '<td>' . $row['brand'] . '</td>';
			echo '<td>' . $row['model'].'</td>';
			echo '<td>' . $row['fid'].'</td>';
			echo '<td>' . $row['dcost'].'</td>';
			echo '</tr>';
		}
	}
	echo '</table>';
	echo '<p align="left"><a href="Dlogin3.php">back</a></>';
	echo '</body>';
}
else
if($_POST['choice']=="update")
{
	mysqli_close($conn);
	header('Location: Dupdate.php');
}
else
if($_POST['choice']=="ready")
{
	mysqli_close($conn);
	header('Location: Dready.php');
}
else	//if($_POST['choice']=="delete")
{
	mysqli_close($conn);
	header('Location: Ddelete.php');
}
// Close connection
mysqli_close($conn);
?>