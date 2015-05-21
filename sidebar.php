<div class="fluid-sidebar sidebar span4" role="complementary" id="sidebar">
<a class="btn btn-info btn-block btn-large accordion-toggle visible-phone" data-toggle="collapse" href="#mySidebar"><i class="icon-plus pull-right"></i>See More</a>
<div class="collapse hide-phone" id="mySidebar">
  <div id="sidebar1">
    <?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>
    <?php dynamic_sidebar( 'sidebar1' ); ?>
    <?php endif; ?>
  </div>
  <div id="sidebar2">
    <?php if ( is_active_sidebar( 'sidebar2' ) ) : ?>
    <?php dynamic_sidebar( 'sidebar2' ); ?>
    <?php endif; ?>
  </div>
  <div id="sidebar3">
    <?php if ( is_active_sidebar( 'sidebar3' ) ) : ?>
    <?php dynamic_sidebar( 'sidebar3' ); ?>
    <?php endif; ?>
  </div>
</div>
</div>
