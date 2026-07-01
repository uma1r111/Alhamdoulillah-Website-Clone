<?php

$VilleLat = 21.42664;
$VilleLong = 39.82563;

		$count=0;

		for ($i=1; $i<=2400; $i++) 
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

<h1>Horaire Priere</h1>

<?php include("../inc/pub-content.php");?>

<p style="padding-top:20px;">Horaire Prière > <strong>Index</strong></p>

<p width="100%">Voici les heures de prières pour <?echo number_format($count, 0, ',', ' ')?> villes du monde. Les horaires de prière sont classés par continent. Cliquez sur votre pays et choisissez votre ville. Ensuite, vous pouvez éventuellement ajuster les réglages si nécessaire, comme changer l'angle de calcul de al fajr par exemple ou tout simplement le format des heures (12/24).</p>

<center><div style="width:100%; display:block; height:5px; background-color:slategray; margin:0px;"></div></center>

<img style="float:right; margin-right:25px; margin-top:9px; height:33px; width:45px;" src="/en/prayer-times/flags/saudi-arabia.GIF">

<h2>Calendrier des Heures de Prière</h2>

<p>A voir aussi : <a href="ramadan/">le calendrier du mois de Ramadan</a></p>

 <?php
 
 $arr = array("europe", "asie", "afrique", "amerique-du-nord", "amerique-du-sud", "oceanie", "caraibes");
	
	foreach ($arr as $variable){

	$link = ucfirst(str_replace("-", " ", strtolower($variable)));
	
	echo " 
	
	<div style=\"width:100%; background-color:lightgray;\"><h3><u><a href=\"monde/$variable\">Heure Prière $link</a></u></h3></div>
	
	<table style=\"padding:0px; margin:0px;\"><tr><td style=\"padding:0px; margin:0px;\"><ul style=\"padding-top:0px; margin-top:0px;\">
	
	";
	
	$link = str_replace(" ", "-", strtolower($variable));
 
if ($dir = opendir("monde/$variable")) {
  while (false !== ($file = readdir($dir))) { 
  if ($file !== 'index.html' && $file !== '.' && $file !== '..') {
	  $filedo = str_replace("-", " ", $file);
	  $fileda = str_replace("democratique", "D.", $filedo);
	  $filed = str_replace("terres australes et antarctiques", "Terres AA", $fileda);

$exclude = array('et', 'du');
$words = explode(' ', $filed);
foreach($words as $key => $word) {
    if(in_array($word, $exclude)) {
        continue;
    }
    $words[$key] = ucfirst($word);
}
$list = implode(' ', $words);	 
	  
	  echo "<li style=\"line-height:250%; margin-left:-15px; list-style-type:none; width: 270px; float: left;\"><img style=\"padding:10px; height:33px; width:45px; vertical-align:middle\"; src=\"/horaires-prieres/flags/$file.GIF\"><a href=\"monde/$variable/$file\">$list</a></li>"; 
	  
	}
	
	
  }
  closedir($dir);
}


echo "</ul></td></tr></table>";
 
	}
?>
<br>

<center><div style="width:100%; display:block; height:5px; background-color:slategray; margin:0px;"></div></center>

<h3>Comment sont calculés les horaires de prières ?</h3>

<p>Il existe 2 mesures astronomiques essentielles pour calculer les temps de prière. Ces 2 mesures sont l'équation du temps et la déclinaison du soleil.</p>

<p>L'équation du temps est la différence entre le temps lu à partir d'un cadran solaire et d'une horloge. Il résulte d'un mouvement irrégulier apparent du soleil, causé par une combinaison de l'obliquité de l'axe de rotation de la Terre et de l'excentricité de son orbite. Le cadran solaire peut être en avance jusqu'à 16 minutes (vers le 3 novembre) ou en retard de 14 minutes (vers le 12 février).</p>

<p>La déclinaison du soleil est l'angle entre les rayons du soleil et le plan de l'équateur terrestre. La déclinaison du soleil change continuellement tout au long de l'année. Ceci est une conséquence de l'inclinaison de la Terre, c'est-à-dire la différence dans ses axes rotatifs et révolutionnaires.</p>

<p>L'algorithme de l'US Naval Observatory calcule les coordonnées angulaires du soleil.</p>

<h4 style="margin-left:15px">Calculer l'heure d'une prière</h4>

