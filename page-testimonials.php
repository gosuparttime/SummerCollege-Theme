<?php 
/* Template Name: Testimonials 
*/
get_header(); ?>

<div class="banner-wrap" id="page-titles">
  <div class="container" id="sub-banner">
    <div class="row-fluid">
      <div class="banner-image"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/banners/rotate.php" alt="A Random Header Image" /></div>
      <div class="page-category">
        <h1>
          <?php
$parent_title = get_the_title($post->post_parent);
echo $parent_title;
?>
        </h1>
      </div>
    </div>
  </div>
</div>
<div class="body-wrap" id="body-copy">
<div class="container body-frame">
<div id="content">
  <div class="page-header">
    <h1 class="page-title" itemprop="headline">
      <?php the_title(); ?>
    </h1>
  </div>
  <div class="container-fluid" id="content-wrap">
    <div class="clearfix row-fluid">
      <div id="main" class="span8 clearfix" role="main">
      <section class="post_content clearfix pad-two-b" itemprop="articleBody">
        <?php the_post_thumbnail('wpbs-featured-carousel');?>
        <?php the_content(); ?>
        </section>
        <div class="row-fluid">
          <?php
	   $c = 1; //init counter
	   $bpr = 2; //boxes per row

	   $args = array(
			'post_type' => 'stories',
			'orderby' => 'title', 
			'order' => 'asc',
			'posts_per_page' => '-1'
		);
		$loop = new WP_Query( $args );
        if ($loop-> have_posts()) : while ($loop-> have_posts()) : $loop-> the_post(); ?>
          <div class="span6">
            <div class="unit">
                <div class="row-fluid">
                <div class="span7">
                    <h3>
                      <?php the_title(); ?>
                    </h3>
                    <h6>
                      <?php the_field('student_program'); ?>
                      <br />
                      Class of:
                      <?php the_field('student_year'); ?>
                    </h6>
                    <?php the_excerpt(); ?>
                    <a href="<?php the_permalink(); ?>" class="btn btn-block"><i class="icon-play pull-right"></i>Read Full Story</a>
                  <!-- end article section --> 
                  
                  <!-- end article footer --> 
                </div>
                <div class="span5">
                  <div class="thumbnail">
                    <?php the_post_thumbnail('full'); ?>
                  </div>
                </div></div>
            </div>
          </div>
          <!-- end article -->
          <?php if($c == $bpr) : ?>
        </div>
        <div class="row-fluid">
          <?php $c = 0;
		endif; ?>
          <?php
		$c++;

        endwhile; ?>
        </div>
        <?php endif; ?>
      </div>
      <!-- end #main -->
      
      <?php get_sidebar(); // sidebar 1 ?>
    </div>
  </div>
</div>
<!-- end #content -->

<?php get_footer(); ?>
