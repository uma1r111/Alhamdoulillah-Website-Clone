<?
    $metadataFile = "../../../generate/datas.xml";  // quran metadata file
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
	
?>

<title>Mosquée <?echo $VilleNom?> - Salles de Prière à <?echo $VilleNom?>, Mosquées où Prier</title>

<meta name="description" content="Mosquées à <?echo "$VilleNom ($VillePays)"?> : nom, adresse avec le plan des rues et numéro de téléphone - Liste des salles de prière, associations et mosquées où prier à <?echo $VilleNom?> et ses quartiers."/>