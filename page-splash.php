<?php  
//
// Template Name: Splash Page
//
?>
<!doctype html>

<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!-->
<html <?php language_attributes(); ?> class="no-js">
<!--<![endif]-->

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>
<?php if ( !is_front_page() ) { echo wp_title( ' ', true, 'left' ); echo ' | '; }
			echo bloginfo( 'name' ); echo ' - '; bloginfo( 'description', 'display' );  ?>
</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="google-translate-customization" content="d10813b794f2c5e7-d915ed437752f685-gfbc342016883f62f-15">
</meta>
<!-- icons & favicons -->
<!-- For iPhone 4 -->
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/h/apple-touch-icon.png">
<!-- For iPad 1-->
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/m/apple-touch-icon.png">
<!-- For iPhone 3G, iPod Touch and Android -->
<link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/l/apple-touch-icon-precomposed.png">
<!-- For Nokia -->
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/l/apple-touch-icon.png">
<!-- For everything else -->
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">

<!-- media-queries.js (fallback) -->
<!--[if lt IE 9]>
			<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>			
<![endif]-->

<!-- html5.js -->
<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic|PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'>
<!-- wordpress head functions -->
<?php wp_head(); ?>
<!-- end of wordpress head -->
<!--[if lt IE 9]>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/library/css/dumbo.css">
<![endif]-->
<!--[if IE 7]>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/library/css/font-awesome-ie7.css">
<![endif]-->
</head>
<body class="body-wrap no-top-border">
<header role="banner">
  <div id="top">
  <div id="inner-header" class="clearfix container-fluid">
    <div class="container clearfix">
      <div class="row-fluid" id="site-information">
        <div class="span4" id="branding"><a class="brand" id="logo" title="<?php echo get_bloginfo('name'); ?>" href="<?php echo home_url(); ?>"> <img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/SummerCollege_Logo.gif" alt="<?php echo get_bloginfo('name'); ?>"/> <span class="hidden">
          <?php bloginfo('name'); ?>
          </span> </a></div>
      </div>
    </div>
    
    <!-- end #inner-header --> 
  </div>
</header>
<!-- end header -->

