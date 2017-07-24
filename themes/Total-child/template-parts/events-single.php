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
				<p><?php echo date( 'j', strtotime( CFS()->get('my_date') ) ); ?></p>
				<p><?php echo date( 'M', strtotime( CFS()->get('my_date') ) ); ?></p>
			</div>

			<div>
				<i class="fa fa-map-marker" aria-hidden="true"></i>
				<p class="event-location"><?php echo CFS()->get('event_location') ?></p>
			</div>
			<?php the_title( '<h1 class="event-entry-title">', '</h1>' ); ?>
			<div class="event-hours">
				<i class="fa fa-clock-o" aria-hidden="true"></i>
				<p class="event-hours"><?php echo CFS()->get('event_hours') ?></p>
			</div>
			<a class="picatic-link" href="<?php echo CFS()->get( 'picactic_link' ); ?>" target="_blank"><p class="link-text">Register for this event</p></a>
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
			<ul class="schedule-container">
				<?php $schedule_list = CFS()->get('event_schedule'); ?>
				<?php foreach ( $schedule_list as $schedule_item ) : ?>
				<li class="schedule-item">
					<p><?php echo wp_kses( $schedule_item['schedule_item_name'],array('br')  ); ?></p>
					<p><?php echo wp_kses( $schedule_item['schedule_item_time'],array('br')  ); ?></p>
				</li>
				<?php endforeach; ?>
			</ul>
		</section>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html( 'Pages:' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->

