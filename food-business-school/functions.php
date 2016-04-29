<?php 

error_reporting( E_ERROR | E_WARNING | E_PARSE );
ini_set( 'display_errors', 1 );

/*
 * Why was this here in the first place?
add_action( 'wp_enqueue_scripts', 'sd_frontend_script_and_style', 100, 0 );
function sd_frontend_script_and_style() {
  if(tribe_is_month()) {
  	wp_dequeue_script( 'tribe-events-calendar' );
  }
}
*/

// Hide Admin Bar for Nav Testing
add_filter('show_admin_bar', '__return_false');


//	REGISTER CUSTOM POST TYPES – Courses / Faculty	//

//COURSES Post Type

function create_courses_cpt() {
  register_post_type( 'fbs_courses', 
    array(
      'public' => true,
      'has_archive' => true,
      'menu_position' => 26, // places menu item directly below Posts
      'menu_icon' => '',
      'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
      'labels' => array(
        'name' => __( 'Courses' ),
        'singular_name' => __( 'Course' ),
        'add_new' => __( 'Add New' ),
        'add_new_item' => __( 'Add New Course' ),
        'edit' => __( 'Edit' ),
        'edit_item' => __( 'Edit Course' ),
        'new_item' => __( 'New Course' ),
        'view' => __( 'View Courses' ),
        'view_item' => __( 'View Course' ),
        'search_items' => __( 'Search Courses' ),
        'not_found' => __( 'No Courses found' ),
        'not_found_in_trash' => __( 'No Courses found in Trash' ),
        'parent' => __( 'Parent Course' ),
        ),
	  'rewrite' => array( 'slug' => 'courses' ),	
    )
  );
}
add_action( 'init', 'create_courses_cpt' );

//FACULTY Post Type

function create_faculty_cpt() {
  register_post_type( 'fbs_faculty', 
    array(
      'public' => true,
      'has_archive' => true,
      'menu_position' => 27, // places menu item directly below Posts
      'menu_icon' => '',
      'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
      'labels' => array(
        'name' => __( 'Faculty' ),
        'singular_name' => __( 'Faculty' ),
        'add_new' => __( 'Add New' ),
        'add_new_item' => __( 'Add New Faculty' ),
        'edit' => __( 'Edit' ),
        'edit_item' => __( 'Edit Faculty' ),
        'new_item' => __( 'New Faculty' ),
        'view' => __( 'View Faculty' ),
        'view_item' => __( 'View Faculty' ),
        'search_items' => __( 'Search Faculty' ),
        'not_found' => __( 'No Faculty found' ),
        'not_found_in_trash' => __( 'No Faculty found in Trash' ),
        'parent' => __( 'Parent Faculty' ),
        ),
	  'rewrite' => array( 'slug' => 'faculty' ),	
    )
  );
}
add_action( 'init', 'create_faculty_cpt' );

//NEWS Post Type

function create_news_cpt() {
  register_post_type( 'fbs_news', 
    array(
      'public' => true,
      'has_archive' => true,
      'menu_position' => 28, // places menu item directly below Posts
      'menu_icon' => '',
      'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
      'labels' => array(
        'name' => __( 'News/PR' ),
        'singular_name' => __( 'News/PR' ),
        'add_new' => __( 'Add New' ),
        'add_new_item' => __( 'Add New News/PR' ),
        'edit' => __( 'Edit' ),
        'edit_item' => __( 'Edit News/PR' ),
        'new_item' => __( 'New News/PR' ),
        'view' => __( 'View News/PR' ),
        'view_item' => __( 'View News/PR' ),
        'search_items' => __( 'Search News/PR' ),
        'not_found' => __( 'No News found' ),
        'not_found_in_trash' => __( 'No News found in Trash' ),
        'parent' => __( 'Parent News' ),
        ),
	  'rewrite' => array( 'slug' => 'updates' ),	
    )
  );
}
add_action( 'init', 'create_news_cpt' );

//IMAGE BLOCKS Post Type

