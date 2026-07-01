<?php

	include("../../../generate/praytime.php");
	
	$latitude = $VilleLat;
	$longitude = $VilleLong;
	
	$zone = $VilleZone;
	$timediff = new DateTime('noon', new DateTimeZone($zone));
	$timeZone = ($timediff->getOffset())/3600;
	
	if ($VillePays == "Maroc")	$timeZone = $timeZone;

	session_start();
	
	// réglages par défaut
	
	
	if ($VillePays == "France") {
		$choix = "Union des Organisations Islamiques de France (UOIF)<br>Fajr : 12° | Isha : 12°";
		$method = 0;
	}
	if ($VillePays !== "France") {
		$choix = "Ligue Islamique Mondiale (MWL)<br>Fajr : 18° | Isha : 17°";
		$method = 2;
	}
	if ($VillePays == "Arabie Saoudite") {
		$method = 3; 
		$choix = "Université d'Oum al-Qoura, La Mecque<br>Fajr : 18.5° | Isha : 90 min";
	}
	$heure = 0;
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
	$choix = "Union des Organisations Islamiques de France (UOIF)<br>Fajr : 12° | Isha : 12°";
	$_SESSION['method'] = $method;
	$heure = $_SESSION['heure'];
	$asr = $_SESSION['asr'];
	} 
	
	if ($_POST['method'] == 'ISNA') { 
	$method = 1; 
	$choix = "Organisations Islamiques d'Amérique du Nord (ISNA)<br>Fajr : 15° | Isha : 15°";
	$_SESSION['method'] = $method;
	$heure = $_SESSION['heure'];
	$asr = $_SESSION['asr'];
	} 
	
	if ($_POST['method'] == 'MWL') { 
	$method = 2; 
	$choix = "Ligue Islamique Mondiale (MWL)<br>Fajr : 18° | Isha : 17°";
	$_SESSION['method'] = $method;
	$heure = $_SESSION['heure'];
	$asr = $_SESSION['asr'];
	}
	
	if ($_POST['method'] == 'Makkah') { 
	$method = 3; 
	$choix = "Université d'Oum al-Qoura, La Mecque<br>Fajr : 18.5° | Isha : 90 min";
	$_SESSION['method'] = $method;
	$heure = $_SESSION['heure'];
	$asr = $_SESSION['asr'];
	} 

	if ($_POST['method'] == 'Egypt') {
	$method = 4;
	$choix = "Autorité générale d'enquête, Egypte<br>Fajr : 19.5° | Isha : 17.5°";
	$_SESSION['method'] = $method;
	$heure = $_SESSION['heure'];
	$asr = $_SESSION['asr'];
	} 

	if ($_POST['method'] == 'Karachi') {
	$method = 5; 
	$choix = "Université des sciences islamiques, Karachi<br>Fajr : 18° | Isha : 18°";
	$_SESSION['method'] = $method;
	$heure = $_SESSION['heure'];
	$asr = $_SESSION['asr'];
	} 

	if ($_POST['method'] == 'Tehran') {
	$method = 6;
	$choix = "Organisations Islamiques d'Amérique du Nord (ISNA)<br>Fajr : 17.7° | Isha : 14°";
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
   $nextsalat  = "FAJR";
   $nextsalatCount   = $fajrCount;
   };   
   
if (($now > $fajrCount) && ($now < $dhouhrCount)) {
   $nextsalat  = "DHOUHR";
   $nextsalatCount   = $dhouhrCount;
   };
   
if (($now > $dhouhrCount) && ($now < $asrCount)) {
   $nextsalat  = "ASR";
   $nextsalatCount   = $asrCount;
   };
   
if (($now > $asrCount) && ($now < $maghribCount)) {
   $nextsalat  = "MAGHRIB";
   $nextsalatCount   = $maghribCount;
   };
   
if (($now > $maghribCount) && ($now < $ishaCount)) {
   $nextsalat  = "ISHA";
   $nextsalatCount = $ishaCount;
   };
   
