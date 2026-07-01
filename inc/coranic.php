<?php
function versets($sourate, $start, $end){
 $debut = $start;
 $fin = $end;
 if ($debut == $fin) $version = 1;
  
 $surahforfile = str_pad($sourate, 3, '0', STR_PAD_LEFT);
 
 $fichiersourate = $_SERVER['DOCUMENT_ROOT'].'/auto/fr/Chapter'.$surahforfile.'.xml';
 
 if (file_exists($fichiersourate)) {
    $lines = simplexml_load_file($_SERVER['DOCUMENT_ROOT'].'/auto/fr/Chapter'.$surahforfile.'.xml');
	$names = simplexml_load_file($_SERVER['DOCUMENT_ROOT'].'/auto/fr/quran-data.xml');
	
 }
 
$index = $sourate-1;

$nom = $names->sura[$index]['tname'];

echo '<div style="text-align :right; padding-right :5px;">';
for ($id = $start; $id <= $end; $id++){ 

echo '<img src="/images/coran/'.$sourate.'_'.$id.'.png">';

}

echo '</div><p><b>{</b> ';
for ($id = $start-1; $id <= $end-1; $id++){ 

echo $lines->Verse[$id]; 

}
if ($version == 0) echo ' <b>}</b> <span class="coran">[Sourate '.$sourate.', '.$nom.' - Versets '.$debut.' à '.$fin.']</span></p>';
if ($version == 1) echo ' <b>}</b> <span class="coran">[Sourate '.$sourate.', '.$nom.' - Verset '.$debut.']</span></p>';

}
?>