<?php
include_once "cnn.php";

$id = $_GET['id'];
$action = $_GET['action'];

if(!isset($id) || empty($id)){
	die("Please select your image!");
}
else{
	$query = mysql_query("SELECT * FROM upload WHERE artigoid ='".$id."'");
	$row = mysql_fetch_array($query);
	$content = $row['content'];
	header('Content-Type: image/jpeg');
	echo $content;
}

/*
	$in_filename = $content;

	list($width, $height) = getimagesize($in_filename);

	$offset_x = 0;
	$offset_y = 0;

	$new_height = $height - 15;
	$new_width = $width;

	$image = imagecreatefromjpeg($in_filename);
	$new_image = imagecreatetruecolor($new_width, $new_height);
	imagecopy($new_image, $image, 0, 0, $offset_x, $offset_y, $width, $height);

	header('Content-Type: image/jpeg');

	$content = imagejpeg($new_image);

	echo $content;
*/

?>