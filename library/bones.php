<?php
/* Welcome to Bones :)
This is the core Bones file where most of the
main functions & features reside. If you have 
any custom functions, it's best to put them
in the functions.php file.

Developed by: Eddie Machado
URL: http://themble.com/bones/
*/

// Adding Translation Option
load_theme_textdomain( 'bonestheme', TEMPLATEPATH.'/languages' );
$locale = get_locale();
$locale_file = TEMPLATEPATH."/languages/$locale.php";
if ( is_readable($locale_file) ) require_once($locale_file);

// Cleaning up the Wordpress Head
function bones_head_cleanup() {
	// remove header links
	remove_action( 'wp_head', 'feed_links_extra', 3 );                    // Category Feeds
	remove_action( 'wp_head', 'feed_links', 2 );                          // Post and Comment Feeds
	remove_action( 'wp_head', 'rsd_link' );                               // EditURI link
	remove_action( 'wp_head', 'wlwmanifest_link' );                       // Windows Live Writer
	remove_action( 'wp_head', 'index_rel_link' );                         // index link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );            // previous link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );             // start link
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 ); // Links for Adjacent Posts
	remove_action( 'wp_head', 'wp_generator' );                           // WP version
	if (!is_admin()) {
		wp_deregister_script('jquery');                                   // De-Register jQuery
		wp_register_script('jquery', '', '', '', true);                   // It's already in the Header
	}	
}
	// launching operation cleanup
	add_action('init', 'bones_head_cleanup');
	// remove WP version from RSS
	function bones_rss_version() { return ''; }
	add_filter('the_generator', 'bones_rss_version');
	
// loading jquery reply elements on single pages automatically
function bones_queue_js(){ if (!is_admin()){ if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) wp_enqueue_script( 'comment-reply' ); }
}
	// reply on comments script
	add_action('wp_print_scripts', 'bones_queue_js');

// Fixing the Read More in the Excerpts
// This removes the annoying […] to a Read More link
function bones_excerpt_more($more) {
	global $post;
	// edit here if you like
	return '...  <a href="'. get_permalink($post->ID) . '" class="more-link" title="Read '.get_the_title($post->ID).'">Read more &raquo;</a>';
}
add_filter('excerpt_more', 'bones_excerpt_more');
	
// Adding WP 3+ Functions & Theme Support
function bones_theme_support() {
	add_theme_support('post-thumbnails');      // wp thumbnails (sizes handled in functions.php)
	set_post_thumbnail_size(125, 125, true);   // default thumb size
	add_theme_support( 'custom-background' );  // wp custom background
	add_theme_support('automatic-feed-links'); // rss thingy
	// to add header image support go here: http://themble.com/support/adding-header-background-image-support/
	// adding post format support
	add_theme_support( 'post-formats',      // post formats
		array( 
			'aside',   // title less blurb
			'gallery', // gallery of images
			'link',    // quick link to other site
			'image',   // an image
			'quote',   // a quick quote
			'status',  // a Facebook like status update
			'video',   // video 
			'audio',   // audio
			'chat'     // chat transcript 
		)
	);	
	add_theme_support( 'menus' );            // wp menus
	register_nav_menus(                      // wp3+ menus
		array( 
			'main_nav' => 'The Main Menu',   // main nav in header
			'footer_links' => 'Footer Links', // secondary nav in footer
			'utility_nav' => 'Utility Navigation' // Utility Navigation in header
		)
	);	
}

	// launching this stuff after theme setup
	add_action('after_setup_theme','bones_theme_support');	
	// adding sidebars to Wordpress (these are created in functions.php)
	add_action( 'widgets_init', 'bones_register_sidebars' );
	// adding the bones search form (created in functions.php)
	add_filter( 'get_search_form', 'bones_wpsearch' );
	

 
function bones_main_nav() {
	// display the wp3 menu if available
    wp_nav_menu( 
    	array( 
    		'menu' => 'main_nav', /* menu name */
    		'menu_class' => 'nav',
    		'theme_location' => 'main_nav', /* where in the theme it's assigned */
    		'container' => 'false', /* container class */
    		'fallback_cb' => 'bones_main_nav_fallback', /* menu fallback */
    		'depth' => '2', /* suppress lower levels for now */
    		'walker' => new description_walker()
    	)
    );
}

