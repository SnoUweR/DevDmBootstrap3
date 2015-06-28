<?php
add_action( 'after_setup_theme', 'parent_override' );
add_action( 'after_setup_theme', 'my_child_theme_locale' );
add_filter( 'wp_pagenavi', 'ik_pagination', 10, 2 );


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
  
//customize the PageNavi HTML before it is output
//http://calebserna.com/bootstrap-wordpress-pagination-wp-pagenavi/
function ik_pagination($html) {
    $out = '';
  
    //wrap a's and span's in li's
    $out = str_replace("<div","",$html);
    $out = str_replace("class='wp-pagenavi'>","",$out);
    $out = str_replace("<a","<li><a",$out);
    $out = str_replace("</a>","</a></li>",$out);
	// как же я люблю лютые костыли
	// не бейте меня за это пожалуйста
	$out = str_replace("<span class='current'>", "<li class='active'><span class='current'>", $out);
    $out = str_replace("<span>","<li><span>",$out);  
	$out = str_replace("<span class='pages'>", "<li class='pages'><span class='pages'>", $out);
	$out = str_replace("<span class='extend'>", "<li class='extend'><span class='extend'>", $out);
	$out = str_replace("</span>","</span></li>",$out);
    $out = str_replace("</div>","",$out);
  
	
	return '<ul class="pagination pagination-centered">'.$out.'</ul>';
}

?>