<?php get_header() ?>

<main class="main-wrapper">
  <div class="container-fluid p-5">
    <?php
    if (have_posts()) {
      while (have_posts()) {
        the_post(); ?>
        <div class="main-post single-post">
          <?php the_title('<h2 class="post-title">', '</h2>') ?>

          <p class="post-data">
            <span class="post-author">
              <i class="fas fa-user"></i>
              <?php the_author_posts_link(); ?>
            </span>
            <span class="post-date">
              <i class="fas fa-calendar-alt"></i>
              <?php the_time('F j, Y') ?>
            </span>
            <span class="post-comments">
              <i class="fas fa-comments"></i>
              <?php comments_popup_link('0 Comments', '1 Comment', '% Comments', 'text-decoration-none', 'Comments Disabled') ?>
            </span>
          </p>

          <div class="post-content">
            <?php the_content() ?>
          </div>

          <div class="post-data">
            <p class="post-categories">
              <i class="fas fa-tags"></i>
              <?php the_category(' , '); ?>
            </p>
            <p class="post-tags">
              <?php
              if (has_tag()) {
                the_tags(null, ' ', null);
              } else {
                echo 'Tags: There is no tags';
              }

              ?>
            </p>
          </div>
        </div>
    <?php  }
    }
    ?>
  </div>
</main>

<?php get_footer() ?>