<?php 
/*
Template Name: FAQs
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
            	<?php the_content(); ?>
            </div>
        </div>
    </div>
    <?php endwhile; else: ?>
    <?php endif; ?>
    
     <div id="faqBlock">
    	<div class="container">
        	<div class="col-md-12">
            	
                <?php
				//get all categories then display all posts in each term
				$taxonomy = 'faq-category';
				$term_args=array(
				  'orderby' => 'name',
				  'order' => 'ASC'
				);
				$terms = get_terms($taxonomy,$term_args);
				if ($terms) {
				  foreach( $terms as $term ) {
					$args=array(
					  'post_type' => 'fbs_faq',
					  'post_status' => 'publish',
					  'posts_per_page' => -1,
					  'caller_get_posts'=> 1,
					  'tax_query' => array(
							array(
								'taxonomy' => 'faq-category',
								'terms' => array($term->term_id),
								//'include_children' => true,
								'operator' => 'IN'
							)
						)
					  );
					$my_query = null;
					$my_query = new WP_Query($args);
					if( $my_query->have_posts() ) {  ?>
					  <h3><?php echo $term->name; ?></h3>
					  <?php
					  while ($my_query->have_posts()) : $my_query->the_post(); ?>
						<div class="qBlock">
                            <p><a href="#" class="expander"><?php the_title(); ?></a></p>
                            <div class="content">
                                <?php the_content(); ?>
                            </div>    
                        </div>
					   <?php
					  endwhile;
					  ?>
				 <?php
					}
				  }
				}
				wp_reset_query();  // Restore global post data stomped by the_post().
				?>
                
            </div>
        </div>
    </div>
    
    
    
<?php get_footer(); ?>  