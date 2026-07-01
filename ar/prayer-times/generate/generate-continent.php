<?php

$metadataFile = 'datas.xml';
initSuraData();

function initsuraData()
{

global $suraData, $metadataFile;
$dataItems = Array("index", "continent", "country", "city", "continentAR", "countryAR", "cityAR", "lat", "long", "pop");
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

for ($i=1; $i<23100; $i++)
{
	${'continent'.$i} = str_replace(" ", "-", strtolower(getSuraData($i, 'continent')));
	${'tando'.$i} = (getSuraData($i, 'continentAR'));
	
	${'url'.$i} = "../world/${'continent'.$i}/index.html";
 
	if (!file_exists("../world/${'continent'.$i}")) mkdir("../world/${'continent'.$i}/", 0700);
	
	if (!file_exists(${'url'.$i})) {
		${'myfile'.$i} = fopen(${'url'.$i}, "w");
	
	$txt = '<?php 

$continent = "'."${'tando'.$i}".'";
$lien = "'."${'continent'.$i}".'";

include("../../generate/seo-continent.php");?>

<body>

<?php include("../../../inc/menu.php");?>

<table id="global">
<tbody>
<tr>

<td id="contenu">

<?php include("../../generate/salat-continent.php");?>

</td>

<td id="colonnes"><?php include("../../../inc/droite.php");?></td>

</tr>
</tbody>
</table>

<?php include("../../../inc/footer.php");?>

</body></html>';
fwrite(${'myfile'.$i}, $txt);
fclose(${'myfile'.$i});}
}
?>