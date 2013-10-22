<?php
/*
* Pokud uživatel není přihlášený, místo obsahu se mu ukáže tato hláška.
*/

	ob_start();
	// odhlaseni autora
	if(IsSet($_GET['logout']) and $_GET['logout']=="yes") {
	  Session_Start();
	  Session_Destroy();
	}
	header ("location: index.php");
	ob_end_flush();

?>