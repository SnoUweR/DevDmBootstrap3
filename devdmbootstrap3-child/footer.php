    <div class="dmbs-footer">
        <?php
            global $dm_settings;
            if ($dm_settings['author_credits'] != 0) : ?>
                <div class="row dmbs-author-credits text-center">
					<p>&copy; <?php echo ax_first_post_date("Y"); ?> - <?php echo date('Y'); ?> <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>. <?php echo __('All Rights Reserved', 'devdmbootstrap3-child') ?>.</p>
					<p><?php printf( __( 'Template based on: %1$s by %2$s with many changes by %3$s.', 'devdmbootstrap3-child' ), '<a href="'.esc_url( 'http://devdm.com/DevDmBootstrap3/' ).'" title="'.esc_attr('Twitter Bootstrap 3 WordPress Starter Theme for Developers').'">DevDmBootstrap3</a>', 'Danny M', '<a href="'.esc_url( 'http://me.snouwer.ru/' ).'" title="'.esc_attr('Vladislav Kovalev').'">SnoUweR</a>' ); ?></p>
                </div>
        <?php endif; ?>

        <?php get_template_part('template-part', 'footernav'); ?>
    </div>

</div>
<!-- end main container -->

<?php wp_footer(); ?>
</body>
</html>