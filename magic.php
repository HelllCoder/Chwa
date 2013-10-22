<?php
if (!($_SESSION))
{
	header("location: index.php");
}
else
{

	$d = ($_SESSION["magic"]*2);
	if ($_SESSION["coins"]+1>$d) 
	{
			$o =($_SESSION["magic"]*2);
		$_SESSION["magic"] = ($_SESSION["magic"]+ 1);
		$magic = $_SESSION["magic"];
		$coins = ($_SESSION["coins"]-$o);
		require "db.php";
		$sqls = "update uzivatele set coins = '$coins' where id = " . (int)$_SESSION["UserId"];
		$query = mysql_query($sqls);
		$sql = "update uzivatele set magic = '$magic' where id = " . (int)$_SESSION["UserId"];
		$query = mysql_query($sql);
		header("location:http://character-wars.tode.cz/game.php?page=charakter");
	}
	else 
	{
		header("location:http://character-wars.tode.cz/game.php?Alert=8");
	}
	
	// V prípade presunu stránky - zmeniť linky
}