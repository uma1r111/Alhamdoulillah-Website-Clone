<script src="/horaires-prieres/js/moment-hijri.js"></script>
<?php
		$count=0;
		
		

		for ($i=1; $i<=1600; $i++) 
	{
		${'country'.$i} = getSuraData($i, 'countryAR');
		${'continent'.$i} = getSuraData($i, 'continentAR');
		${'pop'.$i} = getSuraData($i, 'pop');
	
		if (${'pop'.$i}>300000) {

		
		if ((${'continent'.$i} == $continent))
		{
		$count++;
		}}
	}
	echo "</ul>";

$timeStamp = time(); 

?>

<h1>جدول رمضان <?=$continent?></h1>

<?php include("../../../../inc/pub-content.php");?>

<p style="padding-top:20px;"><a href="/ar/prayer-times/ramadan/">تقويم رمضان</a> > <strong><?echo $continent?></strong></p>

<p>فيما يلي جداول رمضان <?echo "$count"?> مدن في <?echo $continent?>.</p>

<center><div style="width:100%; display:block; height:5px; background-color:slategray; margin:0px;"></div></center>

<img style="float:left; margin-left:25px; margin-top:20px; height:33px; width:45px;" src="/en/prayer-times/flags/<?=str_replace(" ", "-", strtolower($countryURL))?>.GIF">

<h2>تقويم رمضان <?=$continent?> (اليوم الأول)</h2>

<table class="timetable" style="margin-right:auto; margin-left:auto;">
<tr style="font-weight:bold;"><td style="text-align:right;">مدينة</td><td style="width:4.5em;">فجر [امسك]</td><td style="width:4.5em;">ظهر</td><td style="width:4.5em;">عصر</td><td style="width:4.5em;">مغرب [افطار]</td><td style="width:4.5em;">عشاء</td></tr>

<?php
		
	$index = 0;
	$modulo = 0;	
	
	
	$dateTimeZoneZulu = new DateTimeZone("Zulu");
	$dateTimeZulu = new DateTime("now", $dateTimeZoneZulu);
	
	for ($i=1; $i<=1600; $i++) 
	{
		${'pop'.$i} = getSuraData($i, 'pop');
		${'lat'.$i} = getSuraData($i, 'lat'); 
		${'long'.$i} = getSuraData($i, 'long');

		if ((${'continent'.$i} == $continent) && (${'pop'.$i} >= 300000))
		{
		${'city'.$i} = getSuraData($i, 'cityAR'); 
		${'cityURL'.$i} = getSuraData($i, 'city'); 
		${'zone'.$i} = getSuraData($i, 'zone'); 
		${'ville'.$i} = str_replace(" ", "-", strtolower(getSuraData($i, 'city')));
	
		${'pays'.$i} = str_replace(" ", "-", strtolower(getSuraData($i, 'country')));
	
	
		$index++; 
		
		if ($modulo%2) {$module = 'style="background-color: lightblue;"';} else {$module = "";}
		echo "<tr $module><td style=\"text-align:right;\"><a href=\"${'pays'.$i}/${'ville'.$i}.html\">${'city'.$i}</a></td><td><span id=\"fajr$index\"></span></td><td><span id=\"dhuhr$index\"></span></td><td><span id=\"asr$index\"></span></td><td><span id=\"maghrib$index\"></span></td><td><span id=\"isha$index\"></span></td></tr>";
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