<?php
session_start();
$fid = $_SESSION['fid'];
echo 'Logout from '.$fid.' successful!';
session_destroy();
?>

<html>
<body>
<p>We hope to see you again</>
<p>Click on image to go back home</>
<p align="center"><a href="Fmain.html"><img src="images/Ariel.png" style="width:575px;height:375px;border:0"></p>
</body>
</html>