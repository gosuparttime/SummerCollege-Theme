<div class="container-fluid pad-one-t" id="program-foot">
  <div class="row-fluid">
  <div class="span6"><div class="unit">
      <?php $args = array( 'post_type' => 'page', 'name' => 'apply-now' );
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post();
		echo '<h2>';
		echo the_title();
		echo '</h2>';
		echo the_post_thumbnail('wpbs-featured');	
		echo '<p>';
		echo the_field('short_description');
		echo '</p>';		echo '<a href="';
		echo the_permalink();
		echo '" class="btn btn-block"><i class="icon-play pull-right"></i>';
		echo the_title();
		echo '</a>';
	endwhile; ?>
    </div></div>
    <div class="span6"><div class="unit">
      <?php $args = array( 'post_type' => 'page', 'name' => 'request-information' );
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post();
		echo '<h2>';
		echo the_title();
		echo '</h2>';
		echo the_post_thumbnail('wpbs-featured');	
		echo '<p>';
		echo the_field('short_description');
		echo '</p>';		echo '<a href="';
		echo the_permalink();
		echo '" class="btn btn-block"><i class="icon-play pull-right"></i>';
		echo the_title();
		echo '</a>';
	endwhile; ?>
    </div></div>
  </div>
  <div class="row-fluid">
    <div class="span6"><div class="unit">
      <?php $args = array( 'post_type' => 'page', 'name' => 'eligibility-requirements' );
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post();
		echo '<h2>';
		echo the_title();
		echo '</h2>';
		echo the_post_thumbnail('wpbs-featured');	
		echo '<p>';
		echo the_field('short_description');
		echo '</p>';		echo '<a href="';
		echo the_permalink();
		echo '" class="btn btn-block"><i class="icon-play pull-right"></i>';
		echo the_title();
		echo '</a>';
	endwhile; ?>
    </div></div>
    <div class="span6"><div class="unit">
      <?php $args = array( 'post_type' => 'page', 'name' => 'international-students' );
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post();
		echo '<h2>';
		echo the_title();
		echo '</h2>';
		echo the_post_thumbnail('wpbs-featured');	
		echo '<p>';
		echo the_field('short_description');
		echo '</p>';		echo '<a href="';
		echo the_permalink();
		echo '" class="btn btn-block"><i class="icon-play pull-right"></i>';
		echo the_title();
		echo '</a>';
	endwhile; ?>
    </div></div>
  </div>
  <div class="row-fluid">
    <div class="span6"><div class="unit">
      <?php $args = array( 'post_type' => 'page', 'name' => 'residential-information' );
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post();
		echo '<h2>';
		echo the_title();
		echo '</h2>';
		echo the_post_thumbnail('wpbs-featured');	
		echo '<p>';
		echo the_field('short_description');
		echo '</p>';		echo '<a href="';
		echo the_permalink();
		echo '" class="btn btn-block"><i class="icon-play pull-right"></i>';
		echo the_title();
		echo '</a>';
	endwhile; ?>
    </div></div>
    <div class="span6"><div class="unit">
      <?php $args = array( 'post_type' => 'page', 'name' => 'program-costs' );
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post();
		echo '<h2>';
		echo the_title();
		echo '</h2>';
		echo the_post_thumbnail('wpbs-featured');	
		echo '<p>';
		echo the_field('short_description');
		echo '</p>';
		echo '<a href="';
		echo the_permalink();
		echo '" class="btn btn-block"><i class="icon-play pull-right"></i>';
		echo the_title();
		echo '</a>';
	endwhile; ?>
    </div></div>
  </div>
</div>
