<?php
session_start(); // startujeme session. Všimněte si, že tento kód je úplně nahoře před jakýmkolik výstupem.

require_once "db.php";
// aktualizace dat u uživateli
$query = mysql_query("SELECT id AS UserId, jmeno AS login, prava AS Prava, ip, sila, shield, magic, coins, bricks, level, slava, poradi, prace, pacidlo, vec1, vec2, vec3, vec4, vec5, vec6,zvire,silam,shieldm,magicm,bojiste,pevnost FROM uzivatele WHERE id=" . $_SESSION['UserId']);
$_SESSION = mysql_fetch_assoc($query);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8">
	<meta name = "author" content = "Lerain Software">
	<meta name = "application-name" content = "Character Wars">
	<link rel='stylesheet' type='text/css' href='styles.css'>
	<link rel = "icon" href = "img/favicon.ico" type = "image/x-icon">
	<script src = "http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<title>Character Wars</title>
	</head>
<body>
	<?php
		/* Hlavička stránky (banner, logForm atd) */
		include 'header.php';
		/* Hlavné menu */
		if(isset($_SESSION)){
			include 'menu.html';
		}
	?>
	<br>

	<!-- Samotný obsah generovaný PHP-čkami je vždy v <div> int_obsah. -->
	<section>
				<?php
		/*
							* Tento kousek vzdy includuje do "stredu" stranky volany soubor pres URL
							* Priklad volani: index.php?page=registrace
							* do stredu se nacte soubor registrace.php
							*/
		if (isset($_GET['page'])){        // pokud byl odeslán ?page= ...
			$soubor=$_GET['page'];
			$soubor2= dirname($_SERVER['SCRIPT_FILENAME'])."/".$soubor.".php";
			if(is_file($soubor2)){      //pokud soubor existuje, načteme ho do středu
				if(substr_count($soubor,"../")>0){ // pokud je v parametru alespoň 1x ../ neumožíme soubor načíst
					echo "<h3>Upozornění</h3>Nelze nahrát soubor v nadřazeném adresáři!";
				}elseif($soubor=="index" or $soubor=="/index"){ // index načíst nepovolíme, vznikl by nekonečný cyklus
					echo "<h3>Upozornění</h3>Index nemůže načíst sám sebe!";
				}else{
					ini_set("display_errors", '1');
					error_reporting(-1);
					ob_start();
					include $soubor2;
					$html = ob_get_contents();
					ob_end_clean();
					echo $html;
					
				}
			}else{                //pokud soubor neexistuje, zavoláme error404.php
				include "inc/error404.php";
			}
		}else{                  // Pokud nebyl paramentr page volaný, načteme uvod.php
			include "uvod.php";
		}
		/*
							* Tento kousek kódu nám v případě nějakého erroru vypíše Alert.
							* Jednotlivé hlášky jsou v souboru inc/error_msg.php
							* Je tam pole hlášek, vždy voláme číslo hlášky v poli
							* Příklad: index.php?page=uvod&Alert=0
							*/
		if(isset($_GET['Alert'])){
			require "inc/error_msg.php"; // V tomto souboru jsou ty hlasky
			$JsAlert=$_GET['Alert'];
			echo '<script language="javascript" type="text/javascript">alert("'.$Rvi[$JsAlert].'");</script>';
		}
				?>
	</section>

	<?php
		include 'footer.html';
	?>

</div>
</body>
</html>