function bones_footer_links() { 
	// display the wp3 menu if available
    wp_nav_menu(
    	array(
    		'menu' => 'footer_links', /* menu name */
    		'theme_location' => 'footer_links', /* where in the theme it's assigned */
    		'container_class' => 'footer-links clearfix', /* container class */
    		'fallback_cb' => 'bones_footer_links_fallback' /* menu fallback */
    	)
	);
}
function bones_utility_nav() { 
	// display the wp3 menu if available
    wp_nav_menu(
    	array(
    		'menu' => 'utility_nav', /* menu name */
    		'theme_location' => 'utility_nav', /* where in the theme it's assigned */
    		'container_class' => 'utility_nav clearfix', /* container class */
    		'fallback_cb' => 'bones_utility_nav_fallback', /* menu fallback */
			'depth' => '2', /* suppress lower levels for now */
    		'walker' => new description_walker()
    	)
	);
}
 
// this is the fallback for header menu
function bones_main_nav_fallback() { 
	// Figure out how to make this output bootstrap-friendly html
	//wp_page_menu( 'show_home=Home&menu_class=nav' ); 
}

// this is the fallback for footer menu
function bones_footer_links_fallback() { 
	/* you can put a default here if you like */ 
}

// this is the fallback for utility menu
function bones_utility_nav_fallback() { 
	/* you can put a default here if you like */ 
}

/****************** PLUGINS & EXTRA FEATURES **************************/
	
// Related Posts Function (call using bones_related_posts(); )
function bones_related_posts() {
	echo '<ul id="bones-related-posts">';
	global $post;
	$tags = wp_get_post_tags($post->ID);
	if($tags) {
		foreach($tags as $tag) { $tag_arr .= $tag->slug . ','; }
        $args = array(
        	'tag' => $tag_arr,
        	'numberposts' => 5, /* you can change this to show more */
        	'post__not_in' => array($post->ID)
     	);
        $related_posts = get_posts($args);
        if($related_posts) {
        	foreach ($related_posts as $post) : setup_postdata($post); ?>
	           	<li class="related_post"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
	        <?php endforeach; } 
	    else { ?>
            <li class="no_related_post">No Related Posts Yet!</li>
		<?php }
	}
	wp_reset_query();
	echo '</ul>';
}

// Numeric Page Navi (built into the theme by default)
function page_navi($before = '', $after = '') {
	global $wpdb, $wp_query;
	$request = $wp_query->request;
	$posts_per_page = intval(get_query_var('posts_per_page'));
	$paged = intval(get_query_var('paged'));
	$numposts = $wp_query->found_posts;
	$max_page = $wp_query->max_num_pages;
	if ( $numposts <= $posts_per_page ) { return; }
	if(empty($paged) || $paged == 0) {
		$paged = 1;
	}
	$pages_to_show = 7;
	$pages_to_show_minus_1 = $pages_to_show-1;
	$half_page_start = floor($pages_to_show_minus_1/2);
	$half_page_end = ceil($pages_to_show_minus_1/2);
	$start_page = $paged - $half_page_start;
	if($start_page <= 0) {
		$start_page = 1;
	}
	$end_page = $paged + $half_page_end;
	if(($end_page - $start_page) != $pages_to_show_minus_1) {
		$end_page = $start_page + $pages_to_show_minus_1;
	}
	if($end_page > $max_page) {
		$start_page = $max_page - $pages_to_show_minus_1;
		$end_page = $max_page;
	}
	if($start_page <= 0) {
		$start_page = 1;
	}
		
	echo $before.'<div class="pagination"><ul class="clearfix">'."";
	if ($paged > 1) {
		$first_page_text = "&laquo";
		echo '<li class="prev"><a href="'.get_pagenum_link().'" title="First">'.$first_page_text.'</a></li>';
	}
		
	$prevposts = get_previous_posts_link('&larr; Previous');
	if($prevposts) { echo '<li>' . $prevposts  . '</li>'; }
	else { echo '<li class="disabled"><a href="#">&larr; Previous</a></li>'; }
	
	for($i = $start_page; $i  <= $end_page; $i++) {
		if($i == $paged) {
			echo '<li class="active"><a href="#">'.$i.'</a></li>';
		} else {
			echo '<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
		}
	}
	echo '<li class="">';
	next_posts_link('Next &rarr;');
	echo '</li>';
	if ($end_page < $max_page) {
		$last_page_text = "&raquo;";
		echo '<li class="next"><a href="'.get_pagenum_link($max_page).'" title="Last">'.$last_page_text.'</a></li>';
	}
	echo '</ul></div>'.$after."";
}

