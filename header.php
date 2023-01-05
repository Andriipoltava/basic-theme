<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <title><?php wp_title('|', true, 'right'); ?></title>

    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action('wp_body_open'); ?>
<header id="wrapper-navbar">
    <nav id="main-nav" class="navbar navbar-expand-md navbar-light " aria-labelledby="main-nav-label">


        <div class="container-fluid">

            <?php
            if (!has_custom_logo()) { ?>

                <?php if (is_front_page() && is_home()) : ?>

                    <h1 class="navbar-brand mb-0">
                        <a rel="home" href="<?php echo esc_url(home_url('/')); ?>" itemprop="url">
                            <?php bloginfo('name'); ?>
                        </a>
                    </h1>

                <?php else : ?>

                    <a class="navbar-brand" rel="home" href="<?php echo esc_url(home_url('/')); ?>" itemprop="url">
                        <?php bloginfo('name'); ?>
                    </a>

                <?php endif; ?>

                <?php
            } else {
                the_custom_logo();
            } ?>

            <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown"
                    aria-expanded="false"
                    aria-label="<?php esc_attr_e('Toggle navigation', 'basic_name'); ?>">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- The WordPress Menu goes here -->
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'header',
                    'container_class' => 'collapse navbar-collapse',
                    'container_id' => 'navbarNavDropdown',
                    'menu_class' => 'navbar-nav ms-auto',
                    'fallback_cb' => '',
                    'menu_id' => 'main-menu',
                    'depth' => 2,
                    'walker' => new Themes_WP_Bootstrap_Navwalker(),
                )
            );
            ?>

        </div><!-- .container(-fluid) -->

    </nav><!-- #main-nav -->
</header>

