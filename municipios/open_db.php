<?php
$conn = mysql_connect("localhost", "root", "1234");
if (!$conn) {
    $log->error('Could not connect: ' . mysql_error());
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("dades_municipis", $conn) or die('Could not select jbalmes database.');
mysql_set_charset('utf8',$conn);
?>