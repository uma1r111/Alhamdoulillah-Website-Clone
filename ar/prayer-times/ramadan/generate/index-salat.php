<?php

$VilleLat = 21.42664;
$VilleLong = 39.82563;

		$count=0;

		for ($i=1; $i<=24000; $i++) 
	{
		${'country'.$i} = getSuraData($i, 'country');
		${'continent'.$i} = getSuraData($i, 'continent');
		${'pop'.$i} = getSuraData($i, 'pop');
	
		if (${'pop'.$i}>1000000) {
		
		if (!empty(${'continent'.$i}))
		{
		$count++;
		}
	}}
	echo "</ul>";

$timeStamp = time(); 

?>

<h1>Ramadan Calendar</h1>

<?php include("../../../inc/pub-content.php");?>

<p style="padding-top:20px;">Timetable Ramadan > <strong>Index</strong></p>

<p width="100%">Here are the different countries for which we propose the calendar of the month of Ramadan. There are in total <?echo number_format($count, 0, ',', '')?> cities throughout the world. Ramadan calendars are sorted by continent. Click on your country and choose your city. Then you can adjust the settings if necessary, such as changing the calculation angle of fajr or isha according to your location.</p>

<center><div style="width:100%; display:block; height:5px; background-color:slategray; margin:0px;"></div></center>

<img style="float:right; margin-right:25px; margin-top:9px; height:33px; width:45px;" src="/en/prayer-times/flags/saudi-arabia.GIF">

<h2>Ramadan Timetable : Iftar et Imsak</h2>

<p>Choose your country :</p>

 <?php
 
 $arr = array("europe", "asia", "africa", "north-america", "south-america", "oceania", "central-america", "caribbean");
	
	foreach ($arr as $variable){

	$link = ucfirst(str_replace("-", " ", strtolower($variable)));
	
	echo " 
	
	<div style=\"width:100%; background-color:lightgray;\"><h3><u><a href=\"$variable\">Ramadan Calendar $link</a></u></h3></div>
	
	<table style=\"padding:0px; margin:0px;\"><tr><td style=\"padding:0px; margin:0px;\"><ul style=\"padding-top:0px; margin-top:0px;\">
	
	";
	
	$link = str_replace(" ", "-", strtolower($variable));
 
if ($dir = opendir("$variable")) {
  while (false !== ($file = readdir($dir))) { 
  if ($file !== 'index.html' && $file !== '.' && $file !== '..') {
	  $filedo = str_replace("-", " ", $file);
	  $fileda = str_replace("democratic", "D.", $filedo);
	  $filed = str_replace("and the", "", $fileda);

$exclude = array('et', 'du');
$words = explode(' ', $filed);
foreach($words as $key => $word) {
    if(in_array($word, $exclude)) {
        continue;
    }
    $words[$key] = ucfirst($word);
}
$list = implode(' ', $words);	 
	  
	  echo "<li style=\"line-height:250%; margin-left:-15px; list-style-type:none; width: 270px; float: left;\"><img style=\"padding:10px; height:33px; width:45px; vertical-align:middle\"; src=\"/en/prayer-times/flags/$file.GIF\"><a href=\"$variable/$file\">$list</a></li>"; 
	  
	}
	
	
  }
  closedir($dir);
}


echo "</ul></td></tr></table>";
 
	}
?>
<br>