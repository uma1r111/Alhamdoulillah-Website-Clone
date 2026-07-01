<?
    $metadataFile = "../../generate/datas.xml";  // quran metadata file
    initSuraData();   // initialize sura data array
    
    function initsuraData()
    {
		
        global $suraData, $metadataFile;
        $dataItems = Array("index", "continentAR", "lat", "long", "pop", "zone", "countryAR", "cityAR", "city", "continent", "country");
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
		$VilleNom = getSuraData($index, 'cityAR');
		$VilleNomURL = getSuraData($index, 'city');
		$VilleContinent = getSuraData($index, 'continentAR');
		$VilleContinentURL = getSuraData($index, 'continent');
		$VillePays = getSuraData($index, 'countryAR');
		$VillePaysURL = getSuraData($index, 'country');
		$VilleLat = getSuraData($index, 'lat');
		$VilleLong = getSuraData($index, 'long');
		$VillePop = getSuraData($index, 'pop');
		$VilleZone = getSuraData($index, 'zone');
	

?>

<meta content="text/html; charset=utf-8" http-equiv="content-type">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>تقويم رمضان <?echo $VilleNom?> إمساك وقت الإفطار في <?echo $VilleNom?> <?echo date(Y);?></title>

<meta name="description" content="رمضان التقويم <?echo $VilleNom?> في <?echo $VillePays?> للسنة <?echo date(Y);?> - مواقيت الصلاة في رمضان  <?echo $VilleNom?><? if(!empty($code)) echo " ($code)"?> والمناطق المحيطة بها."/>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


<link rel="stylesheet" type="text/css" href="/ar/css/ramadan.css"> 
<link rel="stylesheet" type="text/css" href="/ar/css/timeto.css"> 

<script src="/ar/prayer-times/ramadan/js/ramadan.js"></script>
<script src="/horaires-prieres/js/moment.js"></script>
<script src="/ar/prayer-times/ramadan/js/zone.js"></script>
<script src="/ar/prayer-times/ramadan/js/praytimes.js"></script>
<script src="/ar/prayer-times/ramadan/js/praytimes-am.js"></script>
<script src="/ar/prayer-times/ramadan/js/france.js"></script>

