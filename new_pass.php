<?php
if (!($_SESSION))
{
	header("location: index.php");
}
else
{

	//Vložíme soubor s připojením k databázi. ( musí se nacházet ve stejné složce )        
	require_once 'db.php';
	
	if(isset($_POST['submit']))
	{
		
		if(isset($_POST['jmeno']))
		{
			$jmeno = stripcslashes(htmlspecialchars(trim($_POST['jmeno'])));
			if($jmeno == '')
			{
					unset($jmeno);
			}
		}
		
		if(isset($_POST['mail']))
		{
			$mail = stripcslashes(htmlspecialchars(trim($_POST['mail'])));
			if($mail == '')
			{
					unset($mail);
			}
		}
		
		
		if(empty($jmeno) or empty($mail)) 
		{
			exit("Vyplňte všechna pole");
		}
		
		if(isset($jmeno) AND isset($mail))
		{
			
	// Vybereme z databáze identifikátor uživatele s zadaným loginem a emailem a ověříme, zda je jeho účet aktivován
			$query = mysql_query("SELECT `id` FROM `uzivatele` WHERE `jmeno`='".$jmeno."' AND `mail`='".$mail."'");
			if(mysql_num_rows($query)!=0)
			{
	// Vygenerujeme nové heslo, do proměnné $date uložíme dnešní datum a čas
				$date = date('YmdHis');
	// použijeme md5 šifrování
				$new_password = md5($date);
	// vybereme 6 symbolů
				$new_password = substr($new_password,2,6);
	// Zašifrujeme ho jako obvykle a uložíme do DB        
				$new_password_enc = strrev(md5($new_password))."g5ds8";
				$query1 = mysql_query("UPDATE `uzivatele` SET `heslo`='".$new_password_enc."' WHERE `jmeno`='".$jmeno."'");
				if(!$query1) { echo mysql_error() . " - " . mysql_errno(); }
				else {
	// Pošleme uživateli e-mail s novým heslem                
					$_to = $mail;
					
					$_subject = "Obnovení hesla";
					
					$_message = "<div style=\"font-size:11pt; font-family:Times New Roman; color:black; padding:5px;\"><div>Dobrý den,</div>";
					$_message .= "<div style=\"margin:10px 0;\">Dobrý den, na vašem účtu".$jmeno." proběhlo obnovení hesla</div>";
					$_message .= "<div style=\"margin:10px 0;\">Vaše nové heslo je: ".$new_password."</div>";
					$_message .= "<div>S pozdravem, Admin team Character Wars</div>";
					
					$_headers  = 'MIME-Version: 1.0' . "\r\n";
					$_headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
					$_headers .= 'From: <info@chwa.cz>' . "\r\n";
		
					if(@mail($_to, '=?UTF-8?B?'.base64_encode($_subject).'?=', $_message, $_headers))
					{
						echo "E-mail s novým heslem byl odeslán. <a href=\"index.php\">Hlavní stránka</a>";
					} else {
						echo "E-mail nebyl odeslán. Zkuste to za 5 minut. <a href=\"index.php\">Hlavní stránka</a>";
					}
		
				}
				
			} else {
				exit("Uživatel s tímto e-mailem neexistuje.");
			}
		}
		
	} else {
	echo '
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	
	<head>
		<title>Nové heslo</title>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	</head>
	<body>
	<h2>Obnovit heslo</h2>
	<form action="" method="POST">
	
	<div><label for="jmeno">Vaše jméno:</label></div>
	<div><input type="text" name="jmeno"></div>
	
	<div><label for="mail">Váš e-mail:</label></div>
	<div><input type="text" name="mail"></div>
	
	<div><input type="submit" name="submit" value="Odeslat"></div>
	
	</form>
	</body>
	</html>
	';
	}
}
?>
