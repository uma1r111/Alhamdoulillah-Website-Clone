<?php

    // Quran Metadata Sample Usage
    // By: Hamid Zarrabi-Zadeh
    // http://tanzil.net

    $metadataFile = 'data.xml';  // quran metadata file
	initQariData();   // initialize qari data array
    

    //------------------ General Functions ---------------------
	
    // initialize qari data array
    function initQariData()
    {
        global $qariData, $metadataFile;
        $dataItems = Array("index", 
		"name1", "url1", "sourates1", "recitation1", "lecture1", "extrait1", "image1", "lettre1", "dir1",
		"name2", "url2", "sourates2", "recitation2", "lecture2", "extrait2", "image2", "lettre2", "dir2",
		"name3", "url3", "sourates3", "recitation3", "lecture3", "extrait3", "image3", "lettre3", "dir3",
		"name4", "url4", "sourates4", "recitation4", "lecture4", "extrait4", "image4", "lettre4", "dir4",
		"name5", "url5", "sourates5", "recitation5", "lecture5", "extrait5", "image5", "lettre5", "dir5",
		"name6", "url6", "sourates6", "recitation6", "lecture6", "extrait6", "image6", "lettre6", "dir6",
		"name7", "url7", "sourates7", "recitation7", "lecture7", "extrait7", "image7", "lettre7", "dir7",
		"name8", "url8", "sourates8", "recitation8", "lecture8", "extrait8", "image8", "lettre8", "dir8",
		"name9", "url9", "sourates9", "recitation9", "lecture9", "extrait9", "image9", "lettre9", "dir9",
		"name10", "url10", "sourates10", "recitation10", "lecture10", "extrait10", "image10", "lettre10", "dir10",
		"name11", "url11", "sourates11", "recitation11", "lecture11", "extrait11", "image11", "lettre11", "dir11",
		"name12", "url12", "sourates12", "recitation12", "lecture12", "extrait12", "image12", "lettre12", "dir12",
		"name13", "url13", "sourates13", "recitation13", "lecture13", "extrait13", "image13", "lettre13", "dir13",
		"name14", "url14", "sourates14", "recitation14", "lecture14", "extrait14", "image14", "lettre14", "dir14",
		"name15", "url15", "sourates15", "recitation15", "lecture15", "extrait15", "image15", "lettre15", "dir15",
		"name16", "url16", "sourates16", "recitation16", "lecture16", "extrait16", "image16", "lettre16", "dir16",
		"name17", "url17", "sourates17", "recitation17", "lecture17", "extrait17", "image17", "lettre17", "dir17",
		"name18", "url18", "sourates18", "recitation18", "lecture18", "extrait18", "image18", "lettre18", "dir18",
		"name19", "url19", "sourates19", "recitation19", "lecture19", "extrait19", "image19", "lettre19", "dir19",
		"name20", "url20", "sourates20", "recitation20", "lecture20", "extrait20", "image20", "lettre20", "dir20",
		"name21", "url21", "sourates21", "recitation21", "lecture21", "extrait21", "image21", "lettre21", "dir21",
		"name22", "url22", "sourates22", "recitation22", "lecture22", "extrait22", "image22", "lettre22", "dir22",
		"name23", "url23", "sourates23", "recitation23", "lecture23", "extrait23", "image23", "lettre23", "dir23",
		"name24", "url24", "sourates24", "recitation24", "lecture24", "extrait24", "image24", "lettre24", "dir24",
		"name25", "url25", "sourates25", "recitation25", "lecture25", "extrait25", "image25", "lettre25", "dir25",
		"name26", "url26", "sourates26", "recitation26", "lecture26", "extrait26", "image26", "lettre26", "dir26"
		);

        $quranData = file_get_contents($metadataFile);
        $parser = xml_parser_create();
        xml_parse_into_struct($parser, $quranData, $values, $index);
        xml_parser_free($parser);

		        for ($i=1; $i<=30; $i++) 
        {
            $j = $index['QARI'][$i-1];
            foreach ($dataItems as $item)
                $qariData[$i][$item] = $values[$j]['attributes'][strtoupper($item)]; 
        }
        
    }
	

	// return given property of a qari
    function getQariData($qari, $property) 
    {
        global $qariData;
        return $qariData[$qari][$property];
    }
    
    //------------------ Display Functions 

	for ($f=1; $f<30; $f++)
		{
	${'dir'.$f} = getQariData(1, "dir$f"); 
	if (isset(${'dir'.$f})) ${'files'.$f} = array_slice(scandir(${'dir'.$f}), 2);
	${'x'.$f} = count(${'files'.$f});
	$mp3s += ${'x'.$f};
	}
	
	$cp = 0;
	for ($c=1; $c<30; $c++)
		{
		${'name'.$c} = getQariData(1, "name$c");
		if (isset(${'name'.$c})) $cp++;}
	
	echo"

<h2>Listen Quran Mp3</h2>
	
	<p>You will find on this page the 114 <a href=\"surahs.html\">mp3 surahs of the Quran</a> by the most famous reciters. Click on the name of the recitator you want to listen online or download mp3 to access to the list of available suras.</p>

	";?>


<p style="text-align:center;">

<?php 

foreach (range('A', 'Z') as $ancre) {
echo "<a href=\"#$ancre\">$ancre</a> | ";
if ($ancre == "M") echo "<br>";
}
echo"</p>
</div>

<h3>Quran recitations mp3</h3>

<ul>
<li><b>$mp3s</b> recitations of the Quran</li>
<li><b>$cp</b> reciters</li>
</ul>

";	
	
	foreach (range('A', 'Z') as $letter) {
	
	echo "
			<a name=\"$letter\"></a>
			<p id=\"ancred\"><b>$letter</b></p>
			<ul>
		";

		for ($f=1; $f<30; $f++)
		{
			${'qariNom'.$f} = getQariData(1, "name$f");
			${'qariURL'.$f} = getQariData(1, "url$f");
			${'qariR'.$f} = getQariData(1, "recitation$f");
			${'qariL'.$f} = getQariData(1, "lecture$f");
			${'qariEx'.$f} = getQariData(1, "extrait$f");
			${'qariPic'.$f} = getQariData(1, "image$f");
			${'lettre'.$f} = getQariData(1, "lettre$f");
			${'dir'.$f} = getQariData(1, "dir$f");

			if (isset(${'dir'.$f})) ${'files'.$f} = array_slice(scandir(${'dir'.$f}), 2);
			${'y'.$f} = count(${'files'.$f});

			if (${'lettre'.$f} == "$letter") echo "

			<li style=\"line-height:2em;\"><a href=\"${'qariURL'.$f}\"><b>${'qariNom'.$f}</b></a>, ${'y'.$f} surahs</li>


";	
	}

	echo "</ul>";

	}

?>