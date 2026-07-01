<?php

	
	$metadataFileListe = '../sources/'. $source . '-data.xml';
	$xmlListe = simplexml_load_file($metadataFileListe);

	echo '<ul>';

	for ($i=0; $i<$chapters; $i++) {

	
	$n = $i-1;

	$named = $xmlListe->book[$bookNumber]->chapter[$i]['name']; 
	
	$ancre = $xmlListe->book[$bookNumber]->chapter[$i]['index'];
	$nombred = $xmlListe->book[$bookNumber]->chapter[$i]['hadiths'];

	
	
	$pasbon = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
	$bon = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
	$nombre = str_replace($pasbon, $bon, $nombred);
	$name = str_replace($pasbon, $bon, $named);
	
	if ($nombre == ١) $detail = 'حديث';
	if ($nombre ==  ٢) $detail = 'حديثان';
	if ($nombre >= ٣) $detail = 'أحاديث';
	
		if ($nombre == ٠) echo '<li><a href="#' . $ancre . '">' . $name . '</a></li>';
	
		if ($nombre != ٠) echo '<li><a href="#' . $ancre . '">' . $name . ' (<span style="font-family:verdana; font-size:10pt;">' . $nombre . '</span> '. $detail .')</a></li>';
		

	}

	echo '</ul>';


	echo '<h2>'. $book. ' من أحاديث ' . $long .'</h2>';
	
	$metadataFile = '../sources/'. $source . '.xml';
    $xml = simplexml_load_file($metadataFile);
    

	for ($i=0; $i<$bookHadiths+1; $i++) {

	$tempo = $xml->book[$bookNumber]->hadith[$i]['text']; // texte
	$index = $xml->book[$bookNumber]->hadith[$i]['index']; // n°
	$section = $xml->book[$bookNumber]->hadith[$i]['sectionindex']-1;
	$section2 = $xml->book[$bookNumber]->hadith[$i-1]['sectionindex']-1;
	
	$babed = $xmlListe->book[$bookNumber]->chapter[$section]['name']; 
	$nogood = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
	$good = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
	$bab = str_replace($nogood, $good, $babed);
	
	
	
	$anchor = $xmlListe->book[$bookNumber]->chapter[$section]['index']; 
	




	$old = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '{', '}', 'رَسُولَ اللَّهِ صلى الله عليه وسلم', 'النَّبِيُّ صلى الله عليه وسلم', 'رَسُولُ اللَّهِ صلى الله عليه وسلم', 'رَسُولِ اللَّهِ صلى الله عليه وسلم', 'النَّبِيِّ صلى الله عليه وسلم', '"‏ ', ' ".');
	$new = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩', '<span style="font-size:12pt; color:darkblue; font-family:quran;">{', '}</span>', '<b>رَسُولَ اللَّهِ صلى الله عليه وسلم</b>', '<b>النَّبِيُّ صلى الله عليه وسلم</b>', '<b>رَسُولُ اللَّهِ صلى الله عليه وسلم</b>', '<b>رَسُولِ اللَّهِ صلى الله عليه وسلم</b>', '<b>النَّبِيِّ صلى الله عليه وسلم</b>', '<span style="color:darkred;">"‏ ', ' ".</span>');
	$number = str_replace($old, $new, $index);
	$correct = str_replace($old, $new, $tempo);
	

	if ($i == 0) {
	echo '<h3 style="background-color:lightblue; margin:0px; padding:5px;"><a name="'. $anchor . '"></a>' . $bab . '</h3>';
	$repeat = $bab;
}

	if (($i !== 0) && ($bab !== $repeat)) {
		if ($section !== $section2) echo '<a name="'. $anchor . '"></a><h3 style="background-color:lightblue; margin:0px; padding:5px;">' . $bab . '</h3>';
	}
	
	

	if ($xml->book[$bookNumber]->hadith[$i]['index'] == 0) 
	{

		$correct = str_replace($old, $new, $tempo);

		echo '<p style="font-family:hadith; '. $lecture . '">' . $correct . '</p>';
	
	} else {


		echo '<p><span style="font-family: verdana; font-size:10pt; background-color:lightblue;">[' . $number . ']</span> <span style="font-family:hadith;">' . $correct . '</span></p>';
	}

	}
	
	$next = $xmlListe->book[$bookNumber+1]['name']; 
	$previous = $xmlListe->book[$bookNumber-1]['name'];
	
	$urlnexttempo = str_replace(" ", "-", "$next");
	$urlnext = "$urlnexttempo.html";
	
	$urlprevtempo = str_replace(" ", "-", "$previous");
	$urlprev = "$urlprevtempo.html";
	
	
	
	if ($previous == $bookNumber) {echo '<table style="text-align:center; background-color:lightblue; width:100%;padding:5px; margin-left:auto; margin-right: auto"><tr><td><b>التالى</b> <span style="font-size:10pt;">>></span> <a href="' . $urlnext . '"><b>'. $next . '</b></a></td></tr></table>';} else {
	
	if ($next == NULL) { echo '<table style="text-align:center; background-color:lightblue; width:100%;padding:5px; margin-left:auto; margin-right: auto"><tr><td>سابق <span style="font-size:10pt;">>></span> <a href="' . $urlprev . '"><b>'. $previous . '</b></a></td></tr></table>';} else {
	
	if ($next !== $bookNumber && $previous !== $bookNumber) {
	
	echo '<table style="text-align:center; background-color:lightblue; width:100%;padding:5px; margin-left:auto; margin-right: auto"><tr><td>التالى <span style="font-size:10pt;">>></span> <a href="' . $urlnext . '">'. $next . '</a></td><td>سابق <span style="font-size:10pt;">>></span> <a href="' . $urlprev . '">'. $previous . '</a></td></tr></table>';}}}

?>