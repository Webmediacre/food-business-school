<?php 
/*
Template Name: Upcoming Courses
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
    <?php endwhile; else: ?>
    <?php endif; ?>
    <div id="upcomingCourses">
    	<div class="container">
        	<div id="courseFilter">
				<span>Filter By:</span>
                <div class="btn-group type">
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" data-original="Course Format <span class=&#x22;caret&#x22;></span>" aria-expanded="false">
                   Course Format <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu type_buttons" role="menu">
					<button class="button is-checked" data-filter="*" data-pos="width:30px; background-position:0 -150px; margin-right:0;">All Courses<span class="courseIcon"></span></button>
                  	<button class="button" data-filter=".online-course" data-pos="width:42px; background-position:-251px -150px; margin-right:-8px;">Online Courses<span class="courseIcon"></span></button>
                  	<button class="button" data-filter=".innovation-intensive" data-pos="width:32px; background-position:-576px -150px; margin-right:-3px;">Innovation Intensives<span class="courseIcon"></span></button>
                  	<button class="button" data-filter=".venture-program" data-pos="width:37px; height:40px; background-position:-855px -150px; margin-right:-6px;">Venture Program<span class="courseIcon"></span></button>
                  </ul>
                </div>
                
                <div class="btn-group">
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" data-original="Audience <span class=&#x22;caret&#x22;></span>" aria-expanded="false">
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
			<h3 id="no_results" style="display: none; text-align: center; padding-left: 24px;s">Sorry, there are currently no courses matching these criteria.</h3>
            <ul id="courseBlocks" class="isotope">
            	
                <?php $allcourses = new WP_Query( array(
					'post_type' => 'fbs_courses',
					'posts_per_page' => -1,
					) ); ?>
				<?php if ($allcourses->have_posts()) : ?>
				<?php while ($allcourses->have_posts()) : $allcourses->the_post(); ?>
                
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
                <?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
                <?php else: ?>
                <?php endif; ?>
            </ul>
	    
        </div>
    </div>
    
    
<?php get_footer(); ?>  