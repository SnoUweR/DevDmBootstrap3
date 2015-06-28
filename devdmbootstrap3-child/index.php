<?php get_header(); ?>

<?php get_template_part('template-part', 'head'); ?>

<?php get_template_part('template-part', 'topnav'); ?>

<!-- start content container -->
<div class="row dmbs-content">

    <?php //left sidebar ?>
    <?php get_sidebar( 'left' ); ?>

    <div class="col-md-<?php devdmbootstrap3_main_content_width(); ?> dmbs-main">

        <?php

            //if this was a search we display a page header with the results count. If there were no results we display the search form.
            if (is_search()) :

                 $total_results = $wp_query->found_posts;

                 echo "<h2 class='page-header'>" . sprintf( __('%s Search Results for "%s"','devdmbootstrap3'),  $total_results, get_search_query() ) . "</h2>";

                 if ($total_results == 0) :
                     get_search_form(true);
                 endif;

            endif;

        ?>

            <?php // theloop
                if ( have_posts() ) : while ( have_posts() ) : the_post();

                    // single post
                    if ( is_single() ) : ?>

                        <div <?php post_class(); ?>>

                            <h2 class="page-header"><?php the_title() ;?></h2>
                            <?php get_template_part('template-part', 'postmeta'); ?>
							<?php // Эти два дива не закрыты в postmeta, поэтому я их закрываю тут, чтоб текст с кол-во комментов оказался внутри полоски ?>
							</div>
							</div>
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail(); ?>
                                <div class="clear"></div>
                            <?php endif; ?>
							<div class="post-content">
                            <?php the_content(); ?>
                            <?php wp_link_pages(); ?>
							</div>
							<div class="row"> 
                            <div class="col-md-12">
							<?php comments_template(); ?>
							</div></div>
                        </div>
                    <?php
                    // list of posts
                    else : ?>
					<div class="row post-wrapper">
					<div class="col-md-12">
                       <div <?php post_class(); ?>>

                            <h2 class="page-header">
                                <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'devdmbootstrap3' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
                            </h2>
                            <?php if ( has_post_thumbnail() ) : ?>
                               <?php the_post_thumbnail(); ?>
                                <div class="clear"></div>
                            <?php endif; ?>
							<?php get_template_part('template-part', 'postmeta'); ?>
                            <?php  if ( comments_open() ) : ?>
							
							| <span class="glyphicon glyphicon-comment"></span> 
							<a href="<?php the_permalink(); ?>#comments"><?php comments_number(__('Leave a Comment','devdmbootstrap3'), __('One Comment','devdmbootstrap3'), '%' . __(' Comments','devdmbootstrap3') );?> </a>
							
                            <?php endif; ?>
							<?php // Эти два дива не закрыты в postmeta, поэтому я их закрываю тут, чтоб текст с кол-во комментов оказался внутри полоски ?>
							</div>
							</div>
						<div class="post-content">
                            <?php the_content(); ?>
                            <?php wp_link_pages(); ?>
						</div>
                       </div>
					</div>
					</div>
                     <?php  endif; ?>

                <?php endwhile; ?>
                <div class="row">
				<div class="col-md-12 text-center">
				<div class="navigation">
				<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } else { posts_nav_link(); } ?>
                </div>
				</div>
				</div>
				<?php else: ?>

                    <?php get_404_template(); ?>

            <?php endif; ?>

   </div>

   <?php //get the right sidebar ?>
   <?php get_sidebar( 'right' ); ?>

</div>
<!-- end content container -->

<?php get_footer(); ?>

