<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
session_start();
$_SESSION['logout'];
var_dump($_SESSION['userdata']);
echo '<a href="'.$_SESSION['logout'].'">logout</a>'."<br>";
?>
