<html>
<head>
<h2 align="center">Choose a dealer</h2>
<style>
	table
	{
		border-style:solid;
		border-width:1px;
	}
</style>
</head>
<body style="background-color:LightSkyBlue;">

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";

session_start();
$cid = $_SESSION['cid'];
$brand = $_POST['brand'];
$model = $_POST['model'];
$color = $_POST['color'];
$cylinder = $_POST['cylinder'];
if($_POST['choice']=="automatic")
{
	$transmission = "Automatic";	
}
else
if($_POST['choice']=="manual")
{
	$transmission = "Manual";
}

$_SESSION["brand"] = $brand;
$_SESSION["model"] = $model;

// Create connection
$conn = mysqli_connect($servername,$username,$password,$dbname);
if($conn === false)
    die("ERROR: Could not connect. " . mysqli_connect_error());

// Query
$sql = "insert into Vehicle(brand,model,color,cylinder,transmission) values ('$brand','$model','$color','$cylinder','$transmission')";
$result = mysqli_query($conn, $sql);

$vid = mysqli_insert_id($conn);
$_SESSION["vid"] = $vid;

mysqli_query($conn,"update Orders set cid='$cid' where vid='$vid'");

echo 'Placing order as '.$cid;

$sql = "select did,downer,dloca,dcost from Dealer where brand='$brand' and model='$model' order by dloca";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) 
{
	echo "<table border='0' align='center' width='70%'>
	<tr>
	<td><b> Dealer I.D. </b></td>
	<td><b> Owner name </b></td>
	<td><b> Location </b></td>
	<td><b> Cost </b></td>
	</tr>";
 
	while($row = mysqli_fetch_assoc($result))
  	{
  		echo "<tr>";
  		echo "<td>" . $row['did'] . "</td>";
  		echo "<td>" . $row['downer'] . "</td>";
  		echo "<td>" . $row['dloca'] . "</td>";
		echo "<td>" . $row['dcost'] . "</td>";
  		echo "</tr>";
  	}
	echo "</table><br></div>";
}
else
	echo "<p>Sorry, we don't have a dealer for ".$brand." ".$model."<br></>";

// Close connection
mysqli_close($conn);
?>

<form method="POST" action="Corder3.php">
<table border="0" align="center" width="50%">	

	<tr><td>Dealer ID</td><td align="left">
	<input type="text" name="did" size="20" maxlength="10" /></td></tr>

	<tr><td>Deadline</td><td align="left">
	<input type="date" name="deadline"/></td></tr>

	<tr><td colspan="2" align="center">
	<input type="submit" name="submit" value="Submit">
	<input type="reset" value="Reset"></tr>
</table>
</form>
</body>
</html>
