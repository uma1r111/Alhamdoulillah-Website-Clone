<?php include("../../inc/share.php")?>

<h3>Folder on the prayer:</h3>

<ul>
<?php

$a0 = '<li><a href="index.html">The prayer in Islam</a></li>';
$a1 = '<li><a href="status.html">Is prayer obligatory?</a></li>';
$a2 = '<li><a href="times.html">The times of prayers</a></li>';
$a3 = '<li><a href="conditions.html">The conditions of prayer</a></li>';
$a4 = '<li><a href="obligations.html">The obligations of prayer</a></li>';
$a5 = '<li><a href="recommendations.html">The recommendations of the prayer</a></li>';
$a6 = '<li><a href="not-recommended.html">What is not recommended during prayer</a></li>';
$a7 = '<li><a href="cancel.html">What cancels the prayer</a></li>';
$a8 = '<li><a href="how-to.html">How to pray ?</a></li>';
$a9 = '<li><a href="tashahhud.html">The tashahhud</a></li>';
$a10 = '<li><a href="ibrahimiya.html">The ibrahimiya prayer</a></li>';
$a11 = '<li><a href="catch-up.html">How to catch up with his prayers?</a></li>';
$a12 = '<li><a href="mortuary.html">The mortuary prayer</a></li>';
$a13 = '<li><a href="degree.html">The degrees of completion of the prayer</a></li>';

	if (!stristr($a0, $theme)) echo $a0;
	if (!stristr($a1, $theme)) echo $a1;
	if (!stristr($a2, $theme)) echo $a2;
	if (!stristr($a3, $theme)) echo $a3;
	if (!stristr($a4, $theme)) echo $a4;
	if (!stristr($a5, $theme)) echo $a5;
	if (!stristr($a6, $theme)) echo $a6;
	if (!stristr($a7, $theme)) echo $a7;
	if (!stristr($a8, $theme)) echo $a8;
	if (!stristr($a9, $theme)) echo $a9;
	if (!stristr($a10, $theme)) echo $a10;
	if (!stristr($a11, $theme)) echo $a11;
	if (!stristr($a12, $theme)) echo $a12;
	if (!stristr($a13, $theme)) echo $a13;

	?>
</ul>