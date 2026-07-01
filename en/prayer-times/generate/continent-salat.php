<?php
		$count=0;
		
		

		for ($i=1; $i<=23100; $i++) 
	{
		${'country'.$i} = getSuraData($i, 'country');
		${'continent'.$i} = getSuraData($i, 'continent');
		
		if ((${'continent'.$i} == $continent))
		{
		$count++;
		}
	}
	echo "</ul>";

$timeStamp = time(); 

?>

<h1>Prayer Time <?=$continent?></h1>

<?php include("../../../../inc/pub-content.php");?>

<br>

<p><a href="/en/prayer-times/world/">World</a> > <strong><?echo $continent?></strong></p>

<p width="100%">Here are the prayer times for <?echo number_format($count)?> cities of <?echo $continent?>.</p>

<center><div style="width:100%; display:block; height:5px; background-color:slategray; margin:0px;"></div></center>

<img style="float:right; margin-right:25px; margin-top:9px; height:33px; width:45px;" src="/en/prayer-times/flags/<?=str_replace(" ", "-", strtolower($continent))?>.GIF">

<h2>Salat Timetable <?=$continent?></h2>

<table class="timetable" style="margin-right:auto; margin-left:auto;">
<tr style="font-weight:bold;"><td style="text-align:left;">City</td><td style="width:4.5em;">Fajr</td><td style="width:4.5em;">Dhuhr</td><td style="width:4.5em;">Asr</td><td style="width:4.5em;">Maghrib</td><td style="width:4.5em;">Isha</td></tr>

<?php
		
	$index = 0;
	$modulo = 0;	
	$top = 0;	
	
	$dateTimeZoneZulu = new DateTimeZone("Zulu");
	$dateTimeZulu = new DateTime("now", $dateTimeZoneZulu);
	
	for ($i=1; $i<=23100; $i++) 
	{
		${'pop'.$i} = getSuraData($i, 'pop');
		${'lat'.$i} = getSuraData($i, 'lat'); 
		${'long'.$i} = getSuraData($i, 'long');
		if ((${'continent'.$i} == $continent))
			if (${'pop'.$i} > $top) {
			$top = ${'pop'.$i};
			$VilleLat = ${'lat'.$i};
			$VilleLong = ${'long'.$i};
			}
	}
	$limit = $top/9;
	
	for ($i=1; $i<=23100; $i++)
	{
		
		if ((${'continent'.$i} == $continent) && (${'pop'.$i} >= $limit))
		{
		${'city'.$i} = getSuraData($i, 'city'); 
		${'zone'.$i} = getSuraData($i, 'zone'); 
		${'ville'.$i} = str_replace(" ", "-", strtolower(getSuraData($i, 'city')));
	
		${'pays'.$i} = str_replace(" ", "-", strtolower(${'country'.$i}));
	
	
		$index++; 
		
		if ($modulo%2) {$module = 'style="background-color: lightblue;"';} else {$module = "";}
		echo "<tr $module><td style=\"text-align:left;\"><a href=\"${'pays'.$i}/${'ville'.$i}.html\">${'city'.$i}</a></td><td><span id=\"fajr$index\"></span></td><td><span id=\"dhuhr$index\"></span></td><td><span id=\"asr$index\"></span></td><td><span id=\"maghrib$index\"></span></td><td><span id=\"isha$index\"></span></td></tr>";
		$modulo++;

$dateTimeZone = new DateTimeZone("${'zone'.$i}");
$dateTime = new DateTime("now", $dateTimeZone);
${'timezone'.$i} = ($dateTimeZone->getOffset($dateTimeZulu))/3600;
?>
<script>
var tz = '<?=${'zone'.$i}?>';
var date = new Date();
if (moment.tz(date.getTime()+1000*60*60*24,tz).isDST() == false) { dst = 0; } else { dst = 1;}
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

?>

</table>

<br>

<?php
 $count=-3;
 $dir = opendir(".");
 while (false !== ($file = readdir($dir))) { $count++;}
 ?>

<center><div style="width:100%; display:block; height:5px; background-color:slategray; margin:0px;"></div></center>

<h3>Prayer time for <?=$continent?> countries</h3>

<p>You can see prayer times for the <?=$count?> countries of <?=$continent?> : </p>

<table style="padding:0px; margin:0px;"><tr><td style="padding:0px; margin:0px;"><ul style="padding-top:0px; margin-top:0px;">


 <?php
if ($dir = opendir(".")) {
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
	  
	  echo "<li style=\"line-height:250%; margin-left:-15px; list-style-type:none; width: 270px; float: left;\"><img style=\"padding:10px; height:33px; width:45px; vertical-align:middle\"; src=\"/en/prayer-times/flags/$file.GIF\"><a href=\"$file\">$list</a></li>"; 
	  
	}
	
	
  }
  closedir($dir);
}
?>

</ul></td></tr></table>
 

<br>