<div class="fluid-sidebar sidebar span4" role="complementary" id="sidebar2">
<a class="btn btn-info btn-block btn-large accordion-toggle visible-phone" data-toggle="collapse" href="#mySidebar"><i class="icon-plus pull-right"></i>See More</a>
<div class="collapse hide-phone" id="mySidebar">
<div id="sidebar1">
    <?php if ( is_active_sidebar( 'sidebar-program' ) ) : ?>
    <?php dynamic_sidebar( 'sidebar-program' ); ?>
    <?php endif; ?>
  </div>
  <h3>List of Programs</h3>
  <h4>6 Week Programs</h4>
  <ul>
  <?php $args = array(
  	'orderby' => 'title', 
	'order' => 'ASC',
	'tax_query' => array(
		array(
			'taxonomy' => 'program-type',
			'field' => 'slug',
			'terms' => '6-week',		
		)
	)
);
$query= new WP_Query($args);

// Loop
while($query->have_posts()): $query->next_post();
     $id = $query->post->ID;
     echo '<li>';
	 echo '<a href="';
	 echo get_permalink($id);
	 echo '">';
     echo get_the_title($id);
     echo '</a></li>';
endwhile;
?>
  </ul>
  
  <?php $args = array(
  	'orderby' => 'title', 
	'order' => 'ASC',
	'tax_query' => array(
		array(
			'taxonomy' => 'program-type',
			'field' => 'slug',
			'terms' => '4-week',		
		)
	)
);
$query= new WP_Query($args);
if($query->have_posts()):
echo '<h4>4 Week Programs</h4>';
echo '<ul>';
// Loop
while($query->have_posts()): $query->next_post();
     $id = $query->post->ID;
     echo '<li>';
	 echo '<a href="';
	 echo get_permalink($id);
	 echo '">';
     echo get_the_title($id);
     echo '</a></li>';
endwhile;
echo '</ul>';
endif;?>
  <h4>3 Week Programs</h4>
  <ul>
  <?php $args = array(
  	'orderby' => 'title', 
	'order' => 'ASC',
	'tax_query' => array(
		array(
			'taxonomy' => 'program-type',
			'field' => 'slug',
			'terms' => '3-week',		
		)
	)
);
$query= new WP_Query($args);

// Loop
while($query->have_posts()): $query->next_post();
     $id = $query->post->ID;
     echo '<li>';
	 echo '<a href="';
	 echo get_permalink($id);
	 echo '">';
     echo get_the_title($id);
     echo '</a></li>';
endwhile;
?>
  </ul>

  <h4>2 Week Programs</h4>
  <h5>Session 1</h5>
  <ul>
  <?php $args = array(
  	'orderby' => 'title', 
	'order' => 'ASC',
	'tax_query' => array(
		array(
			'taxonomy' => 'program-type',
			'field' => 'slug',
			'terms' => 'session-1',		
		)
	)
);
$query= new WP_Query($args);

// Loop
while($query->have_posts()): $query->next_post();
     $id = $query->post->ID;
     echo '<li>';
	 echo '<a href="';
	 echo get_permalink($id);
	 echo '">';
     echo get_the_title($id);
     echo '</a></li>';
endwhile;
?>
  </ul>
  <h5>Session 2</h5>
  <ul>
  <?php $args = array(
  	'orderby' => 'title', 
	'order' => 'ASC',
	'tax_query' => array(
		array(
			'taxonomy' => 'program-type',
			'field' => 'slug',
			'terms' => 'session-2',		
		)
	)
);
$query= new WP_Query($args);

// Loop
while($query->have_posts()): $query->next_post();
     $id = $query->post->ID;
     echo '<li>';
	 echo '<a href="';
	 echo get_permalink($id);
	 echo '">';
     echo get_the_title($id);
     echo '</a></li>';
endwhile;
?>
  </ul>
  <h5>Session 3</h5>
  <ul>
  <?php $args = array(
  	'orderby' => 'title', 
	'order' => 'ASC',
	'tax_query' => array(
		array(
			'taxonomy' => 'program-type',
			'field' => 'slug',
			'terms' => 'session-3',
		)
	)
);
$query= new WP_Query($args);

// Loop
while($query->have_posts()): $query->next_post();
     $id = $query->post->ID;
     echo '<li>';
	 echo '<a href="';
	 echo get_permalink($id);
	 echo '">';
     echo get_the_title($id);
     echo '</a></li>';
endwhile;
?>
  </ul>

  </div>
</div>
