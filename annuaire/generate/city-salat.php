<?php

// Encode a string to URL-safe base64
function encodeBase64UrlSafe($value)
{
  return str_replace(array('+', '/'), array('-', '_'),
    base64_encode($value));
}

// Decode a string from URL-safe base64
function decodeBase64UrlSafe($value)
{
  return base64_decode(str_replace(array('-', '_'), array('+', '/'),
    $value));
}

// Sign a URL with a given crypto key
// Note that this URL must be properly URL-encoded
function signUrl($myUrlToSign, $privateKey)
{
  // parse the url
  $url = parse_url($myUrlToSign);

  $urlPartToSign = $url['path'] . "?" . $url['query'];

  // Decode the private key into its binary format
  $decodedKey = decodeBase64UrlSafe($privateKey);

  // Create a signature using the private key and the URL-encoded
  // string using HMAC SHA1. This signature will be binary.
  $signature = hash_hmac("sha1",$urlPartToSign, $decodedKey,  true);

  $encodedSignature = encodeBase64UrlSafe($signature);

  return $myUrlToSign."&signature=".$encodedSignature;
}

?>

<h1>Mosquée <?echo $VilleNom?></h1>

<?php
//durée d'expiration en secondes d'une page mise en cache
$timeout = 2592000;
 
//on lit l'adresse de la page
$url = $_SERVER['REQUEST_URI'];
 
// on transforme l'adresse en nom de fichier
$url = str_replace('/','-',$url);
 
// si l'adresse est la racine du site, on change le nom en index.html
if($url  == "-") $url = "-index.html";
 
// on construit le chemin du fichier cache de la page
$fichier_cache = "../../../../cache/cache".$url;
 
