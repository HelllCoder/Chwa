<?php
ob_start();               // cachujeme vystup
  if(isset($_POST['sent'])){      // pokud byl odeslan formular pokracuj timto
	  if(isset($_POST['podminky'])){
    $jmeno=trim($_POST['jmeno']);
    $heslo1=$_POST['heslo1'];
    $heslo2=$_POST['heslo2'];
    $mail=trim($_POST['mail']);
    $ovoce=trim($_POST['ovoce']);
	 $ip=trim($_POST['ip']); 
    if($jmeno=="" or $heslo1=="" or $mail==""){ // pokud nebylo vyplněno něco z toho, co je povinné, dáme vědět a skript ukončíme
      $backlink="index.php?page=registrace&Alert=1";
    }else{              // povinné udaje vyplněny vsechny
      require "db.php";     // pripojime se k databazi
      $PocetStejnych=mysql_result(mysql_query("SELECT COUNT(*) FROM `uzivatele` WHERE `jmeno`='$jmeno' OR `mail`='$mail'"), 0);
	  if($PocetStejnych!=0){    // pokud v db je jiz takove jmeno nebo heslo...
        $backlink="index.php?page=registrace&Alert=2";
      }elseif($heslo1 != $heslo2){    // pokud se hesla nerovnají
        $backlink="index.php?page=registrace&Alert=3";
      }else{            // hesla se shoduji, vlozime tedy data do databaze
        $heslo=md5($heslo1);  // zahashujeme heslo
        if($web=="http://" or $web==""){ //pokud nezadal web tak dame promennou web prazdnou
          $web="";
        }
		  $ip=$_SERVER["REMOTE_ADDR"];
        $VlozData=mysql_query("INSERT INTO uzivatele (jmeno,heslo,mail,kral,ip,prava,date) VALUES ('$jmeno', '$heslo', '$mail','$ovoce','$ip', '0',NOW())") or die (mysql_error());
		  $o = mysql_query("INSERT INTO `zpravy` (`id`, `prijemce`,`odesilatel`,`text`,`predmet`,`datum`) VALUES (NULL,'".$_POST['jmeno']."','Posel','<p class = \"uvitaciaSprava\">Vítáme tě ve hře Character-Wars. Dúfame, že sa Vám bude páčiť. Všimnite, že vývoj hry zatiaľ prebieha, takže návrhy na zlepšenie môžete poslať správou do pošty uživateľovi MadaraCZech nebo Svistwarrior273. (neskôr by sme chceli pridať formulár na hlásenie chýb a feature-requesty, a taktiež nápovedu do hry). Ďakujeme za pochopenie, <strong>tím Lerain Softwares</strong></p>','<span class = \"uvitaciaSprava\">Vitej ve hře!</span>',NOW())") or die(mysql_error());        // Vlozim do tabulky hodnoty - prvni je ID - nevyplnim, tvori se samo.
        // Jako posledni hodnota je "0", to jsou ty prava uzivatele.
		
        $backlink="index.php?Alert=4"; // presmerovani s hlaskou ze je vse OK
      }

    }
	  }
  }else{
    $backlink="index.php?page=registrace&Alert=5";
  }
// pokud pouzijete HEADER LOCATION tak by pred nim nemelo byt zadne platne ECHO
//echo "<a href='index.php'>index</a>";
// samozrejme zde muze byt presmerovani na jinou stranku pomoci
 header ("Location: $backlink");
ob_end_flush();

?>
