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
$fid = $_SESSION['fid'];
$vid = $_POST['vid'];
$statuss = $_POST['statuss'];

// Create connection
$conn = mysqli_connect($servername,$username,$password,$dbname);
if($conn === false)
    die("ERROR: Could not connect. " . mysqli_connect_error());

// Query
$done = mysqli_query($conn,"update Orders set statuss='$statuss' where vid='$vid' ");
if($done)
	echo '<p>The vehicle ' .$vid. ' now has the status- '.$statuss. '</><br>';
else
    	echo "<p>Couldn't update statuss. Remember your VID <br></>" . $conn->error;

// Close connection
mysqli_close($conn);
?>

<html>
<body>
<a href="Flogin3.php">back</a>
</body>
</html>
