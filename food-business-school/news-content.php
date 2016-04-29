						<div class="postBlock col-md-6">
                            <?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
									$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID, 'blog-thumb'));
									$url = $thumb['0'];
							?>
                            <img src="<?php echo $url ?>">
                            <?php } ?>
                            <h5 class="newsTitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                            <p class="newsExcerpt"><?php the_field('short_description'); ?> <a href="<?php the_permalink(); ?>">Read More »</a></p>
                        </div>