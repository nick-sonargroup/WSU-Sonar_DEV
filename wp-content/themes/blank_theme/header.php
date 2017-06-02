<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <link rel="shortcut icon" type="image/png" href="<?php the_field('favicon','options') ?>"/>
    <meta name="description" content="">

    <title><?php wp_title(); ?></title>
    
    <?php wp_head() ?>
    
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/style_2.css" />
	
</head>

<body <?php body_class(); ?>>
    
    
        <nav class="navbar fixed-top" role="navigation">

        <div class="d-flex align-items-stretch justify-content-between">
            <div class="left">
                <button class="navbar-toggler" id="navbarSideButton" type="button">
                    &#9776;
                </button>
                <a class="navbar-brand hidden-xs-down" href="<?php echo home_url(); ?>">
                    <img src="<?php the_field('desktop_logo','options') ?>" height="38px" width="auto" alt="#">
                </a>
                <a class="navbar-brand hidden-sm-up" href="<?php echo home_url(); ?>">
                    <img src="<?php the_field('mobile_logo','options') ?>" height="38px" width="auto" alt="#">
                </a>

            </div>

            <div class="right">
                <ul class="nav">
                    <li class="nav-item active blue hidden-xs-down">
                        <a class="nav-link" href="#">Apply Now <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item pink">
                        <a class="nav-link" href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                    </li>
                    <li class="nav-item black">
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" target="_blank" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </a>
                            <div class="dropdown-menu animated slideInRight" aria-labelledby="navbarDropdownMenuLink">
                                <!--<a class="dropdown-item" href="#" target="_blank">-->
                                <form class="form-inline">
                                    <input class="form-control" type="text" placeholder="Search">
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                                </form>
                                <!--</a>-->
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="navbar-side" id="navbarSide">

            <div class="header d-flex align-items-stretch">
                <button class="navbar-toggler-close" type="button">&#10005;</button>
                <a class="navbar-brand" href="<?php echo home_url(); ?>"><img src="<?php the_field('desktop_logo','options') ?>" height="38px" width="auto" alt="#"></a>
            </div>
            <?php
                wp_nav_menu([
                 'menu'            => 'primary',
                 'theme_location'  => 'blank_theme',
                 'container'       => '',
                 'container_id'    => '',
                 'container_class' => '',
                 'menu_id'         => '',
                 'menu_class'      => 'primary-menu',
                 'depth'           => 2,
                 'fallback_cb'     => 'bs4navwalker::fallback',
                 'walker'          => new bs4navwalker()
                ]);
            ?>
            <?php
                wp_nav_menu([
                 'menu'            => 'primary',
                 'theme_location'  => 'blank_theme',
                 'container'       => '',
                 'container_id'    => '',
                 'container_class' => '',
                 'menu_id'         => '',
                 'menu_class'      => 'sub-menu',
                 'depth'           => 2,
                 'fallback_cb'     => 'bs4navwalker::fallback',
                 'walker'          => new bs4navwalker()
                ]);
            ?>
        </div>
        <div class="overlay"></div>

    </nav>