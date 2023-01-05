<?php
/**
 * The Template for displaying all single posts.
 *
 * @package basic_name
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php the_content(); ?>

<?php endwhile; ?>

<?php get_footer(); ?>
