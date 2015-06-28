<?php
add_action( 'after_setup_theme', 'parent_override' );
add_action( 'after_setup_theme', 'my_child_theme_locale' );

// Если буду использовать wp-pagenavi с бутстрапом, то раскомментировать
//add_filter( 'wp_pagenavi', 'ik_pagination', 10, 2 );


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

function pagination_bar() {
    global $wp_query;
 
    $total_pages = $wp_query->max_num_pages;
 
    if ($total_pages > 1){
        $current_page = max(1, get_query_var('paged'));
 
        echo paginate_links(array(
            'base' => get_pagenum_link(1) . '%_%',
            'format' => '/page/%#%',
            'current' => $current_page,
            'total' => $total_pages,
        ));
    }
}

// Bootstrap pagination function
// http://fellowtuts.com/wordpress/bootstrap-3-pagination-in-wordpress/
function wp_bs_pagination($pages = '', $range = 4)
{  
     $showitems = ($range * 2) + 1;  
     global $paged;
     if(empty($paged)) $paged = 1;
     if($pages == '')
	{
         global $wp_query; 
		 $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }  
     if(1 != $pages)
     {
        echo '<div class="text-center">'; 
        echo '<nav><ul class="pagination"><li class="disabled hidden-xs"><span><span aria-hidden="true">';
		echo sprintf( __( 'Page %1$s of %2$s', 'devdmbootstrap3-child'), $paged, $pages); 
		echo '</span></span></li>';
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."' aria-label='First'>&laquo;<span class='hidden-xs'> First</span></a></li>";
         if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."' aria-label='Previous'>&lsaquo;<span class='hidden-xs'> Previous</span></a></li>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<li class=\"active\"><span>".$i." <span class=\"sr-only\">(current)</span></span>

    </li>":"<li><a href='".get_pagenum_link($i)."'>".$i."</a></li>";

             }
         }
         if ($paged < $pages && $showitems < $pages) echo "<li><a href=\"".get_pagenum_link($paged + 1)."\"  aria-label='Next'><span class='hidden-xs'>Next </span>&rsaquo;</a></li>";  

         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($pages)."' aria-label='Last'><span class='hidden-xs'>Last </span>&raquo;</a></li>";
         echo "</ul></nav>";
         echo "</div>";
     }
}

?>