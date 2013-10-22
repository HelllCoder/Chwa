<?php
if(!($_SESSION))
{
	header("location: index.php");
}
else
{
	$d = ($_SESSION["shield"]*2);
	if ($_SESSION["coins"]+1>$d) {
		$o =($_SESSION["shield"]*2);
		$_SESSION["shield"] = ($_SESSION["shield"]+ 1);
		$shield = $_SESSION["shield"];
		$coins = ($_SESSION["coins"]-$o);
		require "db.php";
		$sqls = "update uzivatele set coins = '$coins' where id = " . (int)$_SESSION["UserId"];
		$query = mysql_query($sqls);
		$sql = "update uzivatele set shield = '$shield' where id = " . (int)$_SESSION["UserId"];
		$query = mysql_query($sql);
		header("location:http://character-wars.tode.cz/game.php?page=charakter");
	} 
	else 
	{
		header("location:http://character-wars.tode.cz/game.php?Alert=8");
	}
	
	// V prípade presunu stránky - zmeniť linky
}
