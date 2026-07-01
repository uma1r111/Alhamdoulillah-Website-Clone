<?php
function versets($sourate, $start, $end){
$lines = file('auto/sourate/'.$sourate.'.txt');

?><div class=versets><?
for ($id = $start-1; $id <= $end-1; $id++){ 
$nb=$id+1;
$nb = str_replace('0' ,'٠', $nb);
$nb = str_replace('1' ,'١', $nb);
$nb = str_replace('2' ,'٢', $nb);
$nb = str_replace('3' ,'٣', $nb);
$nb = str_replace('4' ,'٤', $nb);
$nb = str_replace('5' ,'٥', $nb);
$nb = str_replace('6' ,'٦', $nb);
$nb = str_replace('7' ,'٧', $nb);
$nb = str_replace('8' ,'٨', $nb);
$nb = str_replace('9' ,'٩', $nb);
echo "$lines[$id] <span class=verNum>﴿<span style=\"display:none;\">.</span>$nb<span style=\"display:none;\">.</span>﴾</span>";
}
?></div><?
}
?>