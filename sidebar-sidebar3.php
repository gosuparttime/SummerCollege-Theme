<div class="fluid-sidebar sidebar span4" role="complementary" id="sidebar3">
<a class="btn btn-info btn-block btn-large accordion-toggle visible-phone" data-toggle="collapse" href="#mySidebar"><i class="icon-plus pull-right"></i>See More</a>
<div class="collapse hide-phone" id="mySidebar">
<a href="/testimonials/submit-your-experience/"><?php echo do_shortcode('[button type="primary" text="Tell Your Story" subtext="Share your Summer College experience!" url="/testimonials/submit-your-experience/"]'); ?></a>
  <h3>View Other Stories</h3>
  <ul>
  <?php
    $args = array(
		'post_type' => 'stories',
		'orderby' => 'rand',
		'posts_per_page' => '5' 
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
</div></div>
