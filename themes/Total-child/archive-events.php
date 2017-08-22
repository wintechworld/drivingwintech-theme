<?php
/**
 * The template for displaying event archive page.
 *
 * @package total child theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="events-page-header">
				<?php
					the_archive_title( '<h1 class="events-page-title">', '</h1>' );
				?>
				<div class="featured-event">
					<h2 class="featured-heading">Featured Event of the Month</h2>

					<?php
						$args = array(
							'post_type'=>'events', 
							'orderby'=>'rand', 
							'posts_per_page'=>'1'
						);
						$featured = new WP_Query($args);

						while ($featured->have_posts()) : $featured->the_post(); 
					?>
							<h2 class="featured-event-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
							<p class="featured-event-location"><?php echo CFS()->get('event_location') ?></p>
							<button class="button-link"><a href="<?php echo CFS()->get( 'picactic_link' ); ?>" target="_blank">Register</a></button>
					<?php 
						endwhile;
						wp_reset_postdata();
					?>

				</div>
			</header><!-- .page-header -->

			<section class="dropdown-menus">
				<div class="location-dropdown-container">
					<form method="post" class="location-category">
						<i class="fa fa-map-marker" aria-hidden="true"></i> 
						<?php 
							events_custom_taxonomy_dropdown('location', 'ASC', '6', 'location', 'Select All');
						?> 
					</form>
				</div>
			</section>

			<section class="events-listings">
				<?php
					$args = array(
						'post_type'      => 'events', 
						'posts_per_page' => -1,
						'order'          => 'ASC',
					);

					if ( ! empty( $_POST['location'] ) ) {
						$args['tax_query'] = array(
							array(
									'taxonomy' => 'location',
									'field'    => 'slug',
									'terms'    => $_POST['location']
							)
						);
					}

					$events_query = new WP_Query( $args );
				?>

				<?php while ( $events_query->have_posts() ) : $events_query->the_post(); ?>

					<?php
						get_template_part( 'partials/events', 'content' );
					?>

				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
				<?php the_posts_navigation(); ?>

			<?php else : ?>

				<?php get_template_part( 'partials/content', 'none' ); ?>

			<?php endif; ?>
			</section>

			<section class="contact-section">
				<h2>Do you want to see us in your city?</h2>
				<p>WinTech is embarking on a journey to put together an extensive report on the current state of Women in Tech across Canada.</p>
				<button class="button-link"><a href="https://drivingwomenintech.com/contact/">Get in touch</a></button>
			</section>

			<section class="sponsorship-section">
				<div>
					<p class="sponsorship-thanks">Thank you to all of our sponsors!</p>
					<h2>Become a sponsor</h2>
					<p>A Canada-wide fact-finding mission to understand and record the experiences of women in technology.</p>
					<button class="button-link"><a href="https://www.kickstarter.com/projects/1636434444/driving-wintech-a-road-trip-to-connect-women-in-te">Our Sponsors</a></button>
				</div>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
