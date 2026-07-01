<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php 

	$metadataFile = "dua.xml";
    $xml = simplexml_load_file($metadataFile);
	
	$title = $xml->group[$id-1]->title;
	$version = $xml->group[$id-1]->version;


	$titre = lcfirst($title);
	$titrerappel = ucfirst($title);
	if ($version == "") $version = $titre;
	$variante = lcfirst($version);
	$varianterappel = ucfirst($version);

if ($compteur == 1) $pluriel = "invocation";
if ($compteur > 1) $pluriel = "invocations";


if (($id == 130) or ($id == 108) or ($id == 131) or ($id == 132) or ($id == 50)) { echo "<title>$titrerappel | $varianterappel</title>"; } 
else {echo "<title>Supplication $titre | Dua $variante</title>";}


if (($id == 130) or ($id == 108) or ($id == 131) or ($id == 132) or ($id == 50)) { echo '<meta name ="description" content ="'.$varianterappel.' in English, Arabic and phonetic. If available, download or listen to the reminder on '.$titre.' in mp3 format. "> ';}
else {echo '<meta name="description" content="Dua '.$variante.' in English, Arabic and phonetics. Listen or download '.$compteur.' '.$pluriel.' '.$titre.' in mp3 format. "> ';}

?>

<link rel="stylesheet" type="text/css" href="/en/css/islam.css">