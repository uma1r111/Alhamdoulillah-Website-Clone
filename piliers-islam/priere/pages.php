<?php include("../../inc/share.php")?>

<h3>Dossier sur la prière :</h3>

<ul>
<?php

$a0 = '<li><a href="index.html">La prière en islam</a></li>';
$a1 = '<li><a href="statut.html">La prière est-elle obligatoire ?</a></li>';
$a2 = '<li><a href="temps.html">Les temps des prières</a></li>';
$a3 = '<li><a href="conditions.html">Les conditions de la prière</a></li>';
$a4 = '<li><a href="obligations.html">Les obligations de la prière</a></li>';
$a5 = '<li><a href="recommandations.html">Les recommandations de la prière</a></li>';
$a6 = '<li><a href="deconseille.html">Ce qui est déconseillé pendant la prière</a></li>';
$a7 = '<li><a href="annule.html">Ce qui annule la prière</a></li>';
$a8 = '<li><a href="comment-faire.html">Comment faire la prière ?</a></li>';
$a9 = '<li><a href="tashahhoud.html">Le tashahhoud</a></li>';
$a10 = '<li><a href="ibrahimiya.html">La prière ibrahimiya</a></li>';
$a11 = '<li><a href="rattraper.html">Comment rattraper ses prières ?</a></li>';
$a12 = '<li><a href="mortuaire.html">La prière mortuaire</a></li>';
$a13 = '<li><a href="degres.html">Les degrés d\'accomplissement de la prière</a></li>';

	if (!stristr($a0, $theme)) echo $a0;
	if (!stristr($a1, $theme)) echo $a1;
	if (!stristr($a2, $theme)) echo $a2;
	if (!stristr($a3, $theme)) echo $a3;
	if (!stristr($a4, $theme)) echo $a4;
	if (!stristr($a5, $theme)) echo $a5;
	if (!stristr($a6, $theme)) echo $a6;
	if (!stristr($a7, $theme)) echo $a7;
	if (!stristr($a8, $theme)) echo $a8;
	if (!stristr($a9, $theme)) echo $a9;
	if (!stristr($a10, $theme)) echo $a10;
	if (!stristr($a11, $theme)) echo $a11;
	if (!stristr($a12, $theme)) echo $a12;
	if (!stristr($a13, $theme)) echo $a13;

	?>
</ul>

<h3><u>Articles sur la Prière</u></h3>

<ul>

<?php
	
require_once( '../../blog/wp-load.php' );	
	
	// 1. on défini ce que l'on veut
$liste = array(
    'post_type' => 'post',
    'meta_key'		=> 'tag',
	'meta_value'	=> 'salat',
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