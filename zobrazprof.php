<?php
session_start();
require_once "db.php";
/*
* Pokud uživatel není přihlášený, místo obsahu se mu ukáže tato hláška.
*/
if(!($_SESSION))
 {
	header("location: index.php");
}
else
{
$sql = mysql_query("SELECT * FROM uzivatele WHERE id = " . (int)$_GET['id']);
$Vysledek = mysql_fetch_assoc($sql);
echo "<h1>Charakter - <span id = 'characterName'>" . htmlspecialchars($Vysledek["jmeno"], ENT_QUOTES) . "</span></h1>";
$_SESSION["nepr"] = $Vysledek['jmeno'];
?>
<form action="game.php?page=bojovani" method="post">
		<input type="submit" name="send" title = "Zaútočit" value= "Zaútočit" /><br/>
		<input type="hidden" name="jmeno" value="<?php echo $Vysledek['jmeno']; ?>" />
	<?php
	/* Ukazovateľ a zlepšovač sily */
	echo "<span class = 'currentStat' ><img title = 'Síla' src='/img/sword.png'/>" . $Vysledek["sila"] . "</span><br/>";
	/* Ukazovateľ a zlepšovač obrany */
	echo "<span class = 'currentStat' ><img title = 'Obrana' src='/img/shield.png' />" . $Vysledek["shield"] . "</span><br/>";
	/* Ukazovateľ a zlepšovač magie */
	echo "<span class = 'currentStat' ><img title = 'Magie' src='/img/magic.png' />" . $Vysledek["magic"] . "</span>";

	echo "<h1>Mascot - <span id = 'characterName'>" . htmlspecialchars($Vysledek["zvire"], ENT_QUOTES) . "</span></h1>";

	/* Ukazovateľ a zlepšovač sily */
	echo "<span class = 'currentStat' ><img title = 'Síla' src='/img/sword.png'/>" . $Vysledek["silam"] . "</span><br/>";
	/* Ukazovateľ a zlepšovač obrany */
	echo "<span class = 'currentStat' ><img title = 'Obrana' src='/img/shield.png' />" . $Vysledek["shieldm"] . "</span><br/>";
	/* Ukazovateľ a zlepšovač magie */
	echo "<span class = 'currentStat' ><img title = 'Magie' src='/img/magic.png' />" . $Vysledek["magicm"] . "</span><br/>";
}

