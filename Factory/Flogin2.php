<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";

$fid = $_POST['fid'];
$fpasswords = $_POST['fpasswords'];

// Create connection
$conn = mysqli_connect($servername,$username,$password,$dbname);
if($conn === false)
    die("ERROR: Could not connect. " . mysqli_connect_error());

// Query
$sql = "select fid,fpasswords from Factory;";
$result = $conn->query($sql);

for($i=0;$i<100;$i++)
{
	$row = $result->fetch_assoc();
	if($row["fid"] == $fid && $row["fpasswords"] == $fpasswords)
	{
		session_start();
		$_SESSION["fid"] = $fid;

		// Close connection
		mysqli_close($conn);
			
		header('Location: Flogin3.php');		
	}
}
// Close connection
mysqli_close($conn);
?>

<html>
<body>
<p>Login failed!</>
<p>Click on image to go back home</>
<p align="center"><a href="Fmain.html"><img src="images/Ariel.png" style="width:800px;height:375px;border:0"></p>
</body>
</html>

