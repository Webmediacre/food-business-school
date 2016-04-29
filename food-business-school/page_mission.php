<?php 
/*
Template Name: Mission
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
        	
            <div class="row">
            	<div class="col-md-10 col-md-offset-1">
                	<div>
                        <h4><?php the_field('top_content_block'); ?></h4>
                    </div>
                </div>
            </div>
        	<div class="row">
            	<div class="col-md-4 col-md-offset-2 col-sm-6">
                	<img src="<?php the_field('bottom_content_image'); ?>">
            	</div>
                <div class="col-md-4 col-sm-6">
                	<p class="text-left"><?php the_field('bottom_content_text'); ?></p>
                </div>
            </div>
            
        </div>
    </div>

    <div id="imageBlocks">
	<div id="carousel">
	<?php
	// begin attached image block code
	$im = get_post_meta( get_the_id(), 'page_image_blocks' );
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

     <div id="missionBlock">
    	<div class="container">
        	<div class="row">
            	<h1 class="text-center"><?php the_field('features_section_title'); ?></h1>
            </div>
            <div class="row">
            	<div class="col-md-4">
                	<h3><?php the_field('feature_1_title'); ?></h3>
                    <p><?php the_field('feature_1_text'); ?></p>
                </div>
                <div class="col-md-4">
                	<h3><?php the_field('feature_2_title'); ?></h3>
                    <p><?php the_field('feature_2_text'); ?></p>
                </div>
                <div class="col-md-4">
                	<h3><?php the_field('feature_3_title'); ?></h3>
                    <p><?php the_field('feature_3_text'); ?></p>
                </div>
            </div>
            <div class="row">
            	<div class="col-md-4 col-md-offset-2">
                	<h3><?php the_field('feature_4_title'); ?></h3>
                    <p><?php the_field('feature_4_text'); ?></p>
                </div>
                <div class="col-md-4">
					<h3><?php the_field('feature_5_title'); ?></h3>
                    <p><?php the_field('feature_5_text'); ?></p>
                </div>
            </div>
        </div>
    </div>
    
    
    
    <div id="geoLocation" class="hidden-xs" style="background-image: url(<?php the_field('large_map_image'); ?>); clear: both;">
    	<div class="container">
        	<div class="col-md-5 col-sm-6">
            	<h1><?php the_field('large_map_title'); ?></h1>
            	<h4><?php the_field('large_map_subtitle'); ?></h4> 
            </div>   
        </div>
    </div>

    <div id="geoLocationMobile" class="visible-xs">
	<img src="<?php the_field('mobile_map_image'); ?>" />
    </div>
    
    
    <?php endwhile; else: ?>
    <?php endif; ?>
    
    
<?php get_footer(); ?>  