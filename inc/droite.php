<center>
<div style="border-bottom:1px solid gray; margin-bottom:15px;  padding:5px; background-color:white; text-align:center; border-radius:3px;">      	
		<?php 
			
			include_once ("hijri.php");
			
			$d = new uCakl; 	

			$d->setLang("fr");
			echo "<b>" . $d->date("l j F")."</b><br>\n";
			$d->setLang("ar");
			echo $d->date("l j F");

			?>
		</div>

	
	
<!-- 
	
<table><tr>
	
<td style="vertical-align:top;"><div class="fb-like" data-href="https://www.al-hamdoulillah.com/" data-layout="box_count" data-action="like" data-show-faces="false" data-share="false"></div></td>

</tr></table>

<div style="height:15px;"></div>	

<a href="https://twitter.com/alhamdoulillah" class="twitter-follow-button" data-size="large" data-show-screen-name="false" data-show-count="true">Follow</a>


 
$test = $_SERVER['REQUEST_URI'];
if ((strstr($test, "horaires-prieres/monde")) or (strstr($test, "horaires-prieres/ramadan"))) {
	echo "

<div id=\"QMap\" style=\"height: 250px; width:100%; color:slategrey;\">Qibla map</div>";


echo "
<script async type=\"text/javascript\">
	function init() {
		var params = {lat: $VilleLat, lng: $VilleLong, zoom: 5,	type: 'm'};
		Qibla.showRhumbLine = true;
		Qibla.startMap(params);
	}
	window.onload = init;
	window.onunload = function() { GUnload() }; // no cookies
</script>";


echo "
<script async defer src=\"https://maps.google.com/maps?file=api&amp;v=3&amp;key=AIzaSyD9YQt_KVS5R-QcWzZ_LNq2DJFdRtMHOMg\" type=\"text/javascript\"> </script>
<script async defer src=\"/horaires-prieres/js/eqibla.js\" type=\"text/javascript\"></script><script async  src=\"/horaires-prieres/js/rhumb.js\" type=\"text/javascript\"></script>

<br>

";

}


?>

-->

<!-- al-hamdoulillah.com [all-side] -->
<!-- <ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7774762967038154"
     data-ad-slot="4067089760"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script> -->
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7774762967038154"
crossorigin="anonymous"></script>
<!-- All Hamdulillah Side Bar -->
<ins class="adsbygoogle"
style="display:block"
data-ad-client="ca-pub-7774762967038154"
data-ad-slot="8890876139"
data-ad-format="auto"
data-full-width-responsive="true"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
	  
	 <br>
	 

</center>	 	 
	

<?php 


if ($test !== "/") require_once( dirname(__FILE__) . '/../blog/wp-load.php' );	


if ($test == "/") {
	
	?>
	
<div style="width:100%; background-color:white;">
<div style="text-align:center; vertical-align:middle; border-bottom:1px solid gray; padding:10px; margin-top: 15px; background-color:lightblue;"><b>Lire plus d'articles</b></div>
<div style="height:10px;"></div>
<?php
	
	$args = array( 'numberposts' => '7', 'post_status' => 'publish' );
	$recent_posts = wp_get_recent_posts( $args );
	$boucle = 1;
	
	
	foreach( $recent_posts as $recent ){
	
	
	$urltitre = get_permalink($recent["ID"]);
	
	if ($boucle > 3) {
	
	echo '<div style="margin-left:20px;" id="break"><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a></div> ';
	$perma = basename(get_permalink($recent["ID"]));
	
	$nom = substr($perma, 0, -5);
	$altag = str_replace("-", " ", $nom);
	$fileimage = "/blog/images/small/$nom.webp"; 
	
	
	echo "<a href=\"$urltitre\"><img class=\"lazy\" style=\"margin-left:19px; margin-bottom:20px; margin-top:10px; width:315px; height:180px;\"; alt=\"$altag\" data-src=\"$fileimage\" /></a>";
	if ($boucle<7) echo "<div style=\"width:100%; display:block; height:5px; margin-bottom:15px; background-color:slategray; \"></div>";
	
	}
	
	$boucle++;
	
	}
	}



if (($test !== "/blog/") && (!is_category()) && ($test !== "/")) {
	
	?>
	
<div style="width:100%; background-color:white;">
<div style="text-align:center; vertical-align:middle; margin-top:15px; border-bottom:1px solid gray; padding:10px; background-color:lightblue;"><b>Articles récents</b></div>
<div style="height:10px;"></div>
<?php
	
	$args = array( 'numberposts' => '5', 'post_status' => 'publish' );
	$recent_posts = wp_get_recent_posts( $args );
	$boucle = 1;
	
	
	foreach( $recent_posts as $recent ){

	$urltitre = get_permalink($recent["ID"]);
	
	if  ("https://www.al-hamdoulillah.com$test" !== $urltitre) {
	
	echo '<div style="margin-left:20px;" id="break"><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a></div> ';
	$perma = basename(get_permalink($recent["ID"]));
	
	$nom = substr($perma, 0, -5);
	$altag = str_replace("-", " ", $nom);
	$fileimage = "/blog/images/small/$nom.webp"; 
	
	
	echo "<a href=\"$urltitre\"><img class=\"lazy\" style=\"margin-left:19px; margin-bottom:20px; margin-top:10px; width:315px; height:180px;\"; alt=\"$altag\" data-src=\"$fileimage\" /></a>";
	if ($boucle<5) echo "<div style=\"width:100%; display:block; height:5px; margin-bottom:15px; background-color:slategray; \"></div>";
	
	
	$boucle++;
	
	}
	
	if  ("https://www.al-hamdoulillah.com$test" == $urltitre) $boucle = $boucle+1;
		
	}
	}
	


if ((is_category()) or ($test == "/blog/")) {
	
	?>
	
<div style="width:100%; background-color:white;">
<div style="text-align:center; vertical-align:middle; border-bottom:1px solid gray; padding:10px; margin-top:15px; background-color:lightblue;"><b>Catégories</b></div>
<ul style="padding-bottom:15px; text-align:left;">
<?php
	
	
	
	wp_list_categories('orderby=name&show_count=1&title_li=&hierarchical=0'); 

	
}
	wp_reset_query();	
?>
</ul>

</div>

</center>