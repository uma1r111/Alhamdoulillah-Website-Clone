      <?php
	  

	$test = $_SERVER['PHP_SELF']; 
	if ($test == '/sermons-vendredi/medine.html') $metadataFile = 'data-madinah.xml';
	if ($test == '/sermons-vendredi/la-mecque.html') $metadataFile = 'data-makkah.xml';
	
	
    // quran metadata file
	initQariData();   // initialize qari data array
    

    //------------------ General Functions ---------------------
	
    // initialize qari data array
    function initQariData()
    {
       global $qariData, $metadataFile;
        $dataItems = Array(
		"year", "page",
		"cheikh1", "sujet1",
		"cheikh2", "sujet2",
		"cheikh3", "sujet3",
		"cheikh4", "sujet4",
		"cheikh5", "sujet5",
		"cheikh6", "sujet6",
		"cheikh7", "sujet7",
		"cheikh8", "sujet8",
		"cheikh9", "sujet9",
		"cheikh10", "sujet10",
		"cheikh11", "sujet11",
		"cheikh12", "sujet12",
		"cheikh13", "sujet13",
		"cheikh14", "sujet14",
		"cheikh15", "sujet15",
		"cheikh16", "sujet16",
		"cheikh17", "sujet17",
		"cheikh18", "sujet18",
		"cheikh19", "sujet19",
		"cheikh20", "sujet20",
		"cheikh21", "sujet21",
		"cheikh22", "sujet22",
		"cheikh23", "sujet23",
		"cheikh24", "sujet24",
		"cheikh25", "sujet25",
		"cheikh26", "sujet26",
		"cheikh27", "sujet27",
		"cheikh28", "sujet28",
		"cheikh29", "sujet29",
		"cheikh30", "sujet30",
		"cheikh31", "sujet31",
		"cheikh32", "sujet32",
		"cheikh33", "sujet33",
		"cheikh34", "sujet34",
		"cheikh35", "sujet35",
		"cheikh36", "sujet36",
		"cheikh37", "sujet37",
		"cheikh38", "sujet38",
		"cheikh39", "sujet39",
		"cheikh40", "sujet40",
		"cheikh41", "sujet41",
		"cheikh42", "sujet42",
		"cheikh43", "sujet43",
		"cheikh44", "sujet44",
		"cheikh45", "sujet45",
		"cheikh46", "sujet46",
		"cheikh47", "sujet47",
		"cheikh48", "sujet48",
		"cheikh49", "sujet49",
		"cheikh50", "sujet50",
		"cheikh51", "sujet51"
		 );

        $quranData = file_get_contents($metadataFile);
        $parser = xml_parser_create();
        xml_parse_into_struct($parser, $quranData, $values, $index);
        xml_parser_free($parser);

		        for ($i=1; $i<=52; $i++) 
        {
            $j = $index['QARI'][$i-1];
            foreach ($dataItems as $item)
                $qariData[$i][$item] = $values[$j]['attributes'][strtoupper($item)]; 
        }
        
    }
	

	// return given property of a qari
    function getQariData($qari, $property) 
    {
        global $qariData;
        return $qariData[$qari][$property];
    }
	
    // Functions 

	$page = getQariData(1, "page");
for ($f=1431; $f<1441; $f++)
{
${'dir'.$f} = "files/$page/$f/";
if (file_exists(${'dir'.$f})) ${'fichiers'.$f} = array_slice(scandir(${'dir'.$f}), 2);
${'x'.$f} = count(${'fichiers'.$f});
$total += ${'x'.$f}; 
}



	
	function showQari($qari)
	{	
	
	echo "<table style=\"width: 575px; border: 1px solid black; border-collapse: collapse; margin-left:auto; margin-right:auto;\"cellpadding=\"5\" cellspacing=\"0\">
<tbody>
<tr style=\"font-weight: bold; border-bottom: 1px solid black; height:40px; background-color: lightblue;\">
<td style=\"border-right:1px solid;\" width=\"100%\">Sujet</td>
<td style=\"border-right:1px solid; text-align: center;\" width=\"1%\">Lire</td>
<td style=\"border-right:1px solid; text-align: center;\" width=\"1%\">Ecouter</td>
</tr>";
		
		$modulo = 0;
		
	
		
 		for ($m=1; $m<52; $m++)
		{
			$page = getQariData($qari, "page");
			$year = getQariData($qari, "year");
		
			${'sujet'.$m} = getQariData($qari, "sujet$m"); 
			
			if ($modulo%2) {$module = 'background-color: #f0f0f0;';} else {$module = "";}
			
			if (file_exists("files/$page/$year/$m.mp3")){ 
				echo "
			<tr>
			<td style=\"border-right:1px solid; $module\">${'sujet'.$m}</td>
		
			<td style=\"$module text-align: center; border-right:1px solid;\">"; 
			if (!file_exists("files/$page/$year/$m.pdf")) echo "-</td>";
			if (file_exists("files/$page/$year/$m.pdf")) echo "<a target=\"_blank\" href=\"files/$page/$year/$m.pdf\"><img style=\"vertical-align:middle;\" src=\"/images/pdf.png\"></a></td>"; echo "
			<td style=\"$module text-align: center; border-right:1px solid;\"><a target=\"_blank\" href=\"files/$page/$year/$m.mp3\"><img style=\"vertical-align:middle;\" src=\"/images/sourates/play.png\"></a></td>			
			</tr>
			";}
			
			
			if (!file_exists("files/$page/$year/$m.mp3") && file_exists("files/$page/$year/$m.pdf")){ 
				echo "
			<tr>
			<td style=\"border-right:1px solid; $module\">${'sujet'.$m}</td>
		
			<td style=\"$module text-align: center; border-right:1px solid;\"><a target=\"_blank\" href=\"files/$page/$year/$m.pdf\"><img style=\"vertical-align:middle;\" src=\"/images/pdf.png\"></a></td>"; echo "
			<td style=\"$module text-align: center; border-right:1px solid;\">-</td>			
			</tr>
			";}
			
			
			
			
			$modulo++;
		}
		echo "</table>";
	}
?>