<p>Pour calculer les temps de prière pour un emplacement donné, il suffit de connaitre la latitude, la longitude, ainsi que le fuseau horaire local de l'endroit. On obtient l'équation du temps (EqT) et la déclinaison du soleil (D) pour une date donnée en utilisant l'algorithme.</p>

<p>La formule ci-desous calcule le temps de midi, lorsque le soleil atteint son point le plus haut dans le ciel. Une légère marge est habituellement ajoutée pour Dhouhr.</p>

<ul><li>Dhouhr = 12 + TimeZone - Lng / 15 - EqT.</li></ul>

<h4 style="margin-left:15px">Lever du soleil</h4>

<p>La différence de temps entre le milieu du jour et le moment auquel le soleil atteint un angle α en dessous de l'horizon. Le lever et le coucher du soleil astronomiques se produisent à α = 0. Cependant, en raison de la réfraction de la lumière par atmosphère terrestre, le lever du soleil réel apparaît légèrement avant le lever du soleil astronomique et le coucher du soleil réel se produit après le coucher du soleil astronomique.</p>

<h4 style="margin-left:15px">Fajr et Isha</h4>

<p>Il existe des opinions différentes sur l'angle à utiliser pour calculer les horaires des prières de Fajr et Isha. Le tableau suivant présente plusieurs conventions actuellement utilisées dans différents pays. L'angle de Fajr varie de 12 à 19,5 degrés tandis que pour l'heure de la prière al Isha, cela va de 12 à 18 degrés.</p>

<h4 style="margin-left:15px">Asr</h4>

<p>Il existe 2 avis sur la façon de calculer l'heure de la prière de al 'Asr. La majorité des écoles (y compris Shafi'i, Maliki et Hanbali) disent que c'est au moment où la longueur de l'ombre d'un objet est égale à la longueur de l'objet lui-même plus la longueur de l'ombre de cet objet à midi. L'opinion dominante dans l'école Hanafi dit que Asr commence lorsque la longueur de l'ombre d'un objet est 2 fois la longueur de l'objet plus la longueur de l'ombre de cet objet à midi.</p>

<h4 style="margin-left:15px">Maghrib</h4>

<p>Le temps de la prière du maghrib commence une fois que le soleil s'est complètement placé sous l'horizon. Il n'est pas permis juste avant ce temps sans raison valable.</p>

<h4 style="margin-left:15px">Les prières en haute latitude</h4>

<p>Dans les endroits à latitude supérieure, le crépuscule peut persister toute la nuit pendant certains mois de l'année. Dans ces périodes anormales, la détermination de Fajr et Isha n'est pas possible en utilisant les formules mathétmatiques. C'est le cas notamment pour les régions du nord de la France et de la Belgique en été, où l'angle 18° ne permet pas de calculer Fajr et Isha. Pour résoudre ce problème, plusieurs solutions ont été proposées, dont 3 sont décrites ci-dessous :</p>

<p>1) Au milieu de la nuit. Dans cette méthode, la période allant du coucher de soleil au lever du soleil est divisée en 2 moitiés. La première moitié est considérée comme la « nuit » et l'autre moitié comme « pause de jour ». Dans cette méthode, awkat salat Fajr et Isha sont supposés être à la mi-nuit pendant les périodes anormales.</p>

<p>2) Un septième de la nuit. Dans cette méthode, la période entre le coucher de soleil et le lever du soleil est divisée en sept parties. Isha commence après la première septième partie, et Fajr est au début de la septième partie.</p>

<p>3) Méthode à base d'angle. Il s'agit d'une solution intermédiaire, utilisée par des calculatrices de temps de prière récentes. Soit α l'angle crépusculaire pour Isha, et laissez t = α / 60. La période entre le coucher de soleil et le lever du soleil est divisée en parties t. Isha commence après la première partie. Par exemple, si l'angle de crépuscule pour Isha est de 15, Isha commence à la fin du premier quart (15/60) de la nuit. Le temps pour Fajr est calculé de manière similaire.</p>

<center><div style="width:100%; display:block; height:5px; background-color:slategray; margin:0px;"></div></center>

<p>Si vous ne trouvez pas les heures de prières pour votre pays ou ville, rendez-vous sur notre page en anglais (<a href="/en/prayer-times/">prayer times</a>) dédiée aux heures de prières. Vous y trouverez les horaires de salat pour plus de 23 000 villes.</p>