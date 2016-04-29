<?php 
/*
Template Name: Faculty
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
    
    <div id="facultyGrid">
    	<div class="container">
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
            <div class="col-md-4 col-sm-6">
            	<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'sm-circle' );
			$furl = $thumb['0'];
		?>
                <div class="facultyPic"><a href="<?php the_permalink(); ?>"><img src="<?php echo $furl ?>"></a></div>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <p class="bioClip"><?php the_field('short_bio'); ?></p>
            </div>
        	<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
            <?php else: ?>
            <?php endif; ?>
        </div>
    </div>
    
    
    <div class="tanBlock">
    	<div class="container">
        	<div class="col-md-4 col-sm-4 bioPic">
            	<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'lg-circle' );
		$url = $thumb['0'];
		?>
                <img src="<?php echo $url ?>">
        	</div>
            <div class="col-md-8 col-sm-8">
            	<h3><?php the_field('featured_section_title'); ?></h3>
                <p class="quoteTxt"><?php the_field('featured_section_quote'); ?> </p>
                <p class="quoteAtt">– <a href="<?php the_field('author_link'); ?>"><?php the_field('featured_section_author'); ?></a></p>
            </div>
        </div>
    </div>
    <?php endwhile; else: ?>
    <?php endif; ?>
    
<?php get_footer(); ?>  