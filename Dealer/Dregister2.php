<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";

$did = $_POST['did'];
$brand = $_POST['brand'];
$model = $_POST['model'];
$dcost = $_POST['dcost'];
$downer = $_POST['downer'];
$dloca = $_POST['dloca'];
$dpasswords = $_POST['dpasswords'];

session_start();
$_SESSION["did"] = $did;
$_SESSION["downer"]=$downer;
$_SESSION["brand"]=$brand;
$_SESSION["model"]=$model;

// Create connection
$conn = mysqli_connect($servername,$username,$password,$dbname);
if($conn === false)
    die("ERROR: Could not connect. " . mysqli_connect_error());

// Query 1
$sql = "SELECT did,model,dpasswords from Dealer";
$result = $conn->query($sql);
$flag=0;
while($row = $result->fetch_assoc())		
{
	if($did == $row['did'] && $model == $row['model'])
	{
		echo "This Dealer I.D. is already in use!";
		$flag=1;
		echo "	<html>
			<body>
			<p>Click on image to go back home</>
			<p align='center'><a href='Dmain.html'>
			<img src='images/AstonMartin.jpg' style='width:800px;height:375px;border:0'>
			</p>
			</body>
			</html>";
		break;
	}
}
if($flag == 0)
{
	// Query 2
	$sql = "select fid,fowner,floca from Factory where brand='$brand' and model='$model' order by floca";
	$result = mysqli_query($conn, $sql);

	if ($result->num_rows > 0) 
	{	
		$stmt = $conn->prepare("insert into Dealer values(?,?,?,?,?,?,NULL,?)");
		$stmt->bind_param("sssssss",$did,$brand,$model,$dcost,$downer,$dloca,$dpasswords);
		$stmt->execute();

		echo "	<head>
			<h1 align='center'>Choose a factory</h1>
			</head>";

		echo "<table border='0' align='center' width='70%'>
		<tr>
		<td><b> Factory I.D. </b></td>
		<td><b> Owner name </b></td>
		<td><b> Location </b></td>
		</tr>";
 
		while($row = mysqli_fetch_assoc($result))
  		{
  			echo "<tr>";
	  		echo "<td>" . $row['fid'] . "</td>";
  			echo "<td>" . $row['fowner'] . "</td>";
  			echo "<td>" . $row['floca'] . "</td>";
  			echo "</tr>";
  		}
		echo "</table><br></div>";

		echo "	<body>
			<form method='POST' action='Dregister3.php'>
			<table border='0' align='center'>

			<tr><td>Factory I.D.</td><td align='left'>
			<input type=text' name='fid' size='50' maxlength='6' /></td></tr>

			<tr><td colspan='2' align='center'>
			<input type='submit' name='submit' value='Submit'></tr>
			</table>
			</form>
			</body>";

		$stmt->close();

	}
	else
	{
		echo "<p>Sorry, we don't have a factory for ".$brand." ".$model."<br></>";
		session_destroy();
	}
}

// Close connection
mysqli_close($conn);
?>
