<?php
include("cnn.php");

$id = $_REQUEST["pageid"];
$action = $_REQUEST["action"];
$pagetitle = $_REQUEST["pagetitle"];
$pagedescription = $_REQUEST["pagedescription"];
$pagedescription = stripslashes($pagedescription);
$pagedescription = mysql_real_escape_string($pagedescription);
$pagelink = $_REQUEST["pagelink"];
$pagelink = mysql_real_escape_string($pagelink);
$wlang = $_REQUEST["wlang"];
$price1 = $_REQUEST["price1"];
$price2 = $_REQUEST["price2"];
$price3 = $_REQUEST["price3"];
$price4 = $_REQUEST["price4"];
$onsale = $_REQUEST["onsale"];
$code = $_REQUEST["code"];
$start = $_REQUEST["start"];
$end = $_REQUEST["end"];
$duration = $_REQUEST["duration"];
$locations = $_REQUEST["locations"];
$lowest = $_REQUEST["lowest"];

$linktitle=strtr($pagetitle,"()!$'?: ,&+-/.¥µְֱֲֳִֵֶַָֹÊֻּֽ־ֿ׀ׁׂ׃װױײ״ÙÚÛÜÝßאבגדהוזחטיךכלםמןנסעףפץצרשתûü‎ÿ",
     "--------------SOZsozYYuAAAAAAACEEEEIIIIDNOOOOOOUUUUYsaaaaaaaceeeeiiiionoooooouuuuyy");
	 
if(isset($_REQUEST["pagehigh"])){
	$pagehigh = $_REQUEST["pagehigh"];}
else{
	$pagehigh = "off";}

if(isset($_REQUEST["active"])){
	$active = $_REQUEST["active"];}
else{
	$active = "off";}
	
$pagemenuid = $_REQUEST["pagemenuid"];

if($action == "insert"){
	$query = "INSERT INTO mxm_works ".
	@"(title, description, link, high, menu, wlang, linktitle, price1, price2, price3, price4, onsale, code, start, end, duration, locations, lowest, active) VALUES ".
	@"('".$pagetitle."', '".$pagedescription."', '".$pagelink."', '".$pagehigh."', ".$pagemenuid.", '".$wlang."', '" . $linktitle . "', ".
	@"".$price1.", ".$price2.", ".$price3.", ".$price4.", ".$onsale.", '".$code."', '".$start."', '".$end."', '".$duration."', ".
	@"'".$locations."', ".$lowest.", '".$active."')";

	mysql_query($query);
}

if($action == "edit"){
	$query = "UPDATE mxm_works SET title='".$pagetitle."', description='".$pagedescription."', ".
	@"link='".$pagelink."', high='".$pagehigh."', menu=".$pagemenuid.", wlang='".$wlang."', linktitle='" . $linktitle . "', ".
	@"price1=".$price1.", price2=".$price2.", price3=".$price3.", price4=".$price4.", onsale=".$onsale.", ".
	@"code='".$code."', start='".$start."', end='".$end."', duration='".$duration."', ".
	@"locations='".$locations."', lowest=".$lowest.", active='".$active."' WHERE id=" . $id;
	mysql_query($query);
}

if($action == "delete"){
	mysql_query("DELETE FROM mxm_works WHERE id=" . $id);
}

$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'page.php';
header("Location: http://$host$uri/page_edit.php?action=edit&id=".$id);
//header("Location: http://portugalwestzone.com/cms/page.php");
?>