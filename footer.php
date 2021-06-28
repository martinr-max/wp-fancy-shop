    <footer class="footer">
        <section class="footer_widgets">
        <?php
         wp_nav_menu(array(
            'theme_location' => 'fancy-shop-footer-menu'
        ));
         ?>
        </section>
        <section class="footer_copyright">Copyright</section>
        <?php get_footer(); ?>
    </footer>
</body>

</html>