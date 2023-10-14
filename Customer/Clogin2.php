<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";

$cid = $_POST['cid'];
$passwords = $_POST['passwords'];

// Create connection
$conn = mysqli_connect($servername,$username,$password,$dbname);
if($conn === false)
    die("ERROR: Could not connect. " . mysqli_connect_error());

// Query
$sql = "select cid,passwords from Customer;";
$result = $conn->query($sql);

for($i=0;$i<100;$i++)
{
	$row = $result->fetch_assoc();
	if($row["cid"] == $cid && $row["passwords"] == $passwords)
	{
		session_start();
		$_SESSION["cid"] = $cid;

		// Close connection
		mysqli_close($conn);
			
		header('Location: Clogin3.php');		
	}
}
// Close connection
mysqli_close($conn);
?>

<html>
<body>
<p>Login failed!</>
<p>Click on image to go back home</>
<p align="center"><a href="Cmain.html"><img src="images/McLaren.jpg" style="width:800px;height:375px;border:0"></p>
</body>
</html>

