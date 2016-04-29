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
    <?php $terms = wp_get_post_terms( $post->ID, 'course-type' );
	foreach ( $terms as $term ) {
	if ( '3' == $term->term_id ) { $catClass = 'courseCat-IE'; ?>
			
	<div id="quickInfo" class="<?php echo $catClass; ?>">
    	<div class="container">
        	<div class="col-md-12">
            	<span class="courseIcon"></span> <?php echo $term->name ?>
                <?php if(get_field('start_date')) { ?>
		<h3><?php fbsdf(get_field('start_date')); ?> - <?php fbsdf(get_field('end_date')); ?></h3>
		<?php } else { ?><h3>TBD</h3><?php } ?>
                <h3><?php the_field('course_duration'); ?></h3>
                <h3><?php the_field('course_location'); ?></h3>
            </div>
        </div>
    </div>
    
    <div id="intro" class="<?php echo $catClass; ?>">
    	<div class="container">
        	<div class="col-sm-4 col-lg-3 col-lg-offset-2 col-md-3 col-md-offset-1">
            	<img src="<?php bloginfo('template_directory'); ?>/images/img_register-graphic.png">
            </div>
            <div class="col-sm-5 col-lg-3 col-md-4 itineraryLink">
            	<a href="#" class="pillBtn brown expander">Get Full Itinerary</a>
		<a href="<?php bloginfo('url') ?>/contact/" class="pillBtn brown contactForNow">Contact Us</a>
            </div>
            <div class="col-sm-3 col-md-2 registerLink hidden-xs">
            	<?php if(get_field('registration_link')) { ?>
		<a href="<?php the_field('registration_link'); ?>" class="pillBtn orange">Register</a>
		<?php } else { ?>
		<a class="pillBtn disabled">Register</a>
		<?php } ?>
                <p><?php the_field('callout_label'); ?></p>
            </div>
            <div class="row content">
            	<div class="col-md-6 col-md-offset-3">
	            	<form>
                    <h3>Lorem Ipsum Dolor</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do asdlfk.</p>
                    <input type="text" placeholder="Name...">
                    <input type="text" placeholder="Email...">
                    <select id="source">
                    	<option selected="selected" value="I Am...">I Am... <span class="caret"></span></option>
                    	<option value="First Value">First Value</option>
                        <option value="Second Value">Second Value</option>
                        <option value="Third Value">Third Value</option>
                    </select>
                    <input type="submit" value="Downoad Now (PDF)">
                    </form>
            	</div>
            </div>
            <div class="col-md-2 registerLink visible-xs">
            	<?php if(get_field('registration_link')) { ?>
		<a href="<?php the_field('registration_link'); ?>" class="pillBtn orange">Register</a>
		<?php } else { ?>
		<a class="pillBtn disabled">Register</a>
		<?php } ?>
		<p><?php the_field('callout_label'); ?></p>
            </div>
        </div>
    </div>
	<?php } else if ( '2' == $term->term_id) { $catClass = 'courseCat-OTC'; ?>
	<div id="quickInfo" class="<?php echo $catClass; ?>">
    	<div class="container">
        	<div class="col-md-12">
            	<span class="courseIcon"></span> <?php echo $term->name ?>
                <?php if(get_field('start_date')) { ?>
		<h3><?php fbsdf(get_field('start_date')); ?> - <?php fbsdf(get_field('end_date')); ?></h3>
		<?php } else { ?><h3>TBD</h3><?php } ?>
                <h3><?php the_field('course_duration'); ?></h3>
                <h3><?php the_field('course_location'); ?></h3>
            </div>
        </div>
    </div>
    
    <div id="intro" class="<?php echo $catClass; ?>">
    	<div class="container">
        	<div class="col-lg-5 col-lg-offset-1 col-md-6">
            		<h3>Take the course from anywhere</h3>
		</div>
		<div class="col-lg-3 col-md-3">
			<img src="<?php bloginfo('template_directory'); ?>/images/img_devices.png">
		</div>
		<div class="col-lg-2 col-md-3 registerLink">
			<?php if(get_field('registration_link')) { ?><a href="<?php the_field('registration_link'); ?>" class="pillBtn orange">Register</a><?php } else { ?><a class="pillBtn disabled">Register</a><?php } ?>
			<p><?php the_field('callout_label'); ?></p>
                </div>
        </div>
    </div>		 
	
    <?php } else { $catClass = 'courseCat-CGD'; ?> 
	
    Certificates &  Graduate Degrees Content
	
	<?php }
	} ?>
    
    <div id="courseContent">
    	<div class="container">
            <div class="col-md-5 col-sm-6">
                <div class="facultyThumb">
                    <?php the_field('faculty_details_block'); ?>
                </div>
                
                <h3><?php the_field('first_block_title'); ?></h3>
                <?php the_field('first_block_text'); ?>
                
                <h3><?php the_field('second_block_title'); ?></h3>
                <?php the_field('second_block_text'); ?>
            </div>
            <div class="col-md-5 col-md-offset-1 col-sm-6">
            	<h3><?php the_field('third_block_title'); ?></h3>
                <?php the_field('third_block_text'); ?>
                <h3>Best For</h3>
		<?php the_field('fourth_block_text'); ?>
		<br>
                <ul class="catList">
                	<?php $post_terms = get_terms('audience'); // get all terms in taxonomy
					$post_current_terms = wp_get_post_terms( $post->ID, 'audience', array('fields' => 'slugs') ); // get terms current post has 
					foreach( $post_terms as $post_term ) : 
    				$post_term_slug = $post_term->slug;
					$post_term_link = get_field('audience_filter_link', $post_term);
  					?>
                    <li <?php if ( in_array($post_term_slug, $post_current_terms) ) { echo 'class="active"'; } ?>><a href="#" onClick="return false;" class="popover-link" data-toggle="popover" data-placement="bottom" data-content="<?php echo $post_term->description ?><br><br><a href='<?php echo $post_term_link ?>' class='pillBtn brown'>Relevant Courses</a><br>" title="<?php echo $post_term->name; ?>"><?php echo $post_term->name; ?></a></li>
					<?php endforeach; ?>
                </ul>
                <!--<h3><?php the_field('fourth_block_title'); ?></h3>
                <?php the_field('fourth_block_text'); ?>-->
                <?php if(get_field('registration_link')) { ?>
		<p><a href="<?php the_field('registration_link'); ?>" class="pillBtn orange">Register</a></p>
		<?php } else { ?>
		<p><a class="pillBtn disabled">Register</a></p>
		<?php } ?>
            </div>
        </div>
    </div>
    
    <div id="imageBlocks">
	<div id="carousel">
	<?php
	// begin attached image block code
	$im = get_post_meta( get_the_id(), 'image_blocks' );
	if ( !empty( $im ) ) {
		$im = $im[0];
		$ids = array();
		foreach ( $im as $imp ) {
			if ( $imp['checked'] == 'checked' ) $ids[] = $imp['id'];
		}
		if ( !empty( $ids ) ) {
			$ibs = new WP_Query( array( 'post_type' => 'fbs_imageblocks', 'post__in' => $ids ) );
			foreach ( $ibs->posts as $ib ) {
				print '<div>';
				print get_the_post_thumbnail( $ib->ID, 'full' );
				print '<span class="photoOverlay"><div class="overlayContent"><h3>' . $ib->post_title . '</h3>';
				print '<p>' . $ib->post_content . '</p>';
				print '</div></span></div>';
			}
		}
	}
	// end attached image block code
	?>
    	</div>
    </div>
    
    <?php if(get_field('course_quote')) { ?>
    <div id="courseQuote" class="<?php echo $catClass; ?>" style="background-image: url(<?php the_field('course_quote_bg'); ?>);">
    	<div class="container">
        	<div class="col-md-12">
            	<h1><?php the_field('course_quote'); ?></h1>
                <h4>– <?php the_field('course_quote_author'); ?></h4>
            </div>
        </div>
    </div>
    <?php } ?>
    
    <?php if(get_field('video_cover')) { ?>
    <div id="programVid" style="background-image: url(<?php bloginfo('template_directory'); ?>/images/bg_program-vid.jpg);">
    	<div class="container text-center">
        	<div class="col-md-8 col-md-offset-2">
                <div id="pressvideo" style="display: none; width: 100%;"></div>
                <img src="<?php the_field('video_cover'); ?>" id="imageID" width="100%" />
            </div>
        </div>
    </div>
    <script>
    jQuery(function($){
        $('#imageID').click(function(){
    	    $('#pressvideo').show();
    	    $('#pressvideo').html('<?php the_field('video_embed'); ?>');
   	    $('#imageID').hide();
    	});
    });
    </script>
    <?php } ?>

    
    
    <div id="facultyBlock">
    	<div class="container">
        	<?php
			// begin attached faculty member code
			$fm = get_post_meta( get_the_id(), 'attached_faculty' );
			if ( !empty( $fm ) ) {
				$fm = $fm[0];
				$ids = array();
				foreach ( $fm as $fmp ) {
					if ( $fmp['checked'] == 'checked' ) $ids[] = $fmp['id'];
				}
				if ( !empty( $ids ) ) { ?>
            <ul id="facultySlider"class="bx-slider visible-lg visible-md">
                	<?php 
					
						$fac = new WP_Query( array( 'post_type' => 'fbs_faculty', 'post__in' => $ids ) );
						foreach ( $fac->posts as $facm ) { ?>
                <li class="facultyItem">
                	<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($facm->ID), 'sm-circle' );
						$furl = $thumb['0'];
					?>
                    <div class="facultyPic"><a href="<?php echo get_permalink($facm->ID); ?>"><img src="<?php echo $furl ?>"></a></div>
                    
                    <h2><a href="<?php echo get_permalink($facm->ID); ?>"><?php echo $facm->post_title ?></a></h2>
                    <p class="facultyCat"><?php the_terms( $facm->ID, 'role' ); ?></p>
                    <p class="bioClip"><?php echo get_post_meta($facm->ID,'short_bio', true); ?></p>
                </li>
                <?php } ?>
            </ul>
			<?php } else { }
			}// end attached faculty member code  ?>
            <?php
			// begin attached faculty member code
			$fm = get_post_meta( get_the_id(), 'attached_faculty' );
			if ( !empty( $fm ) ) { 
				$fm = $fm[0];
				$ids = array();
				foreach ( $fm as $fmp ) {
					if ( $fmp['checked'] == 'checked' ) $ids[] = $fmp['id'];
				}
				if ( !empty( $ids ) ) {?>
            <ul id="facultySliderMobile" class="bx-slider visible-sm visible-xs">
                <?php
					
						$fac = new WP_Query( array( 'post_type' => 'fbs_faculty', 'post__in' => $ids ) );
						foreach ( $fac->posts as $facm ) { ?>
                <li class="facultyItem">
                	<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($facm->ID), 'sm-circle' );
						$furl = $thumb['0'];
					?>
                    <div class="facultyPic"><img src="<?php echo $furl ?>"></div>
                    
                    <h2><a href="<?php echo $facm->post_permalink ?>"><?php echo $facm->post_title ?></a></h2>
                    <p class="facultyCat"><?php the_terms( $facm->ID, 'role' ); ?></p>
                    <p class="bioClip"><?php echo get_post_meta($facm->ID,'short_bio', true); ?></p>
                </li>
                <?php } ?>
            </ul>
           <?php } else { } 
			} // end attached faculty member code  ?>
        </div>
    </div>
    
    <div id="desiredOutcome">
    	<div class="container">
            <h3><?php the_field('desired_outcomes_title'); ?></h3>
            <?php the_field('desired_outcomes_text'); ?>
        </div>
    </div>
    
    <?php $terms = wp_get_post_terms( $post->ID, 'course-type' );
	foreach ( $terms as $term ) {
	if ( '3' == $term->term_id) { $catClass = 'courseCat-IE'; ?>
    
    <div id="introDuplicate" class="<?php echo $catClass; ?>">
    	<div class="container">
        	<div class="col-sm-4 col-lg-3 col-lg-offset-2 col-md-3 col-md-offset-1">
            	<img src="<?php bloginfo('template_directory'); ?>/images/img_register-graphic.png">
            </div>
            <div class="col-sm-5 col-lg-3 col-md-4 itineraryLink">
            	<a href="#" class="pillBtn brown expander">Get Full Itinerary</a>
		<a href="<?php bloginfo('url') ?>/contact/" class="pillBtn brown contactForNow">Contact Us</a>
            </div>
            <div class="col-sm-3 col-md-2 registerLink hidden-xs">
            	<?php if(get_field('registration_link')) { ?>
		<a href="<?php the_field('registration_link'); ?>" class="pillBtn orange">Register</a>
		<?php } else { ?>
		<a class="pillBtn disabled">Register</a>
		<?php } ?>
		<p><?php the_field('callout_label'); ?></p>
            </div>
            <div class="row content">
            	<div class="col-md-6 col-md-offset-3">
	            	<form>
                    <h3>Lorem Ipsum Dolor</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do asdlfk.</p>
                    <input type="text" placeholder="Name...">
                    <input type="text" placeholder="Email...">
                    <select id="source">
                    	<option selected="selected" value="I Am...">I Am... <span class="caret"></span></option>
                    	<option value="First Value">First Value</option>
                        <option value="Second Value">Second Value</option>
                        <option value="Third Value">Third Value</option>
                    </select>
                    <input type="submit" value="Downoad Now (PDF)">
                    </form>
            	</div>
            </div>
            <div class="col-md-2 registerLink visible-xs">
            	<?php if(get_field('registration_link')) { ?>
		<a href="<?php the_field('registration_link'); ?>" class="pillBtn orange">Register</a>
		<?php } else { ?>
		<a class="pillBtn disabled">Register</a>
		<?php } ?>
		<p><?php the_field('callout_label'); ?></p>
            </div>
        </div>
    </div>
	<?php } else if ( '2' == $term->term_id) { $catClass = 'courseCat-OTC'; ?>
    
    <div id="introDuplicate" class="<?php echo $catClass; ?>">
    	<div class="container">
        	<div class="col-lg-5 col-lg-offset-1 col-md-6">
            		<h3>Take the course from anywhere</h3>
		</div>
		<div class="col-lg-3 col-md-3">
			<img src="<?php bloginfo('template_directory'); ?>/images/img_devices.png">
		</div>
		<div class="col-lg-2 col-md-3 registerLink">
			<?php if(get_field('registration_link')) { ?><a href="<?php the_field('registration_link'); ?>" class="pillBtn orange">Register</a><?php } else { ?><a class="pillBtn disabled">Register</a><?php } ?>
			<p><?php the_field('callout_label'); ?></p>
                </div>
        </div>
    </div>		 
	
    <?php } else { $catClass = 'courseCat-CGD'; ?> 
	
    Certificates &  Graduate Degrees Content
	
	<?php }
	} ?>

	<?php endwhile; else: ?>
    <?php endif; ?>
    
<?php get_footer(); ?> 