if ($now > $ishaCount) {
   $nextsalat  = "FAJR";
   $nextsalatCount = $fajrCount2;
   };

   $start = new DateTime($now);
   $fin = new DateTime($nextsalatCount);

   $diff  = $start->diff($fin);
   $diff = $diff->format("%H:%I"); 
   $adhan = explode(":", $diff);
	   
	include ("../../../../inc/hijri.php"); 
	$timing = new uCakl;
	$timing->setLang("fr");

	$moishijri = $timing->date("F");

?>

<h1>Horaire Priere <?echo $VilleNom?></h1>



<p style="padding-top:20px;"><a href="/horaires-prieres/monde/">Monde</a> > <a href="/horaires-prieres/monde/<?echo str_replace(" ", "-", strtolower($VilleContinent));?>/"><?echo $VilleContinent?></a> > <a href="/horaires-prieres/monde/<? echo str_replace(" ", "-", strtolower($VilleContinent))?>/<? echo str_replace(" ", "-", strtolower($VillePays))?>/"><?echo $VillePays?></a> > <strong><?echo $VilleNom?></strong></p>

<img class="lazy" alt="salat <?echo $VilleNom?>" id="stamp" data-src="/images/heure-priere.webp">

<p><b><u><a href="#jour"><span style="color:black;">Aujourd'hui</span></a></u></b> : <?php setlocale (LC_ALL, 'french'); echo utf8_encode(strftime("%A %d %B %Y"));?></p>

<ul>
	<li><b>Fajr</b> : <?php echo $timesIndex[0];?></li>
	<li>Lever du soleil : <?php echo $timesIndex[1];?></li>
	<li><b>Dhouhr</b> : <?php echo $timesIndex[2];?></li>
	<li>Asr : <?php echo $timesIndex[3];?></li>
	<li><b>Maghrib</b> : <?php echo $timesIndex[5];?></li>
	<li>Isha : <?php echo $timesIndex[6];?></li>
</ul>

<p>Quelles sont les heures de prière de <?echo $VilleNom?> <? if(!empty($code)) echo "$code et ses environs, ";?> en <?echo $VillePays?> ? L'heure de Fajr pour <?echo $VilleNom?> débute à <?php echo $fajrIntro;?> selon le calcul de la MWL <? if ($VillePays == 'France') echo "($fajrIntrobis selon le calcul de l'UOIF, choix par défaut des horaires ci-dessous)";?> et l'heure du maghrib à <?php echo $maghribIntro;?>	. La distance de <?echo $VilleNom?> [latitude : <?=$VilleLat?>, longitude : <?=$VilleLong?>] jusqu'à La Mecque est de <span id="QRhumbDistance" class="QValue"></span>. La population de <?echo $VilleNom?> s'élève à <?echo number_format($VillePop, 0, ',', ' ')?> habitants.</p>



<div style="width:100%; display:block; height:5px; background-color:slategray; margin:0px;"></div>


<h2>Heure de Prière <?echo $VilleNom?></h2>

<?php include("../../../../inc/share.php");?>

<p>A quelle heure est la prière à <?echo $VilleNom?> ?</p>

<ul>
<li><a href="#jour"/>Aujourd'hui</a></li>
<li><a href="#semaine">Cette semaine</a></li>
<li><a href="#vendredi">Les vendredis</a></li>
<li><a href="#mois">Ce mois-ci (<?php setlocale (LC_ALL, 'french'); echo utf8_encode(strftime("%B"));?>)</a></li>
<li><a href="#hijri">Selon le calendrier musulman (<?php echo $moishijri;?>)</a></li>
</ul>



<table id="today" cellpadding="10" style="width: 100%; border: 1px solid gray; text-align: center;">

<tr><td style="height:50px; background-color:lightblue;" colspan="6">La prochaine prière est :<br><br>
<span style="font-size:15pt;"><?php echo $nextsalat;?></span> dans : <span style="font-size:15pt;"><?php echo "$adhan[0]";?></span> H <span style="font-size:15pt;"><?php echo "$adhan[1]";?></span> MIN</td></tr>

</table>

