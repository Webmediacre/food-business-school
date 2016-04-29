<?php 
/*
Template Name: Contact (with Sidebar)
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
        	<div class="row content">
                <div class="col-md-7 col-md-offset-1 col-sm-8">
                    <div>
                        <?php the_content(); ?>
                    </div>
                </div>
                <div class="sidebar col-md-3 col-sm-4">
                    <?php dynamic_sidebar( 'sidebar-1' ); ?>
                </div>
            </div>
        </div>
    </div>
    <?php endwhile; else: ?>
    <?php endif; ?>
    
    
<?php get_footer(); ?>  