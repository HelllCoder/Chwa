<?php
require_once "db.php";

$kdo = $_SESSION['UserId'];
$id_stanku = $_POST['id'];


$prikaz = mysql_query("SELECT `id_hlasovani` FROM `hlasovani` WHERE `user_id` = '$kdo' and `stanky_id` = '$id_stanku'");
$result = mysql_fetch_array($prikaz);

if(empty($result))
{
	$prikaz = mysql_query("SELECT `oblibenost` FROM `stanky` WHERE `id` = '$id_stanku'");
	$result = mysql_fetch_array($prikaz);
	
	$result[0] ++;
	$nova = $result[0];

	$i = mysql_query("INSERT INTO `hlasovani` (`id_hlasovani`,`user_id`,`stanky_id`) 
				  VALUES ('NULL','$kdo', '$id_stanku')");
	$data = "UPDATE `stanky` SET `oblibenost` = '$nova' WHERE `id` = '$id_stanku'";
	$oprav = mysql_query($data);
	
	header("refresh:3; url=game.php?page=stanky" );
	
	echo "<H1> Úspěšně jsi hlasoval. </H1>";
}
else
{
	echo "<H1> Už jsi hlasoval. </H1>";	
}
//*/
?>