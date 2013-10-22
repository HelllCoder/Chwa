<?php
require_once "db.php";

$name = $_POST['jmeno'];
$filter = $_POST['filter'];

if($filter == "name")
{
	$zobraz = mysql_query("SELECT * FROM `stanky` WHERE `jmeno` LIKE '$name%' ORDER BY `oblibenost` DESC");
}
else
{
	$zobraz = mysql_query("SELECT * FROM `stanky` WHERE `majitel` LIKE '$name%' ORDER BY `oblibenost` DESC");
}	


echo "<table> <tr> <th> Název stánku </th> <th> Majitel stánku </th> </tr>";
while($data = mysql_fetch_array($zobraz))
{
	echo "<tr> <td> $data[1] </td> <td> $data[2] </td> </tr>";
}
echo "</table>";

?>