<?php include("../../inc/share.php")?>

<h3><u>Dossier sur le jeûne et le Ramadan</u></h3>

<ul>
<?php

$o1 = '<li><a href="/piliers-islam/ramadan/jeune.html">Le jeûne en islam</a></li>';
$o1 = '<li><a href="/horaires-prieres/ramadan/">Horaires du Ramadan</a></li>';

	if (!stristr($o1, $theme)) echo $o1;

	?>
</ul>


<p><b>L'avant Ramadan</b></p>

<ul>
<?php

$a4 = '<li><a href="/piliers-islam/ramadan/mois-shaabane.html">Le mois de Shaabane</a></li>';
$a0 = '<li><a href="/piliers-islam/ramadan/jeune-shaabane.html">Jeûner les 15 derniers jours de Shaabane</a></li>';
$a1 = '<li><a href="/piliers-islam/ramadan/jeune-avant.html">Jeûner juste avant le début du Ramadan</a></li>';
$a2 = '<li><a href="/piliers-islam/ramadan/qui-suivre.html">Qui suivre pour le début du Ramadan</a></li>';
$a3 = '<li><a href="/piliers-islam/ramadan/nouvelle-lune.html">Nouvelle lune et Ramadan</a></li>';

	if (!stristr($a4, $theme)) echo $a4;
	if (!stristr($a0, $theme)) echo $a0;
	if (!stristr($a1, $theme)) echo $a1;
	if (!stristr($a2, $theme)) echo $a2;
	if (!stristr($a3, $theme)) echo $a3;


	?>
</ul>


<p><b>Introduction au Ramadan</b></p>

<ul>
<?php

$b0 = '<li><a href="/piliers-islam/ramadan/arrivee.html">L\'arrivée du mois de Ramadan</a></li>';
$b1 = '<li><a href="/piliers-islam/ramadan/accueillir.html">Accueillir le mois de Ramadan</a></li>';
$b2 = '<li><a href="/piliers-islam/ramadan/objectifs.html">Les objectifs du mois de Ramadan</a></li>';

	if (!stristr($b0, $theme)) echo $b0;
	if (!stristr($b1, $theme)) echo $b1;
	if (!stristr($b2, $theme)) echo $b2;

	?>
</ul>

<p><b>L'importance du mois de Ramadan</b></p>

<ul>
<?php

$c0 = '<li><a href="/piliers-islam/ramadan/mois-coran.html">Le mois du Coran</a></li>';
$c1 = '<li><a href="/piliers-islam/ramadan/10-dernieres-nuits.html">Le 10 dernières nuits du Ramadan</a></li>';
	
	if (!stristr($c0, $theme)) echo $c0;
	if (!stristr($c1, $theme)) echo $c1;

	?>
</ul>


<p><b>Questions sur le Ramadan</b></p>

<ul>

<?php
	
require_once( '../../blog/wp-load.php' );	
	
	// 1. on défini ce que l'on veut
$liste = array(
    'post_type' => 'post',
    'meta_key'		=> 'tag',
	'meta_value'	=> 'ramadan-questions',
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

<p><b>Conseils pour le Ramadan</b></p>

<ul>

<?php
	
	// 1. on défini ce que l'on veut
$liste2 = array(
    'post_type' => 'post',
    'meta_key'		=> 'tag',
	'meta_value'	=> 'ramadan',
	'nopaging' => true
);

// 2. on exécute la query
$my_query2 = new WP_Query($liste2);

// 3. on lance la boucle !
if ($my_query2->have_posts()) : while ($my_query2->have_posts() ) : $my_query2->the_post();
    
    echo "<li><a href=";	the_permalink();	echo ">"; 
	the_title();
	echo "</a></li>";
    
endwhile;
endif;

// 4. On réinitialise à la requête principale (important)
wp_reset_postdata();
	
	?>

</ul>

<!--
<ul>
<li>Le Ramadan est un mois de générosité</li>
<li>Le Ramadan est une occasion à ne pas manquer</li>
<li>Le Ramadan est un mois de lutte et d'efforts</li>
<li>Les nuits du Ramadan sont bénies</li>
<li>Les prières noctures pendant le Ramadan</li>
<li>Les secrets du jeûne du Ramadan</li>
<li>Comment profiter du mois de Ramadan</li>
<li>Les invocations du mois de Ramadan</li>
<li>L'école du mois de Ramadan</li>
<li>Les enseignements du mois de Ramadan</li>
<li>Ramadan : les perdants et les gagnants</li>
<li>Conseils pour le mois de Ramadan</li>
</ul>
<p><b>Les 10 derniers jours du Ramadan</b></p>
<ul>
<li>L'importance des 10 derniers jours du Ramadan</li>
<li>Multiplier ses efforts les 10 derniers jours du Ramadan</li>
<li>La nuit du destin - Laylatoul Qadr</li>
<li>Ramadan : I'tikaf - la retraite spirituelle</li>
</ul>
<p><b>Ramadan &amp; Zakat al Fitr</b></p>
<ul>
<li>Zakat al Fitr</li>
<li>Questions sur la Zakat al Fitr</li>
<li>Ramadan : I'tikaf - la retraite spirituelle</li>
</ul>
<p><b>L'après Ramadan...</b></p>
<ul>
<li>La fête de l'Aid</li>
<li>Après le mois de Ramadan</li>
<li>Le jeûne du mois de Chawal</li>
</ul>
<p><b>Ramadan &amp; Jurisprudence</b></p>
<ul>
<li>L'intention de jeûner le mois du Ramadan</li>
<li>Ce qui est permis durant le Ramadan</li>
<li>Recommandations au sujet du jeûne</li>
<li>70 points importants concernant le Ramadan</li>
<li>Trop manger pendant le Ramadan</li>
</ul>
<p><b>Questions autour du Ramadan</b></p>
<ul>
<li>Comment formuler l'intention de jeûner</li>
<li>Manger à la maison ou à la mosquée</li>
<li>Dormir toute la journée</li>
<li>Priviléger la lecture du Coran ou les prières</li>
<li>Mentir en état de jeûne</li>
<li>Goûter les plats</li>
<li>Rattraper ses jours</li>
<li>Le statut du voyageur</li>
<li>Les excuses pour ne pas jeûner</li>
<li>Les médicaments autorisés</li>
<li>Le point sur les asthmatiques</li>
<li>Le point sur les diabétiques</li>
</ul>
!-->