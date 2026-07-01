<?php 
if (($theme == 'dossier') || ($theme == 'difference')) include("../inc/share.php");
if (($theme == 'adam') or ($theme == 'idriss') or ($theme == 'nouh') or ($theme == 'ilyas')) include("../../inc/share.php");
?>

<h3><a href="/prophetes">Les prophètes</a></h3>

<ul>
<?php

$c0 = '<li><a href="/prophetes/difference.html">La différence entre un prophète et un messager</a></li>';

	if (!stristr($c0, $theme)) echo $c0;

?>
</ul>


<p><a href="/prophetes/histoires/"><b>Les histoires des prophètes</b></a></p>

<ul>
<?php

$a0 = '<li><a href="/prophetes/histoires/adam.html">Adam</a></li>';
$a1 = '<li><a href="/prophetes/histoires/idriss.html">Idriss</a></li>';
$a2 = '<li><a href="/prophetes/histoires/nouh.html">Nouh</a></li>';
$a3 = '<li><a href="/prophetes/histoires/ilyas.html">Ilyas</a></li>';

	if (!stristr($a0, $theme)) echo $a0;
	if (!stristr($a1, $theme)) echo $a1;
	if (!stristr($a2, $theme)) echo $a2;
	if (!stristr($a3, $theme)) echo $a3;

	?>
</ul>