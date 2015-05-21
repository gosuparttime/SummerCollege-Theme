<?php 
// Template Name: FAQ Page
//
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
    <h1 class="page-title" itemprop="headline" role="heading">
      <?php the_title(); ?>
    </h1>
  </div>
  <div class="container-fluid">
    <div class="clearfix row-fluid">
      <div id="main" class="span8 clearfix" role="main">
        <?php query_posts(array('post_type'=>'faq','orderby'=>'menu_order', 'order'=>'ASC', 'posts_per_page' => -1)) ?>
        <?php if (have_posts()) : ?>
        <div id="questions" class="accordion">
          <?php while (have_posts()) : the_post(); ?>
          <div class="accordion-group">
            <div class="accordion-heading"><a class="accordion-toggle btn btn-info" data-toggle="collapse" data-parent="#questions" href="#answer<?php the_id() ?>">
              <?php the_title(); ?>
              </a>
            </div>
            <div id="answer<?php the_id() ?>" class="accordion-body collapse">
              <div class="accordion-inner">
                <?php the_content(); ?>
              </div>
            </div>
          </div>
          <?php endwhile; ?>
        </div>
        <?php else : ?>
        <h3>Not Found</h3>
        <p>Sorry, No FAQs created yet.</p>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
      </div>
      <!-- end #main -->
      
      <?php get_sidebar(); // sidebar 1 ?>
    </div>
  </div>
</div>
<!-- end #content -->

<?php get_footer(); ?>
