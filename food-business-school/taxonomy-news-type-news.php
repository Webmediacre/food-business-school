<?php get_header(); ?>

    <div class="header" style="background-image: url(<?php bloginfo('template_directory'); ?>/images/bg_news.jpg);"></div>
    
    <div id="contentBlock">
    	<div class="container">
            
            <div class="row">
                <div class="col-md-8">
                    <h1>News</h1>
                    <div class="row" id="coursewrap">
                        <?php query_posts($query_string.'&posts_per_page=-1'); ?>
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <div class="postBlock col-md-6 col-sm-6">
                            <?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
									$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID, 'blog-thumb'));
									$url = $thumb['0'];
							?>
                            <img src="<?php echo $url ?>">
                            <?php } ?>
                            <h5 class="newsTitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                            <p class="postDetails"><em><?php the_field('news_source'); ?></em>  |  <em><?php echo get_the_date('m/d/Y'); ?></em></p>
			    <p class="newsExcerpt"><?php the_field('short_description'); ?><br />
                            <a href="<?php the_permalink(); ?>">Read More »</a></p>
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