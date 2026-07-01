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

		        for ($i=1; $i<=1600; $i++) 
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

<meta content="text/html; charset=utf-8" http-equiv="content-type

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>جدول رمضان <?=$country?> <?echo date(Y);?> - تقويم رمضان <?=$country?></title>

<meta name="description" content="جدول رمضان <?echo $country?> (<?=$continent?>) - انقر هنا للوصول إلى تقويم صيام رمضان لمدن <?echo $country?>."/>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="/ar/css/ramadan.css"> 
<link rel="stylesheet" type="text/css" href="/ar/css/timeto.css"> 

<script src="/ar/prayer-times/ramadan/js/ramadan.js"></script>
<script src="/horaires-prieres/js/moment.js"></script>
<script src="/ar/prayer-times/ramadan/js/zone.js"></script>
<script src="/ar/prayer-times/ramadan/js/praytimes.js"></script>
<script src="/ar/prayer-times/ramadan/js/praytimes-am.js"></script>
<script src="/ar/prayer-times/ramadan/js/france.js"></script>
