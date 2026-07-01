<?
    $metadataFile = "../../generate/datas.xml";  // quran metadata file
    initSuraData();   // initialize sura data array
    
    function initsuraData()
    {
		
        global $suraData, $metadataFile;
        $dataItems = Array("index", "continent", "country", "city", "lat", "long", "pop", "zone");
		$quranData = file_get_contents($metadataFile);
        $parser = xml_parser_create();
        xml_parse_into_struct($parser, $quranData, $values, $index);
        xml_parser_free($parser);

		        for ($i=1; $i<=2400; $i++) 
        {
            $j = $index['SURA'][$i-1];
            foreach ($dataItems as $item)
                $suraData[$i][$item] = $values[$j]['attributes'][strtoupper($item)]; 
        }
        
    }

    function getSuraData($sura, $property) 
    {
        global $suraData;
        return $suraData[$sura][$property]; 
    }
		$VilleNom = getSuraData($index, 'city');
		$VilleContinent = getSuraData($index, 'continent');
		$VillePays = getSuraData($index, 'country');
		$VilleLat = getSuraData($index, 'lat');
		$VilleLong = getSuraData($index, 'long');
		$VillePop = getSuraData($index, 'pop');
		$VilleZone = getSuraData($index, 'zone');
		

//durée d'expiration en secondes d'une page mise en cache
$timeout = 31556926;
 
//on lit l'adresse de la page
$url = $_SERVER['REQUEST_URI'];

$url = str_replace("/ramadan", "", $url);
 
// on transforme l'adresse en nom de fichier
$url = str_replace('/','-',$url);
 
// on construit le chemin du fichier cache de la page
$fichier_cache = "../../../../cache/postal".$url;
 
//on vérifie si la page n'existe pas dans le cache ou si elle a expiré

if (@filemtime($fichier_cache) < (time() - $timeout)) {    
    //on va récupérer les données pour les mettre en cache
    //pour cela on démarre la bufferisation de la page
    ob_start();

		
$json = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?latlng=$VilleLat,$VilleLong&key=AIzaSyD9YQt_KVS5R-QcWzZ_LNq2DJFdRtMHOMg");
$decoded_json = json_decode($json);

foreach($decoded_json->results as $results)
{
    foreach($results->address_components as $address_components)
    {
        if(isset($address_components->types) && $address_components->types[0] == 'postal_code')
        {
            $code = $address_components->long_name;            
        }
    }
}


//on récupère le contenu du buffer et on l'arrête
	$cache = $code;
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
    $code = file_get_contents($fichier_cache);
}


if ($VilleNom == "Paris") $code = '75000';
if ($VilleNom == "Marseille") $code = '13000';
if ($VilleNom == "Nantes") $code = '44300';
if ($VilleNom == "Lyon") $code = '69000';
if ($VilleNom == "Lille") $code = '59800';
if ($VilleNom == "Bordeaux") $code = '33000';
if (($VilleNom == "Liege") & ($VillePays == "Belgique")) $code = '4000';

?>

<meta content="text/html; charset=utf-8" http-equiv="content-type">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Calendrier Ramadan <?echo $VilleNom?> Imsak et Iftar - Heure Ramadan <?echo $VilleNom?> <?echo date(Y);?></title>

<meta name="description" content="Calendrier Ramadan à <?echo $VilleNom?> en <?echo $VillePays?> pour l'année <?echo date(Y);?> - Horaire salat pendant le mois du Ramadan <?echo $VilleNom?><? if(!empty($code)) echo " ($code)"?> et ses environs."/>


<script  src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="/en/css/islam.css"> 
<link rel="stylesheet" type="text/css" href="/en/css/timeto.css"> 

<script src="/horaires-prieres/js/timeto.js"></script>
<script src="/horaires-prieres/js/moment.js"></script>
<script src="/horaires-prieres/js/zone.js"></script>
<script src="/horaires-prieres/js/praytimes.js"></script>
<script src="/horaires-prieres/js/praytimes-am.js"></script>
<script src="/horaires-prieres/js/france.js"></script>