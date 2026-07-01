<h1><?php echo "Surah $suraOrderC | $suraNom";?></h1>

<div style="float: right; margin-right: 25px; margin-top: 0px;">

<table cellspacing="0" cellpadding="5" style="margin-left: 25px;">
  <tbody>
	<tr>
      <td style="border: 1px solid black;">Number of verses</</td>
      <td style="border: 1px solid black; text-align:center;"><? echo $suraNumber; ?></td>
    </tr>
  <tr>
      <td style="border: 1px solid black;">Type of sura</td>
      <td style="border: 1px solid black;"><? echo $suraType; ?></td>
    </tr>

	
  </tbody>
</table><br>

</div>

<h2>Read Surah <? echo $suraNomT; ?></h2>

<p><a href="javascript:visibilite('div_texte1');">Read in arabic</a> | <a href="javascript:visibilite('div_texte2');">Read in english</a></p>


<table style="margin-right:auto; margin-left:auto;" bgcolor="#fafafa" border="0"
 cellpadding="0" cellspacing="0">
  <tbody>
    <tr align="justify">
      <td align="middle" dir="ltr">
      <table
 style="background-color: rgb(255, 255, 255); width:100%; text-align: left; margin-left: auto; margin-right: auto;"
 border="0" cellpadding="0" cellspacing="0">
        <tbody>
          <tr>
         <td colspan="3" style="height:23px; background-image: url(http://www.al-hamdoulillah.com/coran/lire/up.webp);"></td>
          </tr>
          <tr>
<td style="width:23px;background-image: url(http://www.al-hamdoulillah.com/coran/lire/right.webp); background-repeat: repeat-y"></td>



            <td style="vertical-align: top;">


            <table
 style="background-color: rgb(254, 254, 228); width: 100%; height: 100%;"
 border="0" cellpadding="0" cellspacing="0">
              <tbody>
                <tr align="justify">
                  <td
 style="text-align: center; vertical-align: top;">
                  
			
				<div id="div_texte1" style="display:block;">			
					<div class="moushaf">
					<?      showSura($sura); ?>
					</div>
				</div>		
		
		
				<div id="div_texte2" style="display:none;">
					<div class="moushaffr">
					<?      showSurafr($sura); ?>
					</div>
				</div>		
		

<script>
    var divPrecedent=document.getElementById('div_texte1');
    function visibilite(divId)
    {
        divPrecedent.style.display='none';
        divPrecedent=document.getElementById(divId);
        divPrecedent.style.display='';
    }
</script> 
			

                  </td>
                </tr>
              </tbody>
            </table>
            </td>
<td style="width:23px;background-image: url(http://www.al-hamdoulillah.com/coran/lire/left.webp); background-repeat: repeat-y"></td>



          </tr>
          <tr>
            <td colspan="3" style="height:23px; background-image: url(http://www.al-hamdoulillah.com/coran/lire/down.webp);"></td>
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

<? 	$suraOrderCb = $suraOrderC-1;
	$suraOrderCa = $suraOrderC+1;
?>

<td><?php if ($suraOrderCb !== 0) echo "
<p><a href=\"/en/quran/read/surah-$suraOrderCb.html\">Read sura $suraOrderCb</a></p>";?></td>

<td><?php echo "<p><a href=\"/en/quran/mp3/surah-$suraOrderC.html\">Sura $suraOrderC mp3</a></p>";?></td>

<td><?php if ($suraOrderCa !== 115) echo "
<p><a href=\"/en/quran/read/surah-$suraOrderCa.html\">Read sura $suraOrderCa</a></p>";?></td>


</tr>
</table>