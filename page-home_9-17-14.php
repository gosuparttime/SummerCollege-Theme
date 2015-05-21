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
                  <h2>Summer College at SU</h2>
                  <h3><?php the_title(); ?></h3>
                  <p>
                    <?php $excerpt_length = 200; // length of excerpt to show (in characters)
					      $the_excerpt = get_the_excerpt(); 
					      if($the_excerpt != ""){
					      	$the_excerpt = substr( $the_excerpt, 0, $excerpt_length );
					      	echo $the_excerpt ;
					} ?>
                  </p>
                  <div class="visible-desktop">
                  <?php
                  $page_links = get_field('page_links');
				  if ($page_links == "") {
					echo do_shortcode('[button text="6 Week Programs" url="/our-programs/6-week-programs/"]');
					echo do_shortcode('[button text="3 Week Programs" url="/our-programs/3-week-programs/"]');
					echo do_shortcode('[button text="2 Week Programs" url="/our-programs/2-week-programs/"]');
					//echo do_shortcode('[button text="Summer Dance Intensive" url="/our-programs/summer-dance-intensive/"]');
					echo do_shortcode('[button type="primary" text="Apply Now" subtext="Register for 2015" url="/prospective-students/apply-now/"]');
				  } else {
                  	the_field('page_links');
                  } ?></div>
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
	
endwhile; ?>
  </ul>
</div>
<div id="main" role="main">
  <div class="clearfix row-fluid pad-two-tb" >
    <div class="span4">
      <div class="feature">
        <h2>From Our Director</h2>
        <div class="pad-half clearfix">
          <div class="span7">
            <?php $args = array( 'post_type' => 'page', 'name' => 'from-our-director' );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();
					echo '<p>';
					echo the_field('short_description');
					echo '</p>';
				endwhile; ?>
            <p><strong>Binh Huynh,</strong><br />
              Director, Summer College</p>
          </div>
          <div class="span5">
            <?php $args = array( 'post_type' => 'page', 'name' => 'from-our-director' );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();
					echo '<div class="thumbnail"><img src="';
					echo the_field('secondary_thumbnail');
					echo '"></div>';
				?>
          </div>
          <div class="clearfix pad-one-t"></div>
          <a href="/about-us/from-our-director/" class="btn btn-block"><i class="icon-play pull-right"></i>Read More</a>
          <? endwhile; ?>
        </div>
      </div>
    </div>
    <div class="span4">
      <div class="feature">
        <h2>Student Profiles</h2>
        <div class="pad-half clearfix">
          <?php $args = array( 'post_type' => 'stories', 'orderby' => 'rand', 'posts_per_page' => '1' );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();?>
          <div class="span7">
            <h4>
              <?php the_title(); ?>
            </h4>
            <h6>
              <?php the_field('student_program'); ?>
              / Class of:
              <?php the_field('student_year'); ?>
            </h6>
            <div class="quote"><?php the_excerpt(); ?></div>
          </div>
          <div class="span5">
            <div class="thumbnail">
              <?php the_post_thumbnail('full'); ?>
            </div>
          </div>
          <div class="clearfix pad-one-t"></div>
          <a href="<?php the_permalink(); ?>" class="btn btn-block"><i class="icon-play pull-right"></i>Read More</a>
          <? endwhile; ?>
        </div>
      </div>
    </div>
    <div class="span4">
      <div class="feature">
        <h2>Request Information</h2>
        <div class="pad-half clearfix">
          <div class="span7 clearfix">
            <?php $args = array( 'post_type' => 'page', 'name' => 'request-information' );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();
					echo '<p>';
					echo the_field('short_description');
					echo '</p>';
				endwhile; ?>
          </div>
          <div class="span5 clearfix">
            <?php $args = array( 'post_type' => 'page', 'name' => 'request-information' );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();
					echo '<div class="thumbnail"><img src="';
					echo the_field('secondary_thumbnail');
					echo '"></div>';
					?>
          </div>
          <div class="clearfix pad-one-t"></div>
          <a href="<?php the_permalink(); ?>" class="btn btn-block"><i class="icon-play pull-right"></i>Request Information</a> </div>
        <? endwhile; ?>
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
              <div class="tab-pane" id="twitter"> <?php echo do_shortcode('[hungryfeed url="http://twss.55uk.net/SUSummerCollege/10" template="2" max_items="3"]'); ?> <a href="http://twitter.com/SUSummerCollege" target="_blank" class="btn btn-block"><i class="icon icon-play pull-right"></i>Visit Our Twitter Page</a> </div>
              <div class="tab-pane" id="press"> <?php echo do_shortcode('[hungryfeed url="http://news.syr.edu/?feed=rss" template="3" max_items="3" truncate_description="150"]'); ?> <a href="#" class="btn btn-block"><i class="icon icon-play pull-right"></i>Read more SU News</a> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="span4">
      <div class="feature">
        <h2>Calendar</h2>
        <div class="pad-half clearfix"> <?php echo do_shortcode( '[google-calendar-events id="1" type="list-grouped" title="Events on" max="5"]' ); ?> <a href="/calendar-of-events/" class="btn btn-block"><i class="icon-play pull-right"></i>See All Events</a> </div>
      </div>
    </div>
    <!-- end #main --> 
    
  </div>
</div>
<!-- end #content -->

<?php get_footer(); ?>
