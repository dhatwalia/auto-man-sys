<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";

$cid = $_POST['cid'];
$cname = $_POST['cname'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$passwords = $_POST['passwords'];

// Create connection
$conn = mysqli_connect($servername,$username,$password,$dbname);
if($conn === false)
    die("ERROR: Could not connect. " . mysqli_connect_error());

// Query
$sql = "SELECT cid from Customer";
$result = $conn->query($sql);
$flag=0;
while($row = $result->fetch_assoc())		
{
	if($cid == $row['cid'])
	{
		echo "This Customer I.D. is already in use!";
		$flag=1;
		break;
	}
}
if($flag == 0)
{
	$stmt = $conn->prepare("insert into Customer values(?,?,?,?,?)");
	$stmt->bind_param("sssss",$cid,$cname,$phone,$address,$passwords);
	$stmt->execute();
	$stmt->close();
	echo $cname.", you're now registered as ".$cid."\n";
}

// Close connection
mysqli_close($conn);
?>

<html>
<body>
<p>Click on image to go back home</>
<p align="center"><a href="Cmain.html">
<img src="images/McLaren.jpg" style="width:800px;height:375px;border:0">
</p>
</body>
</html>
