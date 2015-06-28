    <div class="dmbs-footer">
        <?php
            global $dm_settings;
            if ($dm_settings['author_credits'] != 0) : ?>
                <div class="row dmbs-author-credits text-center">
						<?php printf( __( 'Template based on: %1$s by %2$s with many changes by %3$s.', 'devdmbootstrap3-child' ), '<a href="'.esc_url( 'http://devdm.com/DevDmBootstrap3/' ).'" title="'.esc_attr('Twitter Bootstrap 3 WordPress Starter Theme for Developers').'">DevDmBootstrap3</a>', 'Danny M', '<a href="'.esc_url( 'http://me.snouwer.ru/' ).'" title="'.esc_attr('Vladislav Kovalev').'">SnoUweR</a>' ); ?>
                </div>
        <?php endif; ?>

        <?php get_template_part('template-part', 'footernav'); ?>
    </div>

</div>
<!-- end main container -->

<?php wp_footer(); ?>
</body>
</html>