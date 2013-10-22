<?php

if(!($_SESSION))
{
	header("location: index.php");
}
else
{
	include 'sorry.html';
}

?>