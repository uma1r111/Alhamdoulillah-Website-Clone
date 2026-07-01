 <script src="/en/prayer-times/js/hijri.js"></script>
 
<script>
date = new Date();
var sous = date.getDate();
document.write(sous);

</script>
 
 <?php

$timeStamp = time(); 

$json = file_get_contents("https://maps.googleapis.com/maps/api/timezone/json?location=$VilleLat,$VilleLong&timestamp=$timeStamp&key=AIzaSyD9YQt_KVS5R-QcWzZ_LNq2DJFdRtMHOMg");

$obj = json_decode($json);
$timezone = $obj->{'rawOffset'}/3600;
$dst = $obj->{'dstOffset'}/3600;
$zone = $obj->{'timeZoneId'};

$dateTimeZoneTaipei = new DateTimeZone("Zulu");
$dateTimeZoneJapan = new DateTimeZone("$zone");

$dateTimeTaipei = new DateTime("now", $dateTimeZoneTaipei);
$dateTimeJapan = new DateTime("now", $dateTimeZoneJapan);

$timediff = ($dateTimeZoneJapan->getOffset($dateTimeTaipei))/3600;

$h= gmdate('H');
$j= gmdate('j');
$m= gmdate('i');
$s= gmdate('s');
$heure = $h+$timediff;
$m = sprintf("%02d", $m);	
$s = sprintf("%02d", $s);
$j = sprintf("%02d", $j);

if ($heure >= 24) 
{
$j++;
$heure = $heure-24; 
};

$heure = sprintf("%02d", $heure);
$now = "$heure:$m"; 
$nowa = gmdate("Y-m-$j $heure:i:s"); 
//echo $nowa;

?>

<h1>Prayer Time <?echo $VilleNom?></h1>

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- al-hamdoulillah.com [content] -->
<ins class="adsbygoogle"
     style="display:inline-block;width:468px;height:15px"
     data-ad-client="ca-pub-7774762967038154"
     data-ad-slot="5752127362"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

<p><a href="/en/prayer-times/world/">World</a> > <a href="/en/prayer-times/world/<?echo str_replace(" ", "-", strtolower($VilleContinent));?>/"><?echo $VilleContinent?></a> > <a href="/en/prayer-times/world/<?echo strtolower($VilleContinent)?>/<? echo str_replace(" ", "-", strtolower($VillePays))?>/"><?echo $VillePays?></a> > <strong><?echo $VilleNom?></strong></p>

<p width="100%">Here are the prayer times of <?echo $VilleNom?>, in <?echo $VillePays?>. Fajr prayer in <?echo $VilleNom?> begins at <span id="fajr"></span> AM (according to MWL) and maghrib prayer at <span id="maghrib"></span> PM. The distance from Makkah is <span id="QRhumbDistance" class="QValue"></span>. The population of <?echo $VilleNom?> is <?echo number_format($VillePop)?> people.</p>



<center><div style="width:100%; display:block; height:5px; background-color:slategray; margin:0px;"></div></center>

<table><tr><td style="width:100%;">
<h2>Salat Timetable <?echo $VilleNom?></h2>
</td>

<td style="padding-right:25px; vertical-align:middle;"><div class="fb-like" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div></td>



<table cellpadding="15" style="margin-left:auto; margin-right:auto; height:50px; border-top: 1px solid gray; border-left: 1px solid gray; border-right: 1px solid gray; width:581px;"><tr>
<td style="width:300px;"><span style="cursor:pointer; font-weight:bold;" id="dayo">Today</span> | <span style="cursor:pointer;" id="week">This week</span> | <span style="cursor:pointer;" id="month">This month</span></td>


<td style="text-align:right;">
<div id="navigate" style="display:none;">
<a id="previous" style="font-size:8pt; cursor:pointer">&lt;&lt;</a> Previous | Next <a id="next" style="font-size:8pt; cursor:pointer">&gt;&gt;</a></div>
</td>
</tr></table>


