<?php
error_reporting(-1);
$ide = $_SESSION["UserId"];
$prace = "Kapsář";
require "db.php";
$query1 = mysql_query("UPDATE `uzivatele` SET `prace`='".$prace."' WHERE `id`='".$ide."'");
header("location : /game.php?page=mestsky_urad");