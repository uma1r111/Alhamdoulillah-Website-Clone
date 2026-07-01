 <?php
		$count=0;

		for ($i=1; $i<=2400; $i++) 
	{
		${'country'.$i} = getSuraData($i, 'country');
		
		if (${'country'.$i} == $country) 
		{
		$count++;
		}
	}
	echo "</ul>";

$timeStamp = time(); 

?>

<h1>Horaire Priere <?=$country?></h1>

<?php include("../../../../inc/pub-content.php");?>

<br>


<p><a href="/horaires-prieres/monde/">Monde</a> > <a href="/horaires-prieres/monde/<?echo str_replace(" ", "-", strtolower($continent))?>/"><?echo $continent?></a> > <?echo $country?></strong></p>

<p width="100%">Voici les horaires de prière pour <?echo number_format($count)?> villes en <?echo $country?>.</p>

<center><div style="width:100%; display:block; height:5px; background-color:slategray; margin:0px;"></div></center>

<img style="float:right; margin-right:25px; margin-top:9px; height:33px; width:45px;" src="/horaires-prieres/flags/<?=str_replace(" ", "-", strtolower($country))?>.GIF">

<h2>Calendrier Heure Salat <?=$country?></h2>



<table class="timetable" style="margin-right:auto; margin-left:auto;">
<tr style="font-weight:bold;"><td style="text-align:left;">Ville</td><td style="width:4.5em;">Fajr</td><td style="width:4.5em;">Dhouhr</td><td style="width:4.5em;">Asr</td><td style="width:4.5em;">Maghrib</td><td style="width:4.5em;">Isha</td></tr>

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
		if (${'country'.$i} == $country) 
			if (${'pop'.$i} > $top) {
			$top = ${'pop'.$i};
			$VilleLat = ${'lat'.$i};
			$VilleLong = ${'long'.$i};
			}
	}
	$limit = $top/9;
	
	for ($i=1; $i<=2400; $i++)
	{
		${'country'.$i} = getSuraData($i, 'country');
		${'continent'.$i} = getSuraData($i, 'continent');
		
		
		if ((${'country'.$i} == $country) && (${'pop'.$i} >= $limit))
		{
		${'city'.$i} = getSuraData($i, 'city'); 
		${'zone'.$i} = getSuraData($i, 'zone');
		
		${'ville'.$i} = str_replace(" ", "-", strtolower(getSuraData($i, 'city')));
	
		$index++; 
		
		if ($modulo%2) {$module = 'style="background-color: lightblue;"';} else {$module = "";}
		echo "<tr $module><td style=\"text-align:left;\"><a href=\"${'ville'.$i}.html\">${'city'.$i}</a></td><td><span id=\"fajr$index\"></span></td><td><span id=\"dhuhr$index\"></span></td><td><span id=\"asr$index\"></span></td><td><span id=\"maghrib$index\"></span></td><td><span id=\"isha$index\"></span></td></tr>";
		$modulo++;

$dateTimeZone = new DateTimeZone("${'zone'.$i}");
$dateTime = new DateTime("now", $dateTimeZone);
${'timezone'.$i} = ($dateTimeZone->getOffset($dateTimeZulu))/3600;
if ($country == "Maroc") ${'timezone'.$i} = ${'timezone'.$i};
?>
<script>
var tz = '<?=${'zone'.$i}?>';
var date = new Date();
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

<?php
	$ul = 0;
	for ($i=1; $i<=2400; $i++) 
	{
		${'city'.$i} = getSuraData($i, 'city'); 
		${'popa'.$i} = number_format(${'pop'.$i});
		${'ville'.$i} = str_replace(" ", "-", strtolower(getSuraData($i, 'city')));

	if ((${'country'.$i} == $country) && (${'pop'.$i} < $limit)) 
	{ 
	$table = 1;
	if ($ul == 0) echo "

<center><div style=\"width:100%; display:block; height:5px; background-color:slategray; margin:0px;\"></div></center>

<h3>Awkat salat pour des villes en $country</h3>

<p>Vous pouvez consulter les heures de prières pour d'autres villes en $country. Nous vous informons également du nombre d'habitants de chaque ville dans ce pays.</p> <table style=\"padding:0px; margin:0px;\"><tr><td style=\"padding:0px; margin:0px;\"><ul style=\"padding-top:0px; margin-top:0px;\">

"; 
	echo "<li style=\"line-height:180%; width: 250px; float: left;\">
		  <a href=\"${'ville'.$i}.html\">${'city'.$i}</a>
		  <span style=\"font-size:8pt;\">[${'popa'.$i}]</span></li>
		 "; 
		  $ul=1;
	};
 }; 
 
if ($table == 1) echo "</ul></td></tr></table>";	
 

?>
<br>