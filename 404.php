<?php get_header(); ?>

<div class="banner-wrap" id="page-titles">
  <div class="container" id="sub-banner">
    <div class="row-fluid">
      <div class="banner-image"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/banners/rotate.php" alt="A Random Header Image" /></div>
      <div class="page-category">
        <h1>
          <?php bloginfo('description'); ?>
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
        Site Fail
      </h1>
    </div>
    <div class="container-fluid">
      <div class="clearfix row-fluid">
        <div id="main" class="span8 clearfix" role="main">
          <article id="post-not-found" class="clearfix">
            <header>
              <div class="hero-unit">
                <h2>Epic 404 - Article Not Found</h2>
                <p>This is embarassing. We can't find what you were looking for.</p>
              </div>
            </header>
            <!-- end article header -->
            
            <section class="post_content">
              <p>Whatever you were looking for was not found, but maybe try looking again or search using the form below.</p>
              <div class="row-fluid">
                <div class="span12">
                  <?php get_search_form(); ?>
                </div>
              </div>
            </section>
            <!-- end article section -->
            
            <footer> </footer>
            <!-- end article footer --> 
            
          </article>
          <!-- end article --> 
          
        </div>
        <!-- end #main --> 
        
     
      
      <?php get_sidebar(); // sidebar 1 ?>
    </div>
  </div>
</div>
<!-- end #content -->

<?php get_footer(); ?>
