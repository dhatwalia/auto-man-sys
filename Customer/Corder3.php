<html>
<body style="background-color:LightSkyBlue;">

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";

session_start();
$cid = $_SESSION['cid'];
$vid = $_SESSION['vid'];
$model = $_SESSION['model'];
$did = $_POST['did'];
$deadline = $_POST['deadline'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
    die("Connection failed: " . $conn->connect_error);

// Query 2
$done = mysqli_query($conn,"CALL p1('$vid','$did','$model','$deadline')");
if($done)
	echo '<p>Congratulations! Your order has been placed.<br></>';
else
    	echo "<p>Couldn't place order. Remember your VID <br></>" . $conn->error;

// Close connection
mysqli_close($conn);
?>

<a href="Clogin3.php">finish</a>
</body>
</html>