<center>
<table id="today" cellpadding="10" style="width: 581px; border: 1px solid gray; text-align: center;">
<tr><td style="height:50px; background-color:lightblue;" colspan="6">The upcoming prayer is<br><br><span style="font-size:15pt;"><span style="vertical-align:top;" id="waqt"></span><span style="vertical-align:top;"> : <span id="countdown"></span></span></span></td></tr>
<tr>
<td style="text-align:left;">Calculation method<br><span style="color:gray" id="calcul"></span><br><span style="color:gray" id="met"></span></td>
<td style="text-align:right; vertical-align:top;"><span style="cursor:pointer;" id="change">Change settings</span></td>
</tr></table>
<div style="display:none;" id="settings">
<table cellpadding="10" style="width: 581px; height: 100px; font-size: 9pt; border: 1px dashed black;"><tr><td>

<form>Change method calculation : 
<select id="method" onchange="update()">
		<option value="MWL" option="Fajr : 18° | Isha : 17°" selected="selected">Muslim World League (MWL)</option>
		<option value="ISNA" option="Fajr : 15° | Isha : 15°">Islamic Society of North America (ISNA)</option>
		<option value="Egypt" option="Fajr : 19.5° | Isha : 17.5°">Egyptian General Authority of Survey</option>
		<option value="Makkah" option="Fajr : 18.5° | Isha : 90min">Umm al-Qura University, Makkah</option>
		<option value="Karachi" option="Fajr : 18° | Isha : 18°">University of Islamic Sciences, Karachi</option>
		<option value="Jafari" option="Fajr : 16° | Isha : 14°">Shia Ithna-Ashari (Jafari)</option>
		<option value="Tehran" option="Fajr : 17.7° | Isha : 14°">Institute of Geophysics, University of Tehran</option>
		<?php if ($VillePays == 'France') echo "<option value=\"UOIF\" option=\"Fajr : 12° | Isha : 12°\">Islamic Organisations Union of France</option>";?>
    </select>
</form>
</td></tr>
	
<tr><td>
<form>Asr calulation method : 
<select id="asr" onchange="update()">
		<option value="Standard" selected="selected">Standard</option>
		<option value="Hanafi">Hanafi</option>
    </select>
</form>
</td></tr>

<tr><td>
<form>Time format : 
<select id="switch">
		<option value="1">12 hours</option>
		<option value="0">24 hours</option>
    </select>
</form>
</td></tr>


</table>
</div>
</center>
<div id="day">
<center>
<table id="liom" class="timetable">
	<tbody></tbody>
</table>
</div>


<div id="weeka" style="display: none">
<table id="weekly" class="timetable">
	<tbody></tbody>
</table>
</div>

<div id="monthly" style="display: none">
<table style="margin-left:auto; margin-right:auto;">
</td><tr>
	<td id="table-title" class="caption"></td>
</tr>
</table>
<table id="timetable" class="timetable">
	<tbody></tbody>
</table>
</div>
<br>


<?php
$jsonP = file_get_contents("https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=$VilleLat,$VilleLong&radius=5000&types=mosque&key=AIzaSyD9YQt_KVS5R-QcWzZ_LNq2DJFdRtMHOMg");
$objP = json_decode($jsonP);


