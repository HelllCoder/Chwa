<?php
if (!($_SESSION))
{ ?>
<h1>Registrace</h1>
<form action="reg_zpracuj.php" method="post">
	<input type="hidden" name="sent" value=""/>
	<input class = "regField" type="text" name="jmeno" maxlength="32" placeholder = "Uživatelské jméno" required/> <span class = "questionMark" title = "Vaše užívateľské meno/prezývka, pod ktorou budete vystupovať v hre"> ? </span> <br />
	<input class = "regField" type="email" name="mail" value="" maxlength="64" placeholder = "Email" required/> <span class = "questionMark" title = "Vaša e-mailová adresa. Môže vám prísť vhod v prípade, že by ste zabudli heslo k svojmu účtu, alebo vám ho niekto úhadol. Prostredníctvom nej budete môcť svoj účet získať späť."  > ? </span> <br />
	<input class = "regField" type="password" name="heslo1" maxlength="32" placeholder = "Heslo" required/> <span class = "questionMark" title = "Vaše uživateľské heslo, ktoré by malo brániť prístup iných na váš účet. Zvoľte si čo najdlhšie heslo."> ? </span> <br />
	<input class = "regField" type="password" name="heslo2" maxlength="32" placeholder = "Heslo znovu" required/> <span class = "questionMark" title = "Znova zadajte svoje heslo. Ak by ste sa náhodou pri písaní hesla prvý krát pomýlili, toto vám pomôže predísť problémom s prístupom do vášho účtu. "> ? </span> <br />
		<br>
	<select id = "kingdomField" name="ovoce"> 
		<option value = "Odeon">Království Odeon</option>
		<option value = "Self">Království Self</option>
		<option value = "Hama">Království Hama</option>
		<option value = "Gandhi">Království Gandhi</option>
		<option value = "Lamhun">Království Lamhun</option>
	</select>
	<br>
	<label for = "checkPodminky">Souhlasím s <a href="other.php?page=podminky">podmínky</a></label>
	<input id = "checkPodminky" type="checkbox" name="podminky" checked><br>
	<input type="submit" name="send" title = "Registruj" value="Registruj"/>
</form>
<?
}
else
{
	header("location: index.php");
}
?>