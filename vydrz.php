<?php
	require_once "db.php";
	
	/*$query = mysql_query("SELECT * FROM `uzivatele` ORDER BY `slava` DESC ");
																				   
	while($Vysledek = mysql_fetch_array($query))
	{
		$sql = mysql_query("SELECT * from `uzivatele` where `id` = '" . $Vysledek["id"] . " '");
		
		while($l = mysql_fetch_assoc($query))
		{
			$a = mysql_query("UPDATE `uzivatele` SET `bojovani` = '" . $l["vydrz"] . "' ");
		}
	}*/

	// OPRAVENÉ -----------------------------------------------------------------------------

	$query = mysql_query("SELECT * FROM `uzivatele` ORDER BY `id` ASC ");
																				   
	while($Vysledek = mysql_fetch_array($query))
	{
		$a = mysql_query("UPDATE `uzivatele` SET `bojiste` = '" . $Vysledek["vydrz"] . "' ");
	}
 ?>