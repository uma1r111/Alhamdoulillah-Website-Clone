<?php 

$date_puberte = $_POST['date_puberte'];
$date_salat = $_POST['date_salat'];
$genre = $_POST['genre'];


$date0 = time();
$date1 = str_replace('/', '-', $date_salat);
$date2 = str_replace('/', '-', $date_puberte);

$diff = $date0 - strtotime($date1); 	
$diff2 = $date0 - strtotime($date2); 
$diff3 = strtotime($date1) - strtotime($date2); 
$test = $diff2 - $diff;

if ($genre == "femme"){
	$diff = $date0 - strtotime($date1); 	
	$diff2 = $date0 - (strtotime($date2)+3600*24*10); 
	$diff3 = strtotime($date1) - (strtotime($date2)+3600*24*10); 
	$test = $diff2 - $diff;
	$date_puberte = date("d/m/Y", strtotime($date2)+3600*24*10);
}


$years1   = floor($diff / (365*60*60*24));
$months1  = floor(($diff - $years1 * 365*60*60*24) / (30*60*60*24)); 
$days1    = floor(($diff - $years1 * 365*60*60*24 - $months1*30*60*60*24)/ (60*60*24));

$years2   = floor($diff2 / (365*60*60*24)); 
$months2  = floor(($diff2 - $years2 * 365*60*60*24) / (30*60*60*24)); 
$days2    = floor(($diff2 - $years2 * 365*60*60*24 - $months2*30*60*60*24)/ (60*60*24));

$years3   = floor($diff3 / (365*60*60*24));
$months3  = floor(($diff3 - $years3 * 365*60*60*24) / (30*60*60*24)); 
$days3    = floor(($diff3 - $years3 * 365*60*60*24 - $months3*30*60*60*24)/ (60*60*24));

if (($years1 == 0) && ($months1 > 0) && ($days1 > 0)) $mixed1 = "<b>$months1 months</b> and <b>$days1</b> days"; 
if (($years1 == 0) && ($months1 == 0) && ($days1 > 0)) $mixed1 = "<b>$days1 days</b>"; 
if (($years1 == 0) && ($months1 > 0) && ($days1 == 0)) $mixed1 = "<b>$months1 months</b>";
if (($years1 > 1) && ($months1 == 0) && ($days1 == 0)) $mixed1 = "<b>$years1 years</b>";
if (($years1 > 1) && ($months1 > 0) && ($days1 == 0)) $mixed1 = "<b>$years1 years</b> and <b>$months1</b> months";
if (($years1 > 1) && ($months1 == 0) && ($days1 > 0)) $mixed1 = "<b>$years1 years</b> and <b>$days1</b> days";
if (($years1 > 1) && ($months1 > 0) && ($days1 > 0)) $mixed1 = "<b>$years1 years</b>, <b>$months1 months</b> and <b>$days1 days</b>";
if (($years1 == 1) && ($months1 == 0) && ($days1 == 0)) $mixed1 = "<b>$years1 year</b>";
if (($years1 == 1) && ($months1 > 0) && ($days1 == 0)) $mixed1 = "<b>$years1 an</b> and <b>$months1</b> months";
if (($years1 == 1) && ($months1 == 0) && ($days1 > 0)) $mixed1 = "<b>$years1 an</b> and <b>$days1</b> days";
if (($years1 == 1) && ($months1 > 0) && ($days1 > 0)) $mixed1 = "<b>$years1 an</b>, <b>$months1 months</b> and <b>$days1 days</b>";
if ($days1 == 1) $mixed1 = str_replace("jours", "jour", $mixed1);

if (($years2 == 0) && ($months2 > 0) && ($days2 > 0)) $mixed2 = "<b>$months2 months</b> and <b>$days2</b> days"; 
if (($years2 == 0) && ($months2 == 0) && ($days2 > 0)) $mixed2 = "<b>$days2 days</b>"; 
if (($years2 == 0) && ($months2 > 0) && ($days2 == 0)) $mixed2 = "<b>$months2 months</b>";
if (($years2 > 1) && ($months2 == 0) && ($days2 == 0)) $mixed2 = "<b>$years2 years</b>";
if (($years2 > 1) && ($months2 > 0) && ($days2 == 0)) $mixed2 = "<b>$years2 years</b> and <b>$months2</b> months";
if (($years2 > 1) && ($months2 == 0) && ($days2 > 0)) $mixed2 = "<b>$years2 years</b> and <b>$days2</b> days";
if (($years2 > 1) && ($months2 > 0) && ($days2 > 0)) $mixed2 = "<b>$years2 years</b>, <b>$months2 months</b> and <b>$days2 days</b>";
if (($years2 == 1) && ($months2 == 0) && ($days2 == 0)) $mixed2 = "<b>$years2 year</b>";
if (($years2 == 1) && ($months2 > 0) && ($days2 == 0)) $mixed2 = "<b>$years2 an</b> and <b>$months2</b> months";
if (($years2 == 1) && ($months2 == 0) && ($days2 > 0)) $mixed2 = "<b>$years2 an</b> and <b>$days2</b> days";
if (($years2 == 1) && ($months2 > 0) && ($days2 > 0)) $mixed2 = "<b>$years2 an</b>, <b>$months2 months</b> and <b>$days2 days</b>";
if ($days2 == 1) $mixed2 = str_replace("jours", "jour", $mixed2);

