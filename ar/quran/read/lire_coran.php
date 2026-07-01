<h1><?php echo "سورة $suraOrderC | $suraNom";?></h1>

<div style="float: left; margin-left: 25px; margin-top: 0px;">

<table cellspacing="0" cellpadding="5" style="margin-right: 25px;">
  <tbody>
	<tr>
      <td style="border: 1px solid black;">عدد آياتها</</td>
      <td style="border: 1px solid black; text-align:center;"><? echo $suraNumber; ?></td>
    </tr>
  <tr>
      <td style="border: 1px solid black;">نوع من سورة</td>
      <td style="border: 1px solid black;"><? echo $suraType; ?></td>
    </tr>

	
  </tbody>
</table><br>

</div>

<h2>قراءة سورة <? echo $suraNom; ?></h2>

<p>-</p>

<table style="margin-right:auto; margin-left:auto;" bgcolor="#fafafa" border="0" cellpadding="0" cellspacing="0">
  <tbody>
    <tr align="justify">
      <td align="middle" dir="ltr">
      <table style="background-color: rgb(255, 255, 255); width:100%; text-align: right; margin-left: auto; margin-right: auto;" border="0" cellpadding="0" cellspacing="0">
        <tbody>
          <tr>
         <td colspan="3" style="height:23px; background-image: url(https://www.al-hamdoulillah.com/coran/lire/up.webp);"></td>
          </tr>
          <tr>
<td style="width:23px;background-image: url(https://www.al-hamdoulillah.com/coran/lire/right.webp); background-repeat: repeat-y"></td>



            <td style="vertical-align: top;">


            <table style="background-color: rgb(254, 254, 228); width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
              <tbody>
                <tr align="justify">
                  <td style="text-align: center; vertical-align: top;">
			
				
					<div class="moushaf">
					
					<? showSura($sura); ?>
					</div>
				

                  </td>
                </tr>
              </tbody>
            </table>
            </td>
<td style="width:23px;background-image: url(https://www.al-hamdoulillah.com/coran/lire/left.webp); background-repeat: repeat-y"></td>



          </tr>
          <tr>
            <td colspan="3" style="height:23px; background-image: url(https://www.al-hamdoulillah.com/coran/lire/down.webp);"></td>
          </tr>
        </tbody>
      </table>
      </td>
    </tr>
  </tbody>
</table>

<br>

<?php include("../../inc/share.php");?>


<table style="width:100%; text-align:center;">

<tr>

<? 	$suraOrderCb = $sura-1;
 	$suraOrderAb = getSuraData($suraOrderCb, 'name');

	$suraOrderCa = $sura+1;
 	$suraOrderAa = getSuraData($suraOrderCa, 'name');
	
?>

<td><?php if ($suraOrderCb !== 0) echo "
<p><a href=\"/ar/quran/read/surah-$suraOrderCb.html\">قراءة سورة $suraOrderAb</a></p>";?></td>

<td><?php echo "<p><a href=\"/ar/quran/mp3/surah-$suraOrderC.html\">سورة $suraNom MP3</a></p>";?></td>

<td><?php if ($suraOrderCa !== 115) echo "
<p><a href=\"/ar/quran/read/surah-$suraOrderCa.html\">قراءة سورة $suraOrderAa</a></p>";?></td>


</tr>
</table>