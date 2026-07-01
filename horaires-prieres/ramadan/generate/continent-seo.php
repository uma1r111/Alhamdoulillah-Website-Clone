<?
    $metadataFile = "../generate/datas.xml";  // quran metadata file
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

?>

<meta content="text/html; charset=utf-8" http-equiv="content-type">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Horaire Ramadan <?=$continent?> <?echo date(Y);?> - Calendrier Ramadan en <?=$continent?></title>

<meta name="description" content="Horaires du mois du Ramadan pour le continent <?=$continent?> - Voir le calendrier du jeûne mois de Ramadan en <?echo $continent?> et les heures d'imsak et d'iftar."/>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="/en/css/islam.css"> 
<link rel="stylesheet" type="text/css" href="/en/css/timeto.css"> 

<script src="/horaires-prieres/js/timeto.js"></script>
<script src="/horaires-prieres/js/moment.js"></script>
<script src="/horaires-prieres/js/zone.js"></script>
<script src="/horaires-prieres/js/praytimes.js"></script>
<script src="/horaires-prieres/js/praytimes-am.js"></script>
<script src="/horaires-prieres/js/france.js"></script>
