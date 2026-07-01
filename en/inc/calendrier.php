<?php
include "hijri.php";
$d = new uCall;
/* Hijri-Gregorian Calendar v.1.0.
by Tayeb Habib of www.redacacia.wordpress.com eMayl tayeb.habib@gMayl.com
a special thanks to Khaled Mamduh of www.vbzoom.com for Hijri Conversion function.
Updated, and added Islamic names of months by Samir Greadly xushi@xushi.homelinux.org.
The code is "ehsalle-sawab" (benefit of the sul) of late Abdul Habib Mohamed, of
Pemba, Mozambique,late father of the author of this code.
*/
 
// obtain month, today date etc
$month = (isset($month)) ? $month : date("n",time());
$monthnames = array("January","February","March","April","May","June","July","August","September","October","November","December");
$textmonth = $monthnames[$month - 1];
$year = (isset($year)) ? $year : date("Y",time());
$today = (isset($today))? $today : date("j", time());
$today = ($month == date("n",time())) ? $today : 32;
 
// The Names of Hijri months
$mname = array("Muharram al Haram","Safar al Khayr","Rabi' al Awwal","Rabi' al Akhir","Jumada al Awwal","Jumada al Akhir","Rajab","Sha'bâne","Ramadân","Shawwal","Dhul Qi'dah","Dhul Hidjah");
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
$smon_hijri = "<font color=red>".$smon_hijridone." ".$syear_hijridone." - ".$smon_hijridlast." ".$syear_hijridlast."</font>";
$mois_hijri = "<font color=black>".$smon_hijridone." ".$syear_hijridone." et ".$smon_hijridlast." ".$syear_hijridlast."</font>";
}
if (($smon_hijridone != $smon_hijridmiddle) AND ($smon_hijridmiddle == $smon_hijridlast)) {
$smon_hijri = "<font color=red>".$smon_hijridone." ".$syear_hijridone." - ".$smon_hijridlast." ".$syear_hijridlast."</font>";
$mois_hijri = "<font color=black>".$smon_hijridone." ".$syear_hijridone." et ".$smon_hijridlast." ".$syear_hijridlast."</font>";
}
 
if (($smon_hijridone != $smon_hijridmiddle) AND ($smon_hijridmiddle != $smon_hijridlast)) {
$smon_hijri = "<font color=red>".$smon_hijridone." ".$syear_hijridone." - "." - ".$smon_hijridmiddle." - ".$smon_hijridlast." ".$syear_hijridlast."</font>";
$mois_hijri = "<font color=black>".$smon_hijridone." ".$syear_hijridone." - "." - ".$smon_hijridmiddle." - ".$smon_hijridlast." ".$syear_hijridlast."</font>";
}
// next part of code generates calendar
?>

<p>Here is the detail of the Muslim calendar that corresponds to the month of <?php echo $textmonth." ".$year?>. It contains in part the months of <?php echo $mois_hijri?>. Depending on the country, there may be a shift of one day more or less, according to observations of the moon. Do not forget that it is advisable to fast on white days. Those are the <span style="color:red;">13</span>, <span style="color:red;">14</span> et <span style="color:red;">15</span> of each month. See also, <a href="/en/prayer-times/ramadan/">the calendar of Ramadan</a>. Outside the months of Ramadan and Dhul Hijah, the calendar below is based on the astronomical calculation at the Earth scale. The reason is that for these 2 particular months, the majority of the religious authorities use the ocular vision which requires a manual adjustment of the calendar.</p>

<?php include ("share.php")?>
 

<p style="width:90%; text-align:center;"><b><?php echo $textmonth." ".$year."<br />".$smon_hijri?></b></p>


