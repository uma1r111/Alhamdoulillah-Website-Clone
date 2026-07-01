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

<h1>أوقات الصلاة</h1>

<?php include("../../inc/pub-content.php");?>


<p>أوقات الصلاة > <strong>فهرس</strong></p>

<p width="100%">احصل على أوقات الصلاة ل <?echo number_format($count)?> مدن في جميع أنحاء العالم. يتم تجميع التقويمات صلاة من القارات. فقط انقر على البلد أو المدينة التي تريد أن ترى. ثم لكل مدينة، يمكنك ضبط الإعدادات إذا لزم الأمر، وفقا لبلدكم. يمكنك تغيير طريقة الحساب، حساب زاوية أسر أو ساعة التنسيق.</p>

<center><div style="width:100%; display:block; height:5px; background-color:slategray; margin:0px;"></div></center>

<img style="float:left; margin-left:25px; margin-top:15px; height:33px; width:45px;" src="/ar/prayer-times/flags/saudi-arabia.GIF">

<h2>التقويم صلاة</h2>

<p>أنظر أيضا : <a href="ramadan/">تقويم رمضان</a></p>

 <?php
 
 $arr = array("europe", "asia", "africa", "north-america", "south-america", "oceania", "central-america", "caribbean");
	
	foreach ($arr as $variable){

	$link = ucfirst(str_replace("-", " ", strtolower($variable)));
	
	if ($variable == "europe") $separation = "أوروبا";
	if ($variable == "asia") $separation = "آسيا";
	if ($variable == "africa") $separation = "أفريقيا";
	if ($variable == "north-america") $separation = "أمريكا الشمالية";
	if ($variable == "south-america") $separation = "امريكا الجنوبية";
	if ($variable == "central-america") $separation = "امريكا الوسطى";
	if ($variable == "oceania") $separation = "أوقيانوسيا";
	if ($variable == "caribbean") $separation = "منطقة البحر الكاريبي";
	
	echo "<div style=\"width:100%; background-color:lightgray;\"><h3><u><a href=\"world/$variable\">أوقات الصلاة $separation</a></u></h3></div>";?>
	
	<table style="padding:0px; margin:0px;"><tr><td style="padding:0px; margin:0px;"><ul style="padding-top:0px; margin-top:0px;">
	
 	 

 <?php
 
 for ($i=1; $i<=23100; $i++) 
	{
		${'country'.$i} = getSuraData($i, 'country');
		${'continentAR'.$i} = getSuraData($i, 'continentAR');
		${'countryAR'.$i} = getSuraData($i, 'countryAR');
		${'lien'.$i} = str_replace(" ", "-", strtolower(getSuraData($i, 'country')));
		${'loup'.$i} = str_replace(" ", "-", strtolower(getSuraData($i, 'continent')));
		
		
		if ((${'continentAR'.$i} == $separation) && (${'countryAR'.$i} !== ${'countryAR'.$compare}))
		{
		echo "<li style=\"line-height:250%; margin-right:-15px; list-style-type:none; width: 270px; float: right;\"><img style=\"padding:10px; height:33px; width:45px; vertical-align:middle\"; src=\"/ar/prayer-times/flags/${'lien'.$i}.GIF\"><a href=\"/ar/prayer-times/world/${'loup'.$i}/${'lien'.$i}\">${'countryAR'.$i}</a></li>"; 
		}
		$compare= $i;
	}
	 
	
?>	 
	 

</ul></td></tr></table>
	

	<?php }?>
<br>