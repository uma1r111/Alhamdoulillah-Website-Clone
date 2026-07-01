<?php

	include("../../../generate/praytime.php");
	
	$latitude = $VilleLat;
	$longitude = $VilleLong;
	
	$zone = $VilleZone;
	$timediff = new DateTime('noon', new DateTimeZone($zone));
	$timeZone = ($timediff->getOffset())/3600;
	
	 if ($VillePays == "المغرب") $timeZone = $timeZone;

	session_start();
	
	// réglages par défaut
	
	if ($VillePays == "فرنسا") {
		$choix = "المنظمات الإسلامية اتحاد فرنسا (أويف)<br>الفجر : 12° | العشاء : 12°";
		$method = 0;
	}
	if ($VillePays !== "فرنسا") {
		$choix = "رابطة العالم الإسلامي (مول)<br>الفجر : 18° | العشاء : 17°";
		$method = 2;
	}
	if ($VillePays == "المملكة العربية السعودية") {
		$method = 3; 
		$choix = "جامعة أم القرى، مكة المكرمة<br>الفجر : 18.5° | العشاء : 90 د";
	}
	$heure = 1;
	$asr = 0;

	if ($_POST['heure'] == '0') { 
	$heure = 0; 
	$_SESSION['heure'] = $heure;
	$method = $_SESSION['method'];
	$asr = $_SESSION['asr'];
	}
	
	if ($_POST['heure'] == '1') { 
	$heure = 1; 
	$_SESSION['heure'] = $heure;
	$method = $_SESSION['method'];
	$asr = $_SESSION['asr'];
	}
	
	if ($_POST['asr'] == 'Standard') { 
	$asr = 0; 
	$_SESSION['asr'] = $asr;
	$method = $_SESSION['method'];
	$heure = $_SESSION['heure'];
	}
	
	if ($_POST['asr'] == 'Hanafi') {
	$asr = 1; 
	$_SESSION['asr'] = $asr;
	$method = $_SESSION['method'];
	$heure = $_SESSION['heure'];
	}
	
	if ($_POST['method'] == 'UOIF') { 
	$method = 0; 
	$choix = "المنظمات الإسلامية اتحاد فرنسا (أويف)<br>الفجر : 12° | العشاء : 12°";
	$_SESSION['method'] = $method;
	$heure = $_SESSION['heure'];
	$asr = $_SESSION['asr'];
	} 
	
	if ($_POST['method'] == 'ISNA') { 
	$method = 1; 
	$choix = "الجمعية الإسلامية لأمريكا الشمالية (إيسنا)<br>الفجر : 15° | العشاء : 15°";
	$_SESSION['method'] = $method;
	$heure = $_SESSION['heure'];
	$asr = $_SESSION['asr'];
	} 
	
	if ($_POST['method'] == 'MWL') { 
	$method = 2; 
	$choix = "رابطة العالم الإسلامي (مول)<br>الفجر : 18° | العشاء : 17°";
	$_SESSION['method'] = $method;
	$heure = $_SESSION['heure'];
	$asr = $_SESSION['asr'];
	}
	
	if ($_POST['method'] == 'Makkah') { 
	$method = 3; 
	$choix = "جامعة أم القرى، مكة المكرمة<br>الفجر : 18.5° | العشاء : 90 د";
	$_SESSION['method'] = $method;
	$heure = $_SESSION['heure'];
	$asr = $_SESSION['asr'];
	} 

	if ($_POST['method'] == 'Egypt') {
	$method = 4;
	$choix = "الهيئة المصرية العامة للمساحة<br>الفجر : 19.5° | العشاء : 17.5°";
	$_SESSION['method'] = $method;
	$heure = $_SESSION['heure'];
	$asr = $_SESSION['asr'];
	} 

	if ($_POST['method'] == 'Karachi') {
	$method = 5; 
	$choix = "جامعة العلوم الإسلامية، كراتشي<br>الفجر : 18° | العشاء : 18°";
	$_SESSION['method'] = $method;
	$heure = $_SESSION['heure'];
	$asr = $_SESSION['asr'];
	} 

	if ($_POST['method'] == 'Tehran') {
	$method = 6;
	$choix = "معهد الجيوفيزياء، جامعة طهران<br>الفجر : 17.7° | العشاء : 14°";
	$_SESSION['method'] = $method;
	$heure = $_SESSION['heure'];
	$asr = $_SESSION['asr'];
	} 
	
	$jour = time();
	
	// horaires journaliers pour l'intro
	$prayTimeIntro = new PrayTime(2);
	$prayTimeIntro->setAsrMethod($asr);
	$prayTimeIntro->setTimeFormat(1);
	$timesIntro = $prayTimeIntro->getPrayerTimes($jour, $latitude, $longitude, $timeZone);
	$fajrIntro = $timesIntro[0];
	$maghribIntro = $timesIntro[5];
	
	$prayTimeIntrobis = new PrayTime(0);
	$prayTimeIntrobis->setAsrMethod($asr);
	$prayTimeIntrobis->setTimeFormat(1);
	$timesIntrobis = $prayTimeIntrobis->getPrayerTimes($jour, $latitude, $longitude, $timeZone);
	$fajrIntrobis = $timesIntrobis[0];
	
	// horaires journaliers sur l'index
	$prayTimeIndex = new PrayTime($method);
	$prayTimeIndex->setAsrMethod($asr);
	$timesIndex = $prayTimeIndex->getPrayerTimes($jour, $latitude, $longitude, $timeZone);
	
	// horaires journaliers sur le tableau
	$prayTimeDay = new PrayTime($method);
	$prayTimeDay->setTimeFormat($heure);
	$prayTimeDay->setAsrMethod($asr);
	$timesDay = $prayTimeDay->getPrayerTimes($jour, $latitude, $longitude, $timeZone);
	
	// horaires journaliers pour le compteur
	$prayTimeCount = new PrayTime($method);
	$prayTimeCount->setAsrMethod($asr);
	$timesCount = $prayTimeCount->getPrayerTimes($jour, $latitude, $longitude, $timeZone);
	$fajrCount = $timesIndex[0];
	$dhouhrCount = $timesIndex[2];
	$asrCount = $timesIndex[3];
	$maghribCount = $timesIndex[5];
	$ishaCount = $timesIndex[6];
	
	$drouk = date_create('now');
	$now = date_format($drouk, 'H:i');

