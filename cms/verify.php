<?php
session_start();
$dologin = "false";
include("cnn.php");
if(isset($_GET["dologin"])) $dologin = $_GET["dologin"];

if($dologin == "true"){
	$login = $_GET["login"];
	$pass = $_GET["pass"];

	$q = "SELECT * FROM mxm_admin WHERE login='" . $login . "' and pass='" . $pass . "'";
	$query = mysql_query($q);
	while($log = mysql_fetch_array($query)){
		$dblogin = $log["login"];
		$dbpass = $log["pass"];
		$dbname = $log["name"];
		$dbid = $log["id"];
	}
	
	if($dblogin == $login){
	
		setcookie("login", $dblogin, time()+3600);
		setcookie("pass", $dbpass, time()+3600);
		setcookie("name", $dbname, time()+3600);
		setcookie("id", $dbid, time()+3600);
		header("location:dashboard.php");
	}
}
if(empty($_COOKIE["login"])){
	header("location:login.php");
	exit;
}
?>