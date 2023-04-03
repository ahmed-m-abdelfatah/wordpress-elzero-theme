<?php get_header(); ?>

<main class="main-wrapper">
  <div class="container-fluid p-5">

    <?php
    // Display the single post
    display_single_post();
    ?>

  </div>
</main>

<?php get_footer(); ?>

<?php
function display_single_post()
{
  if (have_posts()) {
    while (have_posts()) {
      the_post(); ?>

      <div class="main-post single-post">

        <!-- Post Title -->
        <?php the_title('<h2 class="post-title">', '</h2>'); ?>

        <!-- Post Metadata -->
        <p class="post-data">
          <span class="post-author">
            <i class="fas fa-user"></i>
            <?php the_author_posts_link(); ?>
          </span>
          <span class="post-date">
            <i class="fas fa-calendar-alt"></i>
            <?php the_time('F j, Y'); ?>
          </span>
          <span class="post-comments">
            <i class="fas fa-comments"></i>
            <?php comments_popup_link('0 Comments', '1 Comment', '% Comments', 'text-decoration-none', 'Comments Disabled'); ?>
          </span>
        </p>

        <!-- Post Content -->
        <div class="post-content">
          <?php the_content(); ?>
        </div>

        <!-- Post Categories and Tags -->
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
              echo 'Tags: There are no tags';
            }
            ?>
          </p>
        </div>

      </div>

<?php }
  }
}
?>