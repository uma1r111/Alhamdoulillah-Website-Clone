      <?php
	  
    // Quran Metadata Sample Usage
    // By: Hamid Zarrabi-Zadeh
    // http://tanzil.net

	$test = $_SERVER['PHP_SELF']; 
	if ($test == '/en/friday-sermons/medina.html') $metadataFile = '../../sermons-vendredi/data-madinah.xml';
	if ($test == '/en/friday-sermons/mecca.html') $metadataFile = '../../sermons-vendredi/data-makkah.xml';
	
	
    // quran metadata file
	initQariData();   // initialize qari data array
    

    //------------------ General Functions ---------------------
	
    // initialize qari data array
    function initQariData()
    {
       global $qariData, $metadataFile;
        $dataItems = Array(
		"year", "page",
		"date1", "cheikhE1", "sujetE1",
		"date2", "cheikhE2", "sujetE2",
		"date3", "cheikhE3", "sujetE3",
		"date4", "cheikhE4", "sujetE4",
		"date5", "cheikhE5", "sujetE5",
		"date6", "cheikhE6", "sujetE6",
		"date7", "cheikhE7", "sujetE7",
		"date8", "cheikhE8", "sujetE8",
		"date9", "cheikhE9", "sujetE9",
		"date10", "cheikhE10", "sujetE10",
		"date11", "cheikhE11", "sujetE11",
		"date12", "cheikhE12", "sujetE12",
		"date13", "cheikhE13", "sujetE13",
		"date14", "cheikhE14", "sujetE14",
		"date15", "cheikhE15", "sujetE15",
		"date16", "cheikhE16", "sujetE16",
		"date17", "cheikhE17", "sujetE17",
		"date18", "cheikhE18", "sujetE18",
		"date19", "cheikhE19", "sujetE19",
		"date20", "cheikhE20", "sujetE20",
		"date21", "cheikhE21", "sujetE21",
		"date22", "cheikhE22", "sujetE22",
		"date23", "cheikhE23", "sujetE23",
		"date24", "cheikhE24", "sujetE24",
		"date25", "cheikhE25", "sujetE25",
		"date26", "cheikhE26", "sujetE26",
		"date27", "cheikhE27", "sujetE27",
		"date28", "cheikhE28", "sujetE28",
		"date29", "cheikhE29", "sujetE29",
		"date30", "cheikhE30", "sujetE30",
		"date31", "cheikhE31", "sujetE31",
		"date32", "cheikhE32", "sujetE32",
		"date33", "cheikhE33", "sujetE33",
		"date34", "cheikhE34", "sujetE34",
		"date35", "cheikhE35", "sujetE35",
		"date36", "cheikhE36", "sujetE36",
		"date37", "cheikhE37", "sujetE37",
		"date38", "cheikhE38", "sujetE38",
		"date39", "cheikhE39", "sujetE39",
		"date40", "cheikhE40", "sujetE40",
		"date41", "cheikhE41", "sujetE41",
		"date42", "cheikhE42", "sujetE42",
		"date43", "cheikhE43", "sujetE43",
		"date44", "cheikhE44", "sujetE44",
		"date45", "cheikhE45", "sujetE45",
		"date46", "cheikhE46", "sujetE46",
		"date47", "cheikhE47", "sujetE47",
		"date48", "cheikhE48", "sujetE48",
		"date49", "cheikhE49", "sujetE49",
		"date50", "cheikhE50", "sujetE50",
		"date51", "cheikhE51", "sujetE51"
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
for ($f=1431; $f<1439; $f++)
{
${'dir'.$f} = "../../sermons-vendredi/files/$page/$f/";
if (file_exists(${'dir'.$f})) ${'fichiers'.$f} = array_slice(scandir(${'dir'.$f}), 2);
${'x'.$f} = count(${'fichiers'.$f});
$total += ${'x'.$f}; 
}



	
	function showQari($qari)
	{	
	
	echo "<table style=\"width: 575px; border: 1px solid black; border-collapse: collapse; margin-left:auto; margin-right:auto;\"cellpadding=\"5\" cellspacing=\"0\">
<tbody>
<tr style=\"font-weight: bold; border-bottom: 1px solid black; height:40px; background-color: lightblue;\">
<td style=\"border-right:1px solid;\" width=\"240\">Topic</td>
<td style=\"border-right:1px solid;\" width=\"170\">Sheikh</td>
<td style=\"border-right:1px solid; text-align: center;\" width=\"40\">Read (EN)</td>
<td style=\"border-right:1px solid; text-align: center;\" width=\"40\">Read (AR)</td>
<td style=\"border-right:1px solid; text-align: center;\" width=\"40\">Mp3</td>
</tr>";
		
		$modulo = 0;
		
	
		
 		for ($m=1; $m<52; $m++)
		{
			$page = getQariData($qari, "page");
			$year = getQariData($qari, "year");
			${'cheikh'.$m} = getQariData($qari, "cheikhE$m");
			${'sujet'.$m} = getQariData($qari, "sujetE$m"); 
			
			if ($modulo%2) {$module = 'background-color: #f0f0f0;';} else {$module = "";}
			if (file_exists("../../sermons-vendredi/files/$page/$year/$m.mp3")){ 
				echo "
			<tr>
			<td style=\"border-right:1px solid; $module\">${'sujet'.$m}</td>
			<td style=\"border-right:1px solid; $module\">${'cheikh'.$m}</td>
			<td style=\"$module text-align: center; border-right:1px solid;\">"; 
			if (!file_exists("../../sermons-vendredi/files/$page/$year/$mE.pdf")) echo "-</td>";
			if (file_exists("../../sermons-vendredi/files/$page/$year/$mE.pdf")) echo "<a target=\"_blank\" href=\"../../sermons-vendredi/files/$page/$year/$m.pdf\"><img style=\"vertical-align:middle;\" src=\"/images/pdf.png\"></a></td>"; 
			echo "<td style=\"$module text-align: center; border-right:1px solid;\">"; 
			if (!file_exists("../../sermons-vendredi/files/$page/$year/$m.pdf")) echo "-</td>";
			if (file_exists("../../sermons-vendredi/files/$page/$year/$m.pdf")) echo "<a target=\"_blank\" href=\"../../sermons-vendredi/files/$page/$year/$m.pdf\"><img style=\"vertical-align:middle;\" src=\"/images/pdf.png\"></a></td>"; 
			echo "<td style=\"$module text-align: center; border-right:1px solid;\"><a target=\"_blank\" href=\"../../sermons-vendredi/files/$page/$year/$m.mp3\"><img style=\"vertical-align:middle;\" src=\"/images/sourates/play.png\"></a></td>			
			</tr>
			";}
			$modulo++;
		}
		echo "</table>";
	}
?>