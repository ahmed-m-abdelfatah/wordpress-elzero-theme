<?php get_header() ?>

<main class="main-wrapper">
  <div class="container p-5">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4" data-masonry='{"percentPosition": true }'>
      <div class="col">
        <div class="card main-post">
          <img src="http://unsplash.it/600?gravity=cente" class="card-img-top" alt="img">

          <div class="card-body">
            <h3 class="card-title post-title">Card title</h3>
            <p class="post-data">
              <span class="post-author"><i class="fas fa-user"></i>ahmed</span>
              <span class="post-date"><i class="fas fa-calendar-alt"></i>today</span>
              <span class="post-comments"><i class="fas fa-comments"></i>1000</span>
            </p>
            <p class="card-text post-summary">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos tempore minus sit velit dolore praesentium, tempora voluptates quia molestias, totam quam nobis sapiente dolor consectetur beatae expedita numquam hic. Repudiandae!</p>
            <p class="categories"><i class="fas fa-tags"></i>test, test3</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>


<?php get_footer() ?>