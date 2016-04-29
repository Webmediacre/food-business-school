<?php
/**
 * Events List Widget Template
 * This is the template for the output of the events list widget.
 * All the items are turned on and off through the widget admin.
 * There is currently no default styling, which is needed.
 *
 * This view contains the filters required to create an effective events list widget view.
 *
 * You can recreate an ENTIRELY new events list widget view by doing a template override,
 * and placing a list-widget.php file in a tribe-events/widgets/ directory
 * within your theme directory, which will override the /views/widgets/list-widget.php.
 *
 * You can use any or all filters included in this file or create your own filters in
 * your functions.php. In order to modify or extend a single filter, please see our
 * readme on templates hooks and filters (TO-DO)
 *
 * @return string
 *
 * @package TribeEventsCalendar
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

//Check if any posts were found
if ( $posts ) {
	?>

	<ol class="hfeed vcalendar">
		<?php
		foreach ( $posts as $post ) :
			setup_postdata( $post );
			?>
			<li class="tribe-events-list-widget-events <?php tribe_events_event_classes() ?>">

				
				<!-- Event Title -->
				
                <div class="keyDate">
                	<div class="col-md-3 col-sm-2 col-xs-2" style="padding: 0;">
                    	<?php do_action( 'tribe_events_list_widget_before_the_event_title' ); ?>
                        <h4 class="text-left"><?php echo tribe_get_start_date($post, false, $format = 'n/j' ); ?></h4>
                        <?php do_action( 'tribe_events_list_widget_after_the_event_title' ); ?>
                    </div>
					<?php
					$cpi = get_post_meta( $post->ID, '_fbs_attached_course_post_id', true );
					if ( $cpi === '' ) {
						$true_link = tribe_get_event_link();
					} else {
						$true_link = get_post_permalink( $cpi );
					}
					?>
                    <div class="col-md-9 sol-sm-10 col-xs-10">
                    	<p><strong><a href="<?php echo $true_link; ?>" rel="bookmark"><?php the_title(); ?></a></strong></p>
                    </div>
                </div>


			</li>
		<?php
		endforeach;
		?>
	</ol><!-- .hfeed -->

	<p class="tribe-events-widget-link">
		<a href="<?php echo tribe_get_events_link(); ?>" rel="bookmark" class="pillBtn brown"><?php _e( 'View All Events', 'tribe-events-calendar' ); ?></a>
	</p>

	<?php
	//No Events were Found
} else {
	?>
	<p><?php _e( 'There are no upcoming events at this time.', 'tribe-events-calendar' ); ?></p>
<?php
}
?>
