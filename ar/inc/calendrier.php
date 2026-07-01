<?php
include "hijri.php";
$d = new uCal;
/* Hijri-Gregorian Calendar v.1.0.
by Tayeb Habib of www.redacacia.wordpress.com email tayeb.habib@gmail.com
a special thanks to Khaled Mamdouh of www.vbzoom.com for Hijri Conversion function.
Updated, and added Islamic names of months by Samir Greadly xushi@xushi.homelinux.org.
The code is "ehsalle-sawab" (benefit of the soul) of late Abdul Habib Mohamed, of
Pemba, Mozambique,late father of the author of this code.
*/
 
// obtain month, today date etc
$month = (isset($month)) ? $month : date("n",time());
$monthnames = array("Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");
$textmonth = $monthnames[$month - 1];
$year = (isset($year)) ? $year : date("Y",time());
$today = (isset($today))? $today : date("j", time());
$today = ($month == date("n",time())) ? $today : 32;
 
// The Names of Hijri months
$mname = array("Mouharram al Haram","Safar al Khayr","Rabi' al Awwal","Rabi' al Akhir","Joumada al Awwal","Joumada al Akhir","Rajab","Sha'bâne","Ramadân","Shawwal","Dhoul Qi'dah","Dhoul Hidjah");
// End of the names of Hijri months
 
// Setting how many days each month has
if ( (($month <8 ) && ($month % 2 == 1)) || (($month > 7) && ($month % 2 == 0)) ) $days = 31;
if ( (($month <8 ) && ($month % 2 == 0)) || (($month > 7) && ($month % 2 == 1)) ) $days = 30;
 
//checking leap year to adjust february days
if ($month == 2)
$days = (date("L",time())) ? 29 : 28;
 
$dayone = date("w",mktime(1,1,1,$month,1,$year));
$daylast = date("w",mktime(1,1,1,$month,$days,$year));
$middleday = intval(($days-1)/2);
 
//checking the hijri month on beginning of gregorian calendar
$date_hijri = date("$year-$month-1");
list ($HDays, $HMonths, $HYear) = Hijri($date_hijri);
$smon_hijridone = $mname[$HMonths-1];
$syear_hijridone = $HYear;
 
//checking the hijri month on end of gregorian calendar
$date_hijri = date("$year-$month-$days");
list ($HDays, $HMonths, $HYear) = Hijri($date_hijri);
$smon_hijridlast = $mname[$HMonths-1];
$syear_hijridlast = $HYear;
//checking the hijri month on middle of gregorian calendar
$date_hijri = date("$year-$month-$middleday");
list ($HDays, $HMonths, $HYear) = Hijri($date_hijri);
$smon_hijridmiddle = $mname[$HMonths-1];
$syear_hijridmiddle = $HYear;
 
// checking if there's a span of a year
if ($syear_hijridone == $syear_hijridlast) {
$syear_hijridone = "";
}
 
//checking if span of month is only one or two or three hijri months
if (($smon_hijridone == $smon_hijridmiddle) AND ($smon_hijridmiddle == $smon_hijridlast)) {
$smon_hijri = "<font color=red>".$smon_hijridone." ".$syear_hijridlast."</font>";
$mois_hijri = "<font color=black>".$smon_hijridone." ".$syear_hijridlast."</font>";
}
 
if (($smon_hijridone == $smon_hijridmiddle) AND ($smon_hijridmiddle != $smon_hijridlast)) {
$smon_hijri = "<font color=red>".$smon_hijridone." ".$syear_hijridone."- ".$smon_hijridlast." ".$syear_hijridlast."</font>";
$mois_hijri = "<font color=black>".$smon_hijridone." ".$syear_hijridone."et ".$smon_hijridlast." ".$syear_hijridlast."</font>";
}
if (($smon_hijridone != $smon_hijridmiddle) AND ($smon_hijridmiddle == $smon_hijridlast)) {
$smon_hijri = "<font color=red>".$smon_hijridone." ".$syear_hijridone."- ".$smon_hijridlast." ".$syear_hijridlast."</font>";
$mois_hijri = "<font color=black>".$smon_hijridone." ".$syear_hijridone."et ".$smon_hijridlast." ".$syear_hijridlast."</font>";
}
 
