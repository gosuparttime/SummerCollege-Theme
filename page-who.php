<?php 
/* Template Name: Who We Are
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
        <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
          <section class="post_content clearfix" itemprop="articleBody">
            <?php the_content(); ?>
          </section>
          <!-- end article section -->
          
          <footer>
            <?php the_tags('<p class="tags"><span class="tags-title">' . __("Tags","bonestheme") . ':</span> ', ', ', '</p>'); ?>
          </footer>
          <!-- end article footer --> 
          
        </article>
        <!-- end article -->
        
        <?php endwhile; ?>
        <div class="row-fluid pad-one-t">
          <?php
	   $c = 1; //init counter
	   $bpr = 3; //boxes per row

	   	$args = array( 'post_type' => 'staff', 'posts_per_page' => -1, 'order' => 'ASC' );
		$loop = new WP_Query( $args );
        if ($loop-> have_posts()) : while ($loop-> have_posts()) : $loop-> the_post(); ?>
          <div class="span4 unit">
            <div class="row-fluid">
              <div class="half-size">
                <div class="thumbnail">
                  <?php the_post_thumbnail('staff-photo'); ?>
                </div>
              </div>
              <div class="half-size">
                <h3>
                  <?php the_title(); ?>
                </h3>
                <p>
                  <?php the_content(); ?>
                </p>
              </div>
              <!-- end article section --> 
              
              <!-- end article footer --> 
            </div>
          </div>
          <!-- end article -->
          <?php if($c == $bpr) : ?>
        </div>
        <div class="row-fluid pad-one-t">
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
