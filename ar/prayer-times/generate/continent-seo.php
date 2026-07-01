<?
    $metadataFile = "../../generate/datas.xml";  // quran metadata file
    initSuraData();   // initialize sura data array
    
    function initsuraData()
    {
		
        global $suraData, $metadataFile;
        $dataItems = Array("index", "continent", "country", "city", "continentAR", "countryAR", "cityAR", "lat", "long", "pop", "zone");
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

<title>مواقيت الصلاة <?=$continent?> <?echo date(Y);?> - أوقات الصلاة <?=$continent?></title>

<meta name="description" content="جميع أوقات الصلاة في قارة <?=$continent?> - اضغط على هذا الرابط لعرض أوقات الصلاة في <?echo $continent?>، تقويم صلاة والجدول الزمني للمدن في <?echo $continent?>."/>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="/ar/css/islam.css"> 

<script src="/ar/prayer-times/js/countdown.js"></script>
<script src="/ar/prayer-times/js/moment.js"></script>
<script src="/ar/prayer-times/js/zone.js"></script>
<script src="/ar/prayer-times/js/praytimes-am.js"></script>


