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

<h1>أوقات الصلاة عبر العالم</h1>

<?php include("../../../inc/pub-content.php");?>



<p><a href="/ar/prayer-times/">أوقات الصلاة</a> > <strong>العالم</strong></p>

<p>هنا أوقات الصلاة ل <?echo number_format($count)?> مدينة حول العالم.</p>

<center><div style="width:100%; display:block; height:5px; background-color:slategray; margin:0px;"></div></center>

<img style="float:left; margin-left:25px; margin-top:15px; height:33px; width:45px;" src="/ar/prayer-times/flags/saudi-arabia.GIF">

<h2>مواقيت الصلاة العالمية</h2>

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
	
	if ($variable == "Europe") $separation = "أوروبا";
	if ($variable == "Asia") $separation = "آسيا";
	if ($variable == "Africa") $separation = "أفريقيا";
	if ($variable == "North America") $separation = "أمريكا الشمالية";
	if ($variable == "South America") $separation = "امريكا الجنوبية";
	if ($variable == "Central America") $separation = "امريكا الوسطى";
	if ($variable == "Oceania") $separation = "أوقيانوسيا";
	if ($variable == "Caribbean") $separation = "منطقة البحر الكاريبي";
	
	
echo "	<div style=\"width:100%; background-color:lightgray;\"><h3><u><a href=\"$link\">$separation</a></u></h3></div>

<table class=\"timetable\" style=\"margin-right:auto; margin-left:auto;\">
<tr style=\"font-weight:bold;\"><td style=\"text-align:right;\">مدينة</td><td style=\"width:4.5em;\">الفجر</td><td style=\"width:4.5em;\">الظهر</td><td style=\"width:4.5em;\">العصر </td><td style=\"width:4.5em;\">المغرب</td><td style=\"width:4.5em;\">العشاء</td></tr>

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
		${'city'.$i} = getSuraData($i, 'cityAR'); 
		${'zone'.$i} = getSuraData($i, 'zone'); 
		${'ville'.$i} = str_replace(" ", "-", strtolower(getSuraData($i, 'city')));
	
		${'pays'.$i} = str_replace(" ", "-", strtolower(${'country'.$i}));
		${'cont'.$i} = str_replace(" ", "-", strtolower(${'continent'.$i}));
	
	
		$index++; 
		
		if ($modulo%2) {$module = 'style="background-color: lightblue;"';} else {$module = "";}
		echo "<tr $module><td style=\"text-align:right;\"><a href=\"${'cont'.$i}/${'pays'.$i}/${'ville'.$i}.html\">${'city'.$i}</a></td><td><span id=\"fajr$index\"></span></td><td><span id=\"dhuhr$index\"></span></td><td><span id=\"asr$index\"></span></td><td><span id=\"maghrib$index\"></span></td><td><span id=\"isha$index\"></span></td></tr>";
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

<h3>وقت الصلاة لبلدان العالم</h3>

<p>إذا كنت لم تجد مدينتك، يرجى النقر على القارة لمعرفة المزيد من أوقات الصلاة في بلدك وسوف تجده إنشا الله.</p>

<table style="padding:0px; margin:0px;"><tr><td style="padding:0px; margin:0px;"><ul style="padding-top:0px; margin-top:0px;">


  <?php
 
 		
		$arr = array("أوروبا","آسيا","أفريقيا","أمريكا الشمالية","أمريكا الجنوبية","أوقيانوسيا","أمريكا الوسطى","الكاريبي");
		
		
	
		foreach ($arr as $variables){

			if ($variables == "أوروبا") $lien = "europe";
			if ($variables == "آسيا") $lien = "asia";
			if ($variables == "أمريكا الوسطى") $lien = "central-america";
			if ($variables == "أمريكا الجنوبية") $lien = "south-america";
			if ($variables == "أمريكا الشمالية") $lien = "north-america";
			if ($variables == "أفريقيا") $lien = "africa";
			if ($variables == "الكاريبي") $lien = "caribbean";
			if ($variables == "أوقيانوسيا") $lien = "oceania";
		
		
		echo "<li style=\"line-height:250%; margin-right:-15px; list-style-type:none; width: 270px; float: right;\"><img style=\"padding:10px; height:33px; width:45px; vertical-align:middle\"; src=\"/ar/prayer-times/flags/$lien.GIF\"><a href=\"$lien\">$variables</a></li>"; 
		}

	 
	 

?>

</ul></td></tr></table>
 

<br>