// remove the p from around imgs (http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/)
function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

add_filter('the_content', 'filter_ptags_on_images');

// shortcodes
// Gallery shortcode
// remove the standard shortcode
remove_shortcode('gallery', 'gallery_shortcode');
add_shortcode('gallery', 'gallery_shortcode_tbs');
function gallery_shortcode_tbs($attr) {
	global $post, $wp_locale;
	$output = "";
	$args = array( 'post_type' => 'attachment', 'numberposts' => -1, 'post_status' => null, 'post_parent' => $post->ID ); 
	$attachments = get_posts($args);
	if ($attachments) {
		$output = '<div class="row-fluid"><ul class="thumbnails">';
		foreach ( $attachments as $attachment ) {
			$output .= '<li class="span2">';
			$att_title = apply_filters( 'the_title' , $attachment->post_title );
			$output .= wp_get_attachment_link( $attachment->ID , 'thumbnail', true );
			$output .= '</li>';
			}
		$output .= '</ul></div>';
	}
	return $output;
}
// Buttons
function buttons( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'type' => 'default', /* primary, default, info, success, danger, warning, inverse */
	'size' => 'default', /* mini, small, default, large */
	'url'  => '',
	'text' => '', 
	'blank' => false,
	'subtext' => '', 
	), $atts ) );
	if($type == "default"){
		$type = "";
	}else{
		$type = "btn-" . $type;
	}
	if($blank == false){
    	$blank = "_self";
	}else{
		$blank = "_blank";
	}
	if($size == "default"){
		$size = "";
	}else{
		$size = "btn-" . $size;
	}
	$output = '<div class="contain"><div class="row-fluid"><a href="' . $url . '" class="btn-block btn '. $type . ' ' . $size . '" role="button" title="'.$text.'" target="'.$blank.'"  >';
	if( !$subtext){
		$output .= '<i class="icon icon-play pull-right"></i>';
		$output .= $text;
	}else{
		$output .= '<p class="emphasize" role="heading" aria-level="2">';
		$output .= '<i class="icon icon-play icon-large pull-right"></i>';
		$output .=  $text;
		$output .= '</p><p>';
		$output .= $subtext;
		$output .= '</p>';
	}
	$output .= '</a></div></div>';
	return $output;
}
add_shortcode('button', 'buttons'); 
// Alerts
function alerts( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'type' => 'alert-info', /* alert-info, alert-success, alert-error */
	'close' => 'false', /* display close link */
	'text' => '', 
	), $atts ) );
	$output = '<div class="fade in alert alert-'. $type . '">';
	if($close == 'true') {
		$output .= '<a class="close" data-dismiss="alert">×</a>';
	}
	$output .= $text . '</div>';
	return $output;
}
add_shortcode('alert', 'alerts');
// Block Messages
function block_messages( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'type' => 'alert-info', /* alert-info, alert-success, alert-error */
	'close' => 'false', /* display close link */
	'text' => '', 
	), $atts ) );
	$output = '<div class="fade in alert alert-block alert-'. $type . '">';
	if($close == 'true') {
		$output .= '<a class="close" data-dismiss="alert">×</a>';
	}
	$output .= '<p>' . $text . '</p></div>';
	return $output;
}
add_shortcode('block-message', 'block_messages'); 
// Block Messages
function blockquotes( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'float' => '', /* left, right */
	'cite' => '', /* text for cite */
	), $atts ) );
	$output = '<blockquote';
	if($float == 'left') {
		$output .= ' class="pull-left"';
	}elseif($float == 'right'){
		$output .= ' class="pull-right"';
	}
	$output .= '><p>' . $content . '</p>';
	if($cite){
		$output .= '<small>' . $cite . '</small>';
	}
	$output .= '</blockquote>';
	return $output;
}
add_shortcode('blockquote', 'blockquotes'); 
// Program List
function list_my_programs( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'type' => '', /* left, right */
	), $atts ) );
	$output = '<ul role="navigation">';
	$args = array(
	'orderby' => 'title',
	'order' => 'ASC',
	'tax_query' => array(
		array(
			'taxonomy' => 'program-type',
			'field' => 'slug',
			'terms' => $type,
			)
		)
	);
	$query= new WP_Query($args);
	// Loop
	while($query->have_posts()): $query->next_post();
		$id = $query->post->ID;
		$output .= '<li>';
		$output .= '<a href="';
		$output .= get_permalink($id);
		$output .= '">';
		$output .= get_the_title($id);
		$output .= '</a></li>';
	endwhile;
	$output .= '</ul>';
	return $output;
}
add_shortcode('list-programs', 'list_my_programs'); 
// Display Components
function display_components( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'type' => '', /* left, right */
	), $atts ) );
	$output = '<div class="clearfix" role="complementary">';
	$query = new WP_Query(array( 'post_type' => 'component', 'name' => $type));
	while ( $query->have_posts() ) : $query->the_post();
		$id = $query->post->ID;
		$info = get_the_content($id);
		$output .= $info;
	endwhile;
	$output .= '</div>';
	return $output;
}
add_shortcode('show-component', 'display_components'); 
// Display Programs for Modals
function modal_programs( $type ) {
	$query = new WP_Query(
	$args = array(
	'post_type' => 'program',
	'tax_query' => array(
		array(
			'taxonomy' => 'program-type',
			'field' => 'slug',
			'terms' => $type,
			'orderby' => 'title',
			'order' => 'DESC'
    		)
		)
	));
	$query = new WP_Query($args);
	$output = '<ul class="deadlines icons-ul">';
	while ( $query->have_posts() ) : $query->the_post();
	$output .= '<li><i class="icon-li icon-circle"></i>';
		$output .= '<a href="#myModal-';
		$id = get_the_ID();
		$output .= $id;
		$output .= '" data-toggle="modal">';
		$output .= get_the_title();
		$output .= '</a></li>';
	endwhile;
	wp_reset_postdata();
	$output .= '</ul>';
	return $output;
}
function show_program_lists( $atts, $content = null ) {
  extract( shortcode_atts( array(
  'type' => '', /* left, right */
  ), $atts ) );
  $output = '<div class="accordion" id="program-accordion">';
  $output .= '<div class="accordion-group">';
  $output .= '<div class="accordion-heading">';
  $output .= '<a class="accordion-toggle btn btn-info" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">';
  $output .= '6 Week Programs';
  $output .= '</a>';
  $output .= '</div>';
  $output .= '<div id="collapseOne" class="accordion-body collapse">';
  $output .= '<div class="accordion-inner">';
  $output .=  modal_programs("6-week");
  $output .= '</div>';
  $output .= '</div>';
  $output .= '</div>';
  $output .= '<div class="accordion-group">';
  $output .= '<div class="accordion-heading">';
  $output .= '<a class="accordion-toggle btn btn-info" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">';
  $output .= '3 Week Programs';
  $output .= '</a>';
  $output .= '</div>';
  $output .= '<div id="collapseTwo" class="accordion-body collapse">';
  $output .= '<div class="accordion-inner">';
  $output .= modal_programs("3-week");
  $output .= '</div>';
  $output .= '</div>';
  $output .= '</div>';
  $output .= '<div class="accordion-group">';
  $output .= '<div class="accordion-heading">';
  $output .= '<a class="accordion-toggle btn btn-info" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">';
  $output .= '2 Week Programs';
  $output .= '</a>';
  $output .= '</div>';
  $output .= '<div id="collapseThree" class="accordion-body collapse">';
  $output .= '<div class="accordion-inner">';
  $output .= modal_programs("2-week");
  $output .= '</div>';
  $output .= '</div>';
  $output .= '</div>';
  $output .= '</div>'; 
  return $output;
}
add_shortcode('show-programs', 'show_program_lists');