if ($now < $fajrCount) {
   $nextsalat  = "الفجر";
   $nextsalatCount   = $fajrCount;
   };   
   
if (($now > $fajrCount) && ($now < $dhouhrCount)) {
   $nextsalat  = "الظهر";
   $nextsalatCount   = $dhouhrCount;
   };
   
if (($now > $dhouhrCount) && ($now < $asrCount)) {
   $nextsalat  = "العصر";
   $nextsalatCount   = $asrCount;
   };
   
if (($now > $asrCount) && ($now < $maghribCount)) {
   $nextsalat  = "المغرب";
   $nextsalatCount   = $maghribCount;
   };
   
if (($now > $maghribCount) && ($now < $ishaCount)) {
   $nextsalat  = "العشاء";
   $nextsalatCount = $ishaCount;
   };
   
if ($now > $ishaCount) {
   $nextsalat  = "الفجر";
   $nextsalatCount = $fajrCount2;
   };

   $start = new DateTime($now);
   $fin = new DateTime($nextsalatCount);

   $diff  = $start->diff($fin);
   $diff = $diff->format("%H:%I"); 
   $adhan = explode(":", $diff);
	   
	include ("../../../../inc/hijri.php"); 
	$timing = new uCall;
	$timing->setLang("ar");

	$moishijri = $timing->date("F");

?> 


<link rel="stylesheet" type="text/css" href="/ar/css/islam.css"> 

<h1>وقت الصلاة <?echo $VilleNom?></h1>

<p style="padding-top:20px;"><a href="/ar/prayer-times/world/">العالم</a> > <a href="/ar/prayer-times/world/<?echo str_replace(" ", "-", strtolower($VilleContinentURL));?>/"><?echo $VilleContinent?></a> > <a href="/ar/prayer-times/world/<?echo str_replace(" ", "-", strtolower($VilleContinentURL));?>/<? echo str_replace(" ", "-", strtolower($VillePaysURL))?>/"><?echo $VillePays?></a> > <strong><?echo $VilleNom?></strong></p>

<img alt="salat <?echo $VilleNom?>" id="stamp" src="/images/prayer-time.webp">

<p><b><u><a href="#today"><span style="color:black;">اليوم</span></a></u></b> : <?php setlocale (LC_ALL, 'ar_AE.utf8'); echo strftime("%A %d %B %Y");?></p>

<ul>
	<li><b>الفجر</b> : <?php echo $timesIndex[0];?></li>
	<li>الشروق : <?php echo $timesIndex[1];?></li>
	<li><b>الظهر</b> : <?php echo $timesIndex[2];?></li>
	<li>العصر : <?php echo $timesIndex[3];?></li>
	<li><b>المغرب</b> : <?php echo $timesIndex[5];?></li>
	<li>العشاء : <?php echo $timesIndex[6];?></li>
</ul>

<p>ما هي أوقات الصلاة في <?echo $VilleNom?> <? if(!empty($code)) echo "$code ";?> في <?echo $VillePays?> ؟ تبدأ صلاة الفجر في <?echo $VilleNom?> على الساعة <?php echo $fajrIntro;?> وفقا لرابطة العالم الإسلامي وصلاة المغرب في <?php echo $maghribIntro;?>. المسافة من <?echo $VilleNom?> [خط العرض : <?=$VilleLat?>، خط الطول : <?=$VilleLong?>] إلى مكة المكرمة هيا <span id="QRhumbDistance" class="QValue"></span>. عدد السكان في <?echo $VilleNom?> هو <?echo number_format($VillePop)?>.</p>

<center><div style="width:100%; display:block; height:5px; background-color:slategray; margin:0px;"></div></center>


<h2>مواقيت الصلاة <?echo $VilleNom?></h2>


<?php include("../../../../inc/share.php");?>

<p>ما هو الوقت صلاة في <?echo $VilleNom?> ؟</p>

<ul>
<li><a href="#jour"/>اليوم</a></li>
<li><a href="#semaine">هذا الاسبوع</a></li>
<li><a href="#vendredi">أيام الجمعة</a></li>
<li><a href="#mois">هذا الشهر (<?php echo strftime("%B");?>)</a></li>
<li><a href="#hijri">وفقا للتقويم الهجري (<?php echo $moishijri;?>)</a></li>
</ul>


<table id="today" cellpadding="10" style="width: 100%; border: 1px solid gray; text-align: center;">

