<?php
session_start();
$d = ($_SESSION["shieldm"]*2);
if (($_SESSION["coins"]+1)>$d) {
	$o =($_SESSION["shieldm"]*2);
	$_SESSION["shieldm"] = ($_SESSION["shieldm"]+ 1);
	$sila = $_SESSION["shieldm"];
	$coins = ($_SESSION["coins"]-$o);
	require "db.php";
	$sqls = "update uzivatele set coins = '$coins' where id = " . (int)$_SESSION["UserId"];
	$query = mysql_query($sqls);
	$sql = "update uzivatele set shieldm = '$sila' where id = " . (int)$_SESSION["UserId"];
	$query = mysql_query($sql);
	header("location:http://character-wars.tode.cz/game.php?page=charakter");
} else {
	header("location:http://character-wars.tode.cz/game.php?Alert=8");}
