<div class="container-fluid pad-one-t" id="program-foot">
  <div class="row-fluid">
    <div class="span12">
      <div class="unit clearfix">
        <?php $args = array( 'post_type' => 'page', 'name' => '6-week-programs' );
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post();
		echo '<div class="span6">';
		echo the_post_thumbnail('wpbs-featured-carousel');	
		echo '</div><div class="span6">';
		echo '<h2>';
		echo the_title();
		echo '</h2>';
		echo '<p>';
		echo the_field('short_description');
		echo '</p>';		
		echo '<a href="';
		echo the_permalink();
		echo '" class="btn btn-block"><i class="icon-play pull-right"></i>';
		echo the_title();
		echo '</a></div>';
	endwhile; ?>
      </div>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span12">
      <div class="unit clearfix">
        <?php $args = array( 'post_type' => 'page', 'name' => '4-week-programs' );
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post();
		echo '<div class="span6">';
		echo the_post_thumbnail('wpbs-featured-carousel');	
		echo '</div><div class="span6">';
		echo '<h2>';
		echo the_title();
		echo '</h2>';
		echo '<p>';
		echo the_field('short_description');
		echo '</p>';		
		echo '<a href="';
		echo the_permalink();
		echo '" class="btn btn-block"><i class="icon-play pull-right"></i>';
		echo the_title();
		echo '</a></div>';
	endwhile; ?>
      </div>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span12">
      <div class="unit clearfix">
        <?php $args = array( 'post_type' => 'page', 'name' => '3-week-programs' );
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post();
		echo '<div class="span6">';
		echo the_post_thumbnail('wpbs-featured-carousel');	
		echo '</div><div class="span6">';
		echo '<h2>';
		echo the_title();
		echo '</h2>';
		echo '<p>';
		echo the_field('short_description');
		echo '</p>';		
		echo '<a href="';
		echo the_permalink();
		echo '" class="btn btn-block"><i class="icon-play pull-right"></i>';
		echo the_title();
		echo '</a></div>';
	endwhile; ?>
      </div>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span12">
      <div class="unit clearfix">
        <?php $args = array( 'post_type' => 'page', 'name' => '2-week-programs' );
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post();
		echo '<div class="span6">';
		echo the_post_thumbnail('wpbs-featured-carousel');	
		echo '</div><div class="span6">';
		echo '<h2>';
		echo the_title();
		echo '</h2>';
		echo '<p>';
		echo the_field('short_description');
		echo '</p>';		
		echo '<a href="';
		echo the_permalink();
		echo '" class="btn btn-block"><i class="icon-play pull-right"></i>';
		echo the_title();
		echo '</a></div>';
	endwhile; ?>
      </div>
    </div>
  </div>
  
</div>
