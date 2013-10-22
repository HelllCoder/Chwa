<?php
if(!($_SESSION))
{
	header("location: index.php");
}
else
{
	echo "<p class = 'userStatInfo'>Tvá současná práce : <strong>".$_SESSION['prace']."</strong></p>";
?>
<fieldset>
<h2> Zlodějství a kriminálnictví </h2>
<br>
<p> Kapsář </p>
	<p> Požadavky :  </p>
<p> Výdělek : 4 mincí / den </p>
	 <form action="game.php?page=kapsar" method="post">
		<input type="submit" name="send" title = "Vzít práci" value= "Vzít práci" />
</form>
 	<p> Vykradač </p>
	<p> Požadavky : Páčidlo </p>
	<p> Výdělek : 12 mincí / den </p>
<form action="game.php?page=vykradac" method="post">
		<input type="submit" name="send" title = "Vzít práci" value= "Vzít práci" />
</form>
	 	<p> Podvodník </p>
	<p> Požadavky : Falešné zboží </p>
	<p> Výdělek : 21 mincí / den </p>
<form action="game.php?page=podvodnik" method="post">
		<input type="submit" name="send" title = "Vzít práci" value= "Vzít práci" />
</form>
	 	<p> Vrah </p>
	<p> Požadavky : Nůž </p>
	<p> Výdělek : 27 mincí / den </p>
<form action="game.php?page=vrah" method="post">
		<input type="submit" name="send" title = "Vzít práci" value= "Vzít práci" />
</form>
	
</fieldset>
<fieldset>
<h2> Obchodnictví </h2>
</fieldset>
<? } ?>