<tr><td style="height:50px; background-color:lightblue;" colspan="6">الصلاة القادمة هي :<br><br>
<span style="font-size:15pt;"><?php echo $nextsalat;?></span> حان الوقت في : <span style="font-size:15pt;"><?php echo "$adhan[0]";?></span> س <span style="font-size:15pt;"><?php echo "$adhan[1]";?></span> د</td></tr>

</table>

<a name="jour"></a><h3>وقت صلاة في <?echo $VilleNom?> لهذا اليوم، <? echo date("d/m/Y");?> :</h3>

<table class="timetable">
	<tbody><tr>
	<td <?php if ($nextsalatCount == $timesIndex[0]) echo "class=\"dayadhantab\""; else {echo "class=\"daytable\"";}?>>الفجر</td>
	<td <?php if ($nextsalatCount == $timesIndex[1]) echo "class=\"dayadhantab\""; else {echo "class=\"daytable\"";}?>>الشروق</td>
	<td <?php if ($nextsalatCount == $timesIndex[2]) echo "class=\"dayadhantab\""; else {echo "class=\"daytable\"";}?>>الظهر</td>
	<td <?php if ($nextsalatCount == $timesIndex[3]) echo "class=\"dayadhantab\""; else {echo "class=\"daytable\"";}?>>العصر</td>
	<td <?php if ($nextsalatCount == $timesIndex[5]) echo "class=\"dayadhantab\""; else {echo "class=\"daytable\"";}?>>المغرب</td>
	<td <?php if ($nextsalatCount == $timesIndex[6]) echo "class=\"dayadhantab\""; else {echo "class=\"daytable\"";}?>>العشاء</td>
	</tr>
	<?
	$Tfajr = explode(" ", $timesDay[0]);
	$Tchourouq = explode(" ", $timesDay[1]);
	$Tdhouhr = explode(" ", $timesDay[2]);
	$Tasr = explode(" ", $timesDay[3]);
	$Tmaghrib = explode(" ", $timesDay[5]);
	$Tisha = explode(" ", $timesDay[6]);
	?>
	<tr>
	<td <?php if ($nextsalatCount == $timesIndex[0]) echo "class=\"dayadhan\""; else {echo "class=\"daydigit\"";}?>><span class="timeinday"><?php echo $Tfajr[0];?></span><br><span class="suffixe"><?php echo $Tfajr[1];?></span></td>
	<td <?php if ($nextsalatCount == $timesIndex[1]) echo "class=\"dayadhan\""; else {echo "class=\"daydigit\"";}?>><span class="timeinday"><?php echo $Tchourouq[0];?></span><br><span class="suffixe"><?php echo $Tchourouq[1];?></span></td>
	<td <?php if ($nextsalatCount == $timesIndex[2]) echo "class=\"dayadhan\""; else {echo "class=\"daydigit\"";}?>><span class="timeinday"><?php echo $Tdhouhr[0];?></span><br><span class="suffixe"><?php echo $Tdhouhr[1];?></span></td>
	<td <?php if ($nextsalatCount == $timesIndex[3]) echo "class=\"dayadhan\""; else {echo "class=\"daydigit\"";}?>><span class="timeinday"><?php echo $Tasr[0];?></span><br><span class="suffixe"><?php echo $Tasr[1];?></span></td>
	<td <?php if ($nextsalatCount == $timesIndex[5]) echo "class=\"dayadhan\""; else {echo "class=\"daydigit\"";}?>><span class="timeinday"><?php echo $Tmaghrib[0];?></span><br><span class="suffixe"><?php echo $Tmaghrib[1];?></span></td>
	<td <?php if ($nextsalatCount == $timesIndex[6]) echo "class=\"dayadhan\""; else {echo "class=\"daydigit\"";}?>><span class="timeinday"><?php echo $Tisha[0];?></span><br><span class="suffixe"><?php echo $Tisha[1];?></span></td>
	</tr></tbody>
</table>

<p style="color:gray"><?php echo $choix;?></p>

<table cellpadding="10" style="width: 100%; height: 100px; font-size: 9pt;"><tr><td>

<form method="post" name="method" id="method" action="<?php echo $_SERVER['PHP_SELF'];?>">طريقة الحساب : 
<select name="method" onchange="document.forms.method.submit();">
		<option>اختر طريقة :</option>
		<option value="UOIF">المنظمات الإسلامية اتحاد فرنسا (أويف)</option>
		<option value="ISNA">الجمعية الإسلامية لأمريكا الشمالية (إيسنا)</option>
		<option value="MWL">رابطة العالم الإسلامي (مول)</option>
		<option value="Makkah">جامعة أم القرى، مكة المكرمة</option>
		<option value="Egypt">الهيئة المصرية العامة للمساحة</option>
		<option value="Karachi">جامعة العلوم الإسلامية، كراتشي</option>
		<option value="Tehran">معهد الجيوفيزياء، جامعة طهران</option>
    </select>
</form>
</td></tr>
	
<tr><td>
<form method="post" name="asr" id="asr" action="<?php echo $_SERVER['PHP_SELF'];?>">وقت العصر : 
<select name="asr" onchange="document.forms.asr.submit();">
		<option>اختر طريقة :</option>
		<option value="Standard">اساسي</option>
		<option value="Hanafi">حنفي</option>
    </select>
</form>
</td></tr>