//
//Display Modules
function display_module($type, $heading, $block, $hide) {
	echo '<div class="clearfix';
	
	echo '" role="complementary">';
    $query = new WP_Query(array( 'post_type' => 'component', 'name' => $type));
    while ( $query->have_posts() ) : $query->the_post();
	if (!$hide){
		echo '<h'.$heading.'>';
		the_title();
		echo '</h'.$heading.'>';
	}
	if (has_post_thumbnail()){
		echo '<div class="pad-one-t hidden-xs">'; 
		the_post_thumbnail('featured');
		echo '</div>'; 
	}
	the_content();//$info; 
    endwhile;
	wp_reset_postdata();
	echo '</div>'; 
}
//
// Module Widget
class ModuleWidget extends WP_Widget
{
  function ModuleWidget()
  {
    $widget_ops = array('classname' => 'ModuleWidget', 'description' => 'Displays information from selected module section within "Homepage Options"' );
    $this->WP_Widget('ModuleWidget', 'Module Widget', $widget_ops);
  }
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'available' => '', 'checkbox' => '', ) );
	$available = $instance['available'];
	$checkbox = $instance['checkbox'];
	$query = new WP_Query(array( 'post_type' => 'component', 'orderby' => 'ASC', 'posts_per_page' => '-1'));?>
    <p>
  <label for="<?php echo $this->get_field_id('available'); ?>">Choose A Module: </label>
  <select id="<?php echo $this->get_field_id('available'); ?>" name="<?php echo $this->get_field_name('available'); ?>" class="widefat" style="width:100%;">
    <? while ( $query->have_posts() ) : $query->the_post();
  $id = get_the_ID();?>
  <option <?php selected( $instance['available'], $id ); ?> value="<?php echo $id; ?>"><?php echo the_title(); ?></option>
  <? endwhile;
  	wp_reset_postdata(); ?>
  </select>
  <p><input id="<?php echo $this->get_field_id('checkbox'); ?>" name="<?php echo $this->get_field_name('checkbox'); ?>" type="checkbox" value="1" <?php checked( '1', $checkbox ); ?>/>
        <label for="<?php echo $this->get_field_id('checkbox'); ?>"><?php _e('Remove Title'); ?></label>
  </p>

