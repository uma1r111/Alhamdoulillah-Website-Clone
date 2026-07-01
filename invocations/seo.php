<!DOCTYPE html>

<html lang="fr">

<head>

<meta content="text/html; charset=utf-8" http-equiv="content-type">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" type="text/css" href="/en/css/islam.css">
<?php 

	$metadataFile = "doua.xml";
    $xml = simplexml_load_file($metadataFile);
	
	$title = $xml->group[$id-1]->title;
	$version = $xml->group[$id-1]->version;


	$titre = lcfirst($title);
	$titrerappel = ucfirst($title);
	if ($version == "") $version = $titre;
	$variante = lcfirst($version);
	$varianterappel = ucfirst($version);


if (($id == 130) or ($id == 108) or ($id == 131) or ($id == 50) or ($id == 113)) { echo "<title>$titrerappel | $varianterappel</title>"; } 
else {echo "<title>Invocation $titre | Doua $variante</title>";}


if (($id == 130) or ($id == 108) or ($id == 131) or ($id == 50) or ($id == 113)) { echo '<meta name="description" content="'.$varianterappel.' en français, arabe et phonétique. Si disponible, écouter ou télécharger le rappel sur '.$titre.' au format mp3.">';}
else { echo '<meta name="description" content="Doua '.$variante.' en français, arabe et phonétique. Ecouter ou télécharger '.$compteur.' invocation '.$titre.' au format mp3.">';}

?>

</head>

<?php include("../inc/menu.php") ?>