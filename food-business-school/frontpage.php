<?php 

/*

Template Name: Homepage

*/

?>



<?php get_header(); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div class="header visible-md visible-lg" style="background-image: url(<?php the_field('header_image'); ?>)">

		<div class="container">

      		<h1><?php the_field('main_headline'); ?></h1>
		<?php if(get_field('video_link')) { ?>
            <p><a class="pillBtnLg"><?php the_field('video_button_text'); ?></a></p>
		<?php } ?>
		</div>

    </div>
    <div class="header visible-sm visible-xs" style="background-image: url(<?php the_field('mobile_header_image'); ?>)">

		<div class="container">

      		<h1><?php the_field('main_headline'); ?></h1>
		<?php if(get_field('video_link')) { ?>
            <p><a id="link" class="pillBtnLg"><?php the_field('video_button_text'); ?></a></p>
		<?php } ?>
		</div>

    </div>

<?php
preg_match( '~(?<=be/|v=).+~', get_field('video_link'), $matches );
if ( $GLOBALS['is_IE'] ) :
?>
<script>
var ieplayer;
function autoStartPlayer(e){
	if(e==-1 && screen.width >= 1200){
		ieplayer.playVideo();
	}
	if(screen.width >= 1200){
		jQuery('#myModal').bind('show.bs.modal', function(){
			ieplayer.playVideo();
		});
	}
}
function onYouTubePlayerReady(apiid){
	ieplayer = document.querySelector('#ieplayer');
	ieplayer.addEventListener('onStateChange', 'autoStartPlayer');
}
jQuery(function($){
	$('.header .pillBtnLg').each(function(){
		$(this).click(function(){
			$('#myModal').modal();
			swfobject.embedSWF(
				'http://www.youtube.com/v/<?php print $matches[0]; ?>?enablejsapi=1&playerapiid=ytplayer&version=3',
				'player',
				'870',
				'489',
				'8',
				null,
				null,
				{ allowScriptAccess: 'always' },
				{ id: 'ieplayer' }
			);
		});
	});
	$('#myModal').bind('hidden.bs.modal', function(){
		ieplayer.pauseVideo();
	});
});
</script>
<?php elseif ( $GLOBALS['is_gecko'] ) : ?>
<script>
var tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

function onPlayerReady(e){
	jQuery('#myModal').bind('hidden.bs.modal', function(){
		e.target.pauseVideo();
	});
	if(screen.width >= 1200){
		jQuery('#myModal').bind('show.bs.modal', function(){
			e.target.playVideo();
		});
	}
}

