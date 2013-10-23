<a title = "Nabídnout zakázku" class = "chwaTlacitko" href='game.php?page=zakazka'>Nabídnout zakázku</a>
<br>
<br>
<br>
<?php

echo "
<form action='game.php?page=hledani_stanku' method='POST' id='bojisko'>	
<input type='text' name='jmeno' maxlength='32' placeholder='Meno'>
<select name='filter'>
	<option value='obet'> Hledat podle oběti </option>
	<option value='odmena'> Hledat podle odměny </option>
</select>
<input type='submit' name='hl_stanek' title='Hledat zakázku' value='Hledat zakázku'>
</form> <br /> <br />";

?>
<fieldset>
	<h1>10 zakázek s nejvyšší odměnou</h1>
<?php
	require_once "db.php";
	$query = MySQL_Query("SELECT * FROM `najimani` ORDER BY odmena DESC ") or die (mysql_error());
         echo "<table id = \"sienHrdinov\">";
				echo "
						<tr>
							<th>Pořadí</th>
							<th>Oběť</th>
							<th>Majitel</th>
							<th>Odměna</th>
						</tr>
						";
			$Pocet=0;			
			while($Vysledek = mysql_fetch_array($query)){
				$Pocet++;
?>

	<tr>
	<td><?php echo $Pocet; ?></td>
		<?php $id = $Vysledek['id']; ?>
		<td><?php echo $Vysledek['obet']; ?></td>
		<td><?php echo $Vysledek['majitel']; ?></td>
		<td><?php echo $Vysledek['odmena']; ?></td>
    <td>	 <form action="game.php?page=bojovani" method="POST">
		<input type='hidden' name='obet' value="<?php echo $Vysledek['id']; ?>">
		<input type="submit" name="send" title = "Zaútočit" value= "Zaútočit" /> </form> </td>
    </tr>
<?
			}
			echo "</table>";
?>
</fieldset>
