<?php 

/*

Template Name: Network

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

    

    <div id="networkSlider">

    	<div id="wrapper">

			<div id="carousel">

				<?php the_field('slider_content'); ?>

			</div>

		</div>

		<div class="container">

        	<a id="prev" href="#">Prev</a>

			<a id="next" href="#">Next</a>

			<div class="pager"></div>

        </div>    

    </div>

    

    <div id="networkBlock">

    	<div class="container">

        	

            <div class="row">

            	<div class="col-md-4">

                	<h3><?php the_field('top_left_title'); ?></h3>

                    <p><?php the_field('top_left_text'); ?></p>

                </div>

                <div class="col-md-4">

                	<h3><?php the_field('top_center_title'); ?></h3>

                    <p><?php the_field('top_center_text'); ?></p>

                </div>

                <div class="col-md-4">

                	<h3><?php the_field('top_right_title'); ?></h3>

                    <p><?php the_field('top_right_text'); ?></p>

                </div>

            </div>

            <div class="row">

            	<div class="col-md-4">

                	<h3><?php the_field('bottom_left_title'); ?></h3>

                    <p><?php the_field('bottom_left_text'); ?></p>

                </div>

                <div class="col-md-4">

                	<h3><?php the_field('bottom_center_title'); ?></h3>

                    <p><?php the_field('bottom_center_text'); ?></p>

                </div>

                <div class="col-md-4">

                	<h3><?php the_field('bottom_right_title'); ?></h3>

                    <p><?php the_field('bottom_right_text'); ?></p>

                </div>

            </div>

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
			<div class="facultyPic"><a href="<?php the_permalink(); ?>"><img src="<?php echo $fmurl ?>"></a></div>
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
    
    <div id="advisoryBoardMobile" class="visible-sm visible-xs">
	<div class="container">
		<h1><?php the_field('advisory_board_headline'); ?></h1>
           	<div class="col-md-8 col-md-offset-2">
			<p><?php the_field('advisory_board_text'); ?></p>
		</div>
        	<ul id="advisorySliderMobile" class="bx-slider">
		<?php $advisoryMobile = new WP_Query( array(
			'post_type' => 'fbs_faculty',
			'tax_query' => array(
    				array(
      				'taxonomy' => 'role',
      				'field' => 'id',
      				'terms' => 24
    				)
			),
			'posts_per_page' => -1,
                ) ); ?>
                <?php if ($advisoryMobile->have_posts()) : ?>
                <?php while ($advisoryMobile->have_posts()) : $advisoryMobile->the_post(); ?>
                <li class="facultyItem">
			<?php $amthumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'sm-circle' );
			$amurl = $amthumb['0'];
			?>
			<div class="facultyPic"><img src="<?php echo $amurl ?>"></div>
                   	<h2><?php the_title(); ?></h2>
			<p class="bioClip"><?php the_field('short_bio'); ?></p>
                </li>
                <?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
                <?php else: ?>
                <?php endif; ?>
		</ul>
		
	</div>
    </div>
    <div id="advisoryBoard" class="visible-lg visible-md">
   	<div class="container">
   		<h1><?php the_field('advisory_board_headline'); ?></h1>
           	<div class="col-md-8 col-md-offset-2">
			<p><?php the_field('advisory_board_text'); ?></p>
		</div>
	       	<ul id="advisorySlider" class="bx-slider">
                <?php $advisory = new WP_Query( array(
                	'post_type' => 'fbs_faculty',
		  	'tax_query' => array(
    				array(
      				'taxonomy' => 'role',
      				'field' => 'id',
      				'terms' => 24
    				)
			),
			'posts_per_page' => -1,

                ) ); ?>
                <?php if ($advisory->have_posts()) : ?>
		<?php while ($advisory->have_posts()) : $advisory->the_post(); ?>
		<li class="facultyItem">
			<?php $athumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'sm-circle' );
			$aurl = $athumb['0'];
			?>
			<div class="facultyPic"><img src="<?php echo $aurl ?>"></div>
			<h2><?php the_title(); ?></h2>
			<p class="bioClip"><?php the_field('short_bio'); ?></p>
		</li>
		<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		<?php else: ?>
		<?php endif; ?>
		</ul>
	</div>
    </div>

    <div class="tanBlock" id="forumBlock">

    	<div class="container">

        	<div class="col-md-4">

            	<img src="<?php the_field('forum_image'); ?>">

        	</div>

            <div class="col-md-8">

            	<h3><?php the_field('forum_title'); ?></h3>

                <p><?php the_field('forum_text'); ?></p>

                <!-- <p> <a href="<?php the_field('login_link'); ?>"class="pillBtn orange">Login</a> </p> -->

            </div>

        </div>

    </div>

    <?php endwhile; else: ?>

    <?php endif; ?>

    

    

<?php get_footer(); ?>  