<a title = "Založit obchodní stánek" class = "chwaTlacitko" href='game.php?page=zalozstanek'>Založit obchodní stánek</a>
<br>
<br>
<br>
<?php

echo "
<form action='game.php?page=hledani_stanku' method='POST' id='bojisko'>	
<input type='text' name='jmeno' maxlength='32' placeholder='Meno'>
<select name='filter'>
	<option value='user'> Hledat podle majitele </option>
	<option value='name'> Hledat podle názvu stánku </option>
</select>
<input type='submit' name='hl_stanek' title='Hledat stánek' value='Hledat stánek'>
</form> <br /> <br />";

?>
<fieldset>
	<h1>10 Nejoblíbenějších stánků</h1>
<?php
	require_once "db.php";
	$query = MySQL_Query("SELECT * FROM `stanky` ORDER BY oblibenost DESC ") or die (mysql_error());
         echo "<table id = \"sienHrdinov\">";
				echo "
						<tr>
							<th>Pořadí</th>
							<th>Jméno</th>
							<th>Majitel</th>
							<th>Oblíbenost</th>
						</tr>
						";
			$Pocet=0;			
			while($Vysledek = mysql_fetch_array($query)){
				$Pocet++;
?>

	<tr>
	<td><?php echo $Pocet; ?></td>
		<?php $id = $Vysledek['id']; ?>
		<td><?php echo $Vysledek['jmeno']; ?></td>
		<td><?php echo $Vysledek['majitel']; ?></td>
		<td><?php echo $Vysledek['oblibenost']; ?></td>
    <td>	 <form action="game.php?page=zobrazstanek" method="POST">
		<input type='hidden' name='id' value="<?php echo $Vysledek['id']; ?>">
		<input type="submit" name="send" title = "Zobrazit stánek" value= "Zobrazit stánek" /> </form> </td>
    </tr>
<?
			}
			echo "</table>";
?>
</fieldset>
