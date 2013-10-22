<h3> Pevnost </h3>
<a> V pevnosti starého království se nacházejí podle legend cenné poklady.</a>
<br>
<br>
<?php
require "db.php";
$informace = mysql_query("SELECT jmeno from pevnost WHERE id = '".$_SESSION["pevnost"]."'");
$Vysledek = mysql_fetch_array($informace);
echo "<h4> Protivník : ".$Vysledek["jmeno"]."</h4>";
?>	
<form action="game.php?page=pevnostboj" method="post">
			<input type="submit" name="send" title = "Zaútočit na soupeře" value= "Zaútočit" />

	<fieldset>
	<a> Počet pokusů : </a> <?php echo $_SESSION["bojiste"]; ?>
</fieldset>