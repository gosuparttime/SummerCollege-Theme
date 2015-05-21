<?php $args = array( 'post_type' => 'page', 'page_id' => $myPage );
	$soop = new WP_Query( $args );
	while ( $soop->have_posts() ) : $soop->the_post();?>
<h2>
  <? if (!empty($myTitle)){
	  echo $myTitle;
  } else {
	  the_title(); 
  } ?>
</h2>
<div class="pad-half clearfix">
  <div class="span7">
    <?
		$copy = get_field('short_description');
		echo '<p>';
		if (!empty($copy)){
			echo the_field('short_description');
		} else {
			$excerpt_length = 200; // length of excerpt to show (in characters)
			$the_excerpt = get_the_excerpt(); 
			if($the_excerpt != ""){
			   	$the_excerpt = substr( $the_excerpt, 0, $excerpt_length );
			   	echo $the_excerpt ;
			}
		}
		echo '</p>';
	?>
  </div>
  <div class="span5">
    <?php 
		echo '<div class="thumbnail"><img src="';
		echo the_field('secondary_thumbnail');
		echo '"></div>';
	?>
  </div>
  <div class="clearfix pad-one-t"></div>
  <a href="<? echo get_permalink(); ?>" class="btn btn-block"><i class="icon-play pull-right"></i>
  <? if (!empty($myCTA)){
	  echo $myCTA;
  } else {
	  echo 'Learn More';
  } ?>
  </a> </div>
<? endwhile; 
wp_reset_postdata();
?>
