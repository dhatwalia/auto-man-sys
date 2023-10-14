<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";

$did = $_POST['did'];
$dpasswords = $_POST['dpasswords'];

// Create connection
$conn = mysqli_connect($servername,$username,$password,$dbname);
if($conn === false)
    die("ERROR: Could not connect. " . mysqli_connect_error());

// Query
$sql = "select did,dpasswords from Dealer;";
$result = $conn->query($sql);

for($i=0;$i<100;$i++)
{
	$row = $result->fetch_assoc();
	if($row["did"] == $did && $row["dpasswords"] == $dpasswords)
	{
		session_start();
		$_SESSION["did"] = $did;

		// Close connection
		mysqli_close($conn);
			
		header('Location: Dlogin3.php');		
	}
}
// Close connection
mysqli_close($conn);
?>

<html>
<body>
<p>Login failed!</>
<p>Click on image to go back home</>
<p align="center"><a href="Dmain.html"><img src="images/AstonMartin.jpg" style="width:800px;height:375px;border:0"></p>
</body>
</html>