<tr><td>
<form method="post" name="heure" id="heure" action="<?php echo $_SERVER['PHP_SELF'];?>">تنسيق الوقت : 
<select name="heure" onchange="document.forms.heure.submit();">
		<option>اختيار عرض :</option>
		<option value="1">12 ساعة</option>
		<option value="0">24 ساعة</option>
    </select>
</form>
</td></tr>


</table>

<ins class="adsbygoogle"
     style="display:block"
     data-ad-format="fluid"
     data-ad-layout-key="-8e+1j-ed+eu+kx"
     data-ad-client="ca-pub-7774762967038154"
     data-ad-slot="5885912112"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>


<br>


<a name="semaine"></a><h3>وقت صلاة <?echo $VilleNom?> للاسبوع :</h3>
<table class="timetable">
	<tbody><tr class="head-row">
	<td class="em"><span class="arabic">اليوم</span></td>
	<td class="em"><span class="arabic">الفجر</span></td>
	<td class="em"><span class="arabic">الشروق</span></td>
	<td class="em"><span class="arabic">الظهر</span></td>
	<td class="em"><span class="arabic">العصر</span></td>
	<td class="em"><span class="arabic">المغرب</span></td>
	<td class="em"><span class="arabic">العشاء</span></td>
	</tr>
	<?php
	$date = strtotime("-1 days");
	$endDate = strtotime("+7 days");

	$timediffWeek = new DateTime("1 days ago 12:00", new DateTimeZone($zone));
	$timeZoneWeek = ($timediffWeek->getOffset())/3600;
	
	if ($VillePays == "المغرب") $timeZoneWeekMA = $timeZoneWeek;
	
	$datedumoment = strtotime("now");
	$testeurday = date('j', $datedumoment);
	
	while ($date < $endDate)
	{
		
		$prayTimeWeek = new PrayTime($method);
		$prayTimeWeek->setTimeFormat($heure);
		$prayTimeWeek->setAsrMethod($asr);
		$timesWeek = $prayTimeWeek->getPrayerTimes($date, $latitude, $longitude, $timeZoneWeek);
		if ($VillePays == "المغرب") $timesWeek = $prayTimeWeek->getPrayerTimes($date, $latitude, $longitude, $timeZoneWeekMA);

		$dayweek = strftime("%a %e", $date);
		
		$testeur = date('j', $date);
			
		$Wfajr = explode(" ", $timesWeek[0]);
		$Wchourouq = explode(" ", $timesWeek[1]);
		$Wdhouhr = explode(" ", $timesWeek[2]);
		$Wasr = explode(" ", $timesWeek[3]);
		$Wmaghrib = explode(" ", $timesWeek[5]);
		$Wisha = explode(" ", $timesWeek[6]);
		
		
		if ($testeur == $testeurday) {
		echo "
		<tr class=\"today-row\">
		<td class=\"em\">$dayweek</td>
		<td class=\"em\">$Wfajr[0] <span class=\"minsuffixe\">$Wfajr[1]</span></td>
		<td class=\"em\">$Wchourouq[0] <span class=\"minsuffixe\">$Wchourouq[1]</span></td>
		<td class=\"em\">$Wdhouhr[0] <span class=\"minsuffixe\">$Wdhouhr[1]</span></td>
		<td class=\"em\">$Wasr[0] <span class=\"minsuffixe\">$Wasr[1]</span></td>
		<td class=\"em\">$Wmaghrib[0] <span class=\"minsuffixe\">$Wmaghrib[1]</span></td>
		<td class=\"em\">$Wisha[0] <span class=\"minsuffixe\">$Wisha[1]</span></td>
		</tr>";
		}
		
		if ((date('N', $date) != 5) && ($testeur != $testeurday)) {
		echo "
		<tr>
		<td class=\"em\">$dayweek</td>
		<td class=\"em\">$Wfajr[0] <span class=\"minsuffixe\">$Wfajr[1]</span></td>
		<td class=\"em\">$Wchourouq[0] <span class=\"minsuffixe\">$Wchourouq[1]</span></td>
		<td class=\"em\">$Wdhouhr[0] <span class=\"minsuffixe\">$Wdhouhr[1]</span></td>
		<td class=\"em\">$Wasr[0] <span class=\"minsuffixe\">$Wasr[1]</span></td>
		<td class=\"em\">$Wmaghrib[0] <span class=\"minsuffixe\">$Wmaghrib[1]</span></td>
		<td class=\"em\">$Wisha[0] <span class=\"minsuffixe\">$Wisha[1]</span></td>
		</tr>";
		}
		
		if (date('N', $date) == 5) {
		echo "
		<tr class=\"vendredi-row\">
		<td class=\"em\">$dayweek</td>
		<td class=\"em\">$Wfajr[0] <span class=\"minsuffixe\">$Wfajr[1]</span></td>
		<td class=\"em\">$Wchourouq[0] <span class=\"minsuffixe\">$Wchourouq[1]</span></td>
		<td class=\"em\">$Wdhouhr[0] <span class=\"minsuffixe\">$Wdhouhr[1]</span></td>
		<td class=\"em\">$Wasr[0] <span class=\"minsuffixe\">$Wasr[1]</span></td>
		<td class=\"em\">$Wmaghrib[0] <span class=\"minsuffixe\">$Wmaghrib[1]</span></td>
		<td class=\"em\">$Wisha[0] <span class=\"minsuffixe\">$Wisha[1]</span></td>
		</tr>";
		}
		
		$timediffWeek->add(new DateInterval('P1D'));
		$timeZoneWeek = ($timediffWeek->getOffset())/3600;
		$date += 24* 60* 60;  // next day
		}
	?>
	
	</tbody>
