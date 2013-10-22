<?php
require_once "db.php";
$ide = $_SESSION["UserId"];
$query =  mysql_query("SELECT * FROM `uzivatele` WHERE `id`='".$ide."'");
$noveheslo = mysql_fetch_array($query);
$old = md5($_POST['old']);
if ($noveheslo['heslo'] == $old){
	$nove = $_POST['new'];
	$upravene = md5($nove);
  $query1 = mysql_query("UPDATE `uzivatele` SET `heslo`='".$upravene."' WHERE `id`='".$ide."'");
var_dump($query1);
} else {
	echo "Zadané heslo je špatné !";
}

?>