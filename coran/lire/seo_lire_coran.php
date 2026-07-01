<?php include("../../inc/doctype.php");

$test = $_SERVER['REQUEST_URI'];
$sour = preg_replace('/\D/', '', $test);

$sura = $sour;

    // Quran Metadata Sample Usage
    // By: Hamid Zarrabi-Zadeh
    // http://tanzil.net


    $quranFile = 'quran.txt';   // quran file
	$transFile = 'traduction.txt';   // translation file
    $metadataFile = 'quran-data.xml';  // quran metadata file

    initSuraData();   // initialize sura data array
    

    //------------------ General Functions ---------------------
	

    // initialize sura data array
    function initSuraData()
    {
        global $suraData, $metadataFile;
        $dataItems = Array("index", "start", "ayas", "name", "tname", "ename", "type", "order", "rukus",);

        $quranData = file_get_contents($metadataFile);
        $parser = xml_parser_create();
        xml_parse_into_struct($parser, $quranData, $values, $index);
        xml_parser_free($parser);

        for ($i=1; $i<=114; $i++) 
        {
            $j = $index['SURA'][$i-1];
            foreach ($dataItems as $item)
                $suraData[$i][$item] = $values[$j]['attributes'][strtoupper($item)]; 
        }
    }


    // return given property of a sura
    function getSuraData($sura, $property) 
    {
        global $suraData;
        return $suraData[$sura][$property]; 
    }


    // return contents of a sura 
    function getSuraContents($sura) 
    {
        global $quranFile;
        $startAya = getSuraData($sura, 'start');
        $endAya = $startAya+ getSuraData($sura, 'ayas');
        $quran = file($quranFile);
        $text = array_slice($quran, $startAya, $endAya- $startAya); 
        return $text;
    }
	
    // return contents of a sura 
    function getSuraContentsfr($sura) 
    {
        global $transFile;
        $startAya = getSuraData($sura, 'start');
        $endAya = $startAya+ getSuraData($sura, 'ayas');
        $quran = file($transFile);
        $textfr = array_slice($quran, $startAya, $endAya- $startAya); 
        return $textfr;
    }

    //------------------ Display Functions ---------------------

	
	
    // show sura contents
    function showSura($sura)
    {
        $suraOrderC = getSuraData($sura, 'index');
		$suraName = getSuraData($sura, 'name');
        $suraText = getSuraContents($sura);
        
        $ayaNum = 1;

		echo "<div class=\"suraName\">سورة &nbsp; &nbsp; &nbsp; $suraName</div>";
		
		if (($suraOrderC != 1) && ($suraOrderC != 9)) echo "<div class=\"bismillah\">بِسْمِ ٱللَّهِ ٱلرَّحْمَٰنِ ٱلرَّحِيمِ</div>";
		
		echo "<div id=\"marges\">";
		
		foreach ($suraText as $aya)
        {
			//if ($ayaNum == 1) $aya = preg_replace('/^(([^ ]+ ){4})/u', '', $aya); // remove bismillahs 
            $aya = preg_replace('/ ([ۖ-۩])/u', '<span class="sign">&nbsp;$1</span>', $aya); // display waqf marks in different style
			
			include ("chiffres_coran.php");
			
			$ayaNum++;
		
        }
		
		echo "</div>";

    }

    // show sura contents
    function showSurafr($sura)
    {
        $suraName = getSuraData($sura, 'ename');
        $suraText = getSuraContentsfr($sura);
        
        $ayaNum = 1;
			
	
		echo "<div class=suraNamefr>$suraName</div>";
		
		if (($suraOrderC != 1) && ($suraOrderC != 9)) echo "<div class=\"bismillahfr\">Au nom d'Allah, le Tout Miséricordieux,<br>le Très Miséricordieux</div>";
		
		foreach ($suraText as $aya)
        {

			echo "<span class=ayaNumfr>($ayaNum)</span> $aya";
			
			$ayaNum++;

		
		
        }

    }
	
	
		$suraNumber = getSuraData($sura, 'ayas');
		$suraType = getSuraData($sura, 'type');
		$suraOrderT = getSuraData($sura, 'order');
		$suraOrderC = getSuraData($sura, 'index');
		$suraNom = getSuraData($sura, 'ename');
		$suraNomT = getSuraData($sura, 'tname');
		
		
		if ($sura > 1 and $sura < 114) {
			$Bsura = $sura-1;
			$Asura = $sura+1;
		}
		
		if ($sura == 1) {
			$Bsura = $sura;
			$Asura = $sura+1;
		}
		
		if ($sura == 114) {
			$Bsura = $sura-1;
			$Asura = $sura;
		}
		
		$BsuraNumber = getSuraData($Bsura, 'ayas');
		$BsuraType = getSuraData($Bsura, 'type');
		$BsuraOrderT = getSuraData($Bsura, 'order');
		$BsuraOrderC = getSuraData($Bsura, 'index');
		$BsuraNom = getSuraData($Bsura, 'ename');
		$BsuraNomT = getSuraData($Bsura, 'tname');
		
		$AsuraNumber = getSuraData($Asura, 'ayas');
		$AsuraType = getSuraData($Asura, 'type');
		$AsuraOrderT = getSuraData($Asura, 'order');
		$AsuraOrderC = getSuraData($Asura, 'index');
		$AsuraNom = getSuraData($Asura, 'ename');
		$AsuraNomT = getSuraData($Asura, 'tname');
		
		
	?>

<title>Lire Sourate <? echo $suraNomT; ?> - Sourate <? echo $suraOrderC; ?> du Coran : <? echo $suraNom; ?> en Francais et Arabe</title>
<meta name="description" content="Lire sourate <? echo $suraNom; ?> du Coran en ligne, <? echo $suraNomT; ?>, mérites et bienfaits - Lire la Sourate <? echo $suraOrderC; ?> sur internet en arabe et en français dans le Coran : <? echo $suraNom; ?> (<? echo $suraNomT; ?>), <? echo $suraNumber; ?> versets" />

</head>