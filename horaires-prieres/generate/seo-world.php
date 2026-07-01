<?php include("../../inc/doctype.php");

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

<title>Heure de Prière du Monde Entier <?echo date(Y);?> - Horaires des Prières des Villes du Monde</title>

<meta name="description" content="Horaires des prières des principales villes du monde - Cliquez sur cette page pour voir le calendrier des heures de prières du monde entier."/>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="/en/css/timeto.css"> 

<script src="/horaires-prieres/js/timeto.js"></script>
<script src="/horaires-prieres/js/moment.js"></script>
<script src="/horaires-prieres/js/zone.js"></script>
<script src="/horaires-prieres/js/praytimes.js"></script>
<script src="/horaires-prieres/js/praytimes-am.js"></script>

</head>