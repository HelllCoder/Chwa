<?php
if(!($_SESSION))
{
	echo "<h2>Tato stránka je jen pro registrované a prihlašené uživatele.</h2>";
}
else
{

	echo "<p class = 'userStatInfo'>Tvůj současný Mascot : <strong>".$_SESSION["zvire"]."</strong></p>";
 ?>


<!-- -------------------- -->
<aside class = "maskotKupaBox">
	<h3> Zmije </h3>
	<p> Zmije je útočný mascot, který dokáže využívat jed. Jed na tři kola zmenšuje útočníkovu sílu. </p>
	<p> Cena : 15 mincí </p>
	<form action="game.php?page=zmije" method="post">
			<input type="submit" name="send" title = "Koupit zmiji" value= "Koupit" />
	</form>
</aside>

<!-- -------------------- -->

<aside class = "maskotKupaBox">
	<h3> Vlk </h3>
		<p> Vlk je útočný mascot, který dokáže využívat svoji rychlost k většímu poškození. Poškození je dvojnásobně silné než normálně. </p>
		<p> Cena : 35 mincí </p>
	<form action="game.php?page=vlk" method="post">
			<input type="submit" name="send" title = "Koupit vlka" value= "Koupit" />
	</form>
</aside>

<!-- -------------------- -->

<aside class = "maskotKupaBox">
	<h3> Medvěd </h3>
	<p> Medvěd je bránící mascot, který dokáže bránit svým obrovským tělem. Zvyšuje obranu characteru o dvojnásobek. </p>
	<p> Cena : 15 mincí </p>
	<form action="game.php?page=medved" method="post">
			<input type="submit" name="send" title = "Koupit medvěda" value= "Koupit" />
	</form>
</aside>

<? } ?>
