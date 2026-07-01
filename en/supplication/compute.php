<?php include("../inc/haut.php") ?>
<table id="global">
<tbody>
<tr>

<td id="contenu">

<?php 

	if (($id == 130) or ($id == 108) or ($id == 131) or ($id == 132) or ($id == 50)) {
	echo "<h1>$titrerappel</h1>"; } else {echo "<h1>Supplication $titre</h1>";}

	include("../../inc/pub-content.php");

	if (($id == 130) or ($id == 108) or ($id == 131) or ($id == 132) or ($id == 50)) {
	echo "<h2>$varianterappel</h2>"; } else {echo "<h2>Dua $variante</h2>";}	

	include ("mp3.php");
	
	$metadataFileListe = 'dua.xml';
	$xml = simplexml_load_file($metadataFileListe);
	
	$pasbon = array('saws');
	$bon = array('<span class="respect">(sallallahou \'alayhi wa sallam)</span>');
	
	$metadataFileListe = 'dua.xml';
	$xml = simplexml_load_file($metadataFileListe);
	
	$stop=1;
	
	if (isset($xml->group[$id-1])) foreach ($xml->group[$id-1] as $dua) {
	$duaID = $dua->attributes()->id;
	$groupe = $duaID;
	$duaPH = $dua->phonetic;

	if (!empty($dua->attributes()->id)){	
	
	if ($stop == 1){
	
	if ($compteur == 1) {

if ($groupe == 26) echo "<p> Here is the authentic invocation of $title. The dua is available in Arabic, French and phonetic. You can also listen to or download the dua of $title, in mp3. < / p> ";

if ($duaPH == "-") echo "<p> Here is an authentic reminder on $titre. It is not specified invocation in specific terms for this case. </p>";

if ($group !== 26)
{if ($duaPH != "-") echo "<p> Here is an authentic $title invocation. The dua is available in Arabic, French and phonetic. You can also listen to or download the dua $title, in mp3. </ p> ";}
}

if ($counter > 1 and $counter < 3) echo "<p> Here are some authentic invocations on $titre. The duas are available in Arabic, French and phonetic. You can also listen to or download the invocation $title, in mp3 format. </p> ";

if ($counter >= 3) echo "<p> Here is $counter authentic invocations on $title. Each dua is available in Arabic, French and phonetic. You can also listen or download the mp3 of the specific dua $title < / p> ";
	
	
	if ($compteur > 1) {echo "<ul>";
	
	foreach ($xml->group[$id-1] as $dua) {
	$duaID = $dua->attributes()->id;
	if (!empty($dua->attributes()->id)) echo "<li><a href=\"#$duaID\">Dua $duaID</a></li>";
	}
	
	if ($compteur > 1) echo "</ul>"; }	
	}
	$stop=0;
	}
}
	
	
	if (isset($xml->group[$id-1])) foreach ($xml->group[$id-1] as $dua) {
	$duaID = $dua->attributes()->id;
	$duaAR = $dua->arabic;
	$duaTR1 = $dua->translation; $duaTR = str_replace($pasbon, $bon, $duaTR1);
	$duaREF = $dua->reference;
	$duaPH = $dua->phonetic;
	
	
	
	if (!empty($dua->attributes()->id))
	{
		
if ($duaPH !='-') {		
	

	
	
	echo "
	
<a name=\"$duaID\"></a><h3><u>Dua n°$duaID</u></h3>

<p> The dua in Arabic: </p>

<p style =\"direction: rtl; font-size: 17pt; font-family: traditional-arabic; \"> $duaAR </p>

<p> The invocation in english: </p>

<p> $duaTR </p>

<p> The dhikr in phonetics: </p>
	<p style=\"color:darkgreen;\">$duaPH</p>";
	
	
	$fichier = "../../invocations/mp3/$duaID.mp3"; 
	
	if (file_exists($fichier)) {
		$mp3file = new MP3File($fichier);
		$duree = $mp3file->getDuration();
		$duaduree = MP3File::formatTime($duree);
	
	
	echo "
	
	
	<table style=\"border: 1px solid black; border-collapse: collapse; width:90%; margin-left:auto; margin-right:auto;\"cellpadding=\"5\" cellspacing=\"0\">
 <tbody>
  <tr style=\"font-weight: bold; border-bottom: 1px solid black; height:40px; background-color: lightblue;\">
				<td style=\"border-right:1px solid; \"width=\"205\"><b>Dua Mp3</b></td>
				<td style=\"text-align: center; border-right:1px solid; \"width=\"70\">Duration</td>
	
				<td style=\"text-align: center; border-right:1px solid; \">Listen</td>
				<td style=\"text-align: center;\" width=\"100\">Download</td>
				</tr>
				
					
				<tr>
				<td style=\" border-right:1px solid;\">Supplication n°$duaID</td>
				<td style=\" text-align: center; border-right:1px solid;\">$duaduree</td>
	
				<td style=\" text-align: center; border-right:1px solid;\"><a target=\"_blank\" href=\"/invocations/mp3/$duaID.mp3\"><img src=\"/images/sourates/play.png\"></a></td>
				
				<td style=\" text-align: center;\"><a download=\"\" href=\"/invocations/mp3/$duaID.mp3\"><img src=\"/images/sourates/telecharger.png\"></a></td>
				</tr>
				</table>
	
	";}


	}
	
	
if ($duaPH =='-') {		
	
	echo "
	
<a name=\"$duaID\"></a><h3><u>Reminder n°$duaID</u></h3>

<p>The reminder in Arabic:</p>

<p style=\"direction:rtl; font-size:17pt; font-family:traditional-arabic;\">$duaAR</p>

<p>The reminder in English:</p>

<p>$duaTR</p>

	";
		}

echo "<p style=\"font-size:8pt;\"><i>Source : $duaREF</i></p>";
	
	}	
	
	
	
	
}
	
	
	
	$now = $xml->group[$id-1]->title;
	$titlebefore = $xml->group[$id-2]->title;
	$titleafter = $xml->group[$id]->title;


	for ($i=1; $i<6; $i++) {

	$suitetitle = $xml->group[$id+$i]->title;
	${'suitetitle'.$i} = $xml->group[$id+$i]->title; 

	if ($suitetitle == '') $suitetitle = $xml->group[$id+$i-10]->title;
	if (${'suitetitle'.$i} == '') ${'suitetitle'.$i} = $xml->group[$id+$i-10]->title; 

	${'suite'.$i} = str_replace("", "'", $suitetitle);
    ${'suite'.$i} = htmlentities(${'suite'.$i}, ENT_NOQUOTES, $charset);
    ${'suite'.$i} = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', ${'suite'.$i});
    ${'suite'.$i} = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', ${'suite'.$i});
	${'suite'.$i} = str_replace(["'", "," , "/", "(", ")", "."], " ", strtolower(${'suite'.$i}));
	
	${'suite'.$i} = str_replace(["'", "," , "/", "(", ")", ".", "and ", "etc", " the", "the ", " al "], " ", strtolower(${'suite'.$i}));


	$exploded = explode(" ", ${'suite'.$i});
	foreach($exploded as $key => $word) { if(mb_strlen($word) < 3) unset($exploded[$key]);}
	${'suite'.$i} = implode(" ", $exploded);
	${'suite'.$i} = str_replace(" ", "-", strtolower(${'suite'.$i}));
	${'suite'.$i} = "${'suite'.$i}.html";

}


	

	$before = str_replace("", "'", $titlebefore);
    $before = htmlentities($before, ENT_NOQUOTES, $charset);
    $before = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $before);
    $before = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $before);
	$before = str_replace(["'", "," , "/", "(", ")", "."], " ", strtolower($before));
	
	$before = str_replace(["'", "," , "/", "(", ")", ".", "des ", "ses ", "est ", " ait ", "lorsque", "sur ", "les ", "lors", " une ", "qui ", "pas ", "par ", "cas ", " al "], " ", strtolower($before));

	$before = str_replace(["quelqu"], "personne", $before);
	$before = str_replace(["personnee"], "personne", $before);

	$exploded = explode(" ", $before);
	foreach($exploded as $key => $word) { if(mb_strlen($word) < 3) unset($exploded[$key]);}
	$before = implode(" ", $exploded);
	$before = str_replace(" ", "-", strtolower($before));
	$before = "$before.html";


	$after = str_replace("", "'", $titleafter);
    $after = htmlentities($after, ENT_NOQUOTES, $charset);
    $after = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $after);
    $after = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $after);
	$after = str_replace(["'", "," , "/", "(", ")", "."], " ", strtolower($after));
	
	$after = str_replace(["'", "," , "/", "(", ")", ".", "des ", "ses ", "est ", "lorsque", "sur ", " ait ", "les ", "lors", " une ", "qui ", "pas ", "par ", "cas ", " al "], " ", strtolower($after));

	$after = str_replace(["quelqu"], "personne", $after);
	$after = str_replace(["personnee"], "personne", $after);

	$exploded = explode(" ", $after);
	foreach($exploded as $key => $word) { if(mb_strlen($word) < 3) unset($exploded[$key]);}
	$after = implode(" ", $exploded);
	$after = str_replace(" ", "-", strtolower($after));
	$after = "$after.html";


	if ($id == 22) echo '<p>A more complete explanation of tashhahud is available <a href="/en/pillars-islam/prayer/tashahhud.html">on this page<a>.';


	
	if ($titlebefore == $now) {echo '<table style="text-align:center; background-color:lightblue; width:100%;padding:5px; margin-left:auto; margin-right: auto"><tr><td>Suivant<span style="font-size:8pt;"> >></span> <a href="' . $after . '">'. $titleafter . '</a></td></tr></table>';} else {
	
	if ($titleafter == "") {
	
	echo '<table style="text-align:center; background-color:lightblue; width:100%;padding:5px; margin-left:auto; margin-right: auto"><tr><td><a href="' . $before . '">'. $titlebefore . '</a> <span style="font-size:8pt;"><< </span>Précédent </td></tr></table>';} else {

	
	if ($titleafter == $now) { echo '<table style="text-align:center; background-color:lightblue; width:100%;padding:5px; margin-left:auto; margin-right: auto"><tr><td>Précédent <span style="font-size:8pt;">>></span> <a href="' . $before . '">'. $titlebefore . '</a></td></tr></table>';} else {
	
	if ($titleafter !== $now) {
	
	echo '<table style="text-align:center; background-color:lightblue; width:100%;padding:5px; margin-left:auto; margin-right: auto"><tr><td><a href="' . $before . '">'. $titlebefore . '</a> <span style="font-size:8pt;"><<</span> Précédent </td></tr><tr><td>Suivant <span style="font-size:8pt;">>></span> <a href="' . $after . '">'. $titleafter . '</a></td></tr></table>';}}}}





?>

<p>Poursuivre la lecture des invocations :</p>

<ul>
	<li><a href="<?php echo $suite1;?>"><?php echo $suitetitle1;?></a></li>
	<li><a href="<?php echo $suite2;?>"><?php echo $suitetitle2;?></a></li>
	<li><a href="<?php echo $suite3;?>"><?php echo $suitetitle3;?></a></li>
	<li><a href="<?php echo $suite4;?>"><?php echo $suitetitle4;?></a></li>
	<li><a href="<?php echo $suite5;?>"><?php echo $suitetitle5;?></a></li>
	
</ul>

<br>

</td>
<td id="colonnes"><?php include("../inc/droite.php") ?></td>
</tr>
</tbody>
</table>
<?php  include("../inc/footer.php") ?>