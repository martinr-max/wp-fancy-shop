<?php get_header(); ?>
        <main>
            <section class="page-content">
                <?php
                while(have_posts()) {
                    the_post();
                    ?>
                    <div class="content"> <?php the_content(); ?> </div>
               <?php } ?>
            </section>
        </main>
<?php get_footer();   