<script src="/horaires-prieres/js/moment-hijri.js"></script>
<?php
		$count=0;
		
		

		for ($i=1; $i<=2400; $i++) 
	{
		${'country'.$i} = getSuraData($i, 'country');
		${'continent'.$i} = getSuraData($i, 'continent');
		${'pop'.$i} = getSuraData($i, 'pop');
	
		if (${'pop'.$i}>100000) {

		
		if ((${'continent'.$i} == $continent))
		{
		$count++;
		}}
	}
	echo "</ul>";

$timeStamp = time(); 
	
	$top=0;
	for ($i=1; $i<=2400; $i++) 
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


?>

<h1>Horaire Ramadan <?=$continent?></h1>

<?php include("../../../inc/pub-content.php");?>

<p style="padding-top:20px;"><a href="/horaires-prieres/ramadan/">Calendrier Ramadan</a> > <strong><?echo $continent?></strong></p>

<p width="100%">Voici les horaires du Ramadan pour les <?echo number_format($count)?> principales villes en <?echo $continent?>.</p>

<center><div style="width:100%; display:block; height:5px; background-color:slategray; margin:0px;"></div></center>

<img style="float:right; margin-right:25px; margin-top:9px; height:33px; width:45px;" src="/horaires-prieres/flags/<?=str_replace(" ", "-", strtolower($continent))?>.GIF">

<h2>Calendrier Ramadan en <?=$continent?> (1er jour)</h2>

<table class="timetable" style="margin-right:auto; margin-left:auto;">
<tr style="font-weight:bold;"><td style="text-align:left;">Ville</td><td style="width:4.5em;">Fajr [Imsak]</td><td style="width:4.5em;">Dhouhr</td><td style="width:4.5em;">Asr</td><td style="width:4.5em;">Maghrib [Iftar]</td><td style="width:4.5em;">Isha</td></tr>

<?php
		
	$index = 0;
	$modulo = 0;	
	
	
	$dateTimeZoneZulu = new DateTimeZone("Zulu");
	$dateTimeZulu = new DateTime("now", $dateTimeZoneZulu);
	
	for ($i=1; $i<=2400; $i++) 
	{
		${'pop'.$i} = getSuraData($i, 'pop');
		${'lat'.$i} = getSuraData($i, 'lat'); 
		${'long'.$i} = getSuraData($i, 'long');

		if ((${'continent'.$i} == $continent) && (${'pop'.$i} >= 100000))
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
var date = new Date(moment('1442/9/1', 'iYYYY/iM/iD'));
dst = 0;
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

<?php include("../../../inc/share.php");?>

<br>

 

