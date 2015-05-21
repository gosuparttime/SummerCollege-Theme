<?php $args = array( 'post_type' => 'component', 'page_id' => $myPage );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();?>
<h2>
  <? if (!empty($myTitle)){
	  echo $myTitle;
  } else {
	  the_title(); 
  } ?>
</h2>
<div class="pad-half clearfix">
  <? the_content(); ?>
</div>
<div class="clearfix pad-one-t"></div>
<a href="<? echo get_permalink(); ?>" class="btn btn-block"><i class="icon-play pull-right"></i>
<? if (!empty($myCTA)){
	  echo $myCTA;
  } else {
	  the_title(); 
  } ?>
</a> </div>
<? endwhile; 
wp_reset_postdata();
?>
