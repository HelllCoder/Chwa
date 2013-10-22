<?php
if(!($_SESSION))
{
	header("location: index.php");
}
else
{
session_start();
$d = ($_SESSION["magicm"]*2);
if (($_SESSION["coins"]+1)>$d) {
	$o =($_SESSION["magicm"]*2);
	$_SESSION["magicm"] = ($_SESSION["magicm"]+ 1);
	$sila = $_SESSION["magicm"];
	$coins = ($_SESSION["coins"]-$o);
	require "db.php";
	$sqls = "update uzivatele set coins = '$coins' where id = " . (int)$_SESSION["UserId"];
	$query = mysql_query($sqls);
	$sql = "update uzivatele set magicm = '$sila' where id = " . (int)$_SESSION["UserId"];
	$query = mysql_query($sql);
	header("location:http://character-wars.tode.cz/game.php?page=charakter");
} else {
	header("location:http://character-wars.tode.cz/game.php?Alert=8");}
}
?>
