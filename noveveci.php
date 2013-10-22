<?php
error_reporting(-1);
require_once "db.php";
$query1 = mysql_query("SELECT * FROM `uzivatele`"); 
while($Vysledek = mysql_fetch_array($query1)){
$ide1 = rand(1, 100);
$ide2 = rand(1, 100);
$ide3 = rand(1, 100);
$ide4 = rand(1, 100);
$ide5 = rand(1, 100);
$ide6 = rand(1, 100);
$query = mysql_query("UPDATE `uzivatele` SET `vec1`='$ide1', `vec2`='$ide2', `vec3`='$ide3', `vec4`='$ide4', `vec5`='$ide5', `vec6`='$ide6' WHERE `id` ='".$Vysledek["id"]."'"); var_dump($Vysledek);
if($query === false)
 echo Mysql_error(); 
}
