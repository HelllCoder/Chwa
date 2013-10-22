<div id="obsah">
	<br>
	<? if(!($_SESSION)) { ?>
	<div id = "utilityPanel">
		<a title = "Prihlásenie" style = "margin-left: 45px;">Prihlásenie</a><a title = "Registrace" href = "game.php?page=registrace">Registrace</a><a title = "Správa hry">Správa hry</a>
	</div>
	<div id = "logForm">
		<form action="login_zpracuj.php" method="post">
			<input type="hidden" name="sent" value="" />
			<input type="text" name="jmeno" maxlength="32" placeholder = "Jméno" />
			<input type="password" name="heslo" maxlength="32" placeholder = "Heslo"/>
			<input type="submit" name="send" title = "Přihlasit se" value="Přihlasit se"/>
			<a href="index.php?page=new_pass">Zapomenuté heslo</a>
		</form>
	</div>
	<?} else { ?>
	<div id = "utilityPanel">	
		<!-- Stav aktuálne dostupných 'surovín' pre hráča.
		Zobrazuje sa, keď je uživateľ prihlásený. -->
		<!-- Ukazovateľ zlaťákov -->
		<img title = "Zlaté mince" src="img/coin.png" class = "imageInPanel">
		<span class = "ukazovatel_surovin"> <? echo $_SESSION["coins"];?></span>
		<!-- Ukazovateľ tehličiek -->
		<img title = "Zlaté cihly" src="img/gold.png" class = "imageInPanel">
		<span class = "ukazovatel_surovin"> <? echo $_SESSION["bricks"]; ?></span>
		<a title = "Nastavení"  href = "game.php?page=nastaveni"> Nastavení </a>
		<a title = "Správa hry" nohref> Správa hry</a>
		<a title = "Odhlásit se" href = "logout.php?logout=yes"> Odhlásit se</a>
	</div>
	<? } ?>
	<!-- Header -->
	<a title = "Home" href="index.php"><header class = "main_head"></header></a>