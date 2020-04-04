

<?php wp_footer(); ?>

</div><!-- #content -->

    <footer id="colophon" class="site-footer" role="contentinfo">

        <div class="widget-area" role="complementary">
            <?php 

            if (is_active_sidebar( 'footer-sidebar')){

                dynamic_sidebar( 'footer-sidebar' );
            }
            ?>
        </div>
        <p>&copy; <?php echo date("Y");?> The Merl Workshop </p>

    </footer>

</div><!-- #page -->

</body>
</html>