</table>
</div>

<br>

<div style="width:100%; display:block; height:5px; background-color:slategray; margin:0px;"></div>

<a name="vendredi"></a><h3>وقت صلاة الجمعة في <?echo $VilleNom?> :</h3>
<table class="djoum">
	<tbody><tr class="head-row">
	<td class="em"><span class="arabic">اليوم</span></td>
	
	<td class="em"><span class="arabic">صلاة الجمعة</span></td>
	
	</tr>
	<?php
	$dateM = strtotime("first day of this month");
	$endDateM = strtotime("last day of this month");
	
	$datedumoment = strtotime("now");
	$testeurdayM = date('j', $datedumoment);
	
	$timediffMonth = new DateTime("first day of this month", new DateTimeZone($zone));
	$timeZoneMonth = ($timediffMonth->getOffset())/3600;
	if ($VillePays == "المغرب") $timeZoneMonthMA = $timeZoneMonth+1;
	
	while ($dateM <= $endDateM)
	{
		
		$prayTimeMonth = new PrayTime($method);
		$prayTimeMonth->setTimeFormat($heure);
		$prayTimeMonth->setAsrMethod($asr);
		$timesMonth = $prayTimeMonth->getPrayerTimes($dateM, $latitude, $longitude, $timeZoneMonth);
		if ($VillePays == "المغرب")	$timesMonth = $prayTimeMonth->getPrayerTimes($dateM, $latitude, $longitude, $timeZoneMonthMA);
		
		$dayweekM = strftime("%A %e", $dateM);
		
		$testeurM = date('j', $dateM);
			
		$Mfajr = explode(" ", $timesMonth[0]);
		$Mchourouq = explode(" ", $timesMonth[1]);
		$Mdhouhr = explode(" ", $timesMonth[2]);
		$Masr = explode(" ", $timesMonth[3]);
		$Mmaghrib = explode(" ", $timesMonth[5]);
		$Misha = explode(" ", $timesMonth[6]);
		
	
		
		if (date('N', $dateM) == 5) {
		echo "
		<tr>
		<td class=\"em\">$dayweekM</td>
		
		<td class=\"em\">$Mdhouhr[0] <span class=\"minsuffixe\">$Mdhouhr[1]</span></td>
		
		</tr>";
		}
		$timediffMonth->add(new DateInterval('P1D'));
		$timeZoneMonth = ($timediffMonth->getOffset())/3600;
		$dateM += 24* 60* 60;  // next day
		}
	?>
	
	</tbody>
</table>

<br>



<div style="width:100%; display:block; height:5px; background-color:slategray; margin:0px;"></div>

