<?php if( get_field('banner_image') ): ?>

<div class="swiper-container">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
        <!-- Slides -->
        <div class="swiper-slide d-flex slide-1" style="background-image:url('<?php the_field('banner_image') ?>'); background-size: cover; background-position: bottom center;">
            <div class="m-auto">
                <h1>
                    <?php the_field('banner_text') ?>
                </h1>
            </div>
        </div>

        <?php
            // check if the repeater field has rows of data
            if( have_rows('carousel_repeater') ) :
            $i = 1;
            // loop through the rows of data
            while ( have_rows('carousel_repeater') ) : 
            $i++;
            the_row(); 
            // then display a sub field value
        ?>

            <div class="swiper-slide d-flex slide-<?php echo $i; ?>" style="background-image:url('<?php the_sub_field('image') ?>'); background-size: cover; background-position: bottom center;">
                <div class="m-auto">
                    <h1>
                        <?php the_sub_field('text') ?>
                    </h1>
                </div>
            </div>

            <?php endwhile;
            else :
            // no rows found
            endif;
        ?>

    </div>

    <?php if( get_field('do_you_require_a_carousel') == 'Yes' ): ?>
    <!-- If we need pagination -->
    <div class="swiper-pagination"></div>

    <!-- If we need navigation buttons -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>

    <!-- If we need scrollbar -->
    <div class="swiper-scrollbar"></div>

    <?php endif; ?>

</div>

<?php else: // ?>

<div style="height:100px;"></div>

<?php endif; // ?>