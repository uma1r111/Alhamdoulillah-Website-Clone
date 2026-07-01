<h1>Annuaire des Mosquées</h1>

<p>Annuaire > <strong>Mosquées</strong></p>

 <p width="100%">La terre d'Allah est vaste. Les mosquées, ces lieux aimées de notre Créateur, fleurissent de partout, al hamdoulillah. Si vous comptez le nombre de mosquées il y a 20 ans et vous le comparez à maintenant, vous seriez agréablement surpris. Consultez l'annuaire des mosquées du monde entier pour vous en rendre compte.</p>

<center><div style="width:100%; display:block; height:5px; background-color:slategray; margin:0px;"></div></center>

<h2>Grandes Mosquées du Monde</h2>

<p>Cliquez sur un continent pour accéder à la liste des mosquées par pays.</p>

<table style="padding:0px; margin:0px;"><tr><td style="padding:0px; margin:0px;"><ul style="padding-top:0px; margin-top:0px;">


 <?php
if ($dir = opendir(".")) {
  while (false !== ($file = readdir($dir))) { 
  if ($file !== 'index.html' && $file !== '.' && $file !== '..') {
	  $filed = str_replace("-", " ", $file);
	  

$exclude = array('and', 'of');
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

</ul></td></tr></table>
 

<br>