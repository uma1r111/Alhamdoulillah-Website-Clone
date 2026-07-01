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

if (($years1 == 0) && ($months1 > 0) && ($days1 > 0)) $mixed1 = "<b>$months1 mois</b> et <b>$days1</b> jours"; 
if (($years1 == 0) && ($months1 == 0) && ($days1 > 0)) $mixed1 = "<b>$days1 jours</b>"; 
if (($years1 == 0) && ($months1 > 0) && ($days1 == 0)) $mixed1 = "<b>$months1 mois</b>";
if (($years1 > 1) && ($months1 == 0) && ($days1 == 0)) $mixed1 = "<b>$years1 ans</b>";
if (($years1 > 1) && ($months1 > 0) && ($days1 == 0)) $mixed1 = "<b>$years1 ans</b> et <b>$months1</b> mois";
if (($years1 > 1) && ($months1 == 0) && ($days1 > 0)) $mixed1 = "<b>$years1 ans</b> et <b>$days1</b> jours";
if (($years1 > 1) && ($months1 > 0) && ($days1 > 0)) $mixed1 = "<b>$years1 ans</b>, <b>$months1 mois</b> et <b>$days1 jours</b>";
if (($years1 == 1) && ($months1 == 0) && ($days1 == 0)) $mixed1 = "<b>$years1 an</b>";
if (($years1 == 1) && ($months1 > 0) && ($days1 == 0)) $mixed1 = "<b>$years1 an</b> et <b>$months1</b> mois";
if (($years1 == 1) && ($months1 == 0) && ($days1 > 0)) $mixed1 = "<b>$years1 an</b> et <b>$days1</b> jours";
if (($years1 == 1) && ($months1 > 0) && ($days1 > 0)) $mixed1 = "<b>$years1 an</b>, <b>$months1 mois</b> et <b>$days1 jours</b>";
if ($days1 == 1) $mixed1 = str_replace("jours", "jour", $mixed1);

if (($years2 == 0) && ($months2 > 0) && ($days2 > 0)) $mixed2 = "<b>$months2 mois</b> et <b>$days2</b> jours"; 
if (($years2 == 0) && ($months2 == 0) && ($days2 > 0)) $mixed2 = "<b>$days2 jours</b>"; 
if (($years2 == 0) && ($months2 > 0) && ($days2 == 0)) $mixed2 = "<b>$months2 mois</b>";
if (($years2 > 1) && ($months2 == 0) && ($days2 == 0)) $mixed2 = "<b>$years2 ans</b>";
if (($years2 > 1) && ($months2 > 0) && ($days2 == 0)) $mixed2 = "<b>$years2 ans</b> et <b>$months2</b> mois";
if (($years2 > 1) && ($months2 == 0) && ($days2 > 0)) $mixed2 = "<b>$years2 ans</b> et <b>$days2</b> jours";
if (($years2 > 1) && ($months2 > 0) && ($days2 > 0)) $mixed2 = "<b>$years2 ans</b>, <b>$months2 mois</b> et <b>$days2 jours</b>";
if (($years2 == 1) && ($months2 == 0) && ($days2 == 0)) $mixed2 = "<b>$years2 an</b>";
if (($years2 == 1) && ($months2 > 0) && ($days2 == 0)) $mixed2 = "<b>$years2 an</b> et <b>$months2</b> mois";
if (($years2 == 1) && ($months2 == 0) && ($days2 > 0)) $mixed2 = "<b>$years2 an</b> et <b>$days2</b> jours";
if (($years2 == 1) && ($months2 > 0) && ($days2 > 0)) $mixed2 = "<b>$years2 an</b>, <b>$months2 mois</b> et <b>$days2 jours</b>";
if ($days2 == 1) $mixed2 = str_replace("jours", "jour", $mixed2);

