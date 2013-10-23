<?php
    if (!($_SESSION))
    {
	    header("location: index.php");
    }
    else
    {
?>
<a title = "Založit obchodní stánek" class = "chwaTlacitko" href='game.php?page=zalozstanek'>Založit stánek</a>
<br />
<br />
<br />

<form action='game.php?page=hledani_stanku' method='POST' id='bojisko'>	
<input type='text' name='jmeno' maxlength='32' placeholder='Meno'>
<select name='filter'>
	<option value='user'> Podle majitele </option>
	<option value='name'> Podle názvu </option>
</select>
<input type='submit' name='hl_stanek' title = "Hledat stánok" value='Hledat'>
</form> <br /> <br />

<fieldset>
	<h1>10 nejoblíbenějších stánků</h1>
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
    <td>
        <form action="game.php?page=zobrazstanek" method="POST">
		    <input type='hidden' name='obet' value="<?php echo $Vysledek['id']; ?>">
		    <input type="submit" name="send" title = "Zobrazit" value= "Zobrazit" /> 
	    </form>
	</td>
    </tr>
<?
			}
?>
    </table>
</fieldset>
<?
      }
?>
