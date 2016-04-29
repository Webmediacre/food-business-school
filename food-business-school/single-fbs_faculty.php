<?php get_header(); ?>

    <div class="header" class="single-faculty" style="background-image: url(<?php bloginfo('template_directory'); ?>/images/bg_facultyBio.jpg);">
		
    </div>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="tanBlock">
    	<div class="container">
        	<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'lg-circle');
			$url = $thumb['0']; ?>
            <div class="col-md-4 col-sm-4 col-lg-5 bioPic">
                <img src="<?php echo $url ?>">
        	</div>
            <?php } ?>
            <div class="col-md-8 col-sm-8 col-lg-7 fullBio">
            	<h1><?php the_title(); ?></h1>
                <h4><?php the_field('company_university'); ?></h4>
                <p class="quoteTxt"><?php the_field('bio_quote'); ?></p>
                <div id="bio-wrap">
                	<?php the_content(); ?>
                </div>
                <div id="read-more"></div>
            </div>
        </div>
    </div>
    
    <div id="bioDetails">
    	<div class="container">
        	<div class="col-md-10">
            	<?php if(get_field('writings_1_title')) { ?>
		<h2>Courses, Events & Writings</h2>
		<?php } ?>
                <?php if(get_field('writings_1_title')) { ?>
                <div class="writingsBlock">
                	<?php if(get_field('writings_1_thumbnail')) { ?>
                    <?php if(get_field('writings_1_link')) { ?><a href="<?php the_field('writings_1_link'); ?>" class="writingsThumb" target="_blank"><img src="<?php the_field('writings_1_thumbnail'); ?>"></a><?php } else { ?>
                    <img src="<?php the_field('writings_1_thumbnail'); ?>" class="writingsThumb"><?php } ?>
					<?php } ?>
                    <h5><?php if(get_field('writings_1_link')) { ?><a href="<?php the_field('writings_1_link'); ?>" target="_blank"><?php the_field('writings_1_title'); ?></a><?php } else { ?><?php the_field('writings_1_title'); ?><?php } ?></h5>
                    <?php if(get_field('writings_1_text')) { ?>
					<p><?php the_field('writings_1_text'); ?></p>
                	<?php } ?>
                </div>
                <?php } ?>
                <?php if(get_field('writings_2_title')) { ?>
                <div class="writingsBlock">
                	<?php if(get_field('writings_2_thumbnail')) { ?>
                    <?php if(get_field('writings_2_link')) { ?><a href="<?php the_field('writings_2_link'); ?>" class="writingsThumb" target="_blank"><img src="<?php the_field('writings_2_thumbnail'); ?>"></a><?php } else { ?>
                    <img src="<?php the_field('writings_2_thumbnail'); ?>" class="writingsThumb"><?php } ?>
					<?php } ?>
                    <h5><?php if(get_field('writings_2_link')) { ?><a href="<?php the_field('writings_2_link'); ?>" target="_blank"><?php the_field('writings_2_title'); ?></a><?php } else { ?><?php the_field('writings_2_title'); ?><?php } ?></h5>
                    <?php if(get_field('writings_2_text')) { ?>
                    <p><?php the_field('writings_2_text'); ?></p>
                	<?php } ?>
                </div>
                <?php } ?>
                <?php if(get_field('writings_3_title')) { ?>
                <div class="writingsBlock">
                	<?php if(get_field('writings_3_thumbnail')) { ?>
                    <?php if(get_field('writings_3_link')) { ?><a href="<?php the_field('writings_3_link'); ?>" class="writingsThumb" target="_blank"><img src="<?php the_field('writings_3_thumbnail'); ?>"></a><?php } else { ?>
                    <img src="<?php the_field('writings_3_thumbnail'); ?>" class="writingsThumb"><?php } ?>
					<?php } ?>
                    <h5><?php if(get_field('writings_3_link')) { ?><a href="<?php the_field('writings_3_link'); ?>" target="_blank"><?php the_field('writings_3_title'); ?></a><?php } else { ?><?php the_field('writings_3_title'); ?><?php } ?></h5>
                    <?php if(get_field('writings_3_text')) { ?>
                    <p><?php the_field('writings_3_text'); ?></p>
                	<?php } ?>
                </div>
                <?php } ?>
                <?php if(get_field('writings_4_title')) { ?>
                <div class="writingsBlock">
                	<?php if(get_field('writings_4_thumbnail')) { ?>
                    <?php if(get_field('writings_4_link')) { ?><a href="<?php the_field('writings_4_link'); ?>" class="writingsThumb" target="_blank"><img src="<?php the_field('writings_4_thumbnail'); ?>"></a><?php } else { ?>
                    <img src="<?php the_field('writings_4_thumbnail'); ?>" class="writingsThumb"><?php } ?>
					<?php } ?>
                    <h5><?php if(get_field('writings_4_link')) { ?><a href="<?php the_field('writings_4_link'); ?>" target="_blank"><?php the_field('writings_4_title'); ?></a><?php } else { ?><?php the_field('writings_4_title'); ?><?php } ?></h5>
                    <?php if(get_field('writings_4_text')) { ?>
                    <p><?php the_field('writings_4_text'); ?></p>
                	<?php } ?>
                </div>
                <?php } ?>
                <?php if(get_field('writings_5_title')) { ?>
                <div class="writingsBlock">
                	<?php if(get_field('writings_5_thumbnail')) { ?>
                    <?php if(get_field('writings_5_link')) { ?><a href="<?php the_field('writings_5_link'); ?>" class="writingsThumb" target="_blank"><img src="<?php the_field('writings_5_thumbnail'); ?>"></a><?php } else { ?>
                    <img src="<?php the_field('writings_5_thumbnail'); ?>" class="writingsThumb"><?php } ?>
					<?php } ?>
                    <h5><?php if(get_field('writings_5_link')) { ?><a href="<?php the_field('writings_5_link'); ?>" target="_blank"><?php the_field('writings_5_title'); ?></a><?php } else { ?><?php the_field('writings_5_title'); ?><?php } ?></h5>
                    <?php if(get_field('writings_5_text')) { ?>
                    <p><?php the_field('writings_5_text'); ?></p>
                	<?php } ?>
                </div>
                <?php } ?>
        	</div>
            <div class="col-md-2">
            	<?php 
		if(
		    ( false == get_field('twitter_link') ) && 
		    ( false == get_field('linkedin_profile_link') ) &&
		    ( false == get_field('email_address') ) &&
		    ( false == get_field('website_url') )
		  ) { 
		?>
		<!-- No Content -->
		<?php } else {  ?>
		<h2>Follow</h2>
                <div class="bioContacts">
                	<?php if(get_field('twitter_link')) { ?>
                    <a href="<?php the_field('twitter_link'); ?>" class="twLink" target="_blank"><span class="smIcon"></span> Twitter</a>
                    <?php } ?>
                    <?php if(get_field('linkedin_profile_link')) { ?>
                    <a href="<?php the_field('linkedin_profile_link'); ?>" class="liLink" target="_blank"><span class="smIcon"></span> LinkedIn</a>
                    <?php } ?>
                    <?php if(get_field('email_address')) { ?>
                    <a href="<?php the_field('email_address'); ?>" class="emLink" target="_blank"><span class="smIcon"></span> Email</a>
                    <?php } ?>
                    <?php if(get_field('website_url')) { ?>
                    <a href="<?php the_field('website_url'); ?>" class="webLink" target="_blank"><span class="smIcon"></span> Website</a>
                    <?php }  } ?>
                </div>
            </div>
        </div>
    </div>
    <?php endwhile; else: ?>
    <?php endif; ?>
    
<?php get_footer(); ?>  