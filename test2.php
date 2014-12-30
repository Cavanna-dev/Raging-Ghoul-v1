<?php
$json = file_get_contents('http://local.rg-guild.eu/test.php');
$obj = json_decode($json);

echo $obj->test;
?>
