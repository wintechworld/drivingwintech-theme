<?php
/**
 * Template part for displaying single event page.
 *
 * @package total child theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="event-header">
		<div class="header-image">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( 'large' ); ?>
			<?php endif; ?>
		</div>

		<div class="header-content">
			<div class="event-date">
				<p class="date-day"><?php echo date( 'j', strtotime( CFS()->get('date_of_event') ) ); ?></p>
				<p class="date-month"><?php echo date( 'M', strtotime( CFS()->get('date_of_event') ) ); ?></p>
			</div>

			<div class="location-container">
				<i class="fa fa-map-marker" aria-hidden="true"></i>
				<p class="event-location"><?php echo CFS()->get('event_location') ?></p>
			</div>
			<?php the_title( '<h1 class="event-entry-title">', '</h1>' ); ?>
			<div class="event-hours">
				<i class="fa fa-clock-o" aria-hidden="true"></i>
				<p class="event-hours"><?php echo CFS()->get('event_hours') ?></p>
			</div>
			<button class="button-link"><a href="<?php echo CFS()->get( 'picactic_link' ); ?>" target="_blank">Register for this event</a></button>
		</div>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<section class="event-about">
			<div class="about-heading">
				<h2 class="about-title">
					<span>About</span>
					<span>the</span>
					<span>Event</span>
				</h2>
			</div>
			<ul class="event-details">
				<li>
					<h3 class="details-title">What's it about?</h3>
					<p class="details-content"><?php echo CFS()->get('event_details') ?></p>
				</li>
				<li>
					<h3 class="details-title">Is this Event for me?</h3>
					<p  class="details-content"><?php echo CFS()->get('event_target') ?></p>
				</li>
			</ul>
		</section>
		<section class="event-schedule">
			<h2 class="schedule-title">Our Schedule</h2>
			<div class="schedule-slider">
				<div class="control_next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
  			<div class="control_prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
				<ul>
					<?php $schedule_list = CFS()->get('event_schedule'); ?>
					<?php foreach ( $schedule_list as $schedule_item ) : ?>
					<li class="schedule-item">
						<div class="item-container">
							<p><?php echo wp_kses( $schedule_item['schedule_item_name'],array('br')  ); ?></p>
							<p><?php echo wp_kses( $schedule_item['schedule_item_time'],array('br')  ); ?></p>
						</div>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</section>
	</div><!-- .entry-content -->

</article><!-- #post-## -->