<a name="mois"></a><h3>مواعيد الصلاه <?echo $VilleNom?> لهذا الشهر :</h3>
<table class="timetable">
	<tbody><tr class="head-row">
	<td class="em"><span class="arabic">اليوم</span></td>
	<td class="em"><span class="arabic">الفجر</span></td>
	<td class="em"><span class="arabic">الشروق</span></td>
	<td class="em"><span class="arabic">الظهر</span></td>
	<td class="em"><span class="arabic">العصر</span></td>
	<td class="em"><span class="arabic">المغرب</span></td>
	<td class="em"><span class="arabic">العشاء</span></td>
	</tr>
	<?php
	$dateM = strtotime("first day of this month");
	$endDateM = strtotime("first day of next month 00:00");
	
	$datedumoment = strtotime("now");
	$testeurdayM = date('j', $datedumoment);
	
	$timediffMonth = new DateTime("first day of this month noon", new DateTimeZone($zone));
	$timeZoneMonth = ($timediffMonth->getOffset())/3600;
	if ($VillePays == "المغرب") $timeZoneMonthMA = $timeZoneMonth+1;
	
	while ($dateM <= $endDateM)
	{
		
		$prayTimeMonth = new PrayTime($method);
		$prayTimeMonth->setTimeFormat($heure);
		$prayTimeMonth->setAsrMethod($asr);
		$timesMonth = $prayTimeMonth->getPrayerTimes($dateM, $latitude, $longitude, $timeZoneMonth);
		if ($VillePays == "المغرب")	$timesMonth = $prayTimeMonth->getPrayerTimes($dateM, $latitude, $longitude, $timeZoneMonthMA);
		
		$dayweekM = strftime("%a %e", $dateM);
		
		$testeurM = date('j', $dateM); 
			
		$Mfajr = explode(" ", $timesMonth[0]);
		$Mchourouq = explode(" ", $timesMonth[1]);
		$Mdhouhr = explode(" ", $timesMonth[2]);
		$Masr = explode(" ", $timesMonth[3]);
		$Mmaghrib = explode(" ", $timesMonth[5]);
		$Misha = explode(" ", $timesMonth[6]);
		
		
		if ($testeurM == $testeurdayM) { 
		echo "
		<tr class=\"today-row\">
		<td class=\"em\">$dayweekM</td>
		<td class=\"em\">$Mfajr[0] <span class=\"minsuffixe\">$Mfajr[1]</span></td>
		<td class=\"em\">$Mchourouq[0] <span class=\"minsuffixe\">$Mchourouq[1]</span></td>
		<td class=\"em\">$Mdhouhr[0] <span class=\"minsuffixe\">$Mdhouhr[1]</span></td>
		<td class=\"em\">$Masr[0] <span class=\"minsuffixe\">$Masr[1]</span></td>
		<td class=\"em\">$Mmaghrib[0] <span class=\"minsuffixe\">$Mmaghrib[1]</span></td>
		<td class=\"em\">$Misha[0] <span class=\"minsuffixe\">$Misha[1]</span></td>
		</tr>";
		}
		
		if ((date('N', $dateM) != 5) && ($testeurM != $testeurdayM)) {
		echo "
		<tr>
		<td class=\"em\">$dayweekM</td>
		<td class=\"em\">$Mfajr[0] <span class=\"minsuffixe\">$Mfajr[1]</span></td>
		<td class=\"em\">$Mchourouq[0] <span class=\"minsuffixe\">$Mchourouq[1]</span></td>
		<td class=\"em\">$Mdhouhr[0] <span class=\"minsuffixe\">$Mdhouhr[1]</span></td>
		<td class=\"em\">$Masr[0] <span class=\"minsuffixe\">$Masr[1]</span></td>
		<td class=\"em\">$Mmaghrib[0] <span class=\"minsuffixe\">$Mmaghrib[1]</span></td>
		<td class=\"em\">$Misha[0] <span class=\"minsuffixe\">$Misha[1]</span></td>
		</tr>";
		}
		
		if (date('N', $dateM) == 5) {
		echo "
		<tr class=\"vendredi-row\">
		<td class=\"em\">$dayweekM</td>
		<td class=\"em\">$Mfajr[0] <span class=\"minsuffixe\">$Mfajr[1]</span></td>
		<td class=\"em\">$Mchourouq[0] <span class=\"minsuffixe\">$Mchourouq[1]</span></td>
		<td class=\"em\">$Mdhouhr[0] <span class=\"minsuffixe\">$Mdhouhr[1]</span></td>
		<td class=\"em\">$Masr[0] <span class=\"minsuffixe\">$Masr[1]</span></td>
		<td class=\"em\">$Mmaghrib[0] <span class=\"minsuffixe\">$Mmaghrib[1]</span></td>
		<td class=\"em\">$Misha[0] <span class=\"minsuffixe\">$Misha[1]</span></td>
		</tr>";
		}
		$timediffMonth->add(new DateInterval('P1D'));
		$timeZoneMonth = ($timediffMonth->getOffset())/3600;
		$dateM += 24* 60* 60;  // next day
		}
	?>
	
	
	</tbody>
</table>

<br>


<div style="width:100%; display:block; height:5px; background-color:slategray; margin:0px;"></div>

