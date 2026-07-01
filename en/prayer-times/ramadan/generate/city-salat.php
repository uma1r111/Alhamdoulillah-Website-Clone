<script src="/horaires-prieres/js/moment-hijri.js"></script>

<?php
$zone = $VilleZone;
$dateTimeZoneZulu = new DateTimeZone("Zulu");
$dateTimeZone = new DateTimeZone("$zone");
$dateTimeZulu = new DateTime("now", $dateTimeZoneZulu);
$dateTime = new DateTime("now", $dateTimeZone);

$timediff = ($dateTimeZone->getOffset($dateTimeZulu))/3600;
$timezone = $timediff;


$h= gmdate('H');
$j= gmdate('j');
$m= gmdate('i');
$s= gmdate('s');
$heure = $h+$timediff;
$m = sprintf("%02d", $m);	
$s = sprintf("%02d", $s);
$j = sprintf("%02d", $j);
$o = $j+1;

if ($heure >= 24) 
{
$j++;
$j = sprintf("%02d", $j);
$heure = $heure-24; 
};

$heure = sprintf("%02d", $heure);
$now = "$heure:$m"; 
$nowa = gmdate("Y-m-$j $heure:i:s"); 
//echo $nowa;

?>

<h1>Ramadan Calendar <?echo $VilleNom?></h1>

<?php include("../../../../../inc/pub-content.php");?>

<p style="padding-top:20px;"><a href="/en/prayer-times/ramadan/">Ramadan Calendar</a> > <a href="/en/prayer-times/ramadan/<?echo str_replace(" ", "-", strtolower($VilleContinent));?>/"><?echo $VilleContinent?></a> > <a href="/en/prayer-times/ramadan/<? echo str_replace(" ", "-", strtolower($VilleContinent))?>/<? echo str_replace(" ", "-", strtolower($VillePays))?>/"><?echo $VillePays?></a> > <strong><?echo $VilleNom?></strong></p>

<img alt="salat <?echo $VilleNom?>" id="stamp" src="/images/prayer-time.png">

<p><b>Today</b> : <?php setlocale (LC_TIME, 'en_EN.utf8','eng'); echo strftime("%A %d %B %Y");?></p>



<ul>
	<li><b>Imsak</b> (Fajr) : <b><span id="Gfajr"></span></b></li>
	<li>Sunrise : <span id="Gsunrise"></span></li>
	<li>Dhuhr : <span id="Gdhuhr"></span></li>
	<li>Asr : <span id="Gasr"></span></li>
	<li><b>Iftar</b> (Maghrib) : <b><span id="Gmaghrib"></span></b></li>
	<li>Isha : <span id="Gisha"></span></li>
	<li>Midnight : <span id="Gnight"></span></li>
</ul>


<p>Here are the fasting breaks times (iftar) at <?echo $VilleNom?> <? if(!empty($code)) echo "$code and its surroundings";?>. Imsak time corresponds to the adhan time and begins at <span id="fajr"></span> AM according to the Muslim World League <? if ($VillePays == 'France') echo "(<span id=\"fajr2\"></span> according to UOIF)";?> and the fasting break time (maghrib) at <span id="maghrib"></span> PM.</p>

<center><div style="width:100%; display:block; height:5px; background-color:slategray; margin:0px;"></div></center>


<h2>Ramadan Timetable <?echo $VilleNom?></h2>

<?php include("../../../../inc/share.php");?>


<br>

<center>
<table id="today" cellpadding="10" style="width: 100%; border: 1px solid gray; text-align: center;">
<tr><td style="height:50px; background-color:lightblue;" colspan="6">The next prayer is<br><br><span style="font-size:15pt;"><span style="vertical-align:top;" id="waqt"></span><span style="vertical-align:top;"> : <span id="countdown"></span></span></span></td></tr>
<tr>
<td style="text-align:left;">Calculation methods<br><span style="color:gray" id="calcul"></span><br><span style="color:gray" id="met"></span></td>
<td style="text-align:right; vertical-align:top;"><span style="cursor:pointer;" id="change">Change settings</span></td>
</tr></table>
<div style="display:none;" id="settings">
<table cellpadding="10" style="width: 100%; height: 100px; font-size: 9pt; border: 1px dashed black;"><tr><td>

