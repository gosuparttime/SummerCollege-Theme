<div class="alert alert-info" style="margin-top: .5em;">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <?php $args = array( 'post_type' => 'component', 'page_id' => '1967' );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
the_content();
endwhile; 
wp_reset_postdata();
?>
</div>