if (($smon_hijridone != $smon_hijridmiddle) AND ($smon_hijridmiddle != $smon_hijridlast)) {
$smon_hijri = "<font color=red>".$smon_hijridone." ".$syear_hijridone."- "."- ".$smon_hijridmiddle."- ".$smon_hijridlast." ".$syear_hijridlast."</font>";
$mois_hijri = "<font color=black>".$smon_hijridone." ".$syear_hijridone."- "."- ".$smon_hijridmiddle."- ".$smon_hijridlast." ".$syear_hijridlast."</font>";
}
// next part of code generates calendar
?>

<p>Voici le détail du calendrier musulman qui correspond au mois de <?php echo $textmonth." ".$year?>. Il contient en partie les mois de <?php echo $mois_hijri?>. Selon les pays, il peut y avoir un décalage d'un jour de plus ou de moins, selon les observations de la lune. N'oubliez pas qu'il est conseillé de jeûner les jours blancs. Ce sont les <span style="color:red;">13</span>, <span style="color:red;">14</span> et <span style="color:red;">15</span> de chaque mois.</p>
 

<p style="width:462px; text-align:center; margin-left:auto; margin-right:auto; margin-bottom:-4px; border:1px solid; border-radius:55px 55px 0px 0px;"><b><?php echo $textmonth." ".$year."<br />".$smon_hijri?></b></p>


<table style="width:500px; margin-left:auto; margin-right:auto;">
<tr>
<td valign="top" align="center">
<table border="1" cellpadding="0" cellspacing="0" width="100%" bgcolor='white' valign='top'>
<tr>
<td valign="middle" align="center" width="15%"><b> Dim </b></font></td>
<td valign="middle" align="center" width="14%"><b> Lun </b></font></td>
<td valign="middle" align="center" width="14%"><b> Mar </b></font></td>
<td valign="middle" align="center" width="14%"><b> Mer </b></font></td>
<td valign="middle" align="center" width="14%"><b> Jeu </b></font></td>
<td valign="middle" align="center" width="14%"><b> Ven </b></font></td>
<td valign="middle" align="center" width="15%"><b> Sam </b></font></td>
</tr>
<?
 
if($dayone != 0) $span1 = $dayone;
if(6 - $daylast != 0) $span2 = 6 - $daylast;
 
for($i = 1; $i <= $days; $i++): $dayofweek = date("w",mktime(1,1,1,$month,$i,$year)); $width = "14%";
 
if($dayofweek == 0 || $dayofweek == 6) $width = "15%";

if($i == $today){
$bgcellcolor = "lightblue";
$evidence = "bold";
}

if($i != $today){
$bgcellcolor = "white";
$evidence = "normal";
}

$x = strlen($i);
if ($x == 1){ $b = "0".$i;}
if ($x == 2){ $b = $i;}
 
$x = strlen($month);
if ($x == 1){ $c = "0".$month;}
if ($x == 2){ $c = $month;}
$data=$year."-".$c."-".$b;
 
if($i == 1 || $dayofweek == 0):
echo " <tr bgcolor=\"$defaultbgcolor\">\n";
if($span1 > 0 && $i == 1)
echo " <td align=\"left\" bgcolor=\"lightgrey\" colspan=\"$span1\"><font face=\"null\" size=\"1\"> </font></td>\n";
endif;

?>

<td style="font-weight:<?=$evidence ?>;" bgcolor="<?=$bgcellcolor ?>" valign="middle" align="center" width="<?=$width ?>">

<? 

