 <script src="/horaires-prieres/js/moment-hijri.js"></script>
 <?php
		$count=0;
		$compte =0;

		for ($i=1; $i<=2400; $i++) 
	{
		${'ville'.$i} = str_replace(" ", "-", strtolower(getSuraData($i, 'city')));
		${'country'.$i} = getSuraData($i, 'country');
		${'population'.$i} = str_replace(" ", "-", strtolower(getSuraData($i, 'pop')));
	
	
	if (${'country'.$i} == $country) {
			if (${'population'.$i}>100000) {
			${'url'.$i} = "${'ville'.$i}.html";
			if (file_exists(${'url'.$i})) $count++;
			}
			$compte++;
		}	
			
		
	}
	echo "</ul>";

$timeStamp = time(); 

if ($count == "0") $count = $compte;

?>

<h1>Horaire Ramadan <?=$country?></h1>

<?php include("../../../../inc/pub-content.php");?>

<p style="padding-top:20px;"><a href="/horaires-prieres/ramadan/">Calendrier Ramadan</a> > <a href="/horaires-prieres/ramadan/<?echo str_replace(" ", "-", strtolower($continent))?>/"><?echo $continent?></a> > <?echo $country?></strong></p>



<? if ($count == "1") $correct = "ville";?>
<? if ($count > "1") $correct = "villes";?>
<? if ($count == "0") $correct = "ville";?>

<p>Voici les horaires du Ramadan pour <?echo "$count $correct"?> en <?echo $country?>.</p>

<center><div style="width:100%; display:block; height:5px; background-color:slategray; margin:0px;"></div></center>

<img style="float:right; margin-right:25px; margin-top:9px; height:33px; width:45px;" src="/horaires-prieres/flags/<?=str_replace(" ", "-", strtolower($country))?>.GIF">

<h2>Calendrier Ramadan <?=$country?> (1er jour)</h2>

<table class="timetable" style="margin-right:auto; margin-left:auto;">
<tr style="font-weight:bold;"><td style="text-align:left;">Ville</td><td style="width:4.5em;">Fajr [Imsak]</td><td style="width:4.5em;">Dhouhr</td><td style="width:4.5em;">Asr</td><td style="width:4.5em;">Maghrib [Iftar]</td><td style="width:4.5em;">Isha</td></tr>

<?php
	
	$index = 0;
	$modulo = 0;	
	$top = 0;	
	
	$dateTimeZoneZulu = new DateTimeZone("Zulu");
	$dateTimeZulu = new DateTime("now", $dateTimeZoneZulu);
	
	for ($i=1; $i<=2400; $i++) 
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
	$limit = 0;
	if ($count > 0) $limit = $top/5;
	
	for ($i=1; $i<=2400; $i++)
	{
		${'country'.$i} = getSuraData($i, 'country');
		${'continent'.$i} = getSuraData($i, 'continent');
		
		
		
		if ((${'country'.$i} == $country) && (${'pop'.$i} >= $limit))
		{
		${'city'.$i} = getSuraData($i, 'city'); 
		${'zone'.$i} = getSuraData($i, 'zone');
		${'ville'.$i} = str_replace(" ", "-", strtolower(getSuraData($i, 'city')));
		${'conti'.$i} = str_replace(" ", "-", strtolower(getSuraData($i, 'continent')));
		${'conti'.$i} = str_replace(" ", "-", strtolower(getSuraData($i, 'continent')));
		${'countr'.$i} = str_replace(" ", "-", strtolower(getSuraData($i, 'country')));
	
		${'url'.$i} = "${'ville'.$i}.html";
		
		
	
		$index++; 
		
		if ($modulo%2) {$module = 'style="background-color: lightblue;"';} else {$module = "";}
		
		
		if (file_exists(${'url'.$i})) echo "<tr $module><td style=\"text-align:left;\"><a href=\"${'ville'.$i}.html\">${'city'.$i}</a></td><td><span id=\"fajr$index\"></span></td><td><span id=\"dhuhr$index\"></span></td><td><span id=\"asr$index\"></span></td><td><span id=\"maghrib$index\"></span></td><td><span id=\"isha$index\"></span></td></tr>";
		
		if (!file_exists(${'url'.$i})) echo "<tr $module><td style=\"text-align:left;\">${'city'.$i}</td><td><span id=\"fajr$index\"></span></td><td><span id=\"dhuhr$index\"></span></td><td><span id=\"asr$index\"></span></td><td><span id=\"maghrib$index\"></span></td><td><span id=\"isha$index\"></span></td></tr>";
		
		
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

<?php include("../../../../inc/share.php");?>

<br>

<?php
	$ul = 0;
	for ($i=1; $i<=2400; $i++) 
	{
		${'city'.$i} = getSuraData($i, 'city'); 
		${'ville'.$i} = str_replace(" ", "-", strtolower(getSuraData($i, 'city')));
		if (${'population'.$i}>100000) {

	if ((${'country'.$i} == $country) && (${'pop'.$i} < $limit)) 
	{ 
	$table = 1;
	if ($ul == 0) echo "

<center><div style=\"width:100%; display:block; height:5px; background-color:slategray; margin:0px;\"></div></center>

<h3>Awkat Ramadan pour les villes en $country</h3>

<p>Voici le calendrier du mois de jeûne de Ramadan d'autres villes en $country.</p> <table style=\"padding:0px; margin:0px;\"><tr><td style=\"padding:0px; margin:0px;\"><ul style=\"padding-top:0px; margin-top:0px;\">

"; 
	echo "<li style=\"line-height:180%; width: 250px; float: left;\">
		  <a href=\"${'ville'.$i}.html\">${'city'.$i}</a>
		 "; 
		  $ul=1;
	};
 }; 
	}
 
if ($table == 1) echo "</ul></td></tr></table>";	
 

?>
<br>