<form>Change calculation methods : 
<select id="method" onchange="update()">
		<?php 
		if ($VillePays == 'France') echo "<option value=\"UOIF\" option=\"Fajr : 12° | Isha : 12°\" selected=\"selected\">Muslims from France</option>";?>
		<option value="MWL" option="Fajr : 18° | Isha : 17°">Muslim World League (MWL)</option>
		<option value="ISNA" option="Fajr : 15° | Isha : 15°">Islamic Society of North America (ISNA)</option>
		<option value="Egypt" option="Fajr : 19.5° | Isha : 17.5°">Egyptian General Authority of Survey</option>
		<option value="Makkah" option="Fajr : 18.5° | Isha : 90min">Umm al-Qura University, Makkah</option>
		<option value="Karachi" option="Fajr : 18° | Isha : 18°">University of Islamic Sciences, Karachi</option>
		<option value="Tehran" option="Fajr : 17.7° | Isha : 14°">Institute of Geophysics, University of Tehran</option>
		
    </select>
</form>
</td></tr>
	
<tr><td>
<form>Asr calculation : 
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

<h4 style="margin-left:15px;">Ramadan Calendar for the city of <?echo $VilleNom?></h4>
<p style="color:red;">Imsak = Fajr</p>
<table id="timetable" class="timetable">
	<tbody></tbody>
</table>


<br>

<div style="display:none"><h4 style="margin-left:20px;">Awqat Ramadan <?echo $VilleNom?> for Today, the <? echo date("d/m/Y");?>  :</h4>
<center>
<table id="liom" class="timetable">
	<tbody></tbody>
</table>
</center>
</div>

<p>You can also see our calendar for <a href="/en/prayer-times/world/<? echo str_replace(" ", "-", strtolower($VilleContinent))?>/<? echo str_replace(" ", "-", strtolower($VillePays))?>/<? echo str_replace(" ", "-", strtolower($VilleNom))?>.html">prayer times in <?echo $VilleNom?></a>.</p>



<script>
var tz = '<?=$zone?>';
var timeZone = <?=$timezone?>;
var date = new Date();
var dst = 0;
<?php if ($VillePays == 'Maroc') echo "var dst = 1; "?>

var goodDate = date.getFullYear() + '-' + ('0' + (date.getMonth()+1)).slice(-2) + '-' + ('0' + date.getDate()).slice(-2);

var timesA = prayTimes.getTimes(date, [<?=$VilleLat?>, <?=$VilleLong?>], timeZone, dst, '24h');
var timesI = prayTimes.getTimes(date, [<?=$VilleLat?>, <?=$VilleLong?>], timeZone, dst, '12hNS');

var timesZ = prayTimesZ.getTimes(date, [<?=$VilleLat?>, <?=$VilleLong?>], timeZone, dst, '12hNS');
var timesX = prayTimesZ.getTimes(date, [<?=$VilleLat?>, <?=$VilleLong?>], timeZone, dst, '24h');


var timeFajr = timesA.fajr;
var timeSunrise = timesA.sunrise;
var timeIshaX = timesX.isha;

var timeDhuhr = timesA.dhuhr;
var timeAsr = timesA.asr;
var timeMaghrib = timesA.maghrib;
var timeIsha = timesA.isha;
var timeMidnight = timesA.midnight;

var timeFajrI = timesI.fajr;
var timeMaghribI = timesI.maghrib;

var timeFajrZ = timesX.fajr;

//si UOIF
if (method = 'UOIF') {
	timeFajr = timeFajrZ;
	if (timeFajrZ.length == 4) timeFajr = '0' + timeFajrZ;
	}
	
if (method = 'UOIF') {
	var timeDhuhrZ = timesX.dhuhr;
	timeDhuhr = timeDhuhrZ;
	if (timeDhuhrZ.length == 4) timeDhuhr = '0' + timeDhuhrZ;
	}



document.getElementById("Gsunrise").innerHTML = timeSunrise;
document.getElementById("Gdhuhr").innerHTML = timeDhuhr;
document.getElementById("Gasr").innerHTML = timeAsr;
document.getElementById("Gmaghrib").innerHTML = timeMaghrib;
document.getElementById("Gisha").innerHTML = timeIsha;
document.getElementById("Gnight").innerHTML = timeMidnight;

if (timeFajrI.length == 4) timeFajrI = '0' + timeFajrI;

document.getElementById("Gfajr").innerHTML = timeFajrI;
document.getElementById("fajr").innerHTML = timeFajrI;

