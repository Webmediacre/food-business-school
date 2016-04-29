<?php 
/*
Template Name: Search Results
*/
?>

<?php get_header(); ?>


    <div class="header" style="background-image: url(<?php bloginfo('template_directory'); ?>/images/bg_news.jpg);"></div>
    
    <div id="contentBlock">
    	<div class="container">
            
            <div class="row">
                <div class="col-md-8">
                    <h1>Search Results</h1>
                    
                    <?php
					global $query_string;
					
					$query_args = explode("&", $query_string);
					$search_query = array();
					
					foreach($query_args as $key => $string) {
						$query_split = explode("=", $string);
						$search_query[$query_split[0]] = urldecode($query_split[1]);
					} // foreach
					
					$search = new WP_Query($search_query);
					global $wp_query;
					$total_results = $wp_query->found_posts;
					?>
                    
                    <h2><?php echo $total_results; ?> results for "<?php the_search_query(); ?>"</h2>
                    <div class="row" id="coursewrap">
                    	
			 
			<?php query_posts($query_string . '&showposts=-1'); ?>
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        
                        <?php if (($post->post_type == 'fbs_news') && has_term( 'news', 'news-type' )) { ?>
                        <div class="postBlock col-md-12">
                        	<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'sm-circle');
				$mthumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'blog-thumb');
				$url = $thumb['0'];
				$murl = $mthumb['0'];
							?>
                            <div class="postThumb hidden-xs">
                            	<img src="<?php echo $url ?>">
                            </div>
			    <div class="postThumb visible-xs">
                            	<img src="<?php echo $murl ?>">
                            </div>
                            <?php } ?>    
                            <h6>News</h6>
                            <h5 class="postTitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                            <p><?php $content = get_the_content(); $trimmed_content = wp_trim_words( $content, 50, '...' ); echo $trimmed_content; ?></p>
                        </div>
                        
						<?php } else if (($post->post_type == 'fbs_news') && has_term( 'press', 'news-type' )) { ?>
                        <div class="postBlock col-md-12">
                        	<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'sm-circle');
				$mthumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'blog-thumb');
				$url = $thumb['0'];
				$murl = $mthumb['0'];
							?>
                            <div class="postThumb hidden-xs">
                            	<img src="<?php echo $url ?>">
                            </div>
			    <div class="postThumb visible-xs">
                            	<img src="<?php echo $murl ?>">
                            </div>
                            <?php } ?>    
                            <h6>Press</h6>
                            <h5 class="postTitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                            <p><?php $content = get_the_content(); $trimmed_content = wp_trim_words( $content, 50, '...' ); echo $trimmed_content; ?></p>
                        </div>
                        
						<?php } else if ($post->post_type == 'fbs_courses') { ?>
                        <div class="postBlock col-md-12">
                        	<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'sm-circle');
				$mthumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'blog-thumb');
				$url = $thumb['0'];
				$murl = $mthumb['0'];
							?>
                            <div class="postThumb hidden-xs">
                            	<img src="<?php echo $url ?>">
                            </div>
			    <div class="postThumb visible-xs">
                            	<img src="<?php echo $murl ?>">
                            </div>
                            <?php } ?>    
                            <h6>Course</h6>
                            <h5 class="postTitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                            <p><?php $content = get_post_meta($post->ID, first_block_text, true); $trimmed_content = wp_trim_words( $content, 50, '...' ); echo $trimmed_content; ?></p>
                        </div>
                        
						<?php } else if ($post->post_type == 'fbs_faculty') { ?>
                        <div class="postBlock col-md-12">
                        	<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'sm-circle');
				$mthumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'blog-thumb');
				$url = $thumb['0'];
				$murl = $mthumb['0'];
							?>
                            <div class="postThumb hidden-xs">
                            	<img src="<?php echo $url ?>">
                            </div>
			    <div class="postThumb visible-xs">
                            	<img src="<?php echo $murl ?>">
                            </div>
                            <?php } ?>    
                            <h6>Faculty</h6>
                            <h5 class="postTitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                            <p><?php $content = get_the_content(); $trimmed_content = wp_trim_words( $content, 50, '...' ); echo $trimmed_content; ?></p>
                        </div>
                        
						<?php } else if ($post->post_type == 'tribe_events') { ?>
                        <div class="postBlock col-md-12">
                        	<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'sm-circle');
				$mthumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'blog-thumb');
				$url = $thumb['0'];
				$murl = $mthumb['0'];
							?>
                            <div class="postThumb hidden-xs">
                            	<img src="<?php echo $url ?>">
                            </div>
			    <div class="postThumb visible-xs">
                            	<img src="<?php echo $murl ?>">
                            </div>
                            <?php } ?>    
                            <h6>Event</h6>
                            <h5 class="postTitle"><a href="<?php the_permalink(); ?>"><?php echo tribe_get_start_date($post, false, $format = 'D, M j' ); ?>: <?php the_title(); ?></a></h5>
                            <p><?php $content = get_the_content(); $trimmed_content = wp_trim_words( $content, 50, '...' ); echo $trimmed_content; ?></p>
                        </div>
                        
						<?php } else if ($post->post_type == 'fbs_faq') { ?>
                        <div class="postBlock col-md-12">
                        	<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'sm-circle');
				$mthumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'blog-thumb');
				$url = $thumb['0'];
				$murl = $mthumb['0'];
							?>
                            <div class="postThumb hidden-xs">
                            	<img src="<?php echo $url ?>">
                            </div>
			    <div class="postThumb visible-xs">
                            	<img src="<?php echo $murl ?>">
                            </div>
                            <?php } ?>    
                            <h6>FAQ</h6>
                            <h5 class="postTitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                            <p><?php $content = get_the_content(); $trimmed_content = wp_trim_words( $content, 50, '...' ); echo $trimmed_content; ?></p>
                        </div>
                        
                        <?php } else if ($post->post_type == 'page') { ?>
                        <div class="postBlock col-md-12">
                        	<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'sm-circle');
				$mthumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'blog-thumb');
				$url = $thumb['0'];
				$murl = $mthumb['0'];
							?>
                            <div class="postThumb hidden-xs">
                            	<img src="<?php echo $url ?>">
                            </div>
			    <div class="postThumb visible-xs">
                            	<img src="<?php echo $murl ?>">
                            </div>
                            <?php } ?>    
                            <h6>Page</h6>
                            <h5 class="postTitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                            <p><?php $content = get_the_content(); $trimmed_content = wp_trim_words( $content, 50, '...' ); echo $trimmed_content; ?></p>
                        </div>
                        
						<?php } else { ?>
                        <div class="postBlock col-md-12">
                        	<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'sm-circle');
				$mthumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'blog-thumb');
				$url = $thumb['0'];
				$murl = $mthumb['0'];
							?>
                            <div class="postThumb hidden-xs">
                            	<img src="<?php echo $url ?>">
                            </div>
			    <div class="postThumb visible-xs">
                            	<img src="<?php echo $murl ?>">
                            </div>
                            <?php } ?>    
                            <h6><?php the_category(); ?></h6>
                            <h5 class="postTitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                            <p><?php $content = get_the_content(); $trimmed_content = wp_trim_words( $content, 50, '...' ); echo $trimmed_content; ?></p>
                        </div>
                        <? } ?>
                        <?php endwhile; else: ?>
    					<?php endif; ?>
                        
                	</div>
                    <div id="moreCourses"></div>
                    
                </div>
                <div class="col-md-4 sidebar">
                    <?php dynamic_sidebar( 'search-sidebar' ); ?>
                </div>
            </div>
        
        </div>
    </div>
    
<?php get_footer(); ?> 