</p>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['checkbox'] = $new_instance['checkbox'];
	$instance['available'] = $new_instance['available'];
    return $instance;
  }
 
    function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
	$checkbox = empty($instance['checkbox']) ? ' ' : apply_filters('widget_title', $instance['checkbox']);
	$available = empty($instance['available']) ? ' ' : apply_filters('widget_title', $instance['available']);
    $query = new WP_Query(array( 'post_type' => 'component', 'page_id' => $available));
    while ( $query->have_posts() ) : $query->the_post();
   
    //$title = the_title();
 	
    //if (!empty($title))
    echo $before_widget;
	
	if ($checkbox !="1"){
		echo $before_title;
		echo the_title();
		echo $after_title;
	}
	
    
    // WIDGET CODE GOES HERE
   
	echo '<div class="clearfix">';
	
	echo the_content();
	
	echo '</div>';
	
    echo $after_widget;
	endwhile;
	wp_reset_postdata();
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("ModuleWidget");') );

// Remove crap from WYSIWYG
function myplugin_tinymce_buttons($buttons)
 {
	//Remove the format dropdown select and text color selector
	$remove = array('underline','forecolor','justifyfull','alignleft','aligncenter','alignright','justify','hr','blockquote', 'strikethrough');
	return array_diff($buttons,$remove);
 }
add_filter('mce_buttons_2','myplugin_tinymce_buttons');
add_filter('mce_buttons','myplugin_tinymce_buttons');

