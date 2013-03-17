<!-- page template -->

<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */
include_once 'includes.php';
get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('general'); ?>>
							
						<?php the_content(); ?>
						
						<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'boilerplate' ), 'after' => '' ) ); ?>
						
						<?php edit_post_link( __( 'Edit', 'boilerplate' ), '', '' ); ?>
						
			
				
				</article>
<?php endwhile; ?>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