<a name="hijri"></a><h3>أوقات الصلاة في <?echo $VilleNom?> وفقا للتقويم الهجري</h3>
<table class="timetable">
	<tbody><tr class="head-row">
	<td class="em"><span class="arabic">اليوم</span></td>
	<td class="em"><span class="arabic">الفجر</span></td>
	<td class="em"><span class="arabic">الشروق</span></td>
	<td class="em"><span class="arabic">الظهر</span></td>
	<td class="em"><span class="arabic">العصر</span></td>
	<td class="em"><span class="arabic">المغرب</span></td>
	<td class="em"><span class="arabic">العشاء</span></td>
	</tr>
	<?php
	$dateM = strtotime("first day of this month");
	$endDateM = strtotime("first day of next month 00:00");
	
	$datedumoment = strtotime("now");
	$testeurdayM = date('j', $datedumoment);
	
	$timediffMonth = new DateTime("first day of this month noon", new DateTimeZone($zone));
	$timeZoneMonth = ($timediffMonth->getOffset())/3600;
	if ($VillePays == "المغرب") $timeZoneMonthMA = $timeZoneMonth+1;
	
	$datehijri = $timing->date("l j", $dateM);
		
	$changement = 0;

	
	
	while ($dateM <= $endDateM)
	{
		
		$datehijri = $timing->date("p j", $dateM);
		
		
		$moisencours = $timing->date("F", $dateM);
		$moisencoursD = $timing->date("F", $dateM-1);
		
		$prayTimeMonth->setTimeFormat($heure);
		$prayTimeMonth->setAsrMethod($asr);
		$timesMonth = $prayTimeMonth->getPrayerTimes($dateM, $latitude, $longitude, $timeZoneMonth);
		if ($VillePays == "المغرب") $timesMonth = $prayTimeMonth->getPrayerTimes($dateM, $latitude, $longitude, $timeZoneMonthMA);
		
		
		
		$testeurM = date('j', $dateM);
			
		$Mfajr = explode(" ", $timesMonth[0]);
		$Mchourouq = explode(" ", $timesMonth[1]);
		$Mdhouhr = explode(" ", $timesMonth[2]);
		$Masr = explode(" ", $timesMonth[3]);
		$Mmaghrib = explode(" ", $timesMonth[5]);
		$Misha = explode(" ", $timesMonth[6]);
		
		
		if ($changement == 0) {
		
		echo "
		<tr class=\"encours\">
		<td colspan=\"7\">$moisencours</td>
		</tr>";
		
		$changement = 2;
		}
		
		if (($moisencours !== $moisencoursD) && $changement == 2) {
		
		echo "
		<tr class=\"encours\">
		<td colspan=\"7\">$moisencours</td>
		</tr>";
		
		$changement = 1;
		}
		
		
		if ($testeurM == $testeurdayM) {
		echo "
		<tr class=\"today-row\">
		<td class=\"em\">$datehijri</td>
		<td class=\"em\">$Mfajr[0] <span class=\"minsuffixe\">$Mfajr[1]</span></td>
		<td class=\"em\">$Mchourouq[0] <span class=\"minsuffixe\">$Mchourouq[1]</span></td>
		<td class=\"em\">$Mdhouhr[0] <span class=\"minsuffixe\">$Mdhouhr[1]</span></td>
		<td class=\"em\">$Masr[0] <span class=\"minsuffixe\">$Masr[1]</span></td>
		<td class=\"em\">$Mmaghrib[0] <span class=\"minsuffixe\">$Mmaghrib[1]</span></td>
		<td class=\"em\">$Misha[0] <span class=\"minsuffixe\">$Misha[1]</span></td>
		</tr>";
		}
		
		if ((date('N', $dateM) != 5) && ($testeurM != $testeurdayM)) {
		echo "
		<tr>
		<td class=\"em\">$datehijri</td>
		<td class=\"em\">$Mfajr[0] <span class=\"minsuffixe\">$Mfajr[1]</span></td>
		<td class=\"em\">$Mchourouq[0] <span class=\"minsuffixe\">$Mchourouq[1]</span></td>
		<td class=\"em\">$Mdhouhr[0] <span class=\"minsuffixe\">$Mdhouhr[1]</span></td>
		<td class=\"em\">$Masr[0] <span class=\"minsuffixe\">$Masr[1]</span></td>
		<td class=\"em\">$Mmaghrib[0] <span class=\"minsuffixe\">$Mmaghrib[1]</span></td>
		<td class=\"em\">$Misha[0] <span class=\"minsuffixe\">$Misha[1]</span></td>
		</tr>";
		}
		
		if (date('N', $dateM) == 5) {
		echo "
		<tr class=\"vendredi-row\">
		<td class=\"em\">$datehijri</td>
		<td class=\"em\">$Mfajr[0] <span class=\"minsuffixe\">$Mfajr[1]</span></td>
		<td class=\"em\">$Mchourouq[0] <span class=\"minsuffixe\">$Mchourouq[1]</span></td>
		<td class=\"em\">$Mdhouhr[0] <span class=\"minsuffixe\">$Mdhouhr[1]</span></td>
		<td class=\"em\">$Masr[0] <span class=\"minsuffixe\">$Masr[1]</span></td>
		<td class=\"em\">$Mmaghrib[0] <span class=\"minsuffixe\">$Mmaghrib[1]</span></td>
		<td class=\"em\">$Misha[0] <span class=\"minsuffixe\">$Misha[1]</span></td>
		</tr>";
		}
		$timediffMonth->add(new DateInterval('P1D'));
		$timeZoneMonth = ($timediffMonth->getOffset())/3600;
		$dateM += 24* 60* 60;  // next day
		
		}
	?>
	
	
	</tbody>
</table>

<br>


