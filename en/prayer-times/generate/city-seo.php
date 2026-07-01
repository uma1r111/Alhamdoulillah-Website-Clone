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

		        for ($i=1; $i<=23100; $i++) 
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

<meta content="text/html; charset=utf-8" http-equiv="content-type">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Prayer Time <?echo $VilleNom?> <?echo date(Y);?> - Salat Timetable <?echo $VilleNom?> (Salah <?echo $VillePays?>)</title>

<meta name="description" content="Salah time for the city of <?echo $VilleNom?> (<?echo $VillePays?> on <?echo date(Y);?> - Prayer timetable in <?echo $VilleNom?> (fajr, dhuhr, asr, maghrib, isha) with monthly calendar salat times."/>