$date_hijri = date("$year-$month-$i");
list ($HDays, $HMonths, $HYear) = Hijri($date_hijri);
if ($HDays == 30) { 
$i = $i + 1;
$date_hijri = date("$year-$month-$i");
list ($HDays, $HMonths, $HYear) = Hijri($date_hijri);
if ($HDays == 2) {
$HDays = 1; 
}
else {
$HDays = 30;
}
$i = $i - 1;
}

$sday_hijri = $i."<br/><font color=red>".$HDays."</font>";


// display da data
echo $sday_hijri;

?>
</td>

<?PHP
if($i == $days):
if($span2 > 0)
echo " <td align=\"left\" bgcolor=\"lightgrey\" colspan=\"$span2\"><font face=\"null\" size=\"1\"> </font></td>\n";
endif;
if($dayofweek == 6 || $i == $days):
echo " </tr>\n";
endif;
endfor;
$ano = str_replace("20", "", $year);
 
$x = strlen($today);
if ($x == 1){ $b = "0".$today;}
if ($x == 2){ $b = $today;}

//echo $b;
$x = strlen($month);
if ($x == 1){ $c = "0".$month;}
if ($x == 2){ $c = $month;}

//echo $c; 
$data=$year.$c.$b;
?>
<?php
// Hijri conversion function
// Copyright 2002 by Khaled Mamdouh www.vbzoom.com. Updated, and added
// Islamic names of months by Samir Greadly xushi @xushi.homelinux.org
 
function Hijri($GetDate)
{
 
$TDays=round(strtotime($GetDate)/(60*60*24));
$HYear=round($TDays/354.37419);
$Remain=$TDays-($HYear*354.37419);
$HMonths=round($Remain/29.531182);
$HDays=$Remain-($HMonths*29.531182);
$HYear=$HYear+1389;
$HMonths=$HMonths+10;
$HDays=$HDays+23; // ajustement Ramadan se fait ici
 
// If the days is over 29, then update month and reset days
if ($HDays>29.531188 and round($HDays)!=30)
{
$HMonths=$HMonths+1;
$HDays=Round($HDays-29.531182);
}
 
else
{
$HDays=Round($HDays);
}
 
// If months is over 12, then add a year, and reset months
if($HMonths>12)
{
$HMonths=$HMonths-12;
$HYear=$HYear+1;
}
 
return array ($HDays, $HMonths, $HYear);
}
// end of Hijri Conversion function
?>
</table>
</td>
</tr>
 
</td></tr>
 
</table>

<p><b><u>Dates importantes</u></b></p>

<div style="margin-left:20px;">
<?  
		  $date = $d->u2g(1,9,1437);
		  if ($date[month] == 1) $date[month] = "Janvier";
		  if ($date[month] == 2) $date[month] = "Février";
		  if ($date[month] == 3) $date[month] = "Mars";
		  if ($date[month] == 4) $date[month] = "Avril";
		  if ($date[month] == 5) $date[month] = "Mai";
		  if ($date[month] == 6) $date[month] = "Juin";
		  if ($date[month] == 7) $date[month] = "Juillet";
		  if ($date[month] == 8) $date[month] = "Août";
		  if ($date[month] == 9) $date[month] = "Septembre";
		  if ($date[month] == 10) $date[month] = "Octobre";
		  if ($date[month] == 11) $date[month] = "Novembre";
		  if ($date[month] == 12) $date[month] = "Décembre";
		  echo "
		  <p><b>Ramadan 1437 (2016)</b></p>
		  <ul><li>Début du mois : $date[day] $date[month] $date[year]</li>";
		  $date = $d->u2g(1,10,1437);
		  if ($date[month] == 1) $date[month] = "Janvier";
		  if ($date[month] == 2) $date[month] = "Février";
		  if ($date[month] == 3) $date[month] = "Mars";
		  if ($date[month] == 4) $date[month] = "Avril";
		  if ($date[month] == 5) $date[month] = "Mai";
		  if ($date[month] == 6) $date[month] = "Juin";
		  if ($date[month] == 7) $date[month] = "Juillet";
		  if ($date[month] == 8) $date[month] = "Août";
		  if ($date[month] == 9) $date[month] = "Septembre";
		  if ($date[month] == 10) $date[month] = "Octobre";
		  if ($date[month] == 11) $date[month] = "Novembre";
		  if ($date[month] == 12) $date[month] = "Décembre";
		  echo "<li>Aïd al Fitr : $date[day] $date[month] $date[year]</li></ul>";
