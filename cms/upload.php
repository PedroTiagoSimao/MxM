<?php
if(isset($_POST['upload']) && $_FILES['userfile']['size'] > 0)
{
	$fileName = $_FILES['userfile']['name'];
	$tmpName  = $_FILES['userfile']['tmp_name'];
	$fileSize = $_FILES['userfile']['size'];
	$fileType = $_FILES['userfile']['type'];

	$fp      = fopen($tmpName, 'r');
	$content = fread($fp, filesize($tmpName));
	$content = addslashes($content);
	fclose($fp);

	if(!get_magic_quotes_gpc())
	{
		$fileName = addslashes($fileName);
	}

	$query = "INSERT INTO upload (name, size, type, content , artigoid) ".
	"VALUES ('$fileName', '$fileSize', '$fileType', '$content', '$id')";

	mysql_query($query) or die('Error, query failed');

	echo "<br>File $fileName uploaded<br>";
}
?>

<form method="post" enctype="multipart/form-data">
<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
<p><input name="userfile" type="file" id="userfile"></p>
<p><input name="upload" type="submit" class="box" id="upload" value=" Carregar "></p>
</form>
