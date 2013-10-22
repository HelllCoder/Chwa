<?php
session_start();
require_once("db.php");
$sql = mysql_query("INSERT INTO `skupiny` (`nazev`,`velitel`) VALUES ('".$_POST['nazev']."','".$_SESSION['login']."')") or die(mysql_error());
 $query1 = mysql_query("UPDATE `uzivatele` SET `skupina`='".$_POST['nazev']."' WHERE `jmeno`='".$_SESSION['login']."'");
$_SESSION['skupina'] = $_POST['nazev'];
header("location : /game.php?page=skupina");
