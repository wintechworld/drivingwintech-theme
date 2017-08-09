<?php
/**
 * The template for displaying content.
 *
 * @package total child theme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="event-listing">
		<div class="event-date">
			<p class="date-day"><?php echo date( 'j', strtotime( CFS()->get('date_of_event') ) ); ?></p>
			<p class="date-month"><?php echo date( 'M', strtotime( CFS()->get('date_of_event') ) ); ?></p>
		</div>
		<div class="event-image">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( 'large' ); ?>
			<?php endif; ?>
		</div>
		<div class="event-gradient"></div>
		<div class="event-details">
			<div class="location-container">
				<i class="fa fa-map-marker" aria-hidden="true"></i>
				<p class="event-location"><?php echo CFS()->get('event_location') ?></p>
			</div>
			<?php the_title( sprintf( '<h2 class="event-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			<div class="event-hours">
				<i class="fa fa-clock-o" aria-hidden="true"></i>
				<p><?php echo CFS()->get('event_hours') ?></p>
			</div>
		</div>
	</header><!-- .entry-header -->
	
	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
