<?php
for ($i=1; $i<115; $i++) {
	${'fname'.$i} = getQariDataN($i, 'name');
}
$nom = getQariData($qari, 'name');
$nomS = getQariData($qari, 'nameS');
$pays = getQariData($qari, 'pays');
$ville = getQariData($qari, 'ville');
$lecture = getQariData($qari, 'lecture');
$recitation = getQariData($qari, 'recitation');
$image = getQariData($qari, 'image');
$biographie = getQariData($qari, 'biographie');

if ($qari==1) $folder = 'abderrahman-soudais';
if ($qari==2) $folder = 'saad-ghamidi';
if ($qari==3) $folder = 'salah-budair';
if ($qari==4) $folder = 'abdelbasset-abdessamad';
if ($qari==5) $folder = 'abdelmuhsin-qassim';
if ($qari==6) $folder = 'abdellah-juhani';
if ($qari==7) $folder = 'mohammed-siddiq-minshawi';
if ($qari==8) $folder = 'mahmoud-khalil-hussary';
if ($qari==9) $folder = 'abdellah-matroud';
if ($qari==10) $folder = 'ali-houdayfi';
if ($qari==11) $folder = 'saoud-shouraim';
if ($qari==12) $folder = 'bandar-balila';
if ($qari==13) $folder = 'fahd-kandari';
if ($qari==14) $folder = 'khalid-qahtani';
if ($qari==15) $folder = 'ahmed-ajmi';
if ($qari==16) $folder = 'abdelwadoud-hanif';
if ($qari==17) $folder = 'aboubakr-shatiri';
if ($qari==18) $folder = 'abdellah-basfar';
if ($qari==19) $folder = 'ali-jaber';
if ($qari==20) $folder = 'fares-abbad';
if ($qari==21) $folder = 'yasser-dossari';
if ($qari==22) $folder = 'khalid-ghamidi';
if ($qari==23) $folder = 'maher-mouayqli';
if ($qari==24) $folder = 'omar-kazabri';
if ($qari==25) $folder = 'salah-boukhatir';
if ($qari==26) $folder = 'yasser-salama';

for ($a=1; $a<30; $a++) {
	$num = sprintf('%03d',$a);
	${'pic'.$a} = "/images/recitateurs/$folder/s/$num.jpg";
	${'photo'.$a} = "/images/recitateurs/$folder/$num.jpg";
	};
	
for ($a=1; $a<115; $a++) {
	$chiffre = sprintf('%03d',$a);
	${'qari'.$a} = "../../../coran/mp3/files/$folder/$chiffre.mp3";
	//${'fichier'.$a} = ltrim(${'qari'.$a}, '/');
	};
?>