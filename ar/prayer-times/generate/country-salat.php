 <?php
		$count=0;

		for ($i=1; $i<=23100; $i++) 
	{
		${'country'.$i} = getSuraData($i, 'countryAR');
		
		if (${'country'.$i} == $country) 
		{
		$count++;
		}
	}
	echo "</ul>";

$timeStamp = time(); 

?>

<h1>أوقات الصلاة في <?=$country?></h1>

<?php include("../../../../../inc/pub-content.php");?>

<p><a href="/ar/prayer-times/world/">العالم</a> > <a href="/ar/prayer-times/world/<?echo str_replace(" ", "-", $continent)?>/"><?echo $continentLien?></a> > <?echo $country?></strong></p>

<p>هنا أوقات الصلاة ل <?echo number_format($count)?> مدن في <?echo $country?>.</p>

<center><div style="width:100%; display:block; height:5px; background-color:slategray; margin:0px;"></div></center>

<img style="float:left; margin-left:25px; margin-top:15px; height:33px; width:45px;" src="/ar/prayer-times/flags/<?=str_replace(" ", "-", strtolower($lien))?>.GIF">

<h2>مواقيت الصلاة في <?=$country?></h2>


<table class="timetable" style="margin-right:auto; margin-left:auto;">
<tr style="font-weight:bold;"><td style="text-align:right;">مدينة</td><td style="width:4.5em;">الفجر</td><td style="width:4.5em;">الظهر</td><td style="width:4.5em;">العصر </td><td style="width:4.5em;">المغرب</td><td style="width:4.5em;">العشاء</td></tr>

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
	
	for ($i=1; $i<=23100; $i++)
	{
		${'country'.$i} = getSuraData($i, 'countryAR');
		${'continent'.$i} = getSuraData($i, 'continent');
		
		
		if ((${'country'.$i} == $country) && (${'pop'.$i} >= $limit))
		{
		${'city'.$i} = getSuraData($i, 'cityAR'); 
		${'zone'.$i} = getSuraData($i, 'zone');
		${'ville'.$i} = str_replace(" ", "-", strtolower(getSuraData($i, 'city')));
	
		$index++; 
		
		if ($modulo%2) {$module = 'style="background-color: lightblue;"';} else {$module = "";}
		echo "<tr $module><td style=\"text-align:right;\"><a href=\"${'ville'.$i}.html\">${'city'.$i}</a></td><td><span id=\"fajr$index\"></span></td><td><span id=\"dhuhr$index\"></span></td><td><span id=\"asr$index\"></span></td><td><span id=\"maghrib$index\"></span></td><td><span id=\"isha$index\"></span></td></tr>";
		$modulo++;

$dateTimeZone = new DateTimeZone("${'zone'.$i}");
$dateTime = new DateTime("now", $dateTimeZone);
${'timezone'.$i} = ($dateTimeZone->getOffset($dateTimeZulu))/3600;
if ($country == "المغرب") ${'timezone'.$i} = ${'timezone'.$i}+1;
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
	for ($i=1; $i<=23100; $i++) 
	{
		${'city'.$i} = getSuraData($i, 'cityAR'); 
		${'popa'.$i} = number_format(${'pop'.$i});
		${'ville'.$i} = str_replace(" ", "-", strtolower(getSuraData($i, 'city')));

	if ((${'country'.$i} == $country) && (${'pop'.$i} < $limit)) 
	{ 
	$table = 1;
	if ($ul == 0) echo "

<center><div style=\"width:100%; display:block; height:5px; background-color:slategray; margin:0px;\"></div></center>

<h3>وقت الصلاة في مدن $country</h3>

<p>يمكنك أن ترى أوقات الصلاة لمدن أخرى في $country. بالمناسبة، نبلغكم عدد السكان لكل مدينة في هذا البلد.</p> <table style=\"padding:0px; margin:0px;\"><tr><td style=\"padding:0px; margin:0px;\"><ul style=\"padding-top:0px; margin-top:0px;\">

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