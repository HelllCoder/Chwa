<?php
session_start(); // startujeme session. Všimněte si, že tento kód je úplně nahoře před jakýmkolik výstupem.

require_once "db.php";
// aktualizace dat u uživateli
$query = mysql_query("SELECT id AS UserId, jmeno AS login, prava AS Prava, ip, sila, shield, magic, coins, bricks, level, slava, poradi, prace,pacidlo,vec1,vec2,vec3,vec4,vec5,vec6,pevnost FROM uzivatele WHERE id=" . $_SESSION['UserId']);
$_SESSION = mysql_fetch_assoc($query);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8">
	<meta name = "author" content = "Lerain Software">
	<meta name = "application-name" content = "Character Wars">
	<script src = "http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<link rel='stylesheet' type='text/css' href='styles.css'>
	<link rel = "icon" href = "img/favicon.ico" type = "image/x-icon">
	<title>Character Wars</title>
</head>
<body>
	<?php
		/* Hlavička stránky (banner, logForm atd) */
		include 'header.php';
		/* Hlavné menu */
if(isset($_SESSION)){	
  include 'menu.html';
} else {
	include 'menudruhe.html';}
	?>
	<br>
	<!-- Samotný obsah, funkcionalita hr, generovaná PHP-čkami 
	je vždy v dive int_obsah. Snáď ho už nebude treba. Ale keby niečo. -->
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
					include $soubor2;
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
		<a title = "Changelog" href = "other.php?page=changelog" target = "_blank">Kompletný changelog</a> ~ <a title = "Changelog" href = "other.php?page=archiv" target = "_blank">Archív oznámení</a> 
		
		<p style = "font-weight: bold; color: maroon;"> TESTTESTGame is only about 3% completed. ("perfect graphics for now, or no?") </p>
		
		<h3> Nová verze 0.2.3 </h3>
		<p class = "justify"> Dnes vyšla nová verze 0.2.3. Změny :</p> 
	    <ul>
			<li> Pevnost </li>
			<li> Tlačítko "Zaútočit" na profilu ostatních hráčů v Sieni Hrdinov</li>
			<li> Zmenený systém cien zvyšovania atribútov </li>
			<li> V prípade, že uživateľ nevlastní mascota, zobrazí sa o tom na jeho profile príslušná hláška </li>		
		</ul>
		<p class = "justify"> Starší verze a kompletní seznam zmen naleznete v Changelogu. S pozdravom <strong> LerainSoft </strong> </p>
		
	</section>
	
	<?php
		include 'footer.html';
	?>
</div>
</body>
</html>




