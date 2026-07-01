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
        $suraName = getSuraData($sura, 'name');
        $suraText = getSuraContents($sura);
        $showBismillah = false; // change to true to show Bismillahs
        $ayaNum = 1;
	
		echo "<div class=suraName>سورة $suraName</div>";
		
		foreach ($suraText as $aya)
        {
            // remove bismillahs, except for suras 1 and 9
			
            if (!$showBismillah && $ayaNum == 1 && $sura !=1 && $sura !=9)
                $aya = preg_replace('/^(([^ ]+ ){4})/u', '', $aya);
				
            // display waqf marks in different style
            $aya = preg_replace('/ ([ۖ-۩])/u', '<span class="sign">&nbsp;$1</span>', $aya);
			
			include '../inc/chiffres_coran.php';
			
			$ayaNum++;
		
        }

    }

    // show sura contents
    function showSurafr($sura)
    {
        $suraName = getSuraData($sura, 'ename');
        $suraText = getSuraContentsfr($sura);
        $showBismillah = false; // change to true to show Bismillahs
        $ayaNum = 1;
			
	
		echo "<div class=suraNamefr>$suraName</div>";
		
		foreach ($suraText as $aya)
        {

			
			
			echo "<span class=ayaNumfr>($ayaNum)</span> $aya";
			
			
			$ayaNum++;

		
		
        }

    }