<?php 
ob_start();
/*
* Tetno soubor zjisti zda se takovy uzivatel s takovym heslem v databazi nachazi. 
* Pokud ano, do sessions o tom ulozime informaci.
* Jinak se samozrejme presmerujeme zpet a dame uzivateli vedet, ze zadal spatne udaje
*/
session_start(); // Budeme pracovat se session, musíme je nastartovat.
if(isset($_POST['jmeno'])){
	require 'db.php';
	    $name = $_POST['jmeno'];
	    $pass = md5($_POST['heslo']);
		$query = MySQL_Query("SELECT * FROM `uzivatele` WHERE `jmeno` = '$name' and `heslo` = '$pass'") or die (mysql_error());
	// Vybereme uživatele se zadaným jménem aheslem
	       $Vysledek = mysql_fetch_array($query);
				$Vysledek['jmeno']; 
				if($Vysledek['jmeno']){ // pokud tato proměnná obsahuje data, bylo zadané správné jméno a heslo
					// Do sessions si uložíme pár informací o přihlášeném
					$_SESSION['prihlasen'] = 1;
					$_SESSION['login'] = $Vysledek['jmeno'];
					$_SESSION['UserId'] = $Vysledek['id'];
					$_SESSION['UserWeb'] = $Vysledek['web'];
					$_SESSION['UserMail'] = $Vysledek['mail'];
					$_SESSION['Prava'] = $Vysledek['prava'];
					$_SESSION['sila'] = $Vysledek['sila'];
					$_SESSION['shield'] = $Vysledek['shield'];
					$_SESSION['magic'] = $Vysledek['magic'];
					$_SESSION['level'] = $Vysledek['level'];
					$_SESSION['coins'] = $Vysledek['coins'];
					$_SESSION['bricks'] = $Vysledek['bricks'];
					$_SESSION['xp'] = $Vysledek['xp'];
					$_SESSION['prace'] = $Vysledek['prace'];
					$_SESSION['pacidlo'] = $Vysledek['pacidlo'];
					$_SESSION['vec1'] = $Vysledek['vec1'];
					$_SESSION['vec2'] = $Vysledek['vec2'];
					$_SESSION['vec3'] = $Vysledek['vec3'];
					$_SESSION['vec4'] = $Vysledek['vec4'];
					$_SESSION['vec5'] = $Vysledek['vec5'];
					$_SESSION['vec6'] = $Vysledek['vec6'];
					$_SESSION['zvire'] = $Vysledek['zvire'];
			$_SESSION['silam'] = 
$Vysledek['silam'];
					$_SESSION['shieldm'] = $Vysledek['shieldm'];
					$_SESSION['magicm'] = $Vysledek['magicm']; 
$_SESSION['skupina'] = $Vysledek['skupina'];
					$_SESSION['pevnost'] = $Vysledek['pevnost'];
					If ($_SESSION['xp']>($_SESSION['level']*2)){
						$newlevel=($_SESSION['level']+1);
						$sql =("UPDATE `uzivatele` set level=$newlevel where id= ".(int)$_SESSION['UserId']);
						$querty =mysql_query($sql);
						$sql =("UPDATE `uzivatele` set xp=0 where id= ".(int)$_SESSION['UserId']);
						$querty =mysql_query($sql);
					}
					$bl="index.php";
					header("location: $bl"); // přesměrujeme na index
				}else{
					$bl="index.php?Alert=6";
					header("location: $bl"); // špatně zadané údaje
					// echo "Zadal jsi špatné údaje";
				}
		mysql_free_result($query);
}else{
	echo "Zde nic není;-)";
}
ob_end_flush();
?>
