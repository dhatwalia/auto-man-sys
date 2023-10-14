<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";

session_start();
$did=$_SESSION["did"];
$downer=$_SESSION["downer"];
$brand=$_SESSION["brand"];
$model=$_SESSION["model"];

$fid = $_POST['fid'];

// Create connection
$conn = mysqli_connect($servername,$username,$password,$dbname);
if($conn === false)
    die("ERROR: Could not connect. " . mysqli_connect_error());

// Query
$stmt = $conn->prepare("update Dealer set fid=? where did=? and downer=? and brand=? and model=?;");
$stmt->bind_param("sssss",$fid,$did,$downer,$brand,$model);
$stmt->execute();

session_destroy();

// Close connection
mysqli_close($conn);
$stmt->close();

echo $downer.", you're now registered for dealing with ".$brand." ". $model ."\n"; 
?>


<html>
<body>
<p>Click on image to go back home</>
<p align="center"><a href="Dmain.html">
<img src="images/AstonMartin.jpg" style="width:800px;height:375px;border:0">
</p>
</body>
</html>