function create_imageblocks_cpt() {
  register_post_type( 'fbs_imageblocks', 
    array(
      'public' => true,
      'has_archive' => true,
      'menu_position' => 28, // places menu item directly below Posts
      'menu_icon' => '',
      'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
      'exclude_from_search' => true,
      'labels' => array(
        'name' => __( 'Image Blocks' ),
        'singular_name' => __( 'Image Block' ),
        'add_new' => __( 'Add New' ),
        'add_new_item' => __( 'Add New Image Block' ),
        'edit' => __( 'Edit' ),
        'edit_item' => __( 'Edit Image Block' ),
        'new_item' => __( 'New Image Block' ),
        'view' => __( 'View Image Blocks' ),
        'view_item' => __( 'View Image Block' ),
        'search_items' => __( 'Search Image Blocks' ),
        'not_found' => __( 'No Image Blocks found' ),
        'not_found_in_trash' => __( 'No Image Blocks found in Trash' ),
        'parent' => __( 'Parent Image Blocks' ),
        ),
	  'rewrite' => array( 'slug' => 'imageblocks' ),	
    )
  );
}
add_action( 'init', 'create_imageblocks_cpt' );

//FAQs Post Type

function create_faq_cpt() {
  register_post_type( 'fbs_faq', 
    array(
      'public' => true,
      'has_archive' => true,
      'menu_position' => 29, // places menu item directly below Posts
      'menu_icon' => '',
      'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
      'labels' => array(
        'name' => __( 'FAQs' ),
        'singular_name' => __( 'FAQ' ),
        'add_new' => __( 'Add New' ),
        'add_new_item' => __( 'Add New FAQ' ),
        'edit' => __( 'Edit' ),
        'edit_item' => __( 'Edit FAQ' ),
        'new_item' => __( 'New FAQ' ),
        'view' => __( 'View FAQs' ),
        'view_item' => __( 'View FAQ' ),
        'search_items' => __( 'Search FAQs' ),
        'not_found' => __( 'No FAQs found' ),
        'not_found_in_trash' => __( 'No FAQs found in Trash' ),
        'parent' => __( 'Parent FAQ' ),
        ),
	  'rewrite' => array( 'slug' => 'faq' ),	
    )
  );
}
add_action( 'init', 'create_faq_cpt' );

 
function add_menu_icons_styles(){
?>
 
<style>
#adminmenu .menu-icon-fbs_faculty div.wp-menu-image:before { content: "\f307"; color: #da642f; }
#adminmenu .menu-icon-fbs_courses div.wp-menu-image:before { content: "\f511"; color: #da642f; }
#adminmenu .menu-icon-fbs_news div.wp-menu-image:before { content: "\f123"; color: #da642f; }
#adminmenu .menu-icon-fbs_imageblocks div.wp-menu-image:before { content: "\f128"; color: #da642f; }
#adminmenu .menu-icon-fbs_faq div.wp-menu-image:before { content: "\f223"; color: #da642f; }

</style>
 
<?php
}
add_action( 'admin_head', 'add_menu_icons_styles' );


//	REGISTER CUSTOM TAXONOMIES – Course Type / Audience	//

// hook into the init action and call create_fbs_taxonomies when it fires
add_action( 'init', 'create_fbs_taxonomies', 0 );

