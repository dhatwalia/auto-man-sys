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
$cid = $_SESSION['cid'];
$vid = $_POST['vid'];

// Create connection
$conn = mysqli_connect($servername,$username,$password,$dbname);
if($conn === false)
    die("ERROR: Could not connect. " . mysqli_connect_error());

// Query
$done = mysqli_query($conn,"delete from Orders where vid='$vid' and statuss is NULL;");
if($done)
	echo '<p>Order ' .$vid. ' has been deleted</><br>';
else
	echo '<p>You could not delete the order ' .$vid. '</><br>';

// Close connection
mysqli_close($conn);
?>

<html>
<body>
<a href="Clogin3.php">back</a>
</body>
</html>