if (($years3 == 0) && ($months3 > 0) && ($days3 > 0)) $mixed3 = "<b>$months3 mois</b> et <b>$days3</b> jours"; 
if (($years3 == 0) && ($months3 == 0) && ($days3 > 0)) $mixed3 = "<b>$days3 jours</b>"; 
if (($years3 == 0) && ($months3 > 0) && ($days3 == 0)) $mixed3 = "<b>$months3 mois</b>";
if (($years3 > 1) && ($months3 == 0) && ($days3 == 0)) $mixed3 = "<b>$years3 ans</b>";
if (($years3 > 1) && ($months3 > 0) && ($days3 == 0)) $mixed3 = "<b>$years3 ans</b> et <b>$months3</b> mois";
if (($years3 > 1) && ($months3 == 0) && ($days3 > 0)) $mixed3 = "<b>$years3 ans</b> et <b>$days3</b> jours";
if (($years3 > 1) && ($months3 > 0) && ($days3 > 0)) $mixed3 = "<b>$years3 ans</b>, <b>$months3 mois</b> et <b>$days3 jours</b>";
if (($years3 == 1) && ($months3 == 0) && ($days3 == 0)) $mixed3 = "<b>$years3 an</b>";
if (($years3 == 1) && ($months3 > 0) && ($days3 == 0)) $mixed3 = "<b>$years3 an</b> et <b>$months3</b> mois";
if (($years3 == 1) && ($months3 == 0) && ($days3 > 0)) $mixed3 = "<b>$years3 an</b> et <b>$days3</b> jours";
if (($years3 == 1) && ($months3 > 0) && ($days3 > 0)) $mixed3 = "<b>$years3 an</b>, <b>$months3 mois</b> et <b>$days3 jours</b>";
if ($days3 == 1) $mixed3 = str_replace("jours", "jour", $mixed3);


$jours = ($years3*365)+($months3*30)+($days3); 
$prieres = $jours*5;

session_start();

$_SESSION['salat'] = $prieres;

$annonce = number_format($jours, 0, ',', ' ');
$annoncep = number_format($prieres, 0, ',', ' ');


if ($test <= 0) echo "<p>Masha Allah, vous n'avez aucune prière à rattraper. Veillez à cultiver votre salat en profondeur afin de prier avec humilité et recueillement. Multipliez les prières surérogatoires afin de combler les manquements dans vos prières. C'est l'une des meilleures provisions. Qu'Allah vous accorde le succès et la réussite.</p>";


if ($test > 0)
echo "

<ul style=\"line-height:300%;\"><li>Vous avez commencé à prier il y a $mixed1.</li>
	<li>Vous auriez du commencer depuis $mixed2 ($date_puberte).</li>
	<li>Il vous reste donc à rattraper $mixed3 de prières.</li>
	<li>Cela équivaut à une dette de <b>$annoncep</b> prières.</li>
</ul>";

if ($genre == "femme") echo "
<p style=\"font-size:8pt; color:red;\">Une marge de 10 jours par mois, correspondant à la période d'indisposition, est déduite.</p>



";

?>	

<p><b>Choissisez votre rythme de rattrapage :</b></p>

<form style="margin-left:30px;" id="rythme">
<select style="font-family:verdana; font-size:10pt;" name="cadence">
  <option value="1"><b>1</b> prière par jour</option>
  <option value="2"><b>2</b> prières par jour</option>
  <option value="3"><b>3</b> prières par jour</option>
  <option value="4"><b>4</b> prières par jour</option>
  <option value="5"><b>5</b> prières par jour</option>
  <option value="10"><b>10</b> prières par jour</option>
  <option value="15"><b>15</b> prières par jour</option>
  <option value="20"><b>20</b> prières par jour</option>
  <option value="25"><b>25</b> prières par jour</option>
  <option value="30"><b>30</b> prières par jour</option>
  <option value="35"><b>35</b> prières par jour</option>
  <option value="40"><b>40</b> prières par jour</option>
  <option value="45"><b>45</b> prières par jour</option>
  <option value="50"><b>50</b> prières par jour</option>
</select>

<div style="margin-left:-10px; margin-top:10px;"><input style="padding:10px; font-family:verdana; font-size:10pt;" class="button" type="submit" value="Voir le programme"></div>
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
			        $("#result").html('<p>Une erreur est survenue.</p>');
			}
		});
		return false;
	});
});
</script>

<div id="result"></div>