<script type="application/ld+json">
{	"@context": "https://schema.org/",
	"@type": "Event",
	"name": "🕌 صلاة الفجر : <?echo $timesIndex[0];?>",
	"description": "وقت الصلاة الفجر لمدينة <?echo $VilleNom;?>",
	"startDate": "<?echo date("Y/m/d"); echo "T$timesIndex[0];"?>",
	"endDate": "<?echo date("Y/m/d"); echo "T$timesIndex[0];"?>",
	"performer": {"@type": "Person","name": "al-hamdoulillah.com"},
	"url": "https://www.al-hamdoulillah.com<?echo $_SERVER["REQUEST_URI"]?>",
	"offers": {"@type": "AggregateOffer","lowPrice": "0","url": "https://www.al-hamdoulillah.com<?echo $_SERVER["REQUEST_URI"]?>"},
	"image": "https://www.al-hamdoulillah.com/images/snip/fajr.png",
	"location": {"@type": "Place","name": "<?echo $VilleNom;?>", "address": "<?echo $VilleNom;?>, <?echo $VillePays?>"}
}
</script>
<script type="application/ld+json">
{	"@context": "https://schema.org/",
	"@type": "Event",
	"name": "🕌 صلاة الظهر : <?echo $timesIndex[2];?>",
	"description": "وقت الصلاة الظهر لمدينة <?echo $VilleNom;?>",
	"startDate": "<?echo date("Y/m/d"); echo "T$timesIndex[2];"?>",
	"endDate": "<?echo date("Y/m/d"); echo "T$timesIndex[2];"?>",
	"performer": {"@type": "Person","name": "al-hamdoulillah.com"},
	"url": "https://www.al-hamdoulillah.com<?echo $_SERVER["REQUEST_URI"]?>",
	"offers": {"@type": "AggregateOffer","lowPrice": "0","url": "https://www.al-hamdoulillah.com<?echo $_SERVER["REQUEST_URI"]?>"},
	"image": "https://www.al-hamdoulillah.com/images/snip/dohr.png",
	"location": {"@type": "Place","name": "<?echo $VilleNom;?>", "address": "<?echo $VilleNom;?>, <?echo $VillePays?>"}
}
</script>
<script type="application/ld+json">
{	"@context": "https://schema.org/",
	"@type": "Event",
	"name": "🕌 صلاة العصر : <?echo $timesIndex[3];?>",
	"description": "وقت الصلاة العصر لمدينة <?echo $VilleNom;?>",
	"startDate": "<?echo date("Y/m/d"); echo "T$timesIndex[3];"?>",
	"endDate": "<?echo date("Y/m/d"); echo "T$timesIndex[3];"?>",
	"performer": {"@type": "Person","name": "al-hamdoulillah.com"},
	"url": "https://www.al-hamdoulillah.com<?echo $_SERVER["REQUEST_URI"]?>",
	"offers": {"@type": "AggregateOffer","lowPrice": "0","url": "https://www.al-hamdoulillah.com<?echo $_SERVER["REQUEST_URI"]?>"},
	"image": "https://www.al-hamdoulillah.com/images/snip/asr.png",
	"location": {"@type": "Place","name": "<?echo $VilleNom;?>", "address": "<?echo $VilleNom;?>, <?echo $VillePays?>"}
}
</script>
<script type="application/ld+json">
{	"@context": "https://schema.org/",
	"@type": "Event",
	"name": "🕌 صلاة المغرب : <?echo $timesIndex[5];?>",
	"description": "وقت الصلاة المغرب لمدينة <?echo $VilleNom;?>",
	"startDate": "<?echo date("Y/m/d"); echo "T$timesIndex[5];"?>",
	"endDate": "<?echo date("Y/m/d"); echo "T$timesIndex[5];"?>",
	"performer": {"@type": "Person","name": "al-hamdoulillah.com"},
	"url": "https://www.al-hamdoulillah.com<?echo $_SERVER["REQUEST_URI"]?>",
	"offers": {"@type": "AggregateOffer","lowPrice": "0","url": "https://www.al-hamdoulillah.com<?echo $_SERVER["REQUEST_URI"]?>"},
	"image": "https://www.al-hamdoulillah.com/images/snip/maghrib.png",
	"location": {"@type": "Place","name": "<?echo $VilleNom;?>", "address": "<?echo $VilleNom;?>, <?echo $VillePays?>"}
}
</script>
<script type="application/ld+json">
{	"@context": "https://schema.org/",
	"@type": "Event",
	"name": "🕌 صلاة العشاء : <?echo $timesIndex[6];?>",
	"description": "وقت الصلاة العشاء لمدينة <?echo $VilleNom;?>",
	"startDate": "<?echo date("Y/m/d"); echo "T$timesIndex[6];"?>",
	"endDate": "<?echo date("Y/m/d"); echo "T$timesIndex[6];"?>",
	"performer": {"@type": "Person","name": "al-hamdoulillah.com"},
	"url": "https://www.al-hamdoulillah.com<?echo $_SERVER["REQUEST_URI"]?>",
	"offers": {"@type": "AggregateOffer","lowPrice": "0","url": "https://www.al-hamdoulillah.com<?echo $_SERVER["REQUEST_URI"]?>"},
	"image": "https://www.al-hamdoulillah.com/images/snip/isha.png",
	"location": {"@type": "Place","name": "<?echo $VilleNom;?>", "address": "<?echo $VilleNom;?>, <?echo $VillePays?>"}
}
</script>


<?php

function distance($lat1, $lon1, $lat2, $lon2, $unit) {

  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);

  if ($unit == "K") {
    return ($miles * 1.609344);
  } else if ($unit == "N") {
      return ($miles * 0.8684);
    } else {
        return $miles;
      }
}

$ul = 0;

for ($b=1; $b<2400; $b++)
{
	${'VilleNom'.$b} = getSuraData($b, 'city');
	${'VilleNomAR'.$b} = getSuraData($b, 'cityAR');
	${'VillePays'.$b} = getSuraData($b, 'country');
	${'VillePaysAR'.$b} = getSuraData($b, 'countryAR');
	${'VilleLat'.$b} = getSuraData($b, 'lat');
	${'VilleLong'.$b} = getSuraData($b, 'long');
	

	if (${'VillePaysAR'.$b} == $VillePays) { 
		${'distance'.$b} = ceil(distance($VilleLat, $VilleLong, "${'VilleLat'.$b}", "${'VilleLong'.$b}", "K"));
		if ((${'distance'.$b} < 200) && (${'distance'.$b} > 0)) {
			${'ville'.$b} = str_replace(" ", "-", strtolower(getSuraData($b, 'city')));
			${'continent'.$b} = str_replace(" ", "-", strtolower(getSuraData($b, 'continent')));
			${'country'.$b} = str_replace(" ", "-", strtolower(getSuraData($b, 'country')));
			${'url'.$b} = "/ar/prayer-times/world/${'continent'.$b}/${'country'.$b}/${'ville'.$b}.html";
			if ($ul == 0) echo "<center><div style=\"width:100%; display:block; height:5px; background-color:slategray; margin:0px;\"></div></center><p><b>وقت الصلاة من المدن الهامة حول $VilleNom</b></p><ul>";
			if (${'VilleNomAR'.$b} !== $VilleNom) echo "<li><a href=\"${'url'.$b}\">${'VilleNomAR'.$b}</a> (${'distance'.$b} كم)</li>";
			$ul++;
		}
		
	}
}

?>
</ul>
<br>