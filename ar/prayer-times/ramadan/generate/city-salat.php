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

<h1>تقويم رمضان <?echo $VilleNom?></h1>

<?php include("../../../../../inc/pub-content.php");?>

<p style="padding-top:20px;"><a href="/ar/prayer-times/ramadan/">تقويم رمضان</a> > <a href="/ar/prayer-times/ramadan/<?echo str_replace(" ", "-", strtolower($VilleContinentURL));?>/"><?echo $VilleContinent?></a> > <a href="/ar/prayer-times/ramadan/<? echo str_replace(" ", "-", strtolower($VilleContinentURL))?>/<? echo str_replace(" ", "-", strtolower($VillePaysURL))?>/"><?echo $VillePays?></a> > <strong><?echo $VilleNom?></strong></p>

<p><b>اليوم</b> : <?php setlocale(LC_ALL, 'ar_AE.utf8'); echo strftime("%A %d %B %Y");?></p>



<ul>
	<li><b>الإمساك</b> (الفجر) : <b><span id="Gfajr"></span></b></li>
	<li>الشروق : <span id="Gsunrise"></span></li>
	<li>الظهر : <span id="Gdhuhr"></span></li>
	<li>العصر : <span id="Gasr"></span></li>
	<li><b>الإفطار</b> (المغرب) : <b><span id="Gmaghrib"></span></b> </li>
	<li>العشاء : <span id="Gisha"></span> <?php if ($VillePays == 'المملكة العربية السعودية') echo "[30 دقيقة زائدة خلال شهر رمضان]";?></li>
	<li>منتصف الليل : <span id="Gnight"></span></li>
</ul>


<?php if ($VillePays == 'المملكة العربية السعودية') 

echo "
	
<p>هنا أوقات الإفطار في $VilleNom وقت إمساك يوافق وقت الأذان ويبدأ في <span id=\"fajr\"></span> صباحا وفقا أم القرى  ووقت الإفطار (المغرب) في <span id=\"maghrib\"></span> مساء.</p>";

?>

<?php if ($VillePays !== 'المملكة العربية السعودية') {?>

<p>هنا أوقات الإفطار في <?echo $VilleNom?> <? if(!empty($code)) echo "$code والمناطق المحيطة بها";?>. وقت إمساك يوافق وقت الأذان ويبدأ في <span id="fajr"></span> صباحا وفقا لرابطة العالم الإسلامي <? if ($VillePays == 'فرنسا') echo "(<span id=\"fajr2\"></span> وفقا UOIF)";?> ووقت الإفطار (المغرب) في <span id="maghrib"></span> مساء.</p>

<?php }?>

<center><div style="width:100%; display:block; height:5px; background-color:slategray; margin:0px;"></div></center>


<h2>جدول رمضان <?echo $VilleNom?></h2>

<?php include("../../../../inc/share.php");?>


<br>

<center>
<table id="today" cellpadding="10" style="width: 100%; border: 1px solid gray; text-align: center;">
<tr><td style="height:50px; background-color:lightblue; direction:ltr" colspan="6">الصلاة القادمة هي<br><br><span style="direction:ltr;" id="countdown"></span></span></span><span style="font-size:15pt;"><span style="vertical-align:top;"> : <span style="vertical-align:top;" id="waqt"></span></td> </tr>
<tr>
<td style="text-align:right;">طرق الحساب<br><span style="color:gray" id="calcul"></span><br><span style="color:gray" id="met"></span></td>
<td style="text-align:right; vertical-align:top;"><span style="cursor:pointer;" id="change">تغيير الاعدادات</span></td>
</tr></table>
<div style="display:none;" id="settings">
<table cellpadding="10" style="width: 100%; height: 100px; font-size: 9pt; border: 1px dashed black;"><tr><td>

<form>تغيير طرق الحساب : 
<select id="method" onchange="update()">
		<?php 
		if ($VillePays == 'المملكة العربية السعودية') echo "<option value=\"Makkah\" option=\"الفجر : 18.5° | العشاء : 120 د\">جامعة أم القرى ، مكة المكرمة</option>";
		if ($VillePays == 'فرنسا') echo "<option value=\"UOIF\" option=\"الفجر	 : 12° | العشاء : 12°\" selected=\"selected\">المسلمون في فرنسا</option>";?>
		<option value="MWL" option="الفجر : 18° | العشاء : 17°">رابطة العالم الإسلامي (MWL)</option>
		<option value="ISNA" option="الفجر : 15° | العشاء : 15°">الجمعية الإسلامية لأمريكا الشمالية (ISNA)</option>
		<option value="Egypt" option="الفجر : 19.5° | العشاء : 17.5°">الهيئة المصرية العامة للمساحة</option>
		<option value="Makkah" option="الفجر : 18.5° | العشاء : 120 د">جامعة أم القرى ، مكة المكرمة</option>
		<option value="Karachi" option="الفجر : 18° | العشاء : 18°">جامعة العلوم الإسلامية ، كراتشي</option>
		<option value="Tehran" option="الفجر : 17.7° | العشاء : 14°">معهد الجيوفيزياء ، جامعة طهران</option>
		
    </select>
