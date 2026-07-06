<!-- START FIGMA MATCHED SIDEBAR BANNER -->
<div class="migration-sidebar-banner" style="width: 100%; max-width: 340px; background: #6f22d8 linear-gradient(185deg, #6f22d8 0%, #4a148c 100%); border-radius: 12px; box-sizing: border-box; padding: 25px 20px; text-align: center; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; margin-bottom: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.2); position: relative; overflow: hidden;">
    
    <!-- Phone Mockup Graphic Layer -->
    <div style="width: 140px; height: 160px; margin: 0 auto 15px auto; position: relative;">
        <img src="/images/banners/popup-app-mockup.png" alt="App Preview" style="width: 100%; height: auto; object-fit: contain; filter: drop-shadow(0px 8px 12px rgba(0,0,0,0.3));">
    </div>

    <!-- Typography matching image_879cc9.png -->
    <h3 style="margin: 0 0 6px 0; font-size: 19px; color: #ffffff; font-weight: 700; letter-spacing: -0.3px; line-height: 1.2;">
        Download Al-hamdoulillah App
    </h3>
    <p style="margin: 0 0 18px 0; font-size: 11px; color: rgba(255, 255, 255, 0.75); line-height: 1.4;">
        Get access to Quran, Hadith, and Islamic content on your device
    </p>

    <!-- App Store Redirection Badges -->
    <div style="display: flex; justify-content: center; gap: 8px; flex-wrap: wrap;">
        <a href="https://al-hamdoulillah.imperiuminnovations.org/" target="_blank" style="display: inline-block; background-color: #000000; border: 1px solid rgba(255,255,255,0.2); padding: 5px 10px; border-radius: 4px; text-decoration: none; display: flex; align-items: center; gap: 5px; width: 115px; box-sizing: border-box;">
            <span style="font-size: 14px; line-height: 1;">🤖</span>
            <div style="text-align: left; font-family: sans-serif;">
                <div style="font-size: 6px; color: #ffffff; text-transform: uppercase; white-space: nowrap;">GET IT ON</div>
                <div style="font-size: 9px; color: #ffffff; font-weight: bold; line-height: 1; white-space: nowrap;">Google Play</div>
            </div>
        </a>
        <a href="https://al-hamdoulillah.imperiuminnovations.org/" target="_blank" style="display: inline-block; background-color: #000000; border: 1px solid rgba(255,255,255,0.2); padding: 5px 10px; border-radius: 4px; text-decoration: none; display: flex; align-items: center; gap: 5px; width: 115px; box-sizing: border-box;">
            <span style="font-size: 14px; line-height: 1;">🍏</span>
            <div style="text-align: left; font-family: sans-serif;">
                <div style="font-size: 6px; color: #ffffff; text-transform: uppercase; white-space: nowrap;">Download on the</div>
                <div style="font-size: 9px; color: #ffffff; font-weight: bold; line-height: 1; white-space: nowrap;">App Store</div>
            </div>
        </a>
    </div>
</div>
<!-- END FIGMA MATCHED SIDEBAR BANNER -->

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
        var params = {lat: $VilleLat, lng: $VilleLong, zoom: 5, type: 'm'};
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
if (false) { // WordPress disabled locally - no DB connection available
    require_once( dirname(__FILE__) . '/../blog/wp-load.php' );
}

if (false) {
    
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



if (false) { // disabled locally
    
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
    


if (false) { // disabled locally
    
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