<div id="body-copy">
  <div class="container body-frame">
    <div id="content">
      <div class="page-header">
        <h1 class="page-title" itemprop="headline" role="heading">
          <?php the_title(); ?>
        </h1>
      </div>
      <div class="container-fluid" id="content-wrap">
        <div class="clearfix row-fluid">
          <div id="main" class="span6 clearfix" role="main">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
              <section class="post_content clearfix" itemprop="articleBody">
                <?php 
				$rows = get_field('slide_images');
				if ($rows){ 
                 ?>
                <div id="myCarousel" class="carousel slide">
                  	<ol class="carousel-indicators hidden-phone">
						<?php 
                        $post_count = 0;
                        foreach($rows as $row){
			                echo  '<li data-target="#myCarousel" data-slide-to="'.$post_count.'" ';
							if($post_count == 0){ 
								echo 'class="active"';
							}
							echo '>';
							$post_count++;
							echo '</li>';
						} ?>
					</ol>
					<!-- Carousel items -->
					<div class="carousel-inner">
					<?php 
						$post_num = 0;
						foreach($rows as $row){
						$post_num++;
						// Image swaps?
						$attachment_id = $row['slide_image'];
						$size = "wpbs-featured";
						$image = wp_get_attachment_image_src( $attachment_id, $size );
						echo '<div class="item ';
						if($post_num == 1){ 
							echo 'active';
						}
						echo '"><img src="';
						echo $image[0];
						echo '" alt="';
						the_title();
						echo '" />';
						echo '</div>';
						} ?>
                  </div>
                  <!-- Carousel nav --> 
                  <!-- Carousel nav -->
                  <div class="visible-phone"><a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a> <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a></div>
                </div>
                <? } else { ?>
                <?php the_post_thumbnail('wpbs-featured'); ?>
                <? } ?>
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
          
          <div class="span6">
            <div class="pad-one-t">
              <div class="well">
                <h3>Request Information</h3>
                <p>Sign up to get the basics in terms of programs, eligibility requirements and credits.</p>
                <?php get_template_part( 'form', 'landing' ); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end #content --> 
  </div>
  <!-- end #container -->
  <div class="container" id="footer">
    <footer role="contentinfo" >
      <div id="inner-footer" class="clearfix">
        <div class="row-fluid" id="back-top"><a href="#top">
          <p><strong>Back to Top <i class="icon-arrow-up"></i></strong></p>
          </a></div>
        <div class="row-fluid">
          <div class="span5" id="address">
            <h3>Syracuse University Summer College</h3>
            <address>
            <p>Summer College<br />
              700 University Avenue,<br />
              Syracuse, NY 13244-2530</p>
            </address>
            <p><a href="tel:13154435000"><span style="color:#fff;">315-443-5000</span></a><br />
              Fax: 315-443-4410</p>
            <p><strong><a href="mailto:sumcoll@uc.syr.edu">sumcoll@uc.syr.edu</a></strong></p>
          </div>
          <div class="span3 hidden-phone">
            <div class="row-fluid">
              <h3>Follow Us</h3>
            </div>
            <ul id="social">
              <li><a href="http://www.facebook.com/pages/Syracuse-University-Summer-College/172166272825062" target="_blank"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/facebook-icon-up.png" alt="SU Summer College on Facebook" class="rollover"/></a></li>
              <li><a href="http://twitter.com/SUSummerCollege" target="_blank"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/twitter-icon-up.png" alt="SU Summer College on Twitter" class="rollover"/></a></li>
            </ul>
            <div class="row-fluid">
              <h3>Translate</h3>
              <div id="MicrosoftTranslatorWidget" style="width: 95%; min-height: 83px; border-color: #005594; background-color: #005594;">
                <noscript>
                <a href="http://www.microsofttranslator.com/bv.aspx?a=http%3a%2f%2fsummercollege.syr.edu%2f"></a><br />
                Powered by <a href="http://www.bing.com/translator">Microsoft® Translator</a>
                </noscript>
              </div>
              <script type="text/javascript"> /* <![CDATA[ */ setTimeout(function() { var s = document.createElement("script"); s.type = "text/javascript"; s.charset = "UTF-8"; s.src = ((location && location.href && location.href.indexOf('https') == 0) ? "https://ssl.microsofttranslator.com" : "http://www.microsofttranslator.com" ) + "/ajax/v2/widget.aspx?mode=manual&from=en&layout=ts"; var p = document.getElementsByTagName('head')[0] || document.documentElement; p.insertBefore(s, p.firstChild); }, 0); /* ]]> */ </script> 
            </div>
          </div>
        </div>
        <div id="seal">
          <div class="span4"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/SU-Seal.gif" alt="<?php echo get_bloginfo('name'); ?>"/></div>
        </div>
      </div>
      <!-- end #inner-footer --> 
      
    </footer>
    <!-- end footer --> 
  </div>
</div>
<!-- Modal -->
<?
        $query = new WP_Query( 
			$args = array(
			'posts_per_page' => '-1',
			'post_type' => 'program',
			'order' => 'ASC',
    	) );
		$query = new WP_Query($args);
		while ( $query->have_posts() ) : $query->the_post(); ?>
<div class="modal fade" id="myModal-<? the_ID(); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h2 class="modal-title">
          <? the_title(); ?>
        </h2>
        <h5>
          <?php the_field('credit_type'); ?>
        </h5>
      </div>
      <div class="modal-body">
        <? the_content(); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content --> 
  </div>
  <!-- /.modal-dialog --> 
</div>
<!-- /.modal --> 

<!-- end article footer -->
<?
	  endwhile;
      wp_reset_postdata();
      ?>
<!-- end #container --> 

<!--[if lt IE 7 ]>
  			<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
  			<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->

<?php wp_footer(); // js scripts are inserted using this function ?>
<script>
!function ($) {
  $(function(){
         // carousel demo
    $('#myCarousel').carousel('cycle')
  })
}(window.jQuery)
</script>
</body>
</html>
