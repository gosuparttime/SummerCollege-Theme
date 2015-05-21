<?php get_header(); ?>

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
  <div class="container-fluid">
    <div class="clearfix row-fluid">
      <div id="main" class="span8 clearfix" role="main">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
          <header>
            
            
            
            <p class="meta"><small
              <?php _e("Posted", "bonestheme"); ?>
              <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate>
                <?php the_date(); ?>
              </time>
              <?php _e("by", "bonestheme"); ?>
              <?php the_author_posts_link(); ?>
              <span class="amp">&amp;</span>
              <?php _e("filed under", "bonestheme"); ?>
              <?php the_category(', '); ?>
              .</small></p>
              <?php the_post_thumbnail( 'wpbs-featured' ); ?>
          </header>
          <!-- end article header -->
          
          <section class="post_content clearfix" itemprop="articleBody">
            <?php the_content(); ?>
            <?php wp_link_pages(); ?>
          </section>
          <!-- end article section -->
          
          <footer>
            <?php the_tags('<p class="tags"><span class="tags-title">' . __("Tags","bonestheme") . ':</span> ', ' ', '</p>'); ?>
            <?php 
							// only show edit button if user has permission to edit posts
							if( $user_level > 0 ) { 
							?>
            <a href="<?php echo get_edit_post_link(); ?>" class="btn btn-success edit-post"><i class="icon-pencil icon-white"></i>
            <?php _e("Edit post","bonestheme"); ?>
            </a>
            <?php } ?>
          </footer>
          <!-- end article footer --> 
          
        </article>
        <!-- end article -->
        
        <?php endwhile; ?>
        <?php else : ?>
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
