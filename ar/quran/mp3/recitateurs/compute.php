<?php
	
    $metadataFile = 'recitateurs/data.xml';  // quran metadata file
    $metadataFileN = '../read/quran-data.xml';  // quran metadata file
	initQariData();   // initialize qari data array
	initQariDataN();   // initialize qari data array
	
    function initQariData()
    {
       global $qariData, $metadataFile;
        $dataItems = Array(
		"index", 
		"name", 
		"nameS", 
		"dossier",
		"lecture", 
		"recitation", 
		"url", 
		"image", 
		"pays", 
		"ville", 
		"biographie", 
		"video1", 
		"video2", 
		"video3", 
		"video4", 
		"video5", 
		"video6",

		 );
	
	
        $quranData = file_get_contents($metadataFile);
        $parser = xml_parser_create();
        xml_parse_into_struct($parser, $quranData, $values, $index);
        xml_parser_free($parser);

		        for ($i=1; $i<=30; $i++) 
        {
            $j = $index['QARI'][$i-1];
            foreach ($dataItems as $item)
                $qariData[$i][$item] = $values[$j]['attributes'][strtoupper($item)]; 
        }
	    
    }
	

		function initQariDataN()
    {
       global $qariDataN, $metadataFileN;
        $dataItemsN = Array(
		"name", 
		 );
		 
		 $quranDataN = file_get_contents($metadataFileN);
		 $parserN = xml_parser_create();
		 xml_parse_into_struct($parserN, $quranDataN, $valuesN, $indexN);
		 xml_parser_free($parserN);
		 
		 	        for ($i=1; $i<=115; $i++) 
        {
            $jN = $indexN['SURA'][$i-1];
            foreach ($dataItemsN as $itemN)
                $qariDataN[$i][$itemN] = $valuesN[$jN]['attributes'][strtoupper($itemN)]; 
        }
	}
	
    function getQariData($qari, $property) 
    {
        global $qariData;
        return $qariData[$qari][$property];
    }
	
	  function getQariDataN($qariN, $propertyN) 
    {
        global $qariDataN;
        return $qariDataN[$qariN][$propertyN];
    }
	
	
    // Functions 	
	
	function showSEO($qari)
	{
		include ("liste.php");		
		$dossier = "../../../coran/mp3/files/$folder/"; 
		$sourates = count(glob($dossier . "*.mp3"));

		echo "<title>$nomS MP3 تحميل - تلاوة القرآن الكريم بصوت الشيخ $nom</title>
		
			  <meta name=\"description\" content=\"تلاوة القرآن الكريم بصوت الشيخ $nom - تحميل مجاني MP3 من $sourates سور بصوت الشيخ $nom, رواية $lecture و ب$recitation.\"/> 
			  
			  ";
	}		
	
	function showH2($qari)
	{
		$nom = getQariData($qari, 'name');
		
		echo "<h1>$nom MP3</h1>";
		include("../../../inc/pub-content.php");
		
	}	
	
	
	function showQari($qari)
	{	
		include ("liste.php");		
		$dossier = "../../../coran/mp3/files/$folder/"; 
		$sourates = count(glob($dossier . "*.mp3"));
		
		echo "
		
		<h2>تحميل $nomS MP3</h2>";?>
	
		
	
		<?php echo "
		
		<p><img style=\"vertical-align:middle;\" src=\"/images/sourates/location.png\"> بلد : $pays<br>
		<img style=\"vertical-align:middle;\" src=\"/images/sourates/list.png\"> سور : <b>$sourates</b><br>
		<img style=\"vertical-align:middle;\" src=\"/images/sourates/quran.png\"> رواية : $lecture<br>
		<img style=\"vertical-align:middle;\" src=\"/images/sourates/levels.png\"> تلاوة : $recitation<br>
		</p>
		";
		
		// calcul des durées
		include ("mp3.php");
		for ($d=1; $d<115; $d++)
		{
		${'m'.$d} = new mp3file(${'qari'.$d});
		${'a'.$d} = ${'m'.$d}->get_metadata();
		${'duree'.$d} = str_pad(${'a'.$d}['Length mm:ss'], 5, "0", STR_PAD_LEFT);
		}

	    echo "
	
<table style=\"border: 1px solid black; border-collapse: collapse; margin-left:auto; margin-right:auto;\"cellpadding=\"5\" cellspacing=\"0\">
 <tbody>
  <tr style=\"font-weight: bold; border-bottom: 1px solid black; height:40px; background-color: lightblue;\">
   <td style=\"border-left:1px solid; text-align: center;\" width=\"30\">رقم</td>
   <td style=\"border-left:1px solid;\" width=\"170\">سورة</td>
   <td style=\"border-left:1px solid; text-align: center;\"width=\"70\">مدة</td>
   <td style=\"border-left:1px solid; text-align: center;\"width=\"50\">قراءة</td>
   <td style=\"border-left:1px solid; text-align: center;\">استمع</td>
   <td style=\"border-left:1px solid; text-align: center;\" width=\"100\" colspan=\"2\">تحميل</td>
  </tr>";  

		$modulo = 0;
		
 		for ($m=1; $m<115; $m++)
		{
			if ($modulo%2) {$module = 'background-color: #f0f0f0;';} else {$module = "";}
			if (isset(${'qari'.$m}) && (${'duree'.$m} !== '00000')) echo "
			
			<tr>
			<td style=\"text-align: center; border-left:1px solid; $module\"><b>$m</b><br>
			</td>
			<td style=\"border-left:1px solid; $module\"><a href=\"/ar/quran/mp3/surah-$m.html\">${'fname'.$m}</a></td>
			<td style=\"text-align: center; border-left:1px solid; $module\">${'duree'.$m}</td>
			<td style=\"$module text-align: center; border-left:1px solid;\"><a href=\"/ar/quran/read/surah-$m.html\"><img style=\"vertical-align:middle;\" src=\"/images/sourates/read.png\"></a></td>
			<td style=\"$module text-align: center; border-left:1px solid;\"><a target=\"_blank\" href=\"/${'qari'.$m}\"><img style=\"vertical-align:middle;\" src=\"/images/sourates/play.png\"></a></td>
			<td><a download=\"\" href=\"${'qari'.$m}\"><div class=\"sourate s$m\"></div></a></td>
			<td style=\"$module text-align: center;\"><a download=\"\" href=\"${'qari'.$m}\"><img alt=\"${'tname'.$m}\" src=\"/images/sourates/telecharger.png\"></a></td>
			</tr>
			";
			$modulo++;
		}
  echo "
  
</td></tr></table><br>


";

		if (!empty($biographie)) echo "
		
		<h3>Biographie $nom</h3>
		
		<p>$biographie</p>
		
		";
		
		
		if (file_exists($pic1)) {echo "
		
		<h3>Photos $nom</h3>
		
		<div style=\"margin-left:30px\";>
		";
		
		for ($p=1; $p<30; $p++)
		{
		echo "
		<a href=\"${'photo'.$p}\" class=\"highslide\" onclick=\"return hs.expand(this)\">
		<img src=\"${'pic'.$p}\" height=\"100\" width=\"130\" /></a> 
		";
		}
		
		echo "</div>";
		
		}
		
		if (!empty($video1)) {echo "
		
		<h3>Videos $nom</h3>
		
		<div style=\"margin-left:30px\";>
		";
		
		for ($v=1; $v<7; $v++)
		{
		echo "
		<div id='video$v'></div>
		<script type=\"text/javascript\">
		  jwplayer('video$v').setup({
			'width': '400px',
			'height': '300px',
			'file': '${'video'.$v}',
			'image': '/images/black.jpg',
			'controlbar': 'bottom'
		  });
		</script>
		<br>
		";
		}
		}
	};

?>