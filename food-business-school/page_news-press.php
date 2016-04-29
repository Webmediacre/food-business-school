<?php 
/*
Template Name: News / Press
*/
?>

<?php get_header(); ?>


    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="header" style="background-image: url(<?php the_field('header_image'); ?>);"></div>
    
    <div id="contentBlock">
    	<div class="container">
        	<h1><?php the_field('main_headline'); ?></h1>
            <div class="row" id="newsSliderHolder">
            	<ul id="newsSlider" class="bx-slider">
					<?php $newsSlider = new WP_Query( array(
                        'post_type' => 'fbs_news',
                        'posts_per_page' => -1,
                        'tax_query' => array(
                            'relation' => 'AND',
                            array(
                                'taxonomy' => 'news-type', 
                                'field' => 'slug',
                                'terms' => array(
                                    'news' 
                                )
                            ),
                            array(
                                'taxonomy' => 'news-type', 
                                'field' => 'slug',
                                'terms' => array(
                                    'featured'
                                )
                            ),
                            )
                        
                    ) ); ?>
                    <?php if ($newsSlider->have_posts()) : ?>
                    <?php while ($newsSlider->have_posts()) : $newsSlider->the_post(); ?>
			<?php $mthumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'blog-thumb');
			$murl = $mthumb['0']; ?>
                	<li><img src="<?php echo $murl ?>" class="visible-xs"><img src="<?php the_field('large_image'); ?>" class="hidden-xs"><span class="slideCaption"><a href="<?php the_permalink(); ?>"><?php the_field('news_source'); ?>: <?php the_title(); ?></a></span></li>
                	<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
                    <?php else: ?>
                    <?php endif; ?>
                </ul>
            </div>
            
            <div class="row">
                <div class="col-md-8">
                    <h3>News <a href="<?php echo get_term_link('news','news-type'); ?>" class="pillBtn brown">View All</a></h3>
                    <div class="row" id="coursewrap">
                        <?php $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1; ?>
                        <?php $newsList = new WP_Query( array(
							'post_type' => 'fbs_news',
							'posts_per_page' => -1,
							'news-type' => 'news',
							'paged' => $paged
						) ); ?>
						<?php if ($newsList->have_posts()) : ?>
						<?php while ($newsList->have_posts()) : $newsList->the_post(); ?> 
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
						<?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                        <?php else: ?>
                        <?php endif; ?>
                	</div>
                    <div id="moreCourses"></div>
                </div>
                <div class="col-md-4">
                    <h3>Press Releases <a href="<?php echo get_term_link('press','news-type'); ?>" class="pillBtn brown">View All</a></h3>
                    <div class="row">
                        
                        <?php $prList = new WP_Query( array(
							'post_type' => 'fbs_news',
							'posts_per_page' => 6,
							'news-type' => 'press',
						) ); ?>
						<?php if ($prList->have_posts()) : ?>
						<?php while ($prList->have_posts()) : $prList->the_post(); ?>
                        <div class="prBlock col-md-12">
                            <h5 class="prDate"><?php echo get_the_date('n/j/y'); ?></h5>
                            <h5 class="prTitle"><a href="<?php the_field('pdf_File'); ?>" target="_blank"><?php the_title(); ?></a></h5>
                            <p class="prExcerpt"><?php the_field('short_description'); ?></p>
			    <?php if(get_field('pdf_File')) { ?><p><a href="<?php the_field('pdf_File'); ?>" target="_blank">Download PDF</a></p><?php } ?>
                        </div>
                        <?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
                        <?php else: ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        
        </div>
    </div>
    
    <?php endwhile; else: ?>
    <?php endif; ?>
    
<?php get_footer(); ?> 