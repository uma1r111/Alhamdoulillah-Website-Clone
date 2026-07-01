<?php
		$count=0;
		
		

		for ($i=1; $i<=23100; $i++) 
	{
		${'country'.$i} = getSuraData($i, 'country');
		${'continent'.$i} = getSuraData($i, 'continentAR');
		
		
		if ((${'continent'.$i} == $continent))
		{
		$count++;
		}
	}
	

$timeStamp = time(); 

?>

<h1>أوقات الصلاة في <?=$continent?></h1>

<p style="padding-top:20px;"><a href="/ar/prayer-times/world/">العالم</a> > <strong><?echo $continent?></strong></p>

<p>هنا أوقات الصلاة ل <?echo number_format($count)?> مدن في <?echo $continent?>.</p>

<center><div style="width:100%; display:block; height:5px; background-color:slategray; margin:0px;"></div></center>

<img style="float:left; margin-left:25px; margin-top:15px; height:33px; width:45px;" src="/ar/prayer-times/flags/<?=str_replace(" ", "-", strtolower($lien))?>.GIF">

<h2>مواقيت الصلاة <?=$continent?></h2>

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
		${'cityAR'.$i} = getSuraData($i, 'cityAR'); 
		${'zone'.$i} = getSuraData($i, 'zone'); 
		${'ville'.$i} = str_replace(" ", "-", strtolower(getSuraData($i, 'city')));
	
		${'pays'.$i} = str_replace(" ", "-", strtolower(${'country'.$i}));
	
	
		$index++; 
		
		if ($modulo%2) {$module = 'style="background-color: lightblue;"';} else {$module = "";}
		echo "<tr $module><td style=\"text-align:right;\"><a href=\"${'pays'.$i}/${'ville'.$i}.html\">${'cityAR'.$i}</a></td><td><span id=\"fajr$index\"></span></td><td><span id=\"dhuhr$index\"></span></td><td><span id=\"asr$index\"></span></td><td><span id=\"maghrib$index\"></span></td><td><span id=\"isha$index\"></span></td></tr>";
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


<center><div style="width:100%; display:block; height:5px; background-color:slategray; margin:0px;"></div></center>

<h3>وقت الصلاة في <?=$continent?> بلدان</h3>

<p>يمكنك ان ترى أوقات الصلاة ل <?echo number_format($count)?> بلدان في<?=$continent?> : </p>

<table style="padding:0px; margin:0px;"><tr><td style="padding:0px; margin:0px;"><ul style="padding-top:0px; margin-top:0px;">


 <?php
 
 for ($i=1; $i<=23100; $i++) 
	{
		${'country'.$i} = getSuraData($i, 'country');
		${'countryAR'.$i} = getSuraData($i, 'countryAR');
		${'lien'.$i} = str_replace(" ", "-", strtolower(getSuraData($i, 'country')));
		
		
		if ((${'continent'.$i} == $continent) && (${'countryAR'.$i} !== ${'countryAR'.$compare}))
		{
		echo "<li style=\"line-height:250%; margin-right:-15px; list-style-type:none; width: 270px; float: right;\"><img style=\"padding:10px; height:33px; width:45px; vertical-align:middle\"; src=\"/ar/prayer-times/flags/${'lien'.$i}.GIF\"><a href=\"${'lien'.$i}\">${'countryAR'.$i}</a></li>"; 
		}
		$compare= $i;
	}
	 
	 

?>

</ul></td></tr></table>
 

<br>