<?php
include_once "cnn.php";
$artigoid = $_REQUEST["artigoid"];
$action = $_REQUEST["action"];

if($action == "Delete"){
	$query = "DELETE FROM upload WHERE artigoid=".$artigoid;
	mysql_query($query) or die('Erro ao eliminar registo');
}
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'page.php';
header("Location: http://$host$uri/page_edit.php?action=edit&id=".$artigoid);
?>
