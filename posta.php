<?php
require_once "db.php";
$query = MySQL_Query("SELECT * FROM `zpravy` WHERE `prijemce` = '".$_SESSION["login"]."' order by datum DESC") or die (mysql_error());
?>
<a title = "Napsat novou zprávu" class = "chwaTlacitko postaTlacitko" href="/game.php?page=novazprava">Nová zpráva</a>
<a title = "Vymazání všech zpráv ve schránce" class = "chwaTlacitko postaTlacitko" href="/game.php?page=vymazschranku">Vyprázdnit schránku</a>
<?php
if(mysql_num_rows($query)) {
?>
<h1> Pošta </h1>
<table id = "dorucenaPosta">
<thead>
	<tr>
		<th>Předmět</th>
		<th>Odesílatel</th>
		<th>Datum</th>
	</tr>
</thead>
<tbody>
<?php while($Vysledek = mysql_fetch_assoc($query)) { ?>
	<tr>
		<td><?php echo $Vysledek['predmet']; ?></td>
		<td><?php echo $Vysledek['odesilatel']; ?></td>
		<td> <?php echo $Vysledek['datum']; ?> </td>
<?php $id = $Vysledek['id']; ?>
		<td ><a class = "action" title = "Přečíst tuto zprávu" href = "/prectipm.php?id=<?php echo $id ?>">Přečíst</a></td> <td><a class = "action" title = "Odstranit tuto zprávu" href = "/odstranpm.php?id=<?php echo $id ?>">Odstranit</a></td></tr>
<?php } ?>
</tbody>
</table>
<?php
} ?>
