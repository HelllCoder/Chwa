<?php
session_start;
error_reporting(-1);
if ($_SESSION["pacidlo"] == "ano"){
$ide = $_SESSION["UserId"];
$prace = "Vykradač";
require "db.php";
$query1 = mysql_query("UPDATE `uzivatele` SET `prace`='".$prace."' WHERE `id`='".$ide."'");
}else{
echo "Pro tuto práci potřebuješ páčidlo !";
}
header("location : /game.php?page=mestsky_urad");