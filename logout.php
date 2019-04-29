<?php
session_start();
session_destroy();
setcookie("password","",time()-1);
header("Location: index.php");
?>
