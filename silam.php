<?php
session_start;
if (!($_SESSION))
{
}
else
{

	$d = ($_SESSION["silam"]*2);
	if (($_SESSION["coins"]+1)>$d) {
		$o =($_SESSION["silam"]*2);
		$_SESSION["silam"] = ($_SESSION["silam"]+ 1);
		$silam = $_SESSION["silam"];
		$coins = ($_SESSION["coins"]-$o);
		require "db.php";
		$sqls = "update uzivatele set coins = '$coins' where id = " . (int)$_SESSION["UserId"];
		$query = mysql_query($sqls);
		$sql = "update uzivatele set silam = '$silam' where id = " . (int)$_SESSION["UserId"];
		$query = mysql_query($sql);
		header("location:http://character-wars.tode.cz/game.php?page=charakter");
	}
		header("location:http://character-wars.tode.cz/game.php?Alert=8");
	
	// V prípade presunu stránky - zmeniť linky
	
}