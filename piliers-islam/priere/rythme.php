<?php

session_start();

$prieres = $_SESSION['salat'];

session_write_close ();

$cadence = $_POST['cadence'];
$choix = "$cadence prières";
if ($cadence == 1) $choix = "une prière";

$convert = $prieres/$cadence;
$rattrapage = number_format($convert, 0, ',', ' ');

$years4 = ($convert / 365) ; // days / 365 days
$years4 = floor($years4); // Remove all decimals

$months4 = ($convert % 365) / 30.5; // I choose 30.5 for Month (30,31) ;)
$months4 = floor($months4); // Remove all decimals

$days4 = ($convert % 365) % 30.5; // the rest of days

if (($years4 == 0) && ($months4 > 0) && ($days4 > 0)) $mixed4 = "<b>$months4 mois</b> et <b>$days4</b> jours"; 
if (($years4 == 0) && ($months4 == 0) && ($days4 > 0)) $mixed4 = "<b>$days4 jours</b>"; 
if (($years4 == 0) && ($months4 > 0) && ($days4 == 0)) $mixed4 = "<b>$months4 mois</b>";

if (($years4 > 1) && ($months4 == 0) && ($days4 == 0)) $mixed4 = "<b>$years4 ans</b>";
if (($years4 > 1) && ($months4 > 0) && ($days4 == 0)) $mixed4 = "<b>$years4 ans</b> et <b>$months4</b> mois";
if (($years4 > 1) && ($months4 == 0) && ($days4 > 0)) $mixed4 = "<b>$years4 ans</b> et <b>$days4</b> jours";
if (($years4 > 1) && ($months4 > 0) && ($days4 > 0)) $mixed4 = "<b>$years4 ans</b>, <b>$months4 mois</b> et <b>$days4 jours</b>";

if (($years4 == 1) && ($months4 == 0) && ($days4 == 0)) $mixed4 = "<b>$years4 an</b>";
if (($years4 == 1) && ($months4 > 0) && ($days4 == 0)) $mixed4 = "<b>$years4 an</b> et <b>$months4</b> mois";
if (($years4 == 1) && ($months4 == 0) && ($days4 > 0)) $mixed4 = "<b>$years4 an</b> et <b>$days4</b> jours";
if (($years4 == 1) && ($months4 > 0) && ($days4 > 0)) $mixed4 = "<b>$years4 an</b>, <b>$months4 mois</b> et <b>$days4 jours</b>";

if ($days4 == 1) $mixed4 = str_replace("jours", "jour", $mixed4);

echo "

<p>Vous souhaitez rattraper <b>$choix</b> par jour.</b></p>

<p>A ce rythme, vous rattraperez toutes vos prières manquées en <b>$rattrapage</b> jours.</p>";

echo "<p>Vos <b>$annoncep</b> prières manquantes réparties sur $mixed4.</p>";

echo "<p>Qu'Allah nous assiste et accepte nos prières.</p>";
?>