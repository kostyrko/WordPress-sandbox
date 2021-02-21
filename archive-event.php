<?php 

get_header(); 
pageBanner(array(
  'title' => 'All events',
  'subtitle' => 'See what is going on in our world'
));
?>

<div class="container container--narrow page-section">
<!-- display posts - as long as the function have_posts() display true -->
<?php 
  while(have_posts()) {
    the_post();
    get_template_part('template-parts/content-event');
  }
  // add pagination
  echo paginate_links( )
?>
<hr class="section-break">

<p>Looking for a recap of past events? <a href="<?php echo site_url('/past-events') ?>">Check out our past events archive</a>.</p>

</div>


<?php 
get_footer();

?>