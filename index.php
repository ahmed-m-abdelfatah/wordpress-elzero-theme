<?php get_header() ?>

<main class="main-wrapper">
  <div class="container p-5">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
      <?php

      if (have_posts()) {
        while (have_posts()) {
          the_post(); ?>
          <div class="col">
            <div class="card main-post">
              <img src="http://unsplash.it/600?gravity=cente" class="card-img-top" alt="img">

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
                  <span class="post-comments"><i class="fas fa-comments"></i>1000</span>
                </p>
                <p class="card-text post-summary">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos tempore minus sit velit dolore praesentium, tempora voluptates quia molestias, totam quam nobis sapiente dolor consectetur beatae expedita numquam hic. Repudiandae!</p>
                <p class="categories">
                  <i class="fas fa-tags"></i>
                  <?php the_category(' , '); ?>
                </p>
              </div>
            </div>
          </div>
      <?php  } // end of while loop
      } // end of if statement
      ?>
    </div>
  </div>
</main>

<?php get_footer() ?>