?>

<?  
		  $date = $d->u2g(1,12,1437);
		  if ($date[month] == 1) $date[month] = "Janvier";
		  if ($date[month] == 2) $date[month] = "Février";
		  if ($date[month] == 3) $date[month] = "Mars";
		  if ($date[month] == 4) $date[month] = "Avril";
		  if ($date[month] == 5) $date[month] = "Mai";
		  if ($date[month] == 6) $date[month] = "Juin";
		  if ($date[month] == 7) $date[month] = "Juillet";
		  if ($date[month] == 8) $date[month] = "Août";
		  if ($date[month] == 9) $date[month] = "Septembre";
		  if ($date[month] == 10) $date[month] = "Octobre";
		  if ($date[month] == 11) $date[month] = "Novembre";
		  if ($date[month] == 12) $date[month] = "Décembre";
		  echo "
		  <p><b>Hadj 1437 (2016)</b></p>
		  <ul><li>Début du mois : $date[day] $date[month] $date[year]</li>";
		  
		  $date = $d->u2g(9,12,1437);
		  if ($date[month] == 1) $date[month] = "Janvier";
		  if ($date[month] == 2) $date[month] = "Février";
		  if ($date[month] == 3) $date[month] = "Mars";
		  if ($date[month] == 4) $date[month] = "Avril";
		  if ($date[month] == 5) $date[month] = "Mai";
		  if ($date[month] == 6) $date[month] = "Juin";
		  if ($date[month] == 7) $date[month] = "Juillet";
		  if ($date[month] == 8) $date[month] = "Août";
		  if ($date[month] == 9) $date[month] = "Septembre";
		  if ($date[month] == 10) $date[month] = "Octobre";
		  if ($date[month] == 11) $date[month] = "Novembre";
		  if ($date[month] == 12) $date[month] = "Décembre";
		  echo "<li>Jeûne de Arafat : $date[day] $date[month] $date[year]</li>";
		  
		  $date = $d->u2g(10,12,1437);
		  if ($date[month] == 1) $date[month] = "Janvier";
		  if ($date[month] == 2) $date[month] = "Février";
		  if ($date[month] == 3) $date[month] = "Mars";
		  if ($date[month] == 4) $date[month] = "Avril";
		  if ($date[month] == 5) $date[month] = "Mai";
		  if ($date[month] == 6) $date[month] = "Juin";
		  if ($date[month] == 7) $date[month] = "Juillet";
		  if ($date[month] == 8) $date[month] = "Août";
		  if ($date[month] == 9) $date[month] = "Septembre";
		  if ($date[month] == 10) $date[month] = "Octobre";
		  if ($date[month] == 11) $date[month] = "Novembre";
		  if ($date[month] == 12) $date[month] = "Décembre";
		  echo "<li>Aid al Adha : $date[day] $date[month] $date[year]</li></ul>";
?>
</div>		  

<p><b><u>A savoir</u></b></p>
<p>Voici la liste des 12 mois lunaires :</p>

<div style="margin-left:20px;">
<ol>
<li><b>Mouharram al Harâm *</b></li>
<li>Safar al Khayr</li>
<li>Rabi' al Awwal</li>
<li>Rabi' al Akhîr</li>
<li>Joumada al Awwal</li>
<li>Joumada al Akhir</li>
<li><b>Rajab *</b></li>
<li>Sha'bâne</li>
<li>Ramadân</li>
<li>Shawwâl</li>
<li><b>Dhoul Qi'dah *</b></li>
<li><b>Dhoul Hidjah *</b></li>
</ol>

<p style="margin-left:20px;">* 4 mois sacrés</p>
</div>