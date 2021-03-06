<?php 
get_header(); ?>

<div class="banner-wrap" id="page-titles">
  <div class="container" id="sub-banner">
    <div class="row-fluid">
      <div class="banner-image"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/banners/rotate.php" alt="A Random Header Image" /></div>
      <div class="page-category">
        <h1>
          Search
        </h1>
      </div>
    </div>
  </div>
</div>
<div class="body-wrap" id="body-copy">
<div class="container body-frame">
<div class="page-header">
    <h1 class="page-title" itemprop="headline">
      Your Results:
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
          
          <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate>
            <?php the_date(); ?>
          </time>
         
          </p>
      </header>
      <!-- end article header -->
      
      <section class="post_content">
        <?php the_excerpt('<span class="read-more">' . __("Read more on","bonestheme") . ' "'.the_title('', '', false).'" &raquo;</span>'); ?>
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
    
    <!-- this area shows up if there are no results -->
    
    <article id="post-not-found">
      <header>
        <h1>
          <?php _e("Not Found", "bonestheme"); ?>
        </h1>
      </header>
      <section class="post_content">
        <p>
          <?php _e("Sorry, but the requested resource was not found on this site.", "bonestheme"); ?>
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
