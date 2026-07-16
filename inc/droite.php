<?php
if (!isset($test)) $test = $_SERVER['REQUEST_URI'];

$lang = 'fr';
if (strstr($test, '/en/')) $lang = 'en';
if (strstr($test, '/ar/')) $lang = 'ar';

$banner_translations_droite = [
    'fr' => [
        'sidebar_headline' => 'La Foi à Portée de Main',
        'sidebar_subtext'  => 'Lisez le Coran, explorez les Hadiths authentiques, faites votre dhikr et renforcez votre adoration quotidienne.',
        'btn_secondary'    => 'En savoir plus',
    ],
    'en' => [
        'sidebar_headline' => 'Faith at Your Fingertips',
        'sidebar_subtext'  => 'Read the Quran, explore authentic Hadith, make dhikr, and strengthen your daily worship with one beautifully designed app.',
        'btn_secondary'    => 'Learn More',
    ],
    'ar' => [
        'sidebar_headline' => 'الإيمان في متناول يدك',
        'sidebar_subtext'  => 'اقرأ القرآن واستكشف الأحاديث الصحيحة واذكر الله وعزز عبادتك اليومية.',
        'btn_secondary'    => 'اعرف المزيد',
    ],
];
$td = $banner_translations_droite[$lang];
?>
<div class="migration-sidebar-banner" style="width: 100%; max-width: 340px; min-height: 480px; border-radius: 16px; box-sizing: border-box; padding: 35px 20px 0 20px; text-align: center; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; margin-bottom: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.2); position: relative; overflow: hidden; background-image: url('/images/banners/rightside/Background_Design.png'), url('/images/banners/rightside/Purple_Gradient.png'); background-repeat: no-repeat, no-repeat; background-position: center center, center center; background-size: cover, cover; display: flex; flex-direction: column; align-items: center; justify-content: space-between;">
    
    <div style="width: 100%; z-index: 3; position: relative; display: flex; flex-direction: column; align-items: center; text-align: center;">
        
        <h3 style="margin: 0 0 12px 0; padding: 0; font-size: 24px; color: #ffffff; font-weight: 700; letter-spacing: -0.5px; line-height: 1.2; text-align: center; width: 100%; display: block;">
            <?= $td['sidebar_headline'] ?>
        </h3>
        
        <p style="margin: 0 0 20px 0; padding: 0 5px; font-size: 12.5px; color: rgba(255, 255, 255, 0.85); line-height: 1.5; font-weight: 400; text-align: center; width: 100%; display: block;">
            <?= $td['sidebar_subtext'] ?>
        </p>

        <a href="<?= URL_LEARN_MORE ?>" target="_blank" style="display: inline-block; background-color: #ffffff; color: #2e0f6c; font-size: 13.5px; font-weight: 600; padding: 10px 24px; border-radius: 8px; text-decoration: none; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); text-align: center; transition: background-color 0.2s, transform 0.2s; border: 1px solid rgba(255,255,255,0.1);" onmouseover="this.style.backgroundColor='#f8f9fa'; this.style.transform='translateY(-1px)';" onmouseout="this.style.backgroundColor='#ffffff'; this.style.transform='translateY(0)';">
            <?= $td['btn_secondary'] ?>
        </a>
    </div>

    <div style="width: 100%; display: flex; justify-content: center; align-items: flex-end; position: relative; z-index: 1; margin-top: 15px; height: 250px; overflow: hidden; pointer-events: none;">
        <img src="/images/banners/rightside/Iphones.png" alt="App Preview Interface Mockups" style="width: 105%; max-width: 290px; height: auto; display: block; vertical-align: bottom; margin-bottom: 0;">
    </div>

</div>

<center>
<div style="border-bottom:1px solid gray; margin-bottom:15px;  padding:5px; background-color:white; text-align:center; border-radius:3px;">         
        <?php 
            
            include_once __DIR__ . '/hijri.php';
            
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