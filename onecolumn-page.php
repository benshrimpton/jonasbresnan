<?php
/**
 * Template Name: One column, no sidebar
 *
 * A custom page template without sidebar.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */
include_once 'includes.php';
get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<article class="genral">
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'boilerplate' ), 'after' => '' ) ); ?>
				<?php edit_post_link( __( 'Edit', 'boilerplate' ), '', '' ); ?>

				<?php //comments_template( '', true ); ?>
				</article>	
<?php endwhile; ?>

<?php get_footer(); ?>