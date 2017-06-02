<?php /* Template Name: FORMS */ ?>
<?php get_header(); ?>

<?php the_post(); ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1><?php the_title() ?></h1>
	            <?php the_content(); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>