// create taxonomies
function create_fbs_taxonomies() {
	
	// Add new taxonomy Course Type, make it hierarchical (like categories - checkboxes)
	$labels = array(
		'name'              => _x( 'Course Type', 'taxonomy general name' ),
		'singular_name'     => _x( 'Course Type', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Course Type' ),
		'all_items'         => __( 'All Course Types' ),
		'parent_item'       => __( 'Parent Course Type' ),
		'parent_item_colon' => __( 'Parent Course Type:' ),
		'edit_item'         => __( 'Edit Course Type' ),
		'update_item'       => __( 'Update Course Type' ),
		'add_new_item'      => __( 'Add New Course Type' ),
		'new_item_name'     => __( 'New Course Type Name' ),
		'menu_name'         => __( 'Course Type' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'course-type' ),
	);

	register_taxonomy( 'course-type', array( 'fbs_courses' ), $args );
	
	
	// Add new taxonomy Audience, make it hierarchical (like categories - checkboxes)
	$labels = array(
		'name'              => _x( 'Audience', 'taxonomy general name' ),
		'singular_name'     => _x( 'Audience', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Audience' ),
		'all_items'         => __( 'All Audience' ),
		'parent_item'       => __( 'Parent Audience' ),
		'parent_item_colon' => __( 'Parent Audience:' ),
		'edit_item'         => __( 'Edit Audience' ),
		'update_item'       => __( 'Update Audience' ),
		'add_new_item'      => __( 'Add New Audience' ),
		'new_item_name'     => __( 'New Audience Name' ),
		'menu_name'         => __( 'Audience' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'audience' ),
	);

	register_taxonomy( 'audience', array( 'fbs_courses' ), $args );
	
	// Add new taxonomy Role, make it hierarchical (like categories - checkboxes)
	$labels = array(
		'name'              => _x( 'Role', 'taxonomy general name' ),
		'singular_name'     => _x( 'Roles', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Roles' ),
		'all_items'         => __( 'All Roles' ),
		'parent_item'       => __( 'Parent Role' ),
		'parent_item_colon' => __( 'Parent Role:' ),
		'edit_item'         => __( 'Edit Role' ),
		'update_item'       => __( 'Update Role' ),
		'add_new_item'      => __( 'Add New Role' ),
		'new_item_name'     => __( 'New Role Name' ),
		'menu_name'         => __( 'Role' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'role' ),
	);

	register_taxonomy( 'role', array( 'fbs_faculty' ), $args );

	// Add new taxonomy FAQ Category, make it hierarchical (like categories - checkboxes)
	$labels = array(
		'name'              => _x( 'FAQ Category', 'taxonomy general name' ),
		'singular_name'     => _x( 'FAQ Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search FAQ Categories' ),
		'all_items'         => __( 'All FAQ Categories' ),
		'parent_item'       => __( 'Parent FAQ Category' ),
		'parent_item_colon' => __( 'Parent FAQ Category:' ),
		'edit_item'         => __( 'Edit FAQ Category' ),
		'update_item'       => __( 'Update FAQ Category' ),
		'add_new_item'      => __( 'Add New FAQ Category' ),
		'new_item_name'     => __( 'New FAQ Category Name' ),
		'menu_name'         => __( 'FAQ Categories' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'faq-category' ),
	);

	register_taxonomy( 'faq-category', array( 'fbs_faq' ), $args );
	
	// Add new taxonomy News Type, make it hierarchical (like categories - checkboxes)
	$labels = array(
		'name'              => _x( 'News Type', 'taxonomy general name' ),
		'singular_name'     => _x( 'News Type', 'taxonomy singular name' ),
		'search_items'      => __( 'Search News Types' ),
		'all_items'         => __( 'All News Type' ),
		'parent_item'       => __( 'Parent News Type' ),
		'parent_item_colon' => __( 'Parent News Types:' ),
		'edit_item'         => __( 'Edit News Type' ),
		'update_item'       => __( 'Update News Type' ),
		'add_new_item'      => __( 'Add New News Type' ),
		'new_item_name'     => __( 'New News Type Name' ),
		'menu_name'         => __( 'News Types' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'news-type' ),
	);

	register_taxonomy( 'news-type', array( 'fbs_news' ), $args );
}

// POST THUMBNAIL SIZES

add_theme_support( 'post-thumbnails', array( 'post', 'page', 'fbs_courses', 'fbs_faculty', 'fbs_news', 'fbs_imageblocks' )  );
	//SET NEW POST THUMBNAIL SIZES
	set_post_thumbnail_size( 150, 150, true ); // Normal Post Thumbnail Block
	add_image_size( 'course-thumb', 350, 260, true );
	add_image_size( 'sm-circle', 160, 160, true );
	add_image_size( 'lg-circle', 380, 380, true );
	add_image_size( 'blog-thumb', 345, 230, true );


// CREATE OUR WIDGET AREAS

function fbs_widgets_init() {

	register_sidebar( array(
		'name' => 'Footer Area #1',
		'id' => 'footer_1',
		'before_widget' => '<div class="col-md-3 col-sm-4">',
		'after_widget' => '</div>',
		//'before_title' => '<h3>',
		//'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => 'Footer Area #2',
		'id' => 'footer_2',
		'before_widget' => '<div class="col-md-4 col-sm-5">',
		'after_widget' => '</div>',
		//'before_title' => '<h3>',
		//'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => 'Footer Area #3',
		'id' => 'footer_3',
		'before_widget' => '<div class="col-md-2 col-sm-3">',
		'after_widget' => '</div>',
		//'before_title' => '<h3>',
		//'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => 'Footer Area #4',
		'id' => 'footer_4',
		'before_widget' => '<div class="col-md-3 col-sm-12">',
		'after_widget' => '</div>',
		//'before_title' => '<h3>',
		//'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => 'Corporate Partners',
		'id' => 'corp_partners',
		'before_widget' => '',
		'after_widget' => '',
		//'before_title' => '<h3>',
		//'after_title' => '</h3>',
	) );
	 register_sidebar( array(
        'name' => __( 'Contact Sidebar', 'food-business-school' ),
        'id' => 'sidebar-1',
        'description' => __( 'Widgets in this area will be shown on Form pages with the sidebar enabled.', 'food-business-school' ),
	'before_widget' => '',
	'after_widget' => '',
    	) );
	register_sidebar( array(
        'name' => __( 'News Sidebar', 'food-business-school' ),
        'id' => 'news-sidebar',
        'description' => __( 'Widgets in this area will be shown on News pages.', 'food-business-school' ),
	'before_widget' => '',
	'after_widget' => '',
    	) );
	register_sidebar( array(
        'name' => __( 'Search Sidebar', 'food-business-school' ),
        'id' => 'search-sidebar',
        'description' => __( 'Widgets in this area will be shown on News pages.', 'food-business-school' ),
	'before_widget' => '<div class="row">',
	'after_widget' => '</div>',
    	) );
	register_sidebar( array(
        'name' => __( 'Footer Signup', 'food-business-school' ),
        'id' => 'footer-signup',
        'description' => __( 'This controls the content above the Newsletter Sign Up Form', 'food-business-school' ),
	'before_widget' => '',
	'after_widget' => '',
    	) );
	register_sidebar( array(
        'name' => __( 'Disclaimer Links', 'food-business-school' ),
        'id' => 'disclaimer-links',
        'description' => __( 'These are the links at the very bottom of the page', 'food-business-school' ),
	'before_widget' => '',
	'after_widget' => '',
    	) );
}
add_action( 'widgets_init', 'fbs_widgets_init' );


// REGISTER MENU'S

function register_my_menus() {
 	register_nav_menus(
    	array( 'primary-nav' => __( 'Primary Navigation' ), 'footer-nav' => __( 'Footer Navigation' ), 'mobile-nav' => __( 'Mobile Navigation' ))
  	);
}
add_action( 'init', 'register_my_menus' );

// allow html in category and taxonomy descriptions
remove_filter( 'pre_term_description', 'wp_filter_kses' );
remove_filter( 'pre_link_description', 'wp_filter_kses' );
remove_filter( 'pre_link_notes', 'wp_filter_kses' );
remove_filter( 'term_description', 'wp_kses_data' );

// ADD Search Box to Mobile Nav
add_filter('wp_nav_menu_items','add_search_box', 10, 2); 
  
   
function add_search_box($items, $args) { 
  if ($args->theme_location == 'mobile-nav') {
  
    $items .= '<li><form role="search" method="get" action="http://dev.thefoodbusinessschool.org/"><div class="input-group"><input type="text" name="s" id="s" class="form-control" placeholder="Search..."><span class="input-group-btn"><button class="btn btn-default" type="submit" id="searchsubmit">Go</button></span></div></form></li>'; 
  }
  return $items;    
       
}


// Add Custom Search In Navigation

function custom_searchform(){
 
    $placeholder = __( 'Search' , 'ubermenu' );
 
    $form = '<form class="ubersearch-v2" role="search" method="get" id="searchform-custom" action="' . esc_url( home_url( '/' ) ) . '" >
    <div class="ubersearch"><label class="screen-reader-text" for="s">' . __( 'Search for:' , 'ubermenu' ) . '</label>
    <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="'. $placeholder .'" />
    <input type="submit" id="searchsubmit" value="'. __( 'Search' , 'ubermenu' ) .'" />
    </div>
    </form>';
     
    return $form;
}
add_shortcode('nav-search', 'custom_searchform');

//ADD PAGE SLUG BODY CLASS
function add_slug_body_class( $classes ) {
global $post;
if ( isset( $post ) ) {
$classes[] = $post->post_type . '-' . $post->post_name;
}
return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );

// Send Custom HTTP Headers

function custom_headers() {
	header( 'Vary: User-Agent' );
}
add_action( 'send_headers', 'custom_headers' );

// Enqueue Scripts Selectively by WP Template

function enqueue_selective() {
	wp_register_script( 'fbs_main', get_bloginfo( 'template_url' ) . '/js/main.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'fbs_main' );
	$fbst = wp_basename( $GLOBALS['template'] );
	if ( $fbst == 'page_upcoming-courses.php' ) {
		wp_enqueue_script( 'upcoming-courses-url', get_bloginfo( 'template_url' ) . '/js/upcoming-courses-url.js', array( 'jquery', 'fbs_main' ), false, true );
	} else if ( $fbst == 'taxonomy-course-type.php' ) {
		wp_enqueue_script( 'tax-course-type-url', get_bloginfo( 'template_url' ) . '/js/tax-course-type-url.js', array( 'jquery', 'fbs_main' ), false, true );
	} else if ( $fbst == 'frontpage.php' ) {
		wp_enqueue_script( 'swfobject' );
	}
}
add_action( 'wp_enqueue_scripts', 'enqueue_selective' );


// Add Faculty and Image Tiles Meta Boxes and Custom Fields to Course Post Editor

function output_faculty_box( $post ) {
	$f = new WP_Query( 'post_type=fbs_faculty&posts_per_page=-1' );
	$current_members = array();
	foreach ( $f->posts as $i => $fm ) {
		$current_members[$i]['id'] = $fm->ID;
		$current_members[$i]['name'] = $fm->post_title;
		$current_members[$i]['checked'] = '';
	}
	$saved_members = get_post_meta( $post->ID, 'attached_faculty' );
	if ( empty( $saved_members ) ) {
		add_post_meta( $post->ID, 'attached_faculty', $current_members, true );
	} else {
		$saved_members = $saved_members[0];
		$cmn = count( $current_members );
		$smn = count( $saved_members );
		for ( $i = 0; $i < $cmn; $i++ ) {
			for ( $j = 0; $j < $smn; $j++ ) {
				if ( $current_members[$i]['id'] == $saved_members[$j]['id'] ) {
					$current_members[$i]['checked'] = $saved_members[$j]['checked'];
				}
			}
		}
		update_post_meta( $post->ID, 'attached_faculty', $current_members );
	}
	print '<div style="max-height:200px; overflow-y:auto;">';
	foreach ( $current_members as $cr ) {
		print '<input type="checkbox" name="fm_' . $cr['id'] . '" value="1" ' . $cr['checked'] . '>' . $cr['name'] . '<br>';
	}
	print '</div>';
}

function output_image_tiles( $post ) {
	$t = new WP_Query( 'post_type=fbs_imageblocks&posts_per_page=-1' );
	$current_tiles = array();
	foreach ( $t->posts as $i => $it ) {
		$current_tiles[$i]['id'] = $it->ID;
		$current_tiles[$i]['title'] = $it->post_title;
		$current_tiles[$i]['checked'] = '';
	}
	$saved_tiles = get_post_meta( $post->ID, 'image_blocks' );
	if ( empty( $saved_tiles ) ) {
		add_post_meta( $post->ID, 'image_blocks', $current_tiles, true );
	} else {
		$saved_tiles = $saved_tiles[0];
		$ctn = count( $current_tiles );
		$stn = count( $saved_tiles );
		for ( $i = 0; $i < $ctn; $i++ ) {
			for ( $j = 0; $j < $stn; $j++ ) {
				if ( $current_tiles[$i]['id'] == $saved_tiles[$j]['id'] ) {
					$current_tiles[$i]['checked'] = $saved_tiles[$j]['checked'];
				}
			}
		}
		update_post_meta( $post->ID, 'image_blocks', $current_tiles );
	}
	print '<div style="max-height:200px; overflow-y:auto;">';
	foreach ( $current_tiles as $ct ) {
		print '<input type="checkbox" name="it_' . $ct['id'] . '" value="1" ' . $ct['checked'] . '>' . $ct['title'] . '<br>';
	}
	print '</div>';
}

function fbs_examine_var( $obj ) {
	$fp = fopen( __DIR__ . '/examine_var.txt', 'a' );
	if ( is_object( $obj ) || is_array( $obj ) ) {
		fwrite( $fp, print_r( $obj, true ) );
	} else if ( is_string( $obj ) || is_numeric( $obj ) ) {
		fwrite( $fp, $obj );
	}
	fclose( $fp );
}

function save_fbs_metas( $id, $post ) {
	if ( $post->post_type == 'fbs_courses' ) {
		// attached faculty
		$saved_members = get_post_meta( $id, 'attached_faculty' );
		if ( !empty( $saved_members ) ) {
			$saved_members = $saved_members[0];
			$smn = count( $saved_members );
			for ( $i = 0; $i < $smn; $i++ ) {
				if ( !isset( $_POST['fm_' . $saved_members[$i]['id']] ) ) {
					$saved_members[$i]['checked'] = '';
				} else {
					$saved_members[$i]['checked'] = 'checked';
				}
			}
			update_post_meta( $id, 'attached_faculty', $saved_members );
		}
		// attached image blocks
		$saved_tiles = get_post_meta( $id, 'image_blocks' );
		if ( !empty( $saved_tiles ) ) {
			$saved_tiles = $saved_tiles[0];
			$stn = count( $saved_tiles );
			for ( $i = 0; $i < $stn; $i++ ) {
				if ( !isset( $_POST['it_' . $saved_tiles[$i]['id']] ) ) {
					$saved_tiles[$i]['checked'] = '';
				} else {
					$saved_tiles[$i]['checked'] = 'checked';
				}
			}
			update_post_meta( $id, 'image_blocks', $saved_tiles );
		}
	} else if ( $post->post_type == 'page' ) {
		$saved_tiles = get_post_meta( $id, 'page_image_blocks' );
		if ( !empty( $saved_tiles ) ) {
			$saved_tiles = $saved_tiles[0];
			$stn = count( $saved_tiles );
			for ( $i = 0; $i < $stn; $i++ ) {
				if ( !isset( $_POST['it_' . $saved_tiles[$i]['id']] ) ) {
					$saved_tiles[$i]['checked'] = '';
				} else {
					$saved_tiles[$i]['checked'] = 'checked';
				}
			}
			update_post_meta( $id, 'page_image_blocks', $saved_tiles );
		}
	}
}
add_action( 'save_post', 'save_fbs_metas', 10, 2 );

function save_fbs_course_event( $id, $post ) {
	$sd = get_post_meta( $id, 'start_date', true );
	$ed = get_post_meta( $id, 'end_date', true );
	if (
		$post->post_type == 'fbs_courses' &&
		$post->post_status !== 'inherit' &&
		$post->post_status !== 'auto-draft' &&
		function_exists( 'tribe_create_event' ) &&
		$sd !== '' &&
		$ed !== ''
	) {
		global $wpdb;
		$wpdb->query( "
			SELECT wp_posts.ID, wp_posts.post_title, wp_posts.post_author, wp_posts.post_status, wp_posts.post_content, wp_posts.post_excerpt
			FROM wp_posts
			INNER JOIN wp_postmeta
			ON wp_posts.ID = wp_postmeta.post_id
			WHERE wp_posts.post_type = 'tribe_events'
			AND (
				wp_posts.post_status = 'publish' OR
				wp_posts.post_status = 'private' OR
				wp_posts.post_status = 'draft' OR
				wp_posts.post_status = 'pending' OR
				wp_posts.post_status = 'future' OR
				wp_posts.post_status = 'trash'
			)
			AND wp_postmeta.meta_key = '_fbs_attached_course_post_id'
			AND wp_postmeta.meta_value = $id
			LIMIT 1;
		" );
		$ev_post = $wpdb->last_result;
		remove_action( 'save_post', 'save_fbs_metas' );
		if ( !empty( $ev_post ) ) {
			tribe_update_event(
				$ev_post[0]->ID,
				array(
					'post_type' => 'tribe_events',
					'post_title' => $post->post_title,
					'post_author' => $post->post_author,
					'post_status' => $post->post_status,
					'post_content' => $post->post_content,
					'post_excerpt' => $post->post_excerpt,
					'EventStartDate' => $sd,
					'EventEndDate' => $ed,
					'EventAllDay' => true
				)
			);
		} else {
			$np = tribe_create_event( array(
				'post_name' => $post->post_name . '-auto-event',
				'post_title' => $post->post_title,
				'post_author' => $post->post_author,
				'post_status' => $post->post_status,
				'post_content' => $post->post_content,
				'post_excerpt' => $post->post_excerpt,
				'EventStartDate' => $sd,
				'EventEndDate' => $ed,
				'EventAllDay' => true
			) );
			if ( $np !== false ) {
				add_post_meta( $np, '_fbs_attached_course_post_id', $id, true );
			}
		}
	}
}
add_action( 'save_post', 'save_fbs_course_event', 11, 2 );

function delete_fbs_course_event( $id ) {
	global $post_type;
	if (
		$post_type === 'fbs_courses' &&
		function_exists( 'tribe_delete_event' )
	) {
		global $wpdb;
		$wpdb->query( "
			SELECT wp_posts.ID, wp_posts.post_title, wp_posts.post_author, wp_posts.post_status, wp_posts.post_content, wp_posts.post_excerpt
			FROM wp_posts
			INNER JOIN wp_postmeta
			ON wp_posts.ID = wp_postmeta.post_id
			WHERE wp_posts.post_type = 'tribe_events'
			AND (
				wp_posts.post_status = 'publish' OR
				wp_posts.post_status = 'private' OR
				wp_posts.post_status = 'draft' OR
				wp_posts.post_status = 'pending' OR
				wp_posts.post_status = 'future' OR
				wp_posts.post_status = 'trash'
			)
			AND wp_postmeta.meta_key = '_fbs_attached_course_post_id'
			AND wp_postmeta.meta_value = $id
			LIMIT 1;
		" );
		$ev_post = $wpdb->last_result;
		if ( !empty( $ev_post ) ) {
			remove_action( 'before_delete_post', 'delete_fbs_course_event' );
			tribe_delete_event( $ev_post[0]->ID, true );
		}
	}
}
add_action( 'before_delete_post', 'delete_fbs_course_event' );

function add_fbs_course_metas() {
	// faculty box
	add_meta_box(
		'attach_faculty',
		'Course Faculty',
		'output_faculty_box',
		'fbs_courses',
		'side'
	);
	// image block box
	add_meta_box(
		'image_tiles',
		'Image Blocks',
		'output_image_tiles',
		'fbs_courses',
		'side'
	);
}
add_action( 'add_meta_boxes_fbs_courses', 'add_fbs_course_metas' );


// Add Image Tiles Meta Boxes and Custom Field to Page Editor

function output_page_blocks( $post ) {
	$t = new WP_Query( 'post_type=fbs_imageblocks&posts_per_page=-1' );
	$current_tiles = array();
	foreach ( $t->posts as $i => $it ) {
		$current_tiles[$i]['id'] = $it->ID;
		$current_tiles[$i]['title'] = $it->post_title;
		$current_tiles[$i]['checked'] = '';
	}
	$saved_tiles = get_post_meta( $post->ID, 'page_image_blocks' );
	if ( empty( $saved_tiles ) ) {
		add_post_meta( $post->ID, 'page_image_blocks', $current_tiles, true );
	} else {
		$saved_tiles = $saved_tiles[0];
		$ctn = count( $current_tiles );
		$stn = count( $saved_tiles );
		for ( $i = 0; $i < $ctn; $i++ ) {
			for ( $j = 0; $j < $stn; $j++ ) {
				if ( $current_tiles[$i]['id'] == $saved_tiles[$j]['id'] ) {
					$current_tiles[$i]['checked'] = $saved_tiles[$j]['checked'];
				}
			}
		}
		update_post_meta( $post->ID, 'page_image_blocks', $current_tiles );
	}
	print '<div style="max-height:200px; overflow-y:auto;">';
	foreach ( $current_tiles as $ct ) {
		print '<input type="checkbox" name="it_' . $ct['id'] . '" value="1" ' . $ct['checked'] . '>' . $ct['title'] . '<br>';
	}
	print '</div>';
}

function add_page_metas() {
	add_meta_box(
		'image_tiles',
		'Image Blocks',
		'output_page_blocks',
		'page',
		'side'
	);
}
add_action( 'add_meta_boxes_page', 'add_page_metas' );


// Forward Footer Join Form Data to Signup Page

function join_email( $content, $field, $value, $lead_id, $form_id ) {
	if ( $form_id == 3 && $field['id'] == 3 && !empty( $_POST['join_email'] ) ) {
		$content = preg_replace( "/value=''/", 'value="' . $_POST['join_email'] . '"', $content );
	}
	return $content;
}
add_filter( 'gform_field_content', 'join_email', 10, 5 );

function fbsdf( $cpt_date ){
	$new_date = date_create_from_format( 'Y-m-d', $cpt_date );
	print date_format( $new_date, 'M j' );
}
