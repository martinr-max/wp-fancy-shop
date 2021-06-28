<?php get_header(); ?>
        <main>
            <div class="page-content">
            <section class="slider">Slider</section>
            <section class="popular_products">popular</section>
            <section class="new-arrivels">
                <?php
                while(have_posts()) {
                    the_post();
                    ?>
                    <h2> <?php the_title(); ?> </h2>
                    <div class="content"> <?php the_content(); ?> </div>
               <?php } ?>
            </section>
            <section class="deal-of-the-weak">deal-of-the-weak</section>
            <section class="blog"> Blog</section>
            </div>
        </main>
<?php get_footer();   