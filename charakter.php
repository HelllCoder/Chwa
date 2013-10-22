<?php
if (!($_SESSION))
{
	header("location: index.php");
}
else
{
	$cenasila = ceil($_SESSION["sila"] + sqrt(floatval(pow($_SESSION["sila"], 3.5))));
	$cenashield = ceil($_SESSION["shield"] + sqrt(floatval(pow($_SESSION["shield"], 3.5))));
	$cenamagic = ceil($_SESSION["magic"] + sqrt(floatval(pow($_SESSION["magic"], 3.5))));
?>
	<section>
		<div style = "float: left; margin-left: -20px;">
			<h1>Charakter - <span id = 'characterName'> <? echo $_SESSION["login"]; ?></span></h1>
		
			<!-- Ukazovateľ a zlepšovač sily -->
			<span class = 'currentStat' ><img title = 'Síla' src='/img/sword.png'/>
			<? echo $_SESSION["sila"]; ?> </span>
			<a title = 'Zlepšit sílu' href='/index.php?page=sila'>  <img class = "plusImage" src='/img/plus.png' /></a>
			<? echo " (".$cenasila.")"; ?> <br>
		
			<!-- Ukazovateľ a zlepšovač obrany -->	
			<span class = 'currentStat' ><img title = 'Obrana' src='/img/shield.png' />
			<? echo $_SESSION["shield"]; ?></span>
			<a title = 'Zlepšit obranu' href='/index.php?page=shield'>  <img class = "plusImage" src='/img/plus.png' /></a>
			<? echo "  (".$cenashield.")"; ?><br>
		
			<!-- Ukazovateľ a zlepšovač magie -->	
			<span class = 'currentStat' ><img title = 'Magie' src='/img/magic.png' />
			<? echo $_SESSION["magic"]; ?> </span>
			<a title = 'Zlepšit magii' href='/index.php?page=magic'>  <img class = "plusImage" src='/img/plus.png' /></a>
			<? echo "  (".$cenamagic.")"; ?> <br>
		</div>
		<div style = "float: right; margin-left: 20px; width: 150px; height: 230px; border-image: url('img/frame.png') 30 30 round; border: 10px solid transparent;"> </div>
	</section>
		

<?
if ($_SESSION['zvire']){
	$cenasila = ($_SESSION["silam"]*2);
	$cenashield = ($_SESSION["shieldm"]*2);
	$cenamagic = ($_SESSION["magicm"]*2);
?>
	<h1>Mascot - <span id = 'characterName'> <? echo $_SESSION["zvire"]; ?> </span></h1>

	<!-- Ukazovateľ a zlepšovač sily -->
	<span class = 'currentStat' ><img title = 'Síla' src='/img/sword.png'/>
	<? echo $_SESSION["silam"]."";
		if ($_SESSION["zvire"] == "Vlk") {
			echo " (x2) ";
		}
	?>
	</span>
	<a title = 'Zlepšit sílu' href='/silam.php'>  <img class = "plusImage" src='/img/plus.png' /></a>
	<? echo $cenasila; ?> <br>

	<!-- Ukazovateľ a zlepšovač obrany -->	
	<span class = 'currentStat' ><img title = 'Obrana' src='/img/shield.png' />
	<? echo $_SESSION["shieldm"]; ?> </span>
	<a title = 'Zlepšit obranu' href='/shieldm.php'>  <img class = "plusImage" src='/img/plus.png' /></a>
	<? echo $cenashield; ?> <br>

	<!-- Ukazovateľ a zlepšovač magie -->	
	<span class = 'currentStat' ><img title = 'Magie' src='/img/magic.png' />
	<? echo $_SESSION["magicm"]; ?> </span>
	<a title = 'Zlepšit magii' href='/magicm.php'>  <img class = "plusImage" src='/img/plus.png' /></a>
	<? echo $cenamagic; ?> <br>
<? } else { ?>

	<h1>Mascot - <span class = 'noneValue'> žiadny </span></h1>

<?
    }
}
?>
