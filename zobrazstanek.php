<?php
require_once "db.php";

$id = $_POST['id'];

$sql = mysql_query("SELECT * from stanky where `id` = '$id'");
$result = mysql_fetch_array($sql);

echo "<table border='1'>";
echo "<tr> <th> Jméno Stánku </th> <th> Majitel stánku </th> </tr>";
echo "<tr> <td> $result[1] </td> <td> $result[2] </td> </tr>";
echo "</table>";
echo "<br />";
echo "<table border='1'>";
echo "<tr> <th> Oblíbenost </th> <th> Věc1 </th> <th> Věc2 </th> <th> Věc4 </th> <th> Věc5 </th> </tr>";
echo "<tr> <td> $result[3] </td> <td> $result[4] </td> <td> $result[5] </td> <td> $result[6] </td> <td> $result[7] </td> </tr>";
echo "</table>";

echo "<form method='POST' action='game.php?page=hlasovani'>";
echo "<input type='hidden' value='$id' name='id'>";
echo "<input type='submit' name='hlasovat' title='Hlasovat' value='Hlasovat' />";
echo "</form>";

?>