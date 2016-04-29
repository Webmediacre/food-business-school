<?php get_header(); ?>

    <div class="header" style="background-image: url(<?php bloginfo('template_directory'); ?>/images/bg_news.jpg);"></div>
    
    <div id="contentBlock">
    	<div class="container">
            
            <div class="row">
                <div class="col-md-8">
                    <h1>Press Releases</h1>
                    <div class="row" id="coursewrap">
                        <?php query_posts($query_string.'&posts_per_page=-1'); ?>
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <div class="prBlock col-md-12">
                            <?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
									$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID, 'blog-thumb'));
									$url = $thumb['0'];
							?>
                            <img src="<?php echo $url ?>">
                            <?php } ?>
                            <h5 class="prDate"><?php echo get_the_date('n/j/y'); ?></h5>
                            <h5 class="prTitle"><a href="<?php the_field('pdf_File'); ?>" target="_blank"><?php the_title(); ?></a></h5>
                            <?php the_content(); ?>
                            <?php if(get_field('pdf_File')) { ?><p><a href="<?php the_field('pdf_File'); ?>" target="_blank">Download PDF</a></p><?php } ?>
                        </div>
						<?php endwhile; else: ?>
    					<?php endif; ?>
                	</div>
                    <div id="moreCourses"></div>
                    
                </div>
                <div class="col-md-4 sidebar">
                    <?php dynamic_sidebar( 'news-sidebar' ); ?>
                </div>
            </div>
        
        </div>
    </div>
    
<?php get_footer(); ?> 