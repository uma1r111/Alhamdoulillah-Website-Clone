<?php

    // Quran Metadata Sample Usage
    // By: Hamid Zarrabi-Zadeh
    // http://tanzil.net

    $metadataFile = 'sourateN/data.xml';  // quran metadata file
	initSuraData();   // initialize qari data array
    

    //------------------ General Functions ---------------------
	
    // initialize qari data array
    function initSuraData()
    {
        global $suraData, $metadataFile;
		$dataItems = Array("index", "start", "ayas", "sujud", "tname", "name", "ename", "type", "order", "desc", "revelation", "hadiths", "merite", "total", 
		"video1", "video2", "video3", "video4", "video5", "video6", "video7",	
		);

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
	
    //------------------ Display Functions ---------------------
	
	function showSEO($sura)
	{
		$suraNumber = getSuraData($sura, 'ayas');
		$suraType = getSuraData($sura, 'type');
		$suraOrderT = getSuraData($sura, 'order');
		$suraOrderC = getSuraData($sura, 'index');
		$suraNom = getSuraData($sura, 'name');
		$suraNomT = getSuraData($sura, 'name');
	
		echo "
		<title>سورة $suraNomT MP3 تحميل - الإستماع إلى سورة $suraOrderC $suraNom</title>
		<meta name=\"description\" content=\"تحميل والاستماع مجانا سورة $suranNomT MP3 بصوت العديد من القراء. سورة $suraOrderC في القرآن الكريم $suraNumber آيات. \"/> 
			  ";
	}	
	
		function showH2($sura)
	{
	$suraNomT = getSuraData($sura, 'name');	
		echo "<h1>سورة $suraNomT MP3</h1>";
		include("../../../inc/pub-content.php");
	}	
	
		function showDesc($sura)
	{
		$suraDesc = getSuraData($sura, 'desc');
		$suraNumber = getSuraData($sura, 'ayas');
		$suraType = getSuraData($sura, 'type');
		$suraOrderT = getSuraData($sura, 'order');
		$suraOrderC = getSuraData($sura, 'index');
		$suraNom = getSuraData($sura, 'name');
		$suraNomT = getSuraData($sura, 'name');	
		$suraHadiths = getSuraData($sura, 'hadiths');
		$suraRevel = getSuraData($sura, 'revelation');
		$suraMerite = getSuraData($sura, 'merite');
		$suraSujud = getSuraData($sura, 'sujud');
			
		
		include ("sourateN/recitateurs.php");

		// calcul des durées
		include ("mp3.php");
		for ($d=1; $d<115; $d++)
		{
		//${'f'.$d} = substr(${'mp'.$d}, 11);
		${'m'.$d} = new mp3file(${'mp'.$d});
		${'a'.$d} = ${'m'.$d}->get_metadata();
		${'duree'.$d} = str_pad(${'a'.$d}['Length mm:ss'], 5, "0", STR_PAD_LEFT);
		}

		
		$compteur = 0;
		for ($f=1; $f<115; $f++)
		{			
				if (isset(${'qari'.$f}) && (${'duree'.$f} !== '00000')) $compteur++;
				
		}
		$total = $compteur;
		$page = fopen("sourates/count/n$suraOrderC.txt", "w");
		$txt = "$total\n";
		fwrite($page, $txt);
		fclose($page);
		
		echo " 
		
		<h2>تحميل سورة $suraOrderC $suraNom MP3</h2>";?>
		

<?php echo "
		
		<p>السورة $suraNomT سورة $suraType. تتكون من $suraNumber آيات. ترتيب تصنيفها في القرآن الكريم هو رقم $suraOrderC. في الترتيب الوحي، فهي في المرتبة $suraOrderT. $suraSujud انقر على الشيخ من اختيارك للاستماع أو تحميل تلاوته من سورة $suraNom MP3. في المجموع, $total قائمة القراء مجرد تحت.</p>";
		
		include("../../inc/share.php");
		
		echo "<h3>الاستماع إلى سورة $suraNomT MP3</h3>
		
				<table style=\"border: 1px solid black; border-collapse: collapse; margin-left:auto; margin-right:auto;\"cellpadding=\"5\" cellspacing=\"0\">
 <tbody>
  <tr style=\"font-weight: bold; border-bottom: 1px solid black; height:40px; background-color: lightblue;\">
				<td style=\"border-left:1px solid; \"width=\"205\"><b>قاري</b></td>
				<td style=\"text-align: center; border-left:1px solid; \"width=\"70\">مدة</td>
				<td style=\"border-left:1px solid; text-align: center;\"width=\"50\">قراءة</td>
				<td style=\"text-align: center; border-left:1px solid; \">استمع</td>
				<td style=\"text-align: center;\" width=\"100\" colspan=\"2\">تحميل</td>
				</tr>
				
		";
		
		$modulo = 0;
 		for ($m=1; $m<30; $m++)
		{
			if ($modulo%2) {$module = "background-color: #f0f0f0;";} else {$module = "";}
			if (isset(${'qari'.$m}) && (${'duree'.$m} !== '00000')) {
			echo "			
				<tr>
				<td style=\"$module border-left:1px solid;\"><a href=\"${'url'.$m}\">${'qari'.$m}</a></td>
				<td style=\"$module text-align: center; border-left:1px solid;\">${'duree'.$m}</td>
				<td style=\"$module text-align: center; border-left:1px solid;\"><a target=\"_blank\" href=\"/ar/quran/read/surah-$sura.html\"><img style=\"vertical-align:middle;\" src=\"/images/sourates/read.png\"></a></td>
				<td style=\"$module text-align: center; border-left:1px solid;\"><a target=\"_blank\" href=\"${'mp'.$m}\"><img src=\"/images/sourates/play.png\"></a></td>
				<td style=\"background-color:white;\"><div class=\"sourate s$suraOrderC\"></td>
				<td style=\"$module text-align: center;\"><a download=\"\" href=\"${'mp'.$m}\"><img src=\"/images/sourates/telecharger.png\"></a></td>
				</tr>
			";}
			$modulo++;

		}
		
		
		echo "
			
		
		</table><br>";

		
		if (!empty($suraRevel)) echo "
		
		<h3>Révélation de Sourate $suraNomT</h3>
		
		<p>$suraRevel</p>
		
		";
		
		
		if (!empty($suraDesc)) echo "
		
		<h3>Tafsir Sourate $suraNom</h3>
		
		<p>$suraDesc</p>
		
		";
		
		
		if (!empty($suraHadiths)) echo "
		
		<h3>Hadiths sur la Sourate $suraNomT</h3>
		
		<p>$suraHadiths</p>
		
		";
		
		if (!empty($suraMerite)) echo "
		
		<h3>Les mérites de Sourate $suraNomT</h3>
		
		<p>$suraMerite</p>
		
		";
	}
?>