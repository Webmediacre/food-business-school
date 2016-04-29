<?php 
/*
Template Name: Attend
*/
?>

<?php get_header(); ?>


    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="header visible-lg visible-md" style="background-image: url(<?php the_field('header_image'); ?>);">
		<div class="container">
      		<h1><?php the_field('main_headline'); ?></h1>
            <?php if(get_field('photo_label')) { ?>
            <span class="photoLabel"><?php the_field('photo_label'); ?></span>
			<?php } ?>
		</div>
    </div>
    <div class="header visible-sm visible-xs" style="background-image: url(<?php the_field('mobile_header_image'); ?>)">

		<div class="container">

      		<h1><?php the_field('main_headline'); ?></h1>
		<?php if(get_field('photo_label')) { ?>
            <span class="photoLabel"><?php the_field('photo_label'); ?></span>
			<?php } ?>
		</div>

    </div>
    
    <div id="intro">
    	<div class="container">
        	<div class="col-md-10 col-md-offset-1">
            	<div id="wrap">
                	<div>
                        <?php the_content(); ?>
                    </div>
                </div>
                <div id="read-more"></div>
            </div>
        </div>
    </div>
    
    <div id="attendBlock">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-12">
                	<h3><?php the_field('register_row_title'); ?></h3>
                </div>
            </div>
            <div class="row" id="registerRow">
            	<div class="col-md-2 col-sm-3 text-center">
                	<img src="<?php the_field('otc_tile_image'); ?>">
                    <p><a href="<?php bloginfo('url'); ?>/course-type/online-tasting-course/" class="pillBtn orange">Register</a></p>
                </div>
                <div class="col-md-4 col-sm-9">
                	<h5><?php the_field('otc_courses_title'); ?></h5>
                    <p><?php the_field('otc_description'); ?></p>
                </div>
                <div class="col-md-2 col-sm-3 text-center">
                	<img src="<?php the_field('ie_tile_image'); ?>">
                    <p><a href="<?php bloginfo('url'); ?>/course-type/innovation-escape/" class="pillBtn orange">Register</a></p>
                </div>
                <div class="col-md-4 col-sm-9">
                	<h5><?php the_field('ie_courses_title'); ?></h5>
                    <p><?php the_field('ie_description'); ?></p>
                </div>
            </div>
            
            <div class="row">
            	<div class="col-md-7">
                	<h3><?php the_field('tuition_fees_title'); ?></h3>
                    <p><?php the_field('tuition_fees_details'); ?></p>
					<h3><?php the_field('questions_title'); ?></h3>
                    <p><?php the_field('questions_details'); ?></p>
                    <p><a href="<?php bloginfo('url'); ?>/contact-us/" class="pillBtn orange">Contact Us</a><a href="<?php bloginfo('url'); ?>/faq/" class="pillBtn orange">FAQs</a></p>
                </div>
                <div class="col-md-4 col-md-offset-1">
                	<h3><?php the_field('key_dates_title'); ?></h3>
                    <?php the_field('key_dates_details'); ?>
                    <h3><?php the_field('upcoming_events_title'); ?></h3>
                    <p><?php the_field('upcoming_events_details'); ?></p>
                    <p><a href="<?php bloginfo('url'); ?>/events/" class="pillBtn brown">View Events</a></p>
                </div>
            </div>
        </div>
    </div>
    <?php endwhile; else: ?>
    <?php endif; ?>
    
<?php get_footer(); ?> 