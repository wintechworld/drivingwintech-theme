<?php
/**
 * The template for displaying all single event posts.
 *
 * @package total child theme
 */

get_header(); 
?>

	<div id="primary" class="content-area events-content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'partials/events', 'single' ); ?>

			<?php endwhile; // End of the loop. ?>

			<section class="events-listings">
			<?php
				$args = array(
					'post_type'			 =>'events', 
					'posts_per_page' => 4,
					'order'          => 'ASC',
				);

				$events_query = new WP_Query($args); 
				?>

				<?php while ( $events_query->have_posts() ) : $events_query->the_post(); ?>
				
					<?php
						get_template_part( 'partials/events', 'content' );
					?>

				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>