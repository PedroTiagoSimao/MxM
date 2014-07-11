<?php
include("cnn.php");

$mailquery = mysql_query("SELECT * FROM mxm_mails");
$fp = fopen('maillist.csv', 'w');
while($mail = mysql_fetch_array($mailquery)){
    fputcsv($fp, $mail);
}
fclose($fp);

sleep(10);
header('Content-Disposition: attachment; filename="maillist.csv"');
?>