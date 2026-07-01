  
  <?php 

	$id = get_the_ID();
	$article = substr($id, -1);
	if ($article == 0) $writer = "Samir";
	if ($article == 1) $writer = "Samir";
	if ($article == 2) $writer = "Samir";
	if ($article == 3) $writer = "Samir";
	if ($article == 4) $writer = "Samir";
	if ($article == 5) $writer = "Samir";
	if ($article == 6) $writer = "Samir";
	if ($article == 7) $writer = "Samir";
	if ($article == 8) $writer = "Samir";
	if ($article == 9) $writer = "Samir";



	$meta_value = get_post_meta( $post->ID, 'resume', true ); 
			


  	if ($id > 100) 
		if  (!empty( $meta_value )) 
			echo "<div style=\"font-size:11pt; line-height:190%; font-weight:bold; padding-top:5px; padding-bottom:11px; padding-left:11px; padding-right:11px;\">";
		the_field('resume');
		echo "</div>";
  
	$perma = basename(get_permalink());
	$nom = substr($perma, 0, -5);
	$altag = str_replace("-", " ", $nom);
	$fileimage = "/blog/images/$nom.webp"; 
	echo "<div style=\"text-align:center;\"><img alt=\"$altag\" src=\"/blog/images/$nom.webp\" /></div>";
	
	

	
	if ($id > 100) 
		echo "<div style=\"text-align:left; margin-top:5px; font-size: 7pt; background-color: white; color: #333;\"><span style=\"padding-left:15px;\">Crédit d'image : ";	the_field('credit_image');	echo "</span></div>";
	
	
$mycontent = $post->post_content; // wordpress users only
$word = str_word_count(strip_tags($mycontent));
$m = floor($word / 190);
$s = floor($word % 190 / (190 / 60));
//$est = $m . ' minute' . ($m == 1 ? '' : 's') . ', ' . $s . ' second' . ($s == 1 ? '' : 's');
$est = $m . ' minute' . ($m == 1 ? '' : 's');
if ($id == 2600) $est = "2 minutes";
if ($est == 0) $est = "moins d'une minute";
?>
  

  
  <div style="padding-bottom:30px;"><?php if ($test !== "www.al-hamdoulillah.com/blog/contact") include("../inc/pub-content.php"); ?></div>
	
	
<div style="text-align:left; padding:15px; background-color:lightblue;">Publié le <?php the_date(); ?>, par <?php echo $writer;?> | <?php the_time();?></div>

<div style="text-align:right; padding: 15px; color:grey;">Temps de lecture : <?php echo $est; ?></div>



	
	
		<?php
			the_content();
		?>
	
		
	<div style="padding-bottom:5px; background-color:lightblue;"></div>
	

		<?php twentysixteen_entry_meta(); ?>