//on vérifie si la page n'existe pas dans le cache ou si elle a expiré
if (@filemtime($fichier_cache) < (time() - $timeout)) {    
    //on va récupérer les données pour les mettre en cache
    //pour cela on démarre la bufferisation de la page
    ob_start();
    ?>

<p style="padding-top:20px;"><a href="/annuaire/mosquee/">Mosquées</a> 
> <a href="/annuaire/mosquee/<? echo str_replace(" ", "-", strtolower($VilleContinent))?>/"><?echo $VilleContinent?></a> 
> <a href="/annuaire/mosquee/<? echo str_replace(" ", "-", strtolower($VilleContinent))?>/<? echo str_replace(" ", "-", strtolower($VillePays))?>/"><?echo $VillePays?></a> 
> <strong><?echo $VilleNom?></strong></p>

<center><div style="width:100%; display:block; height:5px; background-color:slategray; margin:0px;"></div></center>


	
<?php 

$continent = str_replace(" ", "-", strtolower($VilleContinent));
$pays = str_replace(" ", "-", strtolower($VillePays));
$ville = str_replace(" ", "-", strtolower($VilleNom));
$Pop = number_format($VillePop, 0, ',', ' ');

echo " 
<h2>Mosquées et Salles de prière à $VilleNom</h2>

<p>Voici la liste des mosquées où prier ainsi que les salles de prière pour la ville de $VilleNom et ses $Pop habitants. Vous pouvez aussi consulter les <a href=\"/horaires-prieres/monde/$continent/$pays/$ville.html\">horaires de prières à $VilleNom</a>.</p>

";




$json = file_get_contents("https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=$VilleLat,$VilleLong&radius=2000&types=mosque&key=AIzaSyD9YQt_KVS5R-QcWzZ_LNq2DJFdRtMHOMg");
$objP = json_decode($json);

$json2 = file_get_contents("https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=$VilleLat,$VilleLong&radius=20000&types=mosque&name=priere&key=AIzaSyD9YQt_KVS5R-QcWzZ_LNq2DJFdRtMHOMg");
$objP2 = json_decode($json2);

$json3 = file_get_contents("https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=$VilleLat,$VilleLong&radius=20000&types=mosque&name=مسجد&key=AIzaSyD9YQt_KVS5R-QcWzZ_LNq2DJFdRtMHOMg");
$objP3 = json_decode($json3);


for ($i=0; $i<10; $i++)
{

${'id'.$i} = $objP->{'results'}[$i]->{'place_id'};

${'jsonD'.$i} = file_get_contents("https://maps.googleapis.com/maps/api/place/details/json?placeid=${'id'.$i}&language=fr&key=AIzaSyD9YQt_KVS5R-QcWzZ_LNq2DJFdRtMHOMg&signature=E0DQriyQLxLV75-OxIFs-xxiZL0=");
${'objD'.$i} = json_decode(${'jsonD'.$i});
${'name'.$i} = ${'objD'.$i}->{'result'}->{'name'};
${'address'.$i} = ${'objD'.$i}->{'result'}->{'formatted_address'};
${'phone'.$i} = ${'objD'.$i}->{'result'}->{'formatted_phone_number'};
${'lat'.$i} = ${'objD'.$i}->{'result'}->{'geometry'}->{'location'}->{'lat'};
${'long'.$i} = ${'objD'.$i}->{'result'}->{'geometry'}->{'location'}->{'lng'};
${'testeur'.$i} = ${'address'.$i};
${'testeur'.$i} = htmlentities(${'testeur'.$i}, ENT_NOQUOTES, 'utf-8');
${'testeur'.$i} = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', ${'testeur'.$i});
${'testeur'.$i} = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', ${'testeur'.$i});
${'testeur'.$i} = str_replace("-", " ", ${'testeur'.$i}); 
${'testeur'.$i} = str_replace("ō", "o", ${'testeur'.$i}); 

	if(strstr(${'testeur'.$i}, "$VilleNom")) {
		$vide1 = 1;
		echo "
<table style=\"width:100%; padding: 5px;\">
<tr>
<td style=\"width:50px;\"><img style=\"vertical-align:bottom; padding:5px;\" src=\"/images/mosquee.png\">
<td style=\"width:100%;\"><h3 style=\"margin-left:0px; font-size:10pt;\"><u>${'name'.$i}</u></h3></td>
</tr>
<tr>
<td><td><img style=\"vertical-align:middle; width:16px; height:16px;\" src=\"/images/address.png\"> ${'address'.$i}</td></tr>";
if (isset(${'phone'.$i})) echo "<tr><td><td><img style=\"vertical-align:middle; width:16px; height:16px; \"src=\"/images/phone-home.png\"> ${'phone'.$i}</td></tr>";
echo "</table>


<div style=\"height:25px;\"></div>
	
<center><img src=\"";
echo signUrl("https://maps.googleapis.com/maps/api/staticmap?center=${'lat'.$i},${'long'.$i}&zoom=16&size=400x300&key=AIzaSyD9YQt_KVS5R-QcWzZ_LNq2DJFdRtMHOMg=", 'cni3heiP5JmWfENQjwIv2LCcvfk=');
echo "\"></center>";
}
}

for ($i=0; $i<10; $i++)
{

${'idB'.$i} = $objP2->{'results'}[$i]->{'place_id'};

if ((${'idB'.$i} !== $id1) && (${'idB'.$i} !== $id2) && (${'idB'.$i} !== $id3) && (${'idB'.$i} !== $id4) && (${'idB'.$i} !== $id5) && (${'idB'.$i} !== $id6) && (${'idB'.$i} !== $id7) && (${'idB'.$i} !== $id8) && (${'idB'.$i} !== $id9) && (${'idB'.$i} !== $id10) && (${'idB'.$i} !== $id11) && (${'idB'.$i} !== $id12) && (${'idB'.$i} !== $id13) && (${'idB'.$i} !== $id14) && (${'idB'.$i} !== $id15) && (${'idB'.$i} !== $id16) && (${'idB'.$i} !== $id17) && (${'idB'.$i} !== $id18) && (${'idB'.$i} !== $id19) && (${'idB'.$i} !== $id20) && (${'idB'.$i} !== $id21) && (${'idB'.$i} !== $id22) && (${'idB'.$i} !== $id23) && (${'idB'.$i} !== $id24) && (${'idB'.$i} !== $id25) && (${'idB'.$i} !== $id26) && (${'idB'.$i} !== $id27) && (${'idB'.$i} !== $id28) && (${'idB'.$i} !== $id29) && (${'idB'.$i} !== $id0)){
	
	${'jsonDB'.$i} = file_get_contents("https://maps.googleapis.com/maps/api/place/details/json?placeid=${'idB'.$i}&language=fr&key=AIzaSyD9YQt_KVS5R-QcWzZ_LNq2DJFdRtMHOMg");
	${'objDB'.$i} = json_decode(${'jsonDB'.$i});
	${'nameB'.$i} = ${'objDB'.$i}->{'result'}->{'name'};
	${'addressB'.$i} = ${'objDB'.$i}->{'result'}->{'formatted_address'};
	${'phoneB'.$i} = ${'objDB'.$i}->{'result'}->{'formatted_phone_number'};
	${'latB'.$i} = ${'objDB'.$i}->{'result'}->{'geometry'}->{'location'}->{'lat'};
	${'longB'.$i} = ${'objDB'.$i}->{'result'}->{'geometry'}->{'location'}->{'lng'};
	${'testeurB'.$i} = ${'addressB'.$i};
	${'testeurB'.$i} = htmlentities(${'testeurB'.$i}, ENT_NOQUOTES, 'utf-8');
	${'testeurB'.$i} = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', ${'testeurB'.$i});
	${'testeurB'.$i} = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', ${'testeurB'.$i});
	${'testeurB'.$i} = str_replace("-", " ", ${'testeurB'.$i}); 
	${'testeurB'.$i} = str_replace("ō", "o", ${'testeurB'.$i}); 

	if(strstr(${'testeurB'.$i}, "$VilleNom") && (${'latB'.$i} !== ${'lat'.$i})) {
		$vide2 = 1;
		echo "
<table style=\"width:100% margin-left:50px; padding: 5px;\">
<tr>
<td style=\"width:50px;\"><img style=\"vertical-align:bottom; padding:5px;\" src=\"/images/mosquee.png\">
<td style=\"width:100%;\"><h3 style=\"margin-left:0px; font-size:10pt;\"><u>${'nameB'.$i}</u></h3></td>
</tr>
<tr>
<td><td><img style=\"vertical-align:middle; width:16px; height:16px;\" src=\"/images/address.png\"> ${'addressB'.$i}</td></tr>";
if (isset(${'phoneB'.$i})) echo "<tr><td><td><img style=\"vertical-align:middle; width:16px; height:16px;\" src=\"/images/phone-home.png\"> ${'phoneB'.$i}</td></tr>";
echo "</table>


<div style=\"height:25px;\"></div>
	
<center><img src=\"";
echo signUrl("https://maps.googleapis.com/maps/api/staticmap?center=${'latB'.$i},${'longB'.$i}&zoom=16&size=400x300&key=AIzaSyD9YQt_KVS5R-QcWzZ_LNq2DJFdRtMHOMg=", 'cni3heiP5JmWfENQjwIv2LCcvfk=');
echo "\"></center>";

}
}}

$vide3=0;

if (($VilleContinent == "Afrique") or ($VilleContinent == "Asie")) {

for ($i=0; $i<1; $i++)
{

${'idC'.$i} = $objP3->{'results'}[$i]->{'place_id'};

if ((${'idC'.$i} !== $idB1) && (${'idC'.$i} !== $idB2) && (${'idC'.$i} !== $idB3) && (${'idC'.$i} !== $idB4) && (${'idC'.$i} !== $idB5) && (${'idC'.$i} !== $idB6) && (${'idC'.$i} !== $idB7) && (${'idC'.$i} !== $idB8) && (${'idC'.$i} !== $idB9) && (${'idC'.$i} !== $idB10) && (${'idC'.$i} !== $idB11) && (${'idC'.$i} !== $idB12) && (${'idC'.$i} !== $idB13) && (${'idC'.$i} !== $idB14) && (${'idC'.$i} !== $idB15) && (${'idC'.$i} !== $idB16) && (${'idC'.$i} !== $idB17) && (${'idC'.$i} !== $idB18) && (${'idC'.$i} !== $idB19) && (${'idC'.$i} !== $idB20) && (${'idC'.$i} !== $idB21) && (${'idC'.$i} !== $idB22) && (${'idC'.$i} !== $idB23) && (${'idC'.$i} !== $idB24) && (${'idC'.$i} !== $idB25) && (${'idC'.$i} !== $idB26) && (${'idC'.$i} !== $idB27) && (${'idC'.$i} !== $idB28) && (${'idC'.$i} !== $idB29) && (${'idC'.$i} !== $idB0)){

	${'jsonDC'.$i} = file_get_contents("https://maps.googleapis.com/maps/api/place/details/json?placeid=${'idC'.$i}&language=fr&key=AIzaSyD9YQt_KVS5R-QcWzZ_LNq2DJFdRtMHOMg");
	${'objDC'.$i} = json_decode(${'jsonDC'.$i});
	${'nameC'.$i} = ${'objDC'.$i}->{'result'}->{'name'};
	${'addressC'.$i} = ${'objDC'.$i}->{'result'}->{'formatted_address'};
	${'phoneC'.$i} = ${'objDC'.$i}->{'result'}->{'formatted_phone_number'};
	${'latC'.$i} = ${'objDC'.$i}->{'result'}->{'geometry'}->{'location'}->{'lat'};
	${'longC'.$i} = ${'objDC'.$i}->{'result'}->{'geometry'}->{'location'}->{'lng'};
	${'testeurC'.$i} = ${'addressC'.$i};
	${'testeurC'.$i} = htmlentities(${'testeurC'.$i}, ENT_NOQUOTES, 'utf-8');
	${'testeurC'.$i} = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', ${'testeurC'.$i});
	${'testeurC'.$i} = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', ${'testeurC'.$i});
	${'testeurC'.$i} = str_replace("-", " ", ${'testeurC'.$i}); 
	${'testeurC'.$i} = str_replace("ō", "o", ${'testeurC'.$i}); 

	if(strstr(${'testeurC'.$i}, "$VilleNom")) {
		$vide3 = 1;
		echo "
<table style=\"width:100% margin-left:50px; padding: 5px;\">
<tr>
<td style=\"width:50px;\"><img style=\"vertical-align:bottom; padding:5px;\" src=\"/images/mosquee.png\">
<td style=\"width:100%;\"><h3 style=\"margin-left:0px; font-size:10pt;\"><u>${'nameC'.$i}</u></h3></td>
</tr>
<tr>
<td><td><img style=\"vertical-align:middle; width:16px; height:16px;\" src=\"/images/address.png\"> ${'addressC'.$i}</td></tr>";
if (isset(${'phoneC'.$i})) echo "<tr><td><td><img style=\"vertical-align:middle; width:16px; height:16px;\" src=\"/images/phone-home.png\"> ${'phoneC'.$i}</td></tr>";
echo "</table>


<div style=\"height:25px;\"></div>
	
<center><img src=\"";
echo signUrl("https://maps.googleapis.com/maps/api/staticmap?center=${'latC'.$i},${'longC'.$i}&zoom=16&size=400x300&key=AIzaSyD9YQt_KVS5R-QcWzZ_LNq2DJFdRtMHOMg=", 'cni3heiP5JmWfENQjwIv2LCcvfk=');
echo "\"></center>";

}
}}

} 

$redirection = $vide1+$vide2+$vide3;


if ($redirection == 0) {
	
echo "<p style=\"text-align:center; font-size:8pt; color:red;\">Actuellement, aucune mosquée ou salle de prière n'est récensée<br> dans notre annuaire pour la ville de $VilleNom ($VillePays).</p>

	
<center><div style=\"width:100%; display:block; height:5px; background-color:slategray; margin:0px;\"></div></center>

<p><b>Voir les mosquées des autres villes</b></p>"; 

?>

<p style="text-align:center; margin-bottom:-5px;"> -

<?php 


foreach (range('A', 'Z') as $letter) {
	
	$stop = 0;
	
	for ($i=1; $i<=2400; $i++) 
	{
		${'city'.$i} = getSuraData($i, 'city'); 
		${'country'.$i} = getSuraData($i, 'country'); 
		${'ville'.$i} = str_replace(" ", "-", strtolower(getSuraData($i, 'city')));
		${'magloub'.$i} = ${'city'.$i};
		$first = substr(strrev(${'magloub'.$i}), -1);

	if (${'country'.$i} == $VillePays)
	{
		if ($first == "$letter") {
		if ($stop == 0) echo "<a href=\"#$letter\">$letter</a> - ";
			$stop++;
		};
	}; 
	
	}
}

?>

</p>

<?php foreach (range('A', 'Z') as $letter) {
	
	$stop = 0;
	
	for ($i=1; $i<=2400; $i++)
	{
		${'city'.$i} = getSuraData($i, 'city'); 
		${'country'.$i} = getSuraData($i, 'country'); 
		${'ville'.$i} = str_replace(" ", "-", strtolower(getSuraData($i, 'city')));
		${'magloub'.$i} = ${'city'.$i};
		$first = substr(strrev(${'magloub'.$i}), -1);
		
		
	if (${'country'.$i} == $VillePays)
	{ 
		if ($first == "$letter") {
			if ($stop == 0) echo "<p style=\"width: 100%; display: inline-block;\"><b>$letter</b></p>";
			echo "<li style=\"line-height:180%; margin-left:30px; float:left; width: 250px; \"><a href=\"${'ville'.$i}.html\">${'city'.$i}</a></li>";
			$stop++;
		};
	}; 
	
	}
}
}
?>
<p><br></p>
<?php
    //on récupère le contenu du buffer et on l'arrête
    $cache = ob_get_contents();
    ob_end_flush();
 
    // on ouvre le fichier cache    
    $fd = fopen($fichier_cache, "w");
    if ($fd) {
        // on ecrit le contenu du buffer dans le fichier cache
        fwrite($fd,$cache);
        fclose($fd);
     }
}
else  {
    // le fichier cache existe déjà et est valide, on l'affiche
    include($fichier_cache);
}
?>
