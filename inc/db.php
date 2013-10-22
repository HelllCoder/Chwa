<?php 
 $spojeni = mysql_connect("localhost","lerainsoft","lerainsoft273" ) or die ('Spatne zadane udaje (asi heslo, server nebo jmeno.) v inc/db.php');
	mysql_select_db("czsrv" , $spojeni) or die ('Spatne zadana databaze v inc/db.php');
	mysql_query("SET NAMES utf8");
?>