</form>
</td></tr>
	
<tr><td>
<form>حساب العصر : 
<select id="asr" onchange="update()">
		<option value="Standard" selected="selected">اساسي</option>
		<option value="Hanafi">حنفي</option>
    </select>
</form>
</td></tr>

<tr><td>
<form>نسيق الوقت :
<select id="switch">
		<option value="1">12 ساعة</option>
		<option value="0">24 ساعة</option>
    </select>
</form>
</td></tr>


</table>
</div>
</center>

<h4 style="margin-left:15px;">التقويم رمضان لمدينة <?echo $VilleNom?></h4>
<p style="color:red;">امساك = الفجر</p>
<table id="timetable" class="timetable">
	<tbody></tbody>
</table>


<br>

<div style="display:none"><h4 style="margin-left:20px;">اوقات رمضان <?echo $VilleNom?> لهذا اليوم ، <? echo date("d/m/Y");?>  :</h4>
<center>
<table id="liom" class="timetable">
	<tbody></tbody>
</table>
</center>
</div>

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
if ($VillePays == 'فرنسا') echo "
document.getElementById(\"fajr2\").innerHTML = timeFajrZ;
document.getElementById(\"Gfajr\").innerHTML = timeFajr;
document.getElementById(\"Gisha\").innerHTML = timeIshaX;
"?>
document.getElementById("maghrib").innerHTML = timeMaghribI;




var now = '<?=$now?>';

if (now < timeFajr) {
	var niceHeure = timeFajr; 
	<?php if ($VillePays !== 'فرنسا') echo "
	var niceHeure = timeFajrI;
	"?>
	var timeHeure = 'الفجر';
	document.getElementById("waqt").innerHTML = timeHeure; 
	}
	
if (now > timeFajr && now < timeDhuhr){ 
	var niceHeure = timeDhuhr;
	var timeHeure = 'الظهر';
	document.getElementById("waqt").innerHTML = timeHeure; 
} 
if (now > timeDhuhr && now < timeAsr){ //document.write("naam");
	var niceHeure = timeAsr;
	var timeHeure = 'العصر';
	document.getElementById("waqt").innerHTML = timeHeure;	
}
if (now > timeAsr && now < timeMaghrib){
	var niceHeure = timeMaghrib; 
	var timeHeure = 'المغرب';
	document.getElementById("waqt").innerHTML = timeHeure;	
} 
if (now > timeMaghrib && now < timeIsha){
	var niceHeure = timeIsha;
	var timeHeure = "العشاء";
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
		var items = {day: '<span style="font-size:13pt;">اليوم</span>', fajr: '<span style="font-size:13pt;"><b>الفجر</b></span>', sunrise: '<span style="font-size:13pt;">الشروق</span>', dhuhr: '<span style="font-size:13pt;">الظهر</span>', asr: '<span style="font-size:13pt;">العصر</span>',  maghrib: '<span style="font-size:13pt;"><b>المغرب</b></span>', isha: '<span style="font-size:13pt;">العشاء</span>'};			
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
			var jour = new Array('الأحد', 'الإثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة', ' السبت');
			montha = m.format('iM');
			if (montha == '8') ram = "شعبان";
			if (montha == '9') ram = "رمضان";
			if (montha == '10') ram = "شوال";
			
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
			if ((karim > 19) && (ram == 'رمضان')) times.hijri = ("<b><span style=\"color:red;\">" + karim + "</span></b>" + "<br>" + ram);
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
	"name": "🕋 صلاة فجر امسك",
	"description": "وقت إمساك لمدينة <?echo $VilleNom;?>",
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
	"name": "🕋 صلات الظهر",
	"description": "أوقات صلاة الظهر لمدينة <?echo $VilleNom;?>",
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
	"name": "🕋 صلاة العصر",
	"description": "أوقات صلاة العصر لمدينة <?echo $VilleNom;?>",
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
	"name": "🕋 صلاة المغرب (إفطار)",
	"description": "وقت الإفطار لمدينة <?echo $VilleNom;?>",
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
	"name": "🕋 صلاة العشاء",
	"description": "وقت صلاة العشاء لمدينة <?echo $VilleNom;?>",
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