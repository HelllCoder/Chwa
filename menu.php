<nav>
	
	<a href='velka_fotka.jpg'><img src='/img/avatar-br.jpg' alt='Charakter' /></a>
	<a title = 'Charakter' href='game.php?page=charakter'> Charakter</a>
	<a title = 'Bojiště' href='game.php?page=bojiste'> Bojiště</a>
	<a id = "postaTlacitko" title = 'Pošta' href='game.php?page=posta'> Pošta </a>
	<div id = "postaUkazovatel">
		<?php
session_start();
$sql = mysql_query("SELECT * from zpravy where prijemce = '".$_SESSION['login']."'");
$pocet = mysql_result($sql);
echo "Zprávy : ".$Pocet."";
?>
	</div>
	<a title = 'Městský úřad' href='game.php?page=mestsky_urad'> Městský úřad </a>
	<a title = 'Síň hrdinů' href='game.php?page=sien_hrdinov'>Síň hrdinů</a>
	<a title = 'Obchodní zóna' href='game.php?page=trziste'> Obchodní zóna </a>
	<a title = 'Skupina' href='game.php?page=skupina'> Skupina </a>
	<a title = 'Knihovna' href='game.php?page=knihovna'> Knihovna </a>
	<a title = 'Mapa' href='game.php?page=mapa'> Mapa </a>
</nav> 
