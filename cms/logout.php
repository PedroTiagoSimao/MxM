<?php
setcookie("login", "", time()+3600);
setcookie("pass", "", time()+3600);
setcookie("name", "", time()+3600);
setcookie("id", "", time()+3600);
session_start();
session_unset();
session_destroy();
$_SESSION = array();
header("location:login.php");
?>