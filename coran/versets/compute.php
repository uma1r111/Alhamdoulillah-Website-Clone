<?php include("../../inc/menu.php") ?>
<table id="global">
<tbody>
<tr>

<td id="contenu">

<?php


    $quranFile = 'quran.txt';   // quran file
	$transFile = 'traduction.txt';   // translation file
    $metadataFile = 'quran-data.xml';  // quran metadata file

    initSuraData();   // initialize sura data array
	

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




$count = 0; 
$compteur = 0; 


for ($sura=1; $sura<=114; $sura++) {

$nomsourateFR = getSuraData($sura, 'ename');
$nomsourateAR = getSuraData($sura, 'tname');
$suraOrderC = getSuraData($sura, 'index');

$position = 1;

if ($sura == 1) $sourate = getSuraData($sura, 'ename');

    // return contents of a sura AR
        global $quranFile; global $transFile;
        $quran = file($quranFile); $quranFR = file($transFile);
		
		$startAya = getSuraData($sura, 'start');
        $endAya = $startAya+ getSuraData($sura, 'ayas');
        
        
        $text = array_slice($quran, $startAya, $endAya- $startAya); 
		$textFR = array_slice($quranFR, $startAya, $endAya- $startAya); 
        
		${'fois'.$sura} = 0;
		
		
			

		foreach ($text as $aya)
        {
		
        $ayat = str_replace(['َ', 'ً', 'ُ', 'ٌ', 'ِ', 'ٍ', 'ْ', 'ّ', 'ٰ', 'ۢ'], '', $aya);
        $ayat = str_replace(['ٱ'], 'ا', $ayat);
        
		if ((strpos($ayat, $motAR1) !== false) || (strpos($ayat, $motAR2) !== false)) {
			
			${'name'.$sura} = $nomsourateAR;

			${'liste'.$sura} = $nomsourateAR;

			${'number'.$sura} = $suraOrderC; 

			${'aya'.$sura.'c'.$count} = $position;
			
			${'fois'.$sura}++;
			
			$count++;
			
			${'valeur'.$sura} = ${'fois'.$sura};
			${'count'.$sura} = $count;
			
			

			}
	
		$position++;
		
		
					

				}		

	if (${'fois'.$sura} !="") $compteur++;

		
		}
		
echo "<h1>Versets sur $signification</h1>

<p>Le mot <strong>$motFR</strong> signifie « <strong>$signification</strong> ». En tout, le mot $motFR est cité dans $count versets du Coran, répartis sur $compteur sourates.</p>

<h2>Liste des Sourates sur $signification</h2>

<ul style=\"width:100%; margin-left:auto; margin-right:auto;\">

";



for ($i=1; $i<=114; $i++) {

		if (${'liste'.$i} !="") echo "<li style=\"float:left; width : 50%; height : auto;\"><a href=\"#$i\">${'liste'.$i}</a></li>";
	
}



echo "

</ul>

<h3 style=\"display:inline-block; padding-top:10px;\"><u>Versets du Coran sur « $motFR »</u></h3>";


for ($i=1; $i<=114; $i++) {

if (${'valeur'.$i} != 0) {

	
	echo "<p style=\"background-color:lightblue; padding-top:5px;\"><a name=\"$i\"></a>${'valeur'.$i} fois dans sourate <a href=\"/coran/lire/sourate-${'number'.$i}.html\">${'name'.$i}</a> (n°${'number'.$i})</p>";
	
	for ($j=0; $j<=$count; $j++) {

	if (${'aya'.$i.'c'.$j} !="") versets($i, ${'aya'.$i.'c'.$j}, ${'aya'.$i.'c'.$j});
	
	
		
	}
 }

}

include ("pages.php")

?>


<br>

</td>
<td id="colonnes"><?php include("../../inc/droite.php") ?></td>
</tr>
</tbody>
</table>
<?php include("../../inc/footer.php") ?>