<?php
require_once "db.php";
$ide = $_SESSION["UserId"];
$query =  mysql_query("SELECT * FROM `uzivatele` WHERE `id`='".$ide."'");
$noveheslo = mysql_fetch_array($query);
$old = $_POST['oldm'];
if ($noveheslo['mail'] == $old){
	$nove = $_POST['newm'];
	$upravene = $nove;
  $query1 = mysql_query("UPDATE `uzivatele` SET `mail`='".$upravene."' WHERE `id`='".$ide."'");
var_dump($query1);
} else {
	echo "Zadané heslo je špatné !";
}

?>
