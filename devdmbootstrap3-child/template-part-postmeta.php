<div class="row">
    <div class="col-md-12 post-header-line">

<?php global $dm_settings; ?>
<?php if ($dm_settings['show_postmeta'] != 0) : ?>
        <span class="glyphicon glyphicon-user"></span> <?php the_author_posts_link(); ?> | 
        <span class="glyphicon glyphicon-calendar"></span> <?php the_time('F jS, Y'); ?> | 
        <i class="glyphicon glyphicon-edit"></i> <?php edit_post_link(__('Edit','devdmbootstrap3')); ?> | 
        <span class="glyphicon glyphicon-circle-arrow-right"></span> <?php the_category(', '); ?>
        <?php if( has_tag() ) : ?> | 
            <span class="glyphicon glyphicon-tags"></span> <?php the_tags(); ?>
        <?php endif; ?>
<?php endif; ?>