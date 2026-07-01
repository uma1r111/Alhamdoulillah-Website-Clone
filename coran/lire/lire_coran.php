<h1><?php echo "Sourate $suraNom | $suraOrderC";?></h1>

<div style="float: right; margin-right: 25px; margin-top: 0px;">

<table cellspacing="0" cellpadding="5" style="margin-left: 25px;">
  <tbody>
	<tr>
      <td style="border: 1px solid black;">Nombres de versets</td>
      <td style="border: 1px solid black; text-align:center;"><? echo $suraNumber; ?></td>
    </tr>
  <tr>
      <td style="border: 1px solid black;">Type de sourate</td>
      <td style="border: 1px solid black;"><? echo $suraType; ?></td>
    </tr>

	
  </tbody>
</table>

</div>

<?php if ($suraOrderC == 1) echo "<p>La sourate $suraNomT est une sourate de type $suraType composée de $suraNumber versets. Dans le Coran, elle se situe avant <a href=\"/coran/lire/sourate-$AsuraOrderC.html\">sourate $AsuraNomT</a>. Vous pouvez lire la sourate $suraNom en français et en arabe sur cette page. ";?>

<?php if ($suraOrderC == 114) echo "<p>La sourate $suraNomT est une sourate de type $suraType composée de $suraNumber versets. Dans le Coran, elle se situe après <a href=\"/coran/lire/sourate-$BsuraOrderC.html\">sourate $BsuraNomT</a>. Vous pouvez lire la sourate $suraNom en français et en arabe sur cette page. ";?>

<?php if ($suraOrderC > 1 and $suraOrderC < 114) echo "<p>La sourate $suraNomT est une sourate de type $suraType composée de $suraNumber versets. Dans le Coran, elle se situe entre <a href=\"/coran/lire/sourate-$BsuraOrderC.html\">sourate $BsuraNomT</a> et <a href=\"/coran/lire/sourate-$AsuraOrderC.html\">sourate $AsuraNomT</a>. Vous pouvez lire la sourate $suraNom en français et en arabe sur cette page. ";?>


<h2>Lire Sourate <? echo $suraNomT; ?></h2>

<?php

$palier = 35;

$filename = "../details/$suraOrderC.php";

if (file_exists($filename)) {
	include ("../details/$suraOrderC.php");


echo "<ul>
		<li><a href=\"#francais\">Lire en français</a></li>
		<li><a href=\"#arabe\">Lire en arabe</a></li>
		</ul>
	
	<p>A propos de sourate $suraNomT :</p>
	<ul>";
	
	if (strlen($nom) > $palier) echo "<li><a href=\"#nom\">Nom de la sourate</a></li>";
	if (strlen($periode) > $palier) echo "<li><a href=\"#periode\">Période de révélation de la sourate</a></li>";
	if (strlen($important) > $palier) echo "<li><a href=\"#important\">Points importants dans cette sourate</a></li>";
	if (strlen($merite) > $palier) echo "<li><a href=\"#merite\">Mérites et bienfaits de la sourate</a></li>";
	if (strlen($commentaire) > $palier) echo "<a href=\"#commentaire\"><li>A propos de la sourate</a></li>";
	if (strlen($theme) > $palier) echo "<a href=\"#theme\"><li>Thème de la sourate</a></li>";
	if (strlen($sujets) > $palier) echo "<a href=\"#sujet\"><li>Sujets évoqués dans la sourate</a></li>";
	
	echo "</ul>";
    
if (strlen($nom) > $palier) echo "<a name=\"nom\"></a><h3>Origine du Nom de sourate $suraNom</h3>$nom";

if (strlen($periode) > $palier) echo "<a name=\"periode\"></a><h3>Période de révélation de sourate $suraNomT</h3>$periode";

if (strlen($important) > $palier) echo "<a name=\"important\"></a><h3>Points importants dans sourate $suraNom</h3>$important";

if (strlen($merite) > $palier) echo "<a name=\"merite\"></a><h3>Mérites et bienfaits de sourate $suraNomT</h3>$merite";
	
if (strlen($commentaire) > $palier) echo "<a name=\"commentaire\"></a><h3>Commentaire sur sourate $suraNomT</h3>$commentaire";

if (strlen($theme) > $palier) echo "<a name=\"theme\"></a><h3>Thématique de la sourate $suraNom</h3>$theme";

if (strlen($sujets) > $palier) echo "<a name=\"sujet\"></a><h3>Sujets dans sourate $suraNomT</h3>$sujets";
	
}
?>


<h3>Lire Sourate <? echo $suraNom; ?> en Français</h3>

<p><a name="arabe"></a><a href="javascript:visibilite('div_texte1');">Lire en Arabe</a> | <a name="francais"></a><a href="javascript:visibilite('div_texte2');">Lire en Français</a></p>

<table style="margin-right:auto; margin-left:auto;" bgcolor="#fafafa" border="0" cellpadding="0" cellspacing="0">
  <tbody>
    <tr align="justify">
      <td align="middle" dir="ltr">
      <table style="background-color: rgb(255, 255, 255); width:100%; text-align: left; margin-left: auto; margin-right: auto;" border="0" cellpadding="0" cellspacing="0">
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



<table style="width:100%; text-align:center;">

<tr>

<? 	$suraOrderCb = $suraOrderC-1;
	$suraOrderCa = $suraOrderC+1;
?>

<td><?php if ($suraOrderCb !== 0) echo "
<p><a href=\"/coran/lire/sourate-$suraOrderCb.html\">Lire sourate $suraOrderCb</a></p>";?></td>

<td><p><a href="/coran/mp3/sourate-<?php echo $suraOrderC;?>.html"><b>Sourate <?php echo $suraOrderC;?> mp3</a></b></p></td>

<td><?php if ($suraOrderCa !== 115) echo "
<p><a href=\"/coran/lire/sourate-$suraOrderCa.html\">Lire sourate $suraOrderCa</a></p>";?></td>


</tr>
</table>