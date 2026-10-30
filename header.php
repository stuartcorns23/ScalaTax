<!DOCTYPE html>
<html <?php function_exists('language_attributes') ? language_attributes() : ''; ?> data-theme="light">
    <head>
        <meta charset="<?php function_exists('bloginfo') ? bloginfo('charset') : ''; ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php function_exists('wp_head') ? wp_head() : ''; ?>
    </head>
    <body <?php function_exists('body_class') ? body_class() : ''; ?>>

    <!-- <header id="main-header" class="w-full">
        <section class="inner-section flex flex-col md:flex-row items-center justify-between">
            <section class="logo p-4">
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                    <img width="auto" src="<?php echo get_theme_mod("website-logo") ?>" width="100%" class="max-h-[150px]" />
                </a>
            </section>
            <nav class="main-navigation">
                <?php
                        wp_nav_menu(array(
                            'theme_location' => 'primary',
                            'depth' => 2,
                            'container' => 'nav',
                            'container_class' => 'flex justify-center xl:justify-end z-10',
                            'container_id' => 'main_navigation',
                            'menu_class' => 'flex justify-center xl:justify-end',
                            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        ));
                    ?>

                <button class="fill">Book a Consultation</button>
            </nav>
        </section>
    </header> -->

    <header class="site-header">
        <div class="container header-inner">
            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="site-logo" aria-label="Scala Tax - Home">
                <img width="auto" src="<?php echo get_theme_mod("website-logo") ?>" />
            </a>
            <button class="menu-toggle" type="button" aria-label="Open navigation" aria-expanded="false" aria-controls="site-navigation">☰</button>
            <!-- <nav class="site-nav" id="site-navigation" aria-label="Main navigation"> -->
                <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'depth' => 2,
                        'container' => 'nav',
                        'container_class' => 'flex justify-center xl:justify-end z-10',
                        'container_id' => 'site-navigation',
                        'menu_class' => 'site-nav',
                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    ));
                ?>
            <!-- </nav> -->
        </div>
    </header>

    