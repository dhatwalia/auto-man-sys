<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";

$fid = $_POST['fid'];
$brand = $_POST['brand'];
$model = $_POST['model'];
$fowner = $_POST['fowner'];
$floca = $_POST['floca'];
$fpasswords = $_POST['fpasswords'];

// Create connection
$conn = mysqli_connect($servername,$username,$password,$dbname);
if($conn === false)
    die("ERROR: Could not connect. " . mysqli_connect_error());

//Query
$sql = "SELECT fid from Factory";
$result = $conn->query($sql);
$flag=0;
while($row = $result->fetch_assoc())		
{
	if($fid == $row['fid'])
	{
		echo "This Factory I.D. is already in use!";
		$flag=1;
		break;
	}
}
if($flag == 0)
{
	$stmt = $conn->prepare("insert into Factory values(?,?,?,?,?,?)");
	$stmt->bind_param("ssssss",$fid,$brand,$model,$fowner,$floca,$fpasswords);
	$stmt->execute();
	$stmt->close();
	echo $fname.", you're now registered as ".$fid."\n";
}

// Close connection
mysqli_close($conn);
?>

<html>
<body>
<p>Click on image to go back home</>
<p align="center"><a href="Fmain.html">
<img src="images/Ariel.png" style="width:575px;height:375px;border:0">
</p>
</body>
</html>
