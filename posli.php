<?php
session_start();
require_once("db.php");
$sql = mysql_query("INSERT INTO `zpravy` (`id`, `prijemce`,`odesilatel`,`text`,`predmet`,`datum` ) VALUES (NULL,'".$_POST['prijemce']."','".$_SESSION["login"]."','".$_POST['text']."','".$_POST['text']."',NOW())") or die(mysql_error());
header("location: http://character-wars.tode.cz/game.php?page=posta");
?>
