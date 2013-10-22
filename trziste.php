<nav>
<a title = 'Stánky' href='game.php?page=stanky'> Stánky </a>
</nav>
<?php
if (!($_SESSION))
{
	header("location: index.php");
}
else
{
	require "db.php";
	$idev = $_SESSION['vec1'];
	$sql = mysql_query("SELECT  `jmeno` from `veci` WHERE `id` = '".$idev."'");
	$i = mysql_fetch_array($sql);
	echo "".$i['jmeno']."";
	$idev = $_SESSION['vec2'];
	$sql = mysql_query("SELECT  `jmeno` from `veci` WHERE `id` = '".$idev."'");
	$i = mysql_fetch_array($sql);
	echo "".$i['jmeno']."";
	$idev = $_SESSION['vec3'];
	$sql = mysql_query("SELECT  `jmeno` from `veci` WHERE `id` = '".$idev."'");
	$i = mysql_fetch_array($sql);
	echo "".$i['jmeno']."";
	?>
	<br>
	<?
	$idev = $_SESSION['vec4'];
	$sql = mysql_query("SELECT  `jmeno` from `veci` WHERE `id` = '".$idev."'");
	$i = mysql_fetch_array($sql);
	echo "".$i['jmeno']."";
	$idev = $_SESSION['vec5'];
	$sql = mysql_query("SELECT  `jmeno` from `veci` WHERE `id` = '".$idev."'");
	$i = mysql_fetch_array($sql);
	echo "".$i['jmeno']."";
	$idev = $_SESSION['vec6'];
	$sql = mysql_query("SELECT  `jmeno` from `veci` WHERE `id` = '".$idev."'");
	$i = mysql_fetch_array($sql);
	echo "".$i['jmeno']."";
}