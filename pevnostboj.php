<?php
if(!($_SESSION))
{
	header("location: index.php");
	exit;
}
require_once 'inc/db.php';
if ($_SESSION['bojiste'] < "1" && $_SESSION['bricks'] < "1") {
	header("location: game.php?page=bojiste");
	exit;
}		
if(isset($_SESSION['bojiste']))
{
	if ($_SESSION['bojiste'] < "1")
	{
		$bricks = $_SESSION['bricks'];
		$bricks = $bricks - 1;
		$_SESSION['bricks'] = $bricks;
	}
	
	$nova = $_SESSION['bricks'];
	$user_id = $_SESSION['UserId'];
	$data = "UPDATE `uzivatele` set `bricks` = '$nova' where `id` = '$user_id'";
	$oss = mysql_query($data); //or die(mysql_error());
	//var_dump($_SESSION['bricks']);
}
if($_POST['jmeno'] == $_SESSION["login"]) {
	echo "<a title = \"Návrat na stránku bojiska\" href = \"game.php?page=bojiste\">Návrat</a><br><p class = 'chybovaHlaska'>Sám na seba útočiť nemôžeš</p>";
} else {
$query = mysql_query("SELECT * FROM `pevnost` WHERE `id` = '" . $_SESSION['pevnost'] . "'") or die (mysql_error());
$Vysledek = mysql_fetch_assoc($query);
if($Vysledek["sila"] == "") {
	echo "<a title = \"Návrat na stránku bojiska\" href = \"game.php?page=bojiste\">Návrat</a><br><p class = 'chybovaHlaska'>Uživatel s tímto jménem nebyl nalezen.</p>";
} else {
?>
<br>

<table id = "bojisko">
	<tr><th><span class = "lavyBojovnik"><? echo $_SESSION["login"]; ?></span></th><th><span class = "pravyBojovnik"><? echo $Vysledek["jmeno"]; ?></span></th></tr>
	<br>
	<br>
	<!-- Namiesto thoto by tu mohol byť nejaký obrázok. Možno neskôr. -->
	<tr><td><span class = "lavyBojovnik">Síla</span><? echo $_SESSION["sila"] ?></td><td><span class = "pravyBojovnik">Síla</span><? echo $Vysledek["sila"]; ?></td></tr>
	<tr><td><span class = "lavyBojovnik">Obrana</span><? echo $_SESSION["shield"] ?></td><td><span class = "pravyBojovnik">Obrana</span><? echo $Vysledek["shield"]; ?></td></tr>
	<tr><td><span class = "lavyBojovnik">Magie</span><? echo $_SESSION["magic"] ?></td><td><span class = "pravyBojovnik">Magie</span><? echo $Vysledek["magic"]; ?></td></tr>

<table id = "bojisko">
	<tr><th><span class = "lavyBojovnik"><? echo $_SESSION["zvire"]; ?></span></th><th><span class = "pravyBojovnik"><? echo $Vysledek["zvire"]; ?></span></th></tr>
	<br>
	<br>
	<!-- Namiesto thoto by tu mohol byť nejaký obrázok. Možno neskôr. -->
	<tr><td><span class = "lavyBojovnik">Síla</span><? echo $_SESSION["silam"]; if ($_SESSION["zvire"] == "Vlk") { echo " (x2) "; } ?></td><td><span class = "pravyBojovnik">Síla</span><? echo $Vysledek["silam"]; ?></td></tr>
	<tr><td><span class = "lavyBojovnik">Obrana</span><? echo $_SESSION["shieldm"]; ?></td><td><span class = "pravyBojovnik">Obrana</span><? echo $Vysledek["shieldm"]; ?></td></tr>
	<tr><td><span class = "lavyBojovnik">Magie</span><? echo $_SESSION["magicm"]; ?></td><td><span class = "pravyBojovnik">Magie</span><? echo $Vysledek["magicm"]; ?></td></tr>
<?
$vyhra = "".$Vysledek['vyhra']."";
$sila = $_SESSION["sila"];
$shield = $_SESSION["shield"];
$magic = $_SESSION["magic"];
$vyzyvatel = ($sila+$shield+$_SESSION["silam"]+$_SESSION["shieldm"]);
$nepritel = ($Vysledek["sila"]+$Vysledek["shield"]+$Vysledek["shieldm"]+$Vysledek["silam"]);
if ($vyzyvatel>$nepritel) {
	$coins = ($_SESSION["bricks"]+$vyhra);
	echo "<tr><td colspan = '2'><p class = 'vitaznaSprava'>Tento súboj sa Vám podarilo vyhrať a získali ste ".$vyhra." <img src='/img/goldmini.png'></p></td></tr>";
	$_SESSION["pevnost"] = ($_SESSION["pevnost"]+1);
$os = Mysql_query("UPDATE `uzivatele` set pevnost = '".$_SESSION["pevnost"]."' where id = '".$_SESSION["UserId"]."'") or die(mysql_error());
	$sqls = "update uzivatele set bricks = '$coins' where id = " . (int)$_SESSION["UserId"];
	    $query = mysql_query($sqls);
}
if ($nepritel>$vyzyvatel) {
	echo "<tr><td><p class = 'prehrataSprava'>Źiaľ, tento súboj sa Vám nepodarilo vyhrať.</p></td></tr>";
}
if ($nepritel==$vyzyvatel) {
	if ($_SESSION["magic"]>$Vysledek['magic']) {	
	$coins = ($_SESSION["coins"]+$vyhra);
		echo "<tr><td colspan = '2'><p class = 'vitaznaSprava'>Tento súboj sa Vám podarilo vyhrať a získali ste ".$vyhra."<img src='/img/coin2.png' /></p></td></tr>";
$_SESSION["pevnost"] = ($_SESSION["pevnost"]+1);
$os = Mysql_query("UPDATE `uzivatele` set pevnost = '".$_SESSION["pevnost"]."' where id = '".$_SESSION["UserId"]."'") or die(mysql_error());
	$sqls = "update uzivatele set coins = '$coins' where id = " . (int)$_SESSION["UserId"];
    $query = mysql_query($sqls);	
	}
	else if ($_SESSION["magic"]<$Vysledek['magic']) {
		echo "<tr><td><p class = 'prehrataSprava'>Žiaľ, tento súboj sa Vám nepodarilo vyhrať.</p></td></tr>";
		}
	else {
		echo "<tr><td colspan = '2'><p class = 'remizaSprava'>Tento súboj sa skončil totálnou remízou, obaja ste neboli schopní poraziť svojho protivníka.</p></td></tr>";
	}
	
	}
	
$_SESSION["bojiste"] = ($_SESSION["bojiste"]-1);
$os = Mysql_query("UPDATE `uzivatele` set bojiste = '".$_SESSION["bojiste"]."' where id = '".$_SESSION["UserId"]."'") or die(mysql_error());
?>
<br>
<form method="post" action = "game.php?page=charakter" >
	<tr><td><input type="submit" title = "OK" value="OK"></td></tr>
</form>
</table>
<?php
}
}
?>
