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
					<h2>Featured Event of the Month</h2>
					<button class="button-link">Register</button>
				</div>
			</header><!-- .page-header -->

			<section class="dropdown-menus">
				<div class="location-dropdown-container">
					<form id="location-category-select" class="location-category-select" method="get">
						<i class="fa fa-map-marker" aria-hidden="true"></i> 
						<?php
							// Create and display the dropdown menu.
							wp_dropdown_categories(
								array(
									'orderby'         => 'NAME',
									'taxonomy'        => 'location',
									'name'            => 'location',
									'show_option_all' => 'Search by city',
									'selected'        => get_selected_location_dropdown_term(),
								) );
						?>
						<button type="submit" class="search-button"><i class="fa fa-caret-down" aria-hidden="true"></i></button>
					</form>
				</div>
			</section>

			<section class="events-listings">
				<?php $locations_in_taxonomy_term = get_locations_in_taxonomy_term(); ?>

				<!-- If posts were found, -->
				<?php if ( $locations_in_taxonomy_term->have_posts() ) : ?>

				<!-- Loop through every post. -->
				<?php while ( $locations_in_taxonomy_term->have_posts() ) : $locations_in_taxonomy_term->the_post(); ?>

				<?php
					get_template_part( 'template-parts/events', 'content' );
				?>

				<?php endwhile; ?>

				<?php the_posts_navigation(); ?>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>
			</section>

			<section class="contact-section">
				<h2>Do you want to see us in your city?</h2>
				<p>WinTech is embarking on a journey to put together an extensive report on the current state of Women in Tech across Canada.</p>
				<button class="button-link">Get in touch</button>
			</section>

			<section class="sponsorship-section">
				<div>
					<p class="sponsorship-thanks">Thank you to our 87 backers!</p>
					<h2>Become a sponsor</h2>
					<p>Our WinTech campaign was successfully funded through Kickstarter. We exceeded our Kickstart goal of 107%!</p>
					<button class="button-link"><a href="https://www.kickstarter.com/projects/1636434444/driving-wintech-a-road-trip-to-connect-women-in-te">Our Kickstarter</a></button>
				</div>
			</section>
		<?php endif; ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
