<?php
/*
* Pokud uživatel není přihlášený, místo obsahu se mu ukáže tato hláška.
*/
if(!($_SESSION))
{
	header("location: index.php");
}
else
{ ?>
<h1>Bojiště</h1>
<figure id = 'bojisko'>
	<img title = "bojište" alt = "naše bojište" src = 'img/arena.png'>
</figure>
<form  action='game.php?page=bojovani' method='post' id = "bojisko" >
	<input type='hidden' name='sent' value=''/>	
	<input type='text' name='jmeno' maxlength='32' placeholder = 'Meno súpera'/>
	<? if ($_SESSION["bojiste"] == 0){ ?>
	<a class = "chwaTlacitko" onclick = "document.querySelector('form#bojisko').submit()" type='submit' name='send' title = "Vyzvat k boji">Vyzvat k boji - 1  <img title = "cihla"  src = "img/goldmini.png"/></a>
	<!-- mehehe, toto nebolo bohviečo, ale účel to splnilo -->
	<? } else { ?>
	<input type='submit' name='send' title = "Vyzvat k boji" value='Vyzvat k boji' />
</form>
	
<? 
if(isset($_POST['jmeno'])){ $_SESSION["nepritel"] = $_POST["jmeno"]; } 
}?>

<fieldset>
	<a> Počet pokusů : </a> <?php echo $_SESSION["bojiste"]; ?>
</fieldset>
<? } ?>