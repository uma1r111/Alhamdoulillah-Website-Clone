<?php	

    $metadataFile = 'dua.xml';
    $xml = simplexml_load_file($metadataFile);



	for ($i=0; $i<133; $i++) {
	${'title'.$i} = $xml->group[$i]->title;
	$version = $xml->group[$i]->version;
	${'id'.$i} = $xml->group[$i]['id'];
	
	${'nameURL'.$i} = str_replace("", "'", ${'title'.$i});
    ${'nameURL'.$i} = htmlentities(${'nameURL'.$i}, ENT_NOQUOTES, $charset);
    ${'nameURL'.$i} = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', ${'nameURL'.$i});
    ${'nameURL'.$i} = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', ${'nameURL'.$i});

		${'nameURL'.$i} = str_replace(["'", "," , "/", "(", ")", ".", "and ", "etc", " the", "est ", "lorsque", "sur ", "les ", "lors", " une ", "qui ", "pas ", "par ", "cas ", " al "], " ", strtolower(${'nameURL'.$i}));


	$exploded = explode(" ", ${'nameURL'.$i});
	foreach($exploded as $key => $word) {
		if(mb_strlen($word) < 3) unset($exploded[$key]);
	}
	${'nameURL'.$i} = implode(" ", $exploded);

	${'nameURL'.$i} = str_replace(" ", "-", strtolower(${'nameURL'.$i}));

		
		${'url'.$i} = "${'nameURL'.$i}.html";

echo ${'url'.$i}; echo "<br>";



	${'compteur'.$i} = $xml->group[$i]->doua->count();
echo ${'compteur'.$i};

	if (isset(${'title'.$i})) foreach (${'title'.$i} as $dua) {
	$duaID = $dua->attributes()->id;
	$duaAR = $dua->arabic;
	$duaTR = $dua->translation;
	$duaREF = $dua->reference;
	$duaPH = $dua->phonetic;


	}

	
	
	if ($version == "") $version = ${'title'.$i};


	

	
 
}
?>