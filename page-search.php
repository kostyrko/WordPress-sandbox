<?php

  get_header();
  while (have_posts()) {
      the_post(); ?>
    <div class="page-banner">
        <!-- get_theme_file_uri('') -->
        <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg') ?>);"></div>
        <div class="page-banner__content container container--narrow">
          <!-- TITLE -->
          <h1 class="page-banner__title"> <?php the_title(); ?> </h1>
          <!-- sub-title -->
          <div class="page-banner__intro">
            <p>REPLACE LATER</p>
          </div>
        </div>
      </div>

      <div class="container container--narrow page-section">
        <?php
        $theParent = wp_get_post_parent_id(get_the_ID());
      // $theParent zwraca ID rodzica lub 0 jeśli brak takiego (tzn rodzica)
      if ($theParent) { ?>
            <div class="metabox metabox--position-up metabox--with-home-link">
              <p><a class="metabox__blog-home-link" href="<?php echo get_the_permalink($theParent) ?>"><i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title($theParent) ?></a> <span class="metabox__main"><?php the_title(); ?></span></p>
            </div>
          <?php } ?>
    <?php
    // pobierz id stron ale tylko będące dziećmi
      $testArray = get_pages(array(
        'child_of'=> get_the_ID()
      ));
      // jeśli posiada rodzica albo posiada dzieci to wyświetl
      if ($theParent or $testArray) { ?>
        <div class="page-links">
          <h2 class="page-links__title"><a href="<?php get_the_permalink($theParent) ?>"> <?php echo get_the_title($theParent); ?> </a></h2>
          <ul class="min-list">
            <?php
            if ($theParent) {
                $findChildrenOf = $theParent;
            } else {
                $findChildrenOf = get_the_ID();
            }
            // tworzy listę wszystkich stron oraz linków do nich
            // wp_list_pages();
            // przyjmuje argumenty w postaci tablicy asocjacyjnej
            wp_list_pages(array(
              'title_li' => null,
              'child_of' => $findChildrenOf
            ));
            ?>
          </ul>
        </div>
          <?php } ?>
        <div class="generic-content">
          <?php get_search_form(); ?>
        </div>

  </div>


  <?php
  }

  get_footer();
?>