<?php
//session_start();
/*$link = mysql_connect('localhost', 'mxm', '123');
if (!$link) {
    die('Impossivel ligar á base de dados MxM: ' . mysql_error());
}
$db_selected = mysql_select_db('mxm', $link);
if (!$db_selected) {
    die ('Can\'t use foo : ' . mysql_error());
}*/

$link = mysql_connect('localhost', 'portugal_mxm', '@12345');
if (!$link) {
    die('Impossivel ligar á base de dados MxM: ' . mysql_error());
}
$db_selected = mysql_select_db('portugal_mxm', $link);
if (!$db_selected) {
    die ('Can\'t use foo : ' . mysql_error());
}
?>
