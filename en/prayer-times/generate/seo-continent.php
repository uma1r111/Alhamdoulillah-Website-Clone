<!DOCTYPE html>

<html lang="en">

<head>

<meta content="text/html; charset=utf-8" http-equiv="content-type">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="preconnect" href="https://al-hamdoulillah.com">
<link rel="dns-prefetch" href="//al-hamdoulillah.com"/>
<link rel="dns-prefetch" href="//fonts.googleapis.com"/>
<link rel="dns-prefetch" href="//www.google-analytics.com">
<link rel="dns-prefetch" href="//ssl.google-analytics.com">
<link rel="dns-prefetch" href="//pagead2.googlesyndication.com">
<link rel="dns-prefetch" href="//googleads.g.doubleclick.net">
<link rel="dns-prefetch" href="//tpc.googlesyndication.com">
<link rel="dns-prefetch" href="//stats.g.doubleclick.net">
<link rel="dns-prefetch" href="//www.gstatic.com">
<link rel="dns-prefetch" href="//csi.gstatic.com">

<link rel="stylesheet" type="text/css" href="/en/css/islam.css">
<?
    $metadataFile = "../../generate/datas.xml";  // quran metadata file
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

<title>Prayer Time <?=$continent?> <?echo date(Y);?> - Salat Timetable <?=$continent?></title>

<meta name="description" content="All the prayer times for <?=$continent?> continent - Click on this link to view the prayer times in <?echo $continent?>, salat calendar and timetable for cities of <?echo $continent?>."/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="/en/css/timeto.css"> 

<script src="/en/prayer-times/js/timeto.js"></script>
<script src="/en/prayer-times/js/countdown.js"></script>
<script src="/en/prayer-times/js/moment.js"></script>
<script src="/en/prayer-times/js/zone.js"></script>
<script src="/en/prayer-times/js/praytimes-am.js"></script>

<!-- <script data-ad-client="ca-pub-7332993176602926" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7774762967038154" crossorigin="anonymous"></script>

</head>