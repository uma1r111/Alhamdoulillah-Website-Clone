<?
    $metadataFile = "generate/datas.xml";  // quran metadata file
    initSuraData();   // initialize sura data array
    
    function initsuraData()
    {
		
        global $suraData, $metadataFile;
        $dataItems = Array("index", "continent", "country", "city", "lat", "long", "pop", "zone");
		$quranData = file_get_contents($metadataFile);
        $parser = xml_parser_create();
        xml_parse_into_struct($parser, $quranData, $values, $index);
        xml_parser_free($parser);

		        for ($i=1; $i<=24000; $i++) 
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

<title>Ramadan Calendar <?echo date(Y);?>/1442 - Imsak and Iftar Ramadan Timings</title>

<meta name="description" content="All the timetables for the month of Ramadan in this calendar with the hours of prayer according to different angles of calculation, imsak and iftar."/>


<script async src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="/en/css/islam.css"> 

