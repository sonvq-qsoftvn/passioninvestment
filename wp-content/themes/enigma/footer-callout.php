<div class="enigma_callout_area">
	<div class="container">
		<div class="row">
		<?php
        $args = array('post_type' => 'testimonial', 'posts_per_page' => 9, 'orderby' => 'rand');
        $testimonial_list = new WP_Query($args);
        ?>
        <?php if ($testimonial_list->have_posts()): ?>
            <section class="project-list-home">
                <div class="container">
                    <div class="row">
                        <div id="mycarou">
                        <?php while ($testimonial_list->have_posts()): $testimonial_list->the_post(); ?>
                            <div class="gridSingleItem"> 
                                <div class="col-sm-12">
                                    <p><i class="fa fa-thumbs-up"></i><?php echo '"' . get_the_content() . '"';?></p>
                                </div>
                                <div class="col-sm-3 pull-right">
                                    <p><em><b>~ <?php the_title(); ?> ~</b></em></p>
                                </div>                                
                            </div>
                        <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
		</div>
		
	</div>
	<div class="enigma_callout_shadow"></div>
</div>