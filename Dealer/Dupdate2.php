<html>
<body style="background-color:LightSkyBlue;">
</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";

session_start();
$did = $_SESSION['did'];
$vid = $_POST['vid'];
$cost = $_POST['cost'];

// Create connection
$conn = mysqli_connect($servername,$username,$password,$dbname);
if($conn === false)
    die("ERROR: Could not connect. " . mysqli_connect_error());

// Query
$done = mysqli_query($conn,"update Vehicle set cost='$cost' where vid='$vid' ");
if($done)
	echo '<p>The new cost of vehicle ' .$vid. ' has been updated to '.$cost. '</><br>';
else
    	echo "<p>Couldn't update cost. Remember your VID <br></>" . $conn->error;

// Close connection
mysqli_close($conn);
?>

<html>
<body>
<a href="Dlogin3.php">back</a>
</body>
</html>
