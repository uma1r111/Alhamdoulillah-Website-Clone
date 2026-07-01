<?php

$VilleLat = 21.42664;
$VilleLong = 39.82563;

		$count=0;

		for ($i=1; $i<=23100; $i++) 
	{
		${'country'.$i} = getSuraData($i, 'country');
		${'continent'.$i} = getSuraData($i, 'continent');
		
		if (!empty(${'continent'.$i}))
		{
		$count++;
		}
	}
	echo "</ul>";

$timeStamp = time(); 

?>

<h1>Prayer Time</h1>

<?php include("../../inc/pub-content.php");?>



<p>Prayer Times > <strong>Index</strong></p>

<p width="100%">Get the prayer times for <?echo number_format($count)?> cities around the world. The salat calendars are grouped by continents. Just click on the country or the city you want to see. Then for each city, you can ajust the settings if necessary, according to your country. You can change the calcul method, asr angle calculation or the format hour.</p>

<center><div style="width:100%; display:block; height:5px; background-color:slategray; margin:0px;"></div></center>

<img style="float:right; margin-right:25px; margin-top:9px; height:33px; width:45px;" src="/en/prayer-times/flags/saudi-arabia.GIF">

<h2>Calendar Salat Timetable</h2>

<p>See also : <a href="ramadan/">Ramadan calendar</a></p>

 <?php
 
 $arr = array("europe", "asia", "africa", "north-america", "south-america", "oceania", "central-america", "caribbean");
	
	foreach ($arr as $variable){

	$link = ucfirst(str_replace("-", " ", strtolower($variable)));
	
	echo " 
	
	<div style=\"width:100%; background-color:lightgray;\"><h3><u><a href=\"world/$variable\">Prayer Time $link</a></u></h3></div>
	
	<table style=\"padding:0px; margin:0px;\"><tr><td style=\"padding:0px; margin:0px;\"><ul style=\"padding-top:0px; margin-top:0px;\">
	
	";
	
	$link = str_replace(" ", "-", strtolower($variable));
 
if ($dir = opendir("world/$variable")) {
  while (false !== ($file = readdir($dir))) { 
  if ($file !== 'index.html' && $file !== '.' && $file !== '..') {
	  $filedo = str_replace("-", " ", $file);
	  $fileda = str_replace("democratic", "D.", $filedo);
	  $filed = str_replace("and the", "", $fileda);

$exclude = array('and', 'of');
$words = explode(' ', $filed);
foreach($words as $key => $word) {
    if(in_array($word, $exclude)) {
        continue;
    }
    $words[$key] = ucfirst($word);
}
$list = implode(' ', $words);	 
	  
	  echo "<li style=\"line-height:250%; margin-left:-15px; list-style-type:none; width: 270px; float: left;\"><img style=\"padding:10px; height:33px; width:45px; vertical-align:middle\"; src=\"/en/prayer-times/flags/$file.GIF\"><a href=\"world/$variable/$file\">$list</a></li>"; 
	  
	}
	
	
  }
  closedir($dir);
}


echo "</ul></td></tr></table>";
 
	}
?>
<br>