<table style="width:90%; margin-left:auto; margin-right:auto;">
<tr>
<td valign="top" align="center">
<table border="1" cellpadding="0" cellspacing="0" width="100%" bgcolor='white' valign='top'>
<tr>
<td valign="middle" align="center" width="15%"><b> Sun </b></font></td>
<td valign="middle" align="center" width="14%"><b> Mon </b></font></td>
<td valign="middle" align="center" width="14%"><b> Tue </b></font></td>
<td valign="middle" align="center" width="14%"><b> Wed </b></font></td>
<td valign="middle" align="center" width="14%"><b> Thu </b></font></td>
<td valign="middle" align="center" width="14%"><b> Fri </b></font></td>
<td valign="middle" align="center" width="15%"><b> Sat </b></font></td>
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
// Copyright 2002 by Khaled Mamduh www.vbzoom.com. Updated, and added
// Islamic names of months by Samir Greadly xushi @xushi.homelinux.org
 
function Hijri($GetDate)
{
 
$TDays=round(strtotime($GetDate)/(60*60*24));
$HYear=round($TDays/354.37419);
$ReMayn=$TDays-($HYear*354.37419);
$HMonths=round($ReMayn/29.531182);
$HDays=$ReMayn-($HMonths*29.531182);
$HYear=$HYear+1389;
$HMonths=$HMonths+10;
$HDays=$HDays+23; // ajustement Ramadan se fait ici
 
// If the days is over 29, then update month and reset days
if ($HDays>29.531188 and round($HDays)!=30)
{
$HMonths=$HMonths+1;
$HDays=round($HDays-29.531182); // ramadan
}
 
else
{
$HDays=round($HDays);
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

<p><b><u>Important dates</u></b></p>

<div style="margin-left:20px;">
<?  

		  $date = $d->u2g(1,1,1442);
		  if ($date[month] == 1) $date[month] = "January";
		  if ($date[month] == 2) $date[month] = "February";
		  if ($date[month] == 3) $date[month] = "March";
		  if ($date[month] == 4) $date[month] = "April";
		  if ($date[month] == 5) $date[month] = "May";
		  if ($date[month] == 6) $date[month] = "June";
		  if ($date[month] == 7) $date[month] = "July";
		  if ($date[month] == 8) $date[month] = "August";
		  if ($date[month] == 9) $date[month] = "September";
		  if ($date[month] == 10) $date[month] = "October";
		  if ($date[month] == 11) $date[month] = "November";
		  if ($date[month] == 12) $date[month] = "December";
		  echo "
		  <p><b>Muharram 1442 (2020)</b></p>
		  <ul><li>Beginning of the month : $date[day] $date[month] $date[year]</li>";
		  $date = $d->u2g(10,1,1442);
		  if ($date[month] == 1) $date[month] = "January";
		  if ($date[month] == 2) $date[month] = "February";
		  if ($date[month] == 3) $date[month] = "March";
		  if ($date[month] == 4) $date[month] = "April";
		  if ($date[month] == 5) $date[month] = "May";
		  if ($date[month] == 6) $date[month] = "June";
		  if ($date[month] == 7) $date[month] = "July";
		  if ($date[month] == 8) $date[month] = "August";
		  if ($date[month] == 9) $date[month] = "September";
		  if ($date[month] == 10) $date[month] = "October";
		  if ($date[month] == 11) $date[month] = "November";
		  if ($date[month] == 12) $date[month] = "December";
		  echo "<li>Achoura fast : $date[day] $date[month] $date[year]</li></ul>";
		  $date = $d->u2g(1,9,1442);
		  if ($date[month] == 1) $date[month] = "January";
		  if ($date[month] == 2) $date[month] = "February";
		  if ($date[month] == 3) $date[month] = "March";
		  if ($date[month] == 4) $date[month] = "April";
		  if ($date[month] == 5) $date[month] = "May";
		  if ($date[month] == 6) $date[month] = "June";
		  if ($date[month] == 7) $date[month] = "July";
		  if ($date[month] == 8) $date[month] = "August";
		  if ($date[month] == 9) $date[month] = "September";
		  if ($date[month] == 10) $date[month] = "Octoberr";
		  if ($date[month] == 11) $date[month] = "Novemberr";
		  if ($date[month] == 12) $date[month] = "December";
		  echo "
		  <p><b>Ramadan 1442 (2021)</b></p>
		  <ul><li>Beginning of the month : $date[day] $date[month] $date[year]</li>";
		  $date = $d->u2g(1,10,1442);
		  if ($date[month] == 1) $date[month] = "January";
		  if ($date[month] == 2) $date[month] = "February";
		  if ($date[month] == 3) $date[month] = "March";
		  if ($date[month] == 4) $date[month] = "April";
		  if ($date[month] == 5) $date[month] = "May";
		  if ($date[month] == 6) $date[month] = "June";
		  if ($date[month] == 7) $date[month] = "July";
		  if ($date[month] == 8) $date[month] = "August";
		  if ($date[month] == 9) $date[month] = "September";
		  if ($date[month] == 10) $date[month] = "October";
		  if ($date[month] == 11) $date[month] = "November";
		  if ($date[month] == 12) $date[month] = "December";
		  echo "<li>Aïd al Fitr : $date[day] $date[month] $date[year]</li></ul>";
?>

<?  
		  $date = $d->u2g(1,12,1442);
		  if ($date[month] == 1) $date[month] = "January";
		  if ($date[month] == 2) $date[month] = "February";
		  if ($date[month] == 3) $date[month] = "March";
		  if ($date[month] == 4) $date[month] = "April";
		  if ($date[month] == 5) $date[month] = "May";
		  if ($date[month] == 6) $date[month] = "June";
		  if ($date[month] == 7) $date[month] = "July";
		  if ($date[month] == 8) $date[month] = "August";
		  if ($date[month] == 9) $date[month] = "September";
		  if ($date[month] == 10) $date[month] = "October";
		  if ($date[month] == 11) $date[month] = "November";
		  if ($date[month] == 12) $date[month] = "December";
		  echo "
		  <p><b>Hadj 1442 (2021)</b></p>
		  <ul><li>Beginning of the month : $date[day] $date[month] $date[year]</li>";
		  
		  $date = $d->u2g(9,12,1442);
		  if ($date[month] == 1) $date[month] = "January";
		  if ($date[month] == 2) $date[month] = "February";
		  if ($date[month] == 3) $date[month] = "March";
		  if ($date[month] == 4) $date[month] = "April";
		  if ($date[month] == 5) $date[month] = "May";
		  if ($date[month] == 6) $date[month] = "June";
		  if ($date[month] == 7) $date[month] = "July";
		  if ($date[month] == 8) $date[month] = "August";
		  if ($date[month] == 9) $date[month] = "September";
		  if ($date[month] == 10) $date[month] = "October";
		  if ($date[month] == 11) $date[month] = "November";
		  if ($date[month] == 12) $date[month] = "December";
		  echo "<li>Arafat fast : $date[day] $date[month] $date[year]</li>";
		  
		  $date = $d->u2g(10,12,1442);
		  if ($date[month] == 1) $date[month] = "January";
		  if ($date[month] == 2) $date[month] = "February";
		  if ($date[month] == 3) $date[month] = "March";
		  if ($date[month] == 4) $date[month] = "April";
		  if ($date[month] == 5) $date[month] = "May";
		  if ($date[month] == 6) $date[month] = "June";
		  if ($date[month] == 7) $date[month] = "July";
		  if ($date[month] == 8) $date[month] = "August";
		  if ($date[month] == 9) $date[month] = "September";
		  if ($date[month] == 10) $date[month] = "October";
		  if ($date[month] == 11) $date[month] = "November";
		  if ($date[month] == 12) $date[month] = "December";
		  echo "<li>Aid al Adha : $date[day] $date[month] $date[year]</li></ul>";
?>
</div>		  

<p><b><u>To know</u></b></p>
<p>Here is the list of 12 lunar months :</p>

<div style="margin-left:20px;">
<ol>
<li><b>Muharram al Harâm *</b></li>
<li>Safar al Khayr</li>
<li>Rabi' al Awwal</li>
<li>Rabi' al Akhîr</li>
<li>Jumada al Awwal</li>
<li>Jumada al Akhir</li>
<li><b>Rajab *</b></li>
<li>Sha'bâne</li>
<li>Ramadân</li>
<li>Shawwâl</li>
<li><b>Dhul Qi'dah *</b></li>
<li><b>Dhul Hidjah *</b></li>
</ol>

<p style="margin-left:20px;">* 4 holy months</p>
</div>