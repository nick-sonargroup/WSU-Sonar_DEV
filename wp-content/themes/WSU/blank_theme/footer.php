    <footer id="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="py-4">
                                <p><?php the_field('copyright_text','options') ?></p>
                            </div>
                            <div class="py-4">
                                <?php
									wp_nav_menu([
								     'menu'            => 'footer',
								     'theme_location'  => 'blank_theme',
								     'container'       => '',
								     'container_id'    => '',
								     'container_class' => '',
								     'menu_id'         => 'menu-footer',
								     'menu_class'      => 'list-inline',
								     'depth'           => 1,
								     'fallback_cb'     => 'bs4navwalker::fallback',
								     'walker'          => new bs4navwalker()
									]);
							    ?>
                            </div>
                        </div>
                    </div>
                </div>      
            </div>    
    </footer>

    <script>
        $(document).ready(function() {
            // Open navbarSide when button is clicked
            $('#navbarSideButton').on('click', function() {
                $('#navbarSide').addClass('reveal');
                $('.overlay').show();
            });

            // Close navbarSide when the outside of menu is clicked
            $('.overlay, .navbar-toggler-close').on('click', function() {
                $('#navbarSide').removeClass('reveal');
                $('.overlay').hide();
            });

        });
    </script>

    <?php wp_footer(); ?>

</body>

</html>