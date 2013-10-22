<?php
session_start();
require_once "db.php";
$upravene = "";
$query1 = mysql_query("UPDATE `uzivatele` SET `skupina`='".$upravene."' WHERE `id`='".$_SESSION['UserId']."'");

 header("location : /game.php?page=skupina");
