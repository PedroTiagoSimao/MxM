<?php
include("cnn.php");

$id = "";
if(isset($_REQUEST["id"])) $id = $_REQUEST["id"];
$action = $_REQUEST["action"];
$title = $text = $categorie = $author = "";

if($action == "insert"){
	$title = $_REQUEST["blogtitle"];
	$author = $_REQUEST["blogauthor"];
	$text = $_REQUEST["blogdescription"];
	$categorie = $_REQUEST["blogcatid"];
	
	mysql_query("INSERT INTO mxm_articles (title, author, text, categorie) ".
	@"VALUES ('" . $title . "', '" . $author . "', '" . $text . "', '" . $categorie . "')");
}

if($action == "edit"){
	$title = $_REQUEST["blogtitle"];
	$author = $_REQUEST["blogauthor"];
	$text = $_REQUEST["blogdescription"];
	$categorie = $_REQUEST["blogcatid"];
	
	mysql_query("UPDATE mxm_articles SET title='" . $title . "', author='" . $author . "', ".
	@"text='" . $text . "', categorie=" . $categorie . " WHERE id=" . $id);
}

if($action == "delete"){
	mysql_query("DELETE FROM mxm_articles WHERE id=" . $id);
	mysql_query("DELETE FROM mxm_articles_comments WHERE parent=" . $id);
}

$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'blog.php';
header("Location: http://$host$uri/$extra");
?>