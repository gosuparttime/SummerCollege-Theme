<?php $largs = array( 'post_type' => 'stories', 'orderby' => 'rand', 'posts_per_page' => '1' );
			$poop = new WP_Query( $largs );
			while ( $poop->have_posts() ) : $poop->the_post();?>

<h2>
  <? if (!empty($myTitle)){
	  echo $myTitle;
  } else {
	  echo 'Student Profiles'; 
  } ?>
</h2>
<div class="pad-half clearfix">
  
  <div class="span7"><h4>
    <?php the_title(); ?>
  </h4>
  <h6>
    <?php the_field('student_program'); ?>
    <br />
    Class of:
    <?php the_field('student_year'); ?>
  </h6>
    <? $copy = get_field('short_description');
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
		echo '<div class="thumbnail">';
		the_post_thumbnail('staff-photo');
		echo '</div>';
	?>
  </div>
  <div class="clearfix pad-one-t"></div>
  <a href="<? echo get_permalink(); ?>" class="btn btn-block"><i class="icon-play pull-right"></i>
  <? if (!empty($myCTA)){
	  echo $myCTA;
  } else {
	  echo 'Learn More';
  } ?>
  </a></div>
<? endwhile; 
wp_reset_postdata();
?>
