<?php
if (!($_SESSION))
{
	header("location: index.php");
}
else
{?>

<h1> Nová zpráva </h1>
<form action="posli.php" method="post" id = "posta">
  <input type="hidden" name="sent" value=""/>
	<input class = "polePosty" title = "Kdo obdrží tuto správu" type = "text" name = "prijemce" maxlength = "32" placeholder = "Příjemce" required/> 
    <input class = "polePosty" title = "Čeho se zpráva týká" type="text" name="predmet" maxlength="32" placeholder = "Předmět" required/>
	<textarea class = "polePosty" title = "Text - tělo vaší správy" rows = "10" cols = "50" name = "text" placeholder = "Text správy" required></textarea> 
  <input title = "Odeslat správu" type = "submit" name = "send" value="Odeslat zprávu"/>
</form>
<? } ?>