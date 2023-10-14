<?php
session_start();
$did = $_SESSION['did'];
echo 'Logout from '.$did.' successful!';
session_destroy();
?>

<html>
<body>
<p>We hope to see you again</>
<p>Click on image to go back home</>
<p align="center"><a href="Dmain.html"><img src="images/AstonMartin.jpg" style="width:800px;height:375px;border:0"></p>
</body>
</html>