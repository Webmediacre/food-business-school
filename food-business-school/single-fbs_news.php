<?php get_header(); ?>


    
	<div class="header" style="background-image: url(<?php bloginfo('template_directory'); ?>/images/bg_news.jpg);"></div>
    
    <div id="contentBlock">
    	<div class="container">
            
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php $terms = wp_get_post_terms( $post->ID, 'news-type' );
			foreach ( $terms as $term ) {
			if ( 'news' == $term->slug ) { ?>
            <div class="row">
                <div class="col-md-8">
                    <h1>News</h1>
                    
                    <div class="postBlock">
                    	<img src="<?php the_field('large_image'); ?>" class="large-image">
                    	<h3 class="newsTitle"><?php the_title(); ?></h3>
                        <p class="postDetails"><em><?php the_field('news_source'); ?></em>  |  <em>Posted: <?php echo get_the_date('m/d/Y'); ?></em></p>
                        <?php the_content(); ?>
			<?php if(get_field('original_article_link')) { ?><p>View original article <a href="<?php the_field('original_article_link'); ?>" target="_blank">here.</a></p><?php } ?>
			<?php if(get_field('photo_credit')) { ?><p><em>Photo Credit: <?php the_field('photo_credit'); ?></em></p><?php } ?>
                    	<p><?php echo do_shortcode('[ssba]'); ?></p>
                    </div>
                    
                </div>
                <div class="col-md-4 sidebar">
                    <?php dynamic_sidebar( 'news-sidebar' ); ?>
                </div>
            </div>
            <? } else if ( 'press' == $term->slug ) { ?>
            <div class="row">
                <div class="col-md-8">
                    <h1>Press Release</h1>
                    
                    <div class="postBlock">
                    	<img src="<?php the_field('large_image'); ?>" class="large-image">
                    	<h3 class="newsTitle"><?php the_title(); ?></h3>
                        <p class="postDetails"><em>Posted: <?php echo get_the_date('m/d/Y'); ?></em></p>
                        <?php the_content(); ?>
                    	<p><?php echo do_shortcode('[ssba]'); ?></p>
                    </div>
                    
                </div>
                <div class="col-md-4 sidebar">
                    <?php dynamic_sidebar( 'news-sidebar' ); ?>
                </div>
            </div>
			<?php }
			}?>
        	<?php endwhile; else: ?>
    		<?php endif; ?>
        </div>
    </div>
    
 <?php get_footer(); ?> 