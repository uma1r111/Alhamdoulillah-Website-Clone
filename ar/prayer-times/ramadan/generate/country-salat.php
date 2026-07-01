 <script src="/horaires-prieres/js/moment-hijri.js"></script>
 <?php
		$count=0;
		$compte =0;

		for ($i=1; $i<=1600; $i++) 
	{
		${'ville'.$i} = str_replace(" ", "-", strtolower(getSuraData($i, 'city')));
		${'country'.$i} = getSuraData($i, 'countryAR');
		${'population'.$i} = str_replace(" ", "-", strtolower(getSuraData($i, 'pop')));
	
	
	if (${'country'.$i} == $country) {
			if (${'population'.$i}>300000) {
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

<h1>جدول رمضان <?=$country?></h1>

<?php include("../../../../../inc/pub-content.php");?>

<p style="padding-top:20px;"><a href="/ar/prayer-times/ramadan/">تقويم رمضان</a> > <a href="/ar/prayer-times/ramadan/<?echo str_replace(" ", "-", strtolower($continentURL))?>/"><?echo $continent?></a> > <?echo $country?></strong></p>



<? if ($count == "1") $correct = "مدينة";?>
<? if ($count == "2") $correct = "مدينتين";?>
<? if ($count > "1") $correct = "مدن";?>
<? if ($count == "0") $correct = "مدينة";?>

<p>فيما يلي جداول رمضان <?echo "$count $correct"?> في <?echo $country?>.</p>

<center><div style="width:100%; display:block; height:5px; background-color:slategray; margin:0px;"></div></center>

<img style="float:left; margin-left:25px; margin-top:20px; height:33px; width:45px;"  src="/en/prayer-times/flags/<?=str_replace(" ", "-", strtolower($countryURL))?>.GIF">

<h2>تقويم رمضان <?=$country?> (اليوم الأول)</h2>

<table class="timetable" style="margin-right:auto; margin-left:auto;">
<tr style="font-weight:bold;"><td style="text-align:right;">مدينة</td><td style="width:4.5em;">فجر [امسك]</td><td style="width:4.5em;">ظهر</td><td style="width:4.5em;">عصر</td><td style="width:4.5em;">مغرب [افطار]</td><td style="width:4.5em;">عشاء</td></tr>
<?php
	
	$index = 0;
	$modulo = 0;	
	$top = 0;	
	
	$dateTimeZoneZulu = new DateTimeZone("Zulu");
	$dateTimeZulu = new DateTime("now", $dateTimeZoneZulu);
	
	for ($i=1; $i<=1600; $i++) 
	{
		${'pop'.$i} = getSuraData($i, 'pop');
		${'lat'.$i} = getSuraData($i, 'lat'); 
		${'long'.$i} = getSuraData($i, 'long');
		${'country'.$i} = getSuraData($i, 'countryAR');
		if (${'country'.$i} == $country) 
			if (${'pop'.$i} > $top) {
			$top = ${'pop'.$i};
			$VilleLat = ${'lat'.$i};
			$VilleLong = ${'long'.$i};
			}
	}
	$limit = 0;
	if ($count > 0) $limit = $top/5;
	
	for ($i=1; $i<=1600; $i++)
	{
		${'country'.$i} = getSuraData($i, 'country');
		${'countryAR'.$i} = getSuraData($i, 'countryAR');
		${'continent'.$i} = getSuraData($i, 'continent');
		
		
		
		if ((${'countryAR'.$i} == $country) && (${'pop'.$i} >= $limit))
		{
		${'city'.$i} = getSuraData($i, 'cityAR'); 
		${'zone'.$i} = getSuraData($i, 'zone');
		${'ville'.$i} = str_replace(" ", "-", strtolower(getSuraData($i, 'city')));
		${'conti'.$i} = str_replace(" ", "-", strtolower(getSuraData($i, 'continent')));
		${'conti'.$i} = str_replace(" ", "-", strtolower(getSuraData($i, 'continent')));
		${'countr'.$i} = str_replace(" ", "-", strtolower(getSuraData($i, 'country')));
	
		${'url'.$i} = "${'ville'.$i}.html";
		
		
	
		$index++; 
		
		if ($modulo%2) {$module = 'style="background-color: lightblue;"';} else {$module = "";}
		
		
		if (file_exists(${'url'.$i})) echo "<tr $module><td style=\"text-align:right;\"><a href=\"${'ville'.$i}.html\">${'city'.$i}</a></td><td><span id=\"fajr$index\"></span></td><td><span id=\"dhuhr$index\"></span></td><td><span id=\"asr$index\"></span></td><td><span id=\"maghrib$index\"></span></td><td><span id=\"isha$index\"></span></td></tr>";
		
		if (!file_exists(${'url'.$i})) echo "<tr $module><td style=\"text-align:right;\">${'city'.$i}</td><td><span id=\"fajr$index\"></span></td><td><span id=\"dhuhr$index\"></span></td><td><span id=\"asr$index\"></span></td><td><span id=\"maghrib$index\"></span></td><td><span id=\"isha$index\"></span></td></tr>";
		
		
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
	for ($i=1; $i<=24000; $i++) 
	{
		${'city'.$i} = getSuraData($i, 'city'); 
		${'ville'.$i} = str_replace(" ", "-", strtolower(getSuraData($i, 'city')));
		if (${'population'.$i}>300000) {

	if ((${'country'.$i} == $country) && (${'pop'.$i} < $limit)) 
	{ 
	$table = 1;
	if ($ul == 0) echo "

<center><div style=\"width:100%; display:block; height:5px; background-color:slategray; margin:0px;\"></div></center>

<h3>عكات رمضان لمدن أخرى في $country</h3>

<p>هنا التقويم رمضان لمدن أخرى في $country.</p> <table style=\"padding:0px; margin:0px;\"><tr><td style=\"padding:0px; margin:0px;\"><ul style=\"padding-top:0px; margin-top:0px;\">

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