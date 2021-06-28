<?php get_header(); ?>
        <main>
            <div class="front-page-content">
            <section class="slider">
            <?php get_template_part('template-parts/carousel'); ?>
           
            </section>
            <section class="popular_products">
            <h2>popular products</h2>
            <div class="popular_products_content">
                <div class="post-content">
                <?php echo do_shortcode('[products limit="3" orderby="popularity"]') ?>
                </div>
            </div>
            </section>
            <section class="page-content" class="new-arrivels">
                <?php
                while(have_posts()) {
                    the_post();
                    ?>
                    <div class="content"> <?php the_content(); ?> </div>
               <?php } ?>
            </section>
            <section class="deal-of-the-weak">
              <div class="deal-of-the-weak-text-content">
                <h2>The best offer this week:</h2>
              </div>
              <div class="deal-of-the-weak-product-img">
                <?php echo do_shortcode('[product id="224"]') ?>
              </div>

            </section>
            <section class="blog"> 
            <?php
          $homepagePosts = new WP_Query(array(
            'posts_per_page' => 2
          ));

          while ($homepagePosts->have_posts()) {
            $homepagePosts->the_post(); ?>
            <div class="event-summary">
              
              <div class="event-summary__content">
                <h5 class="heading-2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                <p><?php if (has_excerpt()) {
                    echo get_the_excerpt();
                  } else {
                    echo wp_trim_words(get_the_content(), 18);
                    } ?> <a href="<?php the_permalink(); ?>" class="nu gray">Read more</a></p>
              </div>
            </div>
          <?php } wp_reset_postdata();
        ?> 
            </section>
            </div>
        </main>
<?php get_footer();   