<?php get_header() ?>

<main class="main-wrapper">
  <div class="container p-5">
    <div class="row g-4">
      <?php
      if (have_posts()) {
        while (have_posts()) {
          the_post(); ?>
          <div class="col-md-6">
            <div class="card main-post">
              <?php the_post_thumbnail('', [
                'class' => 'card-img-top',
                'title' =>  get_the_title() . ' thumbnail'
              ]) ?>

              <div class="card-body">
                <!-- this for showing the before and after
                  <?php the_title('<h3 class="card-title post-title">', '</h3>') ?>
                -->
                <h3 class="card-title post-title">
                  <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to
                  <?php the_title_attribute(); ?>">
                    <?php the_title(); ?></a>
                </h3>

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
                <p class="card-text post-summary">
                  <!-- <?php the_content('Read the full article ...') ?> -->
                  <?php the_excerpt() ?>
                  <!-- <a href="<?php echo get_permalink() ?>">Read more ...</a> -->

                </p>
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
          </div>
      <?php  } // end of while loop
      } // end of if statement
      ?>

      <div class="col-sm-12">
        <div class="flex-grow-1 d-flex justify-content-between">
          <?php
          /**
           * @Author: Ahmed Abdelfatah
           * @Date: 2023-01-04 22:01:13
           * @Desc: add pagination
           */
          function add_pagination()
          {
            if (get_previous_posts_link()) {
              previous_posts_link('prev');
            } else {
              echo "<span>No previous page</span>";
            }

            if (get_next_posts_link()) {
              next_posts_link('next');
            } else {
              echo "<span>No next page</span>";
            }
          };
          add_pagination();
          ?>
        </div>
      </div>
    </div>
  </div>
</main>

<?php get_footer() ?>