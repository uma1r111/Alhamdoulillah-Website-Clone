<?
    $metadataFile = "../../../generate/datas.xml";  // quran metadata file
    initSuraData();   // initialize sura data array
    
    function initsuraData()
    {
		
        global $suraData, $metadataFile;
        $dataItems = Array("index", "continent", "country", "city", "lat", "long", "pop", "zone","continentAR", "countryAR", "cityAR",);
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
		$VilleNom = getSuraData($index, 'cityAR');
		$VilleContinent = getSuraData($index, 'continentAR');
		$VillePays = getSuraData($index, 'countryAR');
		$VilleNomURL = getSuraData($index, 'city');
		$VilleContinentURL = getSuraData($index, 'continent');
		$VillePaysURL = getSuraData($index, 'country');
		$VilleLat = getSuraData($index, 'lat');
		$VilleLong = getSuraData($index, 'long');
		$VillePop = getSuraData($index, 'pop');
		$VilleZone = getSuraData($index, 'zone');
?>

<meta content="text/html; charset=utf-8" http-equiv="content-type">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>وقت الصلاة <?echo $VilleNom?> <?echo date(Y);?> - مواعيد صلاة <?echo $VilleNom?> في <?echo $VillePays?></title>

<meta name="description" content="وقت صلاة لمدينة <?echo $VilleNom?> في <?echo $VillePays?>) <?echo date(Y);?> - جدول الصلاة في <?echo $VilleNom?> (الفجر، الظهر، العصر، المغرب، العشاء) مع أوقات الصلاة التقويم الشهرية."/>

