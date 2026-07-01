<?php

    // Quran Metadata Sample Usage
    // By: Hamid Zarrabi-Zadeh
    // http://tanzil.net

    $metadataFile = 'sourates/data.xml';  // quran metadata file
	initSuraData();   // initialize qari data array
    

    //------------------ General Functions ---------------------
	
    // initialize qari data array
    function initSuraData()
    {
        global $suraData, $metadataFile;
        $dataItems = Array("index", "start", "ayas", "name", "tname", "ename", "type",);

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
        
        return $text;
    }
	
    
    //------------------ Display Functions ---------------------
	
	
	echo "
	<h2>Download Surahs of Holy Quran</h2>
	
	<p>Here is the list of the 114 suras of the Holy Quran. To access the various recitations, click on the number of the sura you want to listen to. In total, the Quran contains 6236 verses spread over 114 suras, 86 Meccan and 28 Madinan. When we listen to the kalam of Allah, we must focus on what we hear and meditate on it to put it into practice. Listening to the Quran al karim and remember Allah subhanahu wa taala is an appeasement for our hearts. His reading is an adoration. This book is a blessing for believers and a mercy for humanity.</p>
	
	";
	
    // show sura contents
   
   for ($m=1; $m<115; $m++)
		{
		$sura = $m;
		
		${'suraName'.$m} = getSuraData($sura, 'ename');
		${'suraNumber'.$m} = getSuraData($sura, 'ayas');
		${'suraType'.$m} = getSuraData($sura, 'type');
		${'suraOrderC'.$m} = getSuraData($sura, 'index');
		${'suraNomT'.$m} = getSuraData($sura, 'tname');

		${'exist'.$m} = ("sourates/count/n$m.txt");
		
		if (file_exists(${'exist'.$m})) {
			${'nombre'.$m} = file_get_contents("sourates/count/n$m.txt");
			${'recitateurs'.$m} = "<b>${'nombre'.$m}</b> recitors";
			};
	
	
		${'liste'.$m} = ("surahs-$m.html");
		
	
	echo "
	
	<table style=\"margin-left:25px; float:left; width: 250px; border:1px solid black; padding:5px; border-radius:11px; margin-bottom:10px; margin-top:10px;\" ><tr><td>
	
	 <div style=\"vertical-align:bottom; float:right;\" class=\"sourate s${'suraOrderC'.$m}\"></div>
	 <h3 style=\"margin:0px; display:inline;\"><a href=\"surah-$m.html\">Surah $m Mp3</a></h3>
	
	
	  <ul style=\"list-style:none; margin-left:-20px;\">
	  <li><img style=\"vertical-align:middle;\" src=\"/images/sourates/book.png\"> ${'suraName'.$m}</li>
	  <li><img style=\"vertical-align:middle;\" src=\"/images/sourates/quran.png\"> <b>${'suraNomT'.$m}</b></li>
	  <li><img style=\"vertical-align:middle;\" src=\"/images/sourates/list.png\"> <b>${'suraNumber'.$m}</b> verses</li>
	  <li><img style=\"vertical-align:middle;\" src=\"/images/sourates/location.png\"> ${'suraType'.$m}</li>
	  <li><img style=\"vertical-align:middle;\" src=\"/images/sourates/volume.png\"> ${'recitateurs'.$m}</li>
	  </ul>
	  </div>
	  </td></tr></table>
      ";
		}
		
		
		
	
?>