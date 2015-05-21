<?php 
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
      <?php if (is_category()) { ?>
      <?php _e("Posts Categorized:", "bonestheme"); ?>
      <?php single_cat_title(); ?>
      <?php } elseif (is_tag()) { ?>
      <?php _e("Posts Tagged:", "bonestheme"); ?>
      <?php single_tag_title(); ?>
      <?php } elseif (is_author()) { ?>
      <?php _e("Posts By:", "bonestheme"); ?>
      <?php get_the_author_meta('display_name'); ?>
      <?php } elseif (is_day()) { ?>
      <?php _e("Daily Archives:", "bonestheme"); ?>
      :
      <?php the_time('l, F j, Y'); ?>
      <?php } elseif (is_month()) { ?>
      <?php _e("Monthly Archives:", "bonestheme"); ?>
      :
      <?php the_time('F Y'); ?>
      <?php } elseif (is_year()) { ?>
      <?php _e("Yearly Archives:", "bonestheme"); ?>
      :
      <?php the_time('Y'); ?>
      <?php } ?>
    </h1>
  </div>
  <div class="container-fluid" id="content-wrap">
    <div class="clearfix row-fluid">
      <div id="main" class="span8 clearfix" role="main">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
          <header>
            <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
              <?php the_title(); ?>
              </a></h3>
            <p class="meta">
              <?php _e("Posted", "bonestheme"); ?>
              <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate>
                <?php the_date(); ?>
              </time>
              <?php _e("by", "bonestheme"); ?>
              <?php the_author_posts_link(); ?>
              <span class="amp">&</span>
              <?php _e("filed under", "bonestheme"); ?>
              <?php the_category(', '); ?>
              .</p>
          </header>
          <!-- end article header -->
          
          <section class="post_content">
            <?php the_post_thumbnail( 'wpbs-featured' ); ?>
            <?php the_excerpt(); ?>
          </section>
          <!-- end article section -->
          
          <footer> </footer>
          <!-- end article footer --> 
          
        </article>
        <!-- end article -->
        
        <?php endwhile; ?>
        <?php if (function_exists('page_navi')) { // if expirimental feature is active ?>
        <?php page_navi(); // use the page navi function ?>
        <?php } else { // if it is disabled, display regular wp prev & next links ?>
        <nav class="wp-prev-next">
          <ul class="clearfix">
            <li class="prev-link">
              <?php next_posts_link(_e('&laquo; Older Entries', "bonestheme")) ?>
            </li>
            <li class="next-link">
              <?php previous_posts_link(_e('Newer Entries &raquo;', "bonestheme")) ?>
            </li>
          </ul>
        </nav>
        <?php } ?>
        <?php else : ?>
        <article id="post-not-found">
          <header>
            <h2>
              <?php _e("No Posts Yet", "bonestheme"); ?>
            </h2>
          </header>
          <section class="post_content">
            <p>
              <?php _e("Sorry, What you were looking for is not here.", "bonestheme"); ?>
            </p>
          </section>
          <footer> </footer>
        </article>
        <?php endif; ?>
      </div>
      <!-- end #main -->
      
      <?php get_sidebar(); // sidebar 1 ?>
    </div>
  </div>
</div>
<!-- end #content -->

<?php get_footer(); ?>
