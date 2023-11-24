<?php
setcookie("id","",time()-60);
setcookie("pass","",time()-60);
//header("Location=login.php");
header("Location:login.php");
?>