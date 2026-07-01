<p><b>En savoir plus sur la roqya :</b></p>

<ul>
<?php

$a0 = '<li><a href="/roqya/">Qu\'est-ce que la roqya ?</a></li>';
$a1 = '<li><a href="symptomes.html">Quels sont les symptomes de la roqya ?</a></li>';
$a2 = '<li><a href="arnaque.html">Arnaque à la roqya par téléphone</a></li>';

	echo $a0;
	if (!stristr($a1, $theme)) echo $a1;
	if (!stristr($a2, $theme)) echo $a2;

?>
</ul>