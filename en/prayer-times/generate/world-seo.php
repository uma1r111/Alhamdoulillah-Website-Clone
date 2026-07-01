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

?>

<meta content="text/html; charset=utf-8" http-equiv="content-type">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Prayer Time Worldwide <?echo date(Y);?> - World Salat Timetable for many Countries and Cities</title>

<meta name="description" content="All the prayer times for all the continents - Click on this page to view the prayer times in world, salat calendar and timetable for countries of many cities around the world."/>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="/en/css/islam.css"> 
<link rel="stylesheet" type="text/css" href="/en/css/timeto.css"> 

<script src="/en/prayer-times/js/timeto.js"></script>
<script src="/en/prayer-times/js/countdown.js"></script>
<script src="/en/prayer-times/js/moment.js"></script>
<script src="/en/prayer-times/js/zone.js"></script>
<script src="/en/prayer-times/js/praytimes-am.js"></script>
