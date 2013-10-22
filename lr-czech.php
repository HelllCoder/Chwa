<!DocType HTML>
<html>
<head>
<meta charset="windows-1250"/>
<meta name="robots" content="noindex,noarchive"/>
<title>Stáhnutí z lr-czech</title>
</head>
<body>
<?php

$search_url = "https://www.google.cz/search?q=inurl:d-%20site:lr-czech.com";
$start = isset($_GET['page']) ? ($_GET['page'] - 1) * 10 : 0;
$ch = curl_init();
for($i = $start; $i < $start + 50; $i += 10) {
	curl_setopt($ch, CURLOPT_URL, $search_url . '&start=' . $i);
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/29.0.1547.57 Safari/537.36 OPR/16.0.1196.73');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);	
	$html_g = curl_exec($ch);
	$preg = preg_match_all('~<a href="(http://www.lr-czech.+?)".*?</a>~', $html_g, $m_urls);
	if(strpos($html_g, '302 Moved')) {
		echo "konec: " . $i / 10;
		break;
	} else {
		$old = file_get_contents('_urls.txt');
		if(!$old)
			$old = array();
		else
			$old = unserialize($old);
		$old = array_merge($old, $m_urls[1]);
		file_put_contents('_urls.txt', serialize($old));
		/*
		foreach($m_urls[1] as $url) {
			echo $url;
			curl_setopt($ch, CURLOPT_URL, $url);
			$html = curl_exec($ch);
			echo $html;
			if(strpos($html, 'Zboží nenalezeno') !== false) {
				echo $html;
				break;
			}
		}
		*/
	}
	echo $i . "<br/>";
}
curl_close($ch);
?>
</body>
</html>