<?php 

/*

Template Name: Programs

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

        	<div class="col-md-8 col-md-offset-2">

            	<div id="wrap">

                	<div>

                        <?php the_content(); ?>

                    </div>

                </div>

                <div id="read-more"></div>

            </div>

        </div>

    </div>

    <?php endwhile; else: ?>

    <?php endif; ?>

    

    <div id="upcomingCourses">

    	<div class="container">

               

                	<ul id="tastingSlider" class="bx-slider visible-lg visible-md">

                    	<?php $otcterm = get_term( '2', 'course-type' ); ?>

                        <li class="block <?php echo $otcterm->slug ?>">

                        	<h3><?php echo $otcterm->name ?></h3>

                            <p><?php echo $otcterm->description ?></p>

                            <p><a href="<?php bloginfo('url'); ?>/course-type/<?php echo $otcterm->slug ?>" class="pillBtn brown">View All</a></p>

                        </li>

                        <?php $otc = new WP_Query( array(

							'post_type' => 'fbs_courses',

							'tax_query' => array(

    								array(

      								'taxonomy' => 'course-type',

      								'field' => 'id',

      								'terms' => 2, // Where term_id of Term 1 is "1".

      								'include_children' => false

    							)

							),

							'posts_per_page' => -1,

						) ); ?>

						<?php if ($otc->have_posts()) : ?>

						<?php while ($otc->have_posts()) : $otc->the_post(); ?>

                        

                        <li class="block <?php echo $otcterm->slug ?>">

                        	<div class="courseThumb">

                            	<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.

									$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID, 'thumbnail'));

									$url = $thumb['0'];

								?>

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

                    

                    <ul id="tastingSliderMobile" class="bx-slider visible-sm visible-xs">

                    	<?php $otctermm = get_term( '2', 'course-type' ); ?>

                        <li class="block <?php echo $otctermm->slug ?>">

                        	<h3><?php echo $otctermm->name ?></h3>

                            <p><?php echo $otctermm->description ?></p>

                            <p><a href="<?php bloginfo('url'); ?>/course-type/<?php echo $otctermm->slug ?>" class="pillBtn brown">View All</a></p>

                        </li>

                        <?php $otcm = new WP_Query( array(

							'post_type' => 'fbs_courses',

							'tax_query' => array(

    								array(

      								'taxonomy' => 'course-type',

      								'field' => 'id',

      								'terms' => 2, // Where term_id of Term 1 is "1".

      								'include_children' => false

    							)

							),

							'posts_per_page' => -1,

						) ); ?>

						<?php if ($otcm->have_posts()) : ?>

						<?php while ($otcm->have_posts()) : $otcm->the_post(); ?>

                        

                        <li class="block <?php echo $otctermm->slug ?>">

                        	<div class="courseThumb">

                            	<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.

									$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID, 'thumbnail'));

									$url = $thumb['0'];

								?>

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

             	

                	<ul  id="innovationSlider" class="bx-slider visible-lg visible-md">

                    	<?php $ieterm = get_term( '3', 'course-type' ); ?>

                        <li class="block <?php echo $ieterm->slug ?>">

                        	<h3><?php echo $ieterm->name ?></h3>

                            <p><?php echo $ieterm->description ?></p>

                            <p><a href="<?php bloginfo('url'); ?>/course-type/<?php echo $ieterm->slug ?>" class="pillBtn brown">View All</a></p>

			    <img src="http://foodbusinessschool.org/wp-content/uploads/2015/02/img_graystone.jpg" class="circlePic">

                        </li>

                        <?php $ie = new WP_Query( array(

							'post_type' => 'fbs_courses',

							'tax_query' => array(

    								array(

      								'taxonomy' => 'course-type',

      								'field' => 'id',

      								'terms' => 3, // Where term_id of Term 1 is "1".

      								'include_children' => false

    							)

							),

							'posts_per_page' => -1,

						) ); ?>

						<?php if ($ie->have_posts()) : ?>

						<?php while ($ie->have_posts()) : $ie->the_post(); ?>

                        

                        <li class="block <?php echo $ieterm->slug ?>">

                        	<div class="courseThumb">

                            	<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.

									$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID, 'thumbnail'));

									$url = $thumb['0'];

								?>

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

                    

                    <ul  id="innovationSliderMobile" class="bx-slider visible-sm visible-xs">

                    	<?php $ietermm = get_term( '3', 'course-type' ); ?>

                        <li class="block <?php echo $ietermm->slug ?>">

                        	<h3><?php echo $ietermm->name ?></h3>

                            <p><?php echo $ietermm->description ?></p>

                            <p><a href="<?php bloginfo('url'); ?>/course-type/<?php echo $ietermm->slug ?>" class="pillBtn brown">View All</a></p>

                        </li>

                        <?php $iem = new WP_Query( array(

							'post_type' => 'fbs_courses',

							'tax_query' => array(

    								array(

      								'taxonomy' => 'course-type',

      								'field' => 'id',

      								'terms' => 3, // Where term_id of Term 1 is "1".

      								'include_children' => false

    							)

							),

							'posts_per_page' => -1,

						) ); ?>

						<?php if ($iem->have_posts()) : ?>

						<?php while ($iem->have_posts()) : $iem->the_post(); ?>

                        

                        <li class="block <?php echo $ietermm->slug ?>">

                        	<div class="courseThumb">

                            	<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.

									$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID, 'thumbnail'));

									$url = $thumb['0'];

								?>

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

                

                    <ul id="degreeSlider" class="bx-slider visible-lg visible-md">

                    	<?php $cgdterm = get_term( '4', 'course-type' ); ?>

                        <li class="block <?php echo $cgdterm->slug ?>">

                        	<h3><?php echo $cgdterm->name ?></h3>

                            <p><?php echo $cgdterm->description ?></p>

                            <p><a href="<?php bloginfo('url'); ?>/course-type/<?php echo $cgdterm->slug ?>" class="pillBtn brown">Learn More</a></p>

                        </li>

			<!-- Show Photo Grid -->

			<li class="block CGD">

                        	<div class="labelHolder"><span class="labelTag">Coming soon!</span></div>

                            <div style="width: 100%; margin: 0; padding: 0; height: 575px; background: url(http://foodbusinessschool.org/wp-content/uploads/2015/02/bg_CGD-comingsoon.jpg) center; background-size: cover;"></div><!--<img src="http://foodbusinessschool.org/wp-content/uploads/2015/02/bg_CGD-comingsoon.jpg">-->

                        </li>



                        <!-- Hide Slides for Launch -->

			<!--<?php $cgd = new WP_Query( array(

							'post_type' => 'fbs_courses',

							'tax_query' => array(

    								array(

      								'taxonomy' => 'course-type',

      								'field' => 'id',

      								'terms' => 4, // Where term_id of Term 1 is "1".

      								'include_children' => false

    							)

							),

							'posts_per_page' => -1,

						) ); ?>

						<?php if ($cgd->have_posts()) : ?>

						<?php while ($cgd->have_posts()) : $cgd->the_post(); ?>

                        

                        <li class="block <?php echo $cgdterm->slug ?>">

                        	<div class="courseThumb">

                            	<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.

									$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID, 'thumbnail'));

									$url = $thumb['0'];

								?>

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

			///  End Hide Slides -->

                	</ul>

                    

                    <ul id="degreeSliderMobile" class="bx-slider visible-sm visible-xs">

                    	<?php $cgdtermm = get_term( '4', 'course-type' ); ?>

                        <li class="block <?php echo $cgdtermm->slug ?>">

                        	<h3><?php echo $cgdtermm->name ?></h3>

                            <p><?php echo $cgdtermm->description ?></p>

                            <p><a href="<?php bloginfo('url'); ?>/course-type/<?php echo $cgdtermm->slug ?>" class="pillBtn brown">Learn More</a></p>

                        </li>

			<!-- Show Photo Grid -->

			<li class="block CGD">

                        	<div class="labelHolder"><span class="labelTag">Coming Fall 2016</span></div>

                            <img src="http://foodbusinessschool.org/wp-content/uploads/2015/02/bg_CGD-comingsoon.jpg">

                        </li>

			<!-- Hide Slides for Launch -->

                        <!--<?php $cgdm = new WP_Query( array(

							'post_type' => 'fbs_courses',

							'tax_query' => array(

    								array(

      								'taxonomy' => 'course-type',

      								'field' => 'id',

      								'terms' => 4, // Where term_id of Term 1 is "1".

      								'include_children' => false

    							)

							),

							'posts_per_page' => -1,

						) ); ?>

						<?php if ($cgdm->have_posts()) : ?>

						<?php while ($cgdm->have_posts()) : $cgdm->the_post(); ?>

                        

                        <li class="block <?php echo $cgdtermm->slug ?>">

                        	<div class="courseThumb">

                            	<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.

									$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID, 'thumbnail'));

									$url = $thumb['0'];

								?>

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

			/// End Hide Slides -->

                	</ul>

                

        </div>

    </div>

    

    

<?php get_footer(); ?>  