if (($years3 == 0) && ($months3 > 0) && ($days3 > 0)) $mixed3 = "<b>$months3 months</b> and <b>$days3</b> days"; 
if (($years3 == 0) && ($months3 == 0) && ($days3 > 0)) $mixed3 = "<b>$days3 days</b>"; 
if (($years3 == 0) && ($months3 > 0) && ($days3 == 0)) $mixed3 = "<b>$months3 months</b>";
if (($years3 > 1) && ($months3 == 0) && ($days3 == 0)) $mixed3 = "<b>$years3 years</b>";
if (($years3 > 1) && ($months3 > 0) && ($days3 == 0)) $mixed3 = "<b>$years3 years</b> and <b>$months3</b> months";
if (($years3 > 1) && ($months3 == 0) && ($days3 > 0)) $mixed3 = "<b>$years3 years</b> and <b>$days3</b> days";
if (($years3 > 1) && ($months3 > 0) && ($days3 > 0)) $mixed3 = "<b>$years3 years</b>, <b>$months3 months</b> and <b>$days3 days</b>";
if (($years3 == 1) && ($months3 == 0) && ($days3 == 0)) $mixed3 = "<b>$years3 year</b>";
if (($years3 == 1) && ($months3 > 0) && ($days3 == 0)) $mixed3 = "<b>$years3 an</b> and <b>$months3</b> months";
if (($years3 == 1) && ($months3 == 0) && ($days3 > 0)) $mixed3 = "<b>$years3 an</b> and <b>$days3</b> days";
if (($years3 == 1) && ($months3 > 0) && ($days3 > 0)) $mixed3 = "<b>$years3 an</b>, <b>$months3 months</b> and <b>$days3 days</b>";
if ($days3 == 1) $mixed3 = str_replace("jours", "jour", $mixed3);


$jours = ($years3*365)+($months3*30)+($days3); 
$prieres = $jours*5;

session_start();

$_SESSION['salat'] = $prieres;

$annonce = number_format($jours, 0, ',', ' ');
$annoncep = number_format($prieres, 0, ',', ' ');


if ($test <= 0) echo "<p>Masha Allah, you have no prayer to catch up with. Be sure to cultivate your salat thoroughly to pray with humility and meditation. Multiply supererogatory prayers to fill the gaps in your prayers. This is one of the best provisions. May Allah grant you success and success.</p>";


if ($test > 0)
echo "

<ul style=\"line-height:300%;\"><li>You started praying $mixed1 ago.</li>
	<li>You should have started since $mixed2 ($date_puberte).</li>
	<li>So you have to catch up $mixed3 prayers.</li>
	<li>This equates to a debt of <b>$annoncep</b> prayers.</li>
</ul>";

if ($genre == "femme") echo "
<p style=\"font-size:8pt; color:red;\">A margin of 10 days per month, corresponding to the indisposition period, is deducted.</p>



";

?>	

<p><b>Choose your catch-up pace:</b></p>

<form style="margin-left:30px;" id="rythme">
<select style="font-family:verdana; font-size:10pt;" name="cadence">
  <option value="1"><b>1</b> prayer by day</option>
  <option value="2"><b>2</b> prayers by day</option>
  <option value="3"><b>3</b> prayers by day</option>
  <option value="4"><b>4</b> prayers by day</option>
  <option value="5"><b>5</b> prayers by day</option>
  <option value="10"><b>10</b> prayers by day</option>
  <option value="15"><b>15</b> prayers by day</option>
  <option value="20"><b>20</b> prayers by day</option>
  <option value="25"><b>25</b> prayers by day</option>
  <option value="30"><b>30</b> prayers by day</option>
  <option value="35"><b>35</b> prayers by day</option>
  <option value="40"><b>40</b> prayers by day</option>
  <option value="45"><b>45</b> prayers by day</option>
  <option value="50"><b>50</b> prayers by day</option>
</select>

<div style="margin-left:-10px; margin-top:10px;"><input style="padding:10px; font-family:verdana; font-size:10pt;" class="button" type="submit" value="See the program"></div>
</form>


<script>
$(document).ready(function(){
	$("#rythme").submit(function(event){
	event.preventDefault();
		$.ajax({type:'POST', data: $(this).serialize(), url: "rythme.php", 
			success: function(data){
				$("#result").html(data);
			},
                        error: function(){
			        $("#result").html('<p>An error has occurred.</p>');
			}
		});
		return false;
	});
});
</script>

<div id="result"></div>