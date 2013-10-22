<h1>Síň hrdinů</h1>
<?php
	require_once "db.php";
	$query = MySQL_Query("SELECT * FROM `uzivatele` ORDER BY slava DESC ") or die (mysql_error());
         echo "<table id = \"sienHrdinov\">";
				echo "
						<tr>
							<th>Pořadí</th>
							<th>Jméno</th>
							<th>Skupina</th>
							<th>Království</th>
							<th>Level</th>
							<th>Sláva</th>
						</tr>
						";
			$Pocet=0;			
			while($Vysledek = mysql_fetch_array($query)){
				$Pocet++;
?>

	<tr>
	<td><?php echo $Pocet; ?></td>
		<?php $id = $Vysledek['id']; ?>
		<td><a title = "Zobrazit chrakter" href = "/game.php?page=zobrazprof&id=<?php echo $id ?>"><?php echo $Vysledek['jmeno']; ?></a></td>
		<td><?php echo $Vysledek['skupina']; ?></td>
		<td><?php echo $Vysledek['kral']; ?></td>
		<td><?php echo $Vysledek['level']; ?></td>
		<td><?php echo $Vysledek['slava']; ?></td>
    <td></td>
    </tr>
<?
			}
			echo "</table>";
?>
