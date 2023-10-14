<?php
session_start();
$cid = $_SESSION['cid'];
echo 'Logout from '.$cid.' successful!';
session_destroy();
?>

<html>
<body>
<p>We hope to see you again</>
<p>Click on image to go back home</>
<p align="center"><a href="Cmain.html"><img src="images/McLaren.jpg" style="width:800px;height:375px;border:0"></p>
</body>
</html>