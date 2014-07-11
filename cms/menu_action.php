<?php
include("cnn.php");

$id = $_REQUEST["menuid"];
$action = $_REQUEST["action"];
$menuname = $_REQUEST["menuname"];
$lingua = $_REQUEST["lingua"];
$ordem = $_REQUEST["ordem"];

if($action == "delete")
{
	mysql_query("DELETE FROM mxm_menus WHERE id=" . $id);
}

if($action == "insert")
{
	mysql_query("INSERT INTO mxm_menus (menuname, mlang, ordem) VALUES ('" . $menuname . "', '" . $lingua . "', '".$ordem."')");
}

if($action == "edit")
{
	mysql_query("UPDATE mxm_menus SET menuname='" . $menuname . "', mlang='" . $lingua . "', ordem='".$ordem."' WHERE id=" . $id);
}

$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = "menu_list.php";
header("Location: http://$host$uri/$extra");
?>