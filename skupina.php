<?php
session_start();
if (!($_SESSION))
{
	header("location: index.php");
}
else
{
	require_once("db.php");
	$sql = mysql_query("SELECT * from uzivatele where id = '".$_SESSION['UserId']."'");
	$Vysledek = mysql_fetch_array($sql);
	if ($Vysledek['skupina'] == ""){ ?>
	<a>Nejsi v žádné skupině. Skupinu si můžeš založit nebo požádat existující skupinu o členství.</a>
	<h3> Založit skupinu </h3>
	<form action="zalozskupinu.php" method="post">
	  <input type="hidden" name="sent" value=""/>  
	<input class = "polePosty" title = "Název nové skupiny" type="text" name="nazev" maxlength="32" placeholder = "Název" required/>
	  <input title = "Založit vlastní skupinu" type = "submit" name = "send" value="Založit skupinu"/>
	</form>
	<? } else {
	$sqls = mysql_query("SELECT * from skupiny where nazev = '".$Vysledek['skupina']."'");
	$Vysledeks = mysql_fetch_array($sqls);
	?>
	<a title = "Zobrazit seznam členů" class = "chwaTlacitko" href='game.php?page=sclenove'>Členové</a>
	<a title = "Jmenovat diplomata skupiny" class = "chwaTlacitko" href='game.php?page=jmend'>Jmenovat diplomata</a>
	<a title = "Jmenovat správce financí skupiny" class = "chwaTlacitko" href='game.php?page=sclenove'>Jmenovat Správce financí</a>
	<a title = "Opustit tuto skupinu" class = "chwaTlacitko" href='game.php?page=opustskupinu'>Opustit skupinu</a>
	<h2><? echo "".$Vysledek['skupina'].""; ?></h2>
	<fieldset>
	<p class = "menoHodnosti"> Velitel </p> 
	<p id = "menoVelitela"><? echo $Vysledeks['velitel']; ?></p>
	</fieldset>
	
	<br>
	
	<fieldset>
	<div id = "leftColumn">
		<p class = "menoHodnosti"> Diplomat 
	<? echo $Vysledeks['diplomat']; ?> </p>
		</div>
	<div id = "middleColumn">	
		<p class = "menoHodnosti"> Správce financí </p>
		</div>
		
	<div id = "rightColumn">
		<p class = "menoHodnosti"> Správce sídla </p>
		</div>
		
	<br>
	<br>
	</fieldset>
<?
	}
}
?>
