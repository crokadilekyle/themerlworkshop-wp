

<?php wp_footer(); ?>

</div><!-- #content -->

    <footer id="colophon" class="site-footer" role="contentinfo">

        <!-- <?php do_action( 'themerlworkshop_before_footer' ); ?> -->

        <div class="widget-area" role="complementary">
            <?php 

            if (is_active_sidebar( 'footer-sidebar')){

                dynamic_sidebar( 'footer-sidebar' );
            }
            ?>
        </div>

        <?php 
            $footer_message = '&copy;' . date( 'Y') . ' ' . get_bloginfo( 'name' );
        ?>

        <p><?php echo apply_filters( 'themerlworkshop_footer_message', $footer_message );?></p>

    </footer>

</div><!-- #page -->

</body>
</html>