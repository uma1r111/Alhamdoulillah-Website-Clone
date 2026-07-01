<?php

    $metadataFile = 'sources/dawood-data.xml';
    $xml = simplexml_load_file($metadataFile);

	for ($i=0; $i<42; $i++) {
	
	$tempo = $xml->book[$i]['name'];
	
	$goodurl = str_replace(" ", "-", "$tempo");
	$url= "$goodurl.html";
	
	
	${'Index'.$i} = $xml->book[$i]['index'];
	${'Name'.$i} = $xml->book[$i]['name'];
	${'Chapters'.$i} = $xml->book[$i]['chapters'];
	${'Hadiths'.$i} = $xml->book[$i]['hadiths'];
	

	${'nameURL'.$i} = str_replace(" ", "-", strtolower(${'Name'.$i}));
	
	${'url'.$i} = "dawood/${'nameURL'.$i}.html";
 
	if (!file_exists(${'url'.$i})) 
	{
		${'myfile'.$i} = fopen(${'url'.$i}, "w");
	
	
	$txt = '<?php
	$book = '."'${'Name'.$i}'".';
	$bookHadiths = '."${'Hadiths'.$i}".';
	$bookNumber = '."${'Index'.$i}-1".';
	$chapters = '."${'Chapters'.$i}".';

	$bookseo = str_replace("كتاب ", "", $book);

	include("../seo.php") ?></td>

<body> 

<?php include("../../inc/menu.php") ?>

<table id="global">
<tbody>
<tr>

<td id="contenu">

<h1>حديث عن <?php echo $bookseo?> سنن أبي داود</h1>


<?php include("../compute.php") ?></td>
	


</td>
<td id="colonnes"><?php include("../../inc/droite.php") ?></td>
</tr>
</tbody>
</table>
<?php include("../../inc/footer.php") ?>
</body></html>';
	fwrite(${'myfile'.$i}, $txt);
	fclose(${'myfile'.$i});
	}
	
}
?>