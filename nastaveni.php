<?php
if (!($_SESSION))
{
	header("location: index.php");
}
else
{
?>

<h1> Nastavení účtu </h1>

<fieldset> 
	<legend> Změna hesla </legend>
	<form action="game.php?page=zmen_heslo" method="post">
  		<input type="hidden" name="sent" value=""/>
    	<input type="password" name="old" maxlength="32" placeholder = "Staré heslo"/> <br/>
    	<input type="password" name="new" maxlength="32" placeholder = "Nové heslo"/> <br/>
		<input type="submit" name="send" title = "Zmeň heslo" value="Změň heslo"/>
	</form>
</fieldset>
<br>
<fieldset>
	<legend> Zmena e-malu </legend>
	<form action="game.php?page=zmen_adresu" method="post">
  		<input type="hidden" name="sent" value=""/>
    	<input type="text" name="oldm" maxlength="32" placeholder = "Starý email"/> <br/>
		<input type="text" name="newm" maxlength="32" placeholder = "Nový email"/> <br/>
		<input type="submit" name="send" title = "Zmeň e-mailovú adresu" value = "Změň e-mailovou adresu"/>
	</form>
</fieldset>
<? } ?>