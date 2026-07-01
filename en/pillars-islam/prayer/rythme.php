<?php

session_start();

$prieres = $_SESSION['salat'];

session_write_close ();

$cadence = $_POST['cadence'];
$choix = "$cadence prayers";
if ($cadence == 1) $choix = "one prayer";

$convert = $prieres/$cadence;
$rattrapage = number_format($convert, 0, ',', ' ');

$years4 = ($convert / 365) ; // days / 365 days
$years4 = floor($years4); // Remove all decimals

$months4 = ($convert % 365) / 30.5; // I choose 30.5 for Month (30,31) ;)
$months4 = floor($months4); // Remove all decimals

$days4 = ($convert % 365) % 30.5; // the rest of days

if (($years4 == 0) && ($months4 > 0) && ($days4 > 0)) $mixed4 = "<b>$months4 months</b> and <b>$days4</b> days"; 
if (($years4 == 0) && ($months4 == 0) && ($days4 > 0)) $mixed4 = "<b>$days4 days</b>"; 
if (($years4 == 0) && ($months4 > 0) && ($days4 == 0)) $mixed4 = "<b>$months4 months</b>";

if (($years4 > 1) && ($months4 == 0) && ($days4 == 0)) $mixed4 = "<b>$years4 ans</b>";
if (($years4 > 1) && ($months4 > 0) && ($days4 == 0)) $mixed4 = "<b>$years4 ans</b> and <b>$months4</b> months";
if (($years4 > 1) && ($months4 == 0) && ($days4 > 0)) $mixed4 = "<b>$years4 ans</b> and <b>$days4</b> days";
if (($years4 > 1) && ($months4 > 0) && ($days4 > 0)) $mixed4 = "<b>$years4 ans</b>, <b>$months4 months</b> and <b>$days4 days</b>";

if (($years4 == 1) && ($months4 == 0) && ($days4 == 0)) $mixed4 = "<b>$years4 an</b>";
if (($years4 == 1) && ($months4 > 0) && ($days4 == 0)) $mixed4 = "<b>$years4 an</b> and <b>$months4</b> months";
if (($years4 == 1) && ($months4 == 0) && ($days4 > 0)) $mixed4 = "<b>$years4 an</b> and <b>$days4</b> days";
if (($years4 == 1) && ($months4 > 0) && ($days4 > 0)) $mixed4 = "<b>$years4 an</b>, <b>$months4 months</b> and <b>$days4 days</b>";

if ($days4 == 1) $mixed4 = str_replace("days", "day", $mixed4);

echo "

<p>You want to catch up <b>$choix</b> per day.</b></p>

<p>At this rate, you will catch up with all your missed prayers in <b>$rattrapage</b> days.</p>";

echo "<p>Your <b>$annoncep</b> missing prayers spread over $mixed4.</p>";

echo "<p>May Allah help us and accept our prayers.</p>";
?>