<a name="jour"></a><h3>Awkat salat <?echo $VilleNom?> pour aujourd'hui, le <? echo date("d/m/Y");?>  :</h3>

<table class="timetable">
	<tbody><tr>
	<td <?php if ($nextsalatCount == $timesIndex[0]) echo "class=\"dayadhantab\""; else {echo "class=\"daytable\"";}?>>Fajr</td>
	<td <?php if ($nextsalatCount == $timesIndex[1]) echo "class=\"dayadhantab\""; else {echo "class=\"daytable\"";}?>>Chourq.</td>
	<td <?php if ($nextsalatCount == $timesIndex[2]) echo "class=\"dayadhantab\""; else {echo "class=\"daytable\"";}?>>Dhouhr</td>
	<td <?php if ($nextsalatCount == $timesIndex[3]) echo "class=\"dayadhantab\""; else {echo "class=\"daytable\"";}?>>Asr</td>
	<td <?php if ($nextsalatCount == $timesIndex[5]) echo "class=\"dayadhantab\""; else {echo "class=\"daytable\"";}?>>Maghrib</td>
	<td <?php if ($nextsalatCount == $timesIndex[6]) echo "class=\"dayadhantab\""; else {echo "class=\"daytable\"";}?>>Isha</td>
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

<p><?php echo $choix;?></p>

<table cellpadding="10" style="width: 100%;"><tr><td>

<form method="post" name="method" id="method" action="<?php echo $_SERVER['PHP_SELF'];?>"><label for="method">Méthode de calcul :<label>
<select label="method" name="method" onchange="document.forms.method.submit();">
		<option>choisir une méthode :</option>
		<option value="UOIF" value="UOIF">Union des Organisations Islamiques de France (UOIF)</option>
		<option value="ISNA">Organisations Islamiques d'Amérique du Nord (ISNA)</option>
		<option value="MWL">Ligue Islamique Mondiale (MWL)</option>
		<option value="Makkah">Université d'Oum al-Qoura, La Mecque</option>
		<option value="Egypt">Autorité générale d'enquête, Egypte</option>
		<option value="Karachi">Université des sciences islamiques, Karachi</option>
		<option value="Tehran" option="Fajr : 17.7° | Isha : 14°">Institut de géophysique, Teheran</option>
    </select>
</form>
</td></tr>
	
<tr><td>
<form method="post" name="asr" id="asr" action="<?php echo $_SERVER['PHP_SELF'];?>"><label for="asr">Heure de l'asr :</label>
<select label="asr" name="asr" onchange="document.forms.asr.submit();">
		<option>choisir un calcul :</option>
		<option value="Standard">Standard</option>
		<option value="Hanafi">Hanafi</option>
    </select>
</form>
</td></tr>

<tr><td>
<form method="post" name="heure" id="heure" action="<?php echo $_SERVER['PHP_SELF'];?>"><label for="heure">Format de l'heure :</label>
<select label="heure" name="heure" onchange="document.forms.heure.submit();">
		<option>choisir un affichage :</option>
		<option value="1">12 heures</option>
		<option value="0">24 heures</option>
    </select>
</form>
</td></tr>


</table>

<br>

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

