<?php

// Register sidebar
//////////////////////////////////////////////////////////////////
if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name' => 'Sidebar',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));
}

// Register menus
/////////////////////////////////////////
add_action('init', 'register_my_menus');
function register_my_menus() {
	register_nav_menus(array(
		'main-menu' => __('Main Menu'),
		'top-menu' => __('Top Menu')
	));
}

// Post thumbnails
//////////////////////////////////////////////////////////////////
if (function_exists('add_theme_support')) {
	add_theme_support('post-thumbnails');
	add_image_size('releated-thumb', 128, 72, true);
	add_image_size('category-thumb', 288, 162, true);
	add_image_size('post-thumb', 512, 256, true);
}

// Month in Armenian
//////////////////////////////////////////////////////////////////
function arm_month($Mnumber, $Mlong) {
	if ($Mlong == 'long') {
		if ($Mnumber == 1) return 'հունվար';
		elseif ($Mnumber == 2) return 'փետրվար';
		elseif ($Mnumber == 3) return 'մարտ';
		elseif ($Mnumber == 4) return 'ապրիլ';
		elseif ($Mnumber == 5) return 'մայիս';
		elseif ($Mnumber == 6) return 'հունիս';
		elseif ($Mnumber == 7) return 'հուլիս';
		elseif ($Mnumber == 8) return 'օգոստոս';
		elseif ($Mnumber == 9) return 'սեպտեմբեր';
		elseif ($Mnumber == 10) return 'հոկտեմբեր';
		elseif ($Mnumber == 11) return 'նոյեմբեր';
		elseif ($Mnumber == 12) return 'դեկտեմբեր';
	}
	elseif ($Mlong == 'short') {
		if ($Mnumber == 1) return 'հնվ.';
		elseif ($Mnumber == 2) return 'փտվ.';
		elseif ($Mnumber == 3) return 'մրտ.';
		elseif ($Mnumber == 4) return 'ապր.';
		elseif ($Mnumber == 5) return 'մյս.';
		elseif ($Mnumber == 6) return 'հնս.';
		elseif ($Mnumber == 7) return 'հլս.';
		elseif ($Mnumber == 8) return 'օգս.';
		elseif ($Mnumber == 9) return 'սպտ.';
		elseif ($Mnumber == 10) return 'հկտ.';
		elseif ($Mnumber == 11) return 'նյմ.';
		elseif ($Mnumber == 12) return 'դկտ.';
	}
}

function arm_weekday($Wnumber) {
	if ($Wnumber == 1) return 'երկեւշաբթի';
	elseif ($Wnumber == 2) return 'երեքշաբթի';
	elseif ($Wnumber == 3) return 'չորեքշաբթի';
	elseif ($Wnumber == 4) return 'հինգշաբթի';
	elseif ($Wnumber == 5) return 'ուրբաթ';
	elseif ($Wnumber == 6) return 'շաբաթ';
	elseif ($Wnumber == 0) return 'կիրակի';
}

// Pagination
//////////////////////////////////////////////////////////////////
function pagination($pages = '', $range = 3) {  
	$showitems = ($range * 2)+1;
	global $paged;
	if(empty($paged)) $paged = 1;
	if($pages == '') {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages) {
			$pages = 1;
		}
	}
	if(1 != $pages) {
		echo '<div class="pagination">';
		if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo '<a href="'.get_pagenum_link(1).'">&laquo;</a>';
		if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";
		for ($i=1; $i <= $pages; $i++) {
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
				echo ($paged == $i)? '<span>'.$i.'</span>':'<a href="'.get_pagenum_link($i).'" >'.$i.'</a>';
			}
		}
		if ($paged < $pages && $showitems < $pages) echo '<a href="'.get_pagenum_link($paged + 1).'">&rsaquo;</a>';  
		if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo '<a href="'.get_pagenum_link($pages).'">&raquo;</a>';
		echo '</div>';
	}
}

// Related Posts
//////////////////////////////////////////////////////////
function get_related_posts($post_id, $tags = array()) {
	$query = new WP_Query();	
	$post_types = get_post_types();
	unset($post_types['page'], $post_types['attachment'], $post_types['revision'], $post_types['nav_menu_item']);	
	if($tags) {
		foreach($tags as $tag) {
			$tagsA[] = $tag->term_id;
		}
	}	
	$args = wp_parse_args($args, array(
		'showposts' => 4,
		'post_type' => $post_types,
		'post__not_in' => array($post_id),
		'tag__in' => $tagsA,
		'ignore_sticky_posts' => 1,
	));	
	$query = new WP_Query($args);	
  	return $query;
}

//Set Post Views Count
//////////////////////////////////////////////////////////
function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count=='') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

//Get Post Views Count
//////////////////////////////////////////////////////////
function wpb_get_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return '0';
    }
    return $count;
}

// Post keywords
//////////////////////////////////////////////////////////
function meta_post_keywords() {
	$posttags = get_the_tags();
	foreach((array)$posttags as $tag) {
		$meta_post_keywords .= $tag->name . ', ';
	}
	echo $meta_post_keywords;
}

// wordpress gallery stuff
//////////////////////////////////////////////////////////
add_filter('use_default_gallery_style', '__return_false');

