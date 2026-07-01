<?php include ("../../inc/doctype.php");

$test = $_SERVER['REQUEST_URI'];
$sour = preg_replace('/\D/', '', $test);

$sura = $sour;

    // Quran Metadata Sample Usage
    // By: Hamid Zarrabi-Zadeh
    // http://tanzil.net


    $quranFile = 'quran.txt';   // quran file
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

    }

	echo "</div>";
	
	
		$suraNumber = getSuraData($sura, 'ayas');
		$suraType = getSuraData($sura, 'type');
		$suraOrderT = getSuraData($sura, 'order');
		$suraOrderC = getSuraData($sura, 'index');
		$suraNom = getSuraData($sura, 'name');
		$suraNomT = getSuraData($sura, 'name');
	?>

<title>سورة <? echo $suraOrderC; ?> <? echo $suraNomT; ?> - قراءة سورة <? echo $suraNomT; ?> في القرآن الكريم</title>
<meta name="description" content="سورة <? echo $suraOrderC; ?> في القرآن الكريم : <? echo $suraNomT; ?> - قراءة سورة <? echo $suraOrderC; ?> في المصحف  : <? echo $suraNom; ?>, <? echo $suraNumber; ?> آية" />

<!-- <script data-ad-client="ca-pub-7774762967038154" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7774762967038154" crossorigin="anonymous"></script>

</head>