<?php 
// Template Name: Home Page
//
get_header(); ?>

<div class="banner-wrap" id="page-titles">
  <div class="container" id="main-banner">
    <div class="row-fluid">
      <div class="hero-unit">
        <div id="myCarousel" class="carousel slide"> 
          <!-- Carousel items -->
          <div class="carousel-inner">
            <?php $args = array( 'post_type' => 'slide', 'posts_per_page' => 3, 'order' => 'ASC', 'orderby' => 'menu_order');
				  $loop = new WP_Query( $args );
				  $slide_count = 0;
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();
					$slide_count++;
			?>
            <div class="<?php if($slide_count == 1){ echo 'active'; } ?> item row-fluid">
              <div class="span8">
                <?php the_post_thumbnail( 'wpbs-featured-carousel' ); ?>
              </div>
              <div class="span4">
                <div class="carousel-caption">
                  <h2>
                    <?php the_title(); ?>
                  </h2>
                  <? the_content();?>
                  <div class="visible-desktop">
                    <?php
                  $page_links = get_field('page_links');
				  if ($page_links == "") {
					$args = array( 'post_type' => 'component', 'name' => 'program-buttons' );
					$myq = new WP_Query( $args );
					//print_r($myq);
					while ( $myq->have_posts() ) : $myq->the_post();
					the_content();
					endwhile;
				  } else {
                  	the_field('page_links');
                  } ?>
                  </div>
                </div>
              </div>
            </div>
            <?php endwhile; ?>
          </div>
          <div class="visible-phone"> 
            <!-- Carousel nav --> 
            <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo; Previous</a> <a class="carousel-control right" href="#myCarousel" data-slide="next">Next &rsaquo;</a> </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="body-wrap" id="body-copy">
<div class="container">
<div id="content">
<div class="page-header hidden-phone" id="homepage">
  <ul class="carousel-linked-nav pagination row-fluid">
    <?php $args = array( 'post_type' => 'slide', 'posts_per_page' => 3, 'order' => 'ASC', 'orderby' => 'menu_order' );
		$slide_count = 0;
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post();
		$slide_count++;
		echo '<li class="span4"><a href="#'.$slide_count.'" class="btn btn-block"><i class="icon icon-play pull-right"></i>';
		the_title();
		echo '</a></li>';
	
endwhile;
wp_reset_postdata(); ?>
  </ul>
</div>
<div id="main" role="main">
  <div class="clearfix row-fluid pad-two-tb" >
    <div class="span4">
      <div class="feature">
        <? 	if( have_rows('column_1') ):
			// loop through the rows of data
			while ( have_rows('column_1') ) : the_row();
				if( get_row_layout() == 'add_page' ):
					$myPage = get_sub_field('choose_page');
					$myTitle = get_sub_field('title');
					$myCTA = get_sub_field('call_to_action');
					include(locate_template('widget-page.php'));
				elseif( get_row_layout() == 'add_story' ): 
					$myTitle = get_sub_field('title');
					$myCTA = get_sub_field('call_to_action');
					include(locate_template('widget-story.php'));
				elseif( get_row_layout() == 'add_module' ): 
					$myPage = get_sub_field('choose_module');
					$myTitle = get_sub_field('title');
					$myCTA = get_sub_field('call_to_action');
					include(locate_template('widget-module.php'));
				endif;
			endwhile;
		else :
			// no layouts found
		endif;
	 	?>
      </div>
    </div>
    <div class="span4">
      <div class="feature">
        <? 	if( have_rows('column_2') ):
			// loop through the rows of data
			while ( have_rows('column_2') ) : the_row();
				if( get_row_layout() == 'add_page' ):
					$myPage = get_sub_field('choose_page');
					$myTitle = get_sub_field('title');
					$myCTA = get_sub_field('call_to_action');
					include(locate_template('widget-page.php'));
				elseif( get_row_layout() == 'add_story' ): 
					$myTitle = get_sub_field('title');
					$myCTA = get_sub_field('call_to_action');
					include(locate_template('widget-story.php'));
				elseif( get_row_layout() == 'add_module' ): 
					$myPage = get_sub_field('choose_module');
					$myTitle = get_sub_field('title');
					$myCTA = get_sub_field('call_to_action');
					include(locate_template('widget-module.php'));
				endif;
			endwhile;
		else :
			// no layouts found
		endif;
	 	?>
       
      </div>
    </div>
    <div class="span4">
      <div class="feature">
        <? 	if( have_rows('column_3') ):
			// loop through the rows of data
			while ( have_rows('column_3') ) : the_row();
				if( get_row_layout() == 'add_page' ):
					$myPage = get_sub_field('choose_page');
					$myTitle = get_sub_field('title');
					$myCTA = get_sub_field('call_to_action');
					include(locate_template('widget-page.php'));
				elseif( get_row_layout() == 'add_story' ): 
					$myTitle = get_sub_field('title');
					$myCTA = get_sub_field('call_to_action');
					include(locate_template('widget-story.php'));
				elseif( get_row_layout() == 'add_module' ): 
					$myPage = get_sub_field('choose_module');
					$myTitle = get_sub_field('title');
					$myCTA = get_sub_field('call_to_action');
					include(locate_template('widget-module.php'));
				endif;
			endwhile;
		else :
			// no layouts found
		endif;
	 	?>
      </div>
    </div>
  </div>
  <div class="clearfix row-fluid pad-one-b" >
    <div class="span8 hidden-phone">
      <div class="feature" id="feeds">
        <h2>What Others Are Saying</h2>
        <div class="pad-half clearfix">
          <div class="tabbable tabs-left">
            <ul class="nav nav-tabs" id="myTab">
              <li class="active"><a href="#facebook" data-toggle="tab"><i class="icon icon-large icon-facebook"></i>Facebook</a></li>
              <li><a href="#twitter" data-toggle="tab"><i class="icon icon-large icon-twitter"></i>Twitter</a></li>
              <li><a href="#press" data-toggle="tab"><i class="icon icon-large icon-rss"></i>News & Press</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="facebook"> <?php echo do_shortcode('[hungryfeed url="http://www.facebook.com/feeds/page.php?format=atom10&id=172166272825062" template="1" max_items="3" truncate_description="150"]'); ?> <a href="http://www.facebook.com/pages/Syracuse-University-Summer-College/172166272825062" target="_blank" class="btn btn-block"><i class="icon icon-play pull-right"></i>Visit Our Facebook Page</a> </div>
              <div class="tab-pane" id="twitter"> <?php myTweets('susummercollege'); ?> <a href="http://twitter.com/SUSummerCollege" target="_blank" class="btn btn-block"><i class="icon icon-play pull-right"></i>Visit Our Twitter Page</a> </div>
              <div class="tab-pane" id="press"> <?php echo do_shortcode('[hungryfeed url="http://news.syr.edu/?feed=rss" template="3" max_items="3" truncate_description="150"]'); ?> <a href="#" class="btn btn-block"><i class="icon icon-play pull-right"></i>Read more SU News</a> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="span4">
      <div class="feature">
        <h2>Calendar</h2>
        <div class="pad-half clearfix"><?php echo do_shortcode( '[gcal id="2121"]' ); ?> <a href="/calendar-of-events/" class="btn btn-block"><i class="icon-play pull-right"></i>See All Events</a> </div>
      </div>
    </div>
    <!-- end #main --> 
    
  </div>
</div>
<!-- end #content -->

<?php get_footer(); ?>
