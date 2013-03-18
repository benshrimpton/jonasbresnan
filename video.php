<?php
/**
 * Template Name: Video
 *
 * Template for showing BLOG category posts that are using ACF Gallery field.
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

<div class="general">
<?php query_posts('category_name=video&posts_per_page=10'); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			
				<h1><?php the_title(); ?></h1>
				
				<figure class="video">
					<?php the_content(); ?>
				</figure>
				
				<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'boilerplate' ), 'after' => '' ) ); ?>
				
				
				<span class="edit-link"><?php edit_post_link( __( 'Edit', 'boilerplate' ), '', '' ); ?></span>

<?php endwhile; ?>
</div>

<?php get_footer(); ?>