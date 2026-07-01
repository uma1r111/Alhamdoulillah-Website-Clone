 <?php
		$count = 0;
		$top = 0;

		for ($i=1; $i<=2400; $i++) 
	{
		${'country'.$i} = getSuraData($i, 'country');
		${'pop'.$i} = getSuraData($i, 'pop');
		${'lat'.$i} = getSuraData($i, 'lat'); 
		${'long'.$i} = getSuraData($i, 'long');
		
		if (${'country'.$i} == $country) {
			if (${'pop'.$i} > $top) {
			$top = ${'pop'.$i};
			$VilleLat = ${'lat'.$i};
			$VilleLong = ${'long'.$i};
			}
		$count++;
		}
	}

?>

<h1>Mosquée <?=$country?></h1>

<p><a href="/annuaire/mosquee/">Monde</a> > <a href="/annuaire/mosquee/<?echo str_replace(" ", "-", strtolower($continent))?>/"><?echo $continent?></a> > <?echo $country?></strong></p>

<p width="100%">Voici les mosquées et salles de prières de <?echo number_format($count)?> villes en <?echo $country?>.</p>

<center><div style="width:100%; display:block; height:5px; background-color:slategray; margin:0px;"></div></center>

<img style="float:right; margin-right:25px; margin-top:9px; height:33px; width:45px;" src="/horaires-prieres/flags/<?=str_replace(" ", "-", strtolower($country))?>.GIF">

<h2>Liste des Mosquées en <?=$country?></h2>

<p>Cliquez sur la ville pour laquelle vous souhaitez connaitre l'emplacement et le lieu exact des mosquées, les adresses où prier ainsi que des salles de prière.</p>

<p style="text-align:center; margin-bottom:-5px;"> -

<?php 


foreach (range('A', 'Z') as $letter) {
	
	$stop = 0;
	
	for ($i=1; $i<=2400; $i++) 
	{
		${'city'.$i} = getSuraData($i, 'city'); 
		${'country'.$i} = getSuraData($i, 'country'); 
		${'ville'.$i} = str_replace(" ", "-", strtolower(getSuraData($i, 'city')));
		${'magloub'.$i} = ${'city'.$i};
		$first = substr(strrev(${'magloub'.$i}), -1);

	if (${'country'.$i} == $country)
	{
		if ($first == "$letter") {
		if ($stop == 0) echo "<a href=\"#$letter\">$letter</a> - ";
			$stop++;
		};
	}; 
	
	}
}

?>

</p>

<?

foreach (range('A', 'Z') as $letter) {
	
	$stop = 0;
	
	for ($i=1; $i<=2400; $i++) 
	{
		${'city'.$i} = getSuraData($i, 'city'); 
		${'country'.$i} = getSuraData($i, 'country'); 
		${'ville'.$i} = str_replace(" ", "-", strtolower(getSuraData($i, 'city')));
		${'magloub'.$i} = ${'city'.$i};
		$first = substr(strrev(${'magloub'.$i}), -1);

	if (${'country'.$i} == $country)
	{
		if ($first == "$letter") {
			if ($stop == 0) echo "<p style=\"width: 550px; display: inline-block;\"><b><a id=\"$letter\"><span style=\"color:black;\">$letter</span></b></p>";
			echo "<li style=\"line-height:180%; margin-left:30px; float:left; width: 250px; \"><a href=\"${'ville'.$i}.html\">${'city'.$i}</a></li>";
			$stop++;
		};
	}; 
	
	}
}
?>
<p><br></p>