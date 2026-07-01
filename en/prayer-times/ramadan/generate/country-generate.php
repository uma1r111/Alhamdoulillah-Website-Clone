<?php

$metadataFile = 'datas.xml';
initSuraData();

function initsuraData()
{

global $suraData, $metadataFile;
$dataItems = Array("index", "continent", "country", "city", "lat", "long", "pop");
$quranData = file_get_contents($metadataFile);
$parser = xml_parser_create();
xml_parse_into_struct($parser, $quranData, $values, $index);
xml_parser_free($parser);

for ($i=1; $i<=24000; $i++) 
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

for ($i=1; $i<24000; $i++)
{
	${'continent'.$i} = str_replace(" ", "-", strtolower(getSuraData($i, 'continent')));
	${'tando'.$i} = (getSuraData($i, 'continent'));
	${'country'.$i} = str_replace(" ", "-", strtolower(getSuraData($i, 'country'))); 
	${'pays'.$i} = getSuraData($i, 'country');
	
	${'url'.$i} = "../${'continent'.$i}/${'country'.$i}/index.html";
 
	if (!file_exists("../${'continent'.$i}")) mkdir("../${'continent'.$i}/", 0700);
	if (!file_exists("../${'continent'.$i}/${'country'.$i}")) mkdir("../${'continent'.$i}/${'country'.$i}", 0700);
	
	if (!file_exists(${'url'.$i})) {
		${'myfile'.$i} = fopen(${'url'.$i}, "w");
	
	$txt = '<?php 

$country = "'."${'pays'.$i}".'";
$continent = "'."${'tando'.$i}".'";

?>

<!DOCTYPE html>

<html>

<head>

<?php include("../../generate/country-seo.php");?>

</head>

<body>

<?php include("../../../../inc/haut.php");?>

<table id="global">
<tbody>
<tr>

<td id="contenu">

<?php include("../../generate/country-salat.php");?>

</td>

<td id="colonnes"><?php include("../../../../inc/droite.php");?></td>

</tr>
</tbody>
</table>

<?php include("../../../../inc/footer.php");?>

</body></html>';
fwrite(${'myfile'.$i}, $txt);
fclose(${'myfile'.$i});}
}
?>