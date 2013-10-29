<?php        
session_start();
$logoutUrl=$_SESSION['logout'];
$user='';
$userdata='';
session_destroy();
header("Location: index.php")
?>
