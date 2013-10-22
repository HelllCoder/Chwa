<?php
require_once 'db.php';
$min = "99";

	if($_SESSION['coins'] > $min)
	{
		if(!empty($_POST['jmeno']))
		{
			$id = $_SESSION['login'];
			$name = $_POST['jmeno'];
			
			$query = mysql_query("INSERT INTO stanky 
								(id, jmeno, majitel, oblibenost, vec1, vec2, vec4, vec5) 
								 VALUES ('NULL', '$name', '$id', 'nic', 'nic1', 'nic2', 'nic4', 'nic5')");
			
			$sto = "100";
			$new = $_SESSION['coins'] - $sto;
			$_SESSION['coins'] = $new;
			
			$data = "UPDATE `uzivatele` set `coins` = '$new' where `id` = '$id'";
			$prepis = mysql_query($data);
			//echo $id . $name;
		}
		else
		{
			header("location: game.php?page=charakter");
			//echo "1";
		}
	}
	else
	{
		header("location: game.php?page=charakter");
		//echo "2";
	}

?>