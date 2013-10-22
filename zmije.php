<?php
$d = "15";
if (($_SESSION["coins"]+1)>$d) {
	$_SESSION["zvire"] = "Zmije";
	$zvire = $_SESSION["zvire"];
	$coins = ($_SESSION["coins"]-$d);
	require "db.php";
	$sqls = "update uzivatele set coins = '$coins' where id = " . (int)$_SESSION["UserId"];
	$query = mysql_query($sqls);
	$sql = "update uzivatele set zvire = '$zvire' where id = " . (int)$_SESSION["UserId"];
	$query = mysql_query($sql);
	header("location:http://character-wars.tode.cz/game.php?page=charakter");
}
else
{
	header("location:http://character-wars.tode.cz/game.php?Alert=8");
}

// V prípade presunu stránky - zmeniť linky