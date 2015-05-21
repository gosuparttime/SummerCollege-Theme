<?php get_header(); ?>

<div class="banner-wrap" id="page-titles">
  <div class="container" id="sub-banner">
    <div class="row-fluid">
      <div class="banner-image"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/banners/rotate.php" alt="A Random Header Image" /></div>
      <div class="page-category">
        <h1>From Our Students</h1>
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
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
          <section class="post_content clearfix" itemprop="articleBody">
            <div class="row-fluid clearfix">
              <div class="span8">
                <h3>
                <?php the_field('student_program'); ?>
                </h6>
                <h5> Class of:
                  <?php the_field('student_year'); ?>
                </h5>
                <p>
                  <?php the_field('student_city'); ?>,&nbsp; 
                  <?php 
				  $locate = get_post_meta($post->ID, 'student_state', true);
				  //echo $locate;
				  if ( $locate == "Other"){ 
					 	the_field('student_country'); 
                     } else {
					 	the_field('student_state'); 
					 } ?>
                </p>
                <p><a href="mailto:<?php the_field('student_email'); ?>">
                  <?php the_field('student_email'); ?>
                  </a></p>
                <?php the_content(); ?>
              </div>
              <div class="span4 hidden-phone pad-two-t">
                <?php 
				$atts = array('class' => "thumbnail");
				the_post_thumbnail( 'full', $atts ); ?>
              </div>
              <div class="span4 visible-phone pad-one-t">
                <?php 
				$atts = array('class' => "thumbnail");
				the_post_thumbnail( 'thumbnail', $atts ); ?>
              </div>
            </div>
          </section>
          <!-- end article section -->
          
          <footer>
            <?php the_tags('<p class="tags"><span class="tags-title">' . __("Tags","bonestheme") . ':</span> ', ' ', '</p>'); ?>
            <?php 
							// only show edit button if user has permission to edit posts
							if( $user_level > 0 ) { 
							?>
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
      
      <?php get_sidebar('sidebar3'); // sidebar 1 ?>
    </div>
  </div>
</div>
<!-- end #content -->

<?php get_footer(); ?>
