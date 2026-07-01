<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

		
			
					<p style="margin-bottom:-15px;">Ce blog traite de l'actualité de l'islam en France, à l'étranger et à la situation des musulmans de manière générale. Nous ne sommes affiliés à aucun groupe, parti politique ou religieux. Si ce site vous plait ou si vous souhaitez réagir, n'hésitez pas à laisser vos remarques et commentaires en bas de chaque article.</p>
					
					<br>
					
					<?php get_sidebar( 'content-bottom' ); ?>
					
					
					<h2>Blog sur l'islam et les musulmans</h2>
	
	
	
	
		
			<?php			
			
			function wpdocs_custom_excerpt_length( $length ) {
			return 50;
			}
			add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );
			
			
			
			
			// Start the Loop.
			while ( have_posts() ) : the_post();

		$titre = get_the_title();
$linko = get_permalink();
$lien = substr($linko, 31);
$perma = basename(get_permalink());
$nom = substr($perma, 0, -5);
$altag = str_replace("-", " ", $nom);
$fileimage = "/blog/images/small/$nom.webp"; 

echo "<a href=\"$lien\"><img style=\"vertical-align:top; padding-left:15px; padding-top:20px; padding-right: 15px; padding-bottom:0px; width:250px; height:150px; float:left;\" alt=\"$altag\" src=\"$fileimage\" /></a><p style=\"font-size:15pt; font-family:trebuchet ms; margin-bottom:10px;\"><b><u><a href=\"$lien\">$titre</a></u></b></p>";
the_excerpt(); 
			// End the loop.
			endwhile;?>

			<br>
			
			<?php
			
function wpbeginner_numeric_posts_nav() {
 
    global $wp_query;
 
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
 
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    echo '<div class="navigation"><ul>' . "\n";
 
    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link() );
 
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
 
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }
 
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
 
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";
 
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
 
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link() );
 
echo '</ul></div>' . "\n";			}

wpbeginner_numeric_posts_nav();?>

<br>		
		

<?php get_footer(); ?>