var player;
function onYouTubeIframeAPIReady(){
	player = new YT.Player('player', {
		height: '489',
		width: '870',
		videoId: '<?php print $matches[0]; ?>',
		events: { 'onReady': onPlayerReady }
	});
}
jQuery(function($){
	$('.header .pillBtnLg').each(function(){
		$(this).click(function(){
			$('#myModal').modal();
		});
	});
});
</script>
<?php else : ?>
<script>
var tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var player;
function onYouTubeIframeAPIReady(){
	player = new YT.Player('player', {
		height: '489',
		width: '870',
		videoId: '<?php print $matches[0]; ?>'
	});
}
jQuery(function($){
	$('.header .pillBtnLg').each(function(){
		$(this).click(function(){
			$('#myModal').modal();
		});
	});
	$('#myModal').bind('hidden.bs.modal', function(){
		player.pauseVideo();
	});
	if(screen.width >= 1200){
		$('#myModal').bind('show.bs.modal', function(){
			player.playVideo();
		});
	}
});
</script>
<?php endif; ?>

    <div id="intro">

    	<div class="container">

        	<?php the_content(); ?>

        </div>

    </div>

    

    <div id="upcomingCourses" class="visible-lg visible-md">

    	<div class="container">

            <h1><?php the_field('course_block_title'); ?></h1>

            <div id="courseNav">

                <a data-slide-index="0" href="#"><h2>All Programs</h2></a>

                <a data-slide-index="1" href="#"><h2>Online Courses</h2></a>

                <a data-slide-index="2" href="#"><h2>Innovation Intensives</h2></a>

                <a data-slide-index="3" href="#"><h2>Venture Innovation Program</h2></a>

            </div>

			

            <ul id="courseSlider" class="bx-slider">

            	<li> 

                    <ul id="featuredSlider" class="bx-slider">

                    	<?php $featured = new WP_Query( array(

							'post_type' => 'fbs_courses',

							'posts_per_page' => -1,

						) ); ?>

						<?php if ($featured->have_posts()) : ?>

						<?php while ($featured->have_posts()) : $featured->the_post(); ?>

                        

                        <li class="block <?php $terms = get_the_terms( $post->ID, 'course-type' );

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

									$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID, 'course-thumb'));

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

                </li>

                <li>

                	<ul id="tastingSlider" class="bx-slider">

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

									$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID, 'course-thumb'));

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

             	</li>

                <li>

                	<ul  id="innovationSlider" class="bx-slider">

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

									$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID, 'course-thumb'));

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

                </li>

                <li>

                    <ul id="degreeSlider" class="bx-slider">

                    	<?php $cgdterm = get_term( '4', 'course-type' ); ?>

                        <li class="block <?php echo $cgdterm->slug; ?>">

                        	<h3><?php echo $cgdterm->name ?></h3>

                            <p><?php echo $cgdterm->description ?></p>

                            <p><a href="<?php bloginfo('url'); ?>/course-type/<?php echo $cgdterm->slug ?>" class="pillBtn brown">Learn More</a></p>

                        </li>
			<!-- Show Photo Grid -->
			<li class="block CGD">
                        	<div class="labelHolder"><span class="labelTag">Coming Soon!</span></div>
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

                        

                        <li class="block <?php echo $cgdterm->slug; ?>">

                        	<div class="courseThumb">

                            	<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.

									$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID, 'course-thumb'));

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

                </li>

            </ul>

        </div>

    </div>

    

    <!-- Mobile Course Slider -->

    <div id="upcomingCoursesMobile" class="visible-sm visible-xs">

    	<div class="container">

            <h1><?php the_field('course_block_title'); ?></h1>

            <div id="courseNavMobile">

                <a data-slide-index="0" href="#"><h2>All Programs</h2></a>

                <a data-slide-index="1" href="#"><h2>Online Courses</h2></a>

                <a data-slide-index="2" href="#"><h2>Innovation Intensives</h2></a>

                <a data-slide-index="3" href="#"><h2>Venture Innovation Program</h2></a>

            </div>

			

            <ul id="courseSliderMobile" class="bx-slider">

            	<li> 

                    <ul id="featuredSliderMobile" class="bx-slider">

                    	<?php $featuredm = new WP_Query( array(

							'post_type' => 'fbs_courses',

							'posts_per_page' => -1,

						) ); ?>

						<?php if ($featuredm->have_posts()) : ?>

						<?php while ($featuredm->have_posts()) : $featuredm->the_post(); ?>

                        

                        <li class="block <?php $terms = get_the_terms( $post->ID, 'course-type' );

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

									$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID, 'course-thumb'));

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

                </li>

                <li>

                	<ul id="tastingSliderMobile" class="bx-slider">

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

									$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID, 'course-thumb'));

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

             	</li>

                <li>

                	<ul  id="innovationSliderMobile" class="bx-slider">

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

									$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID, 'course-thumb'));

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

                </li>

                <li>

                    <ul id="degreeSliderMobile" class="bx-slider">

                        <?php $cgdtermm = get_term( '4', 'course-type' ); ?>

                        <li class="block <?php echo $cgdtermm->slug ?>">

                        	<h3><?php echo $cgdtermm->name ?></h3>

                            <p><?php echo $cgdtermm->description ?></p>

                            <p><a href="<?php bloginfo('url'); ?>/course-type/<?php echo $cgdtermm->slug ?>" class="pillBtn brown">Learn More</a></p>

                        </li>
			<!-- Show Photo Grid -->
			<li class="block CGD">
                        	<div class="labelHolder"><span class="labelTag">Coming Soon!</span></div>
                            <img src="http://foodbusinessschool.org/wp-content/uploads/2015/02/bg_CGD-comingsoon.jpg">
                        </li>
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

									$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID, 'course-thumb'));

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

                </li>

            </ul>

        </div>

    </div>

    

    

    <div id="facultyBlockMobile" class="visible-sm visible-xs">

    	<div class="container">

    		<h1><?php the_field('faculty_block_headline'); ?></h1>

            	<div class="col-md-8 col-md-offset-2">
		<p><?php the_field('faculty_block_text'); ?></p>
		</div>
        	<ul id="facultySliderMobile" class="bx-slider">

                <?php $facultyMobile = new WP_Query( array(

                    'post_type' => 'fbs_faculty',

		    'tax_query' => array(
    				array(
      				'taxonomy' => 'role',
      				'field' => 'id',
      				'terms' => 24,
				'operator' => 'NOT IN',
    				)
			),

                    'posts_per_page' => -1,

                ) ); ?>

                <?php if ($facultyMobile->have_posts()) : ?>

                <?php while ($facultyMobile->have_posts()) : $facultyMobile->the_post(); ?>

                <li class="facultyItem">

                	<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'sm-circle' );

			$fmurl = $thumb['0'];

			?>

                    <div class="facultyPic"><img src="<?php echo $fmurl ?>"></div>

                    <h2><a href="#"><?php the_title(); ?></a></h2>

                    <p class="bioClip"><?php the_field('short_bio'); ?></p>

                </li>

                <?php endwhile; ?>

					<?php wp_reset_postdata(); ?>

                <?php else: ?>

                <?php endif; ?>

            </ul>

            <p><a href="<?php bloginfo('url'); ?>/network/faculty/" class="pillBtn brown">View All Faculty</a></p>

        </div>

    </div>

    

    <div id="facultyBlock" class="visible-lg visible-md">

    	<div class="container">

    		<h1><?php the_field('faculty_block_headline'); ?></h1>

            	<div class="col-md-8 col-md-offset-2">
		<p><?php the_field('faculty_block_text'); ?></p>
		</div>

        	<ul id="facultySlider" class="bx-slider">

                <?php $faculty = new WP_Query( array(

                    'post_type' => 'fbs_faculty',
		    'tax_query' => array(
    				array(
      				'taxonomy' => 'role',
      				'field' => 'id',
      				'terms' => 24,
				'operator' => 'NOT IN',
    				)
			),
                    'posts_per_page' => -1,

                ) ); ?>

                <?php if ($faculty->have_posts()) : ?>

                <?php while ($faculty->have_posts()) : $faculty->the_post(); ?>

                <li class="facultyItem">

                	<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'sm-circle' );

			$furl = $thumb['0'];

			?>

                    <div class="facultyPic"><a href="<?php the_permalink(); ?>"><img src="<?php echo $furl ?>"></a></div>

                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                    <p class="bioClip"><?php the_field('short_bio'); ?></p>

                </li>

                <?php endwhile; ?>

					<?php wp_reset_postdata(); ?>

                <?php else: ?>

                <?php endif; ?>

            </ul>

            <p><a href="<?php bloginfo('url'); ?>/network/faculty/" class="pillBtn brown">View All Faculty</a></p>

        </div>

    </div>

    

    <div id="podcastBlock" style="background-image: url(<?php the_field('podcast_block_image'); ?>);">

    	<div class="container">

        	<div class="col-md-6 col-md-offset-6 col-sm-6 col-sm-offset-6">

            	<h1><?php the_field('podcast_block_title'); ?></h1>

                <?php the_field('podcast_block_text'); ?>

            </div>

        </div>

    </div>

    

    <div id="courseBreakdown">

    	<div class="container">

        	<div class="row">

                <div class="col-md-6 col-sm-6 text-right"><img src="<?php the_field('course_overview_image'); ?>"></div>

                <div class="col-md-6 col-sm-6">

                    <h1><?php the_field('course_overview_title'); ?></h1>

                </div>

            </div>

            <div class="row">

            	<?php $args = array(

					'hide_empty' => 0,
					 );

                $terms = get_terms('audience', $args);

				if ( !empty( $terms ) && !is_wp_error( $terms ) ){

					foreach ( $terms as $term ) {

		$queried_object = get_queried_object();?>

                <div class="col-md-3 col-sm-6 col-xs-6 text-center">

                	<h3><?php echo $term->name ?></h3>

                    <p><?php echo $term->description ?></p>

                    <p class="hidden-xs"><a href="<?php the_field('audience_filter_link', $term ); ?>" class="pillBtn brown">View Courses</a></p>
		    <p class="visible-xs"><a href="<?php the_field('audience_filter_link', $term ); ?>" class="pillBtn brown">Courses</a></p>

                </div>

                <?php } 

					 

				} ?>

            </div>

    	</div>

    </div>

    <?php endwhile; else: ?>

    <?php endif; ?>

    

<?php get_footer(); ?>  