<?php 
if ($VillePays == 'France') echo "
document.getElementById(\"fajr2\").innerHTML = timeFajrZ;
document.getElementById(\"Gfajr\").innerHTML = timeFajr;
document.getElementById(\"Gisha\").innerHTML = timeIshaX;
"?>
document.getElementById("maghrib").innerHTML = timeMaghribI;


var now = '<?=$now?>';

if (now < timeFajr) {
	var niceHeure = timeFajr; 
	<?php if ($VillePays !== 'France') echo "
	var niceHeure = timeFajrI;
	"?>
	var timeHeure = 'FAJR';
	document.getElementById("waqt").innerHTML = timeHeure; 
	}
	
if (now > timeFajr && now < timeDhuhr){ 
	var niceHeure = timeDhuhr;
	var timeHeure = 'Dhuhr';
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
	var niceHeure = timeFajr;
	var timeHeure = "FAJR"; 
	document.getElementById("waqt").innerHTML = timeHeure;
}

if (now > timeIsha) var salat = goodDate + ' ' + niceHeure + ':00'; 

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
		if (method == 'UOIF') prayTimes.tune( {fajr: -5, dhuhr: 5, isha: 5} );
		if (method == 'MWL') prayTimes.tune( {fajr: 5} );
		var month = currentDate.getMonth();
		var year = currentDate.getFullYear();

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
		if (method == 'UOIF') prayTimes.tune( {fajr: -5, dhuhr: 5, isha: 5} );
		
		makeTable1(year, month, lat, lng, timeZone, dst);
	}

	// make monthly timetable
	function makeTable1(year, month, lat, lng, timeZone, dst) {
		var items = {fajr: '<span style="color:green; font-size:10pt;">Imsak</span>', sunrise: '<span style="color:green; font-size:10pt;">Chourouq</span>', dhuhr: '<span style="color:green;font-size:10pt;">Dhuhr</span>', asr: '<span style="color:green;font-size:10pt;">Asr</span>',  maghrib: '<span style="color:green; font-size:10pt;">Iftar</span>', isha: '<span style="color:green; font-size:10pt;">Isha</span>'};
		var tbody = document.createElement('tbody');
		tbody.appendChild(makeTableRowToday(items, items));
		var today = new Date();
		var date = new Date(year, month, today.getDate());
		//if (moment.tz(date.getTime()+1000*60*60*24,tz).isDST() == false) { dst = 0; } else { dst = 1;}
		var format = timeFormat ? '12h' : '24h';		
		var times = prayTimes.getTimes(date, [lat, lng], timeZone, dst, format);
		tbody.appendChild(makeTableRowToday(times, items));			
		removeAllChild($('liom'));
		$('liom').appendChild(tbody);
	}
	
		
	// make monthly timetable
	function makeTable3(year, month, lat, lng, timeZone, dst) {		
		var items = {day: '<span style="font-size:12pt; font-weight:normal">اليوم</span><br>Day', fajr: '<span style="font-size:12pt; font-weight:normal">الفجر</span><br>Fajr', sunrise: '<span style="font-size:12pt; font-weight:normal">الشروق</span><br>Chourq.', dhuhr: '<span style="font-size:12pt; font-weight:normal">الظهر</span><br>Dhuhr', asr: '<span style="font-size:12pt; font-weight:normal">العصر</span><br>\Asr',  maghrib: '<span style="font-size:12pt; font-weight:normal">المغرب</span><br>Maghrib', isha: '<span style="font-size:12pt; font-weight:normal">العشاء</span><br>\Isha'};			
		var tbody = document.createElement('tbody');
		tbody.appendChild(makeTableRow(items, items, 'head-row'));
		var today = new Date();
		var date = new Date(moment('1442/8/29', 'iYYYY/iM/iD')-1);
		m = moment('1442/8/29', 'iYYYY/iM/iD');
		var endDate = new Date(moment('1442/10/3', 'iYYYY/iM/iD'));
		var format = timeFormat ? '12h' : '24h';
		
		while (date < endDate) {
		
			var tz = '<?=$zone?>';
			//if (moment.tz(date.getTime()+1000*60*60*24,tz).isDST() == false) { dst = 0; } else { dst = 1;}
			var times = prayTimesC.getTimes(date, [lat, lng], timeZone, dst, format);
			if (method == 'UOIF') prayTimesC.tune( {fajr: -5, dhuhr: 5, isha: 5} );
			var jour = new Array('sun', 'mon', 'tue', 'wed', 'thu', 'fri', 'sat');
			montha = m.format('iM');
			if (montha == '8') ram = "chaban";
			if (montha == '9') ram = "ramadan";
			if (montha == '10') ram = "chawwal";
			
			karim = m.format('iD');
			karim = karim.replace("٠", "0");
			karim = karim.replace("١", "1");
			karim = karim.replace("٢", "2");
			karim = karim.replace("٣", "3");
			karim = karim.replace("٤", "4");
			karim = karim.replace("٥", "5");
			karim = karim.replace("٦", "6");
			karim = karim.replace("٧", "7");
			karim = karim.replace("٨", "8");
			karim = karim.replace("٩", "9");
			karim = karim.replace("1١", "11");
			karim = karim.replace("2٢", "22");
			
			
			times.hijri = ("<b>" + karim + "</b>" + "<br>" + ram);
			if ((karim > 19) && (ram == 'ramadan')) times.hijri = ("<b><span style=\"color:red;\">" + karim + "</span></b>" + "<br>" + ram);
			times.day = times.hijri + "<br>" + "<span style=\"font-size:8pt\";>(" + ((jour[date.getDay()])+" "+date.getDate()) + ")</span>";
			var today = new Date(); 
			var isToday = (date.getMonth() == today.getMonth()) && (date.getDate() == today.getDate());
			var isRamadan = (montha == '٨') || (montha == '١٠');
			var isFriday = (date.getDay() == 5) && (montha == '٩');
			var klass = isToday ? 'today-row' : '';
			var friday = isFriday ? 'vendredi-row' : '';
			var ramadan = isRamadan ? 'ramadan-row' : '';
			tbody.appendChild(makeTableRow(times, items, klass, friday, ramadan));			
			m.add(1, 'D');
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
	function makeTableRow(data, items, klass, friday, ramadan) {
		var row = document.createElement('tr');
		for (var i in items) {
			var cell = document.createElement('td');
			cell.innerHTML = data[i];
			cell.style.width = i=='day' ? '4.5em' : '4.0em';
			row.appendChild(cell);		
		}
		row.className = klass || friday || ramadan
		return row;
		
	}

	// remove all childrin of a node
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


	function $(id) {
		return document.getElementById(id);
	}

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

  
jQuery.noConflict();
jQuery( "#switch" ).on('change', function() {
  var alors = jQuery(this).val();
  switchFormat(alors);
}); 

jQuery.noConflict();
jQuery( "#change" ).click(function() {
  jQuery( "#settings" ).toggle( );
  jQuery( "#change" ).css("font-weight", "bold");
});

	
</script>


<script type="application/ld+json">
{	"@context": "https://schema.org/",
	"@type": "Event",
	"name": "🕋 Salat Fajr Imsak",
	"description": "Imsak time for the city of <?echo $VilleNom;?>",
	"startDate": "<?echo date("Y/m/d"); echo "T"; echo rand(0, 0) . rand(1, 2) . ":" . rand(0, 5) . rand(0, 9);?>",
	"endDate": "<?echo date("Y/m/d"); echo "T"; echo rand(0, 0) . rand(3, 4) . ":" . rand(0, 5) . rand(0, 9);?>",
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
	"name": "🕋 Salat Dhuhr",
	"description": "Dhuhr prayer times for the city of <?echo $VilleNom;?>",
	"startDate": "<?echo date("Y/m/d"); echo "T"; echo rand(1, 1) . rand(1, 3) . ":" . rand(0, 5) . rand(0, 9);?>",
	"endDate": "<?echo date("Y/m/d"); echo "T"; echo rand(1, 1) . rand(4, 5) . ":" . rand(0, 5) . rand(0, 9);?>",
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
	"name": "🕋 Salat Asr",
	"description": "Asr prayer times for the city of <?echo $VilleNom;?>",
	"startDate": "<?echo date("Y/m/d"); echo "T"; echo rand(1, 1) . rand(5, 7) . ":" . rand(0, 5) . rand(0, 9);?>",
	"endDate": "<?echo date("Y/m/d"); echo "T"; echo rand(1, 1) . rand(5, 8) . ":" . rand(0, 5) . rand(0, 9);?>",
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
	"name": "🕋 Salat Maghrib (Iftar)",
	"description": "Iftar time for the city of <?echo $VilleNom;?>",
	"startDate": "<?echo date("Y/m/d"); echo "T"; echo rand(1, 2) . rand(0, 1) . ":" . rand(0, 5) . rand(0, 9);?>",
	"endDate": "<?echo date("Y/m/d"); echo "T"; echo rand(2, 2) . rand(2, 3) . ":" . rand(0, 5) . rand(0, 9);?>",
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
	"name": "🕋 Salat Isha",
	"description": "Isha prayer times for the city of <?echo $VilleNom;?>",
	"startDate": "<?echo date("Y/m/d"); echo "T"; echo rand(2, 2) . rand(0, 1) . ":" . rand(0, 5) . rand(0, 9);?>",
	"endDate": "<?echo date("Y/m/d"); echo "T"; echo rand(2, 2) . rand(2, 3) . ":" . rand(0, 5) . rand(0, 9);?>",
	"performer": {"@type": "Person","name": "al-hamdoulillah.com"},
	"url": "https://www.al-hamdoulillah.com<?echo $_SERVER["REQUEST_URI"]?>",
	"offers": {"@type": "AggregateOffer","lowPrice": "0","url": "https://www.al-hamdoulillah.com<?echo $_SERVER["REQUEST_URI"]?>"},
	"image": "https://www.al-hamdoulillah.com/images/snip/isha.png",
	"location": {"@type": "Place","name": "<?echo $VilleNom;?>", "address": "<?echo $VilleNom;?>, <?echo $VillePays?>"}
}
</script>




<br>