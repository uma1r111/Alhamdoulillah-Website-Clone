<h3>Dossier sur le pelerinage :</h3>

<ul>
<?php

$a0 = '<li><a href="/piliers-islam/pelerinage/index.html">Le pelerinage en islam : al Hajj</a></li>';
$a1 = '<li><a href="/piliers-islam/pelerinage/comment-faire.html">Comment faire le Hajj ?</a></li>';
$a2 = '<li><a href="/piliers-islam/pelerinage/piliers-obligations.html">Les piliers et les obligations du Hajj</a></li>';
$a3 = '<li><a href="/piliers-islam/pelerinage/ihram.html">L\'état de sacralisation : al ihram</a></li>';

	if (!stristr($a0, $theme)) echo $a0;
	if (!stristr($a1, $theme)) echo $a1;
	if (!stristr($a2, $theme)) echo $a2;
	if (!stristr($a3, $theme)) echo $a3;
	
	

	?>
</ul>



<ul>

<?php
	
require_once( '../../blog/wp-load.php' );	
	
	// 1. on défini ce que l'on veut
$liste = array(
    'post_type' => 'post',
    'meta_key'		=> 'tag',
	'meta_value'	=> 'hadj',
	'nopaging' => true
);

// 2. on exécute la query
$my_query = new WP_Query($liste);

// 3. on lance la boucle !
if ($my_query->have_posts()) : while ($my_query->have_posts() ) : $my_query->the_post();
    
    echo "<li><a href=";	the_permalink();	echo ">"; 
	the_title();
	echo "</a></li>";
    
endwhile;
endif;

// 4. On réinitialise à la requête principale (important)
wp_reset_postdata();
	
	?>

</ul>