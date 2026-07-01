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

<h1>Prayer Time World Cities</h1>

<p style="padding-top:20px;"><a href="/en/prayer-times/">Prayer Times</a> > <strong>World</strong></p>

<p width="100%">Here are the prayer times for <?echo number_format($count)?> cities around the world.</p>

<center><div style="width:100%; display:block; height:5px; background-color:slategray; margin:0px;"></div></center>

<img style="float:right; margin-right:25px; margin-top:9px; height:33px; width:45px;" src="/en/prayer-times/flags/saudi-arabia.GIF">

<h2>World Salat Timetable</h2>

<?php
	
	$index = 0;
	$modulo = 0;	
	$top1 = 0;
	$a=1;
	
	$dateTimeZoneZulu = new DateTimeZone("Zulu");
	$dateTimeZulu = new DateTime("now", $dateTimeZoneZulu);
	
	$arr = array("Europe", "Asia", "Africa", "North America", "South America", "Oceania", "Central America", "Caribbean");
	
	foreach ($arr as $variable){
	
	$link = str_replace(" ", "-", strtolower($variable));
	
echo "	<div style=\"width:100%; background-color:lightgray;\"><h3><u><a href=\"$link\">$variable</a></u></h3></div>

<table class=\"timetable\" style=\"margin-right:auto; margin-left:auto;\">
<tr style=\"font-weight:bold;\"><td style=\"text-align:left;\">City</td><td style=\"width:4.5em;\">Fajr</td><td style=\"width:4.5em;\">Dhuhr</td><td style=\"width:4.5em;\">Asr</td><td style=\"width:4.5em;\">Maghrib</td><td style=\"width:4.5em;\">Isha</td></tr>

";

	for ($i=1; $i<=23100; $i++) 
	{
		${'pop'.$i} = getSuraData($i, 'pop');
		${'city'.$i} = getSuraData($i, 'city');
		${'lat'.$i} = getSuraData($i, 'lat'); 
		${'long'.$i} = getSuraData($i, 'long');
	
		if (${'continent'.$i} == "$variable") {
			
			if (${'pop'.$i} > ${'top'.$a}) ${'top'.$a} = ${'pop'.$i};
			
		}
	}
	
	if ($variable == "Caribbean") $limit = ${'top'.$a};
	if ($variable == "Asia") $limit = ${'top'.$a}/3;
	if ($variable == "Africa") $limit = ${'top'.$a}/3;
	if ($variable == "Europe") $limit = ${'top'.$a}/6;
	if ($variable == "South America") $limit = ${'top'.$a}/3;
	if ($variable == "Central America") $limit = ${'top'.$a};
	if ($variable == "North America") $limit = ${'top'.$a}/3;
	if ($variable == "Oceania") $limit = ${'top'.$a};
	
	
	
	
	for ($i=1; $i<=23100; $i++)
	{
		
		if (${'continent'.$i} == "$variable")
		if (${'pop'.$i} >= $limit)
		{
		${'city'.$i} = getSuraData($i, 'city'); 
		${'zone'.$i} = getSuraData($i, 'zone'); 
		${'ville'.$i} = str_replace(" ", "-", strtolower(getSuraData($i, 'city')));
	
		${'pays'.$i} = str_replace(" ", "-", strtolower(${'country'.$i}));
		${'cont'.$i} = str_replace(" ", "-", strtolower(${'continent'.$i}));
	
	
		$index++; 
		
		if ($modulo%2) {$module = 'style="background-color: lightblue;"';} else {$module = "";}
		echo "<tr $module><td style=\"text-align:left;\"><a href=\"${'cont'.$i}/${'pays'.$i}/${'ville'.$i}.html\">${'city'.$i}</a></td><td><span id=\"fajr$index\"></span></td><td><span id=\"dhuhr$index\"></span></td><td><span id=\"asr$index\"></span></td><td><span id=\"maghrib$index\"></span></td><td><span id=\"isha$index\"></span></td></tr>";
		$modulo++;

$dateTimeZone = new DateTimeZone("${'zone'.$i}");
$dateTime = new DateTime("now", $dateTimeZone);
${'timezone'.$i} = ($dateTimeZone->getOffset($dateTimeZulu))/3600;

?>
<script>
var tz = '<?=${'zone'.$i}?>';
var date = new Date();
if (moment.tz(date.getTime()+1000*60*60*24,tz).isDST() == false) { dst = 0; } else { dst = 1;}
var date = new Date();
var times = prayTimesC.getTimes(date, [<?=${'lat'.$i}?>, <?=${'long'.$i}?>], <?=${'timezone'.$i}?>, dst, '12h');
var timeFajr = times.fajr;
var timeDhuhr = times.dhuhr;
var timeAsr = times.asr;
var timeMaghrib = times.maghrib; 
var timeIsha = times.isha; 
document.getElementById("fajr<?=$index?>").innerHTML = timeFajr;
document.getElementById("dhuhr<?=$index?>").innerHTML = timeDhuhr;
document.getElementById("asr<?=$index?>").innerHTML = timeAsr;
document.getElementById("maghrib<?=$index?>").innerHTML = timeMaghrib;
document.getElementById("isha<?=$index?>").innerHTML = timeIsha;
</script>
<?
};



}; 

echo "</table>"; $a++;
	}
?>



<br>

<?php
 $count=-3;
 $dir = opendir(".");
 while (false !== ($file = readdir($dir))) { $count++;}
 ?>

<center><div style="width:100%; display:block; height:5px; background-color:slategray; margin:0px;"></div></center>

<h3>Prayer time for world countries</h3>

<p>If you did not found your city, please click on your continent to see more prayer times of your country and you will find it insha Allah.</p>

<table style="padding:0px; margin:0px;"><tr><td style="padding:0px; margin:0px;"><ul style="padding-top:0px; margin-top:0px;">


 <?php
if ($dir = opendir(".")) {
  while (false !== ($file = readdir($dir))) { 
  if ($file !== 'index.html' && $file !== '.' && $file !== '..') {
	  $filed = str_replace("-", " ", $file);
	  

$exclude = array('and', 'of');
$words = explode(' ', $filed);
foreach($words as $key => $word) {
    if(in_array($word, $exclude)) {
        continue;
    }
    $words[$key] = ucfirst($word);
}
$list = implode(' ', $words);	  
	  
	  echo "<li style=\"line-height:250%; margin-left:-15px; list-style-type:none; width: 270px; float: left;\"><img style=\"padding:10px; height:33px; width:45px; vertical-align:middle\"; src=\"/en/prayer-times/flags/$file.GIF\"><a href=\"$file\">$list</a></li>"; 
	  
	}
	
	
  }
  closedir($dir);
}
?>

</ul></td></tr></table>
 

<br>