$nameI = $objP->{'results'}[0]->{'name'}; 
$nameO = $objP->{'results'}[1]->{'name'}; 
if (isset($nameI)) 
{
echo "<center><div style=\"width:100%; display:block; height:5px; background-color:slategray; margin:0px;\"></div></center>

<h3>Where to pray in $VilleNom ?</h3>

<p>Have a look on the principal places to pray in $VilleNom.</p>

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
?>


<script>
jQuery.noConflict(); 
jQuery( "#method" )
  .change(function () {
    var str = "";
    var met = "";
    jQuery( "#method option:selected" ).each(function() {
      str += jQuery( this ).text();
	  met += jQuery( this ).attr('option');
    });
    jQuery( "#calcul" ).text( str );
    jQuery( "#met" ).text( met );
  })
  .change();
</script>



<script>
jQuery.noConflict();
jQuery( "#switch" ).on('change', function() {
  var alors = jQuery(this).val();
  switchFormat(alors);
});

jQuery.noConflict();
jQuery( "#dayo" ).click(function() {
  jQuery( "#day" ).show( );
  jQuery( "#monthly" ).hide( );
  jQuery( "#weeka" ).hide( );
  jQuery( "#dayo" ).css("font-weight", "bold");
  jQuery( "#month" ).css("font-weight", "normal");
  jQuery( "#week" ).css("font-weight", "normal");
});
 

jQuery.noConflict();
jQuery( "#week" ).click(function() {
  jQuery( "#week" ).css("font-weight", "bold");
  jQuery( "#dayo" ).css("font-weight", "normal");
  jQuery( "#month" ).css("font-weight", "normal");
  jQuery( "#weeka" ).show(  );
  jQuery( "#monthly" ).hide( );
  jQuery( "#day" ).hide( );
});

jQuery.noConflict();
jQuery( "#month" ).click(function() {
  jQuery( "#monthly" ).show( );
  jQuery( "#navigate" ).show( );
  jQuery( "#weeka" ).hide( );
  jQuery( "#day" ).hide( );
  jQuery( "#week" ).css("font-weight", "normal");
  jQuery( "#dayo" ).css("font-weight", "normal");
  jQuery( "#month" ).css("font-weight", "bold");
}); 

jQuery.noConflict();
jQuery( "#change" ).click(function() {
  jQuery( "#settings" ).toggle( );
  jQuery( "#change" ).css("font-weight", "bold");
});

jQuery.noConflict();
var $i=0;
jQuery( "#next" ).click(function() {
  $i++;
  displayMonth($i);
});

jQuery.noConflict();
var $i=0;
jQuery( "#previous" ).click(function() {
  $i--;
  displayMonth($i);
});



var timeZone = <?=$timezone?>;
var date = new Date(); // today
var dst = <?=$dst?>;
var tom = new Date(date.getTime()+1000*60*60*24);
var timesA = prayTimes.getTimes(date, [<?=$VilleLat?>, <?=$VilleLong?>], timeZone, dst, '24h');
var timesB = prayTimes.getTimes(tom, [<?=$VilleLat?>, <?=$VilleLong?>], timeZone, dst, '24h');
var goodDate = date.getFullYear() + '-' + ('0' + (date.getMonth()+1)).slice(-2) + '-' + ('0' + date.getDate()).slice(-2);
var goodDateA = tom.getFullYear() + '-' + ('0' + (tom.getMonth()+1)).slice(-2) + '-' + ('0' + tom.getDate()).slice(-2);

var timesI = prayTimes.getTimes(date, [<?=$VilleLat?>, <?=$VilleLong?>], timeZone, dst, '12hNS');



var timeFajr = timesA.fajr;
var timeFajrI = timesI.fajr;

var timeFajre = timesB.fajr;
var timeDhuhr = timesA.dhuhr;
var timeAsr = timesA.asr;

var timeMaghrib = timesA.maghrib;
var timeMaghribI = timesI.maghrib;


var timeIsha = timesA.isha; 

document.getElementById("fajr").innerHTML = timeFajrI;
document.getElementById("maghrib").innerHTML = timeMaghribI;

var now = '<?=$now?>';


if (now < timeFajr) {
	var niceHeure = timeFajr; 
	var timeHeure = 'FAJR';
	document.getElementById("waqt").innerHTML = timeHeure; 
	}
	
if (now > timeFajr && now < timeDhuhr){ 
	var niceHeure = timeDhuhr;
	var timeHeure = 'DHUHR';
	document.getElementById("waqt").innerHTML = timeHeure; 
} 
if (now > timeDhuhr && now < timeAsr){ //document.write("naam");
	var niceHeure = timeAsr;
	var timeHeure = 'ASR';
	document.getElementById("waqt").innerHTML = timeHeure;	
}
if (now > timeAsr && now < timeMaghrib){
	var niceHeure = timeMaghrib; 
	var timeHeure = 'MAGHRIB';
	document.getElementById("waqt").innerHTML = timeHeure;	
} 
if (now > timeMaghrib && now < timeIsha){
	var niceHeure = timeIsha;
	var timeHeure = "ISHA";
	document.getElementById("waqt").innerHTML = timeHeure;	
}

if (now > timeIsha){
	var niceHeure = timeFajre;
	var timeHeure = "FAJR"; 
	document.getElementById("waqt").innerHTML = timeHeure;
}

if (now > timeIsha) var salat = goodDateA + ' ' + niceHeure + ':00'; 

if (now < timeIsha) var salat = goodDate + ' ' + niceHeure + ':00';


var nowa = '<?=$nowa?>';

var fin = moment.tz(salat, "<?=$zone?>");  
var drok = moment.tz(nowa, "<?=$zone?>");

//document.write(fin);
//document.write("<br>");
//document.write(drok);

var diff = fin.diff(drok)/1000;

jQuery.noConflict();
jQuery('#countdown').timeTo(diff);
	
	var timeFormat = 1;
	switchFormat($('switch').value);
	var timeZone = <?=$timezone?>;
	
	
	// display monthly timetable
	function displayMonth(offset) {

		var currentDate = new Date();
		var lat = <?=$VilleLat?>; 
		var lng = <?=$VilleLong?>;
		var timeZone = <?=$timezone?>;		
		var method = $('method').value;
		prayTimes.setMethod(method);
		prayTimesC.setMethod(method);
		currentDate.setMonth(currentDate.getMonth()+ 1 * offset);
		prayTimes.adjust({asr: $('asr').value});
		prayTimesC.adjust({asr: $('asr').value});
		var month = currentDate.getMonth();
		var year = currentDate.getFullYear();

		var title = monthFullName(month)+ ' '+ year;		
		$('table-title').innerHTML = title;
	
		makeTable3(year, month, lat, lng, timeZone, dst);
	}
	
function displayMonthA() {
		
		var currentDate = new Date();
		var lat = <?=$VilleLat?>; 
		var lng = <?=$VilleLong?>;
		var timeZone = <?=$timezone?>;
		var method = $('method').value;
		prayTimes.setMethod(method);
		prayTimesC.setMethod(method);
		currentDate.setMonth(currentDate.getMonth());
		var month = currentDate.getMonth();
		var year = currentDate.getFullYear();
		prayTimes.adjust({asr: $('asr').value});
		prayTimesC.adjust({asr: $('asr').value});
		
		makeTable1(year, month, lat, lng, timeZone, dst);
		makeTable2(year, month, lat, lng, timeZone, dst);
	}

	// make monthly timetable
	function makeTable1(year, month, lat, lng, timeZone, dst) {
		var items = {fajr: '<span style="color:green; font-size:10pt;">Fajr</span>', sunrise: '<span style="color:green; font-size:10pt;">Sunrise</span>', dhuhr: '<span style="color:green;font-size:10pt;">Dhuhr</span>', asr: '<span style="color:green;font-size:10pt;">Asr</span>',  maghrib: '<span style="color:green; font-size:10pt;">Maghrib</span>', isha: '<span style="color:green; font-size:10pt;">Isha</span>'};
		var tbody = document.createElement('tbody');
		tbody.appendChild(makeTableRowToday(items, items));
		var today = new Date();
		var date = new Date(year, month, today.getDate());
		var format = timeFormat ? '12h' : '24h';		
		var times = prayTimes.getTimes(date, [lat, lng], timeZone, dst, format);
		tbody.appendChild(makeTableRowToday(times, items));			
		removeAllChild($('liom'));
		$('liom').appendChild(tbody);
	}
	
		
	// make monthly timetable
	function makeTable2(year, month, lat, lng, timeZone, dst) {
		var items = {day: '<span style="font-size:12pt; font-weight:normal">اليوم</span><br>Day', fajr: '<span style="font-size:12pt; font-weight:normal">الفجر</span><br>Fajr', sunrise: '<span style="font-size:12pt; font-weight:normal">الشروق</span><br>Shuruq', dhuhr: '<span style="font-size:12pt; font-weight:normal">الظهر</span><br>Dhuhr', asr: '<span style="font-size:12pt; font-weight:normal">العصر</span><br>\Asr',  maghrib: '<span style="font-size:12pt; font-weight:normal">المغرب</span><br>Maghrib', isha: '<span style="font-size:12pt; font-weight:normal">العشاء</span><br>\Isha'};				
		var tbody = document.createElement('tbody');
		tbody.appendChild(makeTableRow(items, items, 'head-row'));
		var today = new Date();
		var date = new Date(year, month, today.getDate()-1);
		var endDate = new Date(year, month, today.getDate()+6);
		var format = timeFormat ? '12h' : '24h';
		
		while (date < endDate) {
		var tz = '<?=$zone?>';
		if (moment.tz(date.getTime()+1000*60*60*24,tz).isDST() == false) { dst = 0; } else { dst = 1;}
		var times = prayTimesC.getTimes(date, [lat, lng], timeZone, dst, format);
		var jour = new Array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');
		times.day = ((jour[date.getDay()])+" "+date.getDate());
		var today = new Date(); 		
		var isToday = (date.getMonth() == today.getMonth()) && (date.getDate() == today.getDate());
		var isFriday = (date.getDay() == 5);
		var klass = isToday ? 'today-row' : '';
		var friday = isFriday ? 'vendredi-row' : '';
		tbody.appendChild(makeTableRow(times, items, klass, friday));			
		date.setDate(date.getDate()+ 1); // next day
		}
	
		removeAllChild($('weekly'));
		$('weekly').appendChild(tbody);
	}

		
	// make monthly timetable
	function makeTable3(year, month, lat, lng, timeZone, dst) {		
		var items = {day: '<span style="font-size:12pt; font-weight:normal">اليوم</span><br>Day', fajr: '<span style="font-size:12pt; font-weight:normal">الفجر</span><br>Fajr', sunrise: '<span style="font-size:12pt; font-weight:normal">الشروق</span><br>Shuruq', dhuhr: '<span style="font-size:12pt; font-weight:normal">الظهر</span><br>Dhuhr', asr: '<span style="font-size:12pt; font-weight:normal">العصر</span><br>\Asr',  maghrib: '<span style="font-size:12pt; font-weight:normal">المغرب</span><br>Maghrib', isha: '<span style="font-size:12pt; font-weight:normal">العشاء</span><br>\Isha'};			
		var tbody = document.createElement('tbody');
		tbody.appendChild(makeTableRow(items, items, 'head-row'));
		var today = writeIslamicDate(0);
		var date = writeIslamicDate(year, month, 1);
		var endDate = writeIslamicDate(year, month+1, 1);
		var format = timeFormat ? '12h' : '24h';		

		while (date < endDate) {
			
			var tz = '<?=$zone?>';
			if (moment.tz(date.getTime()+1000*60*60*24,tz).isDST() == false) { dst = 0; } else { dst = 1;}
			var times = prayTimesC.getTimes(date, [lat, lng], timeZone, dst, format);
			var jour = new Array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');
			times.day = jour[date.getDay()] + " " + writeIslamicDate(date.getDate()-sous);
			var today = new Date(); 
			var isToday = (date.getMonth() == today.getMonth()) && (date.getDate() == today.getDate());
			var isFriday = (date.getDay() == 5);
			var klass = isToday ? 'today-row' : '';
			var friday = isFriday ? 'vendredi-row' : '';
			tbody.appendChild(makeTableRow(times, items, klass, friday));			
			date.setDate(date.getDate()+ 1); // next day
		}
	
		removeAllChild($('timetable'));
		$('timetable').appendChild(tbody);
	}

	// make a table row
	function makeTableRowToday(data, items) {
		var row = document.createElement('tr');
		for (var i in items) {
			var cell = document.createElement('td');
			cell.style.fontSize = '19pt';
			cell.style.textAlign = 'center';
			cell.innerHTML = data[i];
			cell.style.width = i=='day' ? '4.5em' : '4.0em';
			row.appendChild(cell);		
		}
		return row;
		
	}
	
	// make a table row
	function makeTableRow(data, items, klass, friday) {
		var row = document.createElement('tr');
		for (var i in items) {
			var cell = document.createElement('td');
			cell.innerHTML = data[i];
			cell.style.width = i=='day' ? '4.5em' : '4.0em';
			row.appendChild(cell);		
		}
		row.className = klass || friday
		return row;
		
	}

	// remove all children of a node
	function removeAllChild(node) {
		if (node == undefined || node == null)
			return;

		while (node.firstChild)
			node.removeChild(node.firstChild);
	}

	// switch time format
	function switchFormat(offset) {
		var formats = ['24 hours', '12 hours'];
		timeFormat = (timeFormat+ offset)% 2;
		update();
	}

	// update table
	function update() {
		displayMonth(0);
		displayMonthA();
	}

	// return month full name
	function monthFullName(month) {
		var monthName = new Array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
		return monthName[month];
	}

	function $(id) {
		return document.getElementById(id);
	}
	


</script>