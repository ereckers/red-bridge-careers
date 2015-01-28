<?php
/*
 * Shortcode: list-careers
 * Usage: [list-careers]
 * Options: type=""
 * Description: Shortcode to list Careers as loop.
 * @type post
 */
add_shortcode( 'list-careers', 'list_careers' );
function list_careers( $atts = '' ) {

	$args = array(
		'numberposts' => -1,
		'post_type' => 'rb415_careers'
	);
	$careers = get_posts( $args );

    // turn on output buffering to capture script output
    ob_start();

	if ( $careers ) {
		echo '<ul id="careers-listings">';
		foreach ( $careers as $career ) {
			//setup_postdata( $career );
			echo "<li>";
			echo '<a href="' . get_permalink( $career->ID ) . '">';
			echo $career->post_title;
			echo '</a>';
			echo "</li>";
			// include the specified file
			//get_template_part( "template-parts/shortcode", "list-careers" );
		}
		echo '</ul>';
		//wp_reset_postdata();
		wp_reset_query();
	}

    // assign the file output to $content variable and clean buffer
    $content = ob_get_clean();

    // return the $content
    // return is important for the output to appear at the correct position
    // in the content
    return $content;

}

?>
