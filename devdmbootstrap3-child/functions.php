<?php
add_action( 'after_setup_theme', 'parent_override' );
add_action( 'after_setup_theme', 'my_child_theme_locale' );

function parent_override() {

unregister_sidebar('right_sidebar');
        register_sidebar(
            array(
            'name' => 'Right Sidebar',
            'id' => 'right-sidebar',
            'before_widget' => '
			<aside id="%1$s" class="widget %2$s">
			<div class="panel panel-default">
				<div class="panel-heading">
			',
            'after_widget' => '
			</div>
			</div>
			</aside>',
            'before_title' => '<h3 class="panel-title">',
            'after_title' => '
			</h3>
			</div>
			<div class="panel-body">',
        ));
}

function my_child_theme_locale() {
    load_child_theme_textdomain( 'devdmbootstrap3-child', get_stylesheet_directory() . '/languages' );
}

?>