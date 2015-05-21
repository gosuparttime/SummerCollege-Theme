<?php
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
	'tax_query' => array(
		array(
			'taxonomy' => 'program-type',
			'field' => 'slug',
			'terms' => $type,
			'orderby' => 'title',
			'order' => 'DESC'
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
?>​