<?php 

get_header(); ?>

<div class="page-banner">
  <!-- get_theme_file_uri('') -->
  <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg') ?>);"></div>
  <div class="page-banner__content container container--narrow">
    <h1 class="page-banner__title"> All events </h1>
    <p> See what is going on in our world </p>
    <!-- sub-title -->
    <div class="page-banner__intro">
      <p>Keep up with our latest news</p>
    </div>
  </div>
</div>

<div class="container container--narrow page-section">
<!-- display posts - as long as the function have_posts() display true -->
<?php 
  while(have_posts()) {
    the_post(); ?>
    <div class="event-summary">
        <a class="event-summary__date t-center" href="<?php the_permalink(); ?>">
          <!-- get_field() - wymaga ustawienia plugin Advance Custom Fields lekcja 36. -->
          <!-- Przyjęcie daty zwracanej przez plugin i jej zmiana przez klasę DateTime a następnie wyciągnięcie odpowiednich danych -->
          <span class="event-summary__month"><?php
            $eventDate = new DateTime(get_field('event_date'));
            echo $eventDate->format('M')
          ?></span>
          <span class="event-summary__day"><?php echo $eventDate->format('d') ?></span>
        </a>
      <div class="event-summary__content">
        <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
        <?php echo wp_trim_words(get_the_content(), 18) ?> <a href="<?php the_permalink(); ?>">Learn more</a></p>
      </div>
    </div>
    <?php
  }
  // add pagination
  echo paginate_links( )
?>
<hr class="section-break">
<p> Looking for a recap of past events ? Checkout <a href=" <?php site_url('/past_events') ?> "> Archives</a> </p>

</div>
  

<?php 
get_footer();

?>