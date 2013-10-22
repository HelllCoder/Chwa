<?php
error_reporting(-1);
require_once "db.php";
$ide = "Kapsář";
  $query1 = mysql_query("UPDATE `uzivatele` SET `coins`=`coins`+10 WHERE prace='" . $ide . "'"); 
var_dump($query);
var_dump($query1);
var_dump (mysql_affected_rows());


				
