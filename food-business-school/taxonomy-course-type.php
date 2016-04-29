<?php get_header(); ?>

	<?php $queried_object = get_queried_object(); ?>
    <div class="header visible-md visible-lg" style="background-image: url(<?php the_field('header_image', $queried_object); ?>);">
		<div class="container">
      		<h1><?php the_field('main_headline', $queried_object); ?></h1>
            <span class="courseIcon"></span>
		</div>
    </div>
    <div class="header visible-sm visible-xs" style="background-image: url(<?php the_field('mobile_header_image', $queried_object); ?>);">
		<div class="container">
      		<h1><?php the_field('main_headline', $queried_object); ?></h1>
            <span class="courseIcon"></span>
		</div>
    </div>
    <!-- Need to insert query for category Images -->
    <div id="imageBlocks">
	<div id="carousel">
	<?php
	for ( $i = 1; $i < 6; $i++ ) {
		$ib = get_field( "image_block_$i", $queried_object );
		$ibp = get_the_post_thumbnail( $ib->ID, 'full' );
		print "<div>$ibp<span class=\"photoOverlay\"><div class=\"overlayContent\"><h3>$ib->post_title</h3><p>$ib->post_content</p></div></span></div>";
	}
	?>
    	</div>
    </div>
    
    <div id="intro">
    	<div class="container">
        	<ul id="stepSlider" class="bx-slider visible-lg visible-md">
                <li>
                    <h3><?php the_field('keyword_1', $queried_object); ?></h3>
                    <p><?php the_field('keymessage_1', $queried_object); ?></p>
                </li>
                <li>
                    <h3><?php the_field('keyword_2', $queried_object); ?></h3>
                    <p><?php the_field('keymessage_2', $queried_object); ?></p>
                </li>
                <li>
                    <h3><?php the_field('keyword_3', $queried_object); ?></h3>
                    <p><?php the_field('keymessage_3', $queried_object); ?></p>
                </li>
            </ul>
            <ul id="stepSliderMobile" class="bx-slider visible-sm visible-xs">
                <li>
                    <h3><?php the_field('keyword_1', $queried_object); ?></h3>
                    <p><?php the_field('keymessage_1', $queried_object); ?></p>
                </li>
                <li>
                    <h3><?php the_field('keyword_2', $queried_object); ?></h3>
                    <p><?php the_field('keymessage_2', $queried_object); ?></p>
                </li>
                <li>
                    <h3><?php the_field('keyword_3', $queried_object); ?></h3>
                    <p><?php the_field('keymessage_3', $queried_object); ?></p>
                </li>
            </ul>
            <div class="col-md-10 col-md-offset-1">
            	<div id="wrap">
                	<div>
                        <h4><?php the_field('category_description', $queried_object); ?></h4>
                    </div>
                </div>
                <div id="read-more"></div>
            </div>
        </div>
    </div>
   
    <div id="upcomingCourses">
    	<div class="container">
        	<div id="courseFilter">
				<span>Filter By:</span>
                <div class="btn-group">
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    Audience <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu aud_buttons" role="menu">
					<button class="button is-checked" data-filter="*">All Audiences</button>
                  	<button class="button" data-filter=".emerging-entrepreneurs">Emerging Entrepreneurs</button>
                  	<button class="button" data-filter=".company-intrapreneurs">Company Intrapreneurs</button>
                  	<button class="button" data-filter=".growth-leaders">Growth Leaders</button>
                  	<button class="button" data-filter=".career-explorers">Career Explorers</button>
                  </ul>
                </div>
            </div>
			<h3 id="no_results" style="display: none; text-align: center; padding-left: 24px;s">Sorry, there are currently no courses matching this criterion.</h3>
            <ul id="courseBlocks" class="isotope">
            	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <li class="item block <?php $terms = get_the_terms( $post->ID, array('course-type','audience') );
					if ( $terms && ! is_wp_error( $terms ) ) : 
					$nterm_links = array();
					foreach ( $terms as $term ) {
						$nterm_links[] = $term->slug;
					}
					$nterms = join( " ", $nterm_links ); ?>
                    <?php echo $nterms; ?>
                    <?php endif; ?>">
                	<div class="courseThumb">
                        <?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
						$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID, 'thumbnail'));
						$url = $thumb['0']; ?>
                        <img src="<?php echo $url ?>">
                        <?php } ?>
                        <?php if(get_field('callout_label')) { ?><div class="labelHolder"><span class="labelTag"><?php the_field('callout_label'); ?></span></div><?php } ?>
                        <h4><?php the_field(course_tile_title); ?></h4>
                    	<?php if(get_field('hide_course_link')) { ?>
				<?php } else { ?>
                                <a href="<?php the_permalink(); ?>" class="pillBtn">Course Details</a>
				<?php } ?>
                    </div>
                    <div class="courseCats">
                        <h6>Best For</h6>
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
                    </div>
                    <div class="courseDetails">
                        <h6>Led By</h6>
                        <p><?php the_field('lead_faculty'); ?></p>
                        <h6>When</h6>
                        <?php if(get_field('start_date')) { ?>		
			<p><?php fbsdf(get_field('start_date')); ?> - <?php fbsdf(get_field('end_date')); ?><br>
			<?php } else { ?><p>TBD<br><?php } ?>
                        <?php the_field('course_duration'); ?></p>
                        <h6>Where</h6>
                    	<p><?php the_field('course_location'); ?></p>
                    </div>
                    <div class="colorCat">
                        <p><span class="catIcon"></span><?php $ctypes = wp_get_post_terms( $post->ID, 'course-type' ); foreach( $ctypes as $ctype) : ?><?php echo $ctype->name ?><?php endforeach; ?></p>
                	</div>
                </li>
				<?php endwhile; else: ?>
    			<?php endif; ?>
            </ul>
        </div>
    </div>
    
    
<?php get_footer(); ?>  