<a name="semaine"></a><h3>Heure de prière à <?php echo $VilleNom;?> pour la semaine :</h3>
<table class="timetable">
	<tbody><tr class="head-row">
	<td class="em"><span class="arabic">اليوم</span><br>Jour</td>
	<td class="em"><span class="arabic">الفجر</span><br>Fajr</td>
	<td class="em"><span class="arabic">الشروق</span><br>Chourouq</td>
	<td class="em"><span class="arabic">الظهر</span><br>Dhouhr</td>
	<td class="em"><span class="arabic">العصر</span><br>Asr</td>
	<td class="em"><span class="arabic">المغرب</span><br>Maghrib</td>
	<td class="em"><span class="arabic">العشاء</span><br>Isha</td>
	</tr>
	<?php
	$date = strtotime("-1 days");
	$endDate = strtotime("+7 days");

	$timediffWeek = new DateTime("1 days ago 12:00", new DateTimeZone($zone));
	$timeZoneWeek = ($timediffWeek->getOffset())/3600;
	
	if ($VillePays == "Maroc")	$timeZoneWeekMA = $timeZoneWeek;
	
	
	
	$datedumoment = strtotime("now");
	$testeurday = date('j', $datedumoment);
	
	
	while ($date < $endDate)
	{
		
		$prayTimeWeek = new PrayTime($method);
		$prayTimeWeek->setTimeFormat($heure);
		$prayTimeWeek->setAsrMethod($asr);
		$timesWeek = $prayTimeWeek->getPrayerTimes($date, $latitude, $longitude, $timeZoneWeek);
		if ($VillePays == "Maroc")	$timesWeek = $prayTimeWeek->getPrayerTimes($date, $latitude, $longitude, $timeZoneWeekMA);
		setlocale (LC_ALL, 'french');
		$dayweek = utf8_encode(strftime("%a %e", $date));
		
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

<a name="vendredi"></a><h3>Heure de la prière du vendredi à <?echo $VilleNom?> :</h3>
<table class="djoum">
	<tbody><tr class="head-row">
	<td class="em"><span class="arabic">اليوم</span><br>Jour</td>
	
	<td class="em"><span class="arabic">صلاة الجمعة</span><br>Prière du vendredi</td>
	
	</tr>
	<?php
	$dateM = strtotime("first day of this month");
	$endDateM = strtotime("last day of this month");
	
	$datedumoment = strtotime("now");
	$testeurdayM = date('j', $datedumoment);
	
	$timediffMonth = new DateTime("first day of this month", new DateTimeZone($zone));
	$timeZoneMonth = ($timediffMonth->getOffset())/3600;
	if ($VillePays == "Maroc")	$timeZoneMonthMA = $timeZoneMonth;
	
	
	while ($dateM <= $endDateM)
	{
		
		$prayTimeMonth = new PrayTime($method);
		$prayTimeMonth->setTimeFormat($heure);
		$prayTimeMonth->setAsrMethod($asr);
		
		$timesMonth = $prayTimeMonth->getPrayerTimes($dateM, $latitude, $longitude, $timeZoneMonth);
		if ($VillePays == "Maroc")	$timesMonth = $prayTimeMonth->getPrayerTimes($dateM, $latitude, $longitude, $timeZoneMonthMA);
		
		setlocale (LC_ALL, 'french');
		$dayweekM = utf8_encode(strftime("%a %e", $dateM));
		
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

<a name="mois"></a><h3>Calendrier des prières à <?echo $VilleNom?> pour le mois de <?php setlocale (LC_ALL, 'french'); echo utf8_encode(strftime("%B"));?> :</h3>
<table class="timetable">
	<tbody><tr class="head-row">
	<td class="em"><span class="arabic">اليوم</span><br>Jour</td>
	<td class="em"><span class="arabic">الفجر</span><br>Fajr</td>
	<td class="em"><span class="arabic">الشروق</span><br>Chourouq</td>
	<td class="em"><span class="arabic">الظهر</span><br>Dhouhr</td>
	<td class="em"><span class="arabic">العصر</span><br>Asr</td>
	<td class="em"><span class="arabic">المغرب</span><br>Maghrib</td>
	<td class="em"><span class="arabic">العشاء</span><br>Isha</td>
	</tr>
	<?php
	$dateM = strtotime("first day of this month");
	$endDateM = strtotime("first day of next month 00:00");
	
	$datedumoment = strtotime("now");
	$testeurdayM = date('j', $datedumoment);
	
	$timediffMonth = new DateTime("first day of this month noon", new DateTimeZone($zone));
	$timeZoneMonth = ($timediffMonth->getOffset())/3600;
	if ($VillePays == "Maroc")	$timeZoneMonthMA = $timeZoneMonth+1;
	
	while ($dateM <= $endDateM)
	{
		
		$prayTimeMonth = new PrayTime($method);
		$prayTimeMonth->setTimeFormat($heure);
		$prayTimeMonth->setAsrMethod($asr);
		$timesMonth = $prayTimeMonth->getPrayerTimes($dateM, $latitude, $longitude, $timeZoneMonth);
		if ($VillePays == "Maroc")	$timesMonth = $prayTimeMonth->getPrayerTimes($dateM, $latitude, $longitude, $timeZoneMonthMA);
		setlocale (LC_ALL, 'french');
		$dayweekM = utf8_encode(strftime("%a %e", $dateM));
		
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

<a name="hijri"></a><h3>Horaires de prières à <?echo $VilleNom?> selon le calendrier musulman</h3>
<table class="timetable">
	<tbody><tr class="head-row">
	<td class="em"><span class="arabic">اليوم</span><br>Jour</td>
	<td class="em"><span class="arabic">الفجر</span><br>Fajr</td>
	<td class="em"><span class="arabic">الشروق</span><br>Chourouq</td>
	<td class="em"><span class="arabic">الظهر</span><br>Dhouhr</td>
	<td class="em"><span class="arabic">العصر</span><br>Asr</td>
	<td class="em"><span class="arabic">المغرب</span><br>Maghrib</td>
	<td class="em"><span class="arabic">العشاء</span><br>Isha</td>
	</tr>
	<?php
	$dateM = strtotime("first day of this month");
	$endDateM = strtotime("first day of next month 00:00");
	
	$datedumoment = strtotime("now");
	$testeurdayM = date('j', $datedumoment);
	
	$timediffMonth = new DateTime("first day of this month noon", new DateTimeZone($zone));
	$timeZoneMonth = ($timediffMonth->getOffset())/3600;
	if ($VillePays == "Maroc")	$timeZoneMonthMA = $timeZoneMonth;
	
	$datehijri = $timing->date("l j", $dateM);
		
	$changement = 0;

	
	while ($dateM <= $endDateM)
	{
		
		$datehijri = $timing->date("l j", $dateM);
		
		$moisencours = $timing->date("F", $dateM);
		$moisencoursD = $timing->date("F", $dateM-1);
		
		$prayTimeMonth->setTimeFormat($heure);
		$prayTimeMonth->setAsrMethod($asr);
		$timesMonth = $prayTimeMonth->getPrayerTimes($dateM, $latitude, $longitude, $timeZoneMonth);
		if ($VillePays == "Maroc")	$timesMonth = $prayTimeMonth->getPrayerTimes($dateM, $latitude, $longitude, $timeZoneMonthMA);
		setlocale (LC_ALL, 'french');
		
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

<div style="width:100%; display:block; height:5px; background-color:slategray; margin:0px;"></div>

<h3>Recherches liées aux heures de prière à <?echo $VilleNom?> :</h3>

<ul>
	<li>Quelles sont les heures de prière à <?echo $VilleNom?> ?</li>
	<li>Awkat salat <?echo $VilleNom?></li>
	<li>Heure de priere mosquee <?echo $VilleNom?></li>
	<li>Heure de priere musulmane à <?echo $VilleNom?></li>
	<li>Calendrier des prières à <?echo $VilleNom?></li>
</ul>



<br>

<?php
//durée d'expiration en secondes d'une page mise en cache
$timeout = 31556926;
 
//on lit l'adresse de la page
$url = $_SERVER['REQUEST_URI'];
 
// on transforme l'adresse en nom de fichier
$url = str_replace('/','-',$url);
 
// on construit le chemin du fichier cache de la page
$fichier_cache = "../../../../cache/cache".$url;
 
//on vérifie si la page n'existe pas dans le cache ou si elle a expiré
if (@filemtime($fichier_cache) < (time() - $timeout)) {    
    //on va récupérer les données pour les mettre en cache
    //pour cela on démarre la bufferisation de la page
    ob_start();
    ?>


<?php

$jsonP = file_get_contents("https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=$VilleLat,$VilleLong&radius=5000&types=mosque&key=AIzaSyD9YQt_KVS5R-QcWzZ_LNq2DJFdRtMHOMg");
$objP = json_decode($jsonP);


$nameI = $objP->{'results'}[0]->{'name'}; 
$nameO = $objP->{'results'}[1]->{'name'}; 
if (isset($nameI)) 
{
echo "<center><div style=\"width:100%; display:block; height:5px; background-color:slategray; margin:0px;\"></div></center>

<h3>Liste des mosquées à $VilleNom $code et aux alentours</h3>

<p>Voici la liste des principaux endroits où prier dans la ville de $VilleNom.</p>

<ul>";

for ($i=0; $i<30; $i++)
{
${'name'.$i} = $objP->{'results'}[$i]->{'name'}; 
${'adress'.$i} = $objP->{'results'}[$i]->{'vicinity'};
${'pic'.$i} = $objP->{'results'}[$i]->{'icon'};
${'id'.$i} = $objP->{'results'}[$i]->{'place_id'};

/*${'jsonD'.$i} = file_get_contents("https://maps.googleapis.com/maps/api/place/details/json?placeid=${'id'.$i}&key=AIzaSyD9YQt_KVS5R-QcWzZ_LNq2DJFdRtMHOMg");
${'objD'.$i} = json_decode(${'jsonD'.$i});
${'phone'.$i} = ${'objD'.$i}->{'formatted_phone_number'}[$i]; */

if (isset(${'name'.$i}) && !strstr(${'name'.$i}, 'م')) echo "<li style=\"line-height:180%\";>${'name'.$i}</li>";
};
echo "</ul>";
};



    //on récupère le contenu du buffer et on l'arrête
    $cache = ob_get_contents();
    ob_end_flush();
 
    // on ouvre le fichier cache    
    $fd = fopen($fichier_cache, "w");
    if ($fd) {
        // on ecrit le contenu du buffer dans le fichier cache
        fwrite($fd,$cache);
        fclose($fd);
     }
}
else  {
    // le fichier cache existe déjà et est valide, on l'affiche
    include($fichier_cache);
}
?>





<script type="application/ld+json">
{	"@context": "http://schema.org/",
	"@type": "Event",
	"name": "- Salat Fajr : <?echo $timesIndex[0];?>",
	"description": "Heure de la prière de Fajr (Sobh) pour la ville de <?echo $VilleNom;?>",
	"startDate": "<?echo date("Y/m/d"); echo "T$timesIndex[0];"?>",
	"endDate": "<?echo date("Y/m/d"); echo "T$timesIndex[0];"?>",
	"performer": {"@type": "Person","name": "La Louange"},
	"url": "https://www.al-hamdoulillah.com<?echo $_SERVER["REQUEST_URI"]?>",
	"offers": {"@type": "AggregateOffer","lowPrice": "0","url": "https://www.al-hamdoulillah.com<?echo $_SERVER["REQUEST_URI"]?>"},
	"image": "https://www.al-hamdoulillah.com/images/snip/fajr.png",
	"location": {"@type": "Place","name": "<?echo $VilleNom;?>", "address": "<?echo $VilleNom;?>, <?echo $VillePays?>"}
}
</script>
<script type="application/ld+json">
{	"@context": "http://schema.org/",
	"@type": "Event",
	"name": "- Salat Dohr : <?echo $timesIndex[2];?>",
	"description": "Heure de la prière de Dohr pour la ville de <?echo $VilleNom;?>",
	"startDate": "<?echo date("Y/m/d"); echo "T$timesIndex[2];"?>",
	"endDate": "<?echo date("Y/m/d"); echo "T$timesIndex[2];"?>",
	"performer": {"@type": "Person","name": "La Louange"},
	"url": "https://www.al-hamdoulillah.com<?echo $_SERVER["REQUEST_URI"]?>",
	"offers": {"@type": "AggregateOffer","lowPrice": "0","url": "https://www.al-hamdoulillah.com<?echo $_SERVER["REQUEST_URI"]?>"},
	"image": "https://www.al-hamdoulillah.com/images/snip/dohr.png",
	"location": {"@type": "Place","name": "<?echo $VilleNom;?>", "address": "<?echo $VilleNom;?>, <?echo $VillePays?>"}
}
</script>
<script type="application/ld+json">
{	"@context": "http://schema.org/",
	"@type": "Event",
	"name": "- Salat Asr : <?echo $timesIndex[3];?>",
	"description": "Heure de la prière de l'Asr pour la ville de <?echo $VilleNom;?>",
	"startDate": "<?echo date("Y/m/d"); echo "T$timesIndex[3];"?>",
	"endDate": "<?echo date("Y/m/d"); echo "T$timesIndex[3];"?>",
	"performer": {"@type": "Person","name": "La Louange"},
	"url": "https://www.al-hamdoulillah.com<?echo $_SERVER["REQUEST_URI"]?>",
	"offers": {"@type": "AggregateOffer","lowPrice": "0","url": "https://www.al-hamdoulillah.com<?echo $_SERVER["REQUEST_URI"]?>"},
	"image": "https://www.al-hamdoulillah.com/images/snip/asr.png",
	"location": {"@type": "Place","name": "<?echo $VilleNom;?>", "address": "<?echo $VilleNom;?>, <?echo $VillePays?>"}
}
</script>
<script type="application/ld+json">
{	"@context": "http://schema.org/",
	"@type": "Event",
	"name": "- Salat Maghrib : <?echo $timesIndex[5];?>",
	"description": "Heure de la prière de Maghrib pour la ville de <?echo $VilleNom;?>",
	"startDate": "<?echo date("Y/m/d"); echo "T$timesIndex[5];"?>",
	"endDate": "<?echo date("Y/m/d"); echo "T$timesIndex[5];"?>",
	"performer": {"@type": "Person","name": "La Louange"},
	"url": "https://www.al-hamdoulillah.com<?echo $_SERVER["REQUEST_URI"]?>",
	"offers": {"@type": "AggregateOffer","lowPrice": "0","url": "https://www.al-hamdoulillah.com<?echo $_SERVER["REQUEST_URI"]?>"},
	"image": "https://www.al-hamdoulillah.com/images/snip/maghrib.png",
	"location": {"@type": "Place","name": "<?echo $VilleNom;?>", "address": "<?echo $VilleNom;?>, <?echo $VillePays?>"}
}
</script>
<script type="application/ld+json">
{	"@context": "http://schema.org/",
	"@type": "Event",
	"name": "- Salat Isha : <?echo $timesIndex[6];?>",
	"description": "Heure de la prière de l'Isha pour la ville de <?echo $VilleNom;?>",
	"startDate": "<?echo date("Y/m/d"); echo "T$timesIndex[6];"?>",
	"endDate": "<?echo date("Y/m/d"); echo "T$timesIndex[6];"?>",
	"performer": {"@type": "Person","name": "La Louange"},
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
	${'VillePays'.$b} = getSuraData($b, 'country');
	${'VilleLat'.$b} = getSuraData($b, 'lat');
	${'VilleLong'.$b} = getSuraData($b, 'long');
	

	if (${'VillePays'.$b} == $VillePays) {
		${'distance'.$b} = ceil(distance($VilleLat, $VilleLong, "${'VilleLat'.$b}", "${'VilleLong'.$b}", "K"));
		if ((${'distance'.$b} < 50) && (${'distance'.$b} > 0)) {
			${'ville'.$b} = str_replace(" ", "-", strtolower(getSuraData($b, 'city')));
			${'continent'.$b} = str_replace(" ", "-", strtolower(getSuraData($b, 'continent')));
			${'country'.$b} = str_replace(" ", "-", strtolower(getSuraData($b, 'country')));
			${'url'.$b} = "/horaires-prieres/monde/${'continent'.$b}/${'country'.$b}/${'ville'.$b}.html";
			if ($ul == 0) echo "<center><div style=\"width:100%; display:block; height:5px; background-color:slategray; margin:0px;\"></div></center><p><b>Heure de prière de villes importantes autour de $VilleNom</b></p><ul>";
			if (${'VilleNom'.$b} !== $VilleNom) echo "<li><a href=\"${'url'.$b}\">${'VilleNom'.$b}</a> (${'distance'.$b} km)</li>";
			$ul++;
		}
		
	}
}

?>
</ul>
<br>