// Breadcrumb
//////////////////////////////////////////////////////////////////
function dimox_breadcrumbs() {

	/* === OPTIONS === */
	$text['home']     = 'Լուրեր'; // text for the 'Home' link
	$text['category'] = 'Archive by Category "%s"'; // text for a category page
	$text['search']   = 'Search Results for "%s" Query'; // text for a search results page
	$text['tag']      = 'Posts Tagged "%s"'; // text for a tag page
	$text['author']   = 'Articles Posted by %s'; // text for an author page
	$text['404']      = 'Error 404'; // text for the 404 page

	$show_current   = 0; // 1 - show current post/page/category title in breadcrumbs, 0 - don't show
	$show_on_home   = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
	$show_home_link = 1; // 1 - show the 'Home' link, 0 - don't show
	$show_title     = 1; // 1 - show the title for the links, 0 - don't show
	$delimiter      = ' &raquo; '; // delimiter between crumbs
	$before         = '<span class="current">'; // tag before the current crumb
	$after          = '</span>'; // tag after the current crumb
	/* === END OF OPTIONS === */

	global $post;
	$home_link    = home_url('/');
	$link_before  = '<span typeof="v:Breadcrumb">';
	$link_after   = '</span>';
	$link_attr    = ' rel="v:url" property="v:title"';
	$link         = $link_before . '<a' . $link_attr . ' href="%1$s">%2$s</a>' . $link_after;
	$parent_id    = $parent_id_2 = $post->post_parent;
	$frontpage_id = get_option('page_on_front');

	if (is_home() || is_front_page()) {

		if ($show_on_home == 1) echo '<div class="breadcrumbs"><a href="' . $home_link . '">' . $text['home'] . '</a></div>';

	} else {

		echo '<div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">';
		if ($show_home_link == 1) {
			echo sprintf($link, $home_link, $text['home']);
			if ($frontpage_id == 0 || $parent_id != $frontpage_id) echo $delimiter;
		}

		if ( is_category() ) {
			$this_cat = get_category(get_query_var('cat'), false);
			if ($this_cat->parent != 0) {
				$cats = get_category_parents($this_cat->parent, TRUE, $delimiter);
				if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
				$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
				$cats = str_replace('</a>', '</a>' . $link_after, $cats);
				if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
				echo $cats;
			}
			if ($show_current == 1) echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;

		} elseif ( is_search() ) {
			echo $before . sprintf($text['search'], get_search_query()) . $after;

		} elseif ( is_day() ) {
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
			echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
			echo $before . get_the_time('d') . $after;

		} elseif ( is_month() ) {
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
			echo $before . get_the_time('F') . $after;

		} elseif ( is_year() ) {
			echo $before . get_the_time('Y') . $after;

		} elseif ( is_single() && !is_attachment() ) {
			if ( get_post_type() != 'post' ) {
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				printf($link, $home_link . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
				if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;
			} else {
				foreach((get_the_category()) as $cat2) {if (($cat2 !== "Լրահոս") || ($cat2 !== "Slideshow")) {$cat = $cat2;}}
				$cats = get_category_parents($cat, TRUE, $delimiter);
				if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
				$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
				$cats = str_replace('</a>', '</a>' . $link_after, $cats);
				if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
				echo $cats;
				if ($show_current == 1) echo $before . get_the_title() . $after;
			}

		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
			$post_type = get_post_type_object(get_post_type());
			echo $before . $post_type->labels->singular_name . $after;

		} elseif ( is_attachment() ) {
			$parent = get_post($parent_id);
			$cat = get_the_category($parent->ID); $cat = $cat[0];
			$cats = get_category_parents($cat, TRUE, $delimiter);
			$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
			$cats = str_replace('</a>', '</a>' . $link_after, $cats);
			if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
			echo $cats;
			printf($link, get_permalink($parent), $parent->post_title);
			if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;

		} elseif ( is_page() && !$parent_id ) {
			if ($show_current == 1) echo $before . get_the_title() . $after;

		} elseif ( is_page() && $parent_id ) {
			if ($parent_id != $frontpage_id) {
				$breadcrumbs = array();
				while ($parent_id) {
					$page = get_page($parent_id);
					if ($parent_id != $frontpage_id) {
						$breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
					}
					$parent_id = $page->post_parent;
				}
				$breadcrumbs = array_reverse($breadcrumbs);
				for ($i = 0; $i < count($breadcrumbs); $i++) {
					echo $breadcrumbs[$i];
					if ($i != count($breadcrumbs)-1) echo $delimiter;
				}
			}
			if ($show_current == 1) {
				if ($show_home_link == 1 || ($parent_id_2 != 0 && $parent_id_2 != $frontpage_id)) echo $delimiter;
				echo $before . get_the_title() . $after;
			}

		} elseif ( is_tag() ) {
			echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;

		} elseif ( is_author() ) {
	 		global $author;
			$userdata = get_userdata($author);
			echo $before . sprintf($text['author'], $userdata->display_name) . $after;

		} elseif ( is_404() ) {
			echo $before . $text['404'] . $after;
		}

		if ( get_query_var('paged') ) {
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
			echo __('Page') . ' ' . get_query_var('paged');
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
		}

		echo '</div>';

	}
} // end dimox_breadcrumbs()

?>