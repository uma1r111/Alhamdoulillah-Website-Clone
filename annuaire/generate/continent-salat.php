 <?php
		$count = 0;
		$top = 0;

		for ($i=1; $i<=2400; $i++) 
	{
		${'continent'.$i} = getSuraData($i, 'continent');
		
		if (${'continent'.$i} == $continent) {
		$count++;
		}
	}

?>
<h1>Mosquée <?=$continent?></h1>

<p><a href="/annuaire/mosquee/">Mosquées</a> > <strong><?echo $continent?></strong></p>

<p width="100%">Voici les mosquées et salles de prières de <?echo number_format($count)?> villes en <?echo $continent?>.</p>

<center><div style="width:100%; display:block; height:5px; background-color:slategray; margin:0px;"></div></center>

<img style="float:right; margin-right:25px; margin-top:9px; height:33px; width:45px;" src="/horaires-prieres/flags/<?=str_replace(" ", "-", strtolower($continent))?>.GIF">

<h2>Grandes Mosquées en <?=$continent?></h2>

<p>Sélectionnez le pays en <?php echo $continent?> pour lequel vous souhaitez consulter la liste des mosquées de l'annuaire en cliquant sur le drapeau correspondant au pays.</p> 

<ul>

<?php

echo $filecount;

if ($dir = opendir(".")) {
  while (false !== ($file = readdir($dir))) { 
  if ($file !== 'index.html' && $file !== '.' && $file !== '..') {
	  $filedo = str_replace("-", " ", $file);
	  $fileda = str_replace("democratique", "D.", $filedo);
	  $filed = str_replace("terres australes et antarctiques", "Terres AA", $fileda);

$exclude = array('et', 'du');
$words = explode(' ', $filed);
foreach($words as $key => $word) {
    if(in_array($word, $exclude)) {
        continue;
    }
    $words[$key] = ucfirst($word);
}
$list = implode(' ', $words);	  
	  
	  echo "<li style=\"line-height:250%; margin-left:-15px; list-style-type:none; width: 270px; float: left;\"><img style=\"padding:10px; height:33px; width:45px; vertical-align:middle\"; src=\"/horaires-prieres/flags/$file.GIF\"><a href=\"$file\">$list</a></li>"; 
	  
	  
	  
	}
	
	
  }
  closedir($dir);
}
?>

</ul>

<p><br></p>
<p><br></p>
