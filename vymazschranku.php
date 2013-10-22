<?php
$sql = Mysql_query("DELETE from `zpravy` WHERE `prijemce` = '".$_SESSION['login']."'");
header("location : /game.php?page=posta");