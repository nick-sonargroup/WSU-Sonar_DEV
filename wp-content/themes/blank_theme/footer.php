    <footer>
        <div class="container-fluid">
            <div class="row p-3 d-flex align-items-top">
                <div class="col-sm-6 p-3">
                    <h4><?php the_field('footer_left_heading', 'options') ?></h4>
                    <p><?php the_field('footer_left_intro_text', 'options') ?></p>
                    <div class="row">
                        <div class="col-md-4 p-3">
                            <a href="<?php the_field('facebook_link', 'options') ?>" target="_blank">
                                <i class="fa fa-facebook-official fa-2x" aria-hidden="true"></i>
                            </a>
                            <a href="<?php the_field('instagram_link', 'options') ?>" target="_blank">
                                <i class="fa fa-instagram fa-2x" aria-hidden="true"></i>
                            </a>
                            <a href="<?php the_field('twitter_link', 'options') ?>" target="_blank">
                                <i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="col-md-4 p-3">Logo</div>
                        <div class="col-md-4 p-3">Logo</div>
                    </div>
                </div>
                <div class="col-sm-6 p-3">
                    <h4><?php the_field('footer_right_heading', 'options') ?></h4>
                    <p><?php the_field('footer_right_intro_text', 'options') ?></p>
                    <div class="row">
                        <div class="col-sm-6 p-3">
                            <?php the_field('call_us_text', 'options') ?>
                        </div>
                        <div class="col-sm-6 p-3">
                            <a href="#" class="btn btn-outline">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row p-3 d-flex align-items-center">
                <div class="col-6 p-3">
                    <ul class="list-inline copyright">
                        <li class="list-inline-item"><?php the_field('copyright_text', 'options') ?></li>
                        <li class="list-inline-item">Phasellus iaculis</li>
                        <li class="list-inline-item">Privacy Policy</li>
                    </ul>
                </div>
                <div class="col-6 p-3">
                    <?php
                        wp_nav_menu([
                         'menu'            => 'primary',
                         'theme_location'  => 'blank_theme',
                         'container'       => '',
                         'container_id'    => '',
                         'container_class' => '',
                         'menu_id'         => '',
                         'menu_class'      => 'footer-menu',
                         'depth'           => 2,
                         'fallback_cb'     => 'bs4navwalker::fallback',
                         'walker'          => new bs4navwalker()
                        ]);
                    ?>
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
    
    <script>
        var mySwiper = new Swiper('.swiper-container', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,

            // If we need pagination
            pagination: '.swiper-pagination',

            // Navigation arrows
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',

            // And if we need scrollbar
            //scrollbar: '.swiper-scrollbar